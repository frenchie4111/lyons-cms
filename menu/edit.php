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
		if( isset( $_POST["id"] ) && isset( $_POST["target"] ) && isset( $_POST["title"] ) && isset( $_POST["group"] ) ){
			echo $_POST["target"].'<br/>';
			if( $_POST["target"] == "direct" ) {
				if( isset( $_POST["link"] ) ) {
					echo $_POST["link"];
					$query = "UPDATE menu SET title='".mysqli_real_escape_string( $con, $_POST["title"] )."',pageid=0,link='" . mysqli_real_escape_string( $con, $_POST["link"] ) ."',menu_group=".esc($con, $_POST['group'])." WHERE id=".$_POST['id']."";
					mysqli_query( $con, $query );
					log_action( $con, "Menu Item Edited", "Menu Item edited " . print_r( $_POST, true ) );
				}
			} else {
				$query = "UPDATE menu SET title='".mysqli_real_escape_string( $con, $_POST["title"] )."', pageid=" . mysqli_real_escape_string( $con, $_POST["target"] ) .",link=NULL,menu_group=".esc($con, $_POST['group'])." WHERE id=".$_POST['id'];
				mysqli_query( $con, $query );
				log_action( $con, "Menu Item Edited", "Menu Item edited " . print_r( $_POST, true ) );
			}
			header( "Location: index.php" );
		}
	?>
	<?php
	if( isset( $_GET["id"] ) ) {
		$row = mysqli_fetch_array( mysqli_query( $con, "SELECT id, title, pageid,link,menu_group FROM menu WHERE id=" . $_GET['id'] ) );
?>
	<form action='edit.php' method='post' >
		Title: <input type='text' name='title' value='<?php echo $row['title'] ?>' /><br/>
		<select id='target' name='target' >		
			<?php 
				if( $row['pageid'] == 0 ) {
					include_once("options.php");
					echo "<option selected value='direct' id='direct'>Direct Link</option>";
				} else {
					$selected = $_GET['id'];
					include_once("options.php");
					echo "<option value='direct' id='direct'>Direct Link</option>";
				}
			?>
		</select>
		<?php
		if( $row['pageid'] == 0 ) {
			echo "<div style='display: inline-block;' id='link_box'><input type='text' name='link' value='".$row['link']."' /></div><br/>";
		} else {
			echo "<div style='display: none;' id='link_box'><input type='text' name='link' /></div><br/>";
		}
		?>
		Group: <input type='text' name='group' value='<?php echo $row['menu_group'];?>' /><br/>
		<input type='submit' value='Submit' />
		<input type='hidden' value='<?php echo $row['id']?>' name='id' />
	</form>

	<?php
	}
	?>
</div>
