<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link href="https://fonts.googleapis.com/css?family=Lobster|Vollkorn+SC" rel="stylesheet"> 
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/animate.css/animate.min.css">
        <link rel="stylesheet" href="<?php echo baseUrl ?>assets/bower/sweetalert2/dist/sweetalert2.min.css">
        <script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="<?php echo baseUrl ?>assets/bower/sweetalert2/dist/sweetalert2.min.js"></script>
 <link href="<?php echo baseUrl ?>assets/bower/lightbox2/dist/css/lightbox.min.css" rel="stylesheet">
<script src="<?php echo baseUrl ?>assets/bower/lightbox2/dist/js/lightbox.min.js"></script>
<style>
.indicators
{
display: none;
}
.cards-container {
column-break-inside: avoid;
}
.cards-container .card {
display: inline-block;
overflow: visible;
}
@media only screen and (max-width: 600px) {
.cards-container {
-webkit-column-count: 1;
-moz-column-count: 1;
column-count: 1;
}
}
@media only screen and (min-width: 601px) {
.cards-container {
-webkit-column-count: 2;
-moz-column-count: 2;
column-count: 2;
}
}
@media only screen and (min-width: 993px) {
.cards-container {
-webkit-column-count: 3;
-moz-column-count: 3;
column-count: 3;
}
}
.text-center {
text-align: center;
}
</style>
        <style>
        html {
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        }
        </style>
        <style>
        /* Preloader */
        #preloader {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #fff;
        /* change if the mask should have another color then white */
        z-index: 99;
        /* makes sure it stays on top */
        }
        #status {
        width: 200px;
        height: 200px;
        position: absolute;
        left: 50%;
        top: 50%;
        background-position: center;
        margin: -100px 0 0 -100px;
        /* is width and height divided by two */
        }

        .titulo
        {
            font-family: 'Vollkorn SC', serif;
            font-family: 'Lobster', cursive;
            font-size: 4em;
        }
        </style>
    </head>
    <body>
        <nav class="z-depth-2">
            <div class="nav-wrapper red darken-2 z-depth-2">
                <img style="margin-top: -10px; box-shadow: 0px 0px 4px #444;" width="80px;" src="<?php echo baseUrl ?>assets/img/gobarinas.png" alt="">
                <a href="#" class="brand-logo titulo">DISBASA</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="<?php echo baseUrl ?>home/principal"><i class="fa fa-home"></i> Inicio</a></li>
                    <li><a href="<?php echo baseUrl ?>home/principal/solicitud"><i class="fa fa-question-circle"></i> Quienes Somos</a></li>
                    <li><a href="<?php echo baseUrl ?>home/principal/solicitud"><i class="fa fa-object-group"></i> Mision</a></li>
                    <li><a href="<?php echo baseUrl ?>home/principal/solicitud"><i class="fa fa-eye"></i> Vision</a></li>
                    <li><a href="<?php echo baseUrl ?>auth/login"><i class="fa fa-sign-in" aria-hidden="true"></i>
                    Login</a></li>
                </ul>
            </div>
        </nav>

<div class="slider" style="margin-top: -6px;">
    <ul class="slides z-depth-3">
        <li>
            <img src="http://www.gobarinas.gob.ve/cadip/bannerparagobarinas/BANNER-_3-gobarinas-_c.gif"> 
        </li>
        <li>
            <img src="http://www.gobarinas.gob.ve/cadip/bannerparagobarinas/BANNER-_1-gobarinas-_a.gif"> 
        </li>
        <li>
            <img src="http://www.gobarinas.gob.ve/cadip/bannerparagobarinas/BANNER-_2-gobarinas-_b.gif"> <!-- random image -->
        </li>   
    </ul>
             <nav class="z-depth-2">
            <div class="nav-wrapper grey darken-4">
 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem laudantium, expedita, quidem assumenda ducimus cumque, atque fugiat, eum ut in numquam mollitia est. Eveniet fugit debitis ad vel, voluptate modi.
            </div>
        </nav>
</div>
<br><br>

        <!--<img class="z-depth-2" width="100%" height="150px;" src="<?php echo baseUrl ?>assets/img/banner.jpg" alt=""> -->
        <!-- jQuery -->
        <?php echo $content ?>
        <!-- Preloader -->
        <div id="preloader">
            <div id="status">
                <div class="preloader-wrapper active">
                    <div class="spinner-layer spinner-red-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /container -->
<!-- MENSAJES FLASH SWEET ALERT 2 -->
<?php if (Message::hasMessages()): ?>
<?php echo Message::show() ?>
<?php endif ?>
</body>
</html>
<!-- Navbar
================================================== -->
<script>
</script>
<script>
$(window).on('load', function() { // makes sure the whole site is loaded
$('#status').fadeOut(); // will first fade out the loading animation
$('#preloader').delay(200).fadeOut('slow'); // will fade out the white DIV that covers the website.
$('body').delay(200).css({'overflow':'visible'});
$(document).ready(function(){
$('.slider').slider();
});
$(document).ready(function() {
$('select').material_select();
});
$('.noticias').addClass('animated bounceIn');
})
</script>
</body>
</html>