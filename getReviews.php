<?php
include('connection.php');


$sql = "SELECT * FROM reviews ";
$prepare = $conn->prepare($sql);
$prepare->execute();
$reizen = $prepare->fetchAll();
?>

<?php
foreach ($reizen as $reis) {
?>
    <section class="admin-center">
        <div class="account-seperation">
            <h3><?php echo $reis['comment'] ?></h3>
        </div>
    </section>
    <section class="admin-center">
                    <form action="delete-review.php" method="POST">
                        <input type="hidden" name="review_id" value="<?php echo $reis["review_id"] ?>">
                        <input type="submit" value="Remove Review">
                    </form>
                </section>
<?php
}
