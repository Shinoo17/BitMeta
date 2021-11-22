<?php
    session_start();
    if(!isset($_SESSION["User_ID"])){
        header("location: ../login.php");
        die();
    }

    $User_ID = $_SESSION["User_ID"];
    $baht = $_POST["Baht"];
    $USDT = $_POST["USDT"];

    $conn = new PDO("mysql:host=localhost;dbname=bitmeta;charset=utf8","root","");

    $sql = "SELECT * FROM bank_account WHERE User_ID='$_SESSION[User_ID]'";
    $resultBank = $conn->query($sql);
    if($resultBank->rowCount()==0){
        $_SESSION["error"] = "NoBank";
        header("location: ../BuySellCrypto.php");
        die();
    }else{
        $Account_Number = $resultBank->fetch(PDO::FETCH_ASSOC);
    }
    
    $sql = "SELECT Amount FROM wallet where User_ID='$User_ID' && Coin_ID='1'";
    $result = $conn->query($sql);
    $balanceUSDT = $result->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST["buy"])){
        $newBalance = $balanceUSDT["Amount"] + $USDT;
        $status = "Buy";
        $_SESSION["success"] = "Buy";
        $_SESSION["USDT"] = $USDT; 
    } else if(isset($_POST["sell"])){
        $newBalance = $balanceUSDT["Amount"] - $USDT;
        if( $newBalance < 0 ){
            $_SESSION["error"] = "NotEnoughCoin";
            header("location: ../BuySellCrypto.php");
            die(); 
        }
        $status = "Sell";
        $_SESSION["success"] = "Sell";
        $_SESSION["USDT"] = $USDT; 
    }

    $sql = "UPDATE wallet SET Amount='$newBalance' where User_ID='$User_ID' && Coin_ID='1'";
    $conn->exec($sql);

    $sql = "INSERT INTO payment (User_ID,USDT,Total,Time,Status,Account_Number) VALUES ('$User_ID','$USDT','$baht',NOW(),'$status','$Account_Number[Account_Number]')";
    $conn->exec($sql);

    header("location: ../BuySellCrypto.php");

?>