<?php 
$titre = isset($_POST["titre"]) ? $_POST["titre"] : "";
$date = isset($_POST["date"]) ? $_POST["date"] : "";
$editeur = isset($_POST["editeur"]) ? $_POST["editeur"] : "";
$collection = isset($_POST["collection"]) ? $_POST["collection"] : "";
$edition = isset($_POST["edition"]) ? $_POST["edition"] : "";

$nomauteur = isset($_POST["nomauteur"]) ? $_POST["nomauteur"] : "";
$prenomauteur = isset($_POST["prenomauteur"]) ? $_POST["prenomauteur"] : "";


require '../script/bdd_livres_connect.php';
//require '../script/bdd_users_connect.php';

if (isset($_POST['button1'])) {
    if (!empty($titre) && !empty($date) && !empty($editeur) && !empty($collection) && !empty($edition) && !empty($nomauteur)&& !empty($prenomauteur)) {

       
        $sql_insert_auteur = $connexion->prepare("INSERT INTO auteurs (Nom,Prenom)
        values (:nomauteur, :prenomauteur)");
        $sql_insert_auteur->bindParam(':nomauteur', $nomauteur);
        $sql_insert_auteur->bindParam(':prenomauteur', $prenomauteur);
        $sql_insert_auteur->execute();


        $sql_insert_livre = $connexion->prepare("INSERT INTO livres(Titre, Date_publication, Editeur, Collection, Edition, Aproval)
        values (:titre, :date, :editeur, :collection, :edition, 0)");
        $sql_insert_livre->bindParam(':titre', $titre);
        $sql_insert_livre->bindParam(':date', $date);
        $sql_insert_livre->bindParam(':editeur', $editeur);
        $sql_insert_livre->bindParam(':collection', $collection);
        $sql_insert_livre->bindParam(':edition', $edition);
        $sql_insert_livre->execute();

        
        $sql_insert_livreauteur = $connexion->prepare("INSERT INTO livresauteurs (TItre, DateDePublication, NomAuteur, PrenomAuteur)
        values (:titre, :date, :nomauteur, :prenomauteur)");
        $sql_insert_livreauteur->bindParam(':titre', $titre);
        $sql_insert_livreauteur->bindParam(':date', $date);
        $sql_insert_livreauteur->bindParam(':nomauteur', $nomauteur);
        $sql_insert_livreauteur->bindParam(':prenomauteur', $prenomauteur);
        $sql_insert_livreauteur->execute();

        $titrepageconfirmation = 'Confirmation';

        echo <<<MON_HTML
 
        <html>
            <head>
                <link  rel="stylesheet" type="text/css" href="assets/css/stylesEnregistrement.css" /> 
                <title>${titrepageconfirmation}</title>
            </head>

            <body>
             titre : $titre, date : $date, editeur : $editeur, <br> collection : $collection, edition : $edition , <br> Nom de l'auteur : $nomauteur,  prénom de l'auteur : $prenomauteur 
            <h2>Le livre a bien été enregistré.</h2>
            <button href="Enregistrement.html">retour
            </button>
            
            </body>
        </html>
 
MON_HTML;

    
        $connexion=null;

    }
}
        else{
            echo"<p> Problème rencontré</p>";
        }
?>