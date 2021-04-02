<?php
require_once "header.php";

$tours = tours();

?>
<div class="container">
  <div class="row">
    <?php
    foreach($tours as $tour){
      ?>
        <div class ="col-6">
          <div class="card text-center" style="width: 30rem;">
            <a href="tours.php?idTour=<?=$tour["idTour"]?>" class="mb-3 lien">
            <img src="<?=$tour["photo"]?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?=$tour["nom"]?></h5>
              <p class="card-text"><?=$tour["description"]?></p>
              <br>
              <ul class="list-inline mb-auto">
                <li class="list-inline-item font-weight-light">Transport : <i class="fas fa-<?=$tour["transport"]?>"></i></li>
                <li class="list-inline-item">   </li>
                <li class="list-inline-item font-weight-light">Prix : <?=$tour["prix"]?>€</li>
                <li class="list-inline-item">   </li>
                <li class="list-inline-item font-weight-light">Durée : <?=$tour["durée"]?> jours <i class="far fa-clock"></i></i></li>
              </ul>
            </div>
          </div>
          </a>
        </div>
    <?php
    }
    ?>
  </div>
</div>