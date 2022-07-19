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
    require '../../admin_session.php';
    require_once '../../config.php';

    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['option'] == 'delete') {

        $del = mysqli_query($conn, "DELETE FROM `users` WHERE `id` = ".$_POST['id']);
        if ($del) {
            echo "<body onload='DeleteSuccess()'>";
        }
    
    }else{

        $fullname = mysqli_real_escape_string($conn,$_POST['name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $role = mysqli_real_escape_string($conn,$_POST['role']);
        $iduser = $_POST['id'];
        $sql = "UPDATE `users` SET 
            `name` = '$fullname', 
            `email` = '$email', 
            `password` = '$password', 
            `role` = '$role', 
            `org` = NULL 
            WHERE `users`.`id` = $iduser ";
        // $sql = "insert into category (name) values (\"".$cat_name."\")";
        
        if(!$conn) {
            die('Could not connect: ' . mysqli_error());
        }elseif (mysqli_query($conn, $sql)) {
            echo "
            <body onload='UpdateSuccess()'>
                ";
        }

        // $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        
        // header('Location: /anton/admin.php?p=users');
    }
?>

<script>
function DeleteSuccess() {
    Swal.fire('Users deleted!', '', 'success').then(function(){
    window.location.href = '../../admin.php?p=users';
});
}
function UpdateSuccess() {
    Swal.fire('Users updated!', '', 'success').then(function(){
    window.location.href = '../../admin.php?p=users';
});
}


// window.location.href='../../admin.php?p=users';
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>