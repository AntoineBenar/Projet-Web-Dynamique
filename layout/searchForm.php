    <!-- 
Créez un fichier "searchForm.php" dans le dossier "layout" et faites en sorte d'avoir un formulaire
de recherche sur les champs de votre table "Livre" qui pointera sur la page courante avec la
méthode POST.
Vous vérifierez donc si le bouton de soumission de votre formulaire a été utilisé en vous basant sur
son nom, et choisirez en conséquence si il faut construire la requête de recherche ou récupérez tous
les enregistrements pour l'affichage de votre table.
    -->
    <?php


if (isset($_POST['button1'])) {
    if (!empty($titre) || !empty($auteur) || !empty($annee) || !empty($editeur)) {
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
?>