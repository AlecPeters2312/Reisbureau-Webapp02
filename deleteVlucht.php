<?php
include "connection.php";

$id = $_POST["vluchtid"];

try {
    // Begin a transaction
    $conn->beginTransaction();

    // Find all reisid that are related to the vluchtid
    $sql_reisids = "SELECT reisid FROM reizen WHERE vluchtid = :id";
    $prepare_reisids = $conn->prepare($sql_reisids);
    $prepare_reisids->bindParam(":id", $id);
    $prepare_reisids->execute();
    $reisids = $prepare_reisids->fetch();

    if (!empty($reisids)) {
        // Delete dependent rows from the reviews table
        $sql_reviews = "DELETE FROM reviews WHERE reisid = :reisid";
        $prepare_reisids = $conn->prepare($sql_reviews);
        $reisid = $reisids['reisid'];
        $prepare_reisids->bindParam(":reisid", $reisid);
        $prepare_reisids->execute();

        // Delete dependent rows from the reizen table
        $sql_reizen = "DELETE FROM reizen WHERE vluchtid = :id";
        $prepare_reizen = $conn->prepare($sql_reizen);
        $prepare_reizen->bindParam(":id", $id);
        $prepare_reizen->execute();
    }

    // Delete the row from the vluchten table
    $sql_vluchten = "DELETE FROM vluchten WHERE vluchtid = :id";
    $prepare_vluchten = $conn->prepare($sql_vluchten);
    $prepare_vluchten->bindParam(":id", $id);
    $prepare_vluchten->execute();

    // Commit the transaction
    $conn->commit();

    // Redirect to admin page
    header("Location: admin.php");
} catch (Exception $e) {
    // Roll back the transaction if something failed
    $conn->rollBack();
    echo "Failed: " . $e->getMessage();
}
