<?php
    
     include 'header.php';
    include '../dbConnection.php';
    session_start();
    
$conn = getDatabaseConnection("heroku_53875b1d81962c9");
    
    
    if(isset($_GET['searchForm'])) {
        global $conn;

        $namedParameters = array();
            
        $sql = "SELECT * FROM books WHERE 1";
            
            if (!empty($_GET['bookName'])) { //checks whether user has typed something in the "Product" text box
                 $sql .=  " AND bookName LIKE :bookName";
                 $namedParameters[":bookName"] = "%" . $_GET['bookName'] . "%";
            }

            
             if (isset($_GET['orderBy'])) {
                 
             if ($_GET['orderBy'] == "year"){
                     
                    $sql .= " ORDER BY publishYear";
                    
                 } else {   
                     
                    $sql .= " ORDER BY bookName";
                 }
             }
        
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<html>
    <body>
                <form enctype="text/plain">
                <div class="form-group">
                    <label for="bName"><strong>Book Name</strong></label>
                    <input type="text" class="form-control" name="bookName" id="bName" placeholder="Book Name">
                </div>
    
                <br /><br />
                
                </div>
                <label for="bName"><strong>Sort by: </strong></label><br />
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline3" name="orderBy" value="name"class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline3">Name</label>
                </div>
                <br />
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline4" name="orderBy" value="year"class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline4">Year</label>
                </div>
                <br /><br />
                <input type="submit" name = "searchForm" value="Submit" class="btn btn-default">
                <br /><br />
            </form>

          
<?php
        
        global $items;
        
        if(isset($items)) {
                    
            echo "<hr>";
            echo "<h3>Products Found </h3>"; 
           echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Image: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Price: ";
            echo "<br />";
            echo "<table class='table' >";
            
            foreach ($items as $item) {
                
                
                $itemName = $item['bookName'];
                $itemPrice = $item['price'];
                $itemImage = $item['bookImage'];
                $itemId = $item['bookId'];
                $itemYear = $item['publishYear'];
                
                echo "<tr>";
                echo "<td><img src='$itemImage'></td>";
                echo "<td><h4>$itemName</h4></td>";
                echo "<td><h4>$itemYear</h4></td>";
                echo "<td><h4>$$itemPrice</h4></td>";
                
                echo "<form method='post'>";
                echo "<input type='hidden' name='itemName' value='$itemName'>";
                echo "<input type='hidden' name='itemId' value='$itemId'>";
                echo "<input type='hidden' name='itemImage' value='$itemImage'>";
                echo "<input type='hidden' name='itemYear' value='$itemYear'>";
                echo "<input type='hidden' name='itemPrice' value='$itemPrice'>";

                
                echo "</form>";
                
                echo "</tr>";
            }
            echo "</table>";
        }
    
?>
            
                            
                </body>
</html>