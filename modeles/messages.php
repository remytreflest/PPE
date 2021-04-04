<?php

// récupération du nombre de messages non lu concernant l'utilisateur 
function sqlMessagesUtilisateur($session_role){

    $requete = getBdd()->prepare("SELECT COUNT(idMessage) FROM messages LEFT JOIN consulter_messages USING(idMessage) WHERE destinataire = ? and idUtilisateur IS NULL");
    $requete->execute([$session_role]);
    return $requete->fetch(PDO::FETCH_ASSOC);

}

// récupération du nombre de messages non lu concernant l'admin (grace à l'idUtilisateur de la table consulter message qui sera null si non présent dans la table et donc non lu)
function sqlMessagesAdmin($session_role){

    $requete = getBdd()->prepare("SELECT COUNT(idMessage) FROM messages LEFT JOIN consulter_messages USING(idMessage) WHERE idRole = ? and idUtilisateur IS NULL");
    $requete->execute([$session_role]);
    return $requete->fetch(PDO::FETCH_ASSOC);

}

// récupération des messages concernant l'utilisateur, aussi bien expéditeur que destinataire
function sqlMessagerie($param){

    $requete = getBdd()->prepare("SELECT consulter_message.idUtilisateur, idUtilisateurExpe, idUtilisateurDest, idMessage, date, contenu, statut  FROM utilisateurs INNER JOIN consulter_message USING(idUtilisateur) INNER JOIN messages USING(idMessage) WHERE idUtilisateur = ? OR idUtilisateurDest = ? ORDER BY date ASC");
    $requete->execute([$param, $param]);
    $messages = $requete->fetchALL(PDO::FETCH_ASSOC);
    return $messages;
}

// actualisation d'un message non lu vers un message lu
function sqlMessageUserLu($param1, $param2){

    $requete = getBdd()->prepare("UPDATE messages SET statut = ? WHERE idMessage IN (SELECT idMessage FROM consulter_message WHERE idUtilisateurDest = ?) ");
    $requete->execute([$param1, $param2]);

}

function sqlMessageAdminLu($GET_utilisateur, $SESSION_idUtilisateur){

    $requete = getBdd()->prepare("SELECT idMessage FROM messages LEFT JOIN consulter_messages USING(idMessage) WHERE expediteur = ? and idUtilisateur IS NULL");
    $requete->execute([$GET_utilisateur]);
    $idMessages = $requete->fetchALL(PDO::FETCH_ASSOC);

    $valeurs = [];
    foreach($idMessages as $idMessage){
        $valeurs[] = $SESSION_idUtilisateur;
        $valeurs[] = $idMessage["idMessage"];
    }

    try{
    $sql = "INSERT INTO consulter_messages(idUtilisateur, idMessage) VALUES " . substr(str_repeat("(?,?),", (count($valeurs) / 2)), 0, -1);
    $requete = getBdd()->prepare($sql);
    $requete->execute($valeurs);
    } catch(Exception $e){

    }

}

// introduit le nouveau message dans la base de donnée
function sqlNewMessage($POST_newMessage, $SESSION_idUtilisateur, $GET_utilisateur){

    $requete = getBdd()->prepare("INSERT INTO messages(date, contenu, expediteur, destinataire, idRole) VALUES(NOW(), ?, ?, ?, ?)");
    $requete->execute([$_POST["newMessage"], $_SESSION["idUtilisateur"], $_GET["utilisateur"], 1]);

}