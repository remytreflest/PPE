<?php
require_once "../traitements/traitement.php";


if(!empty($_SESSION["idUtilisateur"]) && $_SESSION["role"] == 1){

    $nombre_message_non_lu = sqlMessagesUtilisateur($_SESSION["idUtilisateur"]);

} else if (!empty($_SESSION["idUtilisateur"]) && $_SESSION["role"] == 2){

    $nombre_message_non_lu = sqlMessagesAdmin($_SESSION["role"]);

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://kit.fontawesome.com/f3f16a7b72.js" crossorigin="anonymous"></script>
    <title>Voyage.com</title>
</head>
<body>
    <nav id="nav-bar" class="navbar navbar-light navbar-expand-md">
    <a class="navbar-brand" href="index.php">
        <img src="../src/logos/logo-site.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Voyage
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <div class="navbar-nav d-flex col-12 align-items-center">
            <a class="nav-item nav-link" href="ajouterHotels.php">Ajouter tour</a>
            <a class="nav-item nav-link" href="listeTours.php">Liste des tours</a>
            <span class="ml-auto mr-3"><?php
            if(!empty($_SESSION["idUtilisateur"])){
                ?>
                <ul class="m-0">
                    <li class="dropdown"><button type="button" class="btn btn-sm btn-outline-info dropdown-toggle" data-toggle="dropdown"><?=$_SESSION["prenom"];?> <?=$_SESSION["nom"];?></button>
                        <ul class="dropdown-menu" id="dropdown-nav">
                            <li class="dropdown-item"><a href="#">Profil</a></li>
                            <li class="dropdown-item"><a href="#">Panier</a></li>
                            <li class="dropdown-item"><a href="#">Historique</a></li>
                            <li class="dropdown-item"><a href="#">Favoris</a></li>
                            <li class="dropdown-item"><a href="<?=$_SESSION["role"] == 1 ? 'messagerie.php' : '../admin/messagerieAdmin.php';?>">Messagerie</a><span class="badge <?=(!empty($nombre_message_non_lu["COUNT(idMessage)"]) && $nombre_message_non_lu["COUNT(idMessage)"] > 0) ? 'badge-danger' : 'badge-success';?> align-self-start ml-2"><?=$nombre_message_non_lu["COUNT(idMessage)"];?></span></li>
                        </ul>
                    </li>
                </ul>
                <?php
            }?>
            </span>
            <?=(isset($_SESSION["idUtilisateur"]) && !empty($_SESSION["idUtilisateur"]) ? "" : "<span class='btn-group'><a href='inscription.php' class='btn btn-outline-primary btn-sm align-self-center'>Inscription</a>");?>
            <?=(isset($_SESSION["idUtilisateur"]) && !empty($_SESSION["idUtilisateur"]) ? "<a href='../traitements/deconnexion.php' class='btn btn-outline-danger btn-sm align-self-center '>Déconnection</a>" : "<a href='connexion.php' class='btn btn-outline-success btn-sm align-self-center'>Connection</a></span>");?>
        </ul>
    </div>
    </nav>
