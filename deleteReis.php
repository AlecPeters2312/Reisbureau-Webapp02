<?php
// Include the database connection file
include 'connection.php';

// Retrieve reisId from the POST data
$id = $_POST['reisid'];


    // Prepare and execute the query to delete reviews
    $sql = "DELETE FROM reviews WHERE reisid = :id";
    $prepare = $conn->prepare($sql);
    $prepare->bindParam(':id', $id);
    $prepare->execute();

    // Prepare and execute the query to delete boekingen
    $sql = "DELETE FROM boekingen WHERE reisid = :id";
    $prepare = $conn->prepare($sql);
    $prepare->bindParam(':id', $id);
    $prepare->execute();

    // Prepare and execute the query to delete the reis
    $sql = "DELETE FROM reizen WHERE reisid = :id";
    $prepare = $conn->prepare($sql);
    $prepare->bindParam(':id', $id);
    $prepare->execute();

    

?>
