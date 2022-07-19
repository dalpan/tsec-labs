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

        $del = mysqli_query($conn, "DELETE FROM `category` WHERE `cat_id` = ".$_POST['id']);
        if ($del) {
            echo "<body onload='DeleteSuccess()'>";
        }
    
    }else{

        $cat_name = mysqli_real_escape_string($conn,$_POST['title']);
        $sql = "UPDATE `category` SET `name` = '$cat_name' WHERE `category`.`cat_id` = ".$_POST['id'];
        // $sql = "insert into category (name) values (\"".$cat_name."\")";
        
        if(!$conn) {
            die('Could not connect: ' . mysqli_error());
        }elseif (mysqli_query($conn, $sql)) {
            echo "
            <body onload='UpdateSuccess()'>
                ";
        }

        // $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        
        // header('Location: /anton/admin.php?p=categories');
    }
?>

<script>
function DeleteSuccess() {
    Swal.fire('Categories deleted!', '', 'success').then(function(){
    window.location.href = '../../admin.php?p=categories';
});
}
function UpdateSuccess() {
    Swal.fire('Categories updated!', '', 'success').then(function(){
    window.location.href = '../../admin.php?p=categories';
});
}


// window.location.href='../../admin.php?p=categories';
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>