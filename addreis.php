<?php
include('connection.php');

$reis = $_POST['reis'];
$prijs = $_POST['prijs'];
$datum = $_POST['star-datum'];
$enddate = $_POST['en-datum'];
$beschrijving = $_POST['beschrijving'];
$Lange_beschrijving = $_POST['Lange_beschrijving'];
$img = $_POST['img'];
$vluchtid = $_POST['vluchtid'];



$sql = "INSERT INTO reizen (reisnaam, prijs, stardatum, endatum, vluchtid, img, beschrijving, Lange_beschrijving) VALUES (:reis, :prijs, :startdatum, :enddate, :vluchtid, :img, :beschrijving, :Lange_beschrijving)";
$prepare = $conn->prepare($sql);
$prepare->bindParam(':reis', $reis);
$prepare->bindParam(':prijs', $prijs);
$prepare->bindParam(':startdatum', $datum);
$prepare->bindParam(':enddate', $enddate);
$prepare->bindParam(':startdatum', $datum);
$prepare->bindParam(':enddate', $enddate);
$prepare->bindParam(':vluchtid', $vluchtid);
$prepare->bindParam(':beschrijving', $beschrijving);
$prepare->bindParam(':Lange_beschrijving', $Lange_beschrijving);
$prepare->bindParam(':img', $img);

$prepare->execute();

header("location:admin.php");

