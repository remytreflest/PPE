<?php
require_once "header.php";
require_once "container.php";

$tours = tours();

?>
<div class="row">
  <?php
  foreach($tours as $tour){
    ?>
      <div class ="col-6 mt-3">
        <div class="card text-center" style="width: 30rem;">
          <a href="tours.php?idTour=<?=$tour["idVoyage"]?>" class="mb-3 lien">
          <img src="<?=$tour["photo"]?>" class="card-img-top" style= "height: 300px">
          <div class="card-body">
            <h5 class="card-title"><?=$tour["libelle"]?></h5>
            <p class="card-text"><?=coupePhrase($tour["description"], 200)?></p>
            <br>
            <ul class="list-inline mb-auto">
              <li class="list-inline-item font-weight-light">Transport : <i class="fas fa-<?=$tour["transport"]?>"></i></li>
              <li class="list-inline-item">   </li>
              <li class="list-inline-item font-weight-light">Prix : <?=$tour["prix"]?>€</li>
              <li class="list-inline-item">   </li>
              <li class="list-inline-item font-weight-light">Durée : <?=$tour["durée"]?> jours <i class="far fa-clock"></i></i></li>
            </ul>
            <span style="position: absolute; bottom:5px; right:5px"><?=round($tour["mn"])?> <i class="fas fa-star"></i></span>
          </div>
        </div>
        </a>
      </div>
  <?php
  }
  ?>
</div>

<?php
require_once "footer.php";
?>