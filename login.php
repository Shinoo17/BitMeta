<?php 
    session_start();
    if(isset($_SESSION["User_ID"])){
        header("location:http://localhost/work/BitMeta/index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- gg css icon -->
    <link href='https://css.gg/trash.css' rel='stylesheet'>
    <!-- font awesome icon -->
    <script src="https://kit.fontawesome.com/f7b93d372f.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/formStyle.css">
    <link rel="icon" href="image/icon_200x200.png" type="image/x-icon">
    <title>BitMeta Login</title>
</head>
<body>
    <?php include"nav-edit.php"?>
    <div class="container">
        <div class="row justify-content-center" style="padding-top: 25vh;">
            <div class="col-md-12 col-lg-9">
                <div class="wrap d-md-flex">
                    <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-last">
                        <div class="w-100">
                            <div style="font-size: 30px;">Welcome to BitMeta</div>
                            <div>Don't have an account?</div>
                            <a href="register.php" class="btn button-link mt-2">Sign Up</a>
                        </div>
                    </div>
                    <div class="login-wrap p-4 p-lg-5">
                        <span class="mb-5" style="font-size: 26px;">Sign In</span>
                        <form action="database/login_verify.php" method="post" class="mt-3">
                            <div class="form-group mb-3">
                                  <label class="label" for="name">Username</label>
                                  <input type="text" class="form-control mt-2" placeholder="Username" name="username" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Password</label>
                                <input type="password" class="form-control mt-2" placeholder="Password" name="password" id="password" required>
                                <i class="fa-regular fa-eye-slash fa-lg float-end eye-password"></i>
                            </div>
                            <button type="submit" class="form-control button-form mt-4">Sign In</button>
                            <div class="form-group d-flex mt-2">
                                <div class="w-50 text-left">
                                    <label class="Container-Checkbox">Remember Me
                                        <input type="checkbox" checked="checked" name="remember-me">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50" style="text-align: right;">
                                    <a href="resetPassword.php">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('i').click(function (){
            if($('#password').attr('type') == 'password'){
                $('#password').attr('type','text');
                $(this).removeClass('fa-eye-slash');
                $(this).addClass('fa-eye');
            } else {
                $('#password').attr('type','password');
                $(this).removeClass('fa-eye');
                $(this).addClass('fa-eye-slash');
            }       
        });
    </script>
</body>
</html>