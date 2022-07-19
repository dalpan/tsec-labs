<?php
session_start();
// include('security.php');
include("config.php");

if(isset($_POST['simpan']))
{
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
    $usertype = mysqli_real_escape_string($conn, $_POST['usertype']);
    $teams = mysqli_real_escape_string($conn, $_POST['teams']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $fullname = $first_name . " " . $last_name;
    $email_query = "SELECT `email` FROM users WHERE email='$email' ";
    $email_query_run = mysqli_query($conn, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: registration.php');
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) 
            VALUES (NULL, '$fullname', '$email', '$password', 'user')";
            $query_run = mysqli_query($conn, $query);

            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "User Success Registed";
                $_SESSION['status_code'] = "success";
                header('Location: login.php');
            }
            else
            {
                $_SESSION['status'] = "User Not Registed";
                $_SESSION['status_code'] = "error";
                header('Location: registration.php');
            }
        }
        else
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: registration.php');
        }
    }

}
