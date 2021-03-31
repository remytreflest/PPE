<?php
require_once "header.php";

?>
  <a id="button-to-carte" href="#">Carte des agences</a>
  <div id="map" class="map row pt-3 px-lg-3">
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
    <div id="map__list" class="map__list col-12 col-lg-6 justify-content-lg-center">

    <!-- Il va falloir les différentes agences dans la base de donnée afin de pouvoir charger les agences en question en php-->
                
            <ul id="agences" class="row p-0">
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


<section id="accueil-section-1" class="align-items-center">
    <!-- <div class="container"> -->
        <div class="d-flex justify-content-around align-items-center p-0 m-0 h100">
            <div id="card-text-section-1" class="card col-10 col-md-7 col-lg-4">
                <div class="h1 text-center">Titre section 1</div>
                <div class="">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat, distinctio maiores! Quibusdam, soluta! Maxime facere nam beatae obcaecati soluta aliquid laborum temporibus exercitationem! Porro dolorum possimus beatae, molestias consequuntur cupiditate illum maxime et? Iure sit deserunt, soluta molestias id a vitae quidem ea at fuga inventore optio, rem, alias quisquam.</div>
                <div class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto neque voluptates delectus nemo ut voluptas expedita obcaecati, tempore commodi? Reiciendis, alias dolor quibusdam itaque tempora in sunt atque architecto expedita quas, saepe aliquam distinctio dolore?</div>
            </div>
            <div id="card-image-section-1" class="col-4 d-none d-lg-block">
                <div id="image-1-section-1" class="image-section-1"></div>
                <div id="image-2-section-1" class="image-section-1"></div>
            </div>
        </div>
    <!-- </div> -->
</section>

<section>
  <div class="container">
    <div class="row d-flex justify-content-around">
      <div class="box-shadow card col-12 col-lg-3 my-3 my-lg-0">
        <h1 class="text-center pt-2">LOCAL</h1>
        <hr class="dropdown-divider">
        <p class="justify">Notre engagement est l'assurance de faire marcher l'économie local de chaques lieux que vous visiterez. Les produits mis à votre disposition seront BIO et l'empreinte carbone de votre voyage sera même négative.</p>
      </div>
      <div class="box-shadow card col-12 col-lg-3 my-3 my-lg-0">
        <h1 class="text-center pt-2">PARTAGE</h1>
        <hr class="dropdown-divider">
        <p class="justify">Les voyages que nous proposons sont tous en lien avec des entrepreneurs locaux. Les restaurants et les guides  sont tous nos partenaires et seront ravis de pouvoir partager le bonheur de leur région avec vous.</p>
      </div>
      <div class="box-shadow card col-12 col-lg-3 my-3 my-lg-0">
        <h1 class="text-center pt-2">NATURE</h1>
        <hr class="dropdown-divider">
        <p class="justify">La nature a toujours été un point essentiel de notre offre. Le repos et le calme qu'elle inspire répond aux besoins que nos clients expriment. Ainsi, de nombreuses activités en lien avec la découverte de la flore sont proposées.</p>
      </div>
    </div>
  </div>
</section>

<section id="accueil-section-2" class="">
    <!-- <div class="container"> -->
        <div class="row col-12">
            <div class="col-6 p-0">
              <div id="card-image-section-2">

                <button id="button-modal" type="button" class="" data-toggle="modal" data-target="#exampleModal"><div id="play-button"><div id="play"></div></div></button>

              </div>
            </div>
            <div class="col-6 p-0 d-flex align-items-center">
              <div id="card-text-section-2" class="d-flex justify-content-center align-items-center">
                  <div id="text-section-2" class="">"Le plus beau voyage, c'est celui qu'on n’a pas encore fait"</div>
              </div>
            </div>
        </div>
    <!-- </div> -->
</section>



<!-- Modal de la SECTION 2 -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog d-flex justify-content-center" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Garden</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <video controls width="800">

          <source src="../src/videos/garden.mp4"
                  type="video/mp4">

          Sorry, your browser doesn't support embedded videos.
        </video>
      </div>
    </div>
  </div>
</div>


<!-- SECTION 4 -->
<section>
  <div class="container">
    <div class="row">
      <div id="image-1" class="d-none d-md-flex col-3 image-accueil">
        <div class="image-prix">1800€</div>
      </div>
      <div class="col-12 col-md-6 d-flex flex-column justify-content-between p-0 my-sm-3 my-md-0">
        <div id="image-2" class="image-accueil">
          <div class="image-prix">1500€</div>
        </div>
        <div id="image-3" class="image-accueil">
          <div class="image-prix">2000€</div>
        </div>
      </div>
      <div id="image-4" class="d-none d-md-flex col-3 image-accueil">
        <div class="image-prix">2500€</div>
      </div>
    </div>
  </div>
</section>

<script src="../js/map.js"></script>

<?php
require_once "footer.php";
?>