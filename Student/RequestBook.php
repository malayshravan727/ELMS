<?php include '../Connection/db.php'?>

<?php 
$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
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
          <h2 class="fs-2 m-0">Request Book</h2>
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
      <p style="color:Red;"><?php echo $_SESSION['brmsg']; ?><?php $_SESSION['brmsg'] = "";?></p>
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
          while ($rows = mysqli_fetch_assoc($result)){
            $id = $rows['ID'];
            $bookname = $rows['Book_Name'];
            $bookid = $rows['Book_ID'];
            $bookdetail = $rows['Details'];
            $bookauthor = $rows['Author'];
            $bookpublication = $rows['Publication'];
            $bookquantity = $rows['Quantity'];
            $bookdepartment = $rows['Branch'];
          ?>
          <tr>
             <th scope="row"><?php echo $id ?></th>
             <td><?php echo $bookname ?></td>
             <td><?php echo $bookid ?></td>
             <td><?php echo $bookdetail ?></td>
             <td><?php echo $bookauthor ?></td>
             <td><?php echo $bookpublication ?></td>
             <td><?php echo $bookquantity ?></td>
             <td><?php echo $bookdepartment ?></td>
             <td>
             <?php
                  if($bookquantity > 0)
                    echo "
                    <a href=\"../Connection/requestbookserver.php?bookid=.$bookid.\" class=\"btn btn-success\" name=\"submit\">Request Book</a>";
                  else
                    echo "<a href=\"\" class=\"btn btn-info\">NOT AVAILABLE</a>";
             ?> 
             </td>
             </tr>
            <?php 
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