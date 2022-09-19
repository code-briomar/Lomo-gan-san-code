<?php
session_start();
include 'inc/header.php';

#Time interval since the student was last here
$thatDay = new DateTime($_SESSION["time"]);
$today = date("Y-m-d");

#Medication only button clicked...
if (isset($_GET["medication_only"])) {
	#Redirect to medication only page
	header("Location:medication_only");
}

#New Record button clicked...
if (isset($_GET["new_record"])) {
	#Redirect to new_record.php
	header("Location:new_record");
}

#Go back button clicked...
if (isset($_GET["go_back"])) {
	#Redirect back to home page
	header("Location:./index");
}
?>
<div class="container">
	<div class="row">
		<form class="col s7 push-s3" onSubmit={formSubmit}>
			<h2>Lomo-gan San-code</h2>
			<div class="card blue-grey darken-1">
				<div class="row left">
					<button class="btn orange" name="go_back"><i class="material-icons">
							arrow_back_ios_new</i><span class="flow-text">Go back</span></button>
				</div>
				<div class="card-content white-text">
					<span class="card-title">Choose a category : </span>
					<p><b><?php echo $functions->dateDifference($today, $_SESSION["time"]) ?></b>; The number of days since <b><?php echo $_SESSION["fname"] ?></b> was here which was on <b><?php echo date_format($thatDay, 'l jS \of F Y') ?></b></p>
				</div>
				<div class="row center">
					<div class="card-action col s12">
						<button class="btn waves-effect waves-dark light-blue darken-1" type="submit" name="medication_only">Medication Only</button>
						<button class="btn waves-effect waves-dark light-blue darken-1" type="submit" name="new_record">New Record</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>