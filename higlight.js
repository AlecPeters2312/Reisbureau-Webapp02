function highlighter(element) {
  if (!element.dataset.enlarged) {
    element.style.backgroundColor = "#97B2DF";
    var currWidth = element.clientWidth;
    var currHeight = element.clientHeight;
    element.style.width = currWidth + 5 + "px";
    element.style.height = currHeight + 5 + "px";
    element.dataset.enlarged = "true";
  }
}

function resetStyle(element) {
  element.style.backgroundColor = "white";
  element.style.width = "";
  element.style.height = "";
  delete element.dataset.enlarged;
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

function hide() {
  var register = document.getElementById("registers");
  register.hidden = true;
  var login = document.getElementById("inlog");
  login.hidden = false;
}

function showlogin() {
  var register = document.getElementById("registers");
  register.hidden = true;
  var login = document.getElementById("inlog");
  login.style.display = 'block';
  highlightlogin();
}

function showregister() {
  const login = document.getElementById("inlog");
  login.style.display = 'none';
  
  var register = document.getElementById("registers");
  register.hidden = false;
  highlightregister();
}


