<?php
include("connection.php");
$email = $_POST["email"];
$bericht = $_POST["bericht"];

$sql = "INSERT INTO berichten (email, bericht)
VALUES(:email, :bericht)";
$prepare = $conn->prepare($sql);
$prepare->bindParam(":email", $email);
$prepare->bindParam(":bericht", $bericht);
$prepare->execute();
?>
<script>
    alert("u bericht is verstuurd");
</script>
<?php
header("Location: index.php");
