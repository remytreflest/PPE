<?php

// récupération du nombre de messages concernant l'utilisateur
function sqlMessagesUtilisateur($param){

    $requete = getBdd()->prepare("SELECT COUNT(idMessage) FROM consulter_message INNER JOIN messages USING(idMessage) WHERE statut IS NULL AND idUtilisateurDest = ?");
    $requete->execute([$param]);
    return $requete->fetch(PDO::FETCH_ASSOC);

}

// récupération du nombre de messages concernant l'admin
function sqlMessagesAdmin($param){

    $requete = getBdd()->prepare("SELECT COUNT(idMessage) FROM consulter_message INNER JOIN messages USING(idMessage) WHERE statut IS NULL AND idRole = ?");
    $requete->execute([$param]);
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

function sqlMessageAdminLu($param1, $param2){

    $requete = getBdd()->prepare("UPDATE messages SET statut = ? WHERE idMessage IN (SELECT idMessage FROM consulter_message WHERE idUtilisateurExpe = ?) ");
    $requete->execute([$param1, $param2]);

}

// introduit le nouveau message dans la base de donnée
function sqlNewMessage($param1, $param2){

    $today = date("Y-m-d H:i:s");

    $requete = getBdd()->prepare("INSERT INTO messages(date, contenu) VALUES(?, ?)");
    $requete->execute([$today, $param1]);

    $requete = getBdd()->prepare("SELECT idMessage FROM messages WHERE contenu = ? AND date = ?");
    $requete->execute([$param1, $today]);
    $newMessage = $requete->fetch(PDO::FETCH_ASSOC);

    $requete = getBdd()->prepare("INSERT INTO consulter_message(idMessage, idUtilisateur, idUtilisateurExpe, idRole) VALUES(?, ?, ?, ?)");
    $requete->execute([$newMessage["idMessage"], $param2, $param2, 2]);

}