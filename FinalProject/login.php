<?php
     include 'header.php';
     ?>
<!DOCTYPE html>
<html>
    
    <body>
        <h1>Admin Login </h1>
        
        <form method="POST" action="loginProcess.php">
            Username: <input type="text" name="username"/> <br /><br />
            Password: <input type="password" name="password"/> <br /><br />
            
             <input type="submit" name="submitForm" value="Login!" />
        </form>
       
    </body>
</html>