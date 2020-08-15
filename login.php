<?php
  include 'conn.php';
  session_start();
  if (isset($_POST['user'])) {
    $username = $_POST['user'];
    $password = md5($_POST['pass']); //Encrypted Password

    $sql = "SELECT * FROM user WHERE user_name = :user AND password = :pass";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(':user' => $username,':pass' => $password));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row > 0) {
      $_SESSION['role'] = $row['role'];
      $_SESSION['user_id'] = $row['login_id'];
      header('location: ../../home.php');
    }else {
      header('location: ../../index.php?error=Invalid Username Or Password');
    }
  }
?>
