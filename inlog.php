<?php
session_start();
include ('connection.php');

$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];

$sql = "SELECT * FROM user WHERE email = :email AND wachtwoord = :wachtwoord";
$prepare = $conn->prepare($sql);
$prepare->bindParam(':email', $email);
$prepare->bindParam(':wachtwoord', $wachtwoord);
$prepare->execute();
$user = $prepare->fetch();

if ($user) {
    $_SESSION['email'] = $email;
    $_SESSION['rol'] = $user['admin'];

    if ($user['admin'] == '1') {
        header('Location: admin.php');
    } 
} 
else {
    echo "error";
    $_SESSION['error'] = "Ongeldige inloggegevens!";
    header('Location: index.php');
    ?>
    <script>
        alert("ongeldige inloggegevens")
    </script>
    <?php


