$(document).ready(function() {
	update_rows();

});

function add_up_listener() {
	$(".up").each( function() {
		$(this).click( function() {
			$.post( "move.php", {id: $(this).attr("data-id"), dir: "up"})
				.done(function(data) {
					update_rows();
			});
		});
	});
}

function add_down_listener() {
	$(".down").each( function() {
		$(this).click( function() {
			$.post( "move.php", {id: $(this).attr("data-id"), dir: "down"})
				.done(function(data) {
					update_rows();
			});
		});
	});
}

var box_open = false;

function show_edit_box( id ) {	
	if( !box_open ) {
		var text = $(".description[data-id='"+id+"']").text();
		$(".description[data-id='"+id+"']").html("<textarea rows=4 cols=71 class='edit_box' data-id='"+id+"'>"+text+"</textarea><input type='submit' class='submit_edit_box' data-id='"+id+"' /><input type='submit' class='close_edit_box' data-id='"+id+"' value='Close' />");

		$("input[type='submit'][class='submit_edit_box'][data-id='"+id+"']").click( function() {
			$.post("editdesc.php", { desc:$("textarea[class='edit_box'][data-id='"+id+"']").val(), id:$(this).attr("data-id") })
				.done( function( ret ) {
					update_rows();
					console.log( ret );
					box_open = false;
				});
		});

		$("input[type='submit'][class='close_edit_box'][data-id='"+id+"']").click( function() {
			box_open = false;
			update_rows();
		});

		box_open = true;
	} 
}

function add_edit_desc_listener() {
	$(".description").each( function() {
		$(this).click( function() {
			show_edit_box( $(this).attr("data-id") );
		});
	});
}

function add_remove_listener() {
	$(".remove").each( function() {
		$(this).click( function() {
			$.post("remove.php", {id:$(this).attr("data-id")})
				.done( function( ret ) {
					console.log( ret );
					update_rows();
				});
		});
	});
}

function add_listeners() {
      add_up_listener();
	  add_down_listener();
	  add_edit_desc_listener();
	  add_remove_listener();
}

function update_rows() {
	$.ajax({
	  url: "rows.php",
	}).done(function(results) {
	  $("#pictures_container").html( results );
	  add_listeners();
	  box_open = false;
	});
}
