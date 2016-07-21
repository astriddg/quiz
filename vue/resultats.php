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

        <?php foreach($questions as $key => $value) {
        ?>
            <p><strong><?php echo $value['question']; ?></strong></p>
            <p>
            <ul>

                <?php foreach($value['reponse'] as $cle => $reponse) { 
                    if( $reponse['numero_reponse'] == $value['reponse_u'] AND $reponse['vrai'] == true) { ?>

                    <li style="color:green" > <?php echo $reponse['reponse']?> </li> <?php

                }
                elseif( $reponse['numero_reponse'] == $value['reponse_u']) { ?>

                    <li style="color:red" > <?php echo $reponse['reponse']?> </li> <?php
                }
                else { ?>

                    <li > <?php echo $reponse['reponse']?> </li> <?php
                }
            } ?> <hr/><?php
            } ?>

    </div>



</body>
</html>


<!-- 