<?php
include('connection.php');
$user = "SELECT * FROM user WHERE email = :email ";
$prepare_user = $conn->prepare($user);
$prepare_user->bindParam(':email', $_SESSION['email']);
$prepare_user->execute();
$users = $prepare_user->fetch();

$sql = "SELECT
    winkelmandje.boekingsId,
    winkelmandje.reisid,
    winkelmandje.userid,
    winkelmandje.aantal,
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
    winkelmandje
JOIN
    reizen ON winkelmandje.reisid = reizen.reisid; WHERE userid = :userid";
$prepare = $conn->prepare($sql);
$prepare->bindParam(':userid', $users['userid']);
$prepare->execute();
$reizen = $prepare->fetchAll();
?>
<?php
foreach ($reizen as $reis) {
?>
    <section class="admin-center">
        <div class="image-grid">
            <div class="trips-square">
                <img src="<?php echo $reis['img']; ?>" alt="<?php echo $reis['reisnaam'] ?>">
                <h3>
                    <?php echo $reis['reisnaam'] ?>
                </h3>
                <p> <?php echo $reis['beschrijving'] ?> </p>
                <p> € <?php echo $reis['prijs'] ?></p>
                <p> Amount of People: <?php echo $reis['aantal'] ?></p>
                <form action="mand_delete.php" method="POST">
                    <input name="boekid" type="hidden" value="<?php echo $reis['userid'] ?>">
                    <input class="countries-info" type="submit" value="Delete">
                </form>
            </div>
        </div>
    </section>
<?php
}
?>
<section class="admin-center">
    <form action="boeking-toevoegen.php" method="POST">
            <input name="boekid" type="hidden" value="<?php echo $reis['userid'] ?>">
        <input type="submit" value="Book">
    </form>
</section>