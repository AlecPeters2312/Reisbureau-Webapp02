<?php
include('connection.php');

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

                    echo  $vertrekplekken['land'] . ' ' . $vertrekplekken['stad'] . ' - ' . $eindplekken['land'] . ' ' . $eindplekken['stad'];

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


function getReizen($conn)
{
    $sql = "SELECT * FROM reizen ";
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    $reizen = $prepare->fetchAll();
    ?>
    <?php
    foreach ($reizen as $reis) {
    ?>

        <div class="trips-square">
            <img src="<?php echo $reis['img']; ?>" alt="<?php echo $reis['reisnaam'] ?>">
            <h3>
                <?php echo $reis['reisnaam'] ?>
            </h3>
            <p> <?php echo $reis['beschrijving'] ?> </p>
            <p> € <?php echo $reis['prijs'] ?></p>

            <form action="moreInfo.php" method="POST">
                <input name="reisid" type="hidden" value="<?php echo $reis['reisid'] ?>">
                <input class="countries-info" type="submit" value="More Information">
            </form>
        </div>
    <?php
    }
    ?>
<?php
}
