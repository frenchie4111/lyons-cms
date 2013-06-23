<div id='menu_container'>
	<div id='menu_header'>
		Lyons CMS
	</div>
	<div id='menu_buttons'>
		<?php
		if( !isset($hide_buttons) ) {
			if( isset($back) && $back != "" ) {
				echo "<a href='". $back ."'>";
					echo "<div class='button menu_button' style='margin: 0px; padding: 7px;' class='button'>";;
						echo "Back";
					echo "</div>";
				echo "</a>";
			}
		?>
<!--
		<div class='button menu_button' style='margin: 0px; padding: 7px; position: relative;' class='button'>
			<div id='quick_jump_button'>
				Quick Jump
			</div>
			<div id='quick_jump_menu'> 
				<table class='.table'>
					<tbody>
					<tr><td>Test1</td></tr>
					<tr><td>Test2</td></tr>
					</tbody>
				</table>
			</div>
		</div> -->
		<a href='http://<?php echo $_SERVER['HTTP_HOST'] . "/admin/"; ?>'>
			<div class='button menu_button' style='margin: 0px; padding: 7px;' class='button'>
				Home
			</div>
		</a>
		<a href='http://<?php echo $_SERVER['HTTP_HOST'] . "/admin/logout.php"; ?>'>
			<div class='button menu_button' style='margin: 0px; margin-right: 5px; padding: 7px;' class='button'>
				Logout
			</div>
		</a>
		<?php
		}
		?>
	</div>
</div>
