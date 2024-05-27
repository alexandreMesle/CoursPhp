<?php
    /*
     * Activation des variables de session
     */
    session_start();

    /*
     * Chargement des identifants de connexion de l'administrateur
     */
    require('../credentials.php');

    /*
    * Si l'utilisateur est déjà connecté
    */
    if (isset($_SESSION['user']))
        header("Location:../");

    /*
    * Si le formulaire n'est pas rempli, on renvoit l'utilisateur sur le formulaire de connnexion
    */
    if (!isset($_POST['login']) && !isset($_POST['password']))
        header("Location:.");

    /*
    * Si les identifiants de connexion sont bien ceux attendus
    */

    if ($_POST['login'] == 'admin' && $_POST['password'] == $adminpassword)
    {
        /*
         * on l'enregistre dans une variable de session.
         */
        $_SESSION['user'] = 'admin';
        header("Location:..");
    }
    else
    {
        ?>
        Identifiants de connexion incorrects.
        <a href=".">Recommencer.</a>
        <?php
    }
?>