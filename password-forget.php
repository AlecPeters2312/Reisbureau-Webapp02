<?php
include("connecion.php");

$email1 = $_POST["email"];
$Nwachtwoord = $_POST["wachtwoord"];

$sql = "UPDATE user SET wachtwoord = :pass WHERE email = :email";
$prepare = $conn->prepare($sql);
$prepare->bindParam(":email", $email1);
$prepare->bindParam(":pass", $Nwachtwoord);
$prepare->execute();
header("Location: account.php");