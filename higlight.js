function highlighter(element) {
  element.style.backgroundColor = "#629681";
  var currWidth = element.clientWidth;
  var currHeight = element.clientHeight;
  element.style.width = currWidth + 20 + "px";
  element.style.height = currHeight + 20 + "px";
}
function resetStyle(element) {
  element.style.backgroundColor = "#ddd";
  element.style.width = ""; 
  element.style.height = ""; 
  element.style.maxHeight = ""; 
}
function highlightlogin() {
  var register = document.getElementById("register");
  var login = document.getElementById("login");
  highlighter(login);
  resetStyle(register);
}

function highlightregister() {
  var login = document.getElementById("login");
  var register = document.getElementById("register");
  highlighter(register);
  resetStyle(login);
}
function hide(){
  var register =document.getElementById("registers");
  register.hidden =true;
  var login = document.getElementById("inlog");
  login.hidden = false;
}
hide();
function showlogin() {
  var register =document.getElementById("registers");
  register.hidden = true;
  var login = document.getElementById("inlog");
  login.hidden = false;
  highlightlogin();
}
function showregister(){
  var login = document.getElementById("inlog");
  login.hidden = true;
  var register =document.getElementById("registers");
  register.hidden = false;
  highlightregister()
}
showlogin();