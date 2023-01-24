<?php
session_start();
include 'inc/header.php';
#Update report.php each time the index page of the student file is loaded.
include 'update_report.php';
if (isset($_GET["adm_no"])) {
	include "get_records_by_adm_no.php";
}
?>
<title>Lomogan's SanCode</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<form class="col s7 push-s3" method="GET" onsubmit='{formSubmit}'>
				<h2>Lomogan's SanCode</h2>


				<!-- Notify user that records have been updated!-->
				<?php
				if (isset($_SESSION["toast"])) {

				?>
					<script>
						M.toast({
							html: "<?php echo $_SESSION["toast"] ?>'s records have been updated!",
							classes: 'rounded'
						});
					</script>
				<?php
					unset($_SESSION["toast"]);
				}
				?>


				<div class="card blue-grey darken-1">
					<div class="row">
						<div class="input-field col s6 push-s3">
							<label for="username">Enter admission number</label>
							<input name="adm_no" type="text" autofocus="on" autocomplete="off" required />
						</div>
					</div>
					<div class="row center">
						<div class="input-field col s12">
							<button type="submit" class="btn waves-effect waves-light">Submit</button>
						</div>
					</div>
				</div>
			</form>
			<div class="col s11 push-s3">
				<div class="row left">
					<a class="btn waves-effect waves-light light-blue accent-3 modal-trigger" href="#summary">summary</a>
					<div id="summary" class="modal modal-fixed-footer">
						<div class="modal-content">
							<h4>Summary ( Month : <?php echo date('F') ?> )</h4>
							<div class="grey darken-1">

							</div>
							<div class="input-field col s6 push-s3">
								<label for="username">Search.... by admission number</label>
								<input id="myInput" type="text">
							</div>
							<table class="centered" id="printable_table">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Admission Number</th>
										<th>Class</th>
										<th>Complains</th>
										<th>Ailment</th>
										<th>Medication</th>
										<th>Temp' Reading</th>
										<th>Time</th>
									</tr>
								</thead>

								<tbody id="myTable">
									<?php
									#Select all records for that month
									//Extract month from date
									$result = $db->query("SELECT * FROM student ORDER BY `time` DESC");
									$count = 1;
									while ($row = $result->fetchArray()) {
										$thisMonth = date('m');
										$month = date('m', strtotime($row['time']));
										if ($thisMonth == $month) {
									?>
											<tr>
												<td><?php echo $count; ?></td>
												<td><?php echo $row["fname"] . " " . $row["sname"] ?></td>
												<td><?php echo $row["adm_no"] ?></td>
												<td><?php echo $row["class"] ?></td>
												<td><span style="visibility: hidden;"><?php echo $row["complain"] ?></span><a class="btn tooltipped" data-position="top" data-tooltip="<?php echo $row["complain"] ?>'"></a></td>
												<td><?php echo $row["ailment"] ?></td>
												<td><?php echo $row["medication"] ?></td>
												<td><?php echo $row["temp"] ?></td>
												<td><?php echo date("F j, Y, g:i A", strtotime($row["time"])) ?>
											</tr>
									<?php
											$count += 1;
										}
									}
									?>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<a href="javascript:void(0)" class="modal-close btn orange" onclick="generate()">Print</a>
						</div>
					</div>
					<a class="btn waves-effect waves-light light-blue accent-3" href="report.php">report</a>
				</div>
			</div>
			<div class="col s12 push-s3">
				<div class="row center">
					<a href="category.php"><button class="btn orange">
							<i class="material-icons">arrow_back_ios_new</i><span class="flow-text">Go back</span></button>
					</a>
				</div>
			</div>
		</div>
	</div>
	<?php if (isset($_GET["choose"]) or isset($choose)) : ?>
		<div id="choose" class="modal blue-grey darken-1">
			<div class="modal-content flow-text">
				Pick an option for <?php echo $_SESSION["fname"]; ?>
				<a href="medication_only.php"><button class="btn-large waves-effect waves-light" style="text-transform: none;">Give <?php echo $_SESSION["fname"] ?> medication only</button></a>
				<a href="new_record.php"><button class="btn-large waves-effect waves-light" style="text-transform: none;">Add a new record for <?php echo $_SESSION["fname"] ?></button></a>
				<p class="chip">Admission Number : <?php echo $_SESSION["adm_no"] ?></p>
			</div>
		</div>
	<?php endif ?>
</body>

</html>