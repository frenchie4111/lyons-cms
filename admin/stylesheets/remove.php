<?php
	if( isset( $_POST["id"] ) ) {
		include_once("../connect.php");
		$query = "DELETE FROM stylesheets WHERE id=" . $_POST["id"];
		mysqli_query( $con, $query );
		log_action( $con, "Stylesheet Removed", "Stylesheet " . $_POST["id"] . " removed from stylesheet table" );
	} else {
		echo "Failed";
		print_r( $_POST );
	}
?>
