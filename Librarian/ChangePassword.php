<?php
include '../Connection/db.php';

if (isset($_POST['passsubmit'])) {
    $pcuname = $_POST['pcuname'];
    $curpass = $_POST['curpass'];
    $newpass = $_POST['newpass'];
    $conpass = $_POST['conpass'];

    $query = mysqli_query($conn, "SELECT username,password from login
  WHERE username = '$pcuname' AND password = '$curpass'");

    $num = mysqli_fetch_array($query);

    if ($num > 0 && $newpass == $conpass) {
        $data = mysqli_query($conn, "UPDATE login set password = '$newpass'
      WHERE username = '$pcuname'");
        $_SESSION['bpwmsg'] = "Password Changed Successfully";
        header("refresh:2;url=ChangePassword.php");
    } else {
        $_SESSION['bpwmsg'] = "Password does not match";
        header("refresh:2;url=ChangePassword.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="libindex.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
  <title>E-LMS</title>

  <style>
    .container-fluid {
      width: 500px
    }
    .password {
      border: 1px solid gray;
    }
  </style>

  <!-- Prevent Browser -->
  <script>
    function preventBack() {
      window.history.forward();
    }
    setTimeout("preventBack()", 0);
    window.onunload = function () {
      null;
    };
  </script>
</head>

<body>
  <div class="d-flex" id="wrapper">
  <?php include './includes/sidebar.php'?>

    <!-- PAGE CONTENT -->
    <div id="page-content-wrapper">
      <!-- NAVBAR -->
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
          <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
          <h2 class="fs-2 m-0">Change Password</h2>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle second-text fw-bold profile" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user me-2"></i>ADMIN
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="Prrofile.php">Profile</a></li>
                <li>
                  <a class="dropdown-item" href="../includes/logout.php">Logout</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <!-- NAVBAR END-->

      <!-- CONTENT -->
      <div class="container-fluid password py-2">
        <p style="color:blue;"><?php echo $_SESSION['bpwmsg']; ?><?php $_SESSION['bpwmsg'] = "";?></p>
        <form action="ChangePassword.php" method="post" onsubmit="return valid();">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="pcuname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Current Password</label>
            <input type="password" name="curpass" class="form-control" id="exampleInputPassword1" placeholder="Current Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">New Password</label>
            <input type="password" name="newpass" class="form-control" id="exampleInputPassword1" placeholder="New Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" name="conpass" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
            <br />
          </div>
          <button type="pass_submit" name="passsubmit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
      <!-- END CONTENT -->

      <?php include './includes/footer.php'?>
    </div>
  </div>
  <?php include './includes/script.php'?>
</body>

</html>