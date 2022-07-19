<?php 
    include 'config.php';
    include 'session.php';
    
    $_POST = json_decode(file_get_contents("php://input"),TRUE);

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cid'])) {
        $cid = $_POST['cid'];
        $userid = $login_user_id;

        $hint = "SELECT hint, hintpoint FROM challenges WHERE id = ".base64_decode($cid);
        $result = mysqli_query($conn, $hint) or die(mysqli_error());
        if (!$result) echo "ERROR";
        $count = mysqli_num_rows($result);

        if ( $count != 1) {
            $obj = (object)array(); // solved : https://stackoverflow.com/questions/8900701/creating-default-object-from-empty-value-in-php
            $obj->message = "ERROR";
            die(json_encode($obj));
        } else {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $sqlcollecthint = mysqli_query($conn, "INSERT INTO `hintcollect` (`idhint`, `iduser`, `idchall`) VALUES (NULL, '$userid', '".base64_decode($cid)."');");
            
            $obj = (object)array(); // solved : https://stackoverflow.com/questions/8900701/creating-default-object-from-empty-value-in-php
            $obj->hint = $row["hint"];
            echo json_encode($obj);
            die();
        }

        
    }

?>