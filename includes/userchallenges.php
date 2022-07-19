            <div class="row">
            <div class="col-xl-12">
        <?php 
            global $idchal;
            $idchal = array();
            $sql = "select c_id from scoreboard where user_id = ".$login_user_id;
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            $solved_id = array();
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($solved_id, $row['c_id']);
            }

            $sql = "select ch.id, ch.title, ch.score,ch.link as link, cat.name as cat_name, ch.description as descr from challenges as ch, category as cat where ch.cat_id = cat.cat_id order by cat.name";
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            $count = mysqli_num_rows($result);
            $prev_cat_name = "";
            
            $flag = 0;

            if ($count > 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    if ($prev_cat_name != $row["cat_name"]) {

                        if ($flag == 1) {
                            // echo "</div>";
                        }
                        $flag = 1;

                        $prev_cat_name = $row["cat_name"];

                        // echo "<h3>".$row["cat_name"]."</h3>";
                        // echo "<div class='card-container'>";
                    
                    ?>
              <div class="lead mb-3 text-mono text-success"style="text-align: left">
                    <?= $row["cat_name"]; ?>
              </div>
              <div class="panel-group" id="accordion" is-disabled="true">
                <?php
                    }
                    $idchal[] = $row["id"];
                    
                ?>


                <div class="panel panel-default">
                  <div class="container">
                    <div class="panel-heading">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$row["id"]?>">
                        <div class="panel-title">
                          <h4>
                            <?= $row["title"] ?>
                            <p style="float:right">
                              <?= $row["score"] ?> points 

                              <font style="color:#17b06b!important;" 
                              <?= $isSolvedClass = in_array($row["id"], $solved_id) ? "" : "hidden"; $isSolvedClas?>
                              >| Solved</font>
                            </p>
                            
                          </h4>
                        </div>
                      </a>
                    </div>
                    <div id="collapse<?=$row["id"]?>" class="panel-collapse collapse in">
                      <div class="panel-body">
                        <?= $row['descr'] ?>
                        <br>
                        <br>
                        <div class="row justify-content-between">
                          <div class="col-xl-4 align-self-center">
                            <a href="<?= $row["link"] ?>" target="_blank" class="btn btn-shadow text-mono btn-outline-success" style="width:100%"><span class="fa fa-link mr-2"></span>Go to challenge</a>
                          </div>
                          <div class="col-xl-4 align-self-center">
                            <!-- <form action="" method="post"> -->
                              <!-- <input type="hidden" name="idchall" value=""> -->
                              <button onclick="axiosGethint(this)" 
                                data-id="<?= base64_encode($row["id"]) ?>" 
                                type="button" name="gethint" 
                                class="btn btn-shadow btn-outline-success" 
                                data-toggle="modal" 
                                data-target="#hint<?= str_replace("=","".$row['id'], base64_encode($row["id"])) ?>" 
                                style="width:100%">
                                <span class="far fa-lightbulb mr-2"></span>
                                Get HINT
                              </button>
                            <!-- </form> -->
                          </div>
                          <div class="col-xl-4 align-self-center">
                            <div class="input-group">
                              <input type="text" class="form-control" id="flagvalue<?= $row["id"] ?>" placeholder="Enter Flag" aria-label="Enter Flag"
                                aria-describedby="basic-addon2">
                              <div class="input-group-append">
                                <button class="btn btn-outline-success" data-id="<?= base64_encode($row["id"]) ?>" onclick="submitFlag(this)" type="button">GO!</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php 
                }

                echo '</div>';

            }
        ?>
              
              <!-- <h5 class="display-6" style="text-align: center">Solve these quests to unlock more quests!!</h5> -->
            </div>
          </div>

    <div class="modal fade" id="hintshow" tabindex="-1" role="dialog" aria-labelledby="hint label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body" id="bodyhint">
            
          </div>
        </div>
      </div>
    </div>