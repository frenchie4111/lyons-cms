<?php
	include_once( "connect.php" );

	echo_menu( $con );

	if( isset( $_GET["page"] ) ) {
		echo_page( $con, $_GET["page"] );
	} else {
		echo_page( $con, 1 );
	}
?>
<br/>
<a href='admin/'>Administration</a>
