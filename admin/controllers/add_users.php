<?php 
    require '../../admin_session.php';
    require_once '../../config.php';

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adduser'])) {

        $fullname = mysqli_real_escape_string($conn,$_POST['name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $role = mysqli_real_escape_string($conn,$_POST['role']);



        $sql = "INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `org`) VALUES (NULL, '$fullname', '$email', '$password', '$role', '') ";
        // $sql = $sql." values (\"$ch_name\", \"$ch_desc\", \"$ch_flag\", $ch_score, \"$ch_link\", \"$ch_cat_id\",\"$ch_hint\",\"$ch_hintpoint\");";
        
        if(! $conn ) {
            die('Could not connect: ' . mysqli_error());
        }

        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        
        header('Location: ../../admin.php?p=users');
    }
?>