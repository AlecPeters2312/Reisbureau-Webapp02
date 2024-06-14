<?php
include 'connection.php';
include "getReizen.php";


    $zoekterm = $_GET['zoeken'];
    // Query to fetch relevant products from the database based on the search query
    $sql = "SELECT * FROM reizen WHERE reisnaam LIKE :zoek OR beschrijving  LIKE :zoek OR reisid LIKE :zoek ORDER BY (reisnaam LIKE :zoek) DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam("zoek", $zoekterm);
    $stmt->execute();
    $stmt = $stmt->fetchAll();
    
    
    header("Location: admin.php");
    updateVluchten($stmt);