<?php
require_once "header.php";
require_once "container.php";

// Comme la gestion des erreurs se fait dans traitements/inscription.php, je transferts les erreurs via get et je les ai répertoriées dans un tableau ou je me sert d'une boucle for pour afficher les bonnes erreurs correspondante
$messagesErreurs = ["L'adresse email saisie n'est pas valide", "L'adresse email saisie existe déjà", "Le mot de passe doit faire au moins 8 caractères", "Les deux mots de passe ne sont pas identiques", "L'âge doit être compris entre 0 et 120 ans", "Au moins un champ n'a pas été saisi", "Une erreur s'est produite, l'inscription n'a pas pu être validée"];

if(!empty($_GET["err"])){
    for($i = 0; $i < count($messagesErreurs); $i++){
        if(isset($_GET["err" . $i])){
            $erreurs[] = $messagesErreurs[$i];
        }
    }
    ?>
    <div class="alert alert-warning">
    <?php
    foreach($erreurs as $erreur){
        echo $erreur . "</br>";
    }
    ?>
    </div>
    <?php
}

if(!empty($_GET["success"])){
    ?>
    <div class="alert alert-success">Inscription réussi.</div>
    <?php
}

?>

    <h1>Formulaire d'inscription : </h1>
    <form method="POST" action="../traitements/inscription.php">
    
        <div class="form-group">
                <label for="email">Email : </label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Entrez votre Email" value="<?=(isset($_POST['email']) ? $_POST['email'] : "")?>" required>
        </div>
    
        <div class="form-group">
                <label for="mdp">Mot de passe : </label>
                <input type="password" class="form-control" name="mdp" id="mpd" placeholder="Entrez votre mot de passe" value="<?=(isset($_POST['mdp']) ? $_POST['mdp'] : "")?>" required>
        </div>
    
        <div class="form-group">
                <label for="mdpVerif">Vérification du mot de passe : </label>
                <input type="password" class="form-control" name="mdpVerif" id="mdpVerif" placeholder="Vérifier votre mot de passe" value="<?=(isset($_POST['mdpVerif']) ? $_POST['mdpVerif'] : "")?>" required>
        </div>
    
        <div class="form-group">
                <label for="nom">Nom : </label>
                <input type="text" class="form-control" name="nom" id="nom" placeholder="Votre nom" value="<?=(isset($_POST['nom']) ? $_POST['nom'] : "")?>" required>
        </div>
    
        <div class="form-group">
                <label for="prenom">Prénom : </label>
                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Votre prénom" value="<?=(isset($_POST['prenom']) ? $_POST['prenom'] : "")?>" required>
        </div>
    
        <div class="form-group">
                <label for="age">Âge : </label>
                <input type="number" class="form-control" name="age" id="age" placeholder="Votre âge" min="0" max="120" value="<?=(isset($_POST['age']) ? $_POST['age'] : "")?>" required>
        </div>
    
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary" name="submit" value="ON">Inscription</button>
        </div>
    
    </form>





<?php
require_once "footer.php";
?>