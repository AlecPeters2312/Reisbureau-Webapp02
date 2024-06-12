<?php

include ('Connection.php');

$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$wachtwoord = $_POST['wachtwoord'];
$email = $_POST['email'];
$admin = $_POST['admin'];

$sql = "INSERT INTO user (voornaam, achternaam, wachtwoord, email, admin) VALUES (:voornaam, :achternaam, :wachtwoord, :email, :admin)";
$prepare = $conn->prepare($sql);


$prepare->bindParam(':voornaam', $voornaam);
$prepare->bindParam(':achternaam', $achternaam);
$prepare->bindParam(':wachtwoord', $wachtwoord);
$prepare->bindParam(':email', $email);
$prepare->bindParam(':admin', $admin);

$prepare->execute();

header('Location: index.php');
exit;
