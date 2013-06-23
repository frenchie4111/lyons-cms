<?php
	if( isset( $_POST['desc'] ) && isset( $_POST['id'] ) ) {
		include_once( "../connect.php" );
		mysqli_query( $con, "UPDATE pictures SET description='". mysqli_real_escape_string( $con, $_POST['desc'] ) ."' WHERE id= " . $_POST['id'] );
		log_action( $con, "Picture Description Edited", "Picture " . $_POST['id'] . "'s description changed to: " . $_POST['desc'] );
	}
?>
