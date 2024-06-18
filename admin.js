function getElement(){
    var winkelmandje = document.getElementById("winkelmandje");
    var update = document.getElementById("update");
    var add = document.getElementById("add");
    var mes = document.getElementById("mes");
    var rev = document.getElementById("rev");
}

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
    mes.hidden = true;
    rev.hidden = true
}
  // laat de update formulieren zien
  function showUpdate(){
    getElement();
    winkelmandje.hidden = true;
    update.hidden = false;
    mes.hidden = true;
    rev.hidden = true
    add.hidden = true;
  }
  //laat delete zien
  function showDelete(){
    getElement();
    winkelmandje.hidden = true;
    update.hidden = true;
    add.hidden = true;
    mes.hidden = true;
    rev.hidden = true;
  }
  //laat winkelmandje zien  
  function showWinkelmandje(){
   getElement();
   winkelmandje.hidden = false;
   update.hidden = true;
   add.hidden = true;
   mes.hidden = true;
   rev.hidden = true;
  }
  function showmessages(){
    getElement();
    winkelmandje.hidden = true;
    update.hidden = true;
    add.hidden = true;
    mes.hidden = false;
    rev.hidden = true;
   }
   function showreviews(){
    getElement();
    winkelmandje.hidden = true;
    update.hidden = true;
    add.hidden = true;
    mes.hidden = true;
    rev.hidden = false;
   }