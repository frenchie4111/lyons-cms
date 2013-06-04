<?php
include_once("connect.php");
$results = mysqli_query( $con, "SELECT * FROM pictures ORDER BY position ASC");
?>
	<link href='http://mikelyons.org/reset.css' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Shanti' rel='stylesheet' type='text/css'>

	<link href='http://hodenfield.mikelyons.org/admin/main.css' rel='stylesheet' type='text/css'>
	<link href='http://hodenfield.mikelyons.org/admin/pictures/pictures.css' rel='stylesheet' type='text/css'>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>

	<script src="http://hodenfield.mikelyons.org/admin/main.js"></script>
<?php include_once( "menu.php" ); ?>
<div id='main_container'>
	<?php
		if( get_level( $con ) == 2 ) {
	?>
	<div class='left_box'>
		<div style='font-size: 20px;margin:5px;'> Actions: </div>
		<a href='pages/'><div class='button'>Manage Pages</div></a>
		<a href='stylesheets/'><div class='button'>Manage Stylesheets</div></a>
		<a href='menu/'><div class='button'>Manage Menu</div></a>
		<a href='pictures/'><div class='button'>Manage Gallery</div></a>
		<a href='uploads/'><div class='button'>Manage Uploads</div></a>
		<div style='font-size: 20px;margin:5px;'> Advanced Actions: </div>
		<a href='users/'><div class='button'>Manage Users</div></a>
		<a href='scripts/'><div class='button'>Manage Scripts</div></a>
	</div>
	<div class='right_box'>
		<a style='font-size: 20px;'>Action Log</a>
		<table class='table'>
			<thead>
				<th>User</th>
				<th>Action</th>
			</thead>
			<tbody id='log_preview'>
			</tbody>
		</table>
		<a href='log/'><div class='button'>View Full Log</div></a>
	</div>
	<?php
	} else {
	?>
		<a href='pages/'><div class='button'>Edit Pages</div></a>
		<a href='stylesheets/'><div class='button'>Edit Stylesheets</div></a>
		<a href='pictures/'><div class='button'>Manage Gallery</div></a>
	<?php
	}
	?>
</div>
