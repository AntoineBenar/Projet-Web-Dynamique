<?php 
$titre = isset($_POST["titre"]) ? $_POST["titre"] : "";
$date = isset($_POST["date"]) ? $_POST["date"] : "";
$editeur = isset($_POST["editeur"]) ? $_POST["editeur"] : "";
$collection = isset($_POST["collection"]) ? $_POST["collection"] : "";
$edition = isset($_POST["edition"]) ? $_POST["edition"] : "";
require '../script/bdd_livres_connect.php';


if (isset($_POST['button1'])) {
    echo "<p> titre = $titre, date = $date,editeur = $editeur, collection = $collection, edition = $edition  </p>";
    if (!empty($titre) && !empty($date) && !empty($editeur) && !empty($collection) && !empty($edition)) {


        $sql_search = "SELECT * FROM LIVRE";
        $sql_conditions = "";
        $sql_conditions = addConditionsWithOperator($sql_conditions, "Titre", "=", $titre);
        $sql_conditions = addConditionsWithOperator($sql_conditions, "Date_Publication", "=", $date);
        $sql_conditions = addConditionsWithOperator($sql_conditions, "Editeur", "=", $editeur);
        $sql_conditions = addConditionsWithOperator($sql_conditions, "Collection", "=",  $collection);
        $sql_conditions = addConditionsWithOperator($sql_conditions, "Edition", "=",  $edition);
        $sql_search .= $sql_conditions;
        $result_search = executeQuery($connexion, $sql_search);
        echo "search : $sql_search: PB ";

        if ($result_search->rowCount() > 0) {
            echo "<p> Ce livre existe déjà dans la bibliothèque. </p>";
        } else {

            $sql_insert = "INSERT INTO livre(Titre, Date_Publication, Editeur, Collection, Edition, Aproval)
            VALUES('$titre', '$date', '$editeur', '$collection','$edition', 0)";

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
        echo "<p>Veuillez remplir tous les champs</p>";
    }
    $connexion = null;
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
    echo " CON : $connexion";
    $result_insert = $connexion->query($sql_query);
    echo "executequery : $result_insert: ";

    if (!$result_insert) {
        $connexion = null;
        exit();
    }

    return $result_insert;
}
?>