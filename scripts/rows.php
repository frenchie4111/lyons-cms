<?php
include_once( "../connect.php" );

$results = mysqli_query( $con, "SELECT * FROM scripts ORDER BY title ASC" );

while( $row = mysqli_fetch_array( $results ) ) {
	echo "<tr class='user_row' data-id='".$row['id']."'>";
		echo "<td style='padding:5px;'><a class='id' data-id='".$row['id']."'>" . $row['id'] . "</a></td>";
		echo "<td><a class='title' data-id='".$row['id']."'>" . $row['title'] . "</a></td>";
		if( strlen( $row['content'] ) > 70 ) {
			echo "<td><a class='content' style='display:block;' data-id='".$row['id']."'>". substr( $row['content'], 0, 70 ) ."...</a></td>";
		} else {
			echo "<td><a class='content' style='display:block;' data-id='".$row['id']."'>". substr( $row['content'], 0, 70 ) ."</a></td>";
		}
		echo "<td><a href='edit.php?id=".$row['id']."'><div class='button edit' style='display:inline-block;' data-id='".$row['id']."'>Edit</div></a><div class='button remove' style='display:inline-block;' data-id='".$row['id']."'>Remove</div></td>";
	echo "</tr>";
}

?>
