<?php 
    include 'session.php';
    
    $CHALLENGES = "challenges";
    $LEADERBOARD = "leaderboard";
    $SETTINGS = "settings";

    $current_page = $CHALLENGES;

    if (isset($_GET["p"]) && $_GET["p"] == $LEADERBOARD) {
        $current_page = $LEADERBOARD;
    } else if (isset($_GET["p"]) && $_GET["p"] == $CHALLENGES){
        $current_page = $CHALLENGES;
    } else if (isset($_GET["p"]) && $_GET["p"] == $SETTINGS){
        $current_page = $SETTINGS;
    } else {
        header('Location: dashboard.php?p=challenges');
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcute icon" href="log0.png">
    <title>Home | WXploit</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="pict-ctf-website-frontend/assets/css/flipclock.css">
    <link rel="stylesheet" href="pict-ctf-website-frontend/assets/css/bootstrap4-neon-glow.min.css">
    <link rel="stylesheet" href="pict-ctf-website-frontend/assets/css/main.css">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/font-hack/2.020/css/hack.min.css'>
    
  </head>
  <body>
    <div class="navbar-dark text-white">
        <?php 
            include 'includes/usernavbar.php';
        ?>
    </div>
            <?php 
                if ($current_page == $CHALLENGES) {
            ?>
    <h1 class="display-3" style="text-align: center"><br><br><b>Challenge ZONE!<span class="vim-caret">͏͏&nbsp;</span></b></h1>
    <div class="lead mb-3 text-mono text-success"style="text-align: center">
        Are you ready to solve the Challenges?
    </div>
            <?php 
                } else if ($current_page == $LEADERBOARD){
            ?>
    <h1 class="display-2" style="text-align: center">Leaderboard!<span class="vim-caret">͏͏&nbsp;</span></h1>
    <div class="lead mb-3 text-mono text-success" style="text-align: center">
        Where the world gets Ranked!
    </div>
            <?php 
                } else if ($current_page == $SETTINGS) {
            ?>
    <h1 class="display-2" style="text-align: center">Setting Account<span class="vim-caret">͏͏&nbsp;</span></h1>
    <div class="lead mb-3 text-mono text-success" style="text-align: center">
        Where can you change your profile!
    </div>
            <?php 
                }
            ?>    

    
    <div class="jumbotron bg-transparent mb-0 radius-0">
      <div class="container">
            <?php 
                if ($current_page == $CHALLENGES) {
                    include 'includes/userchallenges.php';
                } else if ($current_page == $LEADERBOARD){
                    include 'includes/userleaderboard.php';
                } else if ($current_page == $SETTINGS) {
                    include 'includes/usersettings.php';
                }
            ?>

      </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="pict-ctf-website-frontend/assets/js/flipclock.min.js"></script>
    <script>
      function axiosGethint(attr) {
        var idchall = attr.getAttribute("data-id");
        // var axios = require('axios');
        const hinttext = document.getElementsByClassName("modal-body");
        // $('#hintshow').modal('show');
        let params = {
            cid: idchall
        };

        // console
        $('#hintshow').modal('show');
        $('#hintshow').on('hidden.bs.modal', function () {
                  window.location.reload();
        });

        axios.post("get_hint.php", params)
        .then(function(response) {
            console.log(JSON.stringify(response));
            if (response.hint == "") {
                hinttext[0].innerHTML = "No Hint Available";
            } else {
                hinttext[0].innerHTML = response.hint;
            }
        });
      }
      function submitFlag(attr){
        const hinttext = document.getElementsByClassName("modal-body");
        var idchall = attr.getAttribute("data-id");
        var idinput = "flagvalue"+atob(idchall);
        console.log(idinput);
        var flag = document.getElementById(idinput).value;
        var params = {
            cid: idchall,
            flag: flag
        };
        axios.post("submitflag.php", params)
        .then(function(response) {
            console.log(JSON.stringify(response.status));

            if (response.status == "200") {
                hinttext[0].innerHTML = response.message;
                $('#hintshow').modal('show');
                $('#hintshow').on('hidden.bs.modal', function () {
                  window.location.reload();
                });
            } else {
                hinttext[0].innerHTML = response.message;
                $('#hintshow').modal('show');
                $('#hintshow').on('hidden.bs.modal', function () {
                  window.location.reload();
                });
            }
              
        });
      }

      //var clock = new FlipClock($('.countdown-timer'), 10 ,{
        //countdown: true,
        //onEnd: function() {
          //console.log("hi");
        //}
      //});
    </script>
    <script src="js/axios.min.js"></script>
  </body>
</html>
