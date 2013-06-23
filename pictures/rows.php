<?php
	include_once("../connect.php");
	$results = mysqli_query( $con, "SELECT * FROM pictures ORDER BY position ASC");
	$pos = "first";
	$current_id;

	$first = true;
	$row = mysqli_fetch_array( $results );
	while( $row )  {
		$current_id = $row['id'];
		$next_row = mysqli_fetch_array( $results );
		echo "<tr>";
			echo "<td class='image_td'>";
				echo "<img class='picture_thumb' src='". $row['url'] ."' />";
			echo "</td>";


			echo "<td class='move_buttons_td'>";
				if( !$first ) {
					echo "<div class='position_changer up subtle_button' data-id='". $current_id . "'>Up</div><br/>";
				} else {
					echo "<br/>";
				}
				echo $row['position'] . "<br/>";	
				if( $next_row ) { // Don't show the last down move button
					echo "<div class='position_changer down subtle_button' data-id='". $current_id . "'>Down</div>";
				} else {
					echo "<br/>";
				}
			echo "</td>";

			echo "<td class='description_td'>";
				$desc = $row['description'];
				if( $row['description'] == "" ) {
					$desc = "No Description";
				}
				echo "<div class='description subtle_button' data-id='". $current_id . "'>" . $desc . "</div>";
			echo "</td>";

			echo "<td class='remove_td'>";
				echo "<div class='remove button' data-id='". $current_id ."'>Remove</div>";
			echo "</td>";

		echo "</tr>";
		$row = $next_row;
		$first = false;
	}
?>
