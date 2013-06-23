<?php
include_once( "../connect.php" );

$results = mysqli_query( $con, "SELECT log.id AS id, log.timestamp AS timestamp, users.username AS username, log.title AS title, log.description AS description FROM log JOIN users ON log.userid = users.id ORDER BY timestamp DESC LIMIT 10" );

while( $row = mysqli_fetch_array( $results ) ) {
	echo "<tr>";
		echo "<td>" . $row['username'] . "</td>";
		echo "<td>" . $row['title'] . "</td>";
	echo "</tr>";
}

?>
