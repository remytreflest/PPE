<?php
function sqlAfficherResultats(){

    $requete = getBdd()->prepare("SELECT * FROM hotels WHERE ville = ? OR pays = ?");
    $requete->execute([$_GET['destination'], $_GET['destination']]);
    $resultats = $requete->fetchALL(PDO::FETCH_ASSOC);

    return $resultats;

}