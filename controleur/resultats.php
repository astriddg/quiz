<?php

include_once('modele/get_quizzes.php');

// le numéro du quiz nous permet de récupérer les questions sans les réponses ainsi que les bonnes réponses.
$idQuiz=intval($_GET['quiz']);

// on récupère les réponses
$reponses_u = $_POST;
$reponses = get_reponses_vraies($idQuiz);


$valide=[];


for ($i=0; $i<count($reponses); $i++) {
	if ($reponses_u[$i+1] == $reponses[$i]['numero_reponse']) {
		$valide[]=1;
	}
	else {
		$valide[]=0;
	}
}
// ici on calcule le pourcentage de bonnes réponses.
$pourcentage = round(array_sum($valide)/count($reponses_u)*100);

$questions = get_questions($idQuiz);
$nom = get_nom($idQuiz);

foreach($questions as $key => $value) {
	$questions[$key]['reponse_u'] = $reponses_u[$key+1];
}



include_once('vue/resultats.php');



