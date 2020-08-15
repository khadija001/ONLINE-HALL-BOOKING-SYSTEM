<?php
  include '../conn.php';

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $availability = $_POST['available'];
    $status = $_POST['status'];
    $amount = $_POST['amount'];
    $description = $_POST['desc'];

    $sql = "INSERT INTO `table_hall`( `hall_name`, `hall_location`, `hall_capacity`, `hall_availability`, `hall_amount`, `hall_status`, `hall_desc`)
    VALUES (:h_name,:h_location,:h_capacity,:h_availble,:h_amount,:h_status,:h_desc)";

    $stmt = $db->prepare($sql);
    $insert = $stmt->execute(
      array(
        ':h_name' => $name,
        ':h_location' => $location,
        ':h_capacity' => $capacity,
        ':h_availble' => $availability,
        ':h_amount' => $amount,
        ':h_status' => 1,
        ':h_desc' => $description
      )
    );

    if ($insert) {
      header('location: ../../../manage_hall.php?saved');
    }
  }
?>
