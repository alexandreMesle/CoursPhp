<?php
session_start();

// Si le nom est dans la variable de session
if (isset($_SESSION['nom']))
  // On le supprime
  unset($_SESSION['nom']);

header('Location:.');
?>
