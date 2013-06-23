$(document).ready( function() {
	$("#save_button").click( function() {
		$("#save_status").text( "Saving..." );
		$.post( "edit.php", {id:$(this).attr("data-id"), title:$("input[name='title']").val(), content:$("textarea[name='content']").val(), scripts:$("input[name='scripts']").val(), stylesheets:$("input[name='stylesheets']").val() })
			.done( function( ret ) {
			console.log( ret );
			$("#save_status").text("Saved");
		});
	});
});
