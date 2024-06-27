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

  // Controleer of er een POST-verzoek is gedaan met een 'reisid'
  if (isset($_POST['reisid'])) {

    $reisid = $_POST['reisid']; // Haal 'reisid' op uit POST-data

    // SQL-query om reisinformatie en bijbehorende recensies op te halen
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

    $prepare = $conn->prepare($sql); // Bereid de SQL-query voor
    $prepare->execute(['reisid' => $reisid]); // Voer de query uit met 'reisid' als parameter
    $reis = $prepare->fetch(); // Haal de eerste rij resultaten op

    // Controleer of er resultaten zijn gevonden voor het opgegeven 'reisid'
    if ($reis) {
  ?>
      <div class="flex-center">
        <div class="info-trips-square white-color">
          <img src="<?php echo $reis['img']; ?>" alt="<?php echo $reis['reisnaam'] ?>">
          <h3><?php echo $reis['reisnaam'] ?></h3>
          <p><?php echo $reis['Lange_beschrijving'] ?></p>
          <h3>Departure Date: <?php echo $reis['stardatum'] ?></h3>
          <h3>Staying Till: <?php echo $reis['endatum'] ?></h3>
          <h3>€ <?php echo $reis['prijs'] ?></h3>
          <section class="admin-center">
            <form action="winkelmandje-toevoegen.php" method="POST" onsubmit="return warning()"> <!-- geeft waarschuwing dat je een @ moet hebben ingevuld vanuit javascript -->
              <input name="boekid" type="hidden" value="<?php echo $reis['reisid'] ?>">
              <input type="submit" value="Add to Basket">
            </form>
          </section>
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

          <?php
          // SQL-query om opmerkingen op te halen die gekoppeld zijn aan het 'reisid'
          $comments_sql = "SELECT comment FROM reviews WHERE reisid = :reisid";
          $comments_prepare = $conn->prepare($comments_sql); // Bereid de query voor
          $comments_prepare->execute(['reisid' => $reisid]); // Voer de query uit met 'reisid' als parameter
          $comments = $comments_prepare->fetchAll(); // Haal alle resultaten op

          // Itereer over elk opgehaald commentaar en toon deze
          foreach ($comments as $comment) { ?>
            <section class="admin-center">
              <div class="account-seperation">
                <h3><?php echo $comment['comment'] ?></h3>
              </div>
            </section>
          <?php } ?>
        </div>
      </section>
  <?php
    }
  }
  ?>
  <?php include('footer.php'); ?> <!-- Inclusie van het footer.php bestand voor herbruikbare footer-elementen -->
</body>

</html>