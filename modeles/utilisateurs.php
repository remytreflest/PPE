<?php
// en lien avec la table des utilisateurs

// vérification si l'email est déjà présent dans la base de donnée
function sqlEmailExiste($post){
    $requete = getBdd()->prepare("SELECT email FROM utilisateurs WHERE email = ?;");
    $requete->execute([$post]);
    $tableau = $requete->fetch(PDO::FETCH_ASSOC);
    return $tableau;
}

// inscription de l'utilisateur dans la base de donnée
function sqlCreerUtilisateur($email, $mdp, $nom, $prenom, $age){
    $requete = getBdd()->prepare("INSERT INTO utilisateurs(email, mdp, nom, prenom, age, idRole) VALUES (?, ?, ?, ?, ?, ?);");
    $requete->execute([$email, $mdp, $nom, $prenom, $age, 1]);
    header("location:../membres/inscription.php?success=yes");
}