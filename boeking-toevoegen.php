<?php
include('connection.php');
session_start();

$boekid = $_POST['boekid'];

// Check if the user is logged in
if (isset($_SESSION['email'])) {
    // Fetch the user details
    $user = "SELECT * FROM user WHERE email = :email";
    $prepare_user = $conn->prepare($user);
    $prepare_user->bindParam(':email', $_SESSION['email']);
    $prepare_user->execute();
    $users = $prepare_user->fetch();

    if ($users) {
        // Fetch all items in the winkelmandje for the given user
        $sql_winkelmandje = "SELECT * FROM winkelmandje WHERE userid = :boekid";
        $prepare_winkelmandje = $conn->prepare($sql_winkelmandje);
        $prepare_winkelmandje->bindParam(':boekid', $boekid);
        $prepare_winkelmandje->execute();
        $winkelmandje_items = $prepare_winkelmandje->fetchAll(); // Fetch all rows

        if ($winkelmandje_items) {
            // Loop through each item and insert into boekingen
            foreach ($winkelmandje_items as $item) {
                $reisid = $item['reisid'];
                $aantal = $item['aantal'];
                $userid = $item['userid'];

                $sql_insert = "INSERT INTO boekingen (reisid, userid, aantal) VALUES (:reisid, :userid, :aantal)";
                $prepare_insert = $conn->prepare($sql_insert);
                $prepare_insert->bindParam(':reisid', $reisid);
                $prepare_insert->bindParam(':userid', $userid);
                $prepare_insert->bindParam(':aantal', $aantal);
                $prepare_insert->execute();
            }

            // Delete all items in the winkelmandje for the user
            $sql_delete = "DELETE FROM winkelmandje WHERE userid = :boekid";
            $prepare_delete = $conn->prepare($sql_delete);
            $prepare_delete->bindParam(':boekid', $boekid);
            $prepare_delete->execute();

            // Redirect to boekingen.php
            header('Location: boekingen.php');
        } else {
            // Redirect to inlog.php if the winkelmandje is empty
            header('Location: inlog.php');
        }
    } else {
        // Redirect to inlog.php if user details are not found
        header('Location: inlog.php');
    }
} else {
    // Redirect to inlog.php if the user is not logged in
    header('Location: inlog.php');
}
?>
