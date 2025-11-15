<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $name = $_POST['name'];
  $password = $_POST['password'];
  //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $response = [];

  $sql = "INSERT INTO users (username, email, name, password) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);

  if ($stmt) {
    $stmt->bind_param("ssss", $username, $email, $name, $password);

    if ($stmt->execute()) {
      $response['status'] = 'success';
      $response['message'] = 'User registered successfully: ' . $username;
    } else {
      $response['status'] = 'error';
      $response['message'] = 'Registration failed: ' . $stmt->error;
    }
    $stmt->close();
  } else {
    $response['status'] = 'error';
    $response['message'] = 'Preparation failed: ' . $conn->error;
  }

  echo json_encode($response);
}
?>