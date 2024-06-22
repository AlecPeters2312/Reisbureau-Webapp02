<?php
include('connection.php');
$user = $_SESSION["usid"];
$sql = "DELETE FROM user WHERE userId = :userid";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":userid", $user);
$stmt->execute();
$result = $stmt->fetchAll();