<?php
if( isset( $_GET['id'] ) ) {
	include_once("connect.php");
	header('Content-type: text/css');
	$row = mysqli_fetch_array( mysqli_query( $con, "SELECT * FROM stylesheets WHERE id = " . $_GET['id'] ) );
	echo $row['content'];
}
?>
