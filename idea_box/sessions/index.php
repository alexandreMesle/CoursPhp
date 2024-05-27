<?php
    /*
    * Activation des variables de session
    */
    session_start();

    /*
     * Si la variable de session 'user' existe
     */
    if (isset($_SESSION['user']))
    {
        /*
         * l'administrateur est déjà connecté
         */
        ?>
        Vous êtes déjà connecté.
        <a href="..">Retour</a>
        <a href="logout.php">Déconnexion</a>
        <?php
    }
    else
    {
        /*
         * sinon, on affiche le formulaire de connexion
         */
        ?>
        <form action="login.php" method="post">
            <input type="text" name="login">
            <input type="password" name="password">
            <input type="submit" value="Connexion">
        </form>
        <?php
    }
?>