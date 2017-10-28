$(document).ready( function() {
	var icon = $(".hamburger");
	var menu = $(".topnav");

	icon.click( function(event) {
		event.preventDefault();
		menu.toggleClass("open");
	} );
} );
