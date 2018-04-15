<?php
    session_start();
    include "../dbConnection.php";
    $conn = getDatabaseConnection("heroku_53875b1d81962c9");
    
    if(!isset( $_SESSION['adminName'])){
    header("Location:index.php");
    }
    function getCategories() {
        global $conn;
        $sql = "SELECT catId, catName from category ORDER BY catName";
    
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
            echo "<option value='".$record["catId"] ."'>". $record['catName'] ." </option>";
        }
    }
    if (isset($_GET['submitProduct'])) {
        $productName = $_GET['productName'];
        $productDescription = $_GET['description'];
        $productImage = $_GET['productImage'];
        $productPrice = $_GET['price'];
        $catId = $_GET['catId'];
    
        $sql = "INSERT INTO om_product
                ( `productName`, `productDescription`, `productImage`, `price`, `catId`) 
                 VALUES ( :productName, :productDescription, :productImage, :price, :catId)";
    
        $namedParameters = array();
        $namedParameters[':productName'] = $productName;
        $namedParameters[':productDescription'] = $productDescription;
        $namedParameters[':productImage'] = $productImage;
        $namedParameters[':price'] = $productPrice;
        $namedParameters[':catId'] = $catId;
        $statement = $conn->prepare($sql);
        $statement->execute($namedParameters);
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
        <title> Add a product </title>
    </head>
       <style>
            @import url("css/styles.css");
        </style>
    <body>
        <h1> Add a product</h1>
        <form method="POST" action="admin.php">    
            <input type="submit" name="returnAdmin" value="Go Back"><br /><br />
        </form>
        <div id="main">
        <form><br />
            Product name: <input type="text" name="productName"><br>
            Description: <br><textarea name="description" cols = 50 rows = 4></textarea><br>
            Price: <input type="text" name="price"><br>
            Category: <select name="catId">
                <option value="">Select One</option>
                <?php getCategories(); ?>
            </select> <br />
            Set Image Url: <input type = "text" name = "productImage"><br><br />
        </form>
        </div>
        <form><br />
            <input type="submit" name="submitProduct" value="Add Product"><br />
        </form>
        <img id="logo" src="img/ver.png" alt="CSUMB Logo"/>
    </body>
</html>