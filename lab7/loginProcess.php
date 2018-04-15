<?php
    session_start();
    include '../dbConnection.php';
    
    $conn = getDatabaseConnection("heroku_53875b1d81962c9");
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    
    $sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
            
    $np = array(); 
    $np[":username"] = $username; 
    $np[":password"] = $password; 
            
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC); 
    if (empty($record)) {
        echo "<h1> OtterMart - Admin Login </h1>";
        echo "<h3>Wrong username or password!</h3>";
        echo "<form method='POST' action='loginProcess.php'>";
            echo "Username: <input type='text' name='username'/> <br />";
            echo "Password: <input type='password' name='password'/> <br /><br />";
            echo "<input type='submit' name='submitForm' value='Login!' />";
        echo "</form>";
    } else {
            $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
            header("Location:admin.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title> Log In</title>
         <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
    <img id="logo" src="img/ver.png" alt="CSUMB Logo"/>
    </body>
</html>