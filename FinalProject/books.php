<?php

    include 'header.php';
    
    include '../dbConnection.php';
    
    function getAllBooks(){
        
      $conn = getDatabaseConnection('heroku_53875b1d81962c9');
      
      $sql = "SELECT bookId, bookName FROM books ORDER BY bookName";
      
      $stmt = $conn->prepare($sql);  
      $stmt->execute();
      $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $records;  
    }
    
?>

<script>
    
       $(document).ready(function(){
    
            
            $(".bookLinks").click(function(){
                
                //alert(  );
                
                $('#bookModal').modal("show");
                $("#bookInfo").html("<img src='img/loading.gif'>");
                      
                
                $.ajax({

                    type: "GET",
                    url: "checkCredentials.php",
                    dataType: "json",
                    data: { "id": $(this).attr("id")},
                    success: function(data,status) {
                
                       $("#bookModalLabel").html("<h2>" + data.name +"</h2>");
                       $("#bookInfo").html("");
                       $("#bookInfo").append("<img src='img/" + data.pictureURL +"' width='150' style='float:left'>");
                       
                       
                    
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                    //alert(status);
                    }
                    
                });//ajax
                
                
            });
        
        
    }); //document ready
    
    
</script>

<style>
    #adopt {
        margin: 0 auto;
        text-align:left;
        width: 600px;
        height: 60px;
        position: relative;
        border: 2px solid black;
        background-color: rgba(0, 0, 0, .08);
        border-radius: 10px;
        padding-left: 10px;
    }
    #adoptButton {
        margin-top:8px;
        margin-right:8px;
        position: absolute;
        right: 0px;
    }
</style>
<?php
    $bookList = getAllBooks();
    
    
    foreach ($bookList as $book) {

        echo "Name: <a href='#' class='booklink' id='".$book['bookId']."'  > " . $book['bookName'] . " </a> <br>";
        
    }

?>


<!-- Modal -->
<div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
        <div id="bookInfo"></div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

