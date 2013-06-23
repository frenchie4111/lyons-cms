function update_rows() {
	$.post( "rows.php", {})
		.done( function( ret ) {
		$("#rows").html( ret );
	});
}

$(document).ready(function() {
	update_rows();
});
