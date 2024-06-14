function getElement(){
    var winkelmandje = document.getElementById("winkelmandje");
    var update = document.getElementById("update");
    var add = document.getElementById("add");
}
// function hideA(){
//   getElement();
//   add.hidden = true;
// }
// hideA();
function hide(){
    getElement();
    update.hidden = true;
    winkelmandje.hidden = true;
    add.hidden = false;
}
hide();
// laat de toevoeg formulieren zien
function showAdd() {
    getElement();
    winkelmandje.hidden = true;
    update.hidden = true;
    add.hidden = false;
}
  // laat de update formulieren zien
  function showUpdate(){
    getElement();
    winkelmandje.hidden = true;
    update.hidden = false;
    add.hidden = true;
  }
  //laat delete zien
  function showDelete(){
    getElement();
    winkelmandje.hidden = true;
    update.hidden = true;
    add.hidden = true;
  }
  //laat winkelmandje zien  
  function showWinkelmandje(){
   getElement();
   winkelmandje.hidden = false;
   update.hidden = true;
   add.hidden = true;
  }