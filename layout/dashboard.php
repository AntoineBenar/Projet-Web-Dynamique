<?php
    //récupérer les données venant de formulaire
    $titre = isset($_POST["titre"]) ? $_POST["titre"] : "";
    $auteur = isset($_POST["auteur"]) ? $_POST["auteur"] : "";
    $editeur = isset($_POST["editeur"]) ? $_POST["editeur"] : "";
    require '../bdd_connect.php';
    require '../utils.php';
    $connexion = null;
?>