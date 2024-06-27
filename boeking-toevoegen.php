<?php
include('connection.php');
session_start();

// controleren of je bent ingelogd
if (isset($_SESSION['email'])) {

    // boekid ophalen vanuit de form uit winkelmandjedis
    $boekid = $_POST['boekid'];

    // uit de database ophalen wat het boekid uit de form van winkelmandjedis heeft als waarde en of het een waarde heeft of niet
    $sql_winkelmandje = "SELECT * FROM winkelmandje WHERE boekingsId = :boekid";
    $prepare_winkelmandje = $conn->prepare($sql_winkelmandje);
    $prepare_winkelmandje->bindParam(':boekid', $boekid); // koppel de waarde van wat er is opgehaald uit de form met wat er in de database staat
    $prepare_winkelmandje->execute();
    $winkelmandje = $prepare_winkelmandje->fetch(); // het ophalen van de rij die met de select query wordt gefilterd

    // als er iets in het winkelmandje zit voert hij het uit
    if ($winkelmandje) {
        $user = "SELECT * FROM user WHERE email = :email";
        $prepare_user = $conn->prepare($user);
        $prepare_user->bindParam(':email', $_SESSION['email']);
        $prepare_user->execute();
        $users = $prepare_user->fetch();

        // variabelen aanmaken met de waarde die opgehaald is in winkelmandje
        $userid = $users['userId'];
        $reisid = $winkelmandje['reisid'];
        $aantal = $winkelmandje['aantal'];

        // de waarde van de kolommen reisid, userid en aantal vanuit winkelwagen geven aan dezelfde kolommen in boekingen
        $sql_insert = "INSERT INTO boekingen (reisid, userid, aantal) VALUES (:reisid, :userid, :aantal)";
        $prepare_insert = $conn->prepare($sql_insert);
        $prepare_insert->bindParam(':reisid', $reisid);
        $prepare_insert->bindParam(':userid', $userid);
        $prepare_insert->bindParam(':aantal', $aantal);
        $prepare_insert->execute();

        // wat er in je winkelmandje staat verwijderen als je het boekt
        $sql_delete = "DELETE FROM winkelmandje WHERE boekingsId = :boekid";
        $prepare_delete = $conn->prepare($sql_delete);
        $prepare_delete->bindParam(':boekid', $boekid);
        $prepare_delete->execute();
    }
    header('Location: boekingen.php'); // de locatie waar je naartoe word gestuurd
} else {
    header('Location: inlog.php');
}
