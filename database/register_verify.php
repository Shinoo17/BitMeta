<?php
    session_start();
    if(isset($_SESSION["User_ID"])){
        header("location:http://localhost/work/BitMeta/index.html");
        die();
    }

    $username = $_POST['username']; 
    $password = $_POST["password"];
    $password = sha1($password);
    $email = $_POST["email"];

    $conn = new PDO("mysql:host=localhost;dbname=test;charset=utf8","root","");

    /* Check if contain? */
    $sql = "SELECT * FROM user where Username='$username' && Email='$email'";
    $result = $conn->query($sql);
    if($result->rowCount() >= 1){ 
        header("location:http://localhost/work/BitMeta/register.html");
        die(); 
    }

    $sql = "INSERT INTO user (Username, Password, Role, Balance, Email) VALUES ('$username', '$password', 'm', 0, '$email')";
    $conn->exec($sql);
    
    /* Create wallet address */
    $sql = "SELECT User_ID FROM user where Username='$username'";
    $result = $conn->query($sql);
    $data = $result->fetch(PDO::FETCH_ASSOC);
    $user_id = $data['User_ID'];

    for($i=0; $i<12; $i++) {
        $wallet = walletGenerator();
        $coin_id = $i+1;
        $sql = "INSERT INTO wallet (User_ID, Amount, Address, Coin_ID) VALUES ('$user_id', 0, '$wallet', '$coin_id')";
        $conn->exec($sql);
    }

    /* Generate wallet address */
    function walletGenerator() {
        $hex = "abcdef0123456789";
        do{
            $pass = array();
            $alphaLength = strlen($hex) - 1;
            for ($i = 0; $i < 26; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $hex[$n];
            }
            $pass = implode($pass); // set String
            $conn = new PDO("mysql:host=localhost;dbname=test;charset=utf8","root","");
            $sql = "SELECT * FROM wallet where Wallet_ID='$pass'";
            $result = $conn->query($sql);
        }while( $result->rowCount()==1 );   // check if wallet is already exist?
        return $pass;
    }

    $conn = null;
    header("location:http://localhost/work/BitMeta/login.html");
?>