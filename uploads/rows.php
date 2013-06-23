<?php
include_once( "../connect.php" );

$results = mysqli_query( $con, "SELECT * FROM uploads ORDER BY id ASC" );

while( $row = mysqli_fetch_array( $results ) ) {
	echo "<tr class='user_row' data-id='".$row['id']."'>";
		echo "<td style='padding: 5px;'><a>".$row['id']."</a></td>";
		echo "<td><a>". $_SERVER["HTTP_HOST"] ."/uploads/".$row['url']."</a></td>";
		echo "<td><div class='button remove' data-id='".$row['id']."'>Delete</div></td>";
	echo "</tr>";
}

?>
