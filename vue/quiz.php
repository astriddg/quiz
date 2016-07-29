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
        <?php foreach($questions as $questions) {
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

                    case 'nombre':
                        ?>
                        <input type="text" name="<?php echo $questions['numero']; ?>" ><br><?php
                    break;

                    case 'ordre':
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
$(function() {
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



</script>
</body>
</html>