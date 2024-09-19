var zaiavka = document.getElementById('myModal');
var btn = document.getElementById("openModalBtn");

btn.onclick = function() {
    zaiavka.style.display = "block";
  }

window.onclick = function(event) {
    if (event.target == zaiavka) {
        zaiavka.style.display = "none";
    }
  }
