<?php
include_once("../connect.php");
$results = mysqli_query( $con, "SELECT * FROM pictures ORDER BY position ASC");
?>
	<link href='http://mikelyons.org/reset.css' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Shanti' rel='stylesheet' type='text/css'>

	<link href='http://hodenfield.mikelyons.org/admin/main.css' rel='stylesheet' type='text/css'>
	<link href='http://hodenfield.mikelyons.org/admin/pictures/pictures.css' rel='stylesheet' type='text/css'>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>

	<script src="http://hodenfield.mikelyons.org/admin/pages/edit.js"></script>
<?php 
$back = "index.php";
include_once( "../menu.php" ); ?>
<div id='main_container'>
<?php
	if( isset( $_POST["id"] ) && isset( $_POST["title"] ) && isset( $_POST["content"] ) ) {
		if( $_POST["title"] != "" && $_POST["content"] != "" ) {
			$title = mysql_real_escape_string( $_POST["title"] );
			$content = mysql_real_escape_string( $_POST["content"] );
			
			$query = "UPDATE pages SET title='".$title."', content='".$content."' WHERE id=" . $_POST["id"];
			mysqli_query( $con, $query );
			log_action( $con, "Page Edited", "Page " . $_POST["id"] . " edited with title: " . $title . " and with content: " . $content );
			header( "Location: index.php" );
		}
		else {
			echo "failed";
		}
	} else if( isset($_GET["id"]) ) {
		$row = mysqli_fetch_array( mysqli_query( $con, "SELECT * FROM pages WHERE id=" . $_GET["id"] ) );
		?>
		<form method='post' action='edit.php' style='padding: 5px;'>
			<a>Title: </a><input type='text' name='title' style='width: 500px;' value='<?php echo $row["title"]; ?>' /><br/>
			<a>Content: </a><br/>
			<textarea style='width:100%; height:500px;' name='content'><?php echo $row["content"];?></textarea>
			<input type='hidden' value='<?php echo $_GET["id"];?>' name='id' />
			<input type='submit' value='Save and Exit' style='width: 300px;' />
			<input type='button' value='Save' id='save_button' data-id='<?php echo $_GET["id"];?>' style='width: 300px;' />
			<a id="save_status"></a>
		</form>
		<?php
	}
?>
</div>
