<?php

class Utilisateurs extends Modele {

    private $idUtilisateur;
    private $email;
    private $mdp;
    private $nom;
    private $prenom;
    private $age;
    private $idRole;

    public function __construct($idUtilisateur = null){

        if ( $idUtilisateur != null ){

            $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE idUtilisateur = ?");
            $requete->execute([$idUtilisateur]);
            $infoUser =  $requete->fetch(PDO::FETCH_ASSOC);

            $this->idUtilisateur = $infoUser["idUtilisateur"];
            $this->email = $infoUser["email"];
            $this->mdp = $infoUser["mdp"];
            $this->nom = $infoUser["nom"];
            $this->prenom = $infoUser["prenom"];
            $this->age = $infoUser["age"];
            $this->idRole = $infoUser["idRole"];

        }
        
    }

    public function inscription($email, $mdp, $nom, $prenom, $age, $idRole){

        $requete = $this->getBdd()->prepare("INSERT INTO utilisateurs(email, mdp, nom, prenom, age, idRole) VALUES (?, ?, ?, ?, ?, ?);");
        $requete->execute([$email, $mdp, $nom, $prenom, $age, $idRole]);

    }

    // vérification si l'email est déjà présent dans la base de donnée
    public function emailExiste($email){

        $requete = $this->getBdd()->prepare("SELECT email FROM utilisateurs WHERE email = ?;");
        $requete->execute([$email]);
        $emailExist = $requete->fetch(PDO::FETCH_ASSOC)->rowCount();

        return $emailExist > 0 ? true : false;

    }

    public function getIdUtilisateur(){
        return $this->idUtilisateur;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getMdp(){
        return $this->mdp;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getAge(){
        return $this->age;
    }

    public function getIdRole(){
        return $this->idRole;
    }

}