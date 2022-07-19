<div class="admin-leaderboard">
    <div class="container">
    <div class="settings">
    
    <h3>Settings</h3>
    <form action="includes/edit_profile.php" method="POST">
        <label>Full Name</label>
        <input type="text" name="username" value="<?php echo $login_username ?>">
        <input type="submit" name="change-name" value="change">
    </form>
    <form  action="includes/edit_profile.php" method="POST" id="form-password">
        <label>Password</label>
        <input type="text" name="old-password" placeholder="Old Password">
        <input type="text" id="pswd1" name="new-password" placeholder="New Password">
        <input type="text" id="pswd2" onchange="onChange()" name="confirm-password" placeholder="Retype new Password">
        <input type="submit" name="change-password" value="change">
    </form>

    
    </div>
    </div>
</div>
<script>
        function onChange() {
            
        const password = document.querySelector('input[name=new-password]');
        const confirm = document.querySelector('input[name=confirm-password]');
        if (confirm.value === password.value) {
            // alert(1);
        } else {
            Swal.fire('Passwords do not match!', '', 'error')
        }
        }
</script>