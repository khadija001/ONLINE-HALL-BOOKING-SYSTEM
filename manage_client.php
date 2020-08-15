<?php include 'assets/action/conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Hall Booking</title>

<?php include 'links.php'; ?>
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the side navigation */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
}


/* Side navigation links */
.sidenav a {
  color: white;
  padding: 16px;
  text-decoration: none;
  display: block;
}

/* Change color on hover */
.sidenav a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the content */
.content {
  margin-left: 200px;
  padding-left: 20px;
}
</style>
</head>
<body>

<div class="sidenav">
  <?php include 'menu.php'; ?>
</div>

<div class="content">
  <h2>View Client</h2>

  <!-- Data Table for Hall-->
  <div class="container">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
          <tr>
            <td>No.</td>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Action</th>
          </tr>
      </thead>
      <tbody>
        <?php
          include "assets/action/conn.php";
          $sql ="SELECT * FROM table_customer";
          $stmt = $db->query($sql);
          $result = $stmt->fetchAll();
          $c = 0;
          foreach ($result as $row) { $c++;?>
            <tr>
              <td><?php echo $c; ?></td>
              <td><?php echo $row['customer_full_name']; ?></td>
              <td><?php echo $row['customer_address']; ?></td>
              <td><?php echo $row['customer_phone_number']; ?></td>
                <td>

                </td>
            </tr>
            <?php
          }
         ?>

      </tbody>
    </table>

  </div>
</div>

</body>
</html>
