<?php
function get_quizzes() { // pour récupérer la liste des quiz
	global $bdd;
	$req = $bdd->query('SELECT id, nom FROM Table_quiz');
	$req->execute();
	$quizzes = $req->fetchAll();

	return $quizzes;
}

function get_questions($idQuiz) { // pour récupérer un certain quiz avec ses réponses
	global $bdd;
	$req = $bdd->prepare('SELECT numero_question, question, type 
		FROM Questions WHERE numero_quiz=:idQuiz');
	$req->bindParam(':idQuiz', $idQuiz, PDO::PARAM_INT);
	$req->execute();
	$retour=array(); // on crée le tableau dans lequel on va tout stocker.
	while ($questions = $req->fetch()) // à chaque fois qu'on sort une question, on crée une ligne du tableau avec la question etles réponses
	{
		$req_reponses = $bdd->prepare('SELECT numero_reponse, reponse, vrai FROM Reponses WHERE numero_quiz=:idQuiz AND numero_question=:idQuestion'); // requête PDO pour avoir les réponses
		$req_reponses->bindParam(':idQuiz', $idQuiz, PDO::PARAM_INT);
		$req_reponses->bindParam(':idQuestion', $questions['numero_question'], PDO::PARAM_INT);
		$req_reponses->execute();

		// On fait un tabelau avec la question et les réponses.
		$retour[] = array('numero' => $questions['numero_question'], 'question' => $questions['question'], 'type' => $questions['type'], 'reponse' => $req_reponses->fetchAll());		
		$req_reponses->closeCursor();
	};

	$req->closeCursor();
	return $retour;
}

function get_questions_vrais($idQuiz) { // pour récupérer les questions avec leurs réponses vraies seulement.
	global $bdd;
	$req = $bdd->prepare('SELECT numero_question, type 
		FROM Questions WHERE numero_quiz=:idQuiz');
	$req->bindParam(':idQuiz', $idQuiz, PDO::PARAM_INT);
	$req->execute();
	$retour=array(); // on crée le tableau dans lequel on va tout stocker.
	while ($questions = $req->fetch()) // à chaque fois qu'on sort une question, on crée une ligne du tableau avec la question etles réponses
	{
		$req_reponses = $bdd->prepare('SELECT numero_reponse, reponse FROM Reponses WHERE numero_quiz=:idQuiz AND numero_question=:idQuestion AND vrai=1'); // requête PDO pour avoir les réponses
		$req_reponses->bindParam(':idQuiz', $idQuiz, PDO::PARAM_INT);
		$req_reponses->bindParam(':idQuestion', $questions['numero_question'], PDO::PARAM_INT);
		$req_reponses->execute();

		// On fait un tabelau avec la question et les réponses.
		$retour[] = array('numero_question' => $questions['numero_question'], 'type' => $questions['type'], 'rep' => $req_reponses->fetchAll(), 'reponse' => $req_reponses->fetchAll());		
		$req_reponses->closeCursor();
	};

	$req->closeCursor();
	return $retour;
}

function get_nom($idQuiz) { // pour récupérer les noms des quiz
	global $bdd;
	$req = $bdd->prepare('SELECT nom FROM Table_quiz WHERE id=:idQuiz');
	$req->bindParam(':idQuiz', $idQuiz, PDO::PARAM_INT);
	$req->execute();
	$nom = $req->fetch()[0];
	$req ->closeCursor();
	return $nom;
	
}

function get_reponses_vraies($idQuiz) { // Pour récupérer les bonnes réponses
	global $bdd;
	$req = $bdd->prepare('SELECT numero_reponse, numero_question FROM Reponses WHERE numero_quiz=:idQuiz AND vrai=1');
	$req->bindParam(':idQuiz', $idQuiz, PDO::PARAM_INT);
	$req->execute();
	$resultats = $req->fetchAll();
	return $resultats;
}


