<?php

class Administrateurs extends Utilisateurs {

    private $bannissements = [];

    public function SetBanissements($idUtilisateur){

        $requete = $this->getBdd()->prepare("SELECT idUtilisateur, email, nom, prenom, age, idRole FROM utilisateurs WHERE idUtilisateur = ?");
        $requete->execute([$idUtilisateur]);
        $bannis = $requete->fetch(PDO::FETCH_ASSOC);

        $this->bannissements[] = $bannis;

    }

    public function getBanissements(){
        return $this->bannissements;
    }

}