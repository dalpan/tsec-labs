<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WXploit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/style.css" />
    <script src="../../js/main.js"></script>
    <script src="../../js/axios.min.js"></script>
    <link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>

</head>

<?php 
    include '../session.php';
    include '../config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change-name'])) {

        if(isset($_POST['username'])) {

            $change_name = mysqli_escape_string($conn, $_POST['username']);
            $sql = "update users set name = \"".$change_name."\" where id = ".$login_user_id;
            // $result = ;
            // $count = mysqli_num_rows($result);
            if((mysqli_query($conn, $sql) or die(mysqli_error())) > 0) {
                echo "
                <body onload='UpdateSuccess()'>
                    ";
            }
            // header('Location: ../admin.php?p=settings');
        } else {
            echo "Invalid Parameter";
        }
    }else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change-password'])) {

        if(isset($_POST['old-password']) && isset($_POST['new-password'])) {

            $change_password = $_POST['new-password'];
            $old_password = $_POST['old-password'];

            $sql = "select email from users where id = $login_user_id and password = \"$old_password\";";
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            $count = mysqli_num_rows($result);
            if ($count > 0 ) {
                $sql = "update users set password = '$change_password' where id = $login_user_id";
                // $result = ;
                // $count = mysqli_num_rows($result);
                if (mysqli_query($conn, $sql) or die(mysqli_error())) {
                    echo "
                    <body onload='UpdatePassSuccess()'>
                        ";
                }
                // header('Location: ../admin.php?p=settings');
            } else {
                echo "
                    <body onload='incorrectPass()'>
                        ";
            }
        } else {
            echo "
                    <body onload='invalidParam()'>
                        ";
        }
    }else {
        echo "
                    <body onload='erRor()'>
                        ";
    }

?>

<script>

function UpdateSuccess() {
    Swal.fire('User updated!', '', 'success').then(function(){
    window.location.href = '../admin.php?p=settings';
});
}
function UpdatePassSuccess() {
    Swal.fire('Password updated!', '', 'success').then(function(){
    window.location.href = '../admin.php?p=settings';
});
}

function incorrectPass() {
    Swal.fire('Incorrect Password!', '', 'error').then(function(){
    window.location.href = '../admin.php?p=settings';
});
}
function invalidParam() {
    Swal.fire('Invalid Param!', '', 'error').then(function(){
    window.location.href = '../admin.php?p=settings';
});
}
function erRor() {
    Swal.fire('Error!', '', 'error').then(function(){
    window.location.href = '../admin.php?p=settings';
});
}

// window.location.href='../../admin.php?p=categories';
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>