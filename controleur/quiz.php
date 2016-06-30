<?php

include_once('modele/get_quizzes.php');

// on récupère le numéro du quiz et grâce à ça, son nom et ses questions et réponses.
$idQuiz=intval($_GET['quiz']);
$questions = get_questions($idQuiz);
$nom = get_nom($idQuiz);

include_once('vue/quiz.php');

