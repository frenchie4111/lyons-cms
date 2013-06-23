<?php
include_once( "../connect.php" );

$results = mysqli_query( $con, "SELECT log.id AS id, log.timestamp AS timestamp, users.username AS username, log.title AS title, log.description AS description FROM log JOIN users ON log.userid = users.id ORDER BY timestamp DESC" );

while( $row = mysqli_fetch_array( $results ) ) {
	echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['timestamp'] . "</td>";
		echo "<td>" . $row['username'] . "</td>";
		echo "<td>" . $row['title'] . "</td>";
		echo "<td>" . substr( $row['description'], 0, 400 )  . "</td>";
	echo "</tr>";
}

?>
