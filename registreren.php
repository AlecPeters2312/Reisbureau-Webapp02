<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
  <title>Reisbureau</title>
</head>
<body>
<?php
  include('header.php');
  ?>
    <video id="background" src="img/background-vid.mp4" autoplay muted loop></video>

  <section id="contact">
    <div id="register-form">
    <form action="">
        <div id="contact-kop">
            register
        </div>
    <input id="form-text" type="email" placeholder="E-mail">
    <input id="form-text" type="text" placeholder="first name">
    <input id="form-text" type="text" placeholder="last name">
    <input id="form-text" type="text" placeholder="username">
    <input id="form-text" type="password" placeholder="password">
    <input id="confirm" type="submit" value="confirm">
    </div>  
</section>
  </form>
  <?php 
  include('footer.php')
  ?>
</body>
</html>