<?php
include('connection.php');
$sql = "SELECT * FROM countries";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

if (count($result) > 0) {
    foreach ($result as $row) {
?>
        <div>
            <img src=<?php echo $row['country_img'] ?> alt='Country Image'>

        </div>
<?php
    }
} else {
    echo "No Countries Found";
}
