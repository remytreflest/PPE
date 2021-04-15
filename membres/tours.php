<?php
require_once "header.php";

$tours = toursPrecision();

foreach($tours as $tour){
    ?>
    <h1 class="mb-5 mt-5" style="font-family: Oswald, Sans-serif"><b><?=$tour["nom"]?></b></h1>
    <img src="<?=$tour["photo"]?>" class="img-fluid mr-3" style="max-width: 400px; float:left;">
    <h4><?=$tour["nom"]?></h4>
    <p style="font-family: Oswald, Sans-serif">À seulement <?=$tour["prix"]?>€</p>
    <p style="font-family: Oswald, Sans-serif; color: grey"><?=$tour["precision"]?></p>
    <p>En <i class="fas fa-<?=$tour["transport"]?>"></i></p>
    <p>Pour <?=$tour["durée"]?> jours</p>

    <?php
}
?>
<div style="height: 150px"></div>
<nav class="d-flex justify-content-center mb-5">
    <div class="nav" id="nav-tab" role="tablist">
    <button class="link test btn mr-5 lien t" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Information</button>
    <button class="link test btn mr-5 lien t" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Plan du tour</button>
    <button class="link test btn lien t" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Images</button>
    </div>
</nav>
<div class="tab-content d-flex justify-content-center" id="nav-tabContent">
    <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-information">
        Diverses informations sur les différentes villes, paysages, monuments,... présent pendant le tour.
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-plan">
        Plan de toute les villes,ect... visités lors de ce tour.
    </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-image">
        <div style="float:left; width:1300px">
            <img src="https://photos.mandarinoriental.com/is/image/MandarinOriental/paris-2017-home?wid=2880&hei=1280&fmt=jpeg&crop=9,336,2699,1200&anchor=1358,936&qlt=75,0&fit=wrap&op_sharpen=0&resMode=sharp2&op_usm=0,0,0,0&iccEmbed=0&printRes=72" class="mx-2 my-2 img-fluid" style="width:400px; height:250px">
            <img src="https://www.paris.fr/images/meta/parisfr.jpg" class="mx-2 my-2 img-fluid" style="width:400px; height:250px">
            <img src="https://cdn.futura-sciences.com/buildsv6/images/largeoriginal/4/d/1/4d14649102_50162240_drone-paris-confinement.jpg" class="mx-2 my-2 img-fluid" style="width:400px; height:250px">
            <img src="https://stillmedab.olympic.org/media/Images/OlympicOrg/News/2021/03/11/2020-03-11-Session-ParisBeijing-thumbnail.jpg" class="mx-2 my-2 img-fluid" style="width:400px; height:250px">
            <img src="https://stillmed.olympic.org/media/Images/OlympicOrg/News/2019/11/27/2019-11-27-paris-thumbnail.jpg" class="mx-2 my-2 img-fluid" style="width:400px; height:250px">
            <img src="https://img.20mn.fr/WCzS-Dp2QwuyLMMs5tuiwA/310x190_manifestation-gilets-jaunes-16-mars-2019-paris.jpg" class="mx-2 my-2 img-fluid" style="width:400px; height:250px">
        </div>
    </div>
</div>