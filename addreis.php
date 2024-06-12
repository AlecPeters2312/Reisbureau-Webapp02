<?php
include('connection.php');

$reis = $_POST['reis'];
$prijs = $_POST['prijs'];
$datum = $_POST['datum'];
$beschrijving = $_POST['beschrijving'];
$img = $_POST['img'];
$vluchtid = $_POST['vluchtid'];




// Insert into reizen table
$sql = "INSERT INTO reizen (reisnaam, prijs, datum, vluchtid, img, beschrijving) VALUES (:reis, :prijs, :datum, :vluchtid, :img, :beschrijving)";
$prepare = $conn->prepare($sql);
$prepare->bindParam(':reis', $reis);
$prepare->bindParam(':prijs', $prijs);
$prepare->bindParam(':datum', $datum);
$prepare->bindParam(':vluchtid', $vluchtid);
$prepare->bindParam(':beschrijving', $beschrijving);
$prepare->bindParam(':img', $img);
$prepare->execute();
