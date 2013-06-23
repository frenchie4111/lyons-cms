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

	<script src="http://hodenfield.mikelyons.org/admin/pictures/pictures.js"></script>
<?php include_once( "../menu.php" ); ?>
<div id='main_container'>
	<div id='header'>
		Gallery Manager
	</div>
	<table class='table'> 
		<thead> 
			<tr>
				<th class='image_td'>Image</th>
				<th class='move_buttons_td'>Position</th>
				<th class='description_td'>Description</th>
				<th class='remove_td'></th>
			</tr>
		</thead>
		<tbody id='pictures_container'>

		</tbody>
	</table>
	<a href="upload.php"><div class='button'>Add a picture</div></a>
</div>
