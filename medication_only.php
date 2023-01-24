<?php
session_start();
include 'inc/header.php';
if (isset($_GET["temp"])) {
	include "get_records_by_adm_no.php";
}
?>
<div class="container">
	<div class="row">
		<form class="col s7 push-s3" onSubmit={formSubmit}>
			<h2>Lomogan's SanCode</h2>
			<div class="chip">Give <?php echo $_SESSION["fname"] ?> medication only</div>
			<div class="row right">
				<button class="btn orange" name="go_back" onclick="window.location='index.php?#choose'"><i class=" material-icons">
						arrow_back_ios_new</i><span class="flow-text">Go back</span></button>
			</div>
			<div class="card blue-grey darken-1">
				<div class="row">
					<div class="input-field col s6 push-s3">
						<label for="username">Enter temperature reading</label>
						<input name="temp" type="text" autofocus="on" autocomplete="off" required />
					</div>
					<div class="col s12 push-s3">
						<?php if ($_SESSION["temp"] > 0) : ?>
							<small class="chip"><?php echo "<b>" . $_SESSION["fname"] . "'s</b> previous temperature reading : <b>" . $_SESSION["temp"] . "</b>" ?></small>
						<?php else : ?>
							<small class="chip">Temperature reading unavailable for <?php echo $_SESSION["fname"]; ?></small>
						<?php endif ?>
					</div>
					<div class="col s12 push-s3">
						<?php if (!empty($_SESSION["complain"])) : ?>
							<small class="chip"><?php echo "<b>" . $_SESSION["fname"] . "</b>'s complains are : <b>" . $_SESSION["complain"] . "</b>" ?></small>
						<?php else : ?>
							<small class="chip">No previous complains for <?php echo $_SESSION["fname"] ?></small>
						<?php endif ?>
					</div>
					<div class="col s12 push-s3">
						<?php if (!empty($_SESSION["ailment"])) : ?>
							<small class="chip"><?php echo "<b>" . $_SESSION["fname"] . "</b> had : <b>" . $_SESSION["ailment"] . "</b>" ?></small>
						<?php else : ?>
							<small class="chip">No previous ailment for <?php echo $_SESSION["fname"] ?></small>
						<?php endif ?>
					</div>
					<div class="col s12 push-s3">
						<?php if (!empty($_SESSION["medication"])) : ?>
							<small class="chip"><?php echo "<b>" . $_SESSION["fname"] . "</b> was administered : <b>" . $_SESSION["medication"] . "</b>" ?></small>
						<?php else : ?>
							<small class="chip">No previous medication for <?php echo $_SESSION["fname"] ?></small>
						<?php endif ?>
					</div>
				</div>
				<div class="row center">
					<div class="input-field col s12">
						<button type="submit" id="#enter-clicked-medication-only" class="btn waves-effect waves-dark light-blue darken-1">submit</button>
					</div>
				</div>
			</div>
		</form>