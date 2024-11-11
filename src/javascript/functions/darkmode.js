(function applyDarkModePreference() {
 const body = document.getElementById("body");
 const toggleSwitch = document.getElementById("blackmode");
 const isDarkMode = localStorage.getItem("blackmode") === "true";

 if (isDarkMode) {
  body.classList.add("blackmode");
  toggleSwitch.checked = true;
 }
})();

function DarkMode() {
 const body = document.getElementById("body");
 const toggleSwitch = document.getElementById("blackmode");

 const isDarkMode = body.classList.contains("blackmode");

 if (isDarkMode) {
  body.classList.remove("blackmode");
  localStorage.setItem("blackmode", "false");
  toggleSwitch.checked = false;
 } else {
  body.classList.add("blackmode");
  localStorage.setItem("blackmode", "true");
  toggleSwitch.checked = true;
 }
}