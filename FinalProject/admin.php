<?php
     include 'header.php';
    session_start();
    include '../dbConnection.php';
    $conn = getDatabaseConnection("heroku_53875b1d81962c9");
    
    if(!isset( $_SESSION['adminName'])){
        header("Location:index.php");
    }
    function displayAllProducts(){
        global $conn;
        $sql = "SELECT * FROM books WHERE 1";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $records;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
        <style>
            @import url("css/styles.css");
            form {
                display: inline;
            }
        </style>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete it?");
            }
        </script>
    </head>
    <body>
        <h1> Admin Main Page </h1>
        <h2> Welcome <?=$_SESSION['adminName']?>! </h2>
        <br />
        <form action="addBook.php">
            <input type="submit" name="addproduct" value="Add Book"/>
        </form>
        <form action="index.php">
            <input type="submit"  value="Logout"/>
        </form>
        <br /> <br />
        <h2> Books: </h2> 
        <div id="main">
        <?php $records=displayAllProducts();
            foreach($records as $record) {
                //echo "[<a href='updateBook.php?bookId=".$record['bookId']."'>Update</a>] ";
                echo "<form action='updateBook.php'>";
                echo "<input type='hidden' name='bookId' value= " . $record['bookId'] . " />";
                echo "<input type='submit' value='Update'> ";
                echo "</form>";
                
                //echo "[<a href='deleteBook.php?bookId=".$record['bookId']."'>Delete</a>]";
                echo "<form action='deleteBook.php' onsubmit='return confirmDelete()'>";
                echo "<input type='hidden' name='bookId' value= " . $record['bookId'] . " />";
                echo "<input type='submit' value='Remove'> ";
                echo "</form>";
                
                echo $record['bookName'];
                echo "&nbsp&nbsp&nbsp $";
                echo $record['price'];
                
                echo '<br>';
                       
                
            }
                     echo "current book count is ";
               echo $record['bookId'];
               echo ". \n";
               echo "The next book would be ";
               echo $record['bookId'] + 1;
        ?>
        </div>
    </body>
</html>