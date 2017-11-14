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
</div>
<div class="row">
   
    <div class="col s12 m3">
        <div class="noticias card small darken-2 z-depth-2 animated bounceIn">
            <div class="card-image waves-effect waves-block waves-light">
                
                <a href="http://res.cloudinary.com/tuconsultaenlinea/image/upload/v1507687346/yxux8yu4m7r2cxuadhor.jpg" data-lightbox="http://res.cloudinary.com/tuconsultaenlinea/image/upload/v1507687346/yxux8yu4m7r2cxuadhor.jpg" data-title="aja"><img class="responsive-img" src="http://res.cloudinary.com/tuconsultaenlinea/image/upload/v1507687346/yxux8yu4m7r2cxuadhor.jpg"></a>
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">ajajajaja<i class="red-text fa fa-search-plus right"></i></span>
                <p class="fa fa-calendar"> 13/11/2017</p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><i class="red-text fa fa-times right"></i></span>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
        </div>
    </div>

    <div class="col s12 m3">
        <div class="noticias card small darken-2 z-depth-2 animated bounceIn">
            <div class="card-image waves-effect waves-block waves-light">
                
                <a href="http://res.cloudinary.com/tuconsultaenlinea/image/upload/v1507687346/yxux8yu4m7r2cxuadhor.jpg" data-lightbox="http://res.cloudinary.com/tuconsultaenlinea/image/upload/v1507687346/yxux8yu4m7r2cxuadhor.jpg" data-title="aja"><img class="responsive-img" src="http://res.cloudinary.com/tuconsultaenlinea/image/upload/v1507687346/yxux8yu4m7r2cxuadhor.jpg"></a>
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">ajajajaja<i class="red-text fa fa-search-plus right"></i></span>
                <p class="fa fa-calendar"> 13/11/2017</p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><i class="red-text fa fa-times right"></i></span>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
        </div>
    </div>

</div>