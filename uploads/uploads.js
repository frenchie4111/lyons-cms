$(document).ready(function() {
	update_rows();
});

function add_remove_listener() {
	$(".remove").each( function() {
		$(this).click( function() {
			$.post("remove.php", {id:$(this).attr("data-id")})
				.done( function( ret ) {
					update_rows();
				});
		});
	});
}

function add_listeners() {
	  add_remove_listener();
}

function update_rows() {
	$.ajax({
	  url: "rows.php",
	}).done(function(results) {
	  $("#rows").html( results );
	  add_listeners();
	});
}
