<?php
    session_start();
    if(isset($_SESSION["User_ID"])){
        header("location:http://localhost/work/BitMeta/index.php");
        die();
    }

    $username = $_POST['username']; 
    $password = $_POST['password'];
    $conn = new PDO("mysql:host=localhost;dbname=bitmeta;charset=utf8","root","");
    $sql = "SELECT * FROM user where Username='$username' and Password=sha1('$password')";
    $result = $conn->query($sql);
    if($result->rowCount()==1){
        $data = $result->fetch(PDO::FETCH_ASSOC);
        if( !isset($_POST['remember-me']) ){
            session_set_cookie_params(0);
        }
        $_SESSION["Username"] = $username;
        $_SESSION["User_ID"] = $data["User_ID"];
        $_SESSION["session_id"] = session_id();
        header("location: ../index.php");
        die();
    }else{
        header("location: ../login.php");
        die();
    }
?>
