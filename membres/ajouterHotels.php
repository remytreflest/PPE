<?php
require_once "header.php";
require_once "container.php";
?>

<h1 class="mt-3">Ajouter un hôtel :</h1>

<form action="traitements/ajoutHotel.php" method="post">
    <div class="form-group">
        <label for="nom"></label>
        <input class="form-control" type="text" name="nom" id="nom" placeholder="Nom de l'hôtel">
    </div>

    <div class="form-group">
        <label for="adresse"></label>
        <input class="form-control" type="text" name="adresse" id="adresse" placeholder="Adresse de l'hôtel">
    </div>

    <div class="form-group">
        <label for="ville"></label>
        <input class="form-control" type="text" name="ville" id="ville" placeholder="Ville où se trouve l'hôtel">
    </div>

    <div class="form-group">
        <label for="pays"></label>
        <input class="form-control" type="text" name="nopaysm" id="pays" placeholder="Pays où se trouve l'hôtel">
    </div>

    <div class="form-group">
        <label for="description"></label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Description de l'hôtel"></textarea>
    </div>

    <div class="form-group">
        <label for="photo"></label>
        <input class="form-control" type="text" name="photo" id="photo" placeholder="Lien de la photo">
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary" name="submit" value="ON">Valider</button>
    </div>
</form>

<?php
require_once "footer.php";
?>