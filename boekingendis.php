<?php
include('connection.php');

// controleren of je bent ingelogd
$user = $_SESSION["email"];

// haal alles op uit users waarbij de email hetzelfde is als bij de sessie die het inloggen checkt. oftewel een filter op wie er is inglogd.
$sql = "SELECT * FROM user WHERE email = :user";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":user", $user); // de waarde van $user zal worden ingevoegd in de query waar de placeholder :user voorkomt, wanneer de query wordt uitgevoerd.
$stmt->execute();
$result = $stmt->fetch(); // de eerste rij ophalen van het resultaat

// als er is ingelogd voer de rest uit
if ($result) {
    // specifieke colommen uit de boekingen tabel ophalen
    $sql_reizen = "SELECT
        boekingen.boekings_Id,
        boekingen.reisid,
        boekingen.userid,
        boekingen.aantal,
        reizen.reisid,
        reizen.reisnaam,
        reizen.prijs,
        reizen.stardatum,
        reizen.endatum,
        reizen.vluchtid,
        reizen.img,
        reizen.beschrijving,
        reizen.Lange_beschrijving
    FROM
        boekingen
    JOIN
        reizen ON boekingen.reisid = reizen.reisid
    WHERE
        boekingen.userid = :userid";
    // join om het reisid van boekingen en reizen met elkaar te koppelen en dezelfde waarde te geven
    $stmt_reizen = $conn->prepare($sql_reizen); // de $sql_reizen is de variabele voor de query die word uitgevoerd
    $stmt_reizen->bindParam(':userid', $result['userId']); // de : dient als placeholder en geeft aan dat de waarde nog moet worden ingevoerd voor de query
    $stmt_reizen->execute(); // hier wordt de query uitgevoerd
    $reizen = $stmt_reizen->fetchAll(); // haalt alle rijen op die voldoen zijn aan de query en zit het in een array

    if ($reizen) {
        // loop zodat elke reis die geboekt is wordt getoond
        foreach ($reizen as $reis) { // $reizen heeft de waardes uit de uitgevoerd query hier boven en krijgt een nieuwe variabele naam om gebruikt te worden in de for loop
?>
            <section class="admin-center">
                <div class="image-grid">
                    <div class="trips-square">
                        <img src="<?php echo $reis['img']; ?>" alt="<?php echo $reis['reisnaam'] ?>">
                        <h3><?php echo $reis['reisnaam'] ?></h3>
                        <p><?php echo $reis['beschrijving'] ?></p>
                        <p>€ <?php echo $reis['prijs'] ?></p>
                        <p>Amount of People: <?php echo $reis['aantal'] ?></p>
                        <form action="boekingen_delete.php" method="POST">
                            <input name="boekid" type="hidden" value="<?php echo $reis['boekings_Id'] ?>">
                            <input class="countries-info" type="submit" value="Delete">
                        </form>
                    </div>
                </div>
            </section>
<?php // bij elke echo hierboven word de waarde van de naam die is ingevoerd uit de array $reis waar alle die dingen in zijn opgehaald
        }
    } else {
        echo "No bookings found for this user.";
    }
} else {
    echo "User not found.";
}
?>