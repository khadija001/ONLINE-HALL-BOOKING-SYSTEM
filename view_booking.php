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
  <h2>View Hall</h2>

  <!-- Data Table for Hall-->
  <div class="container">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
          <tr>
              <th>Name</th>
              <th>Location</th>
              <th>Capacity</th>
              <th>Availabilty</th>
              <th>Amount</th>
              <th>Description</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
        <?php
          include "assets/action/conn.php";
          $sql ="SELECT * FROM table_hall";
          $stmt = $db->query($sql);
          $result = $stmt->fetchAll();
          foreach ($result as $row) { ?>
            <tr>
                <td><?php echo $row['hall_name']; ?></td>
                <td><?php echo $row['hall_location']; ?></td>
                <td><?php echo $row['hall_capacity']; ?></td>
                <td><?php echo $row['hall_availability']; ?></td>
                <td><?php echo $row['hall_amount']; ?></td>
                <td><?php echo $row['hall_desc']; ?></td>
                <td>
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#book<?php echo $row['hall_id']; ?>">
                    make book
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="book<?php echo $row['hall_id']; ?>" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal Edit content-->
                      <div class="modal-content">
                        <form class="" action="assets/action/book/make_book.php" method="post">
                          <div class="modal-header">
                            <h4 class="modal-title">Modal Header</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Start date</label>
                              <input type="date" class="form-control" name="startDate" required>
                            </div>
                            <div class="form-group">
                              <label>End date</label>
                              <input type="date" class="form-control" name="endDate" required>
                            </div>

                            <div class="form-group">
                              <label>Time</label>
                              <select class="form-control" name="book_time" required>
                                <option value="">Select Time For Event</option>
                                <option value="night">Night</option>
                                <option value="evening">Evening</option>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                            <input type="hidden" name="hall_id" value="<?php echo $row['hall_id']; ?>">
                            <input type="submit" class="btn btn-primary" value="submit">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
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
