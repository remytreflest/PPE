<?php
require_once "header.php";

$requete = getBdd()->prepare("SELECT nom, prenom, expediteur, destinataire, messages.idRole, idMessage, date, contenu FROM messages LEFT JOIN consulter_messages USING(idMessage) LEFT JOIN utilisateurs USING(idUtilisateur) ORDER BY idMessage ASC");
$requete->execute([$_SESSION["role"]]);
$messages = $requete->fetchALL(PDO::FETCH_ASSOC);

$requete = getBdd()->prepare("SELECT DISTINCT idUtilisateur, nom, prenom FROM messages LEFT JOIN utilisateurs ON idUtilisateur = expediteur WHERE messages.idRole = 2 ORDER BY idMessage DESC");
$requete->execute([$_SESSION["role"]]);
$utilisateurs = $requete->fetchALL(PDO::FETCH_ASSOC);

if(!empty($_GET["utilisateur"])){

    sqlMessageAdminLu($_GET["utilisateur"], $_SESSION["idUtilisateur"]);

}


if(!empty($_POST["newMessage"])){

    sqlNewMessage($_POST["newMessage"], $_SESSION["idUtilisateur"], $_GET["utilisateur"]);

    header("location:../admin/messagerieAdmin.php?utilisateur=" . $_GET["utilisateur"]);

}

?>
<div id="background-messagerie-admin"></div>
<div class="container">
    <div id="div-messagerie" class="row d-flex border background-opacity">
        <div id="users" class="col-4 d-flex-column p-0">
            <!-- <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
            <?php
                foreach($utilisateurs as $cle => $utilisateur){
                    ?>
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <form method="GET" action="messagerieAdmin.php" class="col-12">
                                <button id="utilisateur<?=$utilisateur["idUtilisateur"];?>" class="button-hidden col-12" type="submit" name="utilisateur" value="<?=$utilisateur["idUtilisateur"];?>">
                                    <?=$utilisateur["nom"];?> <?=$utilisateur["prenom"];?>
                                    <?php
                                    $nbMessage = 0;
                                    // foreach($messages as $message){
                                    //     if($message["statut"] !== "Lu" && $utilisateur["idUtilisateur"] == $message["idUtilisateur"]){
                                    //         $nbMessage++;
                                    //     }
                                    // }
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
        <div id="test" class="col-8 d-flex-column p-0">
            <div id="messagerie-padding" class="d-flex-column">
                <?php
                if(!empty($_GET["utilisateur"])){
                    foreach($messages as $cle => $message){
                        if($_GET["utilisateur"] == $message["expediteur"] || $_GET["utilisateur"] == $message["destinataire"] ){ // GROS GROS PROBLEME D4AFFICHAGE
                            ?>
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <div class="col-10 my-2 <?=$_GET["utilisateur"] !== $message["destinataire"] ? '' : 'order-1';?>">
                                    <form method="GET" action="messagerieAdmin.php">

                                            <div id="message<?=$message["idMessage"];?>" class="message <?=$_GET["utilisateur"] !== $message["destinataire"] ? 'message-noir' : 'message-blanc';?>"><?=$message["contenu"];?></div>
                                        
                                    </form>
                                </div>
                                <div class="col-2 taille-date"><?=$message["date"];?></div>
                            </div>
                            <?php
                        }
                    }
                ?>


<?php
                }
                ?>
            </div>
            <form id="div-newMessage" method="POST">
                <div id="div-textarea-button-messagerie" class="form-group m-0">
                    <button type="submit" id="submit-button-messagerie" class="btn btn-circle  btn-sm d-flex justify-content-center align-items-center" name="idUtilisateur" value="<?=!empty($_GET["utilisateur"]) ? $_GET["utilisateur"] : "";?>"><i class="fas fa-paper-plane fa-x3"></i></button>
                    <textarea class="form-control" name="newMessage" id="newMessage" cols="30" rows="5" placeholder="Vous pouvez écrire votre réponse ici ..." <?=!empty($_GET["utilisateur"]) ? $_GET["utilisateur"] : "disabled";?>></textarea>
                </div>
            </form>
        </div>
    </div>
</div>




<?php

if(!empty($_GET["utilisateur"])){
    ?>
    <script>
        var elemParent = document.getElementById("utilisateur<?=$_GET["utilisateur"];?>");
        elemParent.classList.add("couleur-admin");
    </script>
    <?php
}

require_once "../membres/footer.php";
?>
