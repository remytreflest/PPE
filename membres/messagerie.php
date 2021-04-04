<?php
require_once "header.php";

$messages = sqlMessagerie($_SESSION["idUtilisateur"]);
sqlMessageUserLu($_SESSION["idUtilisateur"]);

if(!empty($_POST["newMessage"])){

    $newMessage = sqlNewMessageUser($_POST["newMessage"], $_SESSION["idUtilisateur"]);

    header("location:messagerie.php?idmessage=" . $newMessage['idMessage'] . "#" . $newMessage['idMessage'] . '"');
}

?>
<div id="background-messagerie-user"></div>

<div class="container p-0 mt-4">
<div id="div-messagerie" class="background-opacity col-12 d-flex justify-content-center border">
        <div id="test" class="col-12 d-flex-column">
            <div id="messagerie-padding" class="d-flex-column">
                <?php
                foreach($messages as $cle => $message){
                    ?>
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-10 my-2 <?=$_SESSION["idUtilisateur"] == $message["destinataire"] ? '' : 'order-1';?>">
                        <form method="POST" action="messagerie.php">
                                <div id="<?=$message["idMessage"];?>" class="message <?=$_SESSION["idUtilisateur"] == $message["destinataire"] ? 'message-noir-user' : 'message-blanc-user';?>" type="submit" name="refresh" value="<?=$message["idMessage"];?>">
                                    <div class="card-text"><?=$message["contenu"];?></div>
                                    
                                </div>
                        </form>
                            
                        </div>
                        <div class="col-2 taille-date-user"><?=$message["date"];?></div>
                    </div>
                    

                    <?php
                    $lastIdMessage = $message["idMessage"];
                }
                ?>
            </div>
            <form id="div-newMessage d-inline-flex" method="POST">
                <div id="div-textarea-button-messagerie" class="form-group">
                    <button type="submit" id="submit-button-messagerie" class="btn btn-circle  btn-sm d-flex justify-content-center align-items-center"><i class="fas fa-paper-plane fa-x3"></i></button>
                    <textarea class="form-control" name="newMessage" id="newMessage" cols="30" rows="5" placeholder="Vous pouvez écrire votre réponse ici ..."></textarea>
                </div>
            </form>
        </div>
    </div>
</div>





<?php
require_once "footer.php";
?>
