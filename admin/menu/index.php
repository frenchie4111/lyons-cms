<?php
include_once("../connect.php");
$results = mysqli_query( $con, "SELECT * FROM pictures ORDER BY position ASC");
?>
	<link href='http://mikelyons.org/reset.css' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Shanti' rel='stylesheet' type='text/css'>

	<link href='http://hodenfield.mikelyons.org/admin/main.css' rel='stylesheet' type='text/css'>
	<link href='http://hodenfield.mikelyons.org/admin/pictures/pictures.css' rel='stylesheet' type='text/css'>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>

	<script src="http://hodenfield.mikelyons.org/admin/menu/menu.js"></script>
<?php include_once( "../menu.php" ); ?>
<div id='main_container'>
<table class='table'>
	<thead>
		<th style='width:25px;'>ID</th>
		<th style='width:125px;'>Title</th>
		<th style='width:75px;'>Type</th>
		<th>Target</th>
		<th style='width:130px;'></th>
	</thead>
	<tbody id='rows'>

	</tbody>
</table>
<a href='add.php'><div class='button' id='#new_item'>New Menu Item</div></a>
</div>