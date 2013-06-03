<?php
include_once("connect.php");
?>
<html>
<head>
	<link href='main.css' rel='stylesheet' type='text/css'>
	<link href='http://mikelyons.org/reset.css' rel='stylesheet' type='text/css'>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>

	<script src="pictures.js"></script>	
</head>
<body>
<?php
$results = mysqli_query( $con, "SELECT * FROM pictures ORDER BY position ASC");
while( $row = mysqli_fetch_array( $results ) ) 
{
	echo "<img class='thumb' data-description='".$row['description']."' src='" . $row['url']  . "' />" ;
}
?>
<div class='overlay' style='display:none;' >
	<img class="overlay_image" src="pictures/download.png" />
	<div id='overlay_description'></div>
</div>
</body>
</html>
