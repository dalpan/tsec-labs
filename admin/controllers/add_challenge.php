<?php 
    require '../../admin_session.php';
    require_once '../../config.php';

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_challenge'])) {

        $ch_name = mysqli_real_escape_string($conn,$_POST['title']);
        $ch_desc = mysqli_real_escape_string($conn,$_POST['description']);
        $ch_cat_id = mysqli_real_escape_string($conn,$_POST['cat_id']);
        $ch_score = mysqli_real_escape_string($conn,$_POST['score']);
        $ch_flag = mysqli_real_escape_string($conn,$_POST['flag']);
        $ch_hint = mysqli_real_escape_string($conn,$_POST['hint']);
        $ch_hintpoint = mysqli_real_escape_string($conn,$_POST['hintpoint']);
        $ch_link = mysqli_real_escape_string($conn,$_POST['link']);


        $sql = "insert into challenges (title, description,flag, score,link, cat_id, hint, hintpoint)";
        $sql = $sql." values (\"$ch_name\", \"$ch_desc\", \"$ch_flag\", $ch_score, \"$ch_link\", \"$ch_cat_id\",\"$ch_hint\",\"$ch_hintpoint\");";
        
        if(! $conn ) {
            die('Could not connect: ' . mysqli_error());
        }

        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        
        header('Location: ../../admin.php?p=challenges');
    }
?>