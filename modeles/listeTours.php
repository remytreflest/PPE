<?php
function tours(){
    $req = getBdd()->prepare("SELECT *, AVG(note) as mn FROM voyages inner JOIN voyages_precision using(idVoyage) inner JOIN avis using(idVoyage) group by libelle");
    $req->execute();
    $tours = $req->fetchALL(PDO::FETCH_ASSOC);
    return $tours;
}

function coupePhrase($txt, $long = 120){
    if(strlen($txt) <= $long)
     return $txt;
    $txt = substr($txt, 0, $long);
    return substr($txt, 0, strrpos($txt, ' ')).'...';
}