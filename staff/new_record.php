<?php
session_start();
include 'inc/header.php';
#Delete yesterday's records
$functions->delete_yesterdays_staff_records();
#Submit button clicked...
if (isset($_GET["staff_member_new_record"])) {
	$name = $_GET["staff_name"];
	$temp = $_GET["temp"];
	$comment = $_GET["comment"];
	$ailment = $_GET["ailment"];
	$medication = $_GET["medication"];
	$toOtherHealthFacility = 0;
	$fromOtherHealthFacility = 0;
	$fromCommunityUnit = 0;
	$toCommunityUnit = 0;
	if (isset($_GET["toOtherHealthFacility"])) {
		$toOtherHealthFacility = $_GET["toOtherHealthFacility"];
	}
	if (isset($_GET["fromOtherHealthFacility"])) {
		$fromOtherHealthFacility = $_GET["fromOtherHealthFacility"];
	}
	if (isset($_GET["toCommunityUnit"])) {
		$toCommunityUnit = $_GET["toCommunityUnit"];
	}
	if (isset($_GET["fromCommunityUnit"])) {
		$fromCommunityUnit = $_GET["fromCommunityUnit"];
	}

	#Insert new staff record into `tbl_student` without an adm_no
	$sql = "INSERT INTO `tbl_student` (fname,temp,comment,ailment,medication,toOtherHealthFacility,fromOtherHealthFacility,toCommunityUnit,fromCommunityUnit) VALUES ('$name','$temp','$comment','$ailment','$medication','$toOtherHealthFacility','$fromOtherHealthFacility','$toCommunityUnit','$fromCommunityUnit')";

	#Now redirect back to the home page
	header("Location:./index");
}
?>
<div class="container">
	<div class="row">
		<form class="col s7 push-s3" onSubmit={formSubmit}>
			<h2>Lomo-gan San-code</h2>
			<div class="chip">New Record</div>
			<div class="card blue-grey darken-1">
				<div class="row">
					<div class="input-field col s8 push-s3">
						<i class="small material-icons prefix">badge</i>
						<input name="staff_name" type="text" autofocus="on" autocomplete="off" required />
						<label for="username">Enter staff member's name</label>
					</div>

					<div class="input-field col s8 push-s3">
						<i class="small material-icons prefix">device_thermostat</i>
						<input name="temp" type="text" autocomplete="off" required />
						<label for="username">Enter temperature reading</label>
					</div>

					<div class="input-field col s8 push-s3">
						<i class="small material-icons prefix">text_snippet</i>
						<textarea id="textarea1" name="comment" class="materialize-textarea"></textarea>
						<label for="textarea1">Complains</label>
					</div>

					<div class="input-field col s8 push-s3">
						<i class="small material-icons prefix">format_list_bulleted</i>
						<input type="text" name="ailment" id="auto" class="autocomplete">
						<label for="autocomplete-input">Ailment</label>
					</div>

					<div class="input-field col s8 push-s3">
						<i class="small material-icons prefix">medication</i>
						<input type="text" name="medication" id="auto">
						<label for="autocomplete-input">Medication</label>
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
						<button class="btn waves-effect waves-light" type="submit" name="staff_member_new_record">Submit <i class="material-icons right">send</i>
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>