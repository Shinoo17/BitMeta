<?php
    session_start();
    if(!isset($_SESSION["User_ID"])){
        header("location: ../login.html");
        die();
    }

    $User_ID = $_SESSION["User_ID"];
    $baht = $_POST["Baht"];
    $USDT = $_POST["USDT"];

    $conn = new PDO("mysql:host=localhost;dbname=test;charset=utf8","root","");
    $sql = "SELECT Amount FROM wallet where User_ID='$User_ID' && Coin_ID='1'";
    $result = $conn->query($sql);
    $balanceUSDT = $result->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST["buy"])){
        $newBalance = $balanceUSDT["Amount"] + $USDT;
    } else if(isset($_POST["sell"])){
        $newBalance = $balanceUSDT["Amount"] - $USDT;
        if( $newBalance < 0 ){ die(); }
    }

    $sql = "UPDATE wallet SET Amount='$newBalance' where User_ID='$User_ID' && Coin_ID='1'";
    $conn->exec($sql);
    header("location: ../index.html");

?>