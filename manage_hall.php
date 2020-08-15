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
    <div class="row">
      <div class="col-md-12">
        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#myModal">Add Hall</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Modal Header</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                <form class="" action="assets/action/hall/savehall.php" method="post">
              <div class="modal-body">

                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" required>
                  </div>
                  <div class="form-group">
                    <label>Location</label>
                    <input type="text" class="form-control" name="location" required>
                  </div>
                  <div class="form-group">
                    <label>Capacity</label>
                    <input type="text" class="form-control" name="capacity" required>
                  </div>
                  <div class="form-group">
                    <label>Availability</label>
                    <input type="text" class="form-control" name="available" required>
                  </div>
                  <div class="form-group">
                    <label>Amount</label>
                    <input type="number" class="form-control" name="amount" required>
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea name="desc" class="form-control" rows="5" cols="80"></textarea>
                  </div>
                  <div class="modal-footer">
                </form>
              </div>

                <input type="submit" class="btn btn-success" name="submit" value="Save Hall">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
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
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['hall_id']; ?>">
                    Edit Hall
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="myModal<?php echo $row['hall_id']; ?>" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal Edit content-->
                      <div class="modal-content">
                        <form class="" action="assets/action/hall/edithall.php" method="post">
                          <div class="modal-header">
                            <h4 class="modal-title">Modal Header</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name" value="<?php echo $row['hall_name']; ?>">
                            </div>
                            <div class="form-group">
                              <label>Location</label>
                              <input type="text" class="form-control" name="location" value="<?php echo $row['hall_location']; ?>">
                            </div>
                            <div class="form-group">
                              <label>Capacity</label>
                              <input type="text" class="form-control" name="capacity" value="<?php echo $row['hall_capacity']; ?>">
                            </div>
                            <div class="form-group">
                              <label>Availability</label>
                              <input type="text" class="form-control" name="available" value="<?php echo $row['hall_availability']; ?>">
                            </div>
                            <div class="form-group">
                              <label>Amount</label>
                              <input type="number" class="form-control" name="amount" value="<?php echo $row['hall_amount']; ?>">
                            </div>
                            <div class="form-group">
                              <label>Description</label>
                              <textarea name="desc" class="form-control" rows="5" cols="80"><?php echo $row['hall_desc']; ?></textarea>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <input type="hidden" name="id" value="<?php echo $row['hall_id']; ?>">
                            <input type="submit" class="btn btn-primary" value="submit" name="submit" >
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <a href="assets/action/hall/deletehall.php?id=<?php echo $row['hall_id']; ?>" onclick="return confirm('Do You Want To Delete?')" class="btn btn-sm btn-danger"> Delete</a>
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
