<?php
require_once "../modeles/App.php";

$user = new Utilisateur(1);
$test = $user->getMessages();
for ( $i = 0; $i < count($test); $i++ ){
    if ($user->getMessages()[$i]->getExpediteur() == 1){
        echo "<div style=color:red;>";
        var_dump($user->getMessages()[$i]);
        echo "</div>";
    } else {
        echo "<div style=color:green;>";
        var_dump($user->getMessages()[$i]);
        echo "</div>";
    }
}

$agence = new Agence(1);
echo "<pre>";
print_r($agence);
echo "</pre>";