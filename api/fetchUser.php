<?php
header('Content-type:application/json');

include "config.php";

$sql = "SELECT * FROM USERS";
$stmt = $conn->prepare($sql);
$stmt->execute();

$data = $stmt->get_result();
$result = $data->fetch_assoc();

echo $result;
?>