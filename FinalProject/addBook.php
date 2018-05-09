<?php
    include '../dbConnection.php';
    $connection = getDatabaseConnection("heroku_53875b1d81962c9");
    
    if (isset($_GET['addBook'])) {
        
   $sql = "INSERT INTO books
                ( `bookId`, `bookName`, `bookPublisher`, `publishYear`, `bookImage`,`price`,`genreId`, `authorId`) 
                 VALUES ( :bookId, :bookName, :bookPublisher, :publishYear, :bookImage, :price, :genreId, :authorId)";
        $np = array();
        
        $np[":bookName"] = $_GET['bookName'];
        $np[":bookPublisher"] = $_GET['bookPublisher'];
        $np[":publishYear"] = $_GET['publishYear'];
        $np[":bookImage"] = $_GET['bookImage'];
        $np[":price"] = $_GET['price'];
        $np[":genreId"] = $_GET['genreId'];
        $np[":authorId"] = $_GET['authorId'];
        $np[":bookId"] = $_GET['bookId'];
   
      $statement = $connection->prepare($sql);
        $statement->execute($np);
  
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
        <title>Update Product </title>
    </head>
       <style>
            @import url("css/styles.css");
        </style>
    <body>
        <h1>Add New Book</h1>
        <form method="POST" action="admin.php">    
            <input type="submit" name="returnAdmin" value="Go Back"><br /><br />
        </form>
        <div id="main">
        <form>
            Book ID: <input type="text" value = "<?=$product['bookId']?>" name="bookId"><br>
            Book name: <input type="text" value = "<?=$product['bookName']?>" name="bookName"><br>
            Price: <input type="text" name="price" value = "<?=$product['price']?>"><br>
            publishYear: <input type="text" name="publishYear" value = "<?=$product['publishYear']?>"><br>
            Set Image Url: <input type = "text" name = "bookImage" style="width: 370px;" value = "<?=$product['bookImage']?>"><br>
            Book Publisher: <input type = "text" name = "bookPublisher" style="width: 370px;" value = "<?=$product['bookPublisher']?>"><br>
             Genre Id 1-7: <input type = "text" name = "genreId" style="width: 370px;" value = "<?=$product['genreId']?>"><br>
             Author Id 1-12: <input type = "text" name = "authorId" style="width: 370px;" value = "<?=$product['authorId']?>"><br>
       
           <input type="submit" name="addBook" value="Add Book">
        </form>
        </div>
    </body>
</html>