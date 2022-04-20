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
          <h2 class="fs-2 m-0">Profile</h2>
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
                <i class="fas fa-user me-2"></i>Admin
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
        <div class="row g-3 my-2">
          <div class="card" style="max-width: 540px">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="../assets/logo.png" class="img-fluid rounded-start" alt="clg-logo" />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Librarian</h5>
                  <p class="card-text">LIBRARY, KLU</p>
                  <p class="card-text">9754125745</p>
                  <p class="card-text">library@klu.ac.in</p>
                  <p class="card-text">Kalasalingam University</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END CONTENT -->
      <?php include './includes/footer.php'?>
    </div>
  </div>
  <?php include './includes/script.php'?>
</body>
</html>