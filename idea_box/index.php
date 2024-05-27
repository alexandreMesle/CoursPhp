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
         * Informations de connexion
         */
            require('sessions/header.php');
        /*
         * Connexion à la base de données
         */
            require('credentials.php');
            $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $password);
        /*
         * Lecture des catégories
         */
            $requete = $connexion->prepare('select * from category');
            $requete->execute();
            // Création un tableau associatif dont la clé sera l'id des catégories.
            $categories = $requete->fetchAll(\PDO::FETCH_GROUP|\PDO::FETCH_UNIQUE|\PDO::FETCH_ASSOC);
            // var_dump($categories) pour visualiser le tableau
        /*
         * Lecture des idées
         */
            $requete = $connexion->prepare('select * from idea');
            $requete->execute();
            $idees = $requete->fetchAll();
        ?>
    <table>
            <tr>
                <th>
                    Catégorie
                </th>
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
                            <?php
                                // Récupération du nom de la catégorie dont le numéro est category_id
                                $categorie_id = $idee['category_id'];
                                $categorie = $categories[$categorie_id];
                                $categorie_nom = $categorie["nom"];
                            ?>
                            <a href="categories/show.php?id=<?php print($categorie_id) ?>">
                                <?php print($categorie_nom)?>
                            </a>
                        </td>
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
        <?php
            if (count($categories) > 0)
            {
        ?>
            <form method="post" action="insert.php">
                <select name="category_id">
                <?php
                    foreach($categories as $id => $categorie)
                        print('<option value="' . $id . '">' . $categorie['nom'] . '</option>');
                ?>
                </select>
                <br>
                <input name="nom" value="nom">
                <br>
                <textarea name="texte">texte</textarea>
                <br>
                <input type="submit" value="Ajouter une idée">
            </form>
        <?php
            }
            else
                print("Veuillez d'abord créer une catégorie");
        ?>
        <hr>
        <a href="categories/">
            Catégories
        </a>
    </body>
</html>