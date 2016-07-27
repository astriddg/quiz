<?php
session_start();

include_once('modele/connexion_sql.php');

$idQuiz=intval($_GET['quiz']);

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('controleur/quiz.php');
}

