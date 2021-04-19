<?php
function toursPrecision($voyage){
    $req = getBdd()->prepare("SELECT * FROM voyages inner JOIN voyages_precision using(idVoyage) where idVoyage = ?");
    $req->execute([$voyage]);
    $tours = $req->fetchALL(PDO::FETCH_ASSOC);
    return $tours;
}