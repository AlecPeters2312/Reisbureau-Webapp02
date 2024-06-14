<?php
// Include the connection code (connection.php)
include('connection.php');

// Receive the form values via POST
$startplek = $_POST['startplek'];
$eindplek = $_POST['eindplek'];
$reistijd = $_POST['reistijd'];
$vluchtid = $_POST['vluchtid'];

$sql = "UPDATE vluchten SET vertrekplek = :startplek, eindplek = :eindplek, reistijd = :reistijd WHERE vluchtid = :vluchtid";


$prepare = $conn->prepare($sql);

$prepare->bindParam(':startplek', $startplek);
$prepare->bindParam(':eindplek', $eindplek);
$prepare->bindParam(':reistijd', $reistijd);
$prepare->bindParam(':vluchtid', $vluchtid);

$prepare->execute();


header('Location: admin.php');
