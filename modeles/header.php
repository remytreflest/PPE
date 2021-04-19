<?php
function famous(){
    $req = getBdd()->prepare("SELECT idVoyage, libelle, count(idAvis), AVG(note) as note FROM avis inner join voyages using(idVoyage) GROUP BY idVoyage ORDER BY COUNT(idAvis) DESC LIMIT 5");
    $req->execute();
    $famous = $req->fetchALL(PDO::FETCH_ASSOC);
    return $famous;
}