<?php
  include '../conn.php';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `table_hall` WHERE hall_id = :id";

    $stmt = $db->prepare($sql);
    $delete = $stmt->execute(array(':id' => $id));

    if ($delete) {
      header('location: ../../../manage_hall.php?delete');
    }
  }
?>
