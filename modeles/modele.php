<?php

function getBdd() {
    return new PDO('mysql:host=localhost;dbname=voyage;charset=UTF8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

require_once "../modeles/messages.php";
require_once "../modeles/hotels.php";
require_once "../modeles/utilisateurs.php";
require_once "../modeles/afficherResultat.php";
require_once "../modeles/tours.php";

?>