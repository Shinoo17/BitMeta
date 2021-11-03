<?php
    session_start();
    if(!isset($_SESSION["User_ID"])){
        header("location:http://localhost/work/BitMeta/index.html");
        die();
    }
    $User_ID = $_SESSION["User_ID"];
    $conn = new PDO("mysql:host=localhost;dbname=test;charset=utf8","root","");
    $sql = "SELECT coin.Symbol,wallet.Amount FROM wallet as wallet INNER JOIN crypto_coin as coin ON (wallet.Coin_ID = coin.Coin_ID) where wallet.User_ID='$User_ID'";
    $result = $conn->query($sql);
    $wallet = array();
    $wallet["Username"] = $_SESSION["Username"];
    while($row = $result->fetch()){
        $wallet[$row[0]] = $row[1];
    }
    echo json_encode($wallet);
    $conn = null;
?>