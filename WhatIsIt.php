<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card</title>
    <!-- bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- My css -->
    <link rel="stylesheet" href="css/whatIsIt.css">
</head>
<body>
    <?php include"nav-edit.php"?>
    <div class="container" style="margin-top: 20px;">              
        <div class="card-group">           
            <div class="card m-lg-2">
                <div class="card-body bg-dark rounded" >                              
                    <h4 class="card-title text-white text-center">Cryptocurrency คืออะไร</h4><br>
                    <img src="image/WhatIsIt_image/Crypto.png" class="card-img-top">
                    <br><br>
                    <h6 class="card-subtitle mb-2 text-muted text-white">เผยแพร่ 22/10/2021</h6>
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

            <div class="card m-lg-2">
                <div class="card-body bg-dark rounded">                
                    <h4 class="card-title text-white text-center">BitCoin คืออะไร</h4><br>
                    <img src="image/WhatIsIt_image/bitcoin.jpg" class="card-img-top">
                    <br><br>
                    <h6 class="card-subtitle mb-2 text-muted text-white">เผยแพร่ 22/10/2021</h6>
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
                <div class="card-body bg-dark rounded">                
                    <h4 class="card-title text-white text-center">ETH คืออะไร</h4><br>
                    <img src="image/WhatIsIt_image/eth.png" class="card-img-top">
                    <br><br>
                    <h6 class="card-subtitle mb-2 text-muted text-white">เผยแพร่ 22/10/2021</h6>
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
    <div class="container" style="margin-top: 20px;">              
        <div class="card-group">           
            <div class="card m-lg-2">
                <div class="card-body bg-dark rounded">                              
                    <h4 class="card-title text-white text-center">ADA คืออะไร</h4><br>
                    <img src="image/WhatIsIt_image/ada.jpg" class="card-img-top">
                    <br><br>
                    <h6 class="card-subtitle mb-2 text-muted text-white">เผยแพร่ 22/10/2021</h6>
                    <p class="card-text text-white">ADA ถือเป็นเหรียญดิจิทัลที่ได้รับความนิยมและน่าจับตามองอยู่ไม่น้อย โดยหลักการนั้นเป็นไปเช่นเดียวกับ Ether (ETH) เนื่องจากทั้ง ADA และ ETH จะต้องใช้ในการจ่ายค่าธรรมเนียมในการทำธุรกรรมเช่นเดียวกัน ดังนั้น ทุกๆ ธุรกรรมที่ทำบนบล็อกเชน Cardano นักลงทุนก็จำเป็นจะต้องใช้ ADA ในการจ่ายค่าธรรมเนียม ซึ่งนั่นก็ทำให้ความต้องการใช้ ADA มีอยู่ตลอด และด้วยการมีอยู่อย่างจำกัดของเหรียญจึงอาจทำให้ในอนาคตข้างหน้า ADA อาจเป็นเหรียญที่มีมูลค่าสูงมากยิ่งขึ้นก็เป็นไปได้เช่นกัน</p>
                    <a href="https://moneyandbanking.co.th/article/the-guru/cardano-ada-ethereum-cryptocurrency-070964" target="_blank">
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
                <div class="card-body bg-dark rounded">                
                    <h4 class="card-title text-white text-center">AXS คืออะไร</h4><br>
                    <img src="image/WhatIsIt_image/axs.jpg" class="card-img-top">
                    <br><br>
                    <h6 class="card-subtitle mb-2 text-muted text-white">เผยแพร่ 22/10/2021</h6>
                    <p class="card-text text-white">AXS หรือ Axie Infinity (Axie Infinity Shards) เปรียบเสมือนสกุลเงินหลักของเกม Axie Infinity เกมที่สร้างขึ้นบนเครือข่ายบล็อกเชนของ Ethereum ที่มาในคอนเซ็ปท์ “Play to Earn” หรือ “ยิ่งเล่นยิ่งได้” และปัจจุบันกำลังได้รับความนิยมแบบสุด ๆ!</p>
                    <a href="https://www.bitkub.com/blog/what-is-axs-e1c003da5b18" target="_blank">
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
                <div class="card-body bg-dark rounded">  
                    <br><br><br>                                 
                    <h4 class="card-title" style="margin-top:auto ;"> <img src="image/WhatIsIt_image/comingsoon.png" class="card-img-top"></h4>
                    
                </div>
            </div>  
                     
        </div>
    </div>
    <?php include"footer.php"?>
</body>
</html>
