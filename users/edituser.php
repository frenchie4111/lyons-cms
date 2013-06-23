<?php
	if( isset( $_POST["id"] ) && isset( $_POST["username"] ) && isset( $_POST["password"] ) ) {
		include_once("../connect.php");
		$query = "UPDATE users SET username='".$_POST["username"]."', password='". md5( $_POST["password"] )."' WHERE id=".$_POST['id'];
		if( $_POST["password"] == "" ) {
			$query = "UPDATE users SET username='".$_POST["username"]."' WHERE id=".$_POST['id'];
		}
		print_r( $_POST );
		echo $query;
		log_action( $con, "User Edited", "User " . $_POST["id"]  . " Edited username:" . $_POST["username"] . " password: " . md5( $_POST["password"] ) );
		mysqli_query( $con, $query );
		if( isset( $_SESSION["username"] ) ) {
			if( $_SESSION["username"] == $_POST["username"] ) {
				logout();
				echo "reload";
			}
		}
	} else {
		echo "Failed";
		print_r( $_POST );
	}
?>
