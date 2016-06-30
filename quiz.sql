-- Tables
CREATE TABLE Table_quiz (
	id INT UNSIGNED AUTO_INCREMENT,
	nom VARCHAR(200) NOT NULL,
	PRIMARY KEY(id)
);

CREATE TABLE Questions (
	id INT UNSIGNED AUTO_INCREMENT,
	numero_quiz INT UNSIGNED NOT NULL,
	numero_question INT UNSIGNED NOT NULL,
	question VARCHAR(200) NOT NULL,
	PRIMARY KEY(id)
);

CREATE TABLE Reponses (
	id INT UNSIGNED AUTO_INCREMENT,
	numero_quiz INT UNSIGNED NOT NULL,
	numero_question INT UNSIGNED NOT NULL,
	reponse VARCHAR(200) NOT NULL,
	vrai TINYINT(1) NOT NULL,
	PRIMARY KEY(id)
);

-- Clés étrangères

ALTER TABLE Questions
ADD CONSTRAINT fk_question_quiz FOREIGN KEY (numero_quiz) REFERENCES Table_quiz(id);

ALTER TABLE Reponses
ADD CONSTRAINT fk_reponse_quiz FOREIGN KEY (numero_quiz) REFERENCES Table_quiz(id),
ADD CONSTRAINT fk_reponse_question FOREIGN KEY (numero_question) REFERENCES Questions(id);


-- Insertion de quizzes

INSERT INTO Table_quiz (nom) VALUES 
('Tout savoir sur Brexit'),
('Connaissez-vous bien Donald Trump ?'),
('Les sujets du bac');

INSERT INTO Questions (numero_quiz, numero_question, question) VALUES
(1, 1, 'Que va être la question du référundum ?'),
(1, 2, 'Quand se déroulera le vote ?'),
(1, 3, 'Quand aurons-nous les résultats ?'),
(1, 4, 'Si le résultat est « oui », quand la décision prendra-t-elle effet ?'),
(1, 5, 'Qui peut voter ?'),
(1, 6, 'De ces personnages célèbres, qui est pour Brexit ?'),
(1, 7, 'Quel évènement a provoqué un changement important dans les sondages une semaine avant le vote ?'),
(1, 8, 'Quelles seront les conséquences pour le Royaume-Uni ?'),
(2, 1, 'Qui a fondé l\'empire Trump ?'),
(2, 2, 'Quelle position a-t-il dans sa fratrie ?'),
(2, 3, 'Pourquoi n\'a-t-il pas participé à la guerre du Viet Nam'),
(2, 4, 'Combien de femmes a-t-il eu ?'),
(2, 5, 'Laquelle de ces citations ne vient pas de Trump ?'),
(3, 1, 'Quel sujet était donné aux L en philo cette année ?'),
(3, 2, 'Sur quel sujet d\'histoire les ES ont-ils du plancher cette année ?'),
(3, 3, 'Quel est l\'un des sujets à traîter en SVT pour les terminales S de cette année ?');


INSERT INTO Reponses (numero_quiz, numero_question, reponse, vrai) VALUES
(1, 1, 'Aimez-vous l\'Union Européenne ?', 0),
(1, 1, 'Le Royaume-Uni doit-il quitter ou rester dans l\'Union Européenne', 1),
(1, 1, 'l\'Union Européenne doit-elle être démantelée ?', 0),
(1, 1, 'Faut-il changer la gouvernance de l\'Union Européenne ?', 0),
(1, 2, 'Le 23 juin 2016', 1),
(1, 2, 'Le 24 juin 2016', 0),
(1, 2, 'Le 11 juin 2016', 0),
(1, 2, 'Le 24 juin 2017', 0),
(1, 3, 'Le soir du vote à 22h', 0),
(1, 3, 'Le lendemain à 7h', 1),
(1, 4, 'Immédiatement', 0),
(1, 4, 'Le lundi suivant', 0),
(1, 4, 'Le gouvernement a jusqu\'au 1e janvier 2017 pour se préparer à efféctuer cette décision', 0),
(1, 4, 'Le gouvernement a deux ans pour se préparer à efféctuer cette décision', 1),
(1, 5, 'Tout citoyen britannique, irlandais ou du Commonwealth résidant au Royaume-Uni', 1),
(1, 5, 'Tout citoyen britannique ou de l\'Union Européenne résidant au Royaume-Uni', 0),
(1, 5, 'Toute personne résidant au Royaume-Uni depuis plus de 15 ans.', 0),
(1, 6, 'David Cameron', 0),
(1, 6, 'Richard Branson', 0),
(1, 6, 'Boris Johnson', 1),
(1, 6, 'Kristen Scott-Thomas', 0),
(1, 7, 'L\'élection de Donald Trump à la présidence des Etats-Unis', 0),
(1, 7, 'Le meurtre de Jo Cox, membre du parlement Britannique et pro-Europe', 1),
(1, 7, 'Le démarrage de l\'Euro 2016', 0),
(1, 8, 'Mauvaises', 0),
(1, 8, 'Bonnes', 0),
(1, 8, 'Personne ne sait vraiment', 1),
(2, 1, 'L\'arrière-grand-père de Donald, Philipp Trump, qui crée la « Trump Tower Organisation »', 0),
(2, 1, 'La grand-mère de Donald, Elizabeth, qui crée « Elizabeth Trump and Sons »', 1),
(2, 1, 'Donald Trump', 0),
(2, 2, 'Il est le troisième sur quatre', 1),
(2, 2, 'Il est l\'ainé', 0),
(2, 2, 'Il est le dernier sur 5', 0),
(2, 2, 'Il est au milieu d\'une fratrie de trois', 0),
(2, 3, 'Il était contre cette guerre', 0),
(2, 3, 'A cause de sa mauvaise santé', 0),
(2, 3, 'Il avait reçu un très haut numéro à la lotterie de guerre, ce qui veut dire que son tour d\'enrôlement arrive trop tard.', 1),
(2, 4, '3', 1),
(2, 4, '5', 0),
(2, 4, '2', 0),
(2, 5, 'Le concept de réchauffement climatique a été créé par et pour les Chinois dans le but de rendre l\'industrie américaine non-compétitive.', 0),
(2, 5, 'Si les Iraniens attaquaient Israël avec une arme nucléaire, nous riposterions à l\'Iran. [...] Nous pourrions totalement les anéantir.', 1),
(2, 5, 'Comment peut-elle satisfaire son pays si elle ne satisfait pas son mari ?', 0),
(2, 5, 'Une source extrêmement crédible a téléphoné mon bureau et m’a dit que le certificat de naissance de est faux.', 0),
(2, 5, 'On pouvait voir du sang sortir de ses yeux, du sang sortir de son... où que ce soit', 0),
(3, 1, '"Nos convictions morales sont-elles fondées sur l\'expérience ?"', 1),
(3, 1, '"Respecter tout être vivant, est-ce un devoir moral ?"', 0),
(3, 2, '"En vous appuyant sur les exemples étudiés au cours de l\’année, vous traiterez le sujet suivant : médias et opinion publique dans les grandes crises politiques en France depuis l\’Affaire Dreyfus"', 1),
(3, 2, '"En vous appuyant sur le cas du produit mondialisé étudié dans l\’année, vous présenterez la mondialisation en fonctionnement"', 0),
(3, 3, '"Préciser l\’origine de l\’énergie interne de la Terre, présenter ses modes de transfert vers la surface et expliquer pourquoi certaines zones du globe sont favorables à son exploitation géothermique."', 0);














