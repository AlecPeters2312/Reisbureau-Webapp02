<?php
include ('connection.php');
$user = "SELECT * FROM user WHERE email = :email ";
$prepare_user = $conn->prepare($user);
$prepare_user->bindParam(':email', $_SESSION['email']);
$prepare_user->execute();
$users = $prepare_user->fetch();

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
    reizen ON boekingen.reisid = reizen.reisid; WHERE userid = :userid";
$prepare = $conn->prepare($sql);
$prepare->bindParam(':userid', $users['userid']);
$prepare->execute();
$reizen = $prepare->fetchAll();
?>
    <?php
    foreach ($reizen as $reis) {
        ?>
             <div class="image-grid">
            <div class="trips-square">
                <img src="<?php echo $reis['img']; ?>" alt="<?php echo $reis['reisnaam'] ?>">
                <h3>
                    <?php echo $reis['reisnaam'] ?>
                </h3>
                <p> <?php echo $reis['beschrijving'] ?> </p>
                <p> € <?php echo $reis['prijs'] ?></p>

                <form action="mand_delete.php" method="POST" onsubmit="">
                    <input name="boekid" type="hidden" value="<?php echo $reis['boekingsId'] ?>">
                    <input class="countries-info" type="submit" value="delete">
                </form>
            </div>
            </div>

            <?php
    }