


var icon = document.getElementsByClassName("hamburger");
var menu = document.getElementsByClassName('topnav');

function toggleNav(){
	icon.classList.toggle("open");
	menu.classList.toggle("open");

}

	/*if (icon.toggleClass("open")= true) {
		menu.hover(function(event){
			even.preventDefault();
			icon.toggleClass("open");
			menu.toggleClass("open");
		});
	} */





var questionmark = document.getElementById("infotext");

function toggleClassInfo(){											//This line of code was adapted from a post at: https://codepen.io/jkohlin/pen/JYjYYP     Accessed: 2017-05-12
	questionmark.classList.toggle("open");									// Here is a function that toggle between two css styles and thus enables a info screen
}
