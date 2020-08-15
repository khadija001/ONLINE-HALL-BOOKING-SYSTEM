<?php
  include 'conn.php';

  if (isset($_POST['register'])) {
    $customer_full_name = $_POST['customer_full_name'];
    $customer_address = $_POST['customer_address'];
    $customer_phone_number = $_POST['customer_phone_number'];
    $status = 'customer';
    $username = $_POST['user'];
    $password = md5($_POST['pass']);

    $sql = "INSERT INTO table_customer (customer_full_name, customer_address, customer_phone_number)
    VALUES (:customer_full_name, :customer_address, :customer_phone_number)";

    $stmt = $db->prepare($sql);
    $insert = $stmt->execute(
      array(
        ':customer_full_name' => $customer_full_name,
        ':customer_address' => $customer_address,
        ':customer_phone_number' => $customer_phone_number,
      )
    );

    if ($insert) {
      $last_id = $db->lastInsertId();
      $sql = "INSERT INTO user (login_id, user_name, password, role)
      VALUES (:login_id, :user_name, :password, :role)";

      $stmt = $db->prepare($sql);
      $insert = $stmt->execute(
        array(
          ':login_id' => $last_id,
          ':user_name' => $username,
          ':password' => $password,
          ':role' => $status
        )
      );
      header('location: ../../index.php?login');
    }else {
      echo "AAAA";
      // header('location: register.php?try');
    }
  }
?>
