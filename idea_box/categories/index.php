<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>
            Boîte à idées - Catégories
        </title>
    </head>
    <body>
    <?php
        require('../sessions/header.php');
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
                                <a href="show.php?id=<?php print($categorie['id'])?>">
                                    <?php print($categorie['nom']) ?>
                                </a>
                            </td>
                            <?php if (isset($_SESSION['user'])){ ?>
                                <td>
                                    <a href="edit.php?id=<?php print($categorie['id'])?>">
                                        Modifier
                                    </a>
                                </td>
                                <td>
                                    <a href="delete.php?id=<?php print($categorie['id'])?>">
                                        Supprimer
                                    </a>
                                </td>
                            <?php } ?>
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
    <?php if (isset($_SESSION['user'])){ ?>
        <a href="create.html">Ajouter</a>
    <?php } ?>
    <a href="../">Retour</a>
    </body>
</html>