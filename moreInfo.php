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
  include('header.php');
  include('connection.php');

  if (isset($_POST['reisid'])) {
      $reisid = $_POST['reisid'];
      $sql = "SELECT * FROM reizen WHERE reisid = :reisid";
      $prepare = $conn->prepare($sql);
      $prepare->execute(['reisid' => $reisid]);
      $reis = $prepare->fetch();

      if ($reis) {
          ?>
            <div class="image-grid">
          <div class="info-trips-square">
              <img src="<?php echo $reis['img']; ?>" alt="<?php echo $reis['reisnaam'] ?>">
              <h3><?php echo $reis['reisnaam'] ?></h3>
              <p><?php echo $reis['Lange-beschrijving'] ?></p>
              <p>€ <?php echo $reis['prijs'] ?></p>
          </div>
            </div>
          <?php
      }

  }
  ?>
  <?php include('footer.php'); ?>
</body>

</html>
