<?php
include('connection.php');
// id ophalen uit het post verzoek van de delete form
$id = $_POST['boekid'];

// verwijder van boekingen waar het boekings id hetzelfde is als het boekings id dat is opgehaald uit de form
$sql = "DELETE FROM boekingen WHERE boekings_Id = :id";
$prepare = $conn->prepare($sql); // de $sql_reizen is de variabele voor de query die word uitgevoerd
$prepare->bindParam(':id', $id); // de : dient als placeholder en geeft aan dat de waarde nog moet worden ingevoerd voor de query
$prepare->execute(); // de query word uitgevoerd

if ($_SERVER['REQUEST_URI'] == "admin.php") { // geeft de url terug waar je op dat moment op bent
    header("Location: header.php"); // locatie waar je naartoe word gestuurd aan het einde
} else {
    header("Location: boekingen.php");
}
