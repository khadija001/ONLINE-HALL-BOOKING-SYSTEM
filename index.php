<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/bootstrap/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <title>Online Hall Booking</title>
  </head>
  <body style="background-color: darkslategray;">
    <div class="container-fluid">
      <div class="container" style="min-height: 500px; margin-top: 100px;">
        <div class="card" style="padding: 10px; width: 40%; margin: auto;">
          <form action="assets/action/login.php" method="post" style="padding: 5px;">
            <h3 class="text-center">Online Hall Booking System</h3>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="user" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="pass" required>
            </div>

            <div class="form-group">
              <a href="register.php" class="btn btn-info">
                Register Here
              </a>
              <input type="submit" class="btn btn-success float-right" name="login" value="Login">
            </div>

          </form>
        </div>
      </div>
    </div>
  </body>
</html>
