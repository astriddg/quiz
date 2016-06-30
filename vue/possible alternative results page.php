 

                 <?php foreach($questions as $questions) {
            ?><h4><?php echo $questions['question']; ?></h4>
            <ul>
               <?php 
               
               foreach ($questions['reponse'] as $cle => $reponse) {
                    ?><li style="color: <?php if($reponse['vrai']==1 && $reponse['vrai']==$reponses_u) {
                        echo 'green';
                    }
                    elseif ($reponse['vrai']==$reponses_u) {
                        echo 'red';
                    }
                    else {
                        echo 'black';
                    }
                    ?>" ><?php echo $reponse['reponse']; ?></li> 
                <?php } 

                    }?>



