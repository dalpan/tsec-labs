
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
       <meta name="description" content="Show Your Skill In WXPloit">
       <meta name="keywords" content="Hacking labs, TegalSec, Tegal1337">
       <meta name="author" content="Tegal1337">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcute icon" href="log0.png">

  <title>Br0w Chall 4 | WXPloit</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css'>
<link rel="stylesheet" href="./style.css">
<script>
var random = getRandomInt(9999);
function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max));
}
</script>
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
                  <span class="help-msg">Chall 2 — Clue : <span class="code">LocalStorage</span> </span>
                  <h4 class="bold color_white">Change <b>thebr0w</b> LocalStorage to <span class="directory">br0wser</span></h4>
                </div>
              </div>
              <div class="terminal-line">

        <div id="tegalsec"></div>
        <div>
            Input: <input type="text" id="guess" name="name" value="0">
            <button onclick="verify()" class="button is-info is-outlined is-small" ></button>
        </div>
    </div>
  </div>
</div>
<script>
document.getElementById("tegalsec").innerHTML = random;
verify();
function verify(){
    if(document.getElementById("guess").value === random.toString()){
         document.getElementById("content").innerHTML = "Flag : <span class=\"siimple-tag siimple-tag--red\">" + document.getElementById("guess").value.toString() + "</span><br><br><div><h3>FLAG : labs{loc4lst0rage#4}</h3></div><br><br><div class=\"btn btn-outline-danger btn-shadow px-3 my-2 ml-0 ml-sm-1 text-left typewriter\"><a href=\"chall-5.php\">Next</a></div>";
     }else{
         document.getElementById("content").innerHTML = "Start value <span class=\"siimple-tag siimple-tag--red\">" + document.getElementById("guess").value.toString() + '</span><br><br>';
     }
}
</script>
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src='https://use.fontawesome.com/releases/v5.3.1/js/all.js'></script><script  src="./script.js"></script>

</body>

</html>
