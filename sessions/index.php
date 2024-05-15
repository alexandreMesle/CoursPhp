<?php
session_start();

// Si le nom a été passé en paramètre
if (isset($_GET['nom']))
  // On l'écrit dans la variable de session
  $_SESSION['nom'] = $_GET['nom'];

// Si le nom est écrit dans une variable de session
if (isset($_SESSION['nom']))
  // On l'affiche sur la page
  print("Bonjour " . $_SESSION['nom'] . ", <a href='delete.php'>effacer</a><br>");

print("Pour changer ton nom, ajoute <code>?nom=tonnom<code> à la fin de l'adresse");
?>
