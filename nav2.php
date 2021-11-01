<?php
if(!isset($_SESSION["id"]))
{?>
    <link rel="stylesheet" href="nav.css">
    <nav class="navbar navbar-expand navbar-light" style="background-color: #D3D3D3">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><i class="bi bi-house-door-fill"></i>Home</a>
            <a class="navbar-brand" href="market.php"><i class="bi bi-currency-exchange"></i>Market</a>
            <a class="navbar-brand" href="news.php"><i class="bi bi-file-earmark-text"></i>Announcement</a>  
            <a class="nav-link" href="login.php"><i class="bi bi-pencil-square"></i> login</a>
                
            <div id="indicator"></div>
        </div>
    </nav>
<?php }else { ?>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="hover.css">
    <nav class="navbar navbar-expand navbar-light" style="background-color: #D3D3D3">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><i class="bi bi-house-door-fill"></i>Home</a>
            <a class="navbar-brand" href="market.php"><i class="bi bi-currency-exchange"></i>Market</a>
            <a class="navbar-brand" href="news.php"><i class="bi bi-file-earmark-text"></i>Announcement</a>
            <div id="indicator"></div>
                <ul class="navbar-nav">
                    <div class="dropdown">
                        <a class="btn btn-outline-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-wallet2"></i>
                        </a>
                        <ul class="dropdown-menu"  aria-labelledby="dropdownMenuButton2">
                            <?php
                            $conn = new PDO("mysql:host=localhost; dbname=bitmeta; charset=utf8","root","");
                            $sql="SELECT * FROM User";
                            foreach($conn->query($sql)as $row){
                                echo "<li><a class=dropdown-item href=#>".$row['Balance']."</a></li>";
                            }
                            $conn=null;
                            ?>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-outline-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-lines-fill"></i>&nbsp;<?php echo $_SESSION["username"] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" data-item="profile" href="profile.php"><i class="bi bi-file-person"></i>ข้อมูลส่วนตัว</a></li>
                            <li><a class="dropdown-item" data-item="mail" href="mail.php"><i class="bi bi-bell"></i>การแจ้งเตือน</a></li>
                            <li><a class="dropdown-item" data-item="history" href="history.php"><i class="bi bi-receipt-cutoff"></i>ประวัติการซื้อขาย</a></li>
                            <li><a class="dropdown-item" data-item="logout" href="logout.php"><i class="bi bi-power"></i>ออกจากระบบ</a></li>
                        </ul>
                    </div>
                </ul>
        </div>
    </nav>  

<?php } ?>