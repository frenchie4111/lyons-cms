function update_log_preview() {
	$.post( "log/preview_rows.php", {})
		.done( function( ret ) {
		$("#log_preview").html( ret );
	});
}

$(document).ready(function() {
	update_log_preview();
	$("#quick_jump_button").click( function() {
		console.log( "quick_jump" );
	});
});
