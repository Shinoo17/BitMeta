<?php
    session_start();

    $email = $_POST["email"];
    $password = $_POST["password"];
    $password = sha1($password);

    $conn = new PDO("mysql:host=localhost;dbname=bitmeta;charset=utf8","root","");

    $sql = "UPDATE user SET Password='$password' WHERE Email='$email'";
    $conn->exec($sql);
    
    $conn = null;
    header("location: ../login.php");
?>