
    <?php
include '../dbConnection.php';
    
    $conn = getDatabaseConnection("heroku_53875b1d81962c9");
    function displayCategories(){
        global $conn;
        
        $sql = "SELECT catId, catName FROM `category` ORDER BY catName";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    
        
        foreach ($records as $record) {
            
            echo "<option value='".$record["catId"]."' >" . $record["catName"] . "</option>";
            
        }
        
    }
    
    function displaySearchResults(){
        global $conn;
        
        if (isset($_GET['searchForm'])) {
            
            echo "<h3>Products Found: </h3>"; 
            
            $namedParameters = array();
            
            $sql = "SELECT * FROM product WHERE 1";
            
            if (!empty($_GET['product'])) { 
                 $sql .=  " AND productName LIKE :productName";
                 $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
            }
                  
                  
             if (!empty($_GET['category'])) { 
                 $sql .=  " AND catId = :categoryId";
                 $namedParameters[":categoryId"] =  $_GET['category'];
            }   
            
            if(!empty($_GET['priceFrom']))
            {
                $sql .= " AND price >= :priceFrom";
                $namedParameters[":priceFrom"] = $_GET['priceFrom'];
            }
            
            if(!empty($_GET['priceTo']))
            {
                $sql .= " AND price <= :priceTo";
                $namedParameters[":priceTo"] = $_GET['priceTo'];
            }
            
            if(isset($_GET['orderBy']))
            {
                if($_GET['orderBy']=="price")
                {
                    $sql .= " ORDER BY price";
                }
            }
            
            if(isset($_GET['order']))
            {
                if($_GET['orderBy']=="name")
                {
                    $sql .= " ORDER BY productName";
                }
            }
             $stmt = $conn->prepare($sql);
             $stmt->execute($namedParameters);
             $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            foreach ($records as $record) {
                
                echo "<a href=\"purchaseHistory.php?productId=".$record['productId']."\"> History </a>"; 
                 echo  $record["productName"] . " " . $record["productDescription"] . " " . $record["price"] .  "<br />";
            
            }
        }
        
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> OtterMart Product Search </title>
 <style>
                @import url("css/style.css");
            </style>
    </head>
    <body>

        <h1>  OtterMart Product Search </h1>
        
        <form>
            
            Product: <input type="text" name="product" /><br />
            
            Category: 
                <select name="category">
                    <option value=""> Select One </option>
                    <?=displayCategories()?>
                </select>
            <br />
            
            Price:  From <input type="text" name="priceFrom" size="7"/>
                    To   <input type="text" name="priceTo" size="7"/>
                    
            <br />
            
             Order result by:<br />
             
             <input type="radio" name="orderBy" value="price"/> Price <br />
             <input type="radio" name="orderBy" value="name"/> Name
             
             <br />
             <input type="submit" value="Search" name="searchForm" />
             
        </form>
        
        <br />
        <hr>
        
        <?= displaySearchResults() ?>

    </body>


</html>