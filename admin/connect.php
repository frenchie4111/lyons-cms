<?php
$con = mysqli_connect('127.0.0.1', "root", "mike9", "hodenfield");
if( !isset( $open ) ) {
		if( !check_session( $con ) ) {
			header( "Location: http://". $_SERVER['HTTP_HOST'] . "/admin/index.php" );
			echo "Not logged on";		
		}
}

function esc( $con, $str ) {
	return mysqli_real_escape_string( $con, $str );
}

function get_level( $con ) {

	$row = mysqli_fetch_array( mysqli_query( $con, "SELECT access_level FROM users WHERE id=" . $_SESSION['id'] ) );
	return $row['access_level'];
}

function add_picture( $con,  $picture_url, $description ) {
	$row = mysqli_fetch_array( mysqli_query( $con, "SELECT * FROM pictures ORDER BY position DESC" ));
	$query_add_picture = "INSERT INTO pictures(url,description, position) VALUES('" . $picture_url . "', '". $description ."', ". $row['position'] ."+1);";
	mysqli_query($con, $query_add_picture);
}
function add_file( $con,  $url ) {
	$query_add_file= "INSERT INTO uploads(url) VALUES('" . $url . "');";
	mysqli_query($con, $query_add_file );
}

function check_user( $con, $username, $password ) {
	$result = mysqli_query( $con, "SELECT * FROM users WHERE username='" . mysqli_real_escape_string($con, $username) . "'" );
	if( !$result ) {
		echo "User Not Found";
		return false;
	}
	$row = mysqli_fetch_array( $result );
	if( $row['password'] == $password ) {
		return $row['id'];
	}
	return false;
}

function check_session( $con ) {
	session_start();
	if( isset( $_SESSION['username'] ) && isset( $_SESSION['password'] ) ) {
		return check_user( $con, $_SESSION['username'], $_SESSION['password'] );
	} else {
		return false;
	}
}

function start_session( $id, $username, $password ) {
	session_start();
	$_SESSION['id'] = $id;
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
}

function logout() {
	session_start();
	session_destroy();
}

function log_action( $con, $title, $description ) {
	if( check_session( $con ) ) {
		session_start();
		$query = "INSERT INTO log(userid, title, description) VALUES( ". $_SESSION['id'] .", '". mysqli_real_escape_string( $con, $title ) ."', '". mysqli_real_escape_string( $con, $description ) . "')";	
		mysqli_query( $con, $query );
	}
}

?>
