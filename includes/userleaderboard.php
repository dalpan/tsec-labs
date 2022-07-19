          <div class="row">
            <div class="col-xl-6">

            </div>
            <div class="col-xl-12">
              <table class="table table-hover table-dark">
                <thead>
                  <tr class="bg-dark">
                    <th>#</th>
                    <th>Username / Team</th>
                    <th>Challenges Solved</th>
                    <th>Score</th>
                    <th>Time Taken</th>
                  </tr>
                </thead>
                <tbody>
                            <?php 

                            $sql = "select @a:=@a+1 as rank, u.name as name,u.id as iduser,  count(sb.c_id) as solved, sum(ch.score) as score, sb.ts as time, u.org as tim from (SELECT @a:= 0) AS a, users as u, challenges as ch, scoreboard as sb where sb.c_id = ch.id and sb.user_id = u.id group by sb.user_id order by score desc limit 10;";
                            $result = mysqli_query($conn, $sql) or die(mysqli_error());
                            $count = mysqli_num_rows($result);
                            $i = 1;
                            if ($count > 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                  $allhint = mysqli_query($conn, "SELECT  *, sum(challenges.hintpoint) as totalhint FROM `hintcollect` JOIN challenges WHERE challenges.id = hintcollect.idchall AND hintcollect.iduser = $login_user_id;");
                                  $rowhint = mysqli_fetch_array($allhint, MYSQLI_ASSOC);
                                  ?>

                              <tr>
                                <th scope="row"><?=$i++ ?></th>
                                <td><?=$row["name"] ?> 
                                <?=$row["tim"] == '' ? '':'<font style="color:#17b06b!important">('.$row["tim"].')</font>' ?>
                                </td>
                                <td><?=$row["solved"] ?></td>
                                <td>
                                  <?=$row['iduser'] == $login_user_id ? ($row["score"]- $rowhint['totalhint']):$row["score"] ?>
                                </td>
                                <td><?=$row["time"] ?></td>
                              </tr>
                                <?php 
                                }

                            }

                            ?>
                  </tbody>
                </table>
            </div>     
          </div>