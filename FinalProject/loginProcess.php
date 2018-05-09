<?php
    session_start();
    include 'header.php';
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
        echo "<h1>Admin Login </h1>";
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
    <body>
    </body>
</html>