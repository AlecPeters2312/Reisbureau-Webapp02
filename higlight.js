function gethref() {
    return window.location.href;
}

function highlighter(element){
        element.style.backgroundColor = "#629681";
        var currWidth = element.clientWidth;
        var currHeight = element.clientHeight;
        element.style.width = (currWidth + 20) + "px";
        element.style.height = (currHeight+20) + "px";

}
function highlight() {
    if (gethref() === "http://localhost/reisbureau-poging%202/Reisbureau-Webapp02/register.php") {
        var register = document.getElementById("register");
        highlighter(register);
    }

    else if (gethref() === "http://localhost/reisbureau-poging%202/Reisbureau-Webapp02/login.php")
    {
        var login =document.getElementById("login");
        highlighter(login); 
    }

    else if (gethref() === "http://localhost/reisbureau-poging%202/Reisbureau-Webapp02/my-account.php")
    {
        var login =document.getElementById("account");
        highlighter(login); 
    }
 
else {
    console.log("URL does not match.");
}
}

highlight();