<div class="admin-leaderboard">
    <div class="container">
        <div class="toolbar">
            <h3>List Users</h3>
            <button id="btn-add-user">ADD</button>
        </div>
        <table>
            <tr class="head">
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>

            <?php 

                $sql = "select * from users";
                $result = mysqli_query($conn, $sql) or die(mysqli_error());
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<tr class='content'
                            data-id='".$row["id"]."'
                            data-name='".$row["name"]."'
                            data-email='".$row["email"]."'
                            data-password='".base64_encode($row["password"])."'
                            onclick='showForm(this)'
                        >";
                        echo "<td>".$row["id"]."</td>";
                        echo "<td>".$row["name"]."</td>";
                        echo "<td>".$row["email"]."</td>";
                        echo "<td>".$row["role"]."</td>";
                        echo "</tr>";
                    }

                }

            ?>
        </table>
    </div>

</div>

<div id="modal-add-user" class="modal">
    <div class="modal-card">
        <h2>New Users</h2>
        <form action="admin/controllers/add_users.php" method="POST">
            <input type="text" name="name" placeholder="Full name"/>
            <input type="text" name="email" placeholder="email"/>
            <input type="text" name="password" placeholder="********"/>
            <div class="row">
                <select name="role">
                    <option disabled selected>Choose role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <input type="submit" name="adduser" value="CREATE">
        </form>
        <button id="btn-modal-close"class="btn-close"><img src="images/close.svg"/></button>
    </div>
</div>

<script src="js/modal.js"></script>
<script>
    Modal.init("modal-add-user", "btn-add-user", "btn-modal-close");

    function showForm(id) {
        var iduser = id.getAttribute("data-id");
        var name = id.getAttribute("data-name");
        var email = id.getAttribute("data-email");
        var password = atob(id.getAttribute("data-password"));
        var role = id.getAttribute("data-role");





    
        Swal.fire({
        title: 'Update Challenge',
        html: ` <form action="admin/controllers/updel_users.php" method="POST" id="update">
                    <input type="hidden" name="option" id="option" value="">
                    <input class="swal2-input" style="width:80%;" type="hidden" name="id"  value="${iduser}">
                    <input class="swal2-input" style="width:80%;" type="text" name="name" id="names" value="${name}">
                    <input class="swal2-input" style="width:80%;" type="text" name="email" id="emails" value="${email}">
                    <input class="swal2-input" style="width:80%;" type="text" name="password" id="passwords" value="${password}">
                    <div class="row ">
                        <select name="role" style="width:80%;" class="swal2-input">
                            <option disabled selected>Choose role</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                </form>`,
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Update',
        denyButtonText: `Delete`,
        focusConfirm: false,
        width: 700,
        preConfirm: () => {
            const formx = document.getElementById('update');
            
            const names = Swal.getPopup().querySelector('#names').value;
            const emails = Swal.getPopup().querySelector('#emails').value;
            const passwords = Swal.getPopup().querySelector('#passwords').value;

            if (!names || !emails || !passwords) {
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