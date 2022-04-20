<?php include '../Connection/db.php';?>

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
          <h2 class="fs-2 m-0">Request Report</h2>
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
                <i class="fas fa-user me-2"></i><?php echo $_SESSION['studentuser_name'] ?>
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
      <div class="container-fluid px-4">
        <table class="table table-bordered mx-10 p-2">
          <thead>
              <tr>
                <th>S.No</th>
                <th>Book ID</th>
                <th>Requested Time</th>
              </tr>
          </thead>
          <tbody>
          <?php
$username = $_SESSION['studentuser_name'];

$sql = "SELECT * FROM requestbook WHERE Student_Name='$username'";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($rows = mysqli_fetch_assoc($result)) {
        $id = $rows['ID'];
        $bookid = $rows['Book_ID'];
        $requesttime = $rows['Date_Time'];
        echo '<tr>
                <th scope="row">' . $id . '</th>
                <td>' . $bookid . '</td>
                <td>' . $requesttime . '</td>
                </tr>';
    }
}
?>
          </tbody>
        </table>
      </div>
      <!-- END CONTENT -->

      <?php include './includes/footer.php'?>
    </div>
  </div>
  <?php include './includes/script.php'?>
</body>

</html>