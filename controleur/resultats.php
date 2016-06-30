<?php

include_once('modele/get_quizzes.php');

// on récupère les réponses
$reponses_u = $_POST;
// le numéro du quiz nous permet de récupérer les questions sans les réponses ainsi que les bonnes réponses.
$idQuiz=intval($_GET['quiz']);
$questions = get_questions_simples($idQuiz);
$resultats = get_resultats($idQuiz);
// ici on calcule le pourcentage de bonnes réponses.
$pourcentage = round(array_sum($reponses_u)/count($reponses_u)*100);


include_once('vue/resultats.php');


/*

*/