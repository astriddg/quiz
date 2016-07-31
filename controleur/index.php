<?php

include_once('modele/get_quizzes.php');

// on récupère les quiz
$quizzes = get_quizzes();


include_once('vue/index.php');

