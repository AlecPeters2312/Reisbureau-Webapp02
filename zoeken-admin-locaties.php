<?php
include 'connection.php';


    $zoekterm = $_GET['zoeken'];
    // Query to fetch relevant products from the database based on the search query
    $sql = "SELECT * FROM locaties WHERE land LIKE :zoek OR stad  LIKE :zoek OR locatieid LIKE :zoek ORDER BY (land LIKE :zoek) DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam("zoek", $zoekterm);
    $stmt->execute();
    $stmt = $stmt->fetchAll();

    header("Location: admin.php");
