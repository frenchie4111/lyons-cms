<?php
	if( isset( $_POST["id"] ) ) {
		include_once("../connect.php");
		$query = "DELETE FROM users WHERE id=" . $_POST["id"];
		mysqli_query( $con, $query );
		log_action( $con, "User Removed", "User " . $_POST["id"] . " removed from users table" );
	} else {
		echo "Failed";
		print_r( $_POST );
	}
?>
