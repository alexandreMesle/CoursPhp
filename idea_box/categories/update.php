<?php
    require('../sessions/admin_only.php');
    /*
     * Connexion à la base de données
     */
    require('../credentials.php');
    $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $password);
    /*
     * Insertion
     */
    if (isset($_POST['nom']))
    {
      $chaine = "update category set nom = '" . $_POST['nom'] . "' where id = " . $_GET['id'];
      $requete = $connexion->prepare($chaine);
      $resultat = $requete->execute();
    }
    header("Location:.");
?>