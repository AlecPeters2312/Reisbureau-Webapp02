<?php
include ('connection.php');

function getVluchten($conn)
{

    $sql = "SELECT v.vluchtid, l.land, l.stad  
    FROM vluchten v
    JOIN locaties l
    ON v.vertrekplek = l.locatieid";
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    $vertrekplek = $prepare->fetchAll();

    $sql = "SELECT v.vluchtid, l.land, l.stad  
    FROM vluchten v
    JOIN locaties l
    ON v.eindplek = l.locatieid";

    $prepare = $conn->prepare($sql);
    $prepare->execute();
    $eindplek = $prepare->fetchAll();

    foreach ($vertrekplek as $vertrekplekken) {
        $control = $vertrekplekken['vluchtid'];
        foreach ($eindplek as $eindplekken) {

            if ($control == $eindplekken['vluchtid']) {
                echo "fout";
            } else {
                ?>

                <option value="<?php echo $vertrekplekken['vluchtid']; ?>">
                    <?php

                    echo $vertrekplekken['land'] . ' ' . $vertrekplekken['stad'] . ' - ' . $eindplekken['land'] . ' ' . $eindplekken['stad'];

                    ?>
                </option>
                <?php
            }
        }
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
            <?php echo $locatie['land'] . '<p> - </p>' . $locatie['stad']; ?>
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
            <?php echo $locatie['land'] . '<p> - </p>' . $locatie['stad']; ?>
        </option>

        <?php
    }
}

function getReizen($conn)
{
    $sql = "SELECT * FROM reizen ";
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    $reizen = $prepare->fetchAll();
    ?>
    <section class="reizen">
        <?php
        foreach ($reizen as $reis) {
            ?>
            <div class="reisblok">

                <img src="<?php echo $reis['img']; ?>" alt="<?php echo $reis['reisnaam'] ?>">

                <div class="tekstkant">
                    <h3>
                        <?php echo $reis['reisnaam'] ?>
                    </h3>
                    <p> <?php echo $reis['beschrijving'] ?> </p>
                    <p> € <?php echo $reis['prijs'] ?> </p>

                    <form action="getReis.php" method="POST">
                        <input name="reisid" type="hidden" value="<?php echo $reis['reisid'] ?>">
                        <input class="button" type="submit" value="meer info">
                    </form>
                </div>

            </div>

            <?php
        }
        ?>
    </section>
    <?php
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
            <div class="reisblok">
                <form method="POST" action="updateimg.php" onsubmit="showUpdate()">
                    <input name="afbeelding" type="text" value="<?php echo $reis['img'] ?>">
                    <input name="reisId" type="hidden" value="<?php echo $reis['reisid'] ?>">
                    <input type="submit" value="submit afbeelding">
                </form>
                <form action="updateReizen.php" method="POST" onsubmit="showUpdate()">


                    <div class="tekstkant">
                        <h3>
                            <input type="text" name="reisNaam" value="<?php echo $reis['reisnaam'] ?>">
                        </h3>
                        <p>
                            <select id="vluchten" name="vluchtid">
                                <?php
                                getVluchten($conn);
                                ?>
                            </select>

                            <textarea name="beschrijving"><?php echo $reis['beschrijving'] ?></textarea>
                        </p>
                        <p>
                            € <input type="text" name="prijs" value="<?php echo $reis['prijs'] ?>">
                        </p>
                        <input name="reisId" type="hidden" value="<?php echo $reis['reisid'] ?>">
                        <input class="button" type="submit" value="submit">
                    </div>
                </form>
                <form action="deleteReis.php" method="POST">
                    <input type="hidden" name="reisid" value="<?php echo $reis['reisid']; ?>">
                    <input type="submit" value="delete">
                </form>
            </div>
            <script src="admin.js"></script>
            <?php
        }
        ?>
    </section>
    <?php
}
function updateVluchten($conn)
{
    $sql = "SELECT * FROM vluchten";
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    $vluchten = $prepare->fetchAll();

    ?>

    <?php foreach ($vluchten as $vlucht) { ?>
        <section class="admin-center">
            <form class="reis" action="UpdateVlucht.php" method="POST">
                <input type="text" name="reistijd" value="<?php echo $vlucht['reistijd']; ?> uur">
                <h1>From</h1>
                <select name="startplek" id="startplek">
                    <?php getplekfiltert($vlucht["vertrekplek"], $conn); ?>
                </select>
                <h1>To</h1>
                <select name="eindplek" id="eindplek">
                    <?php getplekfiltert($vlucht["eindplek"], $conn); ?>
                </select>
                <input name="vluchtid" type="hidden" value="<?php echo $vlucht['vluchtid']; ?>">
                <input type="submit">
            </form>
            <form action="deleteVlucht.php" method="POST">
                <input type="hidden" name="vluchtid" value="<?php echo $vlucht['vluchtid']; ?>">
                <input type="submit" value="delete">
            </form>
        </section>
    <?php } ?>

    <?php
}
function updatelocaties($conn)
{
    $sql = "SELECT * FROM locaties";
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    $locatie = $prepare->fetchAll();

    ?>

    <?php foreach ($locatie as $locaties) { ?>

        <section class="admin-center">
            <form class="reis" action="updateLocaties.php" method="POST">
                <input type="text" name="land" value="<?php echo $locaties["land"] ?>">
                <input type="text" name="stad" value="<?php echo $locaties["stad"] ?>">
                <input type="hidden" name="id" value="<?php echo $locaties["locatieid"] ?>">
                <input type="submit">
            </form>
            <form action="deleteLocatie.php" method="POST">
                <input type="hidden" name="lid" value="<?php echo $locaties["locatieid"] ?>">
                <input type="submit" value="delete">
            </form>
        </section>
    <?php } ?>

    <?php
}


