<?php
 
if(!isset($_SESSION["User_ID"]))
{?>

    <link rel="stylesheet" href="css/nav.css">
    <nav class="navbar navbar-expand navbar-light" style="background-color: #0d154e">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="index.php"><i class="bi bi-house-door-fill"></i>Home</a>
            <a class="navbar-brand text-white" href="market.php"><i class="bi bi-currency-exchange"></i>Market</a>
            <a class="navbar-brand text-white" href="news.php"><i class="bi bi-file-earmark-text"></i>Announcement</a>  
            <a class="nav-link text-white" href="login.php"><i class="bi bi-pencil-square"></i> login</a>
                
            <div id="indicator"></div>
        </div>
    </nav>

<?php }else { ?>
    
    <link rel="stylesheet" href="css/nav-login.css">
    <nav class="navbar navbar-expand navbar-light" style="background-color: #0d154e">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="index.php"><i class="bi bi-house-fill"></i>&nbsp;</i>Home</a>
            <a class="navbar-brand text-white" href="market.php"><i class="bi bi-currency-exchange"></i>Market</a>
            <a class="navbar-brand text-white" href="news.php"><i class="bi bi-file-earmark-text"></i>Announcement</a>
            
            <div id="indicator"></div>
        </div>
        <ul class="navbar-nav ">
            <div class="dropdown">
                <a class="btn dropdown-toggle btn-sm m-1" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-wallet2"></i>
                </a>
                <ul class="dropdown-menu"  aria-labelledby="dropdownMenuButton2">
                    <?php
                    $conn = new PDO("mysql:host=localhost; dbname=bitmeta; charset=utf8","root","");
                    $sql="SELECT * FROM wallet as w1 INNER JOIN crypto_coin as c1 ON (w1.Coin_ID = c1.Coin_ID) 
                            WHERE w1.User_ID='$_SESSION[User_ID]'";
                    
                    foreach($conn->query($sql)as $row){
                        echo "<li><div class=dropdown-item>".$row['Symbol']."  <span style='text-align:right'>".$row['Amount']."</span></div></li>";
                    }
                    $conn=null;
                    ?>
                </ul>
            </div>
            &nbsp;
            <div class="dropdown" style="margin-right: 70px;">
                <a class="btn dropdown-toggle btn-sm m-1" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-lines-fill"></i>&nbsp;<?php echo $_SESSION["Username"] ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" data-item="profile" href="profile.php"><i class="bi bi-file-person"></i>Profile</a></li>
                    <li><a class="dropdown-item" data-item="history" href="history.php"><i class="bi bi-receipt-cutoff"></i>History</a></li>
                    <li><a class="dropdown-item" data-item="logout" href="database/logout.php"><i class="bi bi-power"></i>Logout</a></li>
                </ul>
            </div>
            <div></div>
        </ul>

    </nav>  

<?php } ?>