$(document).ready( function() {
	var icon = $(".hamburger");
	var menu = $(".topnav");

	icon.click( function(event) {
		event.preventDefault();
		icon.toggleClass("open");
		menu.toggleClass("open");
	} );
} );
