
function highlighter(element){
        element.style.backgroundColor = "#629681";
        var currWidth = element.clientWidth;
        var currHeight = element.clientHeight;
        element.style.width = (currWidth + 20) + "px";
        element.style.height = (currHeight+20) + "px";

}
function highlightlogin() {

        var login =document.getElementById("login");
        highlighter(login);

}
function highlightregister(){
    var register = document.getElementById("registers");
    highlighter(register);
}

