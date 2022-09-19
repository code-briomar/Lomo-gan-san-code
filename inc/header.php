<?php
include_once('inc/class.php');
$functions = new DB();
$functions->db_con();
$con = new mysqli("localhost", "root", "", "san-code");
$con2 = new mysqli("localhost", "root", "", "test");

#Force cache refresh
function auto_version($file = '')
{
	if (!file_exists($file))
		return $file;

	$mtime = filemtime($file);
	return $file . '?' . $mtime;
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Materialize CSS-->
	<link rel="stylesheet" type="text/css" href="<?php echo auto_version('materialize/css/materialize.min.css'); ?>">
	<script type="text/javascript" src="<?php echo auto_version('materialize/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo auto_version('materialize/js/materialize.min.js'); ?>"></script>

	<!--JSPDF-->
	<script type="text/javascript" src="<?php echo auto_version('jspdf/jspdf.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo auto_version('jspdf/jspdf.plugin.autotable.min.js'); ?>"></script>

	<script type="text/javascript" src="<?php echo auto_version('inc/script.js'); ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo auto_version('inc/style.css'); ?>">
	<link href="<?php echo auto_version('materialize\material-design-icons\materialize-icons.css" rel="stylesheet'); ?>" />