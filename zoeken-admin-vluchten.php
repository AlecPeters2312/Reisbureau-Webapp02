<?php
include 'connection.php';

$zoekterm = '%' . $_GET['zoeken'] . '%';  

// Query to fetch relevant products from the database based on the search query
$sql = "SELECT v.vluchtid, l1.land AS vertrek_land, l1.stad AS vertrek_stad, l2.land AS eind_land, l2.stad AS eind_stad, v.reistijd 
    FROM vluchten v
    JOIN locaties l1 ON v.vertrekplek = l1.locatieid
    JOIN locaties l2 ON v.eindplek = l2.locatieid
    WHERE l1.land LIKE :zoekterm 
    OR l1.stad LIKE :zoekterm 
    OR l1.land LIKE :zoekterm 
    OR l2.land LIKE :zoekterm 
    OR l2.stad LIKE :zoekterm";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":zoekterm", $zoekterm);
$stmt->execute();
var_dump($stmt);
?>
<section class="flights">
<?php
if ($stmt->rowcount() > 0) {
    foreach ($stmt as $vlucht) {
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
                    <?php getplekfiltert($vlucht["eindplek"], $conn); ?>
                </select>
                <input name="vluchtid" type="hidden" value="<?php echo $vlucht['vluchtid']; ?>">
                <input type="submit">
            </form>
        </section>
        <?php
    }
} else {
    echo "<p>No flights found for the given search term.</p>";
    header("Location: admin.php");
}
?>
</section>


