<?php
function tours(){
    $req = getBdd()->prepare("SELECT * FROM tours");
    $req->execute();
    $tours = $req->fetchALL(PDO::FETCH_ASSOC);
    return $tours;
}