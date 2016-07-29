<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Votre Quiz</title>
        <link href="vue/style.css" rel="stylesheet" /> 
    <link href="vue/bootstrap.css" rel="stylesheet" />
    <link href="vue/jquery-ui.min.css" rel="stylesheet" /> 
	 
    </head>
        
    <body>
    <div class="container">
    <h1> <?php echo $nom; ?></h1>
    <div>
        <form action="resultats.php?quiz=<?php echo $idQuiz; ?>" method="post" >
        <?php foreach($questions as $questions) { // pour chaque question, on affiche la question puis on regarde comment afficher les réponses en fonction du type de question.
        ?>
            <label for="question<?php echo $questions['numero']; ?>"> <?php echo $questions['question']; ?></label><br>

                <?php switch($questions['type']) { 
                    case '1rep': // type radio si c'est une réponse par question
                        foreach($questions['reponse'] as $cle => $reponse) {
                        ?>
                            <input type="radio" name="<?php echo $questions['numero']; ?>" value="<?php echo $reponse['numero_reponse']; ?>" required><?php echo $reponse['reponse']; ?><br>
                            
                             <?php
                        }
                    break;
                
                    case 'multirep': // type checkbox si c'est un QCM.
                        foreach($questions['reponse'] as $cle => $reponse) {
                        ?>
                            <input type="checkbox" name="<?php echo $questions['numero']; ?>[]" value="<?php echo $reponse['numero_reponse']; ?>"><?php echo $reponse['reponse']; ?><br>
                            
                             <?php
                        }
                    break;

                    case 'nombre': // type text si c'est un chiffre à donner
                        ?>
                        <input type="text" name="<?php echo $questions['numero']; ?>" ><br><?php
                    break;

                    case 'ordre': // Une liste à ordonner (avec l'aide d'un peu de jQuery et JS)
                        ?>
                        <ul id="sortable" class="rankings"> <?php 
                            foreach($questions['reponse'] as $cle => $reponse) {
                            ?>
                                <li id="<?php echo $reponse['numero_reponse']; ?>" class="ranking"> <?php echo $reponse['reponse']; ?></li>
                                 <?php
                            } ?>
                        </ul>
                        <input type="hidden" name="<?php echo $questions['numero']; ?>" value="" id="results" /> <?php

                    break;
                }}
        ?>
        <input type="submit" value="Valider" />
                


        </form>
  
</div>
<script src="vue/jquery-2.2.3.js"></script>
<script src="vue/jquery-ui.min.js"></script>
<script>
$(function() { // cette fonction permet à l'utilisateur d'ordonner la liste puis d'enregistrer la liste choisie sur envoi du formulaire
    $( "#sortable" ).sortable({
  axis: "y",
  stop: function (event, ui) {
            var data = $(this).sortable('toArray');
            $('#results').val(data);
            }
});
    $( "#sortable" ).disableSelection();
    $('form').submit(function(){
     
    $('#results').val($( "#sortable" ).sortable("toArray"));
}); 
});

var ul = document.querySelector('ul'); // ce code permet de randomiser la liste (pour qu'elle n'apparaisse pas toujours dans le bon ordre).
for (var i = ul.children.length; i >= 0; i--) {
    ul.appendChild(ul.children[Math.random() * i | 0]);
}



</script>
</body>
</html>