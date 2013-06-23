<?php
include_once( "../connect.php" );

$results = mysqli_query( $con, "SELECT menu.menu_group AS menu_group, menu.id AS id, menu.title AS title, menu.pageid AS pageid, pages.title AS pagename, menu.link AS link FROM menu LEFT JOIN pages ON menu.pageid = pages.id ORDER BY menu.menu_group, menu.title ASC" );

while( $row = mysqli_fetch_array( $results ) ) {
	echo "<tr class='user_row' data-id='".$row['id']."'>";
		echo "<td style='padding:5px;'><a class='group' data-id='".$row['id']."'>" . $row['menu_group'] . "</a></td>";
		echo "<td><a class='title' data-id='".$row['id']."'>" . $row['title'] . "</a></td>";
		if( $row['pageid'] != 0 ) {
			echo "<td>Page</td>";
			echo "<td><a class='content' style='display:block;' data-id='".$row['id']."'>". $row['pagename'] ."</a></td>";
		} else {
			echo "<td>Link</td>";
			echo "<td><a class='content' style='display:block;' data-id='".$row['id']."'>". $row['link'] ."</a></td>";
		}
		echo "<td><a href='edit.php?id=".$row['id']."'><div class='button edit' style='display:inline-block;' data-id='".$row['id']."'>Edit</div></a><div class='button remove' style='display:inline-block;' data-id='".$row['id']."'>Remove</div></td>";
	echo "</tr>";
}

?>
