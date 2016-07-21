<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Votre Quiz</title>
        <link href="vue/style.css" rel="stylesheet" /> 
    <link href="vue/bootstrap.css" rel="stylesheet" /> 
	 
    </head>
        
    <body>
    <div class="container">
    <h1> <?php echo $nom; ?></h1>
    <div>
        <form action="resultats.php?quiz=<?php echo $idQuiz; ?>" method="post" >
        <?php foreach($questions as $questions) {
        ?>
            <label for="question<?php echo $questions['numero']; ?>"> <?php echo $questions['question']; ?></label><br>

                <?php foreach($questions['reponse'] as $cle => $reponse) {
                ?>
                <input type="radio" name="<?php echo $questions['numero']; ?>" value="<?php echo $reponse['numero_reponse']; ?>"><?php echo $reponse['reponse']; ?><br>
                
                 <?php
                }

       
        }
        ?>
        <input type="submit" value="Valider" />
                


        </form>
  
</div>
</body>
</html>