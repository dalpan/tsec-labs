<?php
if (!isset($_COOKIE['hackthebrowser'])) {
  setcookie('hackthebrowser', 'hackthebrowser', time() + (86400 * 30), "/",null,null,true);
  header("Refresh:0");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
       <meta name="description" content="Show Your Skill In WXPloit">
       <meta name="keywords" content="Hacking labs, TegalSec, Tegal1337">
       <meta name="author" content="Tegal1337">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcute icon" href="log0.png">

  <title>Br0w Chall 3 | WXPloit</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css'>
<link rel="stylesheet" href="./style.css">
  </head>
  <body>
<!-- partial:index.partial.html -->
<section class="hero is-fullheight">
  <div class="hero-body">
    <div class="container">
      <div class="columns">
        <div class="column is-3 is-flex">
          <div class="column-child sidebar shadow">
            <div class="sidebar-header has-text-centered"><br>
            <div class="photo"><img src="log0.png" width="250px"/></div>
              <h5 class="code"> Br0w | WXPloit </h5>
              <div class="social-icons">
                <a href="https://fb.me/tegal1337"><i class="fab fa-facebook icon"></i></a>
                <a href="https://github.com/tegal1337"><i class="fab fa-github icon"></i></a>
                <a href="https://ig.me/tegal1337"><i class="fab fa-instagram icon"></i></a>
              </div>

            </div>
          </div>
        </div>
        <div class="column is-flex">
          <div class="column-child terminal shadow">
            <div class="terminal-bar dark-mode">
              <div class="icon-btn close"></div>
              <div class="icon-btn min"></div>
              <div class="icon-btn max"></div>
              <div class="terminal-bar-text is-hidden-mobile dark-mode-text">guest@tegal1337: ~</div>
            </div>
            <div class="terminal-window primary-bg" onclick="document.getElementById('dummyKeyboard').focus();">
              <div class="terminal-output" id="terminalOutput">
                <div class="terminal-line">
                  <span class="help-msg">Chall 3 — Clue : <span class="code">Cookie</span> </span>
                  <h4 class="bold color_white">Change <b>hackthebrowser</b> cookie value to <span class="directory">br0wser</span></h4>
                </div>
              </div>
              <div class="terminal-line">

<?php
if (isset($_COOKIE['hackthebrowser'])) {
  if ($_COOKIE['hackthebrowser'] === "br0wser") {
    echo "Your current name supplied by <b>hackthebrowser</b> cookie is: <span class=\"directory\">" . (string)$_COOKIE['hackthebrowser'] . '</span>';
    echo '<br><br><div class="text-success is-outlined"><h3>FLAG : labs{c00kieee#3}</h3></div><br><br><div class="button is-link is-outlined is-smallr"><a href="4.php">Next</a></div>';
} else
{

    echo "Current value supplied by <b>hackthebrowser</b> cookie is: <span class=\"code\">" . (string)$_COOKIE['hackthebrowser'] . '</span>';
}
}

?>
                   <br>
              </div>
            </div>
            <br>
            <button style="align:right;" class="button is-info is-outlined is-small"><a href="javascript:history.back()"> Home</a></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="content has-text-centered">
      <p>
        Support by <i class="fas fa-heart icon"></i> Van.
      </p>
    </div>
  </footer>
</section>
<!-- partial -->
  <script src='https://use.fontawesome.com/releases/v5.3.1/js/all.js'></script><script  src="./script.js"></script>

</body>

</html>
