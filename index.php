<?php
session_start();
include 'inc/header.php';
#Validate if input is an admission number
if (isset($_GET["adm_no"])) {
	#Create a global variable adm_no
	$_SESSION["adm_no"] = $_GET["adm_no"];
	#Run validate function
	$validate = $functions->validate($_GET['adm_no']);
	if ($row = $validate->fetch_assoc()) {
		$adm_no = $row["adm_no"];
	}

	#Obtain all records with the stated admission number...
	$getAdmissionNumber = $functions->getRecordsByAdmissionNumber($_SESSION["adm_no"]);
	while ($row = $getAdmissionNumber->fetch_assoc()) {
		$_SESSION["fname"] = $row["fname"];
		$_SESSION["sname"] = $row["sname"];
		$_SESSION["tname"] = $row["tname"];
		$_SESSION["ftname"] = $row["ftname"];
		$_SESSION["class"] = $row["class"];
		$_SESSION["temp"] = $row["temp"];
		$_SESSION["ailment"] = $row["ailment"];
		$_SESSION["medication"] = $row["medication"];
		$_SESSION["comment"] = $row["comment"];
		$_SESSION["toOtherHealthFacility"] = $row["toOtherHealthFacility"];
		$_SESSION["fromOtherHealthFacility"] = $row["fromOtherHealthFacility"];
		$_SESSION["toCommunityUnit"] = $row["toCommunityUnit"];
		$_SESSION["fromCommunityUnit"] = $row["fromCommunityUnit"];
		$_SESSION["counted"] = $row["counted"];
		$_SESSION["time"] = $row["time"];
		#Insert into summary_table the values of :	
		$first_cases = $functions->first_cases($_SESSION["adm_no"]);
		while ($row2 = $first_cases->fetch_assoc()) {
			$firstAilment = $row2["FirstAilments"];
			$ailmentSummary = $row2["ailment"];
			#Insert firstAilments and ailment into summary_table
			$day = date("j");
			$month = date("n");
			if ($ailmentSummary == NULL) {
			} else {
				mysqli_query($con, "INSERT INTO `summary_table` (`ailment`,`cases`,`day`,`month`) VALUES ('$ailmentSummary', '$firstAilment','$day','$month') ");
				mysqli_query($con, "UPDATE `tbl_student` set counted = 1 WHERE ailment = '$ailmentSummary' AND day = '$day'");
			}
		}

		$reCases = $functions->reCases($_SESSION["adm_no"]);
		while ($row3 = $reCases->fetch_assoc()) {
			$reAilment = $row3["reAilments"];
			$ailmentSummary2 = $row3["ailment"];
			#Insert firstAilments and ailment into summary_table
			$day = date("j");
			$month = date("n");
			mysqli_query($con, "INSERT INTO `summary_table` (`ailment`,`reCases`,`day`,`month`) VALUES ('$ailmentSummary2', '$reAilment','$day','$month') ");
			mysqli_query($con, "UPDATE `tbl_student` set counted = 2 WHERE ailment = '$ailmentSummary2' AND day = '$day'");
		}
		# First cases of reattendance of that specific day
		# Check and clear records for last month
		# Clear counted cases for yesterday's records

		#Redirect to `choose.php`
		header("Location:choose");
	}
}

?>
<title>Lomo-gan San-code</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<form class="col s7 push-s3" onSubmit={formSubmit}>
				<h2>Lomo-gan San-code</h2>
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
			<div class="col s12 push-s3">
				<div class="row left">

					<a class="btn waves-effect waves-light light-blue accent-3 modal-trigger" href="#referredToOtherHealthFacility">Students Referred to other health facility</a>
					<div id="referredToOtherHealthFacility" class="modal modal-fixed-footer">
						<div class="modal-content">
							<h4>Students referred to other health facility</h4>
							<small class="chip"><?php echo date('l jS \of F Y'); ?></small>
							<table class="centered">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Name</th>
										<th scope="col">Adm No.</th>
										<th scope="col">Class</th>
									</tr>
								</thead>

								<tbody>
									<tr>
										<?php
										$today = date("j");
										$result = mysqli_query($con, "SELECT * FROM `tbl_student` WHERE toOtherHealthFacility = 1 AND day = '$today'");
										$count = 1;
										while ($row = $result->fetch_assoc()) {
											echo "<tr>";
											echo "<td>" . $count . "</td>";
											echo "<td>" . $row["fname"] . " " . $row["sname"] . "</td>";
											echo "<td>" . $row["adm_no"] . "</td>";
											echo "<td>" . $row["class"] . "</td>";
											echo "</tr>";
											$count = $count + 1;
										}
										?>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

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
										<th>Ailment</th>
										<th>Medication</th>
										<th>Complains</th>
										<th>Temp' Reading</th>
										<th>Time</th>
									</tr>
								</thead>

								<tbody id="myTable">
									<?php
									$day = date("j");
									$thisMonth = date('m');
									$result = mysqli_query($con, "SELECT * FROM `tbl_student` WHERE month = '$thisMonth' ORDER BY time desc");
									$count = 1;
									while ($row = $result->fetch_assoc()) {
										$row["time"] = date('l jS \of F Y \a\t h:i A', strtotime($row["time"]));
										if (empty($row["comment"])) {
											$row["comment"] = "No complains yet";
										}
										echo "<tr>";
										echo "<td>" . $count . "</td>";
										echo "<td>" . $row["fname"] . " " . $row["sname"] . "</td>";
										echo "<td id='myTable'>" . $row["adm_no"] . "</td>";
										echo "<td>" . $row["class"] . "</td>";
										echo "<td><b>" . $row["ailment"] . "</b></td>";
										echo "<td><b>" . $row["medication"] . "</b></td>";
										echo '
					      			<td>
					      				 <a class="btn tooltipped" data-position="top" data-tooltip="' . $row["comment"] . '">View complains</a>
					      			</td>
					      	';
										echo "<td>" . $row["temp"] . "</td>";
										echo "<td>" . $row["time"] . "</td>";
										echo "</tr>";
										$count = $count + 1;
									}
									?>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<a href="javascript:void(0)" class="modal-close btn orange" onclick="generate()">Print</a>
						</div>
					</div>

					<a class="btn waves-effect waves-light light-blue accent-3" href="report">report</a>
				</div>
			</div>
			<div class="col s12 push-s3">
				<div class="row center">
					<a href="category"><button class="btn orange"><i class="material-icons">
								arrow_back_ios_new</i><span class="flow-text">Go back</span></button>
					</a>
				</div>
			</div>
		</div>
	</div>
</body>

</html>