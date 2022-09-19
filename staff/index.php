<?php
session_start();
include 'inc/header.php';

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
	header("Location:../category");
}
?>
<div class="container">
	<div class="row">
		<form class="col s8 push-s2" onSubmit={formSubmit}>
			<h2>Lomo-gan San-code</h2>
			<div class="chip">Staff Section</div>
			<div class="card blue-grey darken-1">
				<div class="row left">
					<button class="btn orange" name="go_back"><i class="material-icons">
							arrow_back_ios_new</i><span class="flow-text">Go back</span></button>
				</div>
				<div class="row center">
					<div class="input-field col s12">
						<button class="btn waves-effect waves-dark light-blue darken-1" type="submit" name="medication_only">Medication Only</button>
						<button class="btn waves-effect waves-dark light-blue darken-1" type="submit" name="new_record">New Record</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>