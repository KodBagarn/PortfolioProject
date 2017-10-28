$(document).ready( function() {
	var icon = $(".hamburger");
	var menu = $(".topnav");

	icon.click(function(event) {
		event.preventDefault();
		icon.toggleClass("open");
		menu.toggleClass("open");
	} );

	/*if (icon.toggleClass("open")= true) {
		menu.hover(function(event){
			even.preventDefault();
			icon.toggleClass("open");
			menu.toggleClass("open");
		});
	} */
});
