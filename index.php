<?php
$open = true;
include_once("connect.php");
if( check_session( $con ) ) {
	header( "Location: portal.php" );
}
if( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
	$ret = check_user( $con, $_POST['username'], md5( $_POST['password'] ) );
	if( $ret ) {
		start_session( $ret, $_POST['username'], md5( $_POST['password'] ) );
		header( "Location: portal.php" );
	}
}
$results = mysqli_query( $con, "SELECT * FROM pictures ORDER BY position ASC");
?>
	<link href='http://mikelyons.org/reset.css' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Shanti' rel='stylesheet' type='text/css'>

	<link href='../main.css' rel='stylesheet' type='text/css'>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>

<?php 
$hide_buttons = true;
include_once( "menu.php" ); ?>
<div id='main_container' style='text-align: center;'>
	<form method='post' action='index.php'>
		<div class='content'>
			<table style='margin: 0px auto;'>
				<tr>
					<td>Username:</td> <td><input type='text' name='username' /></td>
				</tr>
				<tr>
					<td>Password:</td> <td><input type='password' name='password' /></td>
				</tr>
			</table>
		</div>
		<input style='width: 200px;' type='submit' value ='Login' />
	</form>
</div>
