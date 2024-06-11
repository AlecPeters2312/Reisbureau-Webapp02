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
  include ('header.php');
  ?>
  <video id="background" src="img/background-vid.mp4" autoplay muted loop></video>
  <h1 id="slogan">Blue Your Way to Sky-High Travels</h1>
  <div id="travel-form-align">
    <form action="" id="travel-form">
      <i class="fa-solid fa-location-dot fa-2xl"></i>
      <input id="start-location" type="text" placeholder="Start Location">
      <i class="fa-solid fa-location-dot fa-2xl"></i>
      <input type="text" placeholder="End Location">
      <input type="date" placeholder="Start Date">
      <input type="date" placeholder="End Date">
      <input id="search-button" type="submit" value="Search">
    </form>
  </div>
  <h1 id="slogan">Trending Countries</h1>
  <div class="image-space">
    <div class="image-grid">
      <?php
      include ('getReizen.php');
      getReizen($conn)
        ?>

    </div>
  </div>

  <?php
  include ('footer.php');
  ?>
</body>

</html>