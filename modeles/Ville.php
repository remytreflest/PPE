<?php

class Ville extends Modele {

    private $idVille;
    private $libelle;
    private $idAgence;
    private $hotels = [];

    public function __construct($idVille = null){

        if ( $idVille != null ){

            $requete = $this->getBdd()->prepare("SELECT * FROM villes WHERE idVille = ?");
            $requete->execute([$idVille]);
            $infoVille = $requete->fetch(PDO::FETCH_ASSOC);

            $this->idVille = $infoVille["idVille"];
            $this->libelle = $infoVille["libelle"];
            $this->idAgence = $infoVille["idAgence"];

            $requete = $this->getBdd()->prepare("SELECT idVille FROM hotels WHERE idVille = ?");
            $requete->execute([$idVille]);
            $infosHotels = $requete->fetchAll(PDO::FETCH_ASSOC);

            foreach ( $infosHotels as $infoHotel ){
                $objetHotel = new Hotel($infoHotel["idHotel"]);
                $this->hotels[] = $objetHotel;
            }

        }

    }

    public function initialiserVille($idVille, $libelle, $idAgence){

        $this->idVille = $idVille;
        $this->libelle = $libelle;
        $this->idAgence = $idAgence;

        $requete = $this->getBdd()->prepare("SELECT * FROM hotels WHERE idVille = ?");
        $requete->execute([$idVille]);
        $infosHotels = $requete->fetchAll(PDO::FETCH_ASSOC);

        foreach ( $infosHotels as $infoHotel ){
            $objetHotel = new Hotel();
            $objetHotel->initialiserHotel($infoHotel["idHotel"], $infoHotel["libelle"], $infoHotel["description"], $infoHotel["idVille"]);
            $this->hotels[] = $objetHotel;
        }

    }

    public function getIdVille(){
        return $this->idVille;
    }

    public function getLibelle(){
        return $this->libelle;
    }

    public function getIdAgence(){
        return $this->idAgence;
    }

    public function getHotels(){
        return $this->hotels;
    }

}