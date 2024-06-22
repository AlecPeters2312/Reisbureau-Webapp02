<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <title>Reisbureau</title>
</head>
<?php
include 'connection.php';

$reisnaam = "%" . $_POST['reisnaam'] . "%";
$startdatum = "%" . $_POST['startdatum'] . "%";
$einddatum = "%" . $_POST['einddatum'] . "%";

// Query to fetch relevant products from the database based on the search query
$sql = "SELECT * FROM reizen 
        WHERE reisnaam LIKE :reisnaam 
        OR stardatum LIKE :stardatum 
        OR endatum LIKE :endatum 
        ORDER BY reisnaam ASC";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":reisnaam", $reisnaam);
$stmt->bindParam(":stardatum", $startdatum);
$stmt->bindParam(":endatum", $einddatum);
$stmt->execute();
$reizen = $stmt->fetchAll();

if ($stmt->rowCount() > 0) {
    include ("header.php");
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
    include ("footer.php");
} else {
    include ("header.php");
    echo "Geen resultaten gevonden";
    include ("footer.php");
}

