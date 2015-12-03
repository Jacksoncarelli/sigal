<!DOCTYPE html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGAL</title>
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.png">

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/js/bootstrap.min.js') }}" rel="script">

    <link href="{{ asset('/js/jquery.mask.min.js') }}" rel="script">
    <link href="{{ asset('/js/sigal.js') }}" rel="script">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<style>

    body {
        background-image: url("/assets/img/desenvolvedores/paginadesenv.jpg");
        background-color: black;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }


    /* O container geral define a perspectiva */
    .flip-container { perspective: 1000; }

    /* vira os containers frente e verso quando o mouse passa em cima */
    .flip-container:hover .flipper, .flip-container.hover .flipper {
        transform: rotateY(180deg);
    }
    .flip-container, .front, .back {
        width: 240px;
        height: 360px;
    }

    /* define a velocidade da transi��o */
    .flipper {
        transition: 0.6s;
        transform-style: preserve-3d;
        position: relative;
    }

    /* esconde o verso durante a anima��o */
    .front, .back {
        backface-visibility: hidden;
        position: absolute;
        top: 0;
        left: 0;
    }

    /* frente posicionada sobre o verso */
    .front { z-index: 2;  }

    /* verso inicialmente escondido */
    .back { transform: rotateY(180deg); }


</style>






<div class="flip-container" ontouchstart="this.classList.toggle('hover');" style='position:absolute; top:80px; left:30px;'>
    <div class="flipper">

        <div class="front" >

            <img src="/assets/img/desenv2.jpg">
            <div style="position:absolute; top:200px; left:20px; color: black;font-size: 25px" >
                Jefferson Gouveia
            </div>

        </div>

        <div class="back" align="center">
            <div style='position:relative; top:0px; left:0px;'>
                <img src=/assets/img/desenvback2.jpg border=0>

                <div style='position:absolute; top:60px; left:40px;'>
                    <a href = "https://www.facebook.com/jefferson.gouveia.0?fref=ts"> <img src=/assets/img/icones/face.png style="width: 40px"></a>
                </div>
                <div style='position:absolute; top:60px; left:100px;'>
                    <a href = "#"> <img  src=/assets/img/icones/gmail.png style="width: 40px">
                </div>
                <div style='position:absolute; top:60px; left:160px;'>
                    <a href = "https://br.linkedin.com/pub/jefferson-gouveia/a7/63a/a73"> <img src=/assets/img/icones/liked.png style="width: 40px"><a>
                </div>

            </div>

        </div>

        </div>
    </div>


<div class="flip-container" ontouchstart="this.classList.toggle('hover');" style='position:absolute; top:80px; left:300px;'>
    <div class="flipper">
        <div class="front">

            <img src="/assets/img/desenv1.jpg">
            <div style="position:absolute; top:200px; left:40px; color: black;font-size: 25px" >
                Jackson Carelli
            </div>
        </div>
        <div class="back" align="center">
            <div style='position:relative; top:0px; left:0px;'>
                <img src=/assets/img/desenvback1.jpg border=0>
                <div style='position:absolute; top:60px; left:40px;'>
                    <a href = "https://www.facebook.com/jacksoncarelli"> <img src=/assets/img/icones/face.png style="width: 40px"></a>
                </div>
                <div style='position:absolute; top:60px; left:100px;'>
                    <a href = "jacksoncarelli@gmail.com"> <img  src=/assets/img/icones/gmail.png style="width: 40px"></a>
                </div>
                <div style='position:absolute; top:60px; left:160px;'>
                    <a href = "https://www.linkedin.com/pub/jackson-carelli/104/92/417"> <img src=/assets/img/icones/liked.png style="width: 40px"></a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="flip-container" ontouchstart="this.classList.toggle('hover');" style='position:absolute; top:80px; left:570px;'>
    <div class="flipper">
        <div class="front">

            <img src="/assets/img/desenvolvedores/desenv-front-wallison.jpg">
            <div style="position:absolute; top:200px; left:40px; color: black;font-size: 25px" >
                Wallison Stork
            </div>
        </div>
        <div class="back" align="center">
            <div style='position:relative; top:0px; left:0px;'>
                <img src=/assets/img/desenvolvedores/desenv-back-wallison.jpg border=0>
                <div style='position:absolute; top:60px; left:40px;'>
                    <a href = "https://www.facebook.com/wallisonstorck"> <img src=/assets/img/icones/face.png style="width: 40px"></a>
                </div>
                <div style='position:absolute; top:60px; left:100px;'>
                    <a href = "#"> <img  src=/assets/img/icones/gmail.png style="width: 40px"></a>
                </div>
                <div style='position:absolute; top:60px; left:160px;'>
                    <a href = "https://www.linkedin.com/pub/jackson-carelli/104/92/417"> <img src=/assets/img/icones/liked.png style="width: 40px"></a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="flip-container" ontouchstart="this.classList.toggle('hover');" style='position:absolute; top:80px; left:840px;'>
    <div class="flipper">
        <div class="front">

            <img src="/assets/img/desenvolvedores/desenv-front-paulo.jpg">
            <div style="position:absolute; top:200px; left:40px; color: black;font-size: 25px" >
                Paulo Henrique
            </div>
        </div>
        <div class="back" align="center">
            <div style='position:relative; top:0px; left:0px;'>
                <img src=/assets/img/desenvolvedores/desenv-back-paulo.jpg border=0>
                <div style='position:absolute; top:60px; left:40px;'>
                    <a href = "https://www.facebook.com/paulohenrique.correa.528"> <img src=/assets/img/icones/face.png style="width: 40px"></a>
                </div>
                <div style='position:absolute; top:60px; left:100px;'>
                    <a href = "#"> <img  src=/assets/img/icones/gmail.png style="width: 40px"></a>
                </div>
                <div style='position:absolute; top:60px; left:160px;'>
                    <a href = "https://www.linkedin.com/pub/jackson-carelli/104/92/417"> <img src=/assets/img/icones/liked.png style="width: 40px"></a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="flip-container" ontouchstart="this.classList.toggle('hover');" style='position:absolute; top:80px; left:1110px;'>
    <div class="flipper">
        <div class="front">

            <img src="/assets/img/desenvolvedores/desenv-front-marcelo.jpg">
            <div style="position:absolute; top:200px; left:40px; color: black;font-size: 25px" >
                Marcelo C. Freitas
            </div>
        </div>
        <div class="back" align="center">
            <div style='position:relative; top:0px; left:0px;'>
                <img src=/assets/img/desenvolvedores/desenv-back-marcelo.jpg border=0>
                <div style='position:absolute; top:60px; left:40px;'>
                    <a href = "https://www.facebook.com/marceloo.cfreitas"> <img src=/assets/img/icones/face.png style="width: 40px"></a>
                </div>
                <div style='position:absolute; top:60px; left:100px;'>
                    <a href = "#"> <img  src=/assets/img/icones/gmail.png style="width: 40px"></a>
                </div>
                <div style='position:absolute; top:60px; left:160px;'>
                    <a href = "https://www.linkedin.com/pub/jackson-carelli/104/92/417"> <img src=/assets/img/icones/liked.png style="width: 40px"></a>
                </div>
            </div>
        </div>
    </div>
</div>


<a href="{{ url('home') }}" class="btn btn-voltar btn-lg" style="position:absolute; top:550px; left:50px;" ><span class="glyphicon glyphicon-arrow-left" ></span> Voltar</a>
