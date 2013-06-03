$(document).ready(function() {
	add_click_listeners();
});

function add_click_listeners() {
	$(".thumb").each( function() {
		$(this).click( function( event ) {
			$(".overlay_image").attr( "src", $(this).attr("src") );
			$("#overlay_description").text( $(this).attr("data-description"));
			$(".overlay").show();
		});	
	});	
	$(".overlay").click( function() {
		$(".overlay").hide();
	});
	//$(".overlay_image").click( function( event ) {
	//	console.log("Image clicked");
	//	next_picture();
	//	event.preventDefault();
	//});
}

function next_picture() {
	var oldsrc = $(".overlay_image").attr("src");
	var new_img_thumb = $("img[src='"+oldsrc+"']").next("img[class='thumb']");

	$(".overlay_image").attr("src", new_img_thumb.attr("src"));
	$("#overlay_description").text( new_img_thumb.attr("data-description"));
}
function prev_picture() {
	var oldsrc = $(".overlay_image").attr("src");
	var new_img_thumb = $("img[src='"+oldsrc+"']").prev("img[class='thumb']");

	$(".overlay_image").attr("src", new_img_thumb.attr("src"));
	$("#overlay_description").text( new_img_thumb.attr("data-description"));
}
