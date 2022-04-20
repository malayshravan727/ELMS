<?php error_reporting(0); ?>
<?php include './includes/header.php'?>

<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>

<body>
  <div class="d-flex" id="wrapper">
    <?php include './includes/sidebar.php'?>

    <!-- PAGE CONTENT -->
    <div id="page-content-wrapper">
      <!-- NAVBAR -->
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
          <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
          <h2 class="fs-2 m-0">Book Report</h2>
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
      <div class="container-fluid px-4">
        <p style="color:red;"><?php echo $_SESSION['dmsg']; ?><?php $_SESSION['dmsg'] = "";?></p>
        <table class="table table-bordered mx-10 p-2">
          <thead>
              <tr>
                <th>S.No</th>
                <th>Book Name</th>
                <th>Book ID</th>
                <th>Details</th>
                <th>Author</th>
                <th>Publication</th>
                <th>Quantity</th>
                <th>Branch</th>
                <th colspan="2">Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
include '../Connection/db.php';

$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($rows = mysqli_fetch_assoc($result)) {
        $id = $rows['ID'];
        $bookname = $rows['Book_Name'];
        $bookid = $rows['Book_ID'];
        $bookdetail = $rows['Details'];
        $bookauthor = $rows['Author'];
        $bookpublication = $rows['Publication'];
        $bookquantity = $rows['Quantity'];
        $bookdepartment = $rows['Branch'];
        echo '<tr>
                <th scope="row">' . $id . '</th>
                <td>' . $bookname . '</td>
                <td>' . $bookid . '</td>
                <td>' . $bookdetail . '</td>
                <td>' . $bookauthor . '</td>
                <td>' . $bookpublication . '</td>
                <td>' . $bookquantity . '</td>
                <td>' . $bookdepartment . '</td>
                <td>
                  <button class="btn btn-primary"><a href="UpdateBook.php?updateid=' . $id . '"
                  class="text-light" name="update" style="text-decoration:none;">Edit</a></button>
                  <button class="btn btn-danger"><a href="../Connection/deletebookserver.php?deleteid=' . $id . '"
                  class="text-light" style="text-decoration:none;" onclick="return checkDelete()">Delete</a></button>
                </td>
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