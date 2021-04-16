<?php

class Agence extends Modele {

    private $idAgence;
    private $adresse;
    private $codePostal;
    private $region;
    private $villes = [];

    public function __construct($idAgence = null){

        if ( $idAgence != null ){

            $requete = $this->getBdd()->prepare("SELECT * FROM agences WHERE idAgence = ?");
            $requete->execute([$idAgence]);
            $infoAgence = $requete->fetch(PDO::FETCH_ASSOC);

            $this->idAgence = $infoAgence["idAgence"];
            $this->adresse = $infoAgence["adresse"];
            $this->codePostal = $infoAgence["code_postal"];
            $this->region = $infoAgence["region"];

            $requete = $this->getBdd()->prepare("SELECT * FROM villes WHERE idAgence = ?");
            $requete->execute([$idAgence]);
            $infosVilles = $requete->fetchAll(PDO::FETCH_ASSOC);

            foreach ( $infosVilles as $infoVille ){
                $objetVille = new Ville();
                $objetVille->initialiserVille($infoVille["idVille"], $infoVille["libelle"], $infoVille["idAgence"]);
                $this->villes[] = $objetVille;
            }

        }

    }

    public function getIdAgence(){
        return $this->idAgence;
    }

    public function getAdresse(){
        return $this->adresse;
    }

    public function getCodePostal(){
        return $this->codePostal;
    }
    public function getRegion(){
        return $this->region;
    }

    public function getVilles(){
        return $this->villes;
    }

}