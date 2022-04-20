<?php error_reporting(0); ?>

<?php include '../Connection/db.php'?>

<?php
$id = $_GET['updateid'];

$sql = "SELECT * FROM books WHERE ID=$id";
$result = mysqli_query($conn, $sql);

$rows = mysqli_fetch_assoc($result);
$bookname = $rows['Book_Name'];
$bookid = $rows['Book_ID'];
$bookdetail = $rows['Details'];
$bookauthor = $rows['Author'];
$bookpublication = $rows['Publication'];
$bookquantity = $rows['Quantity'];
$bookdepartment = $rows['Branch'];

if (isset($_POST['update_book'])) {

    $bookname = $_POST['bname'];
    $bookid = $_POST['bid'];
    $bookdetail = $_POST['bdetail'];
    $bookauthor = $_POST['bauthor'];
    $bookpublication = $_POST['bpublication'];
    $bookquantity = $_POST['bquantity'];
    $bookdepartment = $_POST['bdepartment'];

    $sql = "UPDATE books SET ID=$id, Book_Name = '$bookname', Book_ID = $bookid,
    Details = '$bookdetail', Author = '$bookauthor', Publication = '$bookpublication',
    Quantity = '$bookquantity', Branch = '$bookdepartment' WHERE ID=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['dmsg'] = "Book Updated successfully";
        header("Location:../Librarian/BookReport.php");
    } else {
        $_SESSION['dmsg'] = "Book Not Updated";
        header("Location:../Librarian/BookReport.php");
    }
}

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
          <h2 class="fs-2 m-0">Update Book</h2>
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
      <form method="post">
        <div class="container-fluid px-4">
          <div class="row">
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label>Book Name :</label>
                <input name="bname" type="text" class="form-control wizard-required" value="<?php echo $bookname; ?>" required="true" autocomplete="off">
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label>Book ID :</label>
                <input name="bid" type="text" class="form-control" value="<?php echo $bookid; ?>" required="true" autocomplete="off">
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label>Detail :</label>
                <input name="bdetail" type="text" class="form-control" value="<?php echo $bookdetail; ?>" required="true" autocomplete="off">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label>Author :</label>
                <input name="bauthor" type="text" class="form-control" value="<?php echo $bookauthor; ?>" required="true" autocomplete="off">
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label>Publication :</label>
                <input name="bpublication" type="text" class="form-control" value="<?php echo $bookpublication; ?>" required="true" autocomplete="off">
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label>Quantity :</label>
                <input name="bquantity" type="text" class="form-control" value="<?php echo $bookquantity; ?>" required="true" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label>Branch :</label>
                <select name="bdepartment" class="custom-select form-control" required="true" autocomplete="off">
                  <option value="">Select Department</option>
                  <option value="CSE/IT">CSE/IT</option>
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
            <div class="col-md-4 col-sm-12"></div>
            <div class="col-md-4 col-sm-12">
              <div class="form-group">
                <label style="font-size:16px;"><b></b></label>
                <div class="modal-footer justify-content-center">
                <button class="btn btn-primary" name="update_book" data-toggle="modal">Update&nbsp;Book</button>
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
    <?php include './includes/script.php'?>
  </div>
</body>

</html>