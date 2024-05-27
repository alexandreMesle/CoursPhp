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
    if (isset($_GET['id']))
    {
      $chaine = "delete from category where id = " . $_GET['id'];
      $requete = $connexion->prepare($chaine);
      $resultat = $requete->execute();
    }
    header("Location:.");
?>