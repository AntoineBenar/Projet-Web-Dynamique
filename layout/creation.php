<?php 

$titre = isset($_POST["titre"]) ? $_POST["titre"] : "";
$date = isset($_POST["date"]) ? $_POST["date"] : "";
$auteur = isset($_POST["collection"]) ? $_POST["collection"] : "";
$annee = isset($_POST["annee"]) ? $_POST["annee"] : "";
$editeur = isset($_POST["editeur"]) ? $_POST["editeur"] : "";
require '../bdd_connect.php';
require '../utils.php';

if (isset($_POST['button1'])) {
    if (!empty($titre) && !empty($auteur) && !empty($annee) && !empty($editeur)) {

        $sql_search = "SELECT * FROM LIVRE";
        $sql_conditions = "";
        $sql_conditions = addConditionsWithOperator($sql_conditions, "Titre", "=", $titre);
        $sql_conditions = addConditionsWithOperator($sql_conditions, "Auteur", "=", $auteur);
        $sql_conditions = addConditionsWithOperator($sql_conditions, "Annee", "=", $annee);
        $sql_conditions = addConditionsWithOperator($sql_conditions, "Editeur", "=",  $editeur);
        $sql_search .= $sql_conditions;
        $result_search = executeQuery($connexion, $sql_search);


        if ($result_search->rowCount() > 0) {
            echo "<p> Ce livre existe déjà dans la bibliothèque. </p>";
        } else {

            $sql_insert = "INSERT INTO livre(Titre, Auteur, Annee, Editeur)
        VALUES('$titre', '$auteur', '$annee', '$editeur')";

            $result_insert = executeQuery($connexion, $sql_insert);

            $lastId = $connexion->lastInsertId();
            $sql_search = "SELECT * FROM LIVRE WHERE ID =" . $lastId;

            $result_search = $connexion->query($sql_search);

            if (!$result_search) {
                $connexion = null;
                exit();
            }

            if ($result_search->rowCount() > 0) {
                echo "<h2>Dernier enregistrement inséré</h2>";
                echo "<table>";
                foreach ($result_search as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["Titre"] . "</td>";
                    echo "<td>" . $row["Auteur"] . "</td>";
                    echo "<td>" . $row["Annee"] . "</td>";
                    echo "<td>" . $row["Editeur"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p> Aucun résultats trouvés. </p>";
            }
        }
    } else {
        echo "<p>Aucune données transmises par le formulaire.</p>";
    }
}

function addConditionsWithOperator($sql_conditions, $field, $operator, $value)
{
    if (!empty($value)) {
        if (empty($sql_conditions)) {
            $sql_conditions .= " WHERE ";
        } else {
            $sql_conditions .= " AND ";
        }

        $sql_conditions .= $field . " " . $operator . " " . '"' . $value . '"';
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