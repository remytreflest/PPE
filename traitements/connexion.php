<?php
require_once "traitement.php";

    if(!empty($_POST["submit"])){
        
        extract($_POST);
        $erreurs = [];


        // si l'un des champs est vide 
        if(
            !isset($email) || empty($email) ||
            !isset($mdp) || empty($mdp)
        ){
            $erreurs[] = "L'un des champs est vide";
        }

        // Vérification de la validité de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erreurs[] = "L'adresse email saisie n'est pas valide";
        }

        // Si on a pas d'erreur à ce stade, on va faire les vérifications dans la BDD
        if(count($erreurs) == 0){
            $requete = getBdd()->prepare("SELECT * FROM utilisateurs WHERE email = ?");
            $requete->execute([$email]);
            
            // Vérification si l'email n'existe pas en regardant le nombre de lignes retournées par la requête
            if($requete->rowCount() > 0){
                // L'email existe
                $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);
                
                // Vérifier si les mots de passe correspondentne correspondent pas
                if(!password_verify($mdp, $utilisateur["mdp"])){
                    //Le mot de passe ne correspond pas
                    $erreurs[] = "Le mot de passe saisi est incorrect";
                }

            } else {
                // L'email n'existe pas
                $erreurs[] = "L'adresse email n'existe pas";
            }
        }


        // Si après les vérifications dans la BDD je n'ai toujours pas d'erreurs
        if(count($erreurs) == 0){

            // on connecte l'utilisateur
            $_SESSION["idUtilisateur"] = $utilisateur["idUtilisateur"];
            $_SESSION["nom"] = $utilisateur["nom"];
            $_SESSION["prenom"] = $utilisateur["prenom"];
            $_SESSION["role"] = $utilisateur["idRole"];

            header("location:../index.php");

        }

    }