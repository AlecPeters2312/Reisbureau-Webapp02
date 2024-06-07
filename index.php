<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="css/style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <title>Reisbureau</title>
</head>

<body>
  <?php
  include('header.php');
  ?>
  <video id="background" src="img/background-vid.mp4" autoplay muted loop></video>
  <h1 id="slogan">Blue Your Way to Sky-High Travels</h1>
  <div id="travel-form-align">
    <form action="" id="travel-form">
      <i class="fa-solid fa-location-dot fa-2xl"></i>
      <input id="start-location" type="text" placeholder="Start Location">
      <i class="fa-solid fa-location-dot fa-2xl"></i>
      <input type="text" placeholder="End Location">
      <i class="fa-solid fa-calendar-days fa-2xl"></i>
      <input type="text" placeholder="Start Date">
      <i class="fa-solid fa-calendar-days fa-2xl"></i>
      <input type="text" placeholder="End Date">
      <input id="search-button" type="submit" value="Search">
    </form>
  </div>
  <h1 id="slogan">Trending Countries</h1>
  <div class="image-space">
    <div class="image-grid">
      <?php
      include('landen.php');
      ?>

    </div>
  </div>
  <a href="">
    <h1 id="more">More →</h1>
  </a>
  <!-- <button onclick="test()">Yo</button>
  <form onsubmit="form()">
    <input type="text" placeholder="voornaam" id="voornaam">
    <input type="text" placeholder="achternaam" id="achternaam">
    <input type="text" placeholder="straatnaam" id="straatnaam">
    <input type="number" placeholder="huisnummer" id="huisnummer">
    <input type="submit">
  </form> -->
  <?php
  include('footer.php');
  ?>
</body>

</html>

<!-- <script>
  function test() {
    alert("Yo");
  }

  function form() {
    var voornaam = document.getElementById("voornaam");
    var achternaam = document.getElementById("achternaam");
    var straatnaam = document.getElementById("straatnaam");
    var huisnummer = document.getElementById("huisnummer");

    if (voornaam.value.length == "") {
      alert("voer je voornaam in");
    }
    if (achternaam.value.length == "") {
      alert("voer je achternaam in");
    }
    if (straatnaam.value.length == "") {
      alert("voer je straatnaam in");
    }
    if (huisnummer.value.length == "") {
      alert("voer een getal in voor het huisnummer");
    }
  }
</script> -->