<?php
include('connection.php');
session_start();
if (isset($_SESSION['email'])) {

    // Retrieve data from the form
    $boekid = $_POST['boekid'];

    // Check if the product already exists in the winkelmandje
    $sql_check = "SELECT * FROM winkelmandje WHERE reisid = :id";
    $prepare_check = $conn->prepare($sql_check);
    $prepare_check->bindParam(':id', $boekid);
    $prepare_check->execute();

    $user = "SELECT * FROM user WHERE email = :email ";
    $prepare_user = $conn->prepare($user);
    $prepare_user->bindParam(':email', $_SESSION['email']);
    $prepare_user->execute();
    $users = $prepare_user->fetch();
    if ($prepare_check->rowCount() > 0) {

        $sql_update = "UPDATE winkelmandje SET aantal = aantal + 1 WHERE reisid = :id";
        $prepare_update = $conn->prepare($sql_update);
        $prepare_update->bindParam(':id', $boekid);
        $prepare_update->execute();
    } else {

        $aantal = 1;
        // If the product doesn't exist, insert a new row
        $sql_insert = "INSERT INTO winkelmandje (reisid, userid, aantal) VALUES (:reisids, :userid, :aantal)";
        $prepare_insert = $conn->prepare($sql_insert);
        $prepare_insert->bindParam(':reisids', $boekid);
        $prepare_insert->bindParam(':userid', $users["userId"]);
        $prepare_insert->bindParam(':aantal', $aantal);
        $prepare_insert->execute();
    }

    header('Location: mand.php');
} else {
    header('Location: inlog.php');
}
