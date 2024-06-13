<?php
// Include the database connection file
include 'connection.php';

    // Retrieve form dataupdate.php
    $productnaam = $_POST['reisNaam'];
    $categorie = $_POST['categorie'];
    $beschrijving = addslashes($_POST['beschrijving']);
    $prijs = $_POST['prijs'];
    $id = $_POST['id'];

    // Prepare the SQL statement
    $sql = "UPDATE producten SET categorie = :categorie, productnaam = :productnaam, beschrijving = :beschrijving, prijs = :prijs WHERE id = :id";
    $prepare = $conn->prepare($sql);

    // Bind parameters
    $prepare->bindParam(':id', $id);
    $prepare->bindParam(':categorie', $categorie);
    $prepare->bindParam(':productnaam', $productnaam);
    $prepare->bindParam(':beschrijving', $beschrijving);
    $prepare->bindParam(':prijs', $prijs);
    

    // Execute the SQL statement
    $result = $prepare->execute();

    // Redirect to admin page after update
    header("Location: admin-page.php");

