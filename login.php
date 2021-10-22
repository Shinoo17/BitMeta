<?php
    session_start();
    if(isset($_SESSION['Id']))
    {
        header("location:index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    
</head>
<body>  
    <div class="container"> 
    <h1 class="center">BIT-MIGHT เพราะเงินของคุณคือเงินของเรา</h1>
    <?php include'nav.php'; ?>
    <br>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <?php 
                if(isset($_SESSION["error"]))
                {
                    echo "<div class = 'alert alert-danger'>Username หรือ Password ไม่ถูกต้อง</div>";
                    unset($_SESSION["error"]);
                }
            ?>
            <div class="card text-dark bg-light">
                <div class="card-header">เข้าสู่ระบบ</div>
                <div class="card-body">
                    <form action="verify.php" method="POST">
                        <div class="form-group">
                            <label>Username:</label>
                            <input class="form-control" type="text" name="user">
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input class="form-control" type="password" name="pass">
                        </div>                       
                        <center><button type="submit" class="btn btn-success btn-sm mt-3" ><i class="bi bi-arrow-right-square"></i>&nbsp;Login</button></center>
                    </form>
                </div>
               
            </div>
        </div>
        <div class="col-4"></div>
    </div>  
    <br>
    <center> <p class="center"> ถ้ายังไม่เป็นสมาชิก  <a href="register.php"> กรุณาสมัครสมาชิก</a></p></center> 
  <br>     
 </div> 
</body>
</html>