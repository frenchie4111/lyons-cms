<?php
include_once("../connect.php");
?>
	<link href='http://mikelyons.org/reset.css' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Shanti' rel='stylesheet' type='text/css'>

	<link href='http://hodenfield.mikelyons.org/admin/main.css' rel='stylesheet' type='text/css'>
	<link href='http://hodenfield.mikelyons.org/admin/pictures/pictures.css' rel='stylesheet' type='text/css'>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>

	<script src="http://hodenfield.mikelyons.org/admin/log/log.js"></script>
<?php include_once( "../menu.php" ); ?>
<div id='main_container'>

<table class='table'>
	<thead>
		<th style='width: 20px;'>ID</th>
		<th style='width: 100px;'>Timestamp</th>
		<th style='width: 100px;'>User</th>
		<th style='width: 200px;'>Title</th>
		<th>Description</th>
	</thead>
	<tbody id='rows'>

	</tbody>
</table>
</div>
