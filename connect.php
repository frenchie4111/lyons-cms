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
		echo "<a href=" . ($row['pageid'] == 0?$row['link']:"index.php?page=".$row['pageid']) . ">" . $row['title'] . "</a>";
		echo "</li>";
	}
	echo "</ul>";
}

?>
