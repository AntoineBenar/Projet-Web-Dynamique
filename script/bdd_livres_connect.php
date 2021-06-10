<?php
    $servername = "localhost";
    $dbname = "baseprojetweb";
    $user = "root";
    $password ="";
    try{
        $connexion = new PDO("mysql:host=".$servername.";dbname=".$dbname, $user, $password);
        foreach($connexion->query('SELECT * FROM Livres') as $row) {
            print_r($row);
            print_r(" \n");
            print_r(" \n");
            print_r(" \n");
        }
    }catch(PDOException $e){
        echo "Erreur ! : $e->getMessage() ou  $e <br/>";
        die();
    }

?>