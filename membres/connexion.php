<?php
require_once "header.php";

?>
    <h1>Formulaire de connexion</h1>
    <form method="POST" action="../traitements/connexion.php">
    
        <div class="form-group">
                <label for="email">Email : </label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Entrez votre Email" value="<?=(isset($_POST['email']) ? $_POST['email'] : "")?>" >
        </div>
    
        <div class="form-group">
                <label for="mdp">Mot de passe : </label>
                <input type="password" class="form-control" name="mdp" id="mpd" placeholder="Entrez votre mot de passe" value="<?=(isset($_POST['mdp']) ? $_POST['mdp'] : "")?>" >
        </div>
    
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary" name="submit" value="ON">Connexion</button>
        </div>
    
    </form>


<?php
require_once "footer.php";
?>