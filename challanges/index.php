<?php

session_start();
if(rand(1,100) == $_GET["number"])
{
    echo "You've guessed the number!!!!";
}
else{
    echo "Please try again!!";
}
 if( isset($_GET["number"]) )
 {
 echo $_GET['number'];
 }
?>
<!DOCTYPE html>
<html>
    <head>
         <meta charset ="utf-8" />
         <title>Challenge </title>
    </head>
    <body>
        
    <h1>Guess the number between 1 and 100!</h1>
    
 <form action="<?php $_PHP_SELF ?>" method="GET">
 Guess: <input type="text" name="number" />
<input type="submit" value="Guess Number">
</form>
 <form action="<?php $_PHP_SELF ?>" method="GET">
<input type="submit" value="Play Again">
<input type="submit" value="Give up">
</form>

<?php
$_SESSION["rand"] = rand(1,100);
print_r($_SESSION);

?>
    </body>
</html>