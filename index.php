<?php
if(!empty($_SESSION["role"] == 2)){
    header("location:admin/index.php"); // la page admin n'est pas encore créer, c'est normal
} else {
    header("location:membres/index.php");
}
