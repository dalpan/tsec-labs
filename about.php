<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
   <meta name="description" content="Show Your Skill In WXploit">
   <meta name="keywords" content="Hacking labs, TegalSec, Tegal1337">
   <meta name="author" content="Tegal1337">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | WXploit</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="shortcute icon" href="log0.png">
    <link rel="stylesheet" href="assets/css/bootstrap4-neon-glow.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/particles.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/font-hack/2.020/css/hack.min.css'>

  </head>
  <body>

    <div id="particles-js" style="z-index:-1"></div>

  <div class="navbar-dark text-white">
    <div class="container">
      <nav class="navbar px-0 navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a href="index.php" class="pl-md-0 p-3 text-light">Home</a>
            <a href="faq.php" class="p-3 text-decoration-none text-light active">Faq</a>
            <a href="rules.php" class="p-3 text-decoration-none text-light">Rules</a>
          </div>
        </div>
        <?php
        session_start();
        if (isset($_SESSION['username'])) {  ?>
          <!-- <p>logout</p> -->
          <style media="screen">
          #button {
            background-color: Transparent;
            background-repeat:no-repeat;
            border: none;
            cursor:pointer;
            overflow: hidden;
          }
          </style>
          <a href="dashboard/index.php" class="p-3 text-decoration-none text-light">Dashboard</a>
          <form action="logout.php" method="POST">

            <button name="logout_user" id="button" class="p-3 text-decoration-none text-light active" >Logout</button>

          </form>
        <?php }else{ ?>
          <!-- <p>login</p> -->
          <a href="login.php" class="p-3 text-decoration-none text-light">Login</a>
        <?php } ?>
      </nav>

    </div>
  </div>

<div class="container py-5 mb-5">
  <h1 class="display-3" style="text-align: center">About WXploit<span class="vim-caret">͏͏&nbsp;</span></h1>
  <br>
  <br>
  <br>
  <div class="row py-4">
    <h5 style="text-align: center; width: 100%"> WXploit is a website designed
      specifically and has various types of website application security holes. The main purpose is made
      WXploit is an aid for security enthusiasts to hone their skills in
      perform penetration tests in a legal environment without violating existing regulations as well
       help web developers better understand the process of securing web applications and assist teachers / students
       in the teaching and learning process of web security in a classroom environment.</h5>
    <!-- <h5 style="text-align: center; width: 100%"> WXploit adalah sebuah website yang dirancang
      secara khusus dan memiliki berbagai type celah keamanan aplikasi website. Tujuan utama dibuat
      WXploit ini sebagai  bantuan untuk para penggemar keamanan untuk mengasah skill mereka dalam
      melakukan uji penetrasi dalam lingkungan hukum tanpa melanggar peraturan yang ada dan juga
       membantu developer web lebih memahami proses pengamanan aplikasi web dan membantu guru / siswa
       dalam proses belajar mengajar keamanan web dalam lingkungan kelas.</h5> -->

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
