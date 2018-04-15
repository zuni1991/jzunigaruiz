<?php
session_start();
//session_destroy();
//print_r($_SESSION);

if (!isset($_SESSION['randomNumber']) || isset($_GET['reset'])) {
$_SESSION['randomNumber'] = rand (1,5);
$_SESSION['tries'] = 0;
}

if (isset($_GET['giveUp'])) {
echo "<h3> The number was: <br />";
echo $_SESSION['randomNumber'] . "</h3>";
}

function compareNumbers($guess,$number) {
if ($guess > $number) {
echo "<strong style='color:red'>The number should be lower</strong> <br />";
} else if ($guess < $number) {
echo "<strong style='color:red'>The number should be higher</strong> <br />";
} else {
  echo "<strong style='color:green'>You've guessed the   number!</strong> <br />";
  $_SESSION['numberGuessed'][] = $number;
  $_SESSION['totalTries'][] = $_SESSION['tries'];
}
}

 


?>
<!DOCTYPE html>
<html>
<head>
<title>Guess the Numbers</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<blockquote>
<h2> Guess a number between 1 and 100!</h2>
<form>

Guess: <input type="text" name="guess" size="5"/>
<br /><br />

<input type="submit" value="Guess Number" name="guessForm"/>
<br /><br />
<input type="submit" value="Give Up" name="giveUp"/>
<input type="submit" value="Play Again" name="reset"/>

</form>
<?php
if (isset($_GET['guessForm'])) {
echo "<br /><hr>Number of tries: " . ++$_SESSION['tries'] . "<br />";
compareNumbers( $_GET['guess'],$_SESSION['randomNumber']);
}
?>

<hr>

<?php

if (isset($_SESSION['numberGuessed'])) {
echo "<h3> Guesses History </h3>";
for ($i=0; $i < count($_SESSION['numberGuessed']); $i++ ) {
echo "You guessed the number " . $_SESSION['numberGuessed'][$i] . " in ". $_SESSION['totalTries'][$i] . " attempts <br />";
}

}
?>
</blockquote>
</body>
</html>