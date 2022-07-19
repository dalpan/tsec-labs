<?php 
    $sql = "select @a:=@a+1 as rank, u.id as user_id, u.org as org, u.name as name, count(sb.c_id) as solved, sum(ch.score) as score from (SELECT @a:= 0) AS a, users as u, challenges as ch, scoreboard as sb where sb.c_id = ch.id and sb.user_id = u.id group by sb.user_id order by score;";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());
    $count = mysqli_num_rows($result);
    // SELECT * FROM `hintcollect` JOIN challenges WHERE challenges.id = hintcollect.idchall;

    
    $user_score = 0;
    $user_rank = 0;
    $user_solve = 0;
    $userteam = '';
    $username = '';

    for ($i = 0; $i < $count; $i++) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $allhint = mysqli_query($conn, "SELECT  *, sum(challenges.hintpoint) as totalhint FROM `hintcollect` JOIN challenges WHERE challenges.id = hintcollect.idchall AND hintcollect.iduser = $login_user_id;");
        $rowhint = mysqli_fetch_array($allhint, MYSQLI_ASSOC);
        	

        if ($row['user_id'] == $login_user_id) {
            $user_score = $row['score'] - $rowhint['totalhint'];
            $user_solve = $row['solved'];
            $user_rank = $row['rank'] ;
            $userteam = $row['org'];
            $username = $row['name'];

            break;
        }
    }

    $users_count = 0;
    $challenges_count = 0;

    $sql = "select count(u.id) as u_count from  users u";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $users_count = $row['u_count'];
    }

    $sql = "select count(ch.id) as ch_count from  challenges ch";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $challenges_count = $row['ch_count'];
    }



?>

      <div class="container">
        <nav class="navbar px-0 navbar-expand-lg navbar-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a href="index.php" class="pl-md-0 p-3 text-light">Home</a>
              <a href="dashboard.php?p=leaderboard" class="p-3 text-decoration-none text-light">Leaderboard</a>
              <a href="dashboard.php?p=challenges" class="p-3 text-decoration-none text-light">Challenges</a>
              <a href="dashboard.php?p=settings" class="p-3 text-decoration-none text-light">Settings</a>
            </div>
            <div class="nav-right">
                <div class="countdown-timer" style="float:right"></div>
                <div class="mr-4 p-3" style="float:right; color:#17b06b!important;"><?= $user_score ?> Points</div>
                <div class="mr-4 p-3" style="float:right"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
                <?= (($userteam == NULL) ? $username:$userteam) ?></div>
            </div>
            <div class="btn-group shadow-0">
              <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
              </button>
              <div class="dropdown-menu" aria-labell          edby="dropdownMenuButton">
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    
