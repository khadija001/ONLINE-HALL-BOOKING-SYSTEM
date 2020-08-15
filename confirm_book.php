<?php
  include '../conn.php';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE table_customer_hall SET
      c_hall_status = 'accepted' WHERE c_hall_id = :id";

    $stmt = $db->prepare($sql);
    $update = $stmt->execute(array(':id' => $id));

    if ($update) {
      header('location: ../../../manage_booking.php?update');
    }
  }
?>
