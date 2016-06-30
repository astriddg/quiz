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
  <h1>Les Quiz</h1>
 <table style="margin:auto;">

<?php
foreach($quizzes as $quiz)
{
?>
<tr>
    <td><a href="quiz.php?quiz=<?php echo $quiz['id'];?>"><?php echo $quiz['nom'];?></td>
</tr>

<?php
}
?>
</table>
</div>



</body>
</html>