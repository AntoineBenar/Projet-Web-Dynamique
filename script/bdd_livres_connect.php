<?php
    $servername = "localhost";
    $dbname = "baseprojetweb";
    $user = "root";
    $password ="";
    try{
        echo"YALALALALA";
        $connexion = new PDO("mysql:host=".$servername.";dbname=".$dbname, $user, $password);
        foreach($connexion->query('SELECT * FROM Livres') as $row) {
            print_r($row);
        }
        $connexion = null;
    }catch(PDOException $e){
        echo "Erreur ! : $e->getMessage() ou  $e <br/>";
        die();
    }

?>