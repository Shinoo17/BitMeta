// Scroll mouse
var swiper_img = document.getElementsByClassName('swiper-img-move');
window.addEventListener('scroll', function() {
    var imgMargin = window.pageYOffset/1.1 || 0
    for(var i=0; i<swiper_img.length; i++){
        swiper_img[i].style.marginTop = imgMargin + 'px';	// set swiper img marginTop
    }

});

let current_index;
let coin_name;
let symbol;
let index;
let priceChange;
function swiperPlugin({ swiper, extendParams, on }) {
    extendParams({
        debugger: false,
    });

    on('init', () => {
        if (!swiper.params.debugger) return;
        console.log('init');
        fetch("https://api.binance.com/api/v3/ticker/24hr")
        .then(function (response){
            return response.json()
        })
        .then(function(data){
            document.getElementById("show-price-text").innerHTML = parseFloat(data[11]['lastPrice']).toFixed(2);
            document.getElementById("priceChange").innerHTML = parseFloat(data[11]['priceChange']).toFixed(2) + " $";
            document.getElementById("percentChange").innerHTML = parseFloat(data[11]['priceChangePercent']).toFixed(2) + " %";
            setColorByPriceChange(data[index]['priceChange']);
            // remove FadeIn Animation
            let element1 = document.getElementById("show-price");
            let element2 = document.getElementById("show-detail");
            setTimeout(function(){
                element1.classList.remove("FadeIn");
                element2.classList.remove("FadeIn");
            },500);
        });
    });
    on('click', (swiper, e) => {
        if (!swiper.params.debugger) return;
        console.log('click');
    });
    on('tap', (swiper, e) => {
        if (!swiper.params.debugger) return;
        console.log('tap');
    });
    on('doubleTap', (swiper, e) => {
        if (!swiper.params.debugger) return;
        console.log('doubleTap');
    });
    on('sliderMove', (swiper, e) => {
        if (!swiper.params.debugger) return;
        console.log('sliderMove');
    });
    on('slideChange', () => {
        if (!swiper.params.debugger) return;
        console.log(
        'slideChange',
        swiper.previousIndex,
        '->',
        swiper.activeIndex
        );
        current_index = swiper.activeIndex;
        fetch("https://api.binance.com/api/v3/ticker/24hr")
        .then(function (response){
            return response.json()
        })
        .then(function (data){
            switch(current_index){
                case 0: index = 1148; coin_name = "Axie Infinity"; symbol = "AXS"; break;	// page 1 -> 5
                case 1: index = 11; coin_name = "Bitcoin"; symbol = "BTC"; break;
                case 2: index = 12; coin_name = "Ethereum"; symbol = "ETH"; break;
                case 3: index = 98; coin_name = "Binance Coin"; symbol = "BNB"; break;
                case 4: index = 298; coin_name = "Cardano"; symbol = "ADA"; break;
                case 5: index = 1148; coin_name = "Axie Infinity"; symbol = "AXS"; break;
                case 6: index = 11; coin_name = "Bitcoin"; symbol = "BTC"; break;	// page 5 -> 1
                default: coin_name = "out of data"; break;
            }
            document.getElementById("show-price-text").innerHTML = parseFloat(data[index]['lastPrice']).toFixed(2);
            document.getElementById("priceChange").innerHTML = parseFloat(data[index]['priceChange']).toFixed(2) + " $";
            document.getElementById("percentChange").innerHTML = parseFloat(data[index]['priceChangePercent']).toFixed(2) + " %";
            document.getElementById("show-detail-name").innerHTML = coin_name;
            document.getElementById("show-symbol-text").innerHTML = "(" + symbol + ")";
            document.getElementById("icon").src = "image/symbol/" + symbol + ".png";
            setColorByPriceChange(data[index]['priceChange']);
            // FadeIn Animation
            var element1 = document.getElementById("show-price");
            var element2 = document.getElementById("show-detail");
            element1.classList.add("FadeIn");
            element2.classList.add("FadeIn");
            setTimeout(function(){
                element1.classList.remove("FadeIn");
                element2.classList.remove("FadeIn");
            },500);
        });
    });
    on('slideChangeTransitionStart', () => {
        if (!swiper.params.debugger) return;
        console.log('slideChangeTransitionStart');
    });
    on('slideChangeTransitionEnd', () => {
        if (!swiper.params.debugger) return;
        console.log('slideChangeTransitionEnd');
    });
    on('transitionStart', () => {
        if (!swiper.params.debugger) return;
        console.log('transitionStart');
    });
    on('transitionEnd', () => {
        if (!swiper.params.debugger) return;
        console.log('transitionEnd');
    });
    on('fromEdge', () => {
        if (!swiper.params.debugger) return;
        console.log('fromEdge');
    });
    on('reachBeginning', () => {
        if (!swiper.params.debugger) return;
        console.log('reachBeginning');
    });
    on('reachEnd', () => {
        if (!swiper.params.debugger) return;
        console.log('reachEnd');
    });
}

function setColorByPriceChange(price){
    if(price>=0){
        document.getElementById("priceChange").style.color = "#55d538";
        document.getElementById("percentChange").style.color = "#55d538";
    } else {
        document.getElementById("priceChange").style.color = "#ee3b3b";
        document.getElementById("percentChange").style.color = "#ee3b3b";
    }
}