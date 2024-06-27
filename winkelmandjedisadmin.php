<?php
include('connection.php');
$sql = "SELECT
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
    reizen.Lange_beschrijving,
    user.voornaam,
    user.userId,
    user.achternaam,
    user.email
FROM
    boekingen
JOIN
    reizen ON boekingen.reisid = reizen.reisid
JOIN user ON boekingen.userid = user.userId";
$prepare = $conn->prepare($sql);
$prepare->execute();
$reizen = $prepare->fetchAll();
?>
<?php
foreach ($reizen as $reis) {
?>
    <div class="image-grid">
        <div class="trips-square">
            <img src="<?php echo $reis['img'] ?>" alt="<?php echo $reis['reisnaam'] ?>">
            <h3>
                <?php echo $reis['reisnaam'] ?>
            </h3>
            <p> <?php echo $reis['beschrijving'] ?> </p>
            <p> € <?php echo $reis['prijs'] ?></p>
            <p> Voornaam: <?php echo $reis['voornaam'] ?> </p>
            <p> Achternaam: <?php echo $reis['achternaam'] ?></p>
            <p> E-Mail: <?php echo $reis['email'] ?></p>
            <form action="mand_delete.php" method="POST">
                <input name="boekid" type="hidden" value="<?php echo $reis['boekings_Id'] ?>">
                <input class="countries-info" type="submit" value="delete">
            </form>
        </div>
    </div>

<?php
}
