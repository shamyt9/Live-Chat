<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $name = $_POST['name'];
  $password = $_POST['password'];
  $hashed_password = password_hash($password, PASSWORD_BCRYPT);

  $response = [];

  $sql = "INSERT INTO users (username, email, name, password) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param(
    $stmt,
    "ssss",
    $username,
    $email,
    $name
    ,
    $hashed_password
  );
  mysqli_stmt_execute($stmt);


  $response['status'] = 'success';
  $response['message'] = 'User registered successfully: ' . $username;

  echo json_encode($response);

}
?>