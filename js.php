<?php
if( isset( $_GET['id'] ) ) {
	include_once("connect.php");
	header("Content-type: text/javascript");
	$row = mysqli_fetch_array( mysqli_query( $con, "SELECT * FROM scripts WHERE id = " . $_GET['id'] ) );
	echo $row['content'];
}
?>
