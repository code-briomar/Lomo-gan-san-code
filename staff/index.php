<?php
session_start();
include 'inc/header.php';
?>

<body>
	<div class="container">
		<div class="row">
			<div class="center-align">
				<div class="vertical-center">
					<div class="row">
						<div class="col s12 m11">
							<h2>Lomogan's SanCode</h2>
							<?php
							if (isset($_SESSION["toast"])) {

							?>
								<script>
									M.toast({
										html: 'New record for <?php echo $_SESSION["toast"] ?> has been created!',
										classes: 'rounded'
									});
								</script>
							<?php
								unset($_SESSION["toast"]);
							}
							?>
							<p class="chip">Staff's section</p>
							<div class="card blue-grey darken-1">
								<div class="row right">
									<button class="btn orange" type="button" onclick="window.location='../category.php'"><i class="material-icons">
											arrow_back_ios_new</i><span class="flow-text">Go back</span></button>
								</div>
								<div class="card-content white-text">
									<span class="card-title">Pick an option :</span>
								</div>
								<div class="card-action">
									<a href="new_record.php" class="btn waves-effect waves-light">New Record</a>
									<a class="btn waves-effect waves-light waves-light modal-trigger" href="#summary">summary</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
					$result = $db->query("SELECT * FROM staff ORDER BY `time` desc");
					$count = 1;
					while ($row = $result->fetchArray()) {
						$thisMonth = date('m');
						$month = date('m', strtotime($row['time']));
						if ($thisMonth == $month) {
					?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><?php echo $row["name"] ?></td>
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
</body>

</html>