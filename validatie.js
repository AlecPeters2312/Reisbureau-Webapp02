function validatie() {
  var username = document.getElementById("username");
  var name = username.value;
  if (name == null || name == "") {
    alert("Name can't be blank");
    return false;
  } else if (name.includes("@")) {
    return true;
  } else {
    alert("your email doenst exist");
  }
}
