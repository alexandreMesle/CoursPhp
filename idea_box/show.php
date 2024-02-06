<?php
/*
 * Vérification de l'existence de id
 */
    if (!isset($_GET['id']) || !is_numeric($_GET['id']))
        header("Location:.");
/*
 * Connexion à la base de données
 */
    require('credentials.php');
    $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $password);
/*
 * Lecture de l'idée
 */
    $chaine = 'select * from idea where id = ' . $_GET["id"];
    $requete = $connexion->prepare($chaine);
    $requete->execute();
    $idee = $requete->fetch();

/*
 * Si l'idée n'existe pas, retour
 */
    if (!$idee)
        header("Location:.");

/*
* Lecture de la catégorie
*/
    $chaine = 'select * from category where id = ' . $idee["category_id"];
    $requete = $connexion->prepare($chaine);
    $requete->execute();
    $categorie = $requete->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>
            Boîte à idées
        </title>
    </head>
    <body>
        <table>
            <tr>
                <td>
                    Catégorie :
                </td>
                <td>
                    <?php print($categorie["nom"]) ?>
                </td>
            </tr>
            <tr>
                <td>
                    Nom :
                </td>
                <td>
                  <?php print($idee["nom"]) ?>
                </td>
            </tr>
            <tr>
                <td>
                    Texte :
                </td>
                <td>
                  <?php print($idee["texte"]) ?>
                </td>
            </tr>
        </table>
        <a href=".">Retour</a>
    </body>
</html>