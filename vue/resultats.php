<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Votre résultat</title>
	<link href="vue/style.css" rel="stylesheet" /> 
    <link href="vue/bootstrap.css" rel="stylesheet" /> 
    </head>
        
    <body>
    <div class="container">

        <h1> Votre résultat </h1>
        <h2> <?php echo $pourcentage."%" ;?> </h2>

        <?php foreach($reponses_u as $key => $value) {  // itération par question pour avoir la réponse.
            ?> <h3><?php echo $questions[$key-1]['0'] ?></h3>

            <p><?php if ($value == 1) {
            echo 'Vous avez coché la bonne réponse : '. $resultats[$key-1]['reponse'] . '<br><br>' ;
            }
            else {
            
            echo 'Vous n\'avez pas coché la bonne réponse, c\'était : '. $resultats[$key-1]['reponse']. '<br><br>' ;
    } ?></p><?php
}
            ?> 

    </div>



</body>
</html>


<!-- 