<?php
include_once './Connection/db.php';
if ($conn == false) {
    die("connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["uname"];
    $password = $_POST["pass"];

    $sql = "select * from login where username='" . $username . "' AND password='" . $password . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if ($row["usertype"] == "admin") {
        header("location:./Librarian/Profile.php");
    } elseif ($row["usertype"] == "user") {
        $_SESSION['studentuser_name'] = $username;
        header("location:./Student/Profile.php");
    } else {
        $_SESSION['smsg'] = "Invalid Credentials!";
        header("refresh:3;url=Home.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <!-- Bootstrap ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <!-- Normal CSS -->
  <link rel="stylesheet" href="Home.css" />
  <title>E-LIBRARY MANAGEMENT SYSTEM</title>

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
  <div class="row g-0">
    <div class="col-lg-6 g-0">
      <div class="left">
        <img src="./assets/clg bg1.jpg" class="bg" alt="background image" />
      </div>
    </div>
    <div class="col-lg-6 g-0">
      <div class="right">
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-expand-md navbar-light bg-light">
          <div class="container-fluid p-2">
            <a href="" class="navbar-brand">E-LMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
              aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="Home.php">Home</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <!-- LOGIN FORM -->
        <form action="Home.php" method="post">
          <h4>LOGIN HERE</h4>
          <p style="color:red;"><?php echo $_SESSION['smsg']; ?><?php $_SESSION['smsg'] = "";?></p>
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" name="uname" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password" required>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- FOOTER -->
        <footer>
          <div class="card">
            <p>E-LIBRARY MANAGEMENT SYSTEM</p>
            <div class="social-media">
              <a target="_blank" href="https://www.youtube.com/" class="icon"><i class="bi bi-youtube"></i>
              </a>

              <a target="_blank" href="https://www.facebook.com/" class="icon"><i class="bi bi-facebook"></i>
              </a>

              <a target="_blank" href="https://www.linkedin.com" class="icon"><i class="bi bi-linkedin"></i>
              </a>
              <p>
                Copyright &copy;
                <script>
                  document.write(new Date().getFullYear());
                </script>
              </p>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>
</html>