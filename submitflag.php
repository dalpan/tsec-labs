<?php

    include 'config.php';
    include 'session.php';

    $_POST = json_decode(file_get_contents("php://input"),TRUE);
    //$_POST = json_decode($_POST["message"], TRUE);

    if (isset($_POST['cid']) && isset($_POST['flag'])) {

        $cid = base64_decode($_POST['cid']);
        $userId = $login_user_id;
        $flag = $_POST['flag'];

        $sql = "select * from scoreboard where c_id = ".$cid." and user_id = ".$userId." ;";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $response = (object)array(); // solved : https://stackoverflow.com/questions/8900701/creating-default-object-from-empty-value-in-php
            $response->status = 200;
            $response->message = "You have already solved this question";
            die(json_encode($response));
        }else{
            $sql = "SELECT flag FROM `challenges` where id =".$cid;
            $result = mysqli_query($conn, $sql) or die(mysqli_error());
            $count = mysqli_num_rows($result);
    
            if ($count > 0 ){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                if ($row['flag'] == $flag) {
                    $sql = "insert into scoreboard(user_id, c_id) values(".$userId.",".$cid.");"; 
                    $result = mysqli_query($conn, $sql) or die(mysqli_error());
                    
                    $response = (object)array(); // solved : https://stackoverflow.com/questions/8900701/creating-default-object-from-empty-value-in-php
    
                    $response->status = 200;
                    $response->message = "Awesome! Correct Flag!";
                    echo json_encode($response);
                } else {
                    $response = (object)array(); // solved : https://stackoverflow.com/questions/8900701/creating-default-object-from-empty-value-in-php
                    $response->status = 500;
                    $response->message = "Wrong Flag";
                    echo json_encode($response);
                }
            } else {
                $response = (object)array(); // solved : https://stackoverflow.com/questions/8900701/creating-default-object-from-empty-value-in-php
    
                $response->status = 500;
                $response->message = "Invalid Challenge";
                echo json_encode($response);
            }
        }

        
        } else {
            $response = (object)array(); // solved : https://stackoverflow.com/questions/8900701/creating-default-object-from-empty-value-in-php

            $response->status = 500;
            $response->message = "in sufficient parameters";
            echo json_encode($response);
        }
    
    //echo $_POST['flag'];
?>