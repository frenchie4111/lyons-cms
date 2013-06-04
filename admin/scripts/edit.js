$(document).ready( function() {
	$("#save_button").click( function() {
		$("#save_status").text( "Saving..." );
		$.post( "edit.php", {id:$(this).attr("data-id"), title:$("input[name='title']").val(), content:$("textarea[name='content']").val() })
			.done( function( ret ) {
			$("#save_status").text("Saved");
		});
	});
});
