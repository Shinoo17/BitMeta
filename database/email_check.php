<?php
    /* Email check for register */
    
    $email = $_POST['email']; 

    $conn = new PDO("mysql:host=localhost;dbname=bitmeta;charset=utf8","root","");

    $sql = "SELECT * FROM user where Email='$email'";
    $result = $conn->query($sql);
    if($result->rowCount() >= 1){
        echo json_encode( array(
            "isDuplicate" => true
        ));
    } else {
        echo json_encode( array(
            "isDuplicate" => false
        ));
    }
    
?>