<?php
    session_start();

    $user_ID = $_SESSION["User_ID"];

    $Coin = $_POST["Coin"];
    $Type = $_POST["Type"];
    $Side = $_POST["Side"];
    $Status = $_POST["Status"];
    $orderBy = $_POST["orderBy"];

    $conn = new PDO("mysql:host=localhost;dbname=bitmeta;charset=utf8","root","");
    $sql = "SELECT * FROM history as history INNER JOIN crypto_coin as coin ON (history.Coin_ID = coin.Coin_ID ) WHERE history.User_ID='$user_ID'";
    if($Coin != ""){
        $sql = $sql . " && coin.symbol='$Coin'";
    }
    if($Type != ""){
        $sql = $sql . " && history.Type='$Type'";
    }
    if($Side != ""){
        $sql = $sql . " && history.Side='$Side'";
    }
    if($Status != ""){
        $sql = $sql . " && history.Status='$Status'";
    }
    $sql = $sql . " ORDER BY $orderBy";
    $result = $conn->query($sql);
    $count = 1;
    $data = "";
    while($row = $result->fetch()){
        $data = $data . 
                    "<tr>
                        <td><center>$count</center></td>
                        <td>$row[8]</td>
                        <td>$row[12]</td>
                        <td>$row[3]</td>"; 
                        if($row[4] == "Buy"){
                            $data = $data . "<td class='buy'>$row[4]</td>"; 
                        } else { 
                            $data = $data . "<td class='sell'>$row[4]</td>"; 
                        }
            $data = $data . "         
                        <td>$row[5]</td>
                        <td>$row[6]</td>
                        <td>$row[7]</td>
                        <td>$row[9]</td>
                </tr>";
        $count++;
    }
    if($data != ""){
        echo json_encode( array(
            "code" => $data,
            "data" => $sql,
        ));
    }else{
        echo json_encode( array(
            "code" => "<td colspan='10'><div class='mt-1'>No order open</div></td>",
        ));
    }

?>