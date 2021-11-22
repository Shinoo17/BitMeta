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
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <!-- gg css icon -->
    <link href='https://css.gg/css' rel='stylesheet'>

    <!-- my css & javsscript -->
    <link rel="stylesheet" href="css/indexStyle.css">
    <link rel="stylesheet" href="css/loader.css">
	<script src="js/indexFunction.js"></script>
    
	<link rel="icon" href="image/icon_200x200.png" type="image/x-icon">
    <title>BitMeta</title>
</head>
<body>
    <!-- Loader screen 
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div> 
    -->
    
    <div>
		<!-- navbar -->
        <div>
            <?php include"nav-edit.php"?>
        </div>
        
		<!-- Swiper -->
        <div class="swiper noSelect">
            <div class="swiper-wrapper">
              <div class="swiper-slide"><img src="image/index/bitcoin-2.jpg" class="swiper-img-move"></div>
              <div class="swiper-slide"><img src="image/index/ETH-1.png" class="swiper-img-move"></div>
              <div class="swiper-slide"><img src="image/index/BNB-2.png" class="swiper-img-move"></div>
              <div class="swiper-slide"><img src="image/index/cardano-2.png" class="swiper-img-move"></div>
              <div class="swiper-slide"><img src="image/index/AXS-1.png" class="swiper-img-move"></div>
            </div>
            <div class="swiper-pagination"></div>
			<div class="swiper-button-prev swiper-button-white" style="margin-left: 2vw;"></div>
			<div class="swiper-button-next swiper-button-white" style="margin-right: 2vw;"></div>
        </div>

		<!-- Show Price and coin Name -->
		<div id="show-price" class="noSelect FadeIn">
			$ <span id="show-price-text">60000.00</span>
		</div>
		<div id="show-detail" class="noSelect FadeIn">
			<img src="image/symbol/BTC.png" id="icon" class="coin-icon">
			<span id="show-detail-name">Bitcoin</span>
			<span class="show-symbol" id="show-symbol-text">BTC</span> &nbsp;
			<span class="detail-24change">PriceChange <br /><span id="priceChange">50.00</span></span> &nbsp;
			<span class="detail-24change" style="position: relative; left: -3vw;">24h <br /><span id="percentChange">5%</span></span>
		</div>

		<!-- Init Swiper -->
        <script>
            let swiper = new Swiper('.swiper', {
				modules: [swiperPlugin],
                loop: true,
                autoplay: {
                    delay: 5500,
                },
                spaceBetween: 0,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                // Enable debugger
                debugger: true,
            });
        </script>
		
    </div>

    <!-- TradingView Mini Chart -->
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-lg-3">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                        "symbol": "BINANCE:BTCUSDT",
                        "width": "100%",
                        "height": "100%",
                        "locale": "en",
                        "dateRange": "1M",
                        "colorTheme": "dark",
                        "trendLineColor": "rgba(73, 133, 231, 1)",
                        "underLineColor": "rgba(41, 98, 255, 0.3)",
                        "underLineBottomColor": "rgba(41, 98, 255, 0)",
                        "isTransparent": false,
                        "autosize": true,
                        "largeChartUrl": "http://localhost/work/BitMeta/market.php"
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
            <div class="col-lg-3">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                        "symbol": "BINANCE:ETHUSDT",
                        "width": "100%",
                        "height": "100%",
                        "locale": "en",
                        "dateRange": "1M",
                        "colorTheme": "dark",
                        "trendLineColor": "rgba(73, 133, 231, 1)",
                        "underLineColor": "rgba(41, 98, 255, 0.3)",
                        "underLineBottomColor": "rgba(41, 98, 255, 0)",
                        "isTransparent": false,
                        "autosize": true,
                        "largeChartUrl": "http://localhost/work/BitMeta/market.php"
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
            <div class="col-lg-3">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                        "symbol": "BINANCE:BNBUSDT",
                        "width": "100%",
                        "height": "100%",
                        "locale": "en",
                        "dateRange": "1M",
                        "colorTheme": "dark",
                        "trendLineColor": "rgba(73, 133, 231, 1)",
                        "underLineColor": "rgba(41, 98, 255, 0.3)",
                        "underLineBottomColor": "rgba(41, 98, 255, 0)",
                        "isTransparent": false,
                        "autosize": true,
                        "largeChartUrl": "http://localhost/work/BitMeta/market.php"
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
            <div class="col-lg-3">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "BINANCE:ADAUSDT",
                            "width": "100%",
                            "height": "100%",
                            "locale": "en",
                            "dateRange": "1M",
                            "colorTheme": "dark",
                            "trendLineColor": "rgba(73, 133, 231, 1)",
                            "underLineColor": "rgba(41, 98, 255, 0.3)",
                            "underLineBottomColor": "rgba(41, 98, 255, 0)",
                            "isTransparent": false,
                            "autosize": true,
                            "largeChartUrl": "http://localhost/work/BitMeta/market.php"
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
        </div>
    </div>

    <div>
        <div class="container" style="margin-top: 100px;">              
            <div class="card-group">           
                <div class="card m-lg-2 ">                                                                 
                        <img src="image/WhatIsIt_image/Crypto.png" class="img-fluid" style="width:650px ; height:300px ;">                                         
                </div>    
                <div class="card m-lg-2 ">
                    <div class="card-body bg-dark" style="margin-left: auto;">                              
                        <h4 class="card-title text-white text-center">Cryptocurrency คืออะไร</h4>                        
                      
                        <h6 class="card-subtitle mb-2 text-muted text-white text-center">เผยแพร่ 22/10/2021</h6>
                        <p class="card-text text-white">Cryptocurrency (สกุลเงินดิจิทัล) คือ สินทรัพย์ดิจิทัลประเภทหนึ่งที่มีการเข้ารหัส มีราคากลางในการซื้อขายแปรผันตามกลไกตลาด จึงสามารถทำหน้าที่เป็นสื่อกลางในการแลกเปลี่ยนมูลค่าผ่านอินเทอร์เน็ตได้ แต่เพราะไม่ได้มีลักษณะทางกายภาพเหมือนเช่นสกุลเงินทั่วไป (Fiat Currency) ของแต่ละประเทศที่มีการตีพิมพ์ธนบัตรหรือเหรียญกษาปณ์ออกมา ทำให้บางครั้ง เราก็เรียก สกุลเงินดิจิทัล ว่า "สกุลเงินเสมือน" หรือ Virtual currency  </p>
                        <a href="https://www.thairath.co.th/lifestyle/money/2121706" target="_blank">
                            <button class="learn-more">
                                <span class="circle" aria-hidden="true">
                                    <span class="icon arrow"></span>
                                </span>
                                <span class="button-text">อ่านเพิ่มเติม</span>
                            </button>
                        </a>
                    </div>
                </div>         
            </div>
        </div><br>
        <div>
            <div class="container" style="margin-top: 20px;">              
                <div class="card-group">           
                     
                    <div class="card m-lg-2">
                        <div class="card-body bg-dark" style="margin-left: auto;">                              
                            <h4 class="card-title text-white text-center">BitCoin คืออะไร</h4>                        
                          
                            <h6 class="card-subtitle mb-2 text-muted text-white text-center">เผยแพร่ 22/10/2021</h6>
                            <p class="card-text text-white">เป็นสกุลเงินดิจิทัลแรกของโลก จึงถือว่าเก่าแก่ที่สุด ซึ่งตลอดหลายปีที่ผ่านมา Bitcoin เข้ามามีบทบาทในการเปลี่ยนแปลงลักษณะการดำเนินธุรกรรมต่างๆ ระหว่างบุคคล สามารถตรวจสอบได้ จึงทำให้นักลงทุนรุ่นใหม่หันมาสนใจลงทุนกับบิตคอยน์มากขึ้น</p>
                            <a href="https://www.moneybuffalo.in.th/business/what-is-bitcoin" target="_blank">
                                <button class="learn-more">
                                    <span class="circle" aria-hidden="true">
                                        <span class="icon arrow"></span>
                                    </span>
                                    <span class="button-text">อ่านเพิ่มเติม</span>
                                </button>
                            </a>
                        </div>
                    </div> 
                     <div class="card m-lg-2">                                                                 
                            <img src="image/WhatIsIt_image/bitcoin.jpg" class="img-fluid" style="width:650px ; height:300px ;">                                         
                    </div>          
                </div>
            </div><br>
            <div>
                <div class="container" style="margin-top: 20px;">              
                    <div class="card-group">           
                        <div class="card m-lg-2">                                                                 
                                <img src="image/WhatIsIt_image/eth.png" class="img-fluid" style="width:650px ; height:300px ;">                                         
                        </div>    
                        <div class="card m-lg-2">
                            <div class="card-body bg-dark" style="margin-left: auto;">                              
                                <h4 class="card-title text-white text-center">ETH คืออะไร</h4>                        
                              
                                <h6 class="card-subtitle mb-2 text-muted text-white text-center">เผยแพร่ 22/10/2021</h6>
                                <p class="card-text text-white">Ethereum ถูกสร้างขึ้นมาในรูปแบบ Open-Source นั่นหมายความว่า ผู้สร้างนั้นได้เปิดเผย Source Code ของตนเพื่อให้ผู้อื่นสามารถนำไปพัฒนาต่อยอดได้อย่างอิสระ ทำให้นักพัฒนาหลายคนนำ Source Code ไปพัฒนาและสร้าง Application มากมายขึ้นบนเครือข่าย Ethereum ทำให้ Ethereum ไม่ถูกจำกัดแค่เรื่องธุรกรรมทางการเงินในตลาดคริปโทเคอร์เรนซี่ (Cryptocurrency) เท่านั้น แต่สามารถประยุกต์ใช้กับธุรกิจอื่นๆ ในวงกว้างได้อีก</p>
                                <a href="https://moneyandbanking.co.th/article/the-guru/ethereum-cryptocurrency-mb472-aug2021-230864" target="_blank">
                                    <button class="learn-more">
                                        <span class="circle" aria-hidden="true">
                                            <span class="icon arrow"></span>
                                        </span>
                                        <span class="button-text">อ่านเพิ่มเติม</span>
                                    </button>
                                </a>
                            </div>
                        </div>         
                    </div>
                </div>

    <?php include"footer.php"?>

    <script>
        $(document).ready(function() {
            setTimeout(function(){
                $('body').addClass('loaded');
            }, 1500);
            $('#nav').css("background", "rgba(13, 21, 78, 0.35)");
        });
    </script>
</body>
</html>