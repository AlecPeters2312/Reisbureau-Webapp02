<?php
include('connection.php');
$user = $_POST["userid"];
$sql = "DELETE FROM user WHERE userId = :userid";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":userid", $user);
$stmt->execute();
header("Location: admin.php");