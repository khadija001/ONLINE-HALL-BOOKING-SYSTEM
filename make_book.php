  <?php
  include '../conn.php';

  if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $hall_id = $_POST['hall_id'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $book_time = $_POST['book_time'];
    $status = 'pending';

    $sql = "INSERT INTO table_customer_hall( customer_id, hall_id, c_hall_start_date, c_hall_end_date, book_time, c_hall_status)
    VALUES (:c_id,:h_id,:c_start,:c_end,:h_book,:h_status)";

    $stmt = $db->prepare($sql);
    $insert = $stmt->execute(
      array(
        ':c_id' => $user_id,
        ':h_id' => $hall_id,
        ':c_start' => $startDate,
        ':c_end' => $endDate,
        ':h_book' => $book_time,
        ':h_status' => $status
      )
    );

    if ($insert) {
      header('location: ../../../view_booking.php?insert');
    }
  }
?>
