<?php
    $servername = "localhost";
    $dbname = "Books";
    $user = "root";
    $password ="";
    ;
    try{
        $connexion = new PDO("mysql:host=".$servername.";dbname=".$dbname, $user, $password);
        foreach($connexion->query('SELECT * FROM Livres') as $row) {
            print_r($row);
        }
        $connexion = null;
    }catch(PDOException $e){
        print "Erreur ! : " .$e->getMessage() . "<br/>";
        die();
    }

?>