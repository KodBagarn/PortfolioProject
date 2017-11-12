window.onload
var icon = document.getElementById("hamburger").addEventListener("click", toggleNav);

var menu = document.getElementById('topnav');

function toggleNav(){
	menu.classList.replace("close","open");
}

var questionmark = document.getElementById("infotext");

function toggleClassInfo(){
	questionmark.classList.toggle("open");
}
