<?php
/*
 * Vérification de l'existence de id
 */
    if (!isset($_GET['id']) || !is_numeric($_GET['id']))
        header("Location:" . $_SERVER['HTTP_REFERER']);

/*
 * Connexion à la base de données
 */
    require('../credentials.php');
    $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $password);

/*
* Lecture de la catégorie
*/
    $chaine = 'select * from category where id = ' . $_GET["id"];
    $requete = $connexion->prepare($chaine);
    $requete->execute();
    $categorie = $requete->fetch();

/*
* Si la catégorie n'existe pas, retour
*/

if (!$categorie)
  header("Location:" . $_SERVER['HTTP_REFERER']);

/*
 * Lecture des idées
 */
$chaine = 'select * from idea where category_id = ' . $_GET["id"];
$requete = $connexion->prepare($chaine);
$requete->execute();
$idees = $requete->fetchAll();


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
        Idées de la catégorie <?php print($categorie["nom"]) ?>
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
            $url = "../show.php?id=" . $idee['id'];
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
        <a href="..">Accueil</a>
        <a href=".">Catégories</a>
    </body>
</html>
