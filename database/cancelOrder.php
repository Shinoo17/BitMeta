<?php
    session_start();
    if(!isset($_SESSION["User_ID"])){
        header("location: http://localhost/work/BitMeta/login.php");
        die();
    }
    $conn = new PDO("mysql:host=localhost;dbname=bitmeta;charset=utf8","root","");

    $User_ID = $_SESSION["User_ID"];
    $type = $_POST["type"];
    $orderID = $_POST["orderID"];

    if($type == "Limit"){
        $sql = "SELECT * FROM orders_limit WHERE Order_ID='$orderID'";
        $sql_delete = "DELETE FROM orders_limit WHERE Order_ID='$orderID'";
    }else if($type == "Market"){
        $sql = "SELECT * FROM orders_market WHERE Order_ID='$orderID'";
        $sql_delete = "DELETE FROM orders_Market WHERE Order_ID='$orderID'";
    }
    $result = $conn->query($sql);
    $order_details = $result->fetch();
    if($order_details["Side"] == "Buy"){

        /* Get wallet && Update */
        $sql = "SELECT amount FROM wallet WHERE User_ID='$User_ID' && Coin_ID='1'";
        $result = $conn->query($sql);
        $usdtWallet = $result->fetch();
        $new_amount = $usdtWallet[0] + $order_details["Remain"];
        $sql = "UPDATE wallet SET Amount='$new_amount' WHERE User_ID='$User_ID' && Coin_ID='1'";
        $sql_wallet = $conn->prepare($sql);

        /* Insert history */
        $total_pay = $order_details["Total"]-$order_details["Remain"];
        $sql = "INSERT INTO history (User_ID,Coin_ID,Type,Side,Price,Amount,Total,Time,Status) 
                VALUES ('$User_ID','$order_details[Coin_ID]','$type','Buy','$order_details[Price]','$order_details[Filled]','$total_pay',NOW(),'Cancel')";
        $sql_insert = $conn->prepare($sql);
    }

    if($order_details["Side"] == "Sell"){

        /* Get wallet && Update */
        $sql = "SELECT amount FROM wallet WHERE User_ID='$User_ID' && Coin_ID='$order_details[Coin_ID]'";
        $result = $conn->query($sql);
        $coinWallet = $result->fetch();
        $new_amount = $coinWallet[0] + $order_details["Remain"];
        $sql = "UPDATE wallet SET Amount='$new_amount' WHERE User_ID='$User_ID' && Coin_ID='$order_details[Coin_ID]'";
        $sql_wallet = $conn->prepare($sql);

        /* Insert history */
        $total_get = $order_details["Filled"] * $order_details["Price"];
        $sql = "INSERT INTO history (User_ID,Coin_ID,Type,Side,Price,Amount,Total,Time,Status) 
                VALUES ('$User_ID','$order_details[Coin_ID]','$type','Sell','$order_details[Price]','$order_details[Filled]','total_get',NOW(),'Cancel')";
        $sql_insert = $conn->prepare($sql);
    }
    
    $sql_delete = $conn->prepare($sql_delete);

    $sql_wallet->execute();
    $sql_insert->execute();
    $sql_delete->execute();

    echo json_encode( array(
        "done" => "done",
    ));

?>