<?php 
    session_start();
    if(!isset($_SESSION["User_ID"])){
        header("location: http://localhost/work/BitMeta/login.php");
        die();
    }

    $conn = new PDO("mysql:host=localhost;dbname=bitmeta;charset=utf8","root","");

    $User_ID = $_SESSION["User_ID"];
    $coin_id = $_POST["coin_id"];
    $type = $_POST["type"];
    $side = $_POST["side"];

    if($side=="Buy"){
        $sql = "SELECT * FROM wallet where User_ID='$User_ID' && Coin_ID='1'";
        $result = $conn->query($sql);
        $data = $result->fetch(PDO::FETCH_ASSOC);
        $USDT = $data['Amount'];
        $total = $_POST["total"];
        $total = floor($total * 10000) / 10000;
        $newBalance = $USDT - $total;
        //if( $newBalance < 0 ) { die(); }
        if($type == "limit"){
            $price = $_POST["price"];
            $amount = $_POST["amount"];
            $amount = floor($amount * 10000) / 10000;
            $sql_order = "INSERT INTO orders_limit (User_ID,Coin_ID,Side,Price,Amount,Filled,Remain,Total,Time,Type) 
                          VALUES ('$User_ID','$coin_id','Buy','$price','$amount','0','$total','$total',NOW(),'Limit')";   
        }
        else if($type == "market"){
            $sql_order = "INSERT INTO orders_market (User_ID,Coin_ID,Side,Price,Amount,Filled,Remain,Total,Time,Type) 
                          VALUES ('$User_ID','$coin_id','Buy','0','0','0','$total','$total',NOW(),'Market')";
        }
        $sql_wallet = "UPDATE wallet SET Amount='$newBalance' WHERE User_ID='$User_ID' && Coin_ID='1'";
    }
    else if($side=="Sell"){
        $sql = "SELECT * FROM wallet where User_ID='$User_ID' && Coin_ID='$coin_id'";
        $result = $conn->query($sql);
        $data = $result->fetch(PDO::FETCH_ASSOC);
        $coin = $data['Amount'];
        $amount = $_POST["amount"];
        $amount = floor($amount * 10000) / 10000;
        $newBalance = $coin - $amount;
        //if( $newBalance < 0 ) { die(); }
        if($type == "limit"){
            $price = $_POST["price"];
            $total = $_POST["total"];
            $sql_order = "INSERT INTO orders_limit (User_ID,Coin_ID,Side,Price,Amount,Filled,Remain,Total,Time,Type) 
                          VALUES ('$User_ID','$coin_id','Sell','$price','$amount','0','$amount','$total',NOW(),'Limit')";
        }
        else if($type == "market"){
            $sql_order = "INSERT INTO orders_market (User_ID,Coin_ID,Side,Price,Amount,Filled,Remain,Total,Time,Type) 
                          VALUES ('$User_ID','$coin_id','Sell','0','$amount','0','$amount','0',NOW(),'Market')";
        }
        $sql_wallet = "UPDATE wallet SET Amount='$newBalance' WHERE User_ID='$User_ID' && Coin_ID='$coin_id'";
    }
    $conn->exec($sql_order);
    //$conn->exec($sql_wallet);
    $conn = null;
    echo json_encode( array(
        "done" => "done"
    ));
?>