<?php
include('connection.php');

$reis = $_POST['reis'];
$prijs = $_POST['prijs'];
$datum = $_POST['datum'];
$vluchtid = $_POST['vluchtid'];




// Insert into reizen table
$sql = "INSERT INTO reizen (reisnaam, prijs, datum, vluchtid) VALUES (:reis, :prijs, :datum, :vluchtid)";
$prepare = $conn->prepare($sql);
$prepare->bindParam(':reis', $reis);
$prepare->bindParam(':prijs', $prijs);
$prepare->bindParam(':datum', $datum);
$prepare->bindParam(':vluchtid', $vluchtid);
$prepare->execute();



