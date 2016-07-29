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

                <?php switch ($value['type']) {
                        case '1rep':
                            // si la question est à choix simple, alors on aura juste à comparer deux valeurs
                            foreach($value['reponse'] as $cle => $reponse) { 
                                if( $reponse['numero_reponse'] == $value['reponse_u'] AND $reponse['vrai'] == true) { ?>
                                    <!-- Si la réponse est bonnne, elle est en vert et en gras -->
                                    <li style="font-weight: bold; color:green" > <?php echo $reponse['reponse']?> </li> <?php

                                }
                                elseif( $reponse['numero_reponse'] == $value['reponse_u']) { ?>
                                    <!-- Si la réponse est mauvaise, elle est en rouge -->
                                    <li style="color:red" > <?php echo $reponse['reponse']?> </li> <?php
                                }
                                elseif( $reponse['vrai'] == true) { ?>
                                    <!-- Si la bonne réponse n'a pas été choisie, elle est en vert -->
                                    <li style="color:green" > <?php echo $reponse['reponse']?> </li> <?php
                                }
                                else { ?>

                                    <li > <?php echo $reponse['reponse']?> </li> <?php
                                }
                            } ?> <hr/><?php
                        break;

                        case 'multirep': ?>
                        <ul> <?php

                            foreach($value['reponse'] as $cle => $reponse) { 

                                if( in_array($reponse['numero_reponse'], $value['reponse_u']) AND $reponse['vrai'] == true) { ?>

                                    <li style="font-weight: bold; color:green" > <?php echo $reponse['reponse']?> </li> <?php

                                }
                                elseif( in_array($reponse['numero_reponse'], $value['reponse_u'])) { ?>

                                    <li style="color:red" > <?php echo $reponse['reponse']?> </li> <?php
                                }
                                elseif( $reponse['vrai'] == true) { ?>

                                    <li style="color:green" > <?php echo $reponse['reponse']?> </li> <?php
                                }
                                else { ?>

                                    <li > <?php echo $reponse['reponse']?> </li> <?php
                            }
                        } ?></ul> <hr/><?php
                        break;

                        case 'nombre':
                            if ($value['reponse'][0]['reponse'] == $value['reponse_u']) { ?>
                                <li style="font-weight: bold; color:green" > <?php echo $value['reponse'][0]['reponse'] ?> </li> <?php
                            }
                            else { ?>
                                <li style="font-weight: bold; color:red" > <?php echo $value['reponse'][0]['reponse'] ?> </li> <?php
                            }
                        break;

                        case 'ordre':
                            if($value['reponse_u'] == 1) { 
                                foreach($value['reponse'] as $cle => $reponse) {  ?>
                                    <li style="font-weight: bold; color:green" > <?php echo $reponse['reponse'] ?> </li> <?php
                                }
                                
                            }
                            else { 
                                foreach($value['reponse'] as $cle => $reponse) {  ?>
                                    <li style="font-weight: bold; color:red" > <?php echo $reponse['reponse'] ?> </li> <?php
                                }
                            }
                        break;

                 
                    }
                    

                } ?>
            <a href="accueil.php" class="btn btn-success"> Retourner à l'accueil</a>
            </div>



        </body>
        </html>


<!-- 