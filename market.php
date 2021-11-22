<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- gg css icon -->
    <link href='https://css.gg/css' rel='stylesheet'>
    <!-- my css & javsscript -->
    <link rel="stylesheet" href="css/marketStyle.css">
    <script src="js/marketFunction.js"></script>
    <!-- TradingView -->
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    
	<link rel="icon" href="image/icon_200x200.png" type="image/x-icon">
    <title>BitMeta Market</title>
</head>
<body>
    <?php include"nav-edit.php"?>
    <!-- Notification -->
    <div class="sticky-top mt-2" style="width: 18%; float: right; top: 15px" id="notification-alert">
        
    </div>

    <!-- TradingView -->
    <div class="tradingview-widget-container" style="margin-top: 100px;">
        <div id="watchlist"></div>
        <script type="text/javascript">
            let td = new TradingView.widget(
                {
                    "container_id": "watchlist",
                    "width": 1200,
                    "height": 600,
                    "symbol": "BINANCE:BTCUSDT",
                    "interval": "240",
                    "timezone": "Asia/Bangkok",
                    "theme": "dark",
                    "style": "1",
                    "toolbar_bg": "#f1f3f6",
                    "withdateranges": true,
                    "hide_side_toolbar": false,
                    "allow_symbol_change": false,
                    "save_image": true,
                    "watchlist": [
                        "BINANCE:BTCUSDT",
                        "BINANCE:ETHUSDT",
                        "BINANCE:BNBUSDT",
                        "BINANCE:ADAUSDT",
                        "BINANCE:SOLUSDT",
                        "BINANCE:XRPUSDT",
                        "BINANCE:DOTUSDT",
                        "BINANCE:DOGEUSDT",
                        "BINANCE:UNIUSDT",
                        "BINANCE:LTCUSDT",
                        "BINANCE:AXSUSDT",
                    ],
                    "locale": "en",
                }
            );
        </script>
    </div>
    <!-- TradingView END -->

    <div class="container mt-3">
        <!-- Dropdown -->
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <span class="thai-font">เลือกเหรียญ</span>
                <div class="myDropdown">
                    <div class="select">
                        <img src="image/symbol/BTC.png" class="mini-symbol" id="show-select-symbol">&nbsp; 
                        <span>Select coin</span>
                        <i class="bi bi-chevron-left"></i>
                    </div>
                    <input type="hidden" name="coin">
                    <ul class="myDropdown-menu">
                      <li id="BTC"><img src="image/symbol/BTC.png" class="mini-symbol">&nbsp; Bitcoin / USDT</li>
                      <li id="ETH"><img src="image/symbol/ETH.png" class="mini-symbol">&nbsp; ETH / USDT</li>
                      <li id="BNB"><img src="image/symbol/BNB.png" class="mini-symbol">&nbsp; BNB / USDT</li>
                      <li id="ADA"><img src="image/symbol/ADA.png" class="mini-symbol">&nbsp; ADA / USDT</li>
                      <li id="SOL"><img src="image/symbol/SOL.png" class="mini-symbol">&nbsp; SOL / USDT</li>
                      <li id="XRP"><img src="image/symbol/XRP.png" class="mini-symbol">&nbsp; XRP / USDT</li>
                      <li id="DOT"><img src="image/symbol/DOT.png" class="mini-symbol">&nbsp; DOT / USDT</li>
                      <li id="DOGE"><img src="image/symbol/DOGE.png" class="mini-symbol">&nbsp; DOGE / USDT</li>
                      <li id="UNI"><img src="image/symbol/UNI.png" class="mini-symbol">&nbsp; UNI / USDT</li>
                      <li id="LTC"><img src="image/symbol/LTC.png" class="mini-symbol">&nbsp; LTC / USDT</li>
                      <li id="AXS"><img src="image/symbol/AXS-2.png" class="mini-symbol">&nbsp; AXS / USDT</li>
                    </ul>
                </div>
                <div class="mt-3" style="width: 100%;">
                    <span class="span-select span-selected" id="limit">Limit</span>
                    <span class="span-select" id="market" style="margin-left: 10px;">Market
                        <i class="bi bi-question-circle" style="padding-left: 3px; display: none;" data-toggle="tooltip" data-placement="top" 
                           title="Market will auto match order"></i>
                    </span>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <!-- Buy -->
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="bg-success head-column mt-3">Buy</div>
                <div class="mt-1" style="font-size: 17px;">
                    <span style="padding-left: 5px;">Avaliable</span>
                    <span style="float: right; padding-right: 10px;">
                        <span id="usdt">-</span>
                        <span>USDT</span>
                    </span>
                </div>
                <form>
                    <!-- Buy ราคา -->
                    <div class="input-group mt-2">
                        <div class="input-group-prepend"><span class="input-group-text left-span">ราคา $</span></div>
                        <input type="number" class="form-control shadow-none price-input" id="buy-price" step="0.0001"
                            placeholder="ราคา" autocomplete="off" name="price" onkeypress="return event.charCode != 45 && event.charCode != 43" required>
                        <div class="input-group-append"><span class="input-group-text right-span" id="price-buy">USDT</span></div>
                    </div>

                    <!-- Buy จำนวน -->
                    <div class="input-group mt-3" id="buy-amount-group">
                        <div class="input-group-prepend"><span class="input-group-text left-span">จำนวน</span></div>
                        <input type="number" class="form-control shadow-none" id="buy-amount" step="0.0001"
                            placeholder="จำนวน" autocomplete="off" name="amount" onkeypress="return event.charCode != 45 && event.charCode != 43" required>
                        <div class="input-group-append"><span class="input-group-text right-span Cryptocurrency" id="coin-symbol-buy">Coin</span></div>
                    </div>

                    <!-- Buy Slider -->
                    <div class="range-slider mt-3">
                        <input class="range-slider__range" type="range" value="0" min="0" max="100" id="buy-slider">
                        <span class="range-slider__value" id="buy-slider-text">0</span>
                    </div>

                    <!-- Buy ทั้งหมด -->
                    <div class="input-group mt-3" id="buy-total-group">
                        <div class="input-group-prepend"><span class="input-group-text left-span">ทั้งหมด</span></div>
                        <input type="number" class="form-control shadow-none"  id="buy-total" step="0.0001"
                            placeholder="ทั้งหมด" autocomplete="off" name="total" onkeypress="return event.charCode != 45 && event.charCode != 43" required>
                        <div class="input-group-append"><span class="input-group-text right-span" id="price-buy">USDT</span></div>
                    </div>

                    <!-- Buy button -->
                    <?php if(isset($_SESSION["User_ID"])) { ?>
                        <button type="button" class="btn btn-buy mt-3" id="buy-button" name="buy">Buy</button>
                    <?php } else { ?>
                        <div class="btn btn-div btn-secondary mt-3">
                            <a href="login.php" class="link">Login</a> or <a href="register.php" class="link">Register</a>
                        </div>
                    <?php } ?>
                </form>
            </div>

            <!-- Sell -->
            <div class="col-lg-4 col-md-6 mt-3 col-sm-10">
                <div class="bg-danger head-column">Sell</div>
                <div class="mt-1" style="font-size: 17px;">
                    <span style="padding-left: 5px;">Avaliable</span>
                    <span style="float: right; padding-right: 10px;">
                        <span id="crypto_coin">-</span>
                        <span class="Cryptocurrency">Coin</span>
                    </span>
                </div>
                <form>
                    <!-- Sell ราคา -->
                    <div class="input-group mt-2">
                        <div class="input-group-prepend"><span class="input-group-text left-span">ราคา $</span></div>
                        <input type="number" class="form-control shadow-none price-input"  id="sell-price" step="0.0001"
                            placeholder="ราคา" autocomplete="off" onkeypress="return event.charCode != 45 && event.charCode != 43" required>
                        <div class="input-group-append"><span class="input-group-text right-span" id="price-sell">USDT</span></div>
                    </div>

                    <!-- Sell จำนวน -->
                    <div class="input-group mt-3" id="sell-amount-group">
                        <div class="input-group-prepend"><span class="input-group-text left-span">จำนวน</span></div>
                        <input type="number" class="form-control shadow-none" id="sell-amount" step="0.0001"
                            placeholder="จำนวน" autocomplete="off" name="amount" onkeypress="return event.charCode != 45 && event.charCode != 43" required>
                        <div class="input-group-append"><span class="input-group-text right-span Cryptocurrency" id="coin-symbol-sell">Coin</span></div>
                    </div>

                    <!-- Sell slider -->
                    <div class="range-slider mt-3">
                        <input class="range-slider__range" type="range" value="0" min="0" max="100" id="sell-slider">
                        <span class="range-slider__value" id="sell-slider-text">0</span>
                    </div>

                    <!-- Sell ทั้งหมด -->
                    <div class="input-group mt-3" id="sell-total-group">
                        <div class="input-group-prepend"><span class="input-group-text left-span">ทั้งหมด</span></div>
                        <input type="number" class="form-control shadow-none" id="sell-total" step="0.0001"
                            placeholder="ทั้งหมด" autocomplete="off" name="total" onkeypress="return event.charCode != 45 && event.charCode != 43" required>
                        <div class="input-group-append"><span class="input-group-text right-span" id="price-sell">USDT</span></div>
                    </div>

                    <!-- Sell button -->
                    <?php if(isset($_SESSION["User_ID"])) { ?>
                        <button type="button" class="btn btn-sell mt-3" id="sell-button" name="sell">Sell</button>
                    <?php } else { ?>
                        <div class="btn btn-div btn-secondary mt-3">
                            <a href="login.php" class="link">Login</a> or <a href="register.php" class="link">Register</a>
                        </div>
                    <?php } ?>
                </form>
            </div>

        </div>

        <!-- Order table -->
        <div class="row mt-4 justify-content-center" style="padding-bottom: 250px;">
            <div class="col-lg-10 border border-secondary table-responsive">
                <table class="table" style="color: #c9c9c9;">
                    <div class="mt-3">
                        <span>Open Orders (<span class="orderCount">0</span>)</span>
                        <span class="refresh btn">refresh</span>
                    </div>
                    <hr>
                    <thead>
                        <tr>
                            <th style="width: 5%;">Order</th>
                            <th style="width: 16%;"><span class="table-sort first-table">Time <i class="bi"></i></span></th>
                            <th style="width: 9%;"><span class="table-sort">Symbol <i class="bi"></span></th>
                            <th style="width: 8%;"><span class="table-sort">Type <i class="bi"></span></th>
                            <th style="width: 6%;"><span class="table-sort">Side <i class="bi"></span></th>
                            <th style="width: 10%;"><span class="table-sort">Price <i class="bi"></span></th>
                            <th style="width: 10%;"><span class="table-sort">Amount <i class="bi"></span></th>
                            <th style="width: 10%;"><span class="table-sort">Filled <i class="bi"></span></th>
                            <th style="width: 10%;"><span class="table-sort">Total <i class="bi"></span></th>
                            <th style="text-align: center; width: 10%">Cancel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Order details will show here -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Place order success modal popup -->
        <div class="modal fade" id="placeOrderSuccess" style="color: black;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Place order success</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div id="modal-text-success">Place order success</div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-bs-dismiss="modal" style="background-color: #30c230; color: #fff;">ฉันเข้าใจแล้ว</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- orderError modal popup -->
        <div class="modal fade" id="orderError" style="color: black;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Order error</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div id="modal-text"></div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-bs-dismiss="modal" style="background-color: #30c230; color: #fff;">ฉันเข้าใจแล้ว</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Delete comfirm modal popup -->
        <div class="modal fade" id="deleteComfirm" style="color: black;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cancel Order</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            คุณต้องการยกเลิก Order <span id="orderID"></span> หรือไม่
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button class="btn" data-bs-dismiss="modal" onclick="cancelOrder()" style="background-color: #f15e5e; color: #fff;">ลบ Order</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <?php include"footer.php"?>

    <script>

        let select = "limit";       /* User select Limit or Market  */
        let symbol = "";            /* User select Cryptocurrency   */
        let id_symbol;              /* User select Cryptocurrency   */
        let buy_percent = 0;        /* User slide buy-slider        */
        let sell_percent = 0;       /* User slide sell-slider       */
        let index;                  /* index for api                */
        let walletData;             /* User wallet data             */
        let balance_usdt;           /* User USDT                    */
        let orderBy = "Time ASC";   /* Use for query database       */
        let alert_index = 1;        /* Use for Alert notification   */

        $(document).ready(function(){
            $('tbody').html("<td colspan='10'><div class='mt-1'>No order open</div></td>")
            getWalletData(); 
            refreshOpenOrders();
        });

        /*Dropdown Menu*/
        $('.myDropdown').click(function () {
            $(this).attr('tabindex', 1).focus();
            $(this).toggleClass('active');
            $(this).find('.myDropdown-menu').slideToggle(300);
        });
        $('.myDropdown').focusout(function () {
            $(this).removeClass('active');
            $(this).find('.myDropdown-menu').slideUp(300);
        });
        $('.myDropdown .myDropdown-menu li').click(function () {
            $('#show-select-symbol').attr('src', $(this).find('img').attr('src'));
            $(this).parents('.myDropdown').find('span').text($(this).text());
            $(this).parents('.myDropdown').find('input').attr('value', $(this).attr('id'));
            $('.Cryptocurrency').text($(this).attr('id'));
            $('.symbol').val($(this).attr('id'));
            symbol = $(this).parents('.myDropdown').find('input').val();
            if(walletData!=null){
                $('#crypto_coin').text(walletData[symbol]);
            }
            clearInputField();
            updatePrice();
        });
        /*End Dropdown Menu*/

        function clearInputField(){
            $('#buy-amount').val("");
            $('#buy-total').val("");
            $('#sell-amount').val("");
            $('#sell-total').val("");
            $('.range-slider__range').val(0);
            $('.range-slider__value').text("0");
        }

        /* Select limits , market */
        $('#limit').click(function (){
            $(this).addClass('span-selected');
            $('#market').removeClass('span-selected');
            $('#market').find('i').hide();
            $('.price-input').removeAttr('disabled');
            $('.price-input').attr('type','number');
            $('.type').val("limit");
            if(select == "market"){
                $('#buy-amount-group').show();
                $('#sell-total-group').show();
                $('#buy-amount-group').swapWith('#buy-total-group');
            }
            select = "limit";
            clearInputField();
            updatePrice();
        })
        $('#market').click(function (){
            $(this).find('i').show();
            $(this).addClass('span-selected');
            $('#limit').removeClass('span-selected');
            $('.price-input').attr('disabled','disabled');
            $('.price-input').attr('type','text');
            $('.price-input').val('Market');
            $('.type').val("market");
            if(select == "limit"){
                $('#buy-amount-group').hide();
                $('#sell-total-group').hide();
                $('#buy-amount-group').swapWith('#buy-total-group');
            }
            select = "market";
            clearInputField();
            updatePrice();
        })

        /* swap element function */
        jQuery.fn.swapWith = function(to) {
            return this.each(function() {
                var copy_to = $(to).clone(true);
                var copy_from = $(this).clone(true);
                $(to).replaceWith(copy_from);
                $(this).replaceWith(copy_to);
            });
        };

        /* Slider */
        let rangeSlider = function(){
            let slider = $('.range-slider'),
                value = $('.range-slider__value');
            let buy_slider_change = $('#buy-slider');
            let sell_slider_change = $('#sell-slider');

            slider.each(function(){
                value.each(function(){
                    let value = $(this).prev().attr('value');
                    $(this).html(value + '%');
                });
                buy_slider_change.on('input', function(){
                    $(this).next(value).html(this.value  + '%');
                    buy_percent = this.value;
                    sliderCalculateBuy();
                });
                sell_slider_change.on('input', function(){
                    $(this).next(value).html(this.value  + '%');
                    sell_percent = this.value;
                    sliderCalculateSell();
                });
            });
        };
        rangeSlider();

        function updatePrice(){
            fetch("https://api.binance.com/api/v3/ticker/24hr")
            .then(function (response){
                return response.json()
            })
            .then(function(data){
                switch(symbol){
                    case 'BTC': index = 11; id_symbol = 2; break;
                    case 'ETH': index = 12; id_symbol = 3; break;
                    case 'BNB': index = 98; id_symbol = 4; break;
                    case 'ADA': index = 298; id_symbol = 5; break;
                    case 'SOL': index = 785; id_symbol = 6; break;
                    case 'XRP': index = 308; id_symbol = 7; break;
                    case 'DOT': index = 963; id_symbol = 8; break;
                    case 'DOGE': index = 564; id_symbol = 9; break;
                    case 'UNI': index = 1051; id_symbol = 10; break;
                    case 'LTC': index = 190; id_symbol = 11; break;
                    case 'AXS': index = 1148; id_symbol = 12; break;
                    default: break;
                }
                if(index >= 0){
                    let price = parseFloat(data[index]['lastPrice']);
                    if(select == 'limit'){ 
                        $('.price-input').val(price); 
                    }
                    $('.coin_id').val(id_symbol);
                }
            });
        }
        
        /* Auto Set by slider */
        function sliderCalculateBuy(){
            let price = $('#buy-price').val();
            if(price == "Market"){ 
                $('#buy-amount').val(0);
                let total = Math.floor( balance_usdt * (buy_percent/100) * 10000 ) / 10000;
                $('#buy-total').val(total);
            }
            else if(price > 0){
                /* Set total 4 decimal */
                let total = Math.floor( balance_usdt * (buy_percent/100) * 10000 ) / 10000;
                $('#buy-total').val(total)
                /* Set amount 4 decimal */
                let amount = Math.floor(total/price * 10000) / 10000;
                $('#buy-amount').val(amount);
            }
        }
        /* Auto Set by slider */
        function sliderCalculateSell(){
            let price = $('#sell-price').val();
            if(price == "Market"){ price = 1; }
            if(price > 0){
                /* Set amount 4 decimal */
                let amount = walletData[symbol]*(sell_percent/100);
                amount = Math.floor(amount * 10000) / 10000;
                $('#sell-amount').val(amount);
                /* Set total 4 decimal */
                let total = amount * price;
                total = Math.floor(total * 10000) / 10000;
                $('#sell-total').val(total)
            }
        }

        /* Buy input */
        $('#buy-amount').keyup(function (){
            if($('#buy-price').val()==""){
                updatePrice(); 
            } else {
                let cal = Math.floor( $('#buy-price').val() * $(this).val() * 10000) / 10000;
                let percent = ( cal / balance_usdt )*100 ;
                $('#buy-total').val(cal);
                $('#buy-slider').val(percent);
                $('#buy-slider-text').text(parseInt(percent) + '%');
                if(percent>100){
                    $('#buy-slider-text').text('100%');
                }
            }  
        });
        $('#buy-total').keyup(function (){
            if($('#buy-price').val()==""){
                updatePrice(); 
            }
            if(select == "limit"){
                let cal = Math.floor( ($(this).val() / $('#buy-price').val()) * 10000) / 10000;
                let percent = Math.floor(( $(this).val() / balance_usdt )*100 *100 ) / 100 ;
                $('#buy-amount').val(cal);
                $('#buy-slider').val(percent);
                $('#buy-slider-text').text(parseInt(percent) + '%');
                if(percent>100){
                    $('#buy-slider-text').text('100%');
                }
            } else {
                $('#buy-amount').val(0);
            }
        });

        /* Sell input */
        $('#sell-amount').keyup(function (){
            if($('#sell-price').val()==""){
                updatePrice(); 
            }
            if(select == "limit"){
                let cal = Math.floor( $('#sell-price').val() * $(this).val() * 10000) / 10000;
                let percent = ( $(this).val() / walletData[symbol] )*100 ;
                $('#sell-total').val(cal);
                $('#sell-slider').val(percent);
                $('#sell-slider-text').text(parseInt(percent) + '%');
                if(percent>100){
                    $('#sell-slider-text').text('100%');
                }
            } else {
                $('#sell-total').val(0);
            }
        });
        $('#sell-total').keyup(function (){
            if($('#sell-price').val()==""){
                updatePrice(); 
            } else {
                let cal = Math.floor($(this).val() / $('#sell-price').val() * 10000) / 10000;
                let percent = ( cal / walletData[symbol])*100 ;
                $('#sell-amount').val(cal);
                $('#sell-slider').val(percent);
                $('#sell-slider-text').text(parseInt(percent) + '%');
                if(percent>100){
                    $('#sell-slider-text').text('100%');
                }
            }
        });

        /* Get user wallet data */
        function getWalletData(){
            $.ajax({
                url: 'database/getWalletData.php', type: 'post', dataType: 'json',
                success: function(response){
                    walletData = response;
                    $('#usdt').text(walletData["USDT"]);
                    balance_usdt = walletData["USDT"];
                    if(symbol != ""){
                        $('#crypto_coin').text(walletData[symbol]);
                    }
                }
            });
        }

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
        
        $('#buy-button').click(function(){
            let price = $('#buy-price').val();
            let amount = $('#buy-amount').val();
            let total = $('#buy-total').val();
            if(symbol==""){
                $("#modal-text").text("กรุณาเลือกเหรียญ");
                window.$("#orderError").modal("show")
            } else if( price=="" || amount=="" || total=="" ){
                $("#modal-text").text("กรุณากรอกข้อมูลให้ถูกต้อง");
                window.$("#orderError").modal("show")
            } else if( ( price <= 0 || amount <= 0 || total <= 0 ) && select == "limit" ){
                $("#modal-text").text("กรุณาใส่มูลค่ามากกว่า 0");
                window.$("#orderError").modal("show")
            } else if( total <= 0  && select == "market" ){
                $("#modal-text").text("กรุณาใส่มูลค่ามากกว่า 0");
                window.$("#orderError").modal("show")
            }  else {
                $.ajax({
                    url: 'database/place_order.php', type: 'post', dataType: 'json', 
                    data: {
                        coin_id : id_symbol,
                        symbol : symbol,
                        type : select,
                        side : "Buy",
                        price : price ,
                        amount : amount,
                        total : total,
                    },
                    success: function(response){
                        refreshOpenOrders()
                        clearInputField()
                        getWalletData()
                        createAlert("<strong>Success! </strong>create order buy", "success", 10000, alert_index)
                        alert_index++;
                        window.$("#placeOrderSuccess").modal("show");
                    },
                    error: function(xhr, status, error){
                        createAlert("<strong>Failed to open order! </strong>You don't have enough USDT!", "danger", 10000, alert_index)
                        alert_index++;
                    }
                });
            }
        })
        $('#sell-button').click(function(){
            let price = $('#sell-price').val();
            let amount = $('#sell-amount').val();
            let total = $('#sell-total').val();
            if(symbol==""){
                $("#modal-text").text("กรุณาเลือกเหรียญ")
                window.$("#orderError").modal("show")
            } else if( price=="" || amount=="" || total=="" ){
                $("#modal-text").text("กรุณากรอกข้อมูลให้ถูกต้อง")
                window.$("#orderError").modal("show")
            } else if( ( price <= 0 || amount <= 0 || total <= 0 ) && select == "limit" ){
                $("#modal-text").text("กรุณาใส่มูลค่ามากกว่า 0");
                window.$("#orderError").modal("show")
            } else if( amount <= 0  && select == "market" ){
                $("#modal-text").text("กรุณาใส่มูลค่ามากกว่า 0");
                window.$("#orderError").modal("show")
            } else {
                $.ajax({
                    url: 'database/place_order.php', type: 'post', dataType: 'json', 
                    data: {
                        coin_id : id_symbol,
                        symbol : symbol,
                        type : select,
                        side : "Sell",
                        price : price,
                        amount : amount,
                        total : total,
                    },
                    success: function(response){
                        refreshOpenOrders()
                        clearInputField()
                        getWalletData()
                        createAlert("<strong>Success! </strong>create order sell", "success", 10000, alert_index)
                        alert_index++;
                        window.$("#placeOrderSuccess").modal("show");
                    },
                    error: function(xhr, status, error){
                        createAlert("<strong>Failed to open order! </strong>You don't have enough coin!", "danger", 10000, alert_index)
                        alert_index++;
                    }
                });
            }
        })

        /* Refresh orders table */
        $('.refresh').click(function (){
            refreshOpenOrders();
            createAlert("<strong>Success!</strong> Order refresh.", "success", 3000, alert_index);
            alert_index++;
        })

        let cancelType;
        let cancelOrderID;
        function refreshOpenOrders(){
            $.ajax({
                url: 'database/getOpenOrders.php', type: 'post', dataType: 'json', data: { orderBy: orderBy },
                success: function(response){
                    $('tbody').html(response.code)
                    $('.orderCount').text(response.orderCount)
                    let setCancelOrderFunction = function(){
                        $('.cancelIcon').click(function(){
                            $('#orderID').text($(this).data("userorderid"));
                            cancelType = $(this).data("type");
                            cancelOrderID = $(this).data("orderid")
                        })
                    }
                    setCancelOrderFunction();
                }
            });
        }

        /* Cancel orders */
        function cancelOrder(){
            $.ajax({
                url: 'database/cancelOrder.php', type: 'post', dataType: 'json', 
                data: { 
                    type: cancelType ,
                    orderID: cancelOrderID,
                },
                success: function(response){
                    refreshOpenOrders();
                    getWalletData();
                    createAlert("<strong>Success!</strong> Cancel order successfully.", "success", 5000, alert_index);
                    alert_index++;
                },
                error: function(xhr, status, error){
                    createAlert("<strong>Error!</strong>This order is no longer open.", "danger", 5000, alert_index);
                    alert_index++;
                }
            });
        }

        /* sort orders by user select */

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
                refreshOpenOrders();
            })
        })
        
        /* tooltip by Bootstrap */
        $(function () {
            $('[data-toggle="tooltip"]').tooltip({
                delay: {
                    show: 200,
                    hide: 50
                }
            })
        })

    </script>

</body>
</html>