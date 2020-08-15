<a href="home.php">Dashboard</a>
<?php
  $role = $_SESSION['role'];
  if ($role == 'admin') { ?>
    <a href="manage_hall.php">Manage Hall</a>
    <a href="manage_client.php">Manage Client</a>
    <a href="manage_booking.php">Manage Booking</a>
  <?php }elseif ($role == 'customer') { ?>
    <a href="my_booking.php">My Booking</a>
    <a href="view_booking.php">View Booking</a>
  <?php } ?>
<a href="logout.php">log-out</a>
