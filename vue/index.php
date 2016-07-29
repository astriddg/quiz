<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Les Quiz</title>
	<link href="vue/style.css" rel="stylesheet" /> 
    <link href="vue/bootstrap.css" rel="stylesheet" /> 
    </head>
        
    <body>
    <div class="container">
    <div >
  <h1>Les Quiz</h1> <!-- La table des quiz -->
 <table style="margin:auto; border: 1px solid black">

<?php
foreach($quizzes as $quiz)
{
?>
<tr>
    <td style="border: 1px solid black"><a href="quiz.php?quiz=<?php echo $quiz['id'];?>"><?php echo $quiz['nom'];?></a></td>
</tr>

<?php
}
?>
</table>
<br>
<br>
<table style="margin:auto; border: 1px solid black">
<tr>
<th> Nom du Quiz</th>
<th> Résultat</th>
</tr>




<h2>Les Quiz</h2> <?php // la table des résultats 
foreach($_SESSION['quizzes'] as $quiz)
{
?>
<tr>
    <td style="border: 1px solid black"><?php echo $quiz['nom du quiz']?> </td>
    <td style="border: 1px solid black"><?php echo $quiz['résultat']?>% </td>
</tr>

<?php
}
?>
</table>
</div>



</body>
</html>