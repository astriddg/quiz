<?php

session_start();
include_once('modele/connexion_sql.php');

 error_reporting(E_ALL); ini_set('display_errors', '1');

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('controleur/resultats.php');
}