<?php
require_once "traitement.php";

if(isset($_SESSION["idUtilisateur"]) && isset($_GET["id"])){

if(!empty($_GET["id"])){

    if(!isset($_SESSION["panier"])){
        // on créer un panier vide
        $_SESSION["panier"] = [];
    }

    $_SESSION["panier"][$_GET["id"]] += 1;
    
}

header("location:../membres/panier.php");

} else {

    header("location:../membres/index.php");

}