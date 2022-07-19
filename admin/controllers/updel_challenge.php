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
        $sqldel = "DELETE FROM `challenges` WHERE `id` = ".$_POST['id'];	
        if (mysqli_query($conn, $sqldel)) {
            echo "
            <body onload='DeleteSuccess()'>
                ";
        }
    }else{

        $ch_name = mysqli_real_escape_string($conn,$_POST['title']);
        $ch_desc = mysqli_real_escape_string($conn,$_POST['description']);
        $ch_cat_id = mysqli_real_escape_string($conn,$_POST['cat_id']);
        $ch_score = mysqli_real_escape_string($conn,$_POST['score']);
        $ch_flag = mysqli_real_escape_string($conn,$_POST['flag']);
        $ch_hint = mysqli_real_escape_string($conn,$_POST['hint']);
        $ch_hintpoint = mysqli_real_escape_string($conn,$_POST['hintpoint']);
        $ch_link = mysqli_real_escape_string($conn,$_POST['link']);

        $idcal = $_POST['id'];
        $sql = "UPDATE `challenges` SET 
        `title` = '$ch_name', 
        `description` = '$ch_desc', 
        `flag` = '$ch_flag', 
        `score` = '$ch_score', 
        `link` = '$ch_link', 
        `cat_id` = '$ch_cat_id', 
        `hint` = '$ch_hint', 
        `hintpoint` = '$ch_hintpoint'
        WHERE `challenges`.`id` = $idcal";

        if(!$conn) {
            die('Could not connect: ' . mysqli_error());
        }elseif (mysqli_query($conn, $sql)) {
            echo "
            <body onload='UpdateSuccess()'>
                ";
        }

        // $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        
        // header('Location: ../../admin.php?p=challenges');
    }
?>
<script>
function DeleteSuccess() {
    Swal.fire('Challenge deleted!', '', 'success').then(function(){
    window.location.href = '../../admin.php?p=challenges';
});
}
function UpdateSuccess() {
    Swal.fire('Challenge updated!', '', 'success').then(function(){
    window.location.href = '../../admin.php?p=challenges';
});
}


// window.location.href='../../admin.php?p=challenges';
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>