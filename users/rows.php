<?php
include_once( "../connect.php" );

$results = mysqli_query( $con, "SELECT * FROM users ORDER BY username ASC" );

while( $row = mysqli_fetch_array( $results ) ) {
	echo "<tr class='user_row' data-id='".$row['id']."'>";
		echo "<td style='padding:5px;'><a class='subtle_button username' data-id='".$row['id']."'>" . $row['username'] . "</a></td>";
		echo "<td><a class='subtle_button password' data-id='".$row['id']."'>" . $row['password'] . "</a></td>";
		echo "<td><a class='button remove' style='display:block;' data-id='".$row['id']."'>Remove</a></td>";
	echo "</tr>";
}

?>
