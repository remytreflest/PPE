<?php

class Hotels extends Modele {

    private $idHotel;
    private $libelle;
    private $description;
    private $idAgence;

    public function __construct($idHotel = null){

        if ( $idHotel != null ){

            $requete = $this->getBdd()->prepare("SELECT * FROM hotels WHERE idHotels = ?");
            $requete->execute([$idHotel]);
            $infoHotel = $requete->fetch(PDO::FETCH_ASSOC);

            $this->idHotel = $infoHotel["idHotel"];
            $this->libelle = $infoHotel["libelle"];
            $this->description = $infoHotel["description"];
            $this->idAgence = $infoHotel["idAgence"];

        }

    }

    public function getIdHotel(){
        return $this->idHotel;
    }

    public function getLibelle(){
        return $this->libelle;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getIdAgence(){
        return $this->idAgence;
    }

}