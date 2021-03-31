<?php
require_once "header.php";
?>
<div id="map" class="map row">
    <div id="map__image" class="map__image col-12 col-lg-6 d-flex justify-content-center">

        <svg class="col-6 col-lg-12" xmlns="http://www.w3.org/2000/svg" xmlns:amcharts="http://amcharts.com/ammap" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 625 600">
            <defs>
                <style type="text/css">
                    .land
                    {
                        fill: #CCCCCC;
                        fill-opacity: 1;
                        stroke:white;
                        stroke-opacity: 1;
                        stroke-width:0.5;
                    }
                </style>

                <amcharts:ammap projection="mercator" leftLongitude="-4.778054" topLatitude="51.089278" rightLongitude="9.560176" bottomLatitude="41.363005"></amcharts:ammap>

                <!-- All areas are listed in the line below. You can use this list in your script. -->
                <!--{id:"FR-A"},{id:"FR-NAQ"},{id:"FR-ARA"},{id:"FR-BFC"},{id:"FR-BRE"},{id:"FR-CVL"},{id:"FR-COR"},{id:"FR-IDF"},{id:"FR-OCC"},{id:"FR-HDF"},{id:"FR-NOR"},{id:"FR-PDL"},{id:"FR-PAC"}-->

            </defs>
                <path class="absent" title="Grand Est" d="<?=file_get_contents("../regionCarte/grand-Est.txt");?>"/>
                <a id="region-B" xlink:title="Nouvelle-Aquitaine"  xlink:href="#"><path class="present" d="<?=file_get_contents("../regionCarte/nouvelle-Aquitaine.txt");?>"/></a>
                <path class="absent" title="Auvergne-Rhône-Alpes" d="<?=file_get_contents("../regionCarte/auvergne-Rhone-Alpes.txt");?>"/>
                <path class="absent" title="Bourgogne-Franche-Comté" d="<?=file_get_contents("../regionCarte/bourgogne-Franche-Comte.txt");?>"/>
                <a id="region-E" xlink:title="Bretagne"  xlink:href="#"><path class="present" d="<?=file_get_contents("../regionCarte/bretagne.txt");?>"/></a>
                <a id="region-F" xlink:title="Centre-Val de Loire"  xlink:href="#"><path class="present" d="<?=file_get_contents("../regionCarte/centre-Val-De-Loire.txt");?>"/></a>
                <path class="absent" title="Corse" d="<?=file_get_contents("../regionCarte/corse.txt");?>"/>
                <path class="absent" title="Île-de-France" d="<?=file_get_contents("../regionCarte/ile-De-France.txt");?>"/>
                <path class="absent" title="Occitanie" d="<?=file_get_contents("../regionCarte/occitanie.txt");?>"/>
                <path class="absent" title="Hauts-de-France" d="<?=file_get_contents("../regionCarte/hauts-De-France.txt");?>"/>
                <a id="region-K" xlink:title="Normandie"  xlink:href="#"><path class="present" d="<?=file_get_contents("../regionCarte/normandie.txt");?>"/></a>
                <path class="absent" title="Pays de la Loire" d="<?=file_get_contents("../regionCarte/pays-De-La-Loire.txt");?>"/>
                <path class="absent" title="Provence-Alpes-Côte d'Azur" d="<?=file_get_contents("../regionCarte/provence-Alpes-Cote-D-Azur.txt");?>"/>
        </svg>

    </div>
    <a id="button-to-carte" href="#">cliquez pour voir</a>
    <div id="map__list" class="map__list col-12 col-lg-6 justify-content-lg-center">

    <!-- Il va falloir les différentes agences dans la base de donnée afin de pouvoir charger les agences en question en php-->
                
            <ul id="agences" class="row">
                <li>
                    <div class="card-agence">
                        <a href="#" id="list-B" class="">Nouvelle Aquitaine : </a>
                        <div>Agence de voyage<br>28 rue des moustifier <br>54120 blequant<br>01.02.03.04.05</div>
                    </div>
                </li>
                <li>
                    <div class="card-agence ">
                        <a href="#" id="list-E" class="">Bretagne : </a>
                        <div>Agence de voyage<br>28 rue des moustifier <br>54120 blequant<br>01.02.03.04.05</div>
                    </div>
                </li>
                <li>
                    <div class="card-agence ">
                        <a href="#" id="list-F" class="">Centre Val de Loire : </a>
                        <div>Agence de voyage<br>28 rue des moustifier <br>54120 blequant<br>01.02.03.04.05</div>
                    </div>
                </li>
                <li>
                    <div class="card-agence ">
                        <a href="#" id="list-K" class="">Normandie : </a>
                        <div>Agence de voyage<br>28 rue des moustifier <br>54120 blequant<br>01.02.03.04.05</div>
                    </div>
                </li>
            </ul>

    </div>
</div>

<script src="../js/map.js"></script>

<?php
require_once "footer.php";