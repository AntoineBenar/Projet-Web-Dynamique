<?php
    //récupérer les données venant de formulaire
    $titre = isset($_POST["titre"]) ? $_POST["titre"] : "";
    $auteur = isset($_POST["auteur"]) ? $_POST["auteur"] : "";
    $editeur = isset($_POST["editeur"]) ? $_POST["editeur"] : "";
    require '../script/bdd_livres_connect.php';
    require '../script/bdd_users_connect.php';
    $connexion = null;
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="styles.css" rel="stylesheet" type="text/css" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
    </head>
    <body>
        
        <div class="section container-fluid">
            <div class="overlay"></div>
            <header>Formulaire de connexion</header>
            
            <article class="article">
                
                <table>
                    <tr>
                        <td class="td"><label name="login">Login</label></td>
                        <td><input type="text" name="login"/></td>
                    </tr>
                    <tr>
                        <td class="td"><label name="password">Password</label></td>
                        <td><input type="password" name="password"/></td>
                    </tr>
                    <tr>
                        <td class="button"><input type="submit" value="Connexion" name="button1"/></td>
                    </tr>
                

                </table>
                
            </article>
            <article class="article2">
                <table>
                    <tr>
                        <td class="td"><label name="login">Login</label></td>
                        <td><input type="text" name="login"/></td>
                    </tr>
                    <tr>
                        <td class="td"><label name="password">Password</label></td>
                        <td><input type="password" name="password"/></td>
                    </tr>
                    <tr>
                        <td class="button"><input type="submit" value="NewAccount" name="button2"/></td>
                    </tr>
            </article>
        </div>
    </body>
</html>
