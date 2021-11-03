<?php 
    session_start();
    if(!isset($_SESSION["User_ID"])){
        header("location: http://localhost/work/BitMeta/login.html");
        die();
    }

    $User_ID = $_SESSION["User_ID"];
    $amount = $_POST["amount"];
    $total = $_POST["total"];
    $type = $_POST["type"];
    $symbol = $_POST["symbol"];
    if($type=="limit"){ 
        $price = $_POST["price"]; 
    } else {
        $price = $_POST["markprice"];
        $market_option = $_POST["option"];
        echo $market_option . "<br>";
    }
    $conn = new PDO("mysql:host=localhost;dbname=test;charset=utf8","root","");

    if(isset($_POST["buy"])){
        $sild = "buy";
        $sql = "SELECT * FROM wallet where User_ID='$User_ID' && Coin_ID='1'";
        $result = $conn->query($sql);
        $data = $result->fetch(PDO::FETCH_ASSOC);
        $USDT = $data['Amount'];
        //if($total > $USDT ) { die(); }
        if($type=="limit"){
            $sql = "SELECT * FROM orders where Coin_symbol='$symbol' && Slid='buy' && Price='$price'";
            $order = $conn->query($sql);
            while($row = $order->fetch()){
                echo "price to buy = " . $row["Price"] . "<br>";
                echo "user " . $row["User_ID"] . "<br>";
            }
        }

    } else if(isset($_POST["sell"])) {
        $sild = "sell";
    }
    //$sql = "SELECT * FROM wallet as wallet INNER JOIN crypto_coin as coin ON (wallet.Coin_ID = coin.CoinID) where wallet.User_ID='$User_ID'";
    
    echo "<br> user details <br>";
    echo "User_ID : " . $User_ID . "<br>";
    echo "USDT = " . $USDT . "<br>";
    echo "type : " . $type . "<br>";
    echo "symbol : " . $symbol . "<br>";
    echo "sild : " . $sild . "<br>";
    echo "price : " . $price . "<br>";
    echo "amount : " . $amount . "<br>";
    echo "total : " . $total . "<br>";
?>