var dialog_open = false;

function update_rows() {
	$.post( "rows.php", {})
		.done( function( ret ) {
		$("#rows").html( ret );
		add_listeners();
	});
	dialog_open = false;
}

function add_edit_dialog_listeners( id ) {
	
	$("#edit_add[data-id='"+id+"']").click( function() {
		// TODO make the lookup also include id
		$.post( "edituser.php", { id:id, username:$("#edit_username").val(), password:$("#edit_password").val() } )
			.done( function( ret ) {
				hide_edit_dialog();
			});
		hide_edit_dialog();
	});
	$("#edit_close[data-id='"+id+"']").click( function() {
		hide_edit_dialog();
	});
}

function show_edit_dialog( id ) {
	if( !dialog_open ) {
		console.log( $(".username[data-id='"+id+"']").text() );

		var old_username = ( $(".username[data-id='"+id+"']").text() );
		
		$("tr[data-id='"+id+"']").html("	<td><input type='text' id='edit_username' style='width: 100%' value='"+old_username+"' /></td> ");
		$("tr[data-id='"+id+"']").append(" <td><input type='password' id='edit_password' style='width: 100%' /></td> ");
		$("tr[data-id='"+id+"']").append("	<td><div class='button' id='edit_add' data-id='"+id+"' style='display:inline-block'>Save</div><div class='button' id='edit_close' data-id='"+id+"' style='display:inline-block'>Close</div></td>");

		add_edit_dialog_listeners( id );
		dialog_open = true;
	}
}

function hide_edit_dialog( id ) {
	update_rows();
	dialog_open = false;
}

function add_new_dialog_listeners() {
	$("#new_add").click( function() {
		$.post( "adduser.php", { username:$("#new_username").val(), password:$("#new_password").val() } )
			.done( function( ret ) {
				console.log( ret );
				hide_new_dialog();
				update_rows();
			});
		hide_new_dialog();
	});
	$("#new_close").click( function() {
		hide_new_dialog();
	});
}

function show_new_dialog() {
	if( !dialog_open ) {
		$("#new_user").html( "<tr>" );
		$("#new_user").append("	<td><input type='text' id='new_username' style='width: 100%' /></td> ");
		$("#new_user").append(" <td><input type='password' id='new_password' style='width: 100%' /></td> ");
		$("#new_user").append("	<td><div class='button' id='new_add' style='display:inline-block'>Add</div><div class='button' id='new_close' style='display:inline-block'>Close</div></td>");
		$("#new_user").append("</tr>" );
		$("#add_user").hide();
		add_new_dialog_listeners();
		dialog_open = true;
	}
}

function hide_new_dialog() {
	$("#new_user").html("");
	$("#add_user").show();
	dialog_open = false;
}

function add_listeners() {
	$("#add_user").click( function() {
		show_new_dialog();
	});
	$(".user_row").each( function() {
		var id = $(this).attr("data-id");
		
		$(this).find(".username").click( function() {
			show_edit_dialog( id );
		});
		$(this).find(".password").click( function() {
			show_edit_dialog( id );
		});
	});
	$(".remove").each( function() {
		var id = $(this).attr("data-id");
	
		$(this).click( function() {
			$.post( "remove.php", { id:id })
				.done( function( ret ) {
				console.log( ret );
				update_rows();
			});
		});
	});
}

$(document).ready(function() {
	update_rows();
});
