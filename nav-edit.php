<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
<?php
if(!isset($_SESSION["id"]))
{?>

    <link rel="stylesheet" href="nav.css">
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
    
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="hover.css">
    <nav class="navbar navbar-expand navbar-light" style="background-color: #000000">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><i class="bi bi-house-fill"></i>&nbsp;</i>Home</a>
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
 </body>