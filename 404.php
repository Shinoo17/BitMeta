<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html,
        body {
            height: 100%;
            min-height: 450px;
            font-family: "Dosis", sans-serif;
            font-size: 32px;
            font-weight: 500;
            color: #5d7399;
            overflow: overlay;
        }

        .content {
            height: 100%;
            position: relative;
            z-index: 1;
            background-color: #d2e1ec;
            background-image: linear-gradient(to bottom, #bbcfe1 0%, #e8f2f6 80%);
            overflow: hidden;
        }

        .snow {
            position: absolute;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 20;
        }

        .main-text {
            padding: 20vh 20px 0 20px;
            text-align: center;
            line-height: 2em;
            font-size: 5vh;
        }

        .home-link {
            font-size: 0.6em;
            font-weight: 400;
            color: inherit;
            text-decoration: none;
            opacity: 0.6;
            border-bottom: 1px dashed rgba(93, 115, 153, 0.5);
        }
        .home-link:hover {
            opacity: 1;
        }

        .ground {
            height: 160px;
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 0;
            background: #f6f9fa;
            box-shadow: 0 0 10px 10px #f6f9fa;
        }
        .ground:before, .ground:after {
            content: "";
            display: block;
            width: 250px;
            height: 250px;
            position: absolute;
            top: -62.5px;
            z-index: -1;
            background: transparent;
            transform: scaleX(0.2) rotate(45deg);
        }
        .ground:after {
            left: 50%;
            margin-left: -166.6666666667px;
            box-shadow: -275px 325px 15px #8193b2, -605px 595px 15px #97a6c0, -860px 940px 15px #94a3be, -1200px 1200px 15px #94a3be, -1495px 1505px 15px #b0bccf, -1825px 1775px 15px #8798b6, -2075px 2125px 15px #8193b2, -2375px 2425px 15px #8496b4, -2675px 2725px 15px #aab6cb, -2975px 3025px 15px #8a9bb8, -3275px 3325px 15px #adb9cd, -3585px 3615px 15px #94a3be, -3925px 3875px 15px #a4b1c8, -4180px 4220px 15px #97a6c0, -4470px 4530px 15px #a4b1c8, -4785px 4815px 15px #8e9eba;
        }
        .ground:before {
            right: 50%;
            margin-right: -166.6666666667px;
            box-shadow: 340px -260px 15px #aab6cb, 620px -580px 15px #9dabc4, 950px -850px 15px #b0bccf, 1235px -1165px 15px #adb9cd, 1530px -1470px 15px #b4bed1, 1765px -1835px 15px #b4bed1, 2105px -2095px 15px #b4bed1, 2395px -2405px 15px #b0bccf, 2720px -2680px 15px #9aa9c2, 3035px -2965px 15px #91a1bc, 3260px -3340px 15px #8193b2, 3575px -3625px 15px #a1aec6, 3910px -3890px 15px #a4b1c8, 4185px -4215px 15px #b0bccf, 4505px -4495px 15px #a1aec6, 4845px -4755px 15px #8798b6;
        }

        .mound {
            margin-top: -80px;
            font-weight: 800;
            font-size: 180px;
            text-align: center;
            color: #dd4040;
            pointer-events: none;
        }
        .mound:before {
            content: "";
            display: block;
            width: 600px;
            height: 200px;
            position: absolute;
            left: 50%;
            margin-left: -300px;
            top: 50px;
            z-index: 1;
            border-radius: 100%;
            background-color: #e8f2f6;
            background-image: linear-gradient(to bottom, #dee8f1, #f6f9fa 60px);
        }
        .mound:after {
            content: "";
            display: block;
            width: 28px;
            height: 6px;
            position: absolute;
            left: 50%;
            margin-left: -150px;
            top: 68px;
            z-index: 2;
            background: #dd4040;
            border-radius: 100%;
            transform: rotate(-15deg);
            box-shadow: -56px 12px 0 1px #dd4040, -126px 6px 0 2px #dd4040, -196px 24px 0 3px #dd4040;
        }

        .mound_text {
            transform: rotate(6deg);
        }

        .mound_spade {
            display: block;
            width: 35px;
            height: 30px;
            position: absolute;
            right: 50%;
            top: 42%;
            margin-right: -250px;
            z-index: 0;
            transform: rotate(35deg);
            background: #dd4040;
        }
        .mound_spade:before, .mound_spade:after {
            content: "";
            display: block;
            position: absolute;
        }
        .mound_spade:before {
            width: 40%;
            height: 30px;
            bottom: 98%;
            left: 50%;
            margin-left: -20%;
            background: #dd4040;
        }
        .mound_spade:after {
            width: 100%;
            height: 30px;
            top: -55px;
            left: 0%;
            box-sizing: border-box;
            border: 10px solid #dd4040;
            border-radius: 4px 4px 20px 20px;
        }
        ::-webkit-scrollbar {
            width: 26px;
            height: 26px;
        }
        ::-webkit-scrollbar-thumb {
            border-radius: 13px;
            background-clip: padding-box;
            border: 10px solid transparent;
            box-shadow: inset 0 0 0 10px;
        }
        ::-webkit-scrollbar-corner {
            background-color: transparent;
        }
    </style>
</head>
<body>
    <div class="content">
        <canvas class="snow" id="snow"></canvas>
        <div class="main-text">
            <h1>Aw jeez.<br/>That page has gone missing.</h1><a class="home-link" href="index.html">Back to home.</a>
        </div>
        <div class="ground">
            <div class="mound"> 
                <div class="mound_text">404</div>
                <div class="mound_spade"></div>
            </div>
        </div>
    </div>
    <script>
        (function() {
            function ready(fn) {
                if (document.readyState != 'loading'){
                    fn();
                } else {
                    document.addEventListener('DOMContentLoaded', fn);
                }
            }
            
            function makeSnow(el) {
                var ctx = el.getContext('2d');
                var width = 0;
                var height = 0;
                var particles = [];
                
                var Particle = function() {
                    this.x = this.y = this.dx = this.dy = 0;
                    this.reset();
                }
                
                Particle.prototype.reset = function() {
                    this.y = Math.random() * height;
                    this.x = Math.random() * width;
                    this.dx = (Math.random() * 1) - 0.5;
                    this.dy = (Math.random() * 0.5) + 0.5;
                }
                
                function createParticles(count) {
                    if (count != particles.length) {
                        particles = [];
                        for (var i = 0; i < count; i++) {
                            particles.push(new Particle());
                        }
                    }
                }
                        
                function onResize() {
                    width = window.innerWidth;
                    height = window.innerHeight;
                    el.width = width;
                    el.height = height;
                    
                    createParticles((width * height) / 10000);
                }
                
                function updateParticles() {
                    ctx.clearRect(0, 0, width, height);
                    ctx.fillStyle = '#f6f9fa';
                    
                    particles.forEach(function(particle) {
                        particle.y += particle.dy;
                        particle.x += particle.dx;
                        
                        if (particle.y > height) {
                            particle.y = 0;
                        }
                        
                        if (particle.x > width) {
                            particle.reset();
                            particle.y = 0;
                        }
                        
                        ctx.beginPath();
                        ctx.arc(particle.x, particle.y, 5, 0, Math.PI * 2, false);
                        ctx.fill();
                    });
                    
                    window.requestAnimationFrame(updateParticles);
                }
                
                onResize();
                updateParticles();
                
                window.addEventListener('resize', onResize);
            }
            
            ready(function() {
                var canvas = document.getElementById('snow');
                makeSnow(canvas);
            });
        })();
    </script>
</body>
</html>