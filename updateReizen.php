<?php
// Include the database connection file
include 'connection.php';

    // Retrieve form dataupdate.php
    $reisNaam = $_POST['reisNaam'];
    $vluchtid = $_POST['vluchtid'];
    $beschrijving = addslashes($_POST['beschrijving']);
    $prijs = $_POST['prijs'];
    $reisid = $_POST['reisId'];
    $prijs = $_POST['start-datum'];
    $prijs = $_POST['end-datum'];
    // Prepare the SQL statement
    $sql = "UPDATE reizen SET vluchtid = :vluchtid, reisNaam = :reisNaam, beschrijving = :beschrijving, prijs = :prijs, start-datum = :start-datum, end-datum = :end-datum WHERE reisid = :reisId";
    $prepare = $conn->prepare($sql);

    // Bind parameters
    $prepare->bindParam(':reisId', $reisid);
    $prepare->bindParam(':vluchtid', $vluchtid);
    $prepare->bindParam(':reisNaam', $reisNaam);
    $prepare->bindParam(':beschrijving', $beschrijving);
    $prepare->bindParam(':start-datum', $startdate);
    $prepare->bindParam(':end-datum', $enddate);
    $prepare->bindParam(':prijs', $prijs);
    

    // Execute the SQL statement
    $result = $prepare->execute();

    // Redirect to admin page after update
    header("Location: admin.php");

