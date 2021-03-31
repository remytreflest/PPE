<?php
require_once "header.php";

$requete = getBdd()->prepare("SELECT nom, prenom, consulter_message.idUtilisateur, idUtilisateurDest, consulter_message.idRole, idMessage, date, contenu, statut  FROM utilisateurs INNER JOIN consulter_message USING(idUtilisateur) INNER JOIN messages USING(idMessage) ORDER BY date ASC");
$requete->execute([$_SESSION["role"]]);
$messages = $requete->fetchALL(PDO::FETCH_ASSOC);

$requete = getBdd()->prepare("SELECT DISTINCT idUtilisateur, nom, prenom FROM utilisateurs INNER JOIN consulter_message USING(idUtilisateur) INNER JOIN messages USING(idMessage) WHERE consulter_message.idRole = ? ORDER BY date ASC");
$requete->execute([$_SESSION["role"]]);
$utilisateurs = $requete->fetchALL(PDO::FETCH_ASSOC);


if(!empty($_GET["refresh"])){

    $url = "";

    foreach($messages as $message){

        if($_GET["utilisateur"] !== $message["idUtilisateurDest"] && $_GET["refresh"] === $message["idMessage"]){
            $requete = getBdd()->prepare("UPDATE messages SET statut = ? WHERE idMessage = ? ");
            $requete->execute(["Lu", $_GET["refresh"]]);
            
        }
    }

    $url = "location:messagerieAdmin.php?utilisateur=" . $_GET["utilisateur"] . "&idmessage=" . $_GET['refresh'] . "#" . $_GET['refresh'] . "";
    header("$url");

}


if(!empty($_POST["newMessage"])){

    $today = date("Y-m-d H:i:s");

    $requete = getBdd()->prepare("INSERT INTO messages(date, contenu) VALUES(?, ?)");
    $requete->execute([$today, $_POST["newMessage"]]);

    $requete = getBdd()->prepare("SELECT idMessage FROM messages WHERE contenu = ? AND date = ?");
    $requete->execute([$_POST["newMessage"], $today]);
    $newMessage = $requete->fetch(PDO::FETCH_ASSOC);

    $requete = getBdd()->prepare("INSERT INTO consulter_message(idMessage, idUtilisateur, idUtilisateurExpe, idUtilisateurDest, idRole) VALUES(?, ?, ?, ?, ?)");
    $requete->execute([$newMessage["idMessage"], $_SESSION["idUtilisateur"], $_SESSION["idUtilisateur"], $_POST["idUtilisateur"], 1]);
    // la problème quand il n'y a pas de message avant, écrire à l'admin provoque un problème, ce n'est pas encore ciblé, va falloir utiliser l'idrôle pour l'affichage de l'admin je pense et mieux géré la page de l'utilisateur, probablement le moment de séparer les messageries

    header("location:messagerieAdmin.php?utilisateur=" . $_GET["utilisateur"] . "&idmessage=" . $newMessage['idMessage'] . "#" . $newMessage['idMessage'] . '"');
}

?>


<div id="div-messagerie" class="row d-flex border">
    <div class="col-md-3 d-flex-column">
        <?php
            foreach($utilisateurs as $cle => $utilisateur){
                ?>
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <form method="GET" action="messagerieAdmin.php" class="col-12 my-2">
                            <button id="utilisateur<?=$utilisateur["idUtilisateur"];?>" class="button-hidden col-12" type="submit" name="utilisateur" value="<?=$utilisateur["idUtilisateur"];?>">
                                <?=$utilisateur["nom"];?> <?=$utilisateur["prenom"];?>
                                <?php
                                $nbMessage = 0;
                                foreach($messages as $message){
                                    if($message["statut"] !== "Lu" && $utilisateur["idUtilisateur"] == $message["idUtilisateur"]){
                                        $nbMessage++;
                                    }
                                }
                                if($nbMessage > 0){
                                    ?>
                                    <i class="cloche-messagerie far fa-bell ml-3"></i>
                                    <?php
                                }
                                ?>
                            </button>
                    </form>
                </div>
                <?php
            }
            ?>
    </div>
    <div id="test" class="col-md-4 d-flex-column">
        <div id="messagerie-padding" class="d-flex-column">
            <?php
            if(!empty($_GET["utilisateur"])){
                foreach($messages as $cle => $message){
                    if($_GET["utilisateur"] == $message["idUtilisateur"] || $_GET["utilisateur"] == $message["idUtilisateurDest"] ){ // GROS GROS PROBLEME D4AFFICHAGE
                        ?>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-10 my-2 <?=$_GET["utilisateur"] !== $message["idUtilisateurDest"] ? '' : 'order-1';?>">
                                <form method="GET" action="messagerieAdmin.php">
                                    <div class="card">
                                        <button id="message<?=$message["idMessage"];?>" class="button-hidden <?=$_GET["utilisateur"] !== $message["idUtilisateurDest"] ? 'bg-success' : 'bg-primary';?>" type="submit" name="refresh" value="<?=$message["idMessage"];?>">
                                            <div class="card-text"><?=CoupePhrase($message["contenu"]);?> <?=($message["statut"] !== "Lu" && $_GET["utilisateur"] !== $message["idUtilisateurDest"]) ? '<i class="cloche-messagerie far fa-bell ml-3"></i>' : '';?></div>
                                            <input type="text" hidden name="utilisateur" value="<?=$_GET['utilisateur'];?>">
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-2 taille-date"><?=$message["date"];?></div>
                        </div>
                        <?php
                    }
                }
            ?>
            </div>
                <form id="div-newMessage d-inline-flex" method="POST">
                    <div id="div-textarea-button-messagerie" class="form-group">
                        <button type="submit" id="submit-button-messagerie" class="btn btn-circle  btn-sm d-flex justify-content-center align-items-center" name="idUtilisateur" value="<?=$_GET["utilisateur"]?>"><i class="fas fa-paper-plane fa-x3"></i></button>
                        <textarea class="form-control" name="newMessage" id="newMessage" cols="30" rows="5" placeholder="Vous pouvez écrire votre réponse ici ..."></textarea>
                    </div>
                </form>
            </div>
            <?php
            }
            ?>

    <div id="div-message-gros-plan" class="col-md-5 d-flex justify-content-center align-items-center">
        <?php
        if(!empty($_GET["idmessage"])){
            foreach($messages as $message){

                if($_GET["idmessage"] == $message["idMessage"]){
                    ?>
                    <div class="card-body rounded col-10 d-flex justify-content-center mx-25 <?=$_GET["utilisateur"] !== $message["idUtilisateurDest"] ? 'bg-success' : 'bg-primary';?>">
                        <div class="card-text d-flex col-12 text-justify">
                            <?=$message["contenu"];?>
                        </div>
                    </div>
                    <?php
                }
            }
        }
        ?>
    </div>
</div>





<?php

if(!empty($_GET["idmessage"])){
    ?>
    <script>
        var elemEnfant = document.getElementById("message<?=$_GET["idmessage"];?>");
        elemEnfant.classList.add("couleur");
        elemEnfant.focus();
    </script>
    <?php
}

if(!empty($_GET["utilisateur"])){
    ?>
    <script>
        var elemParent = document.getElementById("utilisateur<?=$_GET["utilisateur"];?>");
        elemParent.classList.add("couleur");
    </script>
    <?php
}

require_once "../membres/footer.php";
?>
