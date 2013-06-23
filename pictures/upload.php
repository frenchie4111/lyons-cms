<?php
include_once("../connect.php");
$results = mysqli_query( $con, "SELECT * FROM pictures ORDER BY position ASC");
?>
	<link href='http://mikelyons.org/reset.css' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Shanti' rel='stylesheet' type='text/css'>

	<link href='../main.css' rel='stylesheet' type='text/css'>
	<link href='pictures.css' rel='stylesheet' type='text/css'>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>

	<script src="pictures.js"></script>
<?php 
$back = "index.php";
include_once( "../menu.php" );
?>
<div id='main_container'>
<?php
if( isset( $_POST['hidden'] ) ) {
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$extension = end(explode(".", $_FILES["file"]["name"]));
	$save_location = "../../pictures/";
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 20000)
	&& in_array($extension, $allowedExts)
	|| true)
	  {
	  if ($_FILES["file"]["error"] > 0)
		{
		echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		}
	  else
		{
		if (file_exists($save_location . $_FILES["file"]["name"]))
		  {
		  echo $_FILES["file"]["name"] . " already exists. ";
		  }
		else
		  {
		  move_uploaded_file($_FILES["file"]["tmp_name"],
		  $save_location . $_FILES["file"]["name"]);
			add_picture(  $con, $save_location . $_FILES["file"]["name"], mysqli_real_escape_string( $con, $_POST['description']) );
			log_action( $con, "Picture Added", "Added Picture to gallery with description: " . $_POST['description'] . " and file location: " . $save_location . $_FILES["file"]["name"] ); 
			header( "Location: index.php" );
		  }
		}
	  }
	else
	  {
	  echo "Invalid file";
	  }
}
?>
		<div class="pictures_row" id="form">
			<form action="upload.php" method="post"
			enctype="multipart/form-data">
				<label for="description">Image Description</label><br/>
				<textarea name="description" rows="15" cols="80"></textarea><br/>
				<label for="file">Filename:</label>
				<input type="file" name="file" id="file"><br>
				<input type="submit" name="submit" value="Submit" />
				<input type="hidden" name="hidden" value="hidden" />
			</form>
		</div>
</div>
