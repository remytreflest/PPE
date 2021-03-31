<?php
require_once "header.php";

if(isset($_GET['destination']) && !empty($_GET['destination'])){

    sqlAfficherResultats();

    if(count($resultats) < 1){
        ?>
        <div class="alert alert-danger">Nous n'avons pas trouvé de résultat à votre recherche. Vous allez être redirigé vers l'accueil dans 5 secondes.</div>
        <?php
        header("refresh:5;index.php");
    }
    
} else {
    ?>
        <div class="alert alert-warning">Il semblerait que votre champ de recherche était vide. Vous allez être redirigé vers l'accueil dans 5 secondes.</div>
        <?php
        header("refresh:5;index.php");
}
?>


<?php
foreach($resultats as $resultat){

?>
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-5 col-lg-4 d-flex">
      <img src="<?=$resultat["photo1"];?>" alt="..." class="img-fluid">
    </div>
    <div class="col-md-7 col-lg-8">
      <div class="card-body">
        <h3 class="card-title"><?=$resultat["nom"];?></h3>
        <p class="card-text"><?=$resultat["description"];?></p>
        <p class="card-text"><small class="text-muted">Last updated <?=rand(1,59);?> mins ago</small></p>
      </div>
    </div>
  </div>
</div>
<?php
}
?>



<?php
require_once "footer.php";
?>