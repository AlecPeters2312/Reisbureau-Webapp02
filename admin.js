function getElement(){
    var winkelmandje = document.getElementById("winkelmandje");
    var update = document.getElementById("update");
    var del = document.getElementById("deletes");
    var add = document.getElementById("add");
}
function hide(){
    getElement();
    update.hidden = true
    add.hidden = false;
    del.hidden = true;
    winkelmandje.hidden = true;
}
hide();
// laat de toevoeg formulieren zien
function showAdd() {
    getElement();
    winkelmandje.hidden = true;
    update.hidden = true;
    deletes.hidden = true;
    add.hidden = false;
}
  // laat de update formulieren zien
  function showUpdate(){
    getElement();
    winkelmandje.hidden = true;
    update.hidden = false;
    deletes.hidden = true;
    add.hidden = true;
  }
  //laat delete zien
  function showDelete(){
    getElement();
    winkelmandje.hidden = true;
    update.hidden = true;
    deletes.hidden = false;
    add.hidden = true;
  }
  //laat winkelmandje zien  
  function showWinkelmandje(){
   getElement();
   winkelmandje.hidden = false;
   update.hidden = true;
   deletes.hidden = true;
   add.hidden = true;
  }