// OnScroll
window.onscroll = function () {
 var bodyScrollTop = document.body.scrollTop;
 var elementScrollTop = document.documentElement.scrollTop;

 var flecha = document.getElementById("flecha");

 if (bodyScrollTop > 70 || elementScrollTop > 70) {
  flecha.style.visibility = "visible";
 } else {
  flecha.style.visibility = "hidden";
 }
};