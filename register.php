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
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">       
    </head>
<body>
    <div class="container">
        <h1 style="text-align: center;">BIT-MIGHT เพราะเงินของคุณคือเงินของเรา</h1>        
        <br>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
            <?php 
                if(isset($_SESSION["add_login"]) && $_SESSION["add_login"]=="error")
                {
                    echo "<div class = 'alert alert-danger'>ชื่อบัญชีซ้ำ หรือ ฐานข้อมูลมีปัญหา</div>";                    
                    unset($_SESSION["add_login"]);
                } elseif(isset($_SESSION["add_login"]) && $_SESSION["add_login"]=="success"){
                    echo "<div class = 'alert alert-success'>เพิ่มบัญชีเรียบร้อยแล้ว</div>";
                    unset($_SESSION["add_login"]);
                }
                
            ?>
                <div class="card text-dark bg-white border-warning">
                    <div class="card-header bg-warning  text-dark text-center">สมัครสมาชิก</div>
                    <div class="card-body">
                        <form action="register_save.php" method="post">
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">ชื่อบัญชี :</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="login" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">รหัสผ่าน :</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" name="pwd" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">ชื่อ :</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">นามสกุล :</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="sur-name" required>
                                </div>
                            </div>
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-lg-3 pt-0">เพศ :</legend>
                                <div class="col-lg-9">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="gender" value="m" required>
                                        <label class="form-check-label">ชาย</label>
                                    </div>
                                    <div>
                                        <input type="radio" class="form-check-input" name="gender" value="f" required>
                                        <label class="form-check-label">หญิง</label>
                                    </div>
                                    <div>
                                        <input type="radio" class="form-check-input" name="gender" value="o" required>
                                        <label class="form-check-label">อื่นๆ</label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">อีเมล :</label>
                                <div class="col-lg-9">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">อาชีพ :</label>
                                <div class="col-lg-9">                                    
                                    <input type="text" class="form-control" name="job" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">วันเกิด :</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control" name="birth-date" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">รหัสบัตรประชาชน :</label>
                                <div class="col-lg-9">
                                    <input type="number_format" class="form-control" name="ID-card" required>
                                </div>
                            </div>      
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">ที่อยู่ :</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="address" required>
                                </div>
                            </div>                      
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">เบอร์โทรศัพท์ :</label>
                                <div class="col-lg-9">
                                    <input type="number_format" class="form-control" name="phone" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9">                                       
                                <button class="btn btn-warning btn-sm" type="submit"><i class="bi bi-save me-1"></i>สมัครสมาชิก</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</body>
</html>

