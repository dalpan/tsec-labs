<div class="admin-categories">
    <div class="container">
        <div class="toolbar">
            <h3>Categories</h3>
            <button id="btn-add-category">ADD</button>
        </div>
        <table>
            <tr class="head">
                <th>Sl.no</th>
                <th>Cat ID</th>
                <th>Category</th>
                <th>Challenges</th>
            </tr>

            <?php 
                $sql = "select @a:=@a+1 sl_no, cat.cat_id, cat.name from category cat, (SELECT @a:= 0) AS a order by cat.cat_id";
                $result = mysqli_query($conn, $sql) or die(mysqli_error());
                if (!$result) echo "ERROR";
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                        $totalchal = mysqli_fetch_array(mysqli_query($conn, "select count(*) as total from challenges where cat_id = ".$row["cat_id"].";")) or die(mysqli_error());
                        echo "<tr class='content'
                        data-id='".$row["cat_id"]."'
                        data-name='".base64_encode($row["name"])."'
                        data-total='".$totalchal["total"]."'
                        onclick='showForm(this)'>";        
                        
                        echo "<td>".$row["sl_no"]."</td>";
                        echo "<td>".$row["cat_id"]."</td>";
                        echo "<td>".$row["name"]."</td>";
                        echo "<td>".$totalchal[0]."</td>";
                        echo "</tr>";
                    }

                }

            ?>
        </table>
    </div>

</div>

<div id="modal-add-category" class="modal">
    <div class="modal-card">
        <h2>New Category</h2>
        <form action="admin/controllers/add_category.php" method="POST">
            <input type="text" name="title" placeholder="Category Title"/>
            <input type="submit" name="add_category" value="CREATE">
        </form>
        <button id="btn-modal-close"class="btn-close"><img src="images/close.svg"/></button>
    </div>
</div>

<script src="js/modal.js"></script>
<script>
    Modal.init("modal-add-category", "btn-add-category", "btn-modal-close");

    function showForm(params) {
        var id = params.getAttribute("data-id");
        var name = atob(params.getAttribute("data-name"));
        var total = params.getAttribute("data-total");
        var form = document.getElementById("modal-add-category").querySelector("form");
        
  
        Swal.fire({
        title: 'Update Categorie',
        html: ` <form action="admin/controllers/updel_category.php" method="post" id="update" name="updatecat">
                    <input type="hidden" name="id" value="${id}">
                    <input type="hidden" name="option" id="option" value="">
                    <input style="width:80%;" value="`+name+`" type="text" class="swal2-input" id="title" name="title" placeholder="Challenge Title">
                </form>`,
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Update',
        denyButtonText: `Delete`,
        focusConfirm: false,
        width: 700,
        preConfirm: () => {
            const formx = document.getElementById('update');
            
            const titless = Swal.getPopup().querySelector('#title').value;

            if (!titless) {
            Swal.showValidationMessage(`Please fill out the form`)
            }else{
                formx.submit();
            }

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