<!DOCTYPE html>
<?php 
    include("config.php");
    session_start();
    $count=0;
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login-submit'])) {
        $myEmail = mysqli_real_escape_string($conn,$_POST['email']);
        $myPassword = mysqli_real_escape_string($conn,$_POST['password']); 
        $sql = "SELECT `id`, `role`, `name` FROM `users` WHERE `email` = \"".$myEmail."\" and `password` = \"".$myPassword."\"";
        
        if(! $conn ) {
            die('Could not connect: ' . mysqli_error());
        }

        $result = mysqli_query($conn, $sql);

        if(! $result ) {
            die('Could not get data: '.$sql . mysqli_error());
        }

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        $count = mysqli_num_rows($result);
        if($count == 1) {
            $_SESSION['login_user'] = $myEmail;
            $_SESSION['role'] = $row['role'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            if(($row['role'] == 'user')) {
                header('location: dashboard.php');
                die('Logged in as user');
            } else if (($row['role'] == 'admin')) {
                header("location: admin.php");
                die();
            } else {
                header("location: login.php?p=login#invalid");
                die("Invalid User Category");
            }
         } else {
            header("location: login.php?p=login#error");
            echo("Invalid User Category");
            die();
         }
    }

    if(isset($_SESSION['login_user']) && $_SESSION['role'] == 'admin') {
        header("location: admin.php?p=dashboard");
        die();
    }elseif(isset($_SESSION['login_user']) && $_SESSION['role'] == 'user') {
        header("location: dashboard.php?p=dashboard");
        die();
    }
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
   <meta name="description" content="Show Your Skill In WXploit">
   <meta name="keywords" content="Hacking labs, TegalSec, Tegal1337">
   <meta name="author" content="Tegal1337">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | WXploit</title>
    <link rel="shortcute icon" href="log0.png">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap4-neon-glow.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/particles.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/font-hack/2.020/css/hack.min.css'>

  </head>
  <body>

    <div id="particles-js"></div>

  <div class="navbar-dark text-white">
    <div class="container">
      <nav class="navbar px-0 navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a href="index.php" class="pl-md-0 p-3 text-light">Home</a>
            <!-- <a href="login.html" class="p-3 text-decoration-none text-light active">Login</a> -->
            <a href="registration.php" class="p-3 text-decoration-none text-light">Register</a>
            <div class="btn-group shadow-0">
              <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                More
              </button>
              <div class="dropdown-menu" aria-labell          edby="dropdownMenuButton">
                <!-- <a class="dropdown-item" href="teams.php">Teams</a> -->
                <a class="dropdown-item" href="faq.php">Faq</a>
                <a class="dropdown-item" href="rules.php">Rules</a>
                <a class="dropdown-item" href="about.php">About</a>
              </div>
            </div>
          </div>

        </div>

      </nav>

    </div>
  </div>
<div class="container py-5 mb-5">
  <h1 class="mb-5" style="text-align: center">Before we start Hacking    <span class="vim-caret">͏͏&nbsp;&nbsp;</span></h1>
  <div class="row py-4">
    <div class="col-md-8 order-md-2">
      <h4 class="mb-3">Enter your credentials</h4>
      <?php
      if(isset($_SESSION['status']) && $_SESSION['status'] !='')
      {
        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
        unset($_SESSION['status']);
      }
      ?>
      <form action="" method="post">
        <div class="mb-3">
          <label for="email">Email</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" name="email" id="email" placeholder="email" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your email is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="password">Password <span class="text-muted"></span></label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">#</span>
            </div>
            <input type="password" name="password" class="form-control" id="password" placeholder="Make sure nobody's behind you ;)">
            <div class="invalid-feedback">
              Please enter a valid password.
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <hr class="mb-4">
        <button type="submit" class="btn btn-outline-success btn-shadow btn-lg btn-block" name="login-submit"> Lets Hack! </button>
      </form>
    </div>
    <div class="col-md-2 order-md-1"></div>
    <div class="col-md-2 order-md-3"></div>
  </div>
</div>
<div style="text-align: center">
  Made With Love By <br>
  &copy; Tegal1337 ♡ <?php echo date("Y") ?> ♡
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


    <script src="assets/js/particles.js"></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>
