<?php
    session_start();
    if(!isset($_SESSION["User_ID"])){
        header("location: http://localhost/work/BitMeta/login.php");
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
    <link href='https://css.gg/css' rel='stylesheet'>
    <!-- Google Icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons">
    
    <link rel="stylesheet" href="css/exchangeStyle.css">
    <title>Buy&Sell</title>

</head>
<body>
    <?php include"nav-edit.php"?>
    <div class="sticky-top mt-2" style="width: 18%; float: right; top: 15px" id="notification-alert">
        
    </div>
    <div class="container">
        <div class="row justify-content-center mt-5" style="padding-top: 15vh;">
            <div class="col-lg-5 col-md-8">
                <div class="card" style="padding: 15px;">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="w-50 text-center">
                                <?php 
                                    if(isset($_GET["sell"])){
                                        echo "<a href='buySellCrypto.php' class='btn w-100 btn-unactive btn-left'>ซื้อ</a>";
                                    }else{
                                        echo "<a href='buySellCrypto.php' class='btn w-100 btn-active btn-left'>ซื้อ</a>";
                                    }
                                ?>
                            </div>
                            <div class="w-50 text-center">
                                <?php
                                    if(isset($_GET["sell"])){
                                        echo "<a href='buySellCrypto.php?sell' class='btn w-100 btn-active btn-right'>ขาย</a>";
                                    }else{
                                        echo "<a href='buySellCrypto.php?sell' class='btn w-100 btn-unactive btn-right'>ขาย</a>";
                                    }
                                ?>
                            </div>
                        </div>
                        <center>
                            <div class="exchange-rate-text">
                                <span> 1 USDT ≈ 33.5 Baht 
                                    <span id="exchange" style="cursor: pointer;">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.99255 12.9841C4.44027 12.9841 3.99255 13.4318 3.99255 13.9841C3.99255 14.3415 4.18004 14.6551 4.46202 14.8319L7.14964 17.5195C7.54016 17.9101 8.17333 17.9101 8.56385 17.5195C8.95438 17.129 8.95438 16.4958 8.56385 16.1053L7.44263 14.9841H14.9926C15.5448 14.9841 15.9926 14.5364 15.9926 13.9841C15.9926 13.4318 15.5448 12.9841 14.9926 12.9841L5.042 12.9841C5.03288 12.984 5.02376 12.984 5.01464 12.9841H4.99255Z" fill="currentColor" />
                                            <path d="M19.0074 11.0159C19.5597 11.0159 20.0074 10.5682 20.0074 10.0159C20.0074 9.6585 19.82 9.3449 19.538 9.16807L16.8504 6.48045C16.4598 6.08993 15.8267 6.08993 15.4361 6.48045C15.0456 6.87098 15.0456 7.50414 15.4361 7.89467L16.5574 9.01589L9.00745 9.01589C8.45516 9.01589 8.00745 9.46361 8.00745 10.0159C8.00745 10.5682 8.45516 11.0159 9.00745 11.0159L18.958 11.0159C18.9671 11.016 18.9762 11.016 18.9854 11.0159H19.0074Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                </span>
                            </div>
                            <div>
                                Avaliable <span id="myUSDT">-</span> USDT
                            </div>
                        </center>
                        <form action="database/BuySellProcess.php" method="POST">
                            <?php if(!isset($_GET["sell"])){ ?>
                                <div class="form-group mb-3">
                                <label class="label" for="name">จ่าย</label>
                                <input type="number" step="0.01" min="0" class="form-control mt-2" placeholder="บาท" name="Baht" id="Baht" 
                                    onkeypress="return event.charCode != 45 && event.charCode != 43" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="name">ได้รับ</label>
                                    <input type="number" step="0.0001" min="0" class="form-control mt-2" placeholder="USDT" name="USDT" id="USDT" 
                                        onkeypress="return event.charCode != 45 && event.charCode != 43" required>
                                </div>
                                <center>
                                    <button type="submit" class="btn btn-active button-form" style="margin-top: 13px;" name="buy">ดำเนินการต่อ</button>
                                </center>
                            <?php } else { ?>
                                <div class="form-group mb-3">
                                    <label class="label" for="name">ขาย</label>
                                    <input type="number" step="0.0001" min="0" class="form-control mt-2" placeholder="USDT" name="USDT" id="USDT"
                                        onkeypress="return event.charCode != 45 && event.charCode != 43" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="name">ได้รับ</label>
                                    <input type="number" step="0.01" min="0" class="form-control mt-2" placeholder="บาท" name="Baht" id="Baht"
                                        onkeypress="return event.charCode != 45 && event.charCode != 43" required>
                                </div>
                                <center>
                                    <button type="submit" class="btn btn-active button-form" style="margin-top: 13px;" name="sell">ดำเนินการต่อ</button>
                                </center>
                            <?php } ?>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#Baht').keyup(function (){
            let cal = Math.floor($(this).val() / 33.5 * 10000) / 10000;
            if(cal > 0){
                $('#USDT').val(cal);
            }else{
                $('#USDT').val("");
            }
            
        })
        $('#USDT').keyup(function (){
            let cal = Math.floor($(this).val() * 33.5 * 100) / 100;
            if(cal > 0){
                $('#Baht').val(cal);
            }else{
                $('#Baht').val("");
            }
            
        })
        /* Get user wallet data */
        function getWalletData(){
            $.ajax({
                url: 'database/getWalletData.php', type: 'post', dataType: 'json',
                success: function(response){

                    $('#myUSDT').text(response["USDT"]);

                }
            });
        }
        getWalletData()

        let alert_index = 1;        /* Use for Alert notification   */

        function createAlert(text, color, timeOut, id){
            $alert = "<div class='alert alert-" + color + " alert-dismissible fade show FadeIn' id='alert-" + id + "'>\
                " + text + " <button type='button' class='btn-close'></button></div>";
            $('#notification-alert').append($alert)

            let closeFunction = function(){
                $(".btn-close").click(function() {
                    $(this)
                        .parent(".alert")
                        .addClass("FadeOut");
                    setTimeout(() => { $(this).parent(".alert").hide(); }, 150);
                });
            }
            closeFunction();
            setTimeout(() => {
                $("#alert-" + id).addClass("FadeOut");
                setTimeout(() => { $("#alert-" + id).hide(); }, 250);
            }, timeOut);
        }

        <?php 
            if(isset($_SESSION["error"])){
                if($_SESSION["error"]=="NoBank"){
        ?>
                    createAlert("<strong>Failed! </strong>No bank account", "danger", 10000, alert_index)
                    alert_index++;  
        <?php
                    unset($_SESSION["error"]);
                } else if($_SESSION["error"]=="NotEnoughCoin") {
        ?>
                    createAlert("<strong>Failed! </strong>Not Enough USDT", "danger", 10000, alert_index)
                    alert_index++;  
        <?php
                    unset($_SESSION["error"]);
                }
            } else if(isset($_SESSION["success"])) {
                if($_SESSION["success"]=="Buy"){
        ?>
                    createAlert("<strong>Success! </strong>Buy USDT Success", "success", 10000, alert_index)
                    alert_index++;  
        <?php       unset($_SESSION["success"]);

                } else if($_SESSION["success"]=="Sell"){ ?>
        
                    createAlert("<strong>Success! </strong>Sold USDT Success", "success", 10000, alert_index)
                    alert_index++;  
        <?php       unset($_SESSION["success"]);

                }
            }
        ?>
    </script>

</body>
</html>