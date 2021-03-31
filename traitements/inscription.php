<?php
require_once "traitement.php";

if (
    isset($_POST["submit"]) && !empty($_POST["submit"] && $_POST["submit"] === "ON")
) {

    $erreurs = [];

    if(
        isset($_POST["email"]) && !empty($_POST["email"]) &&
        isset($_POST["mdp"]) && !empty($_POST["mdp"]) &&
        isset($_POST["mdpVerif"]) && !empty($_POST["mdpVerif"]) &&
        isset($_POST["nom"]) && !empty($_POST["nom"]) &&
        isset($_POST["prenom"]) && !empty($_POST["prenom"]) &&
        isset($_POST["age"]) && !empty($_POST["age"])
    ){

        // tous les champs sont là

        // Vérification de la validité de l'email
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $erreurs[] = "err0=invalid";
        }

        // Vérification que l'email est unique
        $requete = sqlEmailExiste($_POST["email"]);

        if(!empty($requete)){
            $erreurs[] = "err1=exist";
        }

        // Vérification que le mot de passe fait au moins 8 caractères
        if(strlen($_POST["mdp"]) < 8){
            $erreurs[] = "err2=len";
        }

        // Vérification que les deux mots de passe correspondent
        if($_POST["mdp"] !== $_POST["mdpVerif"]){
            $erreurs[] = "err3=different";
        }

        // Vérification de l'âge entre 1 et 119 ans
        $_POST["age"] = intval($_POST["age"]);
        if($_POST["age"] > 120 || $_POST["age"] < 1){
            $erreurs[] = "err4=age";
        }

    } else {
        // il manque au moins un champ
        $erreurs[] = "err5=empty";

    }

    if(count($erreurs) === 0) {
        // on envoie le formulaire
        // transfort nos values du formulaire en variable avec le nom des inputs
        extract($_POST);

        try {
            // On hash le mot de passe
            $mdp = password_hash($mdp, PASSWORD_BCRYPT);

            sqlCreerUtilisateur($email, $mdp, $nom, $prenom, $age);

            $href = "../membres/inscription.php?success=yes";

        } catch(Exception $e){
            $erreurs[] = "err6=unknown";
        }


    }

    // en fonction des erreurs, je reconstruis une url avec les erreurs correspondante pour l'affichage des erreurs sur la page membres/inscription.php
    if(count($erreurs) > 0){
        $href = "../membres/inscription.php?err=yes&";
        foreach($erreurs as $erreur){
            $href .= $erreur . "&";
        }
        $href = substr($href, 0, -1);
    }

    header("location:" . $href);

}