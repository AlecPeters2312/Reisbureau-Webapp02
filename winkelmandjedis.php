<?php
include ('connection.php');
$sql = "SELECT
    boekingen.boekingsId,
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
    reizen ON boekingen.reisid = reizen.reisid;";
$prepare = $conn->prepare($sql);
$prepare->execute();
$reizen = $prepare->fetchAll();
?>
<section class="reizen">
<?php
foreach ($reizen as $reis) {
    ?>
    <div class="reisblok">

        <div class="trips-square">
            <img src="<?php echo $reis['img']; ?>" alt="<?php echo $reis['reisnaam'] ?>">
            <h3>
                <?php echo $reis['reisnaam'] ?>
            </h3>
            <p> <?php echo $reis['beschrijving'] ?> </p>
            <p> € <?php echo $reis['prijs'] ?></p>

            <form action="mand_delete.php" method="POST">
                <input name="boekid" type="hidden" value="<?php echo $reis['boekingsId'] ?>">
                <input class="countries-info" type="submit" value="delete">
            </form>
        </div>
        <?php
}