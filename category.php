<?php
session_start();
include 'inc/header.php';
#include "inc/report_format.php";
?>

<body>
	<div class="container">
		<div class="row">
			<div class="center-align">
				<div class="vertical-center">
					<div class="row">
						<div class="col s12 m11">
							<h2>Lomogan's SanCode</h2>
							<div class="card blue-grey darken-1">
								<div class="card-content white-text">
									<span class="card-title">Pick an option :</span>
								</div>
								<div class="card-action">
									<a href="index.php" class="btn waves-effect waves-light">Students</a>
									<a href="staff/index.php" class="btn waves-effect waves-light">Staff</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>