<?php
$con = mysqli_connect('127.0.0.1', "root", "mike9", "hodenfield");

function esc( $con, $str ) {
	return mysqli_real_escape_string( $con, $str );
}

function echo_page( $con, $id ) {
	$row = mysqli_fetch_array( mysqli_query( $con, "SELECT * FROM pages WHERE id=". esc( $con, $id ) ) );
	echo $row['content'];
}

function echo_menu( $con ) {
	echo "<ul>";
	$results = mysqli_query( $con, "SELECT * FROM menu" );
	while( $row = mysqli_fetch_array( $results ) ) {
		echo "<li>";
		echo "<a href=" . ($row['pageid'] == 0?$row['link']:"index.php?id=".$row['pageid']) . ">" . $row['title'] . "</a>";
		echo "</li>";
	}
	echo "</ul>";
}

function echo_menu_group( $con, $group ) {
	echo "<ul>";
	$results = mysqli_query( $con, "SELECT * FROM menu WHERE menu_group=" . $group );
	$row = mysqli_fetch_array( $results );
	while( $row ) {
		$nextrow = mysqli_fetch_array( $results );
		echo "<li>";
		echo "<a href=" . ($row['pageid'] == 0?$row['link']:"index.php?id=".$row['pageid']) . ">" . $row['title'] . "</a>";
		if( $nextrow ) {
			echo " | "; // TODO this needs a picture
		}
		echo "</li>";
		$row = $nextrow;
	}
	echo "</ul>";
}

function echo_stylesheets_page( $con, $pageid ) {
	$page_row = mysqli_fetch_array( mysqli_query( $con, "SELECT * FROM pages WHERE id=" . $pageid ) );
	$stylesheets = split( ",", $page_row['stylesheetids'] );
	foreach( $stylesheets as $stylesheet ) {
		echo "<link href='css.php?id=".$stylesheet."' rel='stylesheet' type='text/css'>";
	}
}
function echo_scripts_page( $con, $pageid ) {
	$page_row = mysqli_fetch_array( mysqli_query( $con, "SELECT * FROM pages WHERE id=" . $pageid ) );
	$scripts = split( ",", $page_row['scriptids'] );
	foreach( $scripts as $script ) {
		echo "<script src='js.php?id=".$script."'></script>";
	}
}


?>
