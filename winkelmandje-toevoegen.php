<?php
include ('connection.php');
session_start();
// Retrieve data from the form
$boekid = $_POST['boekid'];

// Fetch product details based on product_id
$sql = "SELECT * FROM reizen WHERE reisid = :reisid";
$prepare = $conn->prepare($sql);
$prepare->bindParam(':reisid', $boekid);
$prepare->execute();
$product = $prepare->fetch();

// Check if the product already exists in the winkelmandje
$sql_check = "SELECT * FROM boekingen WHERE reisid = :id";
$prepare_check = $conn->prepare($sql_check);
$prepare_check->bindParam(':id', $boekid);
$prepare_check->execute();

$user = "SELECT * FROM user WHERE email = :email ";
$prepare_user = $conn->prepare($user);
$prepare->bindParam(':email', $_SESSION['email']);
$prepare->execute();
$users = $prepare->fetchAll();

$product = $prepare->fetch();
if ($prepare_check->rowCount() > 0) {

    $sql_update = "UPDATE boekingen SET aantal = aantal + 1 WHERE reisid = :id";
    $prepare_update = $conn->prepare($sql_update);
    $prepare_update->bindParam(':id', $boekid);
    $prepare_update->execute();
} else {
    // If the product doesn't exist, insert a new row
    $sql_insert = "INSERT INTO boekingen (reisid, userid, aantal = 1) VALUES (:reisid, :userid)";
    $prepare_insert = $conn->prepare($sql_insert);
    $prepare_insert->bindParam(':reisid', $product['reisid']);
    $prepare_insert->bindParam(':userid', $users['userid']);
    $prepare_insert->execute();
}

header('Location: index.php');

