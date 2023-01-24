<?php
session_start();
include 'inc/header.php';

if (isset($_GET["staff_member_new_record"])) {
	include "edit_staff_records.php";
}
?>
<div class="container">
	<div class="row">
		<form class="col s7 push-s3" onSubmit={formSubmit}>
			<h2>Lomogan's SanCode</h2>
			<div class="chip">New Record</div>
			<div class="row right">
				<button class="btn orange" type="button" onclick="window.location='index.php'"><i class="material-icons">
						arrow_back_ios_new</i><span class="flow-text">Go back</span></button>
			</div>
			<div class="card blue-grey darken-1">
				<div class="row">
					<div class="input-field col s8 push-s3">
						<i class="small material-icons prefix">badge</i>
						<input name="name" type="text" autofocus="on" autocomplete="off" />
						<label for="username">Enter staff member's name</label>
					</div>

					<div class="input-field col s8 push-s3">
						<i class="small material-icons prefix">device_thermostat</i>
						<input name="temp" type="text" autocomplete="off" />
						<label for="username">Enter temperature reading</label>
					</div>

					<div class="input-field col s8 push-s3">
						<i class="small material-icons prefix">text_snippet</i>
						<textarea id="textarea1" name="complain" class="materialize-textarea"></textarea>
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

					<div class="col s12 push-s4">
						<button class="btn waves-effect waves-light" type="submit" name="staff_member_new_record">Submit <i class="material-icons right">send</i>
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>