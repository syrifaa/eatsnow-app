var modal = document.getElementById("modal");
var btn = document.getElementById("add-btn");
var span = document.getElementById("close-btn");

btn.onclick = function() {
  modal.style.display = "flex";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}