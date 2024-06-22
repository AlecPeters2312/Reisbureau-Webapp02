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
  <video id="background" src="img/background-vid.mp4" autoplay muted loop></video>
  <?php
  include ('header.php');
  include ('connection.php');

  if (isset($_POST['reisid'])) {
    $reisid = $_POST['reisid'];
    $sql = "SELECT * FROM reizen WHERE reisid = :reisid";
    $prepare = $conn->prepare($sql);
    $prepare->execute(['reisid' => $reisid]);
    $reis = $prepare->fetch();

    if ($reis) {
      ?>
      <div class="flex-center">
        <div class="info-trips-square">
          <img src="<?php echo $reis['img']; ?>" alt="<?php echo $reis['reisnaam'] ?>">
          <h3><?php echo $reis['reisnaam'] ?></h3>
          <p id="description-width"><?php echo $reis['Lange_beschrijving'] ?></p>
          <h3>Departure Date: <?php echo $reis['stardatum'] ?></h3>
          <h3>Staying Till: <?php echo $reis['endatum'] ?></h3>
          <h3>€ <?php echo $reis['prijs'] ?></h3>
          <form action="winkelmandje-toevoegen.php" method="POST" onsubmit="return warning()">
            <input name="boekid" type="hidden" value="<?php echo $reis['reisid'] ?>">
            <input type="submit" value="Book">
          </form>
        </div>
      </div>
      <div class="flex-center">
        <div class="info-trips-square">
          <h3><?php echo $reis['comment'] ?></h3>
          <form action="" method="POST">
            <input type="hidden">
            <input type="submit" value="Post">
          </form>
        </div>
      </div>
      <script>
        function warning() {
          
          alert("je moet ingelogd zijn of maak een account aan");

        }
      </script>
      <?php
    }
  }
  ?>
  <?php include ('footer.php'); ?>
</body>

</html>