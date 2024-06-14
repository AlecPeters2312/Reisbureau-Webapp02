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

  <section id="admin-align">
    <div id="admin-square">
      <div id="contact-title">
        <h3 id="slogan">Contact</h3>
      </div>
      <h1>E-mail</h1>
      <section class="admin-center">
        <form action="" method="POST">
          <input type="password" name="" class="" required>
        </form>
      </section>
      <h1>Message</h1>
      <section class="admin-center">
        <form action="" method="POST">
          <textarea name="" id="" required></textarea>
        </form>
      </section>
      <section class="admin-center">
        <form action="" method="POST">
          <input type="submit">
        </form>
      </section>
    </div>
  </section>

  <?php
  include('footer.php');
  ?>
</body>

</html>