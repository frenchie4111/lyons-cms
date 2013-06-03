<?php
	if( isset( $_POST["id"] ) ) {
		include_once("../connect.php");
		$query = "DELETE FROM menu WHERE id=" . $_POST["id"];
		mysqli_query( $con, $query );
		log_action( $con, "Menu Item Removed", "Menu Item " . $_POST["id"] . " removed from menu table" );
	} else {
		echo "Failed";
		print_r( $_POST );
	}
?>
