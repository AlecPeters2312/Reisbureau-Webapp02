<?php
// Include the connection code (connection.php)
include('connection.php');

// Receive the form values via POST
$startplek = $_POST['startplek'];
$eindplek = $_POST['eindplek'];
$reistijd = $_POST['reistijd'];

// SQL query to insert data
$sql = "INSERT INTO vluchten (vertrekplek, eindplek, reistijd) VALUES (:startplek, :eindplek, :reistijd)";

// Prepare the SQL query
$prepare = $conn->prepare($sql);

// Bind the values to the parameters in the SQL query
$prepare->bindParam(':startplek', $startplek);
$prepare->bindParam(':eindplek', $eindplek);
$prepare->bindParam(':reistijd', $reistijd);


var_dump($prepare);

// Execute the prepared query
$prepare->execute();

// Redirect to another page after the insertion is completed
header('Location: admin.php');
