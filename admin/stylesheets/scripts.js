var dialog_open = false;

function add_listeners() {
	$(".remove").each( function() {
		$(this).click( function() {
			$.post( "remove.php", {id:$(this).attr("data-id")})
				.done( function() {
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
