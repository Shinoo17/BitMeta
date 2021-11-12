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
        <nav class="navbar navbar-expand navbar-dark nav-overtop">
            <div class="container">
                <a class="navbar-brand" href=""><i class="bi bi-house-door-fill"></i>Home</a>
                <a class="navbar-link" href="market.php"><i class="bi bi-currency-exchange"></i>Market</a>
                <a class="navbar-link" href="news.php"><i class="bi bi-file-earmark-text"></i>Announcement</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php"><i class="bi bi-pencil-square"></i> เข้าสู่ระบบ</a>
                    </li>
                </ul>
            </div>
        </nav>
        
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

	<br><br><br><br><br>
    <!-- TradingView Mini Chart -->
    <div class="container">
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
                        "largeChartUrl": "http://127.0.0.1:5500/Bit_META/market.html"
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
                        "largeChartUrl": "http://127.0.0.1:5500/Bit_META/market.html"
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
                        "largeChartUrl": "http://127.0.0.1:5500/Bit_META/market.html"
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
                            "largeChartUrl": "http://127.0.0.1:5500/Bit_META/market.html"
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
        </div>
    </div>

    <footer style="margin-top: 100px; margin-bottom: 100px;">
        <div class="container">
            <div class="row justify-content-center">
                BitMeta
            </div>
        </div>
    </footer>

    <script>
        $(document).ready(function() {
            setTimeout(function(){
                $('body').addClass('loaded');
            }, 1500);
        });
    </script>
</body>
</html>