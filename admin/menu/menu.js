var dialog_open = false;

function add_listeners() {
	$(".remove").each( function() {
		var id = $(this).attr("data-id");
		console.log( id );	
		$(this).click( function() {
			$.post( "remove.php", { id:id })
				.done( function( ret ) {
				console.log( ret );
				update_rows();
			});
		});
	});
}

function update_rows() {
	$.post( "rows.php", {})
		.done( function( ret ) {
		$("#rows").html( ret );
		add_listeners();
	});
	dialog_open = false;
}

$(document).ready(function() {
	update_rows();
});
