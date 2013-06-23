<?php
	if( isset( $_POST["id"] ) ) {
		include_once("../connect.php");
		$query = "DELETE FROM pages WHERE id=" . $_POST["id"];
		mysqli_query( $con, $query );
		log_action( $con, "Page Removed", "Page " . $_POST["id"] . " removed from pages table" );
	} else {
		echo "Failed";
		print_r( $_POST );
	}
?>
