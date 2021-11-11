<?php
    session_start();

    /* Get open orders */
    $user_ID = $_SESSION["User_ID"];

    $conn = new PDO("mysql:host=localhost;dbname=bitmeta;charset=utf8","root","");
    $sql = "SELECT * FROM orders_limit as orders_limit INNER JOIN crypto_coin as coin ON (orders_limit.Coin_ID = coin.Coin_ID) WHERE orders_limit.User_ID='$user_ID'
            UNION SELECT * FROM orders_market as orders_market INNER JOIN crypto_coin as coin ON (orders_market.Coin_ID = coin.Coin_ID) WHERE orders_market.User_ID='$user_ID'
            ORDER BY symbol";
    $result = $conn->query($sql);

    //$order_count = $result->rowCount();
    $order_count = 0;
    $data = "";
    while($row = $result->fetch()){
        $order_count++;
        $data = $data . 
                "<tr>
                    <td>$order_count</td>
                    <td>$row[9]</td>
                    <td>$row[13]</td>
                    <td>$row[10]</td>";
        if($row[3] == "Buy"){ $data = $data . "<td class='buy'>$row[3]</td>"; }
        else { $data = $data . "<td class='sell'>$row[3]</td>"; }
        $data = $data . "         
                    <td>$row[4]</td>
                    <td>$row[5]</td>
                    <td>$row[6]</td>
                    <td>$row[8]</td>
                    <td><i class='gg-trash' style='margin-left: 50%;' onclick=cancelOrder($row[0],'Limit')
                        data-bs-target='#showForm' data-bs-toggle='modal' data-userOrderID='$order_count'></i>
                    </td>
                </tr>";
        $data = $data . "<br>";
    }
    echo $data;
    echo " ===== END ==== <br>"
?>


<?php
    //session_start();

    /* Get open orders */
    $user_ID = $_SESSION["User_ID"];

    $conn = new PDO("mysql:host=localhost;dbname=bitmeta;charset=utf8","root","");
    $sql = "SELECT * FROM orders_limit as orders INNER JOIN crypto_coin as coin ON (orders.Coin_ID = coin.Coin_ID) WHERE orders.User_ID='$user_ID'";
    $result = $conn->query($sql);

    //$order_count = $result->rowCount();
    $order_count = 0;
    $data = "";
    while($row = $result->fetch()){
        $order_count++;
        $data = $data . 
                "<tr>
                    <td>$order_count</td>
                    <td>$row[9]</td>
                    <td>$row[12]</td>
                    <td>Limit</td>";
        if($row[3] == "Buy"){ $data = $data . "<td class='buy'>$row[3]</td>"; }
        else { $data = $data . "<td class='sell'>$row[3]</td>"; }
        $data = $data . "         
                    <td>$row[4]</td>
                    <td>$row[5]</td>
                    <td>$row[6]</td>
                    <td>$row[8]</td>
                    <td><i class='gg-trash' style='margin-left: 50%;' onclick=cancelOrder($row[0],'Limit')
                        data-bs-target='#showForm' data-bs-toggle='modal' data-userOrderID='$order_count'></i>
                    </td>
                </tr>";
    }

    $sql = "SELECT * FROM orders_market as orders INNER JOIN crypto_coin as coin ON (orders.Coin_ID = coin.Coin_ID) WHERE orders.User_ID='$user_ID'";
    $result = $conn->query($sql);
    //$order_count = $order_count + $result->rowCount();
    while($row = $result->fetch()){
        $order_count++;
        $data = $data . 
                "<tr>
                    <td>$order_count</td>
                    <td>$row[9]</td>
                    <td>$row[12]</td>
                    <td>Market</td>";
        if($row[3] == "Buy"){ $data = $data . "<td class='buy'>$row[3]</td>"; }
        else { $data = $data . "<td class='sell'>$row[3]</td>"; }
        $data = $data . "         
                    <td>$row[4]</td>
                    <td>$row[5]</td>
                    <td>$row[6]</td>
                    <td>$row[8]</td>
                    <td><i class='gg-trash' style='margin-left: 50%;' onclick=cancelOrder($row[0],'Market') 
                        data-bs-target='#showForm' data-bs-toggle='modal' data-userOrderID='$order_count'></i></td>
                </tr>";
    }
    if($data != ""){
        echo json_encode( array(
            "code" => $data,
            "orderCount" => $order_count, 
        ));
    }else{
        echo json_encode( array(
            "code" => "<div class='mt-2'>No order open</div>",
            "orderCount" => $order_count,
        ));
    }
    
?>
