<?php

class Administrateur extends Utilisateur {

    private $bannissements = [];
    private $messages = [];

    public function __construct($idUtilisateur = null){

        parent::__construct($idUtilisateur);

        if ( $idUtilisateur != null ){

            $requete = $this->getBdd()->prepare("SELECT idMessage FROM messages WHERE idRole = ? ORDER BY date");
            $requete->execute([$this->idRole]);
            $infosMessages = $requete->fetchAll(PDO::FETCH_ASSOC);

            foreach ( $infosMessages as $infoMessage ){
                $objetMessage = new Message($infoMessage["idMessage"]);
                $this->messages[] = $objetMessage;
            }

        }

    }

    public function SetBanissements($idUtilisateur){

        $requete = $this->getBdd()->prepare("SELECT idUtilisateur, email, nom, prenom, age, idRole FROM utilisateurs WHERE idUtilisateur = ?");
        $requete->execute([$idUtilisateur]);
        $bannis = $requete->fetch(PDO::FETCH_ASSOC);

        $this->bannissements[] = $bannis;

    }

    public function getBanissements(){
        return $this->bannissements;
    }

    public function getMessages(){
        return $this->messages;
    }

}