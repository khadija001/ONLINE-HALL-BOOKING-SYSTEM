<?php
  include '../conn.php';

  if (isset($_POST['id'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $availability = $_POST['available'];
    $amount = $_POST['amount'];
    $description = $_POST['desc'];
    $id = $_POST['id'];

    $sql = "UPDATE `table_hall` SET
      `hall_name`=:h_name,
      `hall_location`=:h_location,
      `hall_capacity`=:h_capacity,
      `hall_availability`=:h_availble,
      `hall_amount`=:h_amount,
      `hall_desc`=:h_desc
      WHERE `hall_id` = :id";

    $stmt = $db->prepare($sql);
    $update = $stmt->execute(
      array(
        ':h_name' => $name,
        ':h_location' => $location,
        ':h_capacity' => $capacity,
        ':h_availble' => $availability,
        ':h_amount' => $amount,
        ':h_desc' => $description,
        ':id' => $id
      )
    );

    if ($update) {
      header('location: ../../../manage_hall.php?edit');
    }
  }
?>
