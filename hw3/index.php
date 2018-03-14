<?php
 if( isset($_GET["name"]) && isset($_GET["age"] ))
 {
 echo "Welcome ". $_GET['name']. "<br />";
 echo "You are ". $_GET['age']. " years old. <br />";
 }
  if( isset($_GET["cs"]))
 {
 echo "Your Favorite Subject is Computer Science. <br />";

 }
   if( isset($_GET["english"]) )
 {
 echo "Your Favorite Subject is English<br />";

 }
    if( isset($_GET["math"]) )
 {
 echo "Your Favorite Subject is Math<br />";

 }
    if( isset($_GET["ab"]) )
 {
 echo "Your average grades are A's.<br />";
 echo "Keep it up!! Another ONE!!! Another ONE!<br />";

 }
     if( isset($_GET["bb"]) )
 {
 echo "Your average grades are B's<br />";
 echo "Keep it up!! Another ONE!!! Another ONE!<br />";

 }
     if( isset($_GET["cb"]) )
 {
 echo "Your average grades are C's<br />";

 }
     if( isset($_GET["db"]) )
 {
 echo "Your average grades are D's<br />";

 }
     if( isset($_GET["fb"]) )
 {
 echo "Your average grades are F's you have to try harder!!<br />";

 }
     if( isset($_GET["yes"]) )
 {
echo "Don't worry we can keep a secret " . $_GET['name']. ".<br/>";

 } 
      if( isset($_GET["no"]) )
 {
echo "Thank You for your opinions " . $_GET['name']. " have a great day!.<br/>";

 } 
 
 

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset ="utf-8" />
        <title> HW3: </title>

        
        </head>
<!-- closing head -->

    <!-- This is the body -->
    <!-- This is where we place the content of our website -->
    <body>
        <style>
@import url("css/styles.css");
</style>
        <header>
            <h1>CSUMB Questionaire!!!  </h1>
        </header>
        
        <hr width = "100%" />
<fieldset>
 <form action="<?php $_PHP_SELF ?>" method="GET">
 Name: <input type="text" name="name" />
 Age: <input type="text" name="age" />

<h3>What is your major??</h3>
 Computer Science Major <input type="radio" name="cs" />
 English <input type="radio" name="english" />
 Math <input type="radio" name="math"/>


<h3>Please enter your average grades:</h3>
A <input type="checkbox" name="ab"/>
B <input type="checkbox" name="bb"/>
C <input type="checkbox" name="cb"/>
D <input type="checkbox" name="db"/>
F <input type="checkbox" name="fb"/>


<h3>Choose your favorite Subject:</h3>
Computer Science <input type="radio" name="computer"/>
Math <input type="radio" name="math"/> <br></br>


<label for="location">Choose your class location?</label>
<select id="location" name="select">
<option value="1">Bit Building</option>
<option value="2">Library </option>
<option value="3">Cultural Studies</option>
<option value="4">Gym</option>
</select>
<h4>Turn in anonymously?</h4>
Yes <input type="radio" name="yes"/>
No <input type="radio" name="no"/> <br></br>

<input type="submit">
</fieldset>
        
    </body>
    <!-- closing body -->

</html>