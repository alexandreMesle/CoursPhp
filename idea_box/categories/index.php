<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>
            Boîte à idées - Catégories
        </title>
    </head>
    <body>
    <?php
        /*
         * Connexion à la base de données
         */
        require('../credentials.php');
        $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $password);
        /*
         * Lecture de données
         */
        $requete = $connexion->prepare('select * from category');
        $requete->execute();
        $categories = $requete->fetchAll();
        if (count($categories) > 0)
        {
        ?>
        <table>
                <tr>
                    <th>
                        Nom
                    </th>
                </tr>
                <?php
                    /*
                     *  Affichage des catégories
                     */
                    foreach ($categories as $categorie)
                    {
                        ?>
                        <tr>
                            <td>
                                <?php print($categorie['nom']) ?>
                            </td>
                            <td>
                                <a href="delete.php?id=<?php print($categorie['id'])?>">
                                    Supprimer
                                </a>
                            </td>
                        </tr>
                <?php
                        }
                ?>
        </table>
    <?php
        }
        else
            print('Aucune catégorie à afficher');
   ?>
    <hr>
    <a href="create.html">Ajouter</a>
    </body>
</html>