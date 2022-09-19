<?php
session_start();
include 'inc/header.php';





#Submit button clicked...
if (isset($_GET["adm_no_new_record"])) {
	#Add form data into database
	$temp = mysqli_escape_string($con, $_GET["temp"]);
	$ailment = mysqli_escape_string($con, $_GET["ailment"]);
	$medication = mysqli_escape_string($con, $_GET["medication"]);
	$comment = mysqli_escape_string($con, $_GET["comment"]);
	(isset($_GET["toOtherHealthFacility"])) ? $toOtherHealthFacility = $_GET["toOtherHealthFacility"] : $toOtherHealthFacility = 0;
	(isset($_GET["fromOtherHealthFacility"])) ? $fromOtherHealthFacility = $_GET["fromOtherHealthFacility"] : $fromOtherHealthFacility = 0;
	(isset($_GET["toCommunityUnit"])) ? $toCommunityUnit = $_GET["toCommunityUnit"] : $toCommunityUnit = 0;
	(isset($_GET["fromCommunityUnit"])) ? $fromCommunityUnit = $_GET["fromCommunityUnit"] : $fromCommunityUnit = 0;
	#Update DB
	$functions->update_new_record($_SESSION["adm_no"], $temp, $ailment, $medication, $comment, $toOtherHealthFacility, $fromOtherHealthFacility, $toCommunityUnit, $fromCommunityUnit);




	#Diseases Listed and Not Listed
	$unlistedDiseases = $functions->unlisted_diseases();
	while ($row = $unlistedDiseases->fetch_assoc()) {
		$eachDisease = $row["ailment"];
		#Diseases not listed - Insert into ALL OTHER DISEASES
		$listedDiseases = $functions->listed_diseases_compare($eachDisease);
		while ($row = $listedDiseases->fetch_assoc()) {
			$listedDisease = $row["diseasePresent"];
		}
		#If the value of $listedDisease is 1(true) - Disease listed;if 0(false) - Disease not listed
		if ($listedDisease == 1) {
			#$functions->total_no_of_cases($eachDisease);
			$functions->listed_diseases_push($functions->diseaseOccurrence($eachDisease), $eachDisease);
		} else {
			$functions->unlisted_diseases_push($functions->diseaseOccurrence($eachDisease));
		}
	}



	#Total number of first cases; for a particular day
	$functions->total_no_of_cases('<b>NO. OF FIRST ATTENDANCES</b>');


	#Total number of reAttendances cases; for a particular day
	$functions->total_no_of_reAttendance_cases('<b>RE-ATTENDACES</b>');



	#to/from - referrals
	$functions->to_other_health_facility();
	$functions->from_other_health_facility();
	$functions->to_community_unit();
	$functions->from_community_unit();



	#Clean records
	$functions->yesterday();
	$functions->last_month();

	#Redirect back to `index.php`
	header("Location:index");
}


?>
<div class="container">
	<div class="row">
		<form class="col s7 push-s3" onSubmit={formSubmit}>
			<h2>Lomo-gan San-code</h2>
			<div class="chip">New Record</div>
			<div class="row right">
				<button class="btn orange" name="go_back" onclick="window.location='./index'"><i class="material-icons">
						arrow_back_ios_new</i><span class="flow-text">Go back</span></button>
			</div>
			<div class="card blue-grey darken-1">
				<div class="row">
					<div class="input-field col s8 push-s3">
						<i class="small material-icons prefix">device_thermostat</i>
						<input name="temp" type="text" autofocus="on" autocomplete="off" required />
						<label for="username">Enter temperature reading</label>
					</div>
					<div class="col s12 push-s3">
						<?php if ($_SESSION["temp"] > 0) : ?>
							<small class="chip"><?php echo "<b>" . $_SESSION["fname"] . "'s</b> previous temperature reading : <b>" . $_SESSION["temp"] . "</b>" ?></small>
						<?php else : ?>
							<small class="chip">No previous temperature reading for <?php echo $_SESSION["fname"]; ?></small>
						<?php endif ?>
					</div>

					<div class="input-field col s8 push-s3">
						<i class="small material-icons prefix">text_snippet</i>
						<textarea id="textarea1" name="comment" class="materialize-textarea"></textarea>
						<label for="textarea1">Student's Complains</label>
					</div>

					<div class="col s12 push-s3">
						<?php if (!empty($_SESSION["comment"])) : ?>

						<?php else : ?>
							<small class="chip">No previous diagnosis for <?php echo $_SESSION["fname"]; ?></small>
						<?php endif ?>
					</div>

					<div class="input-field col s8 push-s3">
						<i class="small material-icons prefix">format_list_bulleted</i>
						<input type="text" name="ailment" id="auto" class="autocomplete">
						<label for="autocomplete-input">Ailment</label>
					</div>

					<div class="col s12 push-s3">
						<?php if (!empty($_SESSION["ailment"])) : ?>
							<small class="chip"><?php echo "<b>" . $_SESSION["fname"] . "'s</b> ailment last time was <b>" . $_SESSION["ailment"] . "</b>" ?></small>
						<?php else : ?>
							<small class="chip">No previous ailment for <?php echo $_SESSION["fname"]; ?></small>
						<?php endif ?>
					</div>

					<div class="input-field col s8 push-s3">
						<i class="small material-icons prefix">medication</i>
						<input type="text" name="medication" id="auto">
						<label for="autocomplete-input">Medication</label>
					</div>

					<div class="col s12 push-s3">
						<?php if (!empty($_SESSION["medication"])) : ?>
							<small class="chip"><?php echo "<b>" . $_SESSION["medication"] . "</b> was administered to <b>" . $_SESSION["fname"] . "</b>" ?></small>
						<?php else : ?>
							<small class="chip">No previous medication for <?php echo $_SESSION["fname"]; ?></small>
						<?php endif ?>
					</div>

					<div class="col s12 push-s3">
						<?php
						if ($_SESSION["toOtherHealthFacility"] > 0) {
							echo "<small class ='chip' <b>" . $_SESSION["fname"] . "</b> was referred to another health facility</small>";
						}
						if ($_SESSION["fromOtherHealthFacility"] > 0) {
							echo "<small class ='chip' <b>" . $_SESSION["fname"] . "</b> was referred from another health facility</small>";
						}
						if ($_SESSION["toCommunityUnit"] > 0) {
							echo "<small class ='chip' <b>" . $_SESSION["fname"] . "</b> was referred to a community unit</small>";
						}
						if ($_SESSION["fromCommunityUnit"] > 0) {
							echo "<small class ='chip' <b>" . $_SESSION["fname"] . "</b> was referred from a community unit</small>";
						}
						?>
					</div>

					<div class="col s12 push-s3">
						<p>
							<label>
								<input id="indeterminate-checkbox" type="checkbox" name="toOtherHealthFacility" value="1" />
								<span>Referred to another health facility?</span>
							</label>
						</p>

						<p>
							<label>
								<input id="indeterminate-checkbox" type="checkbox" name="fromOtherHealthFacility" value="1" />
								<span>Referred from another health facility?</span>
							</label>
						</p>

						<p>
							<label>
								<input id="indeterminate-checkbox" type="checkbox" name="toCommunityUnit" value="1" />
								<span>Referred to community unit?</span>
							</label>
						</p>

						<p>
							<label>
								<input id="indeterminate-checkbox" type="checkbox" name="fromCommunityUnit" value="1" />
								<span>Referred from community unit?</span>
							</label>
						</p>
					</div>

					<div class="col s12 push-s4">
						<button class="btn waves-effect waves-light" type="submit" name="adm_no_new_record">Submit <i class="material-icons right">send</i>
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>