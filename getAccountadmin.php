<?php
include ('connection.php');
$sql = "SELECT * FROM user";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
    ?>
    <div class="account-seperation">
        <h1>First Name:</h1>
        <h3 class="admin-center">
            <?php echo $row['voornaam'] ?>
        </h3>


        <h1>Last Name:</h1>
        <h3 class="admin-center">
            <?php echo $row['achternaam'] ?>
        </h3>

        <h1>E-Mail:</h1>
        <h3 class="admin-center">
            <?php echo $row['email'] ?>
        </h3>

        <h1>Rol:</h1>
        <h3 class="admin-center">
            <?php
            if ($row['admin'] == 1) 
            {
                echo "admin";
            } 
            else
            {
                echo "geen admin";
            }    ?>
        </h3>
        <form action="deleteUser.php" method="POST">
            <input type="hidden" name="userid" value="<?php echo $row['userId'] ?>">
            <input type="submit" value="delete">
        </form>
    </div>
    <?php
}
?>