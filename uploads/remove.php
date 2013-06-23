<?php
	if( isset( $_POST['id'] ) ) {
		include_once( "../connect.php" );
		$results = mysqli_query( $con, "SELECT * FROM uploads WHERE id = " . $_POST['id'] );
		$row = mysqli_fetch_array( $results );
		unlink( "../../uploads/" . $row['url'] );
		mysqli_query( $con, "DELETE FROM uploads WHERE id =" . $_POST['id'] );
		log_action( $con, "Removed File", "Removed File: " . print_r( $_POST, true ) );
	}
?>
