<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>
            Boîte à idées
        </title>
    </head>
    <body>
    <?php
        /*
         * Connexion à la base de données
         */
            require('credentials.php');
            $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $password);
        /*
         * Lecture de données
         */
            $requete = $connexion->prepare('select * from idea');
            $requete->execute();
            $idees = $requete->fetchAll();
        ?>
    <table>
            <tr>
                <th>
                    Nom
                </th>
                <th>
                    Texte
                </th>
            </tr>
            <?php
                /*
                 *  Affichage des idées
                 */
                foreach ($idees as $idee)
                {
                    $url = "show.php?id=" . $idee['id'];
                    ?>
                    <tr>
                        <td>
                            <a href="<?php print($url) ?>">
                                <?php print($idee['nom']) ?>
                            </a>
                        </td>
                        <td>
                            <?php print($idee['texte']) ?>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </table>
        <form method="post" action="insert.php">
            <input name="nom">
            <br>
            <textarea name="texte"></textarea>
            <br>
            <input type="submit" value="Ajouter une idée">
        </form>
    </body>
</html>