<?php


include_once('modele/get_quizzes.php');

// le numéro du quiz nous permet de récupérer les questions sans les réponses ainsi que les bonnes réponses.
$idQuiz=intval($_GET['quiz']);

// on récupère les réponses
$reponses_u = $_POST;
$reponses = get_questions_vrais($idQuiz); // ici c'est un tableau avec les questions et les réponses vraies seulement.



$valide=[]; // Ici on stockera le nombre de réponses valides

$nombreReponses = []; // Ici le nombre de réponses

for ($i=0; $i<count($reponses_u); $i++) {
	switch ($reponses[$i]['type']) {
		case '1rep': // si c'est une question à réponse simple, le barême est simple, 0 si la réponse est fausse et 1 si elle est vraie.
			if ($reponses_u[$i+1] == $reponses[$i]['reponse'][0]) {
				$valide[]=1;
				$nombreReponses[]=1;
			}
			else {
				$valide[]=0;
				$nombreReponses[]=1;
			}
		break;
		case 'multirep': // En revanche, sur des réponses multiples, on a un point par bonne réponse.
			$comp = array_intersect($reponses_u[$i+1], $reponses[$i]['reponse']);
			$valide[] = count($comp);
			$nombreReponses[]=count($reponses[$i]['reponse']);

		break;
		case 'nombre': // dans le cas d'un nombre à choisir, c'est tout bête, si le nombre correspond à la réponse, on a un point.
			if ($reponses_u[$i+1] == $reponses[$i]['reponse'][0]) {
				$valide[]=1;
				$nombreReponses[]=1;
			}
			else {
				$valide[]=0;
				$nombreReponses[]=1;
			}
		break;
		case 'ordre': // dans le cas de l'ordre, c'est strict, ou bien l'ordre correspond exactement, dans ce cas on a un point, ou alors on n'a rien
			$reponses_u[$i+1] = explode(',', $reponses_u[$i+1]);
			if ($reponses_u[$i+1] == $reponses[$i]['reponse']) {
				$valide[]=1;
				$nombreReponses[]=1;
				$reponses_u[$i+1] = 1;
			}
			else {
				$valide[]=0;
				$nombreReponses[]=1;
				$reponses_u[$i+1] = 0;
			}
		break;

	}
	
}




// ici on calcule le pourcentage de bonnes réponses.
$pourcentage = round(array_sum($valide)/array_sum($nombreReponses)*100);

// on récupère les questions, leurs réponses ainsi que le nom du quiz
$questions = get_questions($idQuiz);
$nom = get_nom($idQuiz);


// On rentre les réponses utilisateurs dans le tableau $questions.
foreach($questions as $key => $value) {
	$questions[$key]['reponse_u'] = $reponses_u[$key+1];
}

if (!isset($_SESSION['quizzes'])) { 
	$_SESSION['quizzes'] = [];
}

$resultat = array('nom du quiz' => $nom, 'résultat' => $pourcentage); // on crée la variable qui permettra de stocker les résultats des quiz.

array_push($_SESSION['quizzes'], $resultat); // et on rentre ces résultats dans une variable session.


include_once('vue/resultats.php');

