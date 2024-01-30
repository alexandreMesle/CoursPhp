<?php
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
      $chaine = "insert into category (nom) values('" . $_POST['nom'] . "')";
      $requete = $connexion->prepare($chaine);
      $resultat = $requete->execute();
      var_dump($resultat);
    }
    header("Location:.");
?>