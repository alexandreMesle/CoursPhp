<?php
session_start();
if (!isset($_SESSION['user']))
    die("Il faut être connecté pour accéder à cette page.");