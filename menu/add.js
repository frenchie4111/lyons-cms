$(document).ready( function() {
	$("#target").change( function() {
		console.log( $(this).find(":selected").attr("id") );
		if( $(this).find(":selected").attr("id") == "direct" ) {
			$("#link_box").attr( "style", "display:inline-block;" );
		} else {
			$("#link_box").hide();
		}
	});
});
