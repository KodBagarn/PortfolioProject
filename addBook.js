document.addEventListener("DOMContentLoaded", function(){
  document.getElementById('connectAuthorBook').addEventListener('click', function(e){
    e.preventDefault();
    var div = document.getElementById('authorsToBook');
    var author = document.getElementById('Authors');
    var newText = document.createElement("li");
    author.selectedIndex
    newText.innerText = author[author.selectedIndex].innerText;
    div.appendChild(newText);
    hiddenValue = author[author.selectedIndex].value;
    newHidden = document.createElement("input");
    newHidden.type = "hidden";
    newHidden.value = author[author.selectedIndex].value;
    newHidden.name ="authors[]";
    div.appendChild(newHidden);
    author.removeChild(author[author.selectedIndex]);
  })
})
