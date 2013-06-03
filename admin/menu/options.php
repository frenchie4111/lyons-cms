<?php
include_once( "../connect.php" );
$result = mysqli_query( $con, "SELECT pages.id AS id, pages.title AS title, menu.id AS menuid FROM pages LEFT JOIN menu ON menu.pageid = pages.id GROUP BY pages.id" );
while( $option_row = mysqli_fetch_array( $result ) ) {
	if( isset( $selected ) ) {
		if( $selected == $option_row['menuid'] ) {
			echo "<option selected value='".$option_row['id']."'>" . $option_row['title'] . "</option>";
		} else {
			echo "<option value='".$option_row['id']."'>" . $option_row['title'] . "</option>";
		}
	} else {
		echo "<option value='".$option_row['id']."'>" . $option_row['title'] . "</option>";
	}
}
?>
