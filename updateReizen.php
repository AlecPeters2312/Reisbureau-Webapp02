<?php
// Include the database connection file
include 'connection.php';

// Retrieve form data
$reisNaam = $_POST['reisNaam'];
$vluchtid = $_POST['vluchtid'];
$beschrijving = addslashes($_POST['beschrijving']);
$Lbeschrijving = addslashes($_POST['L_beschrijving']);
$prijs = $_POST['prijs'];
$reisid = $_POST['reisId'];
$startdatum = $_POST['stardatum'];
$enddatum = $_POST['endatum'];

// Prepare the SQL statement
$sql = "UPDATE reizen SET 
            vluchtid = :vluchtid, 
            reisNaam = :reisNaam, 
            beschrijving = :beschrijving, 
            Lange_beschrijving = :Lbeschrijving, 
            prijs = :prijs, 
            stardatum = :stardatum, 
            endatum = :enddatum
        WHERE reisid = :reisId";

$prepare = $conn->prepare($sql);

// Bind parameters
$prepare->bindParam(':reisId', $reisid);
$prepare->bindParam(':vluchtid', $vluchtid);
$prepare->bindParam(':reisNaam', $reisNaam);
$prepare->bindParam(':beschrijving', $beschrijving);
$prepare->bindParam(':Lbeschrijving', $Lbeschrijving);
$prepare->bindParam(':stardatum', $startdatum);
$prepare->bindParam(':enddatum', $enddatum);
$prepare->bindParam(':prijs', $prijs);

// Execute the SQL statement
$result = $prepare->execute();

// Redirect to admin page after update
header("Location: admin.php");
?>
