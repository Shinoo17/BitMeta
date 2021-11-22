<?php 
    session_start();
    if(isset($_SESSION["User_ID"])){
        header("location:http://localhost/work/BitMeta/index.html");
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
        <div class="row justify-content-center" style="padding-top: 17vh;">
            <div class="col-md-12 col-lg-9">
                <div class="wrap d-md-flex">
                    <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-last">
                        <div class="w-100">
                            <div style="font-size: 30px;">Welcome to BitMeta</div>
                            <div>Alrady have an account?</div>
                            <a href="login.php" class="btn button-link mt-2">Sign In</a>
                        </div>
                    </div>
                    <div class="login-wrap p-4 p-lg-5">
                        <span class="mb-5" style="font-size: 26px;">Sign Up</span>
                        <form action="database/register_verify.php" class="mt-3" method="POST">
                            <div class="form-group mb-3">
                                  <label>Username</label>
                                  <input type="text" class="form-control mt-2" placeholder="Username" name="username" id="username" required>
                                  <div class="duplicate" id="username-worng">*Username is not available</div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control mt-2" placeholder="Email" name="email" id="email" required>
                                <div class="duplicate" id="email-worng">*Email is not available</div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" class="form-control mt-2" placeholder="Password" name="password" id="password" required>
                                <i class="fa-regular fa-eye-slash fa-lg float-end eye-password"></i>
                            </div>
                            <div class="form-group mb-3">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control mt-2" placeholder="Confirm Password" id="Confirm-Password" required>
                                <i class="fa-regular fa-eye-slash fa-lg float-end eye-password"></i>
                                <div class="duplicate" id="wrong-pass">*Please enter same password</div>
                            </div>
                            <button type="submit" class="form-control button-form mt-4" style="cursor: pointer;">Sign Up</button>
                            <div class="form-group d-flex mt-2 term-of-use">
                                <label class="Container-Checkbox">I accept <a href="#" data-bs-target="#showTermOfUse" data-bs-toggle="modal">Term of use</a>
                                    <input type="checkbox" checked="checked" required>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="showTermOfUse">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Term of Use</h3>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    ข้อมูลทั้งหมดในเว็ปไซด์นี้เป็นเพียงการจำลองเท่านั้น<br>
                    ทำขึ้นมาเพื่อศึกษาการทำงานของระบบเทรด<br>
                    เงินและคริปโตในระบบ ไม่ไช่ของจริงแต่อย่างใด
                </div>
                <div class="modal-footer">
                    <button class="btn button-form" data-bs-dismiss="modal">Accept</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.duplicate').hide();
        function checkPassword(){
            let pass = $('#password').val();
            let confirm = $('#Confirm-Password').val();
            if(pass == "" || confirm == ""){
                // do nothing
            }else if(pass != confirm){
                $('#wrong-pass').show();
                $('button[type=submit]').attr('disabled',true);
            }else{
                $('#wrong-pass').hide();
                $('button[type=submit]').removeAttr('disabled');
            }
        }
        $('#password').focusout(function (){
            checkPassword();
        });
        $('#Confirm-Password').focusout(function (){
            checkPassword();
        });
        $('i').click(function (){
            if($('#password').attr('type') == 'password'){
                $('#password').attr('type','text');
                $('#Confirm-Password').attr('type','text');
                $('i').removeClass('fa-eye-slash');
                $('i').addClass('fa-eye');
            } else {
                $('#password').attr('type','password');
                $('#Confirm-Password').attr('type','password');
                $('i').removeClass('fa-eye');
                $('i').addClass('fa-eye-slash');
            }
        });
        $('#username').keyup(function (){
            $.ajax({
                url: 'database/username_check.php', type: 'post', dataType: 'json',
                data: { username: $('#username').val() },
                success: function(response){
                    if(response.isDuplicate){
                        $('#username-worng').show();
                        $('button[type=submit]').attr('disabled',true);
                    } else { 
                        $('#username-worng').hide();
                        $('button[type=submit]').removeAttr('disabled');
                    }
                }
            });
        });
        $('#email').keyup(function (){
            $.ajax({
                url: 'database/email_check.php', type: 'post', dataType: 'json',
                data: { email: $('#email').val() },
                success: function(response){
                    if(response.isDuplicate){ 
                        $('#email-worng').show();
                        $('button[type=submit]').attr('disabled',true);
                    } else { 
                        $('#email-worng').hide();
                        $('button[type=submit]').removeAttr('disabled');
                    }
                }
            });
        });
    </script>

</body>
</html>
