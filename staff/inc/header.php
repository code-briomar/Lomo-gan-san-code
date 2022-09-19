<?php
include_once('inc/class.php');
$functions = new DB();
$functions->db_con();
$con = new mysqli("localhost", "root", "", "san-code");
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Materialize CSS-->
	<link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css">
	<script type="text/javascript" src="materialize/jquery.min.js"></script>
	<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
	<script type="text/javascript" src="inc/script.js" async="off"></script>
	<link rel="stylesheet" type="text/css" href="inc/style.css">
	<link href="materialize\material-design-icons\materialize-icons.css" rel="stylesheet" />