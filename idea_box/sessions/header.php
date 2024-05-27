<?php
    /*
     * Activation des variables de session
     */
    session_start();

    /*
     * Hack : les adresses des sessions sont relatives au répertoire courant.
     */
    $directory_url = "sessions";
    if (basename($_SERVER['REQUEST_URI']) == 'categories')
        $directory_url = "../$directory_url";


    /*
     * Si la variable de session 'user' existe
     */
    if (isset($_SESSION['user']))
    {
        /*
         * l'administrateur est déjà connecté
         */
        ?>
        Bonjour <?php print($_SESSION['user']) ?>, <a href="<?php print($directory_url) ?>/logout.php">déconnexion</a>
        <?php
    }
    else
    {
        /*
         * sinon, lien vers le formulaire de connexion
         */
        ?>
        <a href="<?php print($directory_url) ?>/">Connexion</a>
        <?php
    }
?>
<hr>
