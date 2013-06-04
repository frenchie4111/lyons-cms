<?php
include_once("connect.php");

$results = mysqli_query( $con, "SELECT * FROM pictures ORDER BY position ASC");
while( $row = mysqli_fetch_array( $results ) ) 
{
	echo "<img class='thumb' data-description='".$row['description']."' src='" . $row['url']  . "' />" ;
}
?>
