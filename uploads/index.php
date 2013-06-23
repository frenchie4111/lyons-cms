<?php
include_once("../connect.php");
$results = mysqli_query( $con, "SELECT * FROM pictures ORDER BY position ASC");
?>
	<link href='http://mikelyons.org/reset.css' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Shanti' rel='stylesheet' type='text/css'>

	<link href='../main.css' rel='stylesheet' type='text/css'>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>

	<script src="uploads.js"></script>
<?php include_once( "../menu.php" ); ?>
<div id='main_container'>
	<div id='header'>
		Gallery Manager
	</div>
	<table class='table'> 
		<thead> 
			<tr>
				<th style='width:25px;'>ID</th>
				<th class='url'>Url</th>
				<th style='width:100px;'></th>
			</tr>
		</thead>
		<tbody id='rows'>

		</tbody>
	</table>
	<a href='upload.php'><div class='button'>Upload New</div></a>
</div>
