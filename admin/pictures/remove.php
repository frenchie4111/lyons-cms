<?php
	if( isset( $_POST['id'] ) ) {
		include_once( "../connect.php" );
		$results = mysqli_query( $con, "SELECT * FROM pictures WHERE id = " . $_POST['id'] );
		$row = mysqli_fetch_array( $results );
		$position = $row['position'];
		unlink( $row['url'] );
		mysqli_query( $con, "DELETE FROM pictures WHERE id =" . $_POST['id'] );
		mysqli_query( $con, "UPDATE pictures SET position=position-1 WHERE position>".$position);
		log_action( $con, "Removed Picture", "Removed picture " . $row['id'] . " with description: " . $row['description'] . " and image location: " . $row['url'] );
	}
?>
