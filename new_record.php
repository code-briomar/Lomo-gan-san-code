<?php
session_start();
include 'inc/header.php';
if (isset($_GET["adm_no_new_record"])) {
	include "get_records_by_adm_no.php";
}
?>
<div class="container">
	<div class="row">
		<form class="col s8 push-s2 new_record_form" onSubmit={formSubmit}>
			<h3>Lomogan's SanCode</h3>
			<div class="chip">Add a new record for <?php echo $_SESSION["fname"] ?></div>
			<div class="row right">
				<button class="btn orange" name="go_back" onclick="window.location='index.php'"><i class="material-icons">
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
						<textarea id="textarea1" name="complain" class="materialize-textarea"></textarea>
						<label for="textarea1">Student's Complains</label>
					</div>

					<div class="col s12 push-s3">
						<?php if (!empty($_SESSION["complain"])) : ?>
							<small class="chip"><?php echo "<b>" . $_SESSION["fname"] . "</b>'s complains are : <b>" . $_SESSION["complain"] . "</b>" ?></small>
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
					<div class="col s12 push-s5">
						<button class="btn waves-effect waves-light" id="#enter-clicked" type="submit" name="adm_no_new_record">Submit <i class="material-icons right">send</i>
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>