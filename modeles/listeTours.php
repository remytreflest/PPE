<?php
function tours(){
    $req = getBdd()->prepare("SELECT * FROM voyages");
    $req->execute();
    $tours = $req->fetchALL(PDO::FETCH_ASSOC);
    return $tours;
}