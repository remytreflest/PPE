<?php
function toursPrecision(){
    $req = getBdd()->prepare("SELECT * FROM tours where idTour = ?");
    $req->execute([$_GET["idTour"]]);
    $tours = $req->fetchALL(PDO::FETCH_ASSOC);
    return $tours;
}