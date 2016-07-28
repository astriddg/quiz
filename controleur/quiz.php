<?php

include_once('modele/get_quizzes.php');

 error_reporting(E_ALL); ini_set('display_errors', '1');

// on récupère le numéro du quiz et, grâce à ça, son nom et ses questions et réponses.
$idQuiz=intval($_GET['quiz']);


if (isset($_SESSION['quizzes'])) {
	if(in_array($idQuiz, $_SESSION['quizzes'])) {
	echo 'Vous avez déjà tenté votre chance à ce quiz';
	}
	else {
		$questions = get_questions($idQuiz);
		$nom = get_nom($idQuiz);
		include_once('vue/quiz.php');
	}
}


else {
	$questions = get_questions($idQuiz);
		$nom = get_nom($idQuiz);
		include_once('vue/quiz.php');
	}
	

