function hide(){
  document.getElementById("update").style.display = "none";
  document.getElementById("winkelmandje").style.display = "none";
  document.getElementById("add").style.display = "block";
  document.getElementById("mes").style.display = "none";
  document.getElementById("rev").style.display = "none";
  document.getElementById("account").style.display = "none";
}
hide();
// laat de toevoeg formulieren zien
function showAdd() {
  document.getElementById("winkelmandje").style.display = "none";
  document.getElementById("update").style.display = "none";
  document.getElementById("add").style.display = "block";
  document.getElementById("mes").style.display = "none";
  document.getElementById("rev").style.display = "none";
  document.getElementById("account").style.display = "none";
}
// laat de document.getElementById("update") formulieren zien
function update(){

  document.getElementById("winkelmandje").style.display = "none";
  document.getElementById("update").style.display = "block";
  document.getElementById("mes").style.display = "none";
  document.getElementById("rev").style.display = "none";
  document.getElementById("add").style.display = "none";
  document.getElementById("account").style.display = "none";
}

//laat winkelmandje zien
function winkelmandje(){
  document.getElementById("winkelmandje").style.display = "block";
  document.getElementById("update").style.display = "none";
  document.getElementById("add").style.display = "none";
  document.getElementById("mes").style.display = "none";
  document.getElementById("rev").style.display = "none";
  document.getElementById("account").style.display = "none";
}
function messages(){
  document.getElementById("winkelmandje").style.display = "none";
  document.getElementById("update").style.display = "none";
  document.getElementById("add").style.display = "none";
  document.getElementById("mes").style.display = "block";
  document.getElementById("rev").style.display = "none";
  document.getElementById("account").style.display = "none";
}
function reviews(){
  document.getElementById("winkelmandje").style.display = "none";
  document.getElementById("update").style.display = "none";
  document.getElementById("add").style.display = "none";
  document.getElementById("mes").style.display = "none";
  document.getElementById("rev").style.display = "block";
  document.getElementById("account").style.display = "none";
}
function account(){
  document.getElementById("winkelmandje").style.display = "none";
  document.getElementById("update").style.display = "none";
  document.getElementById("add").style.display = "none";
  document.getElementById("mes").style.display = "none";
  document.getElementById("rev").style.display = "none";
  document.getElementById("account").style.display = "block";
}