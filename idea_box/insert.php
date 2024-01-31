<?php

    /*
     * Connexion à la base de données
     */
    require('credentials.php');
    $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $password);
    /*
     * Insertion
     */
    if (isset($_POST['category_id'])  && (isset($_POST['nom']) || isset($_POST['texte'])))
    {
      $chaine = "insert into idea (nom, texte, category_id) values('"
          . $_POST['nom'] . "', '" . $_POST['texte'] . "', " . $_POST['category_id']
          . ")";
      $requete = $connexion->prepare($chaine);
      $resultat = $requete->execute();
    }
    header("Location:.");
?>