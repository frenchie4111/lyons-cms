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

	<script src="http://hodenfield.mikelyons.org/admin/pictures/pictures.js"></script>
<?php 
$back = "index.php";
include_once( "../menu.php" ); ?>
<div id='main_container'>
<?php
	if( isset( $_POST["title"] ) && isset( $_POST["content"] ) && isset( $_POST["scripts"] ) && isset( $_POST["stylesheets"] ) ) {
		if( $_POST["title"] != "" && $_POST["content"] != "" ) {
			$title = mysql_real_escape_string( $_POST["title"] );
			$content = mysql_real_escape_string( $_POST["content"] );
			$scripts = esc( $con, $_POST['scripts'] );
			$stylesheets = esc( $con, $_POST['stylesheets'] );

			$query = "INSERT INTO pages( title, content, scriptids, stylesheetids ) VALUES( '" . $title . "', '". $content . "', '".$scripts."', '".$stylesheets."')";
			mysqli_query( $con, $query );
			log_action( $con, "Page Added", "Page " . print_r( $_POST, true ) );
			echo $query;
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
			<input type='submit' value='Submit' style='width: 300px;' /><br/>
			Scripts: <input type='text' name='scripts' /> Stylesheets: <input type='text' name='stylesheets' />
		</form>
		<?php
	}
?>
</div>
