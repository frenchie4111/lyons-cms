<?php
	if( isset( $_POST["username"] ) && isset( $_POST["password"] ) ) {
		include_once("../connect.php");
		$query = "INSERT INTO users( username, password ) VALUES( '" . $_POST['username'] . "', '". md5( $_POST['password'] ). "')";
		mysqli_query( $con, $query );
		log_action( $con, "User Added", "User " . $_POST["username"] . " added with password hash: " . md5( $_POST["password"] ) );
	} else {
		echo "Failed";
		print_r( $_POST );
	}
?>
