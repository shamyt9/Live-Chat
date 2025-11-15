<?php
header('Content-type:application/json');
include "config.php";


$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT username,name,email,password from users where username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$response = [];

if ($user) {

  if ($password == $user['password']) {
    session_start();
    $response['logged_in'] = true;
    $response['data'] = $username;
    $_SESSION['name'] = $user['name'];
    $_SESSION['username'] = $username;
  } else {
    $response['logged_in'] = false;
    $response['data'] = 'Wrong Credential';
  }
} else {
  $response['logged_in'] = false;
  $response['username'] = 'wrong credential';
}

echo json_encode($response);



?>