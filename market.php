<?php session_start(); ?>
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
    <!-- my css & javsscript -->
    <link rel="stylesheet" href="css/marketStyle.css">
    <script src="js/marketFunction.js"></script>
    <!-- TradingView -->
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    
	<link rel="icon" href="image/icon_200x200.png" type="image/x-icon">
    <title>BitMeta Market</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html"><i class="bi bi-house-door-fill"></i>Home</a>
            <a class="navbar-link" href="market.php"><i class="bi bi-currency-exchange"></i>Market</a>
            <a class="navbar-link" href="news.php"><i class="bi bi-file-earmark-text"></i>Announcement</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><i class="bi bi-pencil-square"></i> เข้าสู่ระบบ</a>
                    <a class="nav-link" href="database/logout.php"><i class="bi bi-pencil-square"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <br><br><br>
    <!-- TradingView -->
    <div class="tradingview-widget-container">
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
        <!-- Label -->
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <span class="thai-font">เลือกเหรียญ</span>
                <div class="dropdown">
                    <div class="select">
                        <img src="image/symbol/BTC.png" class="mini-symbol" id="show-select-symbol">&nbsp; 
                        <span>Select coin</span>
                        <i class="bi bi-chevron-left"></i>
                    </div>
                    <input type="hidden" name="coin">
                    <ul class="dropdown-menu dd1">
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
                    <span style="float: right; display: none;" id="market-option">
                        <span class="span-select span-selected" style="padding-right: 10px;" id="market-amount">จำนวน</span>
                        <span class="span-select" id="market-total">ทั้งหมด</span>
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
                <form action="database/place_order.php" method="post">
                    <!-- Buy ราคา -->
                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text left-span">ราคา $</span>
                        </div>
                        <input type="number" step="0.0001" class="form-control shadow-none price-input enableSelect" id="buy-price" 
                            placeholder="ราคา" min="0"  autocomplete="off" name="price" onkeypress="return event.charCode != 45 && event.charCode != 43" required>
                        <div class="input-group-append">
                          <span class="input-group-text right-span" id="price-buy">USDT</span>
                        </div>
                    </div>
                    <!-- Buy จำนวน -->
                    <div class="input-group mt-3" id="buy-amount-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text left-span">จำนวน</span>
                          </div>
                        <input type="number" step="0.0001" class="form-control shadow-none enableSelect" id="buy-amount" 
                            placeholder="จำนวน" min="0" autocomplete="off" name="amount" onkeypress="return event.charCode != 45 && event.charCode != 43" required>
                        <div class="input-group-append">
                          <span class="input-group-text right-span Cryptocurrency" id="coin-symbol-buy">Coin</span>
                        </div>
                    </div>
                    <!-- Buy Slider -->
                    <div class="range-slider mt-3">
                        <input class="range-slider__range" type="range" value="0" min="0" max="100" id="buy-slider">
                        <span class="range-slider__value" id="buy-slider-text">0</span>
                    </div>
                    <!-- Buy ทั้งหมด -->
                    <div class="input-group mt-3" id="buy-total-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text left-span">ทั้งหมด</span>
                        </div>
                        <input type="number" step="0.0001" class="form-control shadow-none enableSelect"  id="buy-total"
                            placeholder="ทั้งหมด" min="0" autocomplete="off" name="total" onkeypress="return event.charCode != 45 && event.charCode != 43" required>
                        <div class="input-group-append">
                          <span class="input-group-text right-span" id="price-buy">USDT</span>
                        </div>
                    </div>
                    <input type="text" style="display: none;" name="option" class="select-market-option">
                    <input type="text" style="display: none;" name="markprice" class="markprice">
                    <input type="text" style="display: none;" name="symbol" class="symbol">
                    <input type="text" style="display: none;" name="type" class="type">
                    <?php if(isset($_SESSION["User_ID"])) { ?>
                        <button type="submit" class="btn btn-buy mt-3" id="buy-button" name="buy">Buy</button>
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
                <form action="database/place_order.php" method="post">
                    <!-- Sell ราคา -->
                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text left-span">ราคา $</span>
                          </div>
                        <input type="number" step="0.0001" class="form-control shadow-none price-input enableSelect"  id="sell-price"
                            placeholder="ราคา" min="0" autocomplete="off" name="price" onkeypress="return event.charCode != 45 && event.charCode != 43" required>
                        <div class="input-group-append">
                          <span class="input-group-text right-span" id="price-sell">USDT</span>
                        </div>
                    </div>
                    <!-- Sell จำนวน -->
                    <div class="input-group mt-3" id="sell-amount-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text left-span">จำนวน</span>
                          </div>
                        <input type="number" step="0.0001" class="form-control shadow-none enableSelect" id="sell-amount"
                            placeholder="จำนวน" min="0" autocomplete="off" name="amount" onkeypress="return event.charCode != 45 && event.charCode != 43" required>
                        <div class="input-group-append">
                          <span class="input-group-text right-span Cryptocurrency" id="coin-symbol-sell">Coin</span>
                        </div>
                    </div>
                    <!-- Sell slider -->
                    <div class="range-slider mt-3">
                        <input class="range-slider__range" type="range" value="0" min="0" max="100" id="sell-slider">
                        <span class="range-slider__value" id="sell-slider-text">0</span>
                    </div>
                    <!-- Sell ทั้งหมด -->
                    <div class="input-group mt-3" id="sell-total-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text left-span">ทั้งหมด</span>
                        </div>
                        <input type="number" step="0.0001" class="form-control shadow-none enableSelect" id="sell-total"
                            placeholder="ทั้งหมด" min="0" autocomplete="off" name="total" onkeypress="return event.charCode != 45 && event.charCode != 43" required>
                        <div class="input-group-append">
                            <span class="input-group-text right-span" id="price-sell">USDT</span>
                        </div>
                    </div>
                    <input type="text" style="display: none;" name="option" class="select-market-option">
                    <input type="text" style="display: none;" name="markprice" class="markprice">
                    <input type="text" style="display: none;" name="symbol" class="symbol">
                    <input type="text" style="display: none;" name="type" class="type">
                    <?php if(isset($_SESSION["User_ID"])) { ?>
                        <button type="submit" class="btn btn-sell mt-3" id="sell-button" name="sell">Sell</button>
                    <?php } else { ?>
                        <div class="btn btn-div btn-secondary mt-3">
                            <a href="login.php" class="link">Login</a> or <a href="register.php" class="link">Register</a>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
        <div class="row mt-4 justify-content-center" style="padding-bottom: 250px;">
            <div class="col-lg-10 border border-secondary table-responsive">
                <table class="table" style="color: #c9c9c9;">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Symbol</th>
                            <th>Type</th>
                            <th>Sild</th>
                            <th>Price</th>
                            <th>amount</th>
                            <th>Filled</th>
                            <th>Total</th>
                            <th style="text-align: center;">Cancel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2021-11-25 10:40:30</td>
                            <td>BTC</td>
                            <td>Market</td>
                            <td>Buy</td>
                            <td>price &lt; 63000</td>
                            <td>1 BTC</td>
                            <td>0.1</td>
                            <td>63000</td>
                            <td><i class="gg-trash" style="margin-left: 50%;"></i></td>
                        </tr>
                        <tr>
                            <td>2021-11-25 10:45:50</td>
                            <td>BTC</td>
                            <td>Limit</td>
                            <td>Buy</td>
                            <td>63000</td>
                            <td>1 BTC</td>
                            <td>0.1</td>
                            <td>63000</td>
                            <td><i class="gg-trash" style="margin-left: 50%;"></i></td>
                        </tr>
                        <tr>
                            <td>2021-11-25 11:20:03</td>
                            <td>BTC</td>
                            <td>Market</td>
                            <td>Sell</td>
                            <td>price &gt; 63000</td>
                            <td>1 BTC</td>
                            <td>0.1</td>
                            <td>63000</td>
                            <td><i class="gg-trash" style="margin-left: 50%;"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        let select = "limit";                   /* User select Limit or Market */
        let symbol;                             /* User select Cryptocurrency */
        let id_symbol;                          /* User select Cryptocurrency */
        let buy_amount_percent = 0;             /* User slide buy-slider */
        let sell_amount_percent = 0;            /* User slide sell-slider */
        let buy_current_crypto_price;           /* Current crypto price that user selected */
        let sell_current_crypto_price;
        let market_select_option = "amount";    /* User select จำนวน or ทั้งหมด */
        let index;                              /* index for api */
        let walletData;                         /* User wallet data */
        let balance_usdt                        /* User USDT */
        $('.type').val("limit");

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
            $('#show-select-symbol').attr('src', $(this).find('img').attr('src'));
            $(this).parents('.dropdown').find('span').text($(this).text());
            $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
            $('.Cryptocurrency').text($(this).attr('id'));
            $('.symbol').val($(this).attr('id'));
            symbol = $(this).parents('.dropdown').find('input').val();
            if(walletData!=null){
                $('#crypto_coin').text(walletData[symbol]);
            }
            clearInput();
            updatePrice();
        });
        /*End Dropdown Menu*/

        function clearInput(){
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
            $('#market-option').hide();
            check_showup_inputfield();
            select = "limit";
            updatePrice();
        })
        $('#market').click(function (){
            $(this).find('i').show();
            $(this).addClass('span-selected');
            $('#limit').removeClass('span-selected');
            $('.price-input').attr('disabled','disabled');
            $('.price-input').attr('type','text');
            $('.price-input').val('Market');
            $('#market-option').show();
            $('.type').val("market");
            $('.select-market-option').val(market_select_option);
            select = "market";
            updatePrice();
            if(market_select_option == "amount"){
                $('#buy-total-group').hide();
                $('#sell-total-group').hide();
            }
            if(market_select_option == "total") {
                swap_total_up();
            }
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

        /* check when user switch from Market -> Limit */
        function check_showup_inputfield (){
            if(select == "market"){
                if(market_select_option == "total"){
                    $('#buy-amount-group').swapWith('#buy-total-group');
                    $('#sell-amount-group').swapWith('#sell-total-group');
                }

                $('#buy-amount-group').show();
                $('#buy-total-group').show();

                $('#sell-amount-group').show();
                $('#sell-total-group').show();
            }
        }
        
        function swap_amount_up (){
            $('#buy-amount-group').swapWith('#buy-total-group');
            $('#sell-amount-group').swapWith('#sell-total-group'); 
            $('#buy-total-group').hide();
            $('#sell-total-group').hide();
            $('#buy-amount-group').show();
            $('#sell-amount-group').show();
        }
        function swap_total_up (){
            $('#buy-amount-group').swapWith('#buy-total-group');
            $('#sell-amount-group').swapWith('#sell-total-group');
            $('#buy-amount-group').hide();
            $('#sell-amount-group').hide();
            $('#buy-total-group').show();
            $('#sell-total-group').show();
        }

        /* market option -> จำนวน & ทั้งหมด */
        $('#market-amount').click(function (){
            $(this).addClass('span-selected');
            $('#market-total').removeClass('span-selected');
            /* show up amount-inputfield */
            if(market_select_option == "total"){
                swap_amount_up();
            }
            market_select_option = "amount";
            $('.select-market-option').val(market_select_option);
        })
        $('#market-total').click(function (){
            $(this).addClass('span-selected');
            $('#market-amount').removeClass('span-selected');
            /* show up total-inputfield */
            if(market_select_option == "amount") {
                swap_total_up();
            }
            market_select_option = "total";
            $('.select-market-option').val(market_select_option);
        })

        /* Slider */
        let rangeSlider = function(){
            let slider = $('.range-slider'),
                value = $('.range-slider__value');
            let buy_slider_change = $('#buy-slider');
            let sell_slider_change = $('#sell-slider');

            slider.each(function(){
                value.each(function(){
                    let value = $(this).prev().attr('value');
                    $(this).html(value);
                });
                buy_slider_change.on('input', function(){
                    $(this).next(value).html(this.value  + '%');
                    buy_amount_percent = this.value;
                    sliderCalculateBuy();
                });
                sell_slider_change.on('input', function(){
                    $(this).next(value).html(this.value  + '%');
                    sell_amount_percent = this.value;
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
                    buy_current_crypto_price = price;
                    sell_current_crypto_price = price;
                    if(select == 'limit'){ 
                        $('.price-input').val(price); 
                    }
                    $('.markprice').val(price); 
                }
            });
        }
        
        /* Auto Set by slider */
        function sliderCalculateBuy(){
            let price = $('#buy-price').val();
            if(price == "Market"){ price = buy_current_crypto_price; }
            if(price > 0){
                /* Set amount 4 decimal */
                let amount = balance_usdt*(buy_amount_percent/100)/price;
                amount = Math.floor(amount * 10000) / 10000;
                $('#buy-amount').val(amount);
                /* Set total 4 decimal */
                let total = amount * price;
                total = Math.floor(total * 10000) / 10000;
                $('#buy-total').val(total)
            }
        }
        /* Auto Set by slider */
        function sliderCalculateSell(){
            let price = $('#sell-price').val();
            if(price == "Market"){ price = sell_current_crypto_price; }
            if(price > 0){
                /* Set amount 4 decimal */
                let amount = walletData[symbol]*(sell_amount_percent/100);
                amount = Math.floor(amount * 10000) / 10000;
                $('#sell-amount').val(amount);
                /* Set total 4 decimal */
                let total = amount * price;
                total = Math.floor(total * 10000) / 10000;
                $('#sell-total').val(total)
            }
        }

        /* Buy input */
        $('#buy-price').keyup(function (){
            buy_current_crypto_price = $(this).val();
        })
        $('#buy-amount').keyup(function (){
            if($('#buy-price').val()==""){
                updatePrice(); 
            } else {
                let cal = Math.floor(buy_current_crypto_price * $(this).val() * 10000) / 10000;
                let percent = ( cal / balance_usdt )*100 ;
                $('#buy-total').val(cal);
                $('#buy-slider').val(percent);
                $('#buy-slider-text').text(parseInt(percent) + '%');
                if(percent>100){
                    $('#buy-slider-text').text('100%');
                }
                if(cal < 0){
                    $(this).val("");
                    $('#buy-total').val("");
                } 
            }  
        });
        $('#buy-total').keyup(function (){
            if($('#buy-price').val()==""){
                updatePrice(); 
            } else {
                let cal = Math.floor( ($(this).val() / $('#buy-price').val()) * 10000) / 10000;
                let percent = Math.floor(( $(this).val() / balance_usdt )*100 *100 ) / 100 ;
                $('#buy-amount').val(cal);
                $('#buy-slider').val(percent);
                $('#buy-slider-text').text(parseInt(percent) + '%');
                if(percent>100){
                    $('#buy-slider-text').text('100%');
                }
                if(cal < 0){
                    $(this).val("");
                    $('#buy-amount').val("");
                }
            }
        });

        /* Sell input */
        $('#sell-price').keyup(function (){
            sell_current_crypto_price = $(this).val();
        })
        $('#sell-amount').keyup(function (){
            if($('#sell-price').val()==""){
                updatePrice(); 
            } else {
                let cal = Math.floor(sell_current_crypto_price * $(this).val() * 10000) / 10000;
                let percent = ( $(this).val() / walletData[symbol] )*100 ;
                $('#sell-total').val(cal);
                $('#sell-slider').val(percent);
                $('#sell-slider-text').text(parseInt(percent) + '%');
                if(percent>100){
                    $('#sell-slider-text').text('100%');
                }
                if(cal < 0){
                    $(this).val("");
                    $('#sell-total').val("");
                }
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
                if(cal < 0){
                    $(this).val("");
                    $('#sell-amount').val("");
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
                    balance_usdt = parseFloat($('#usdt').text());
                }
            });
        }
        $(document).ready(getWalletData());

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