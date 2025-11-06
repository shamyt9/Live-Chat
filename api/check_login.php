<?php
include 'config.php';

session_start();

if (isset($_SESSION['user_id'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE (username='$username' OR email='$email') AND password='$password'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user['id'];
    echo json_encode(['logged_in' => true, 'user_id' => $user['id']]);
  } else {
    echo json_encode(['logged_in' => false]);
  }
} else {
  echo json_encode(['logged_in' => false]);
}

?>