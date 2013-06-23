<?php
include_once("../connect.php");
$results = mysqli_query( $con, "SELECT * FROM pictures ORDER BY position ASC");
?>
	<link href='http://mikelyons.org/reset.css' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Shanti' rel='stylesheet' type='text/css'>

	<link href='../main.css' rel='stylesheet' type='text/css'>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>

<?php 
$back = "index.php";
include_once( "../menu.php" ); ?>
<div id='main_container'>
<?php
	if( isset( $_POST["title"] ) && isset( $_POST["content"] ) ) {
		if( $_POST["title"] != "" && $_POST["content"] != "" ) {
			$title = mysql_real_escape_string( $_POST["title"] );
			$content = mysql_real_escape_string( $_POST["content"] );

			$query = "INSERT INTO stylesheets( title, content ) VALUES( '" . $title . "', '". $content . "')";
			mysqli_query( $con, $query );
			log_action( $con, "Stylesheet Added", "Stylesheet " . $title . " added with content: " . $content );
			header( "Location: index.php" );
		}
		else {
			echo "failed";
		}
	} else {
		?>
		<form method='post' action='add.php' style='padding: 5px;'>
			<a>Title: </a><input type='text' name='title' style='width: 500px;' /><br/>
			<a>Content: </a><br/>
			<textarea style='width:100%; height:500px;' name='content'></textarea>
			<input type='submit' value='Submit' style='width: 300px;' />
		</form>
		<?php
	}
?>
</div>
