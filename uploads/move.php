<?php
	if( isset( $_REQUEST['id'] ) && isset( $_REQUEST['dir'] ) ) {
		include_once("../connect.php");
		$row = mysqli_fetch_array(mysqli_query( $con, "SELECT * FROM pictures WHERE id = ". $_REQUEST['id']));
		$position = $row['position'];
		if( $_REQUEST['dir'] == "up" ) {
			mysqli_query( $con, "UPDATE pictures SET position=position+1 WHERE position=" . $position . "-1");
			mysqli_query( $con, "UPDATE pictures SET position=position-1 WHERE id=" . $_REQUEST['id'] );
		}
		if( $_REQUEST['dir'] == "down" ) {
			mysqli_query( $con, "UPDATE pictures SET position=position-1 WHERE position=" . $position . "+1");
			mysqli_query( $con, "UPDATE pictures SET position=position+1 WHERE id=" . $_REQUEST['id'] );
		}
		log_action( $con, "Picture Moved", "Picture " . $_REQUEST['id'] . " moved " . $_REQUEST['dir'] );
	}
?>
