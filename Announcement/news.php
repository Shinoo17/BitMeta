<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/newstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
</head>
<body>
<?php include 'nav.php';?>
<div class="container"> 
    <br>
    <div class="card">
   <table class="table table-striped">     
    <?php           
        $conn=new PDO("mysql:host=localhost;dbname=bitmeta;charset=utf8","root","");               
        
           $sql1="SELECT News_ID,Topic,Date FROM news as t1 ORDER BY t1.Date DESC";
        
        $result=$conn->query($sql1);
            while($row=$result -> fetch()){
                echo "<tr><td>"."Topic : <b><u>"."<a href=content.php?id=".$row['0'].">".$row['1']."</a>";
                echo "</u></b><br>At : <b>".$row['2']."</td></tr>";
            }
        $conn=null;                         
   ?> 
    </table> 
    </div>
    <br><br>
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
</body>
</html>