<?php
include('connection.php');

function getVluchten($conn)
{
    $sql = "SELECT v.vluchtid, 
                   lv.land AS vertrek_land, lv.stad AS vertrek_stad,
                   le.land AS eind_land, le.stad AS eind_stad
            FROM vluchten v
            JOIN locaties lv ON v.vertrekplek = lv.locatieid
            JOIN locaties le ON v.eindplek = le.locatieid";

    $prepare = $conn->prepare($sql);
    $prepare->execute();
    $vluchten = $prepare->fetchAll();

    foreach ($vluchten as $vlucht) {
?>
        <option value="<?php echo $vlucht['vluchtid']; ?>">
            <?php
            echo $vlucht['vertrek_land'] . ' ' . $vlucht['vertrek_stad'] . ' - ' . $vlucht['eind_land'] . ' ' . $vlucht['eind_stad'];
            ?>
        </option>
    <?php
    }
}

function getplek($conn)
{
    $sql = "SELECT * FROM Locaties ORDER BY stad ASC";
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    $locaties = $prepare->fetchAll();

    foreach ($locaties as $locatie) {
    ?>
        <option value="<?php echo $locatie['locatieid']; ?>">
            <?php echo $locatie['land'] . ' - ' . $locatie['stad']; ?>
        </option>
    <?php
    }
}

function getplekfiltert($locatieid, $conn)
{
    $sql = "SELECT * FROM Locaties WHERE locatieid = :locatieid ORDER BY stad ASC";
    $prepare = $conn->prepare($sql);
    $prepare->bindParam(":locatieid", $locatieid);
    $prepare->execute();
    $locaties = $prepare->fetchAll();

    foreach ($locaties as $locatie) {
    ?>
        <option value="<?php echo $locatie['locatieid']; ?>">
            <?php echo $locatie['land'] . ' - ' . $locatie['stad']; ?>
        </option>
    <?php
    }
}

function getReizen($conn)
{
    $sql = "SELECT * FROM reizen";
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    $reizen = $prepare->fetchAll();

    foreach ($reizen as $reis) {
    ?>
        <div class="trips-square">
            <img src="<?php echo $reis['img']; ?>" alt="<?php echo $reis['reisnaam'] ?>">
            <h3>
                <?php echo $reis['reisnaam'] ?>
            </h3>
            <p><?php echo $reis['beschrijving'] ?></p>
            <p>€ <?php echo $reis['prijs'] ?></p>

            <form action="moreInfo.php" method="POST">
                <input name="reisid" type="hidden" value="<?php echo $reis['reisid'] ?>">
                <input class="countries-info" type="submit" value="More Information">
            </form>
        </div>
    <?php
    }
}

function updateVluchten($conn)
{
    $sql = "SELECT * FROM vluchten";
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    $vluchten = $prepare->fetchAll();

    foreach ($vluchten as $vlucht) {
    ?>
        <section class="admin-center">
            <form class="reis" action="UpdateVlucht.php" method="POST">
                <input type="text" name="reistijd" value="<?php echo $vlucht['reistijd']; ?> uur">
                <h1>From</h1>
                <select name="startplek" id="startplek">
                    <?php getplekfiltert($vlucht["vertrekplek"], $conn); ?>
                </select>
                <h1>To</h1>
                <select name="eindplek" id="eindplek">
                    <?php getplekfiltert($vlucht["eindplek"], $conn);
                    getplek($conn); ?>
                </select>
                <input name="vluchtid" type="hidden" value="<?php echo $vlucht['vluchtid']; ?>">
                <input type="submit">
            </form>
        </section>
        <section class="admin-center">
            <form action="deleteVlucht.php" method="POST">
                <input type="hidden" name="vluchtid" value="<?php echo $vlucht['vluchtid']; ?>">
                <input type="submit" value="Delete">
            </form>
        </section>
    <?php
    }
}

function updateReizen($conn)
{
    $sql = "SELECT * FROM reizen";
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    $reizen = $prepare->fetchAll();
    ?>
    <section class="reizen">
        <?php
        foreach ($reizen as $reis) {
        ?>
            <section class="admin-center">
                <form method="POST" action="updateimg.php" onsubmit="showUpdate()">
                    <input name="afbeelding" type="text" value="<?php echo $reis['img'] ?>">
                    <input name="reisId" type="hidden" value="<?php echo $reis['reisid'] ?>">
                    <input type="submit" value="Submit Image">
                </form>
            </section>
            <section class="admin-center">
                <form action="updateReizen.php" method="POST" onsubmit="showUpdate()">
                    <h3>
                        <input type="text" name="reisNaam" value="<?php echo $reis['reisnaam'] ?>">
                    </h3>
                    <p>
                        <select id="vluchten" name="vluchtid">
                            <?php getVluchten($conn); ?>
                        </select>
                        <textarea name="L_beschrijving"><?php echo $reis['Lange_beschrijving'] ?></textarea>
                        <input type="text" name="beschrijving" value="<?php echo $reis['beschrijving'] ?>">
                    </p>
                    <p>
                        <input type="date" name="stardatum" value="<?php echo $reis['stardatum'] ?>">
                        <input type="date" name="endatum" value="<?php echo $reis['endatum'] ?>">
                        <input type="text" name="prijs" value="<?php echo $reis['prijs'] ?>">
                    </p>
                    <input name="reisId" type="hidden" value="<?php echo $reis['reisid'] ?>">
                    <input class="button" type="submit">
                </form>
            </section>
            <section class="admin-center">
                <form action="deleteReis.php" method="POST">
                    <input type="hidden" name="reisid" value="<?php echo $reis['reisid']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </section>
            <script src="admin.js"></script>
        <?php
        }
        ?>
    </section>
    <?php
}

function updatelocaties($conn)
{
    $sql = "SELECT * FROM locaties";
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    $locatie = $prepare->fetchAll();

    foreach ($locatie as $locaties) {
    ?>
        <section class="admin-center">
            <form class="reis" action="updateLocaties.php" method="POST">
                <input type="text" name="land" value="<?php echo $locaties["land"] ?>">
                <input type="text" name="stad" value="<?php echo $locaties["stad"] ?>">
                <input type="hidden" name="id" value="<?php echo $locaties["locatieid"] ?>">
                <input type="submit">
            </form>
        </section>
        <section class="admin-center">
            <form action="deleteLocatie.php" method="POST">
                <input type="hidden" name="lid" value="<?php echo $locaties["locatieid"] ?>">
                <input type="submit" value="Delete">
            </form>
        </section>
    <?php
    }
}

function getBerichten($conn)
{
    $sql = "SELECT * FROM berichten";
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    $berichten = $prepare->fetchAll();

    foreach ($berichten as $bericht) {
    ?>
        <section class="admin-center">
            <h2>Message</h2>
        </section>
        <div class="account-seperation">
            <section class="admin-center">
                <h3>Email: <?php echo $bericht["email"] ?></h3>
            </section>
            <section class="admin-center">
                <h3>Bericht: <?php echo $bericht["bericht"] ?></h3>
            </section>
        </div>
        <section class="admin-center">
            <form action="delete-mes.php" method="POST">
                <input type="hidden" name="berichtid" value="<?php echo $bericht["berichtid"] ?>">
                <input type="submit" value="Delete">
            </form>
        </section>
<?php
    }
}
?>