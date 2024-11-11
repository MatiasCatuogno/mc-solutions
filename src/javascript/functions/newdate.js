// NewDate
new Date().getFullYear();
var newDate = new Date();
var copyright = document.getElementById("copyright");

const copyrightFooter = `Copyright © ${new Date().getFullYear()} M.C Solutions`;

copyright.innerHTML = copyrightFooter;