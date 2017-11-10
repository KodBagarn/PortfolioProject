document.addEventListener("DOMContentLoaded", function(){
  document.getElementById('connecttagBook').addEventListener('click', function(e){
    e.preventDefault();
    var tag = document.getElementById('tagselection');
    var newText = document.createElement("li");
    tag.selectedIndex
    newText.innerText = tag[tag.selectedIndex].innerText;
    div.appendChild(newText);
    hiddenValue = tag[tag.selectedIndex].value;
    newHidden = document.createElement("input");
    newHidden.type = "hidden";
    newHidden.value = tag[tag.selectedIndex].value;
    newHidden.name ="tags[]";
    div.appendChild(newHidden);
    tag.removeChild(tag[tag.selectedIndex]);
  })
})
