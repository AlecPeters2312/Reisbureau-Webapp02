<?php
include('connection.php');
$user = $_SESSION["email"];
$sql = "SELECT * FROM user WHERE email = :user";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":user", $user);
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
?>
    <div class="account-seperation">
        <h1>First Name:</h1>
        <h3 class="admin-center">
            <?php echo $row['voornaam'] ?>
        </h3>
    </div>
    <div class="account-seperation">
        <h1>Last Name:</h1>
        <h3 class="admin-center">
            <?php echo $row['achternaam'] ?>
        </h3>
    </div>
    <div class="account-seperation">
        <h1>E-Mail:</h1>
        <h3 class="admin-center">
            <?php echo $row['email'] ?>
        </h3>
    </div>
<?php
}
?>