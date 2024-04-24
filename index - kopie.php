<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="css/style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <title>Pizzeria</title>
</head>

<body>

  <?php include('header.php');
  include('connection.php'); ?>
  <div class="landing-intro">
    <h1 class="white-color">Een</h1>
    <h1 class="light-orange">smaak</h1>
    <h1 class="orange-color">explosie</h1>
    <h1 class="white-color">in elk stuk</h1>
    <h1 class="red-color">pizza</h1>
    <h1 class="white-color">!</h1>
  </div>

  <form id="bestel-optie" action="postcode-toevoegen.php" method="POST">
    <div class="adres-box">
      <i class="fa-solid fa-location-dot icon fa-xl"></i>
      <input id="adres" type="text" name="postcode" placeholder="Postcode invoeren">
    </div>
    <div id="bezorg-pose">
      <i class="fa-solid fa-clock fa-xl white-color"></i>
      <select name="bezorg-optie" class="bezorg-optie white-color">
        <option value="">Bezorgen</option>
        <option value="">Afhalen</option>
        <option value="">Reserveren</option>
      </select>
    </div>
    <input class="bevestigen white-color" type="submit" value="Bevestig">
  </form>
  <?php include('footer.php') ?>
</body>

</html>