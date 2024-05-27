<?php
    /*
    * Si le formulaire n'est pas rempli, on renvoit l'utilisateur sur le formulaire de connnexion
    */
    if (!isset($_POST['login']) && !isset($_POST['password']))
        header("Location:.");

    /*
    * Si les identifiants de connexion sont bien ceux attendus
    */

    if ($_POST['login'] == 'admin' && $_POST['password'] == 'password')
    {
        ?>
        Connexion acceptée.
        <?php
    }
    else
    {
        ?>
        Identifiants de connexion incorrects.
        <a href=".">Recommencer.</a>
        <?php
    }
?>