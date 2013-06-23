<?php
include_once("../connect.php");
$results = mysqli_query( $con, "SELECT * FROM pictures ORDER BY position ASC");
?>
	<link href='http://mikelyons.org/reset.css' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Shanti' rel='stylesheet' type='text/css'>

	<link href='../main.css' rel='stylesheet' type='text/css'>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>

	<script src="add.js"></script>
<?php 
$back = "index.php";
include_once( "../menu.php" ); ?>
<div id='main_container'>

	<?php
		if( isset( $_POST["target"] ) && isset( $_POST["title"] ) && isset( $_POST["group"] ) ) {
			echo $_POST["target"].'<br/>';
			if( $_POST["target"] == "direct" ) {
				if( isset( $_POST["link"] ) ) {
					echo $_POST["link"];
					$query = "INSERT INTO menu(title, pageid, link, menu_group) VALUES('".mysqli_real_escape_string( $con, $_POST["title"] )."',0,'" . mysqli_real_escape_string( $con, $_POST["link"] ) ."',".esc( $con, $_POST["group"]).")";
					mysqli_query( $con, $query );
					echo $query;
					log_action( $con, "Menu Item Added", "Menu Item added " . print_r( $_POST, true ) );
				}
			} else {
				$query = "INSERT INTO menu(title, pageid, menu_group) VALUES('".mysqli_real_escape_string( $con, $_POST["title"] )."'," . mysqli_real_escape_string( $con, $_POST["target"] ) .",".esc($con, $_POST["group"]).")";
				mysqli_query( $con, $query );
				echo $query;
				log_action( $con, "Menu Item Added", "Menu Item added " . print_r( $_POST, true ) );
			}
			header( "Location: index.php" );
		}
	?>

	<form action='add.php' method='post' >
		Title: <input type='text' name='title' /><br/>
		<select id='target' name='target' >		
			<option>Select a target</option>
			<option value='direct' id='direct'>Direct Link</option>
			<?php include_once("options.php") ?>;
		</select>
		<div style='display: none;' id='link_box'><input type='text' name='link' /></div><br/>
		Group: <input type='text' name='group' /><br/>
		<input type='submit' value='Submit' />
	</form>
</div>
