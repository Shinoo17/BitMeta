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
    <title>BitMeta reset Password</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center" style="padding-top: 25vh;">
            <div class="col-md-8 col-lg-5">
                <div class="wrap d-md-flex">
                    <div class="reset-warp p-4 p-lg-5">
                        <span class="mb-5" style="font-size: 26px;">Reset Password</span>
                        <form action="#" class="mt-3">
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control mt-2" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>New Password</label>
                                <input type="password" class="form-control mt-2" placeholder="Password" name="password" id="password" required>
                                <i class="fa-regular fa-eye-slash fa-lg float-end eye-password"></i>
                            </div>
                            <div class="form-group mb-3">
                                <label>Confirm New Password</label>
                                <input type="password" class="form-control mt-2" placeholder="Confirm Password" id="Confirm-Password" required>
                                <i class="fa-regular fa-eye-slash fa-lg float-end eye-password"></i>
                                <div hidden class="duplicate" id="wrong-pass">*Please enter same password</div>
                            </div>
                            <button type="submit" class="form-control button-form mt-4">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function checkPassword(){
            let pass = $('#password').val();
            let confirm = $('#Confirm-Password').val();
            if(pass == "" || confirm == ""){
                // do nothing
            }else if(pass != confirm){
                $('#wrong-pass').removeAttr('hidden');
            }else{
                $('#wrong-pass').attr('hidden','hidden');
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
    </script>
</body>
</html>