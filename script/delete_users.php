<?php 

function deleteRecord($connexion, $tabFieldValue)
{
    // Récupérer la valeur des champs du formulaire. ATTENTION à bien modifier les noms des variables en concordance avec la bdd user

    $id = $tabFieldValue["id"];
    $pseudo = $tabFieldValue["pseudo"];
    $nom = $tabFieldValue["nom"];
    $prenom = $tabFieldValue["prenom"];
    $datedenaissance = $tabFieldValue["date"];
    $mail =  $tabFieldValue["mail"];
    $approuval =  $tabFieldValue["approuval"];
    
    if (!empty($titre) && !empty($auteur) && !empty($annee) && !empty($editeur) && !empty($edition) && !empty($approuval)) {
        $sql_search = "SELECT * FROM LIVRE";
        $sql_conditions = "";
        $sql_conditions = addConditions($sql_conditions, "id", $id);
        $sql_conditions = addConditions($sql_conditions, "pseudo", $pseudo);
        $sql_conditions = addConditions($sql_conditions, "nom", $nom);
        $sql_conditions = addConditions($sql_conditions, "prenom", $prenom);
        $sql_conditions = addConditions($sql_conditions, "datedenaissance", $datedenaissance);
        $sql_conditions = addConditions($sql_conditions, "mail", $mail);
        $sql_conditions = addConditions($sql_conditions, "approuval", $approuval);
        $sql_search .= $sql_conditions;
        $result_search = executeQuery($connexion, $sql_search);

        if (doesContainResult($result_search)) {

            foreach ($result_search as $row) {
                $id = $row["ID"];
            }

            $sql_delete = "DELETE FROM USER WHERE ID =" . $id;


            executeQuery($connexion, $sql_delete);
            $result_delete = $connexion->query($sql_delete);

            if ($result_delete) {
                echo "<p> Suppression effectuée avec succès. </p>";
            }

            $sql_all = "SELECT * FROM USER";

            $result_all = $connexion->query($sql_all);

            if (!$result_all) {
                $connexion = null;
                exit();
            }

            if (doesContainResult($result_all)) {
                echo "<table>";
                foreach ($result_all as $row) {
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
                echo "<p> Il n'y a aucun utilisateur dans la BDD. </p>";
            }
        } else {
            echo "<p> Aucun résultats trouvés. </p>";
        }
    }
}

if (isset($_POST['button3'])) {
    deleteRecord($connexion, $_POST);
 }