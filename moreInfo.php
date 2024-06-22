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
    $sql = "SELECT
    reizen.reisid,
    reizen.reisnaam,
    reizen.prijs,
    reizen.stardatum,
    reizen.endatum,
    reizen.img,
    reizen.beschrijving,
    reizen.Lange_beschrijving,
    reviews.comment
    FROM
    reizen
    LEFT JOIN
    reviews ON reviews.reisid = reizen.reisid
    WHERE
    reizen.reisid = :reisid";
    $prepare = $conn->prepare($sql);
    $prepare->execute(['reisid' => $reisid]);
    $reis = $prepare->fetchAll();

    if ($reis) {
  ?>
      <div class="flex-center">
        <div class="info-trips-square white-color">
          <img src="<?php echo $reis[0]['img']; ?>" alt="<?php echo $reis[0]['reisnaam'] ?>">
          <h3><?php echo $reis[0]['reisnaam'] ?></h3>
          <p id="description-width"><?php echo $reis[0]['Lange_beschrijving'] ?></p>
          <h3>Departure Date: <?php echo $reis[0]['stardatum'] ?></h3>
          <h3>Staying Till: <?php echo $reis[0]['endatum'] ?></h3>
          <h3>€ <?php echo $reis[0]['prijs'] ?></h3>
          <input type="submit" value="Book">
        </div>
      </div>
      <section class="admin-center white-color">
        <div class="info-trips-square">
          <h1 class="white-color">Comments</h1>
          <section class="admin-center">
          <form action="addReview.php" method="POST">
            <textarea name="comment" placeholder="Comment"></textarea>
            <input name="reisid" type="hidden" value="<?php echo $reisid ?>">
            <input type="submit" name="" value="Leave Comment">
          </form>
          </section>
          <?php foreach ($reis as $comment) { ?>
            <section class="admin-center">
            <div class="account-seperation">
            <h3><?php echo $comment['comment'] ?></h3>
            </div>
            </section>
          <?php  } ?>
        </div>
      </section>
  <?php
    }
  }
  ?>
  <?php include('footer.php'); ?>
</body>

</html>