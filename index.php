<!DOCTYPE html>
<html>
<head>
<?php
	include_once( "connect.php" );
?>
	<link href='http://mikelyons.org/reset.css' rel='stylesheet' type='text/css'>
	<link href='main.css' rel='stylesheet' type='text/css'>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>

	<?php
		$page = 8;
		if( isset( $_GET["id"] ) ) {
			$page = $_GET["id"];
		}
		echo_stylesheets_page( $con, $page );
		echo_scripts_page( $con, $page );
	?>
</head>
<body>
	<div id="header">
		<div class="content">
			<img src="http://hodenfield.mikelyons.org/uploads/logo.png" />
		</div>
	</div>
	<div id="menu">
		<div class="content" style='width:1150px;'>
			<div class="menu" id="left_menu">
				<?php
				echo_menu_group( $con, 1 );
				?>
			</div>
			<div class="menu" id="right_menu">
				<?php
				echo_menu_group( $con, 2 );
				?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div id="content">
		<div class="content">
			<?php
				echo_page( $con, $page );			
			?>
		</div>
	</div>
	<div id="footer">
		<div class="content">
			<a>
				Copywrite &copy; Trudy Hodenfield, 2013. All Rights Reserved.
			</a>
			<div style='float:right; display:inline-block;'>
				<a>
					Website created by <a href="http://mikelyons.org">Mike Lyons</a>
				</a>
			</div>
		</div>
	</div>
</body>
</html>
