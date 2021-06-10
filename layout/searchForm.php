<?php
$titre = isset($_POST["titre"]) ? $_POST["titre"] : "";
$date = isset($_POST["date"]) ? $_POST["date"] : "";
$editeur = isset($_POST["editeur"]) ? $_POST["editeur"] : "";
$collection = isset($_POST["collection"]) ? $_POST["collection"] : "";
$edition = isset($_POST["edition"]) ? $_POST["edition"] : "";

$nomauteur = isset($_POST["nomauteur"]) ? $_POST["nomauteur"] : "";
$prenomauteur = isset($_POST["prenomauteur"]) ? $_POST["prenomauteur"] : "";


require '../script/bdd_livres_connect.php';

if (isset($_POST['buttonsearch'])) {
    if (!empty($titre) || !empty($date) || !empty($editeur) || !empty($collection) || !empty($edition) || !empty($nomauteur) || !empty($prenomauteur) ) {
        
        /*$sql_search_auteur = $connexion->prepare("SELECT Titre FROM livres WHERE ();
        values (:nomauteur, :prenomauteur)");
        $sql_search_auteur->bindParam(':nomauteur', $nomauteur);
        $sql_search_auteur->bindParam(':prenomauteur', $prenomauteur);
        $sql_search_auteur->execute();*/
        
        $sql_search = "SELECT * FROM LIVRE";
        $sql_conditions = "";
        $sql_conditions = addConditions($sql_conditions, "Titre", $titre);
        $sql_conditions = addConditions($sql_conditions, "Auteur", $auteur);
        $sql_conditions = addConditions($sql_conditions, "Annee", $annee);
        $sql_conditions = addConditions($sql_conditions, "Editeur", $editeur);
        $sql_conditions = addConditions($sql_conditions, "Edition", $annee);
        $sql_conditions = addConditions($sql_conditions, "Approuval", $editeur);
        $sql_search .= $sql_conditions;

        $result_search = executeQuery($connexion, $sql_search);

        if (!$result_search) {
            $connexion = null;
            exit();
        }

        if ($result_search->rowCount() > 0) {
            echo "<table>";
            foreach ($result_search as $row) {
                echo "<tr>";
                echo "<td>" . $row["Titre"] . "</td>";
                echo "<td>" . $row["Auteur"] . "</td>";
                echo "<td>" . $row["Annee"] . "</td>";
                echo "<td>" . $row["Editeur"] . "</td>";
                echo "<td>" . $row["Edition"] . "</td>";
                echo "<td>" . $row["Approval"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p> Aucun résultats trouvés. </p>";
        }
    } else {
        echo "<p>Aucune données transmises par le formulaire.</p>";
    }
}

function addConditions($sql_conditions, $field, $value)
{
    if (!empty($value)) {
        if (empty($sql_conditions)) {
            $sql_conditions .= " WHERE ";
        } else {
            $sql_conditions .= " AND ";
        }

        $sql_conditions .= "$field LIKE '%$value%'";
    }
    return $sql_conditions;
}
function executeQuery($connexion, $sql_query)
{
    $result_insert = $connexion->query($sql_query);

    if (!$result_insert) {
        $connexion = null;
        exit();
    }

    return $result_insert;
}

?>