<div class="admin-challenges">
    <div class="container">
        <div class="toolbar">
            <h3>Challenges</h3>
            <button id="btn-add-challenge">ADD</button>
        </div>
        <table>
            <tr class="head">
                <th>Sl.no</th>
                <th>Title</th>
                <th>Category</th>
                <th>Score</th>
                <th>Solved</th>
            </tr>

            <?php 

                
                $sql = "select @a:=@a+1 sl_no, 
                ch.id, 
                ch.title, 
                ch.score,
                ch.link, 
                ch.description,
                ch.flag, 
                ch.hint,
                ch.hintpoint,
                cat.name  
                from (SELECT @a:= 0) AS a, challenges ch, category cat where ch.cat_id = cat.cat_id order by ch.id
                   ";
                   
                $solved = "select sb.c_id, 
                count(*) as solved
                
                FROM 
                scoreboard as sb 
                GROUP BY sb.c_id;";
                
                $result = mysqli_query($conn, $sql) or die(mysqli_error());
                if (!$result) echo "ERROR";
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $idchalll = $row["id"];
                        $datasolved = mysqli_fetch_array(mysqli_query($conn, "select sb.c_id, 
                        count(*) as solved
                        FROM 
                        scoreboard as sb 
                        WHERE sb.c_id= $idchalll;")) or die(mysqli_error());
                        
                        echo "<tr class='content' 
                                data-id='".$row["id"]."' 
                                data-title='".$row["title"]."' 
                                data-deskripsi='".base64_encode($row["description"])."' 
                                data-cat='".$row["name"]."' 
                                data-scor='".$row["score"]."' 
                                data-solv='".$row["sl_no"]."'
                                data-flag='".$row["flag"]."'
                                data-link='".base64_encode($row["link"])."'
                                data-hint='".base64_encode($row["hint"])."'
                                data-hintpoint='".$row["hintpoint"]."'
                                onclick='showForm(this)'>";

                        echo "<td>".$row["sl_no"]."</td>";
                        echo "<td>".$row["title"]."</td>";
                        echo "<td>".$row["name"]."</td>";
                        echo "<td>".$row["score"]."</td>";
                        echo "<td>".$datasolved[1]."</td>";
                        echo "</tr>";
                    }

                }

            ?>
        </table>
    </div>

</div>

<div id="modal-add-challenge" class="modal">
    <div class="modal-card">
        <h2>New Challenge</h2>
        <form action="admin/controllers/add_challenge.php" method="POST">
            <input type="text" name="title" placeholder="Challenge Title"/>
            <input type="text" name="link" placeholder="Link chall"/>
            <textarea name="description" placeholder="Challenge Description"></textarea>
            <div class="row">
                <input style="float: left; margin-left: 0;" type="text" placeholder="Hint" name="hint" id="hint">
                <input type="text" placeholder="Hintpoint" name="hintpoint" id="hintpoint">
            </div>
            <div class="row">
                <select name="cat_id">
                    <option disabled selected>Choose category</option>
                    <?php 
                        $sql = "select cat.cat_id, cat.name from category cat order by cat.cat_id";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error());
                        if (!$result) echo "ERROR";
                        $count = mysqli_num_rows($result);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                echo "<option value=\"".$row["cat_id"]."\">".$row["name"]."</option>";
                            }
                        }
                    ?>
                </select>
                <input type="text" placeholder="Score" name="score" />
                <input type="text" placeholder="Flag" name="flag" />
            </div>
            <input type="submit" name="add_challenge" value="CREATE">
        </form>
        <button id="btn-modal-close"class="btn-close"><img src="images/close.svg"/></button>
    </div>
</div>


<script src="js/modal.js"></script>
<script>
    Modal.init("modal-add-challenge", "btn-add-challenge", "btn-modal-close");

    function showForm(id) {
        var idchall = id.getAttribute("data-id");
        var datatitle = id.getAttribute("data-title");
        var deskripsi = id.getAttribute("data-deskripsi");
        var cat = id.getAttribute("data-cat");
        var scor = id.getAttribute("data-scor");
        var solv = id.getAttribute("data-solv");
        var flag = id.getAttribute("data-flag");
        var hint = atob(id.getAttribute("data-hint"));
        var hintpoint = id.getAttribute("data-hintpoint");
        var link = atob(id.getAttribute("data-link"));
        console.log(link);



    
        Swal.fire({
        title: 'Update Challenge',
        html: ` <form action="admin/controllers/updel_challenge.php" method="post" id="update" name="updatechall">
                    <input type="hidden" name="id" value="${idchall}">
                    <input type="hidden" name="option" id="option" value="">
                    <input style="width:80%;" value="`+datatitle+`" type="text" class="swal2-input" id="title" name="title" placeholder="Challenge Title">
                    <input style="width:80%;" value="${link}" class="swal2-input" type="text" name="link" placeholder="Link chall"/>
                    <textarea style="width:80%; height:120px;"  class="swal2-input"  name="description" id="description" placeholder="Challenge Description">`+atob(deskripsi)+`</textarea>
                    <div class="row">
                        <input class="swal2-input" style="width:80%;" type="text" placeholder="Hint" name="hint" id="hint" value="${hint}">
                        <input class="swal2-input" style="width:80%;" type="text" placeholder="Hintpoint" name="hintpoint" id="hintpoint" value="${hintpoint}">
                    </div>
                    <div class="row" >
                    <select style="width:80%;" name="cat_id" class="swal2-input" id="cat_id">
                        <option disabled selected>Choose category</option>
                        <?php 
                            $sql = "select cat.cat_id, cat.name from category cat order by cat.cat_id";
                            $result = mysqli_query($conn, $sql) or die(mysqli_error());
                            if (!$result) echo "ERROR";
                            $count = mysqli_num_rows($result);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo "<option value=\"".$row["cat_id"]."\">".$row["name"]."</option>";
                                }
                            }
                        ?>
                    </select>
                    <input value=`+scor+` style="width:30%;" type="text" class="swal2-input" placeholder="Score" name="score" />
                    <input value=`+flag+` style="width:35%;" type="text" class="swal2-input" placeholder="Flag" name="flag" />
                </div>
                </form>`,
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Update',
        denyButtonText: `Delete`,
        focusConfirm: false,
        width: 700,
        preConfirm: () => {
            const formx = document.getElementById('update');
            
            const datit = Swal.getPopup().querySelector('#title').value;
            const desc = Swal.getPopup().querySelector('#description').value;
            const catg = Swal.getPopup().querySelector('#cat_id').value;
            // const datit = Swal.getPopup().querySelector('#login').value;
            // const password = Swal.getPopup().querySelector('#password').value;
            if (!datit || !desc || !catg) {
            Swal.showValidationMessage(`Please fill out the form`)
            }else{
                formx.submit();
            }
            // return { login: login, password: password }
        }
        }).then((result) => {
            if (result.isConfirmed) {
                // Swal.fire('Saved!', '', 'success')
            } else if (result.isDenied) {
                const formx = document.getElementById('update');
                const option = document.getElementById('option');
                option.value = "delete";
                formx.submit();
                // Swal.fire(' Delete challenge success!', '', 'info')
            }
        })

    }
</script>
