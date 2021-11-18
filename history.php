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
    <!-- my css -->
    <link rel="stylesheet" href="css/history.css">

    <link rel="icon" href="image/icon_200x200.png" type="image/x-icon">
    <title>BitMeta History</title>
</head>
<body>
    <!-- Notification -->
    <div class="sticky-top mt-2 notification" id="notification-alert">
        
    </div>

    <div class="container">
        <div class="row mt-3 justify-content-center" style="padding-top: 50px;">
            <div class="col-lg-10 border border-secondary">
                <table class="table" style="color: #c9c9c9;">
                    <div class="mt-3">
                        <h1>History</h1>
                    </div>
                    <span style="margin-right: 10px;">Filter : </span>
                    <div class="dropdown" id="Coin">
                        <div class="select">
                            Coin : <span id="Coin">Default</span>
                            <i class="bi bi-chevron-left"></i>
                        </div>
                        <input type="hidden" name="coin">
                        <ul class="dropdown-menu">
                            <li id="">Default</li>
                            <li id="BTC">BTC</li>
                            <li id="ETH">ETH</li>
                            <li id="BNB">BNB</li>
                            <li id="ADA">ADA</li>
                            <li id="SOL">SOL</li>
                            <li id="XRP">XRP</li>
                            <li id="DOT">DOT</li>
                            <li id="DOGE">DOGE</li>
                            <li id="UNI">UNI</li>
                            <li id="LTC">LTC</li>
                            <li id="AXS">AXS</li>
                        </ul>
                    </div>
                    <div class="dropdown" style="margin-left: 10px;" id="Type">
                        <div class="select">
                            Type : <span id="Type">Default</span>
                            <i class="bi bi-chevron-left"></i>
                        </div>
                        <input type="hidden" name="Type">
                        <ul class="dropdown-menu">
                            <li id="">Default</li>
                            <li id="Limit">Limit</li>
                            <li id="Market">Market</li>
                        </ul>
                    </div>
                    <div class="dropdown" style="margin-left: 10px;" id="Side">
                        <div class="select">
                            Side : <span id="Side">Default</span>
                            <i class="bi bi-chevron-left"></i>
                        </div>
                        <input type="hidden" name="Side">
                        <ul class="dropdown-menu">
                            <li id="">Default</li>
                            <li id="Buy">Buy</li>
                            <li id="Sell">Sell</li>
                        </ul>
                    </div>
                    <div class="dropdown" style="margin-left: 10px;" id="Status">
                        <div class="select">
                            Status : <span>Default</span>
                            <i class="bi bi-chevron-left"></i>
                        </div>
                        <input type="hidden" name="Status">
                        <ul class="dropdown-menu">
                            <li id="">Default</li>
                            <li id="Success">Success</li>
                            <li id="Cancel">Cancel</li>
                        </ul>
                    </div>
                    <span class="reset btn" id="reset">reset</span>
                    <span class="refresh btn" style="float: right;">refresh</span>
                    <hr>
                    <thead>
                        <tr>
                            <th style="width: 5%;">History</th>
                            <th style="width: 16%;"><span class="table-sort">Time <i class="bi"></i></span></th>
                            <th style="width: 7%;"><span class="table-sort">Coin <i class="bi"></span></th>
                            <th style="width: 8%;"><span class="table-sort">Type <i class="bi"></span></th>
                            <th style="width: 6%;"><span class="table-sort">Side <i class="bi"></span></th>
                            <th style="width: 10%;"><span class="table-sort">Price <i class="bi"></span></th>
                            <th style="width: 10%;"><span class="table-sort">Amount <i class="bi"></span></th>
                            <th style="width: 10%;"><span class="table-sort">Total <i class="bi"></span></th>
                            <th style="width: 8%;"><span class="table-sort">Statue <i class="bi"></span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Order details will show here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    

    <script>
        let orderBy = "Time DESC";
        let temp = [];                  /* Filter */
        let alert_index = 0;

        /* sort orders by user select */

        $(document).ready(function(){
            temp["Coin"] = "";
            temp["Type"] = "";
            temp["Side"] = "";
            temp["Status"] = "";
            getHistory();
        });

        function createAlert(text, color, timeOut, id){
            $alert = "<div class='alert alert-" + color + " alert-dismissible fade show FadeIn' id='alert-" + id + "'>\
                " + text + " <button type='button' class='btn-close'></button></div>";
            $('#notification-alert').append($alert)

            let closeAlertFunction = function(){
                $(".btn-close").click(function() {
                    $(this)
                        .parent(".alert")
                        .addClass("FadeOut");
                    setTimeout(() => { $(this).parent(".alert").hide(); }, 150);
                });
            }
            closeAlertFunction();
            setTimeout(() => {
                $("#alert-" + id).addClass("FadeOut");
                setTimeout(() => { $("#alert-" + id).hide(); }, 250);
            }, timeOut);
        }

        $('.table-sort').each(function(){
            $(this).click(function(){
                /* Lowest = up arrow */
                /* Highest = down arrow */
                /* Highest -> Lowest */ 
                if($(this).find('i').hasClass("bi-caret-down-fill")){
                    $(this).find('i').removeClass("bi-caret-down-fill")
                    orderBy = "Time DESC";
                } else if($(this).find('i').hasClass("bi-caret-up-fill")) {
                    $(this).find('i').removeClass("bi-caret-up-fill")
                    $(this).find('i').addClass("bi-caret-down-fill")
                    if($(this).text() == "Coin "){
                        orderBy = "Symbol DESC";
                    } else if ($(this).text() == "Type " || $(this).text() == "Side " ){
                        orderBy = $(this).text() + "DESC ,Time DESC";
                    } else {
                        orderBy = $(this).text() + "DESC";
                    }
                } else {
                    $('.table-sort').find('i').removeClass("bi-caret-down-fill")
                    $('.table-sort').find('i').removeClass("bi-caret-up-fill")
                    $(this).find('i').addClass("bi-caret-up-fill")
                    if($(this).text() == "Coin "){
                        orderBy = "Symbol ASC";
                    } else if ($(this).text() == "Type " || $(this).text() == "Side " ){
                        orderBy = $(this).text() + ",Time ASC";
                    } else{
                        orderBy = $(this).text() + "ASC";
                    }
                }
                getHistory();
            })
        })
        
        /*Dropdown Menu*/
        $('.dropdown').click(function () {
            $(this).attr('tabindex', 1).focus();
            $(this).toggleClass('active');
            $(this).find('.dropdown-menu').slideToggle(300);
        });
        $('.dropdown').focusout(function () {
            $(this).removeClass('active');
            $(this).find('.dropdown-menu').slideUp(300);
        });
        $('.dropdown .dropdown-menu li').click(function () {
            $(this).parents('.dropdown').find('span').text($(this).text());
            $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
            
            $('.dropdown').each(function(){
                temp[$(this).attr('id')] = $(this).find('input').val();
            })
            getHistory();
            console.log(temp);
        });
        /*End Dropdown Menu*/

        function getHistory(){
            $.ajax({
                url: 'database/getHistory.php', type: 'post', dataType: 'json', 
                data: { 
                    Coin: temp["Coin"],
                    Type: temp["Type"],
                    Side: temp["Side"],
                    Status: temp["Status"],
                    orderBy: orderBy
                },
                success: function(response){
                    $('tbody').html(response.code);
                }
            });
        }

        $('#reset').click(function(){   
            $('.dropdown').each(function(){
                $(this).find('span').text("Default");
                $(this).find('input').attr('value', "");
                temp[$(this).attr('id')] = $(this).find('input').val();
            })
            getHistory();
        });

        /* Refresh orders table */
        $('.refresh').click(function (){
            getHistory();
            createAlert("<strong>Success!</strong> History refresh.", "success", 3000, alert_index);
            alert_index++;
        })

    </script>
</body>
</html>