<?php session_start();
error_reporting(0);
?>
<?php include './includes/header.php'?>

<body>
  <div class="d-flex" id="wrapper">
    <?php include './includes/sidebar.php'?>

    <!-- PAGE CONTENT -->
    <div id="page-content-wrapper">
      <!-- NAVBAR -->
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
          <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
          <h2 class="fs-2 m-0">Add Student</h2>
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
                <li><a class="dropdown-item" href="Profile.php">Profile</a></li>
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
      <form action="../Connection/addstudentserver.php" method="post">
        <div class="container-fluid px-4">
        <p style="color:green;"><?php echo $_SESSION['addstudentmsg']; ?><?php $_SESSION['addstudentmsg'] = "";?></p>
          <div class="row">
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label>Name :</label>
                <input name="sname" type="text" class="form-control wizard-required" required="true"
                  autocomplete="off">
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label>Reg No :</label>
                <input name="sregno" type="text" class="form-control" required="true" autocomplete="off">
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label>Email :</label>
                <input name="semail" type="email" class="form-control" required="true" autocomplete="off">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label>DOB :</label>
                <input name="sdob" type="date" class="form-control" required="true"
                  autocomplete="off">
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label>Address :</label>
                <input name="saddress" type="text" class="form-control" required="true" autocomplete="off">
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label>Branch :</label>
                <select name="sdepartment" class="custom-select form-control" required="true" autocomplete="off">
                  <option value="">Select Department</option>
                  <option value="CSE">CSE</option>
                  <option value="IT">IT</option>
                  <option value="ECE">ECE</option>
                  <option value="EEE">EEE</option>
                  <option value="CIVIL">CIVIL</option>
                  <option value="MECH">MECH</option>
                  <option value="FOOD">Food</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label>Mobile Number: :</label>
                <input name="smobile" type="tel" class="form-control wizard-required" required="true"
                  autocomplete="off">
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label>Username :</label>
                <input name="suname" type="text" class="form-control wizard-required" required="true"
                  autocomplete="off">
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label>Password :</label>
                <input name="supass" type="password" class="form-control" required="true" autocomplete="off">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 col-sm-12"></div>
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label style="font-size:16px;"><b></b></label>
                <div class="modal-footer justify-content-center">
                  <button class="btn btn-primary" name="add_student" id="add_staff"
                    data-toggle="modal">Add&nbsp;Student</button>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-12"></div>
          </div>
        </div>
      </form>
      <!-- END CONTENT -->

      <?php include './includes/footer.php'?>
    </div>
  </div>
  <?php include './includes/script.php'?>
</body>
</html>