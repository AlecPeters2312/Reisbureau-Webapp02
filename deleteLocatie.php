<?php
include "connection.php";

$id = $_POST["lid"];

try {
    

    // Find all reisid that are related to the vluchtid
    $sql_reisids = "SELECT * FROM vluchten WHERE vertrekplek = :id OR eindplek = :id";
    $prepare_reisids = $conn->prepare($sql_reisids);
    $prepare_reisids->bindParam(":id", $id);
    $prepare_reisids->execute();
    $reisids = $prepare_reisids->fetch();

    if (!empty($reisids)) {

        $sql_reisids = "SELECT reisid FROM reizen WHERE vluchtid = :id";
        $prepare_reisids = $conn->prepare($sql_reisids);
        $prepare_reisids->bindParam(":id", $id);
        $prepare_reisids->execute();
        $reisidss = $prepare_reisids->fetch();

        $sql_reviews = "DELETE FROM reviews WHERE reisid = :reisid";
        $prepare_reisids = $conn->prepare($sql_reviews);
        $reisid = $reisidss['reisid'];
        $prepare_reisids->bindParam(":reisid", $reisid);
        $prepare_reisids->execute();

        $sql_reviews = "DELETE FROM boekingen WHERE reisid = :reisid";
        $prepare_reisids = $conn->prepare($sql_reviews);
        $prepare_reisids->bindParam(":reisid", $reisid);
        $prepare_reisids->execute();
        // Delete dependent rows from the reizen table
        $sql_reizen = "DELETE FROM reizen WHERE vluchtid = :id";
        $prepare_reizen = $conn->prepare($sql_reizen);
        $prepare_reizen->bindParam(":id", $id);
        $prepare_reizen->execute();
        // Delete dependent rows from the reizen table
        $sql_reizen = "DELETE FROM vluchten WHERE vertrekplek = :id OR eindplek = :id";
        $prepare_reizen = $conn->prepare($sql_reizen);
        $prepare_reizen->bindParam(":id", $id);
        $prepare_reizen->execute();
    }

    // Delete the row from the vluchten table
    $sql_vluchten = "DELETE FROM locaties WHERE locatieid = :id";
    $prepare_vluchten = $conn->prepare($sql_vluchten);
    $prepare_vluchten->bindParam(":id", $id);
    $prepare_vluchten->execute();




    header("Location: admin.php");

} catch (Exception $e) {
    // Roll back the transaction if something failed
    $conn->rollBack();
    echo "Failed: " . $e->getMessage();
}
