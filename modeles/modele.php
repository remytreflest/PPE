<?php

class Modele {

    protected function getBdd()
    {
        $dsn = "mysql:host=localhost;dbname=voyages;charset=UTF8";
        $username = "root";
        $password = "";
        return new PDO($dsn, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

}