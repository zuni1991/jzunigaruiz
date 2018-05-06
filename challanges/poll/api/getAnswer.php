<?php

   '../../../dbConnection.php';

      $conn = getDatabaseConnection('c9');
      
      $sql = "SELECT * FROM Challenge";
      
      $stmt = $conn->prepare($sql);  
      $stmt->execute();
      $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //print_r($record);  
    
    
     echo json_encode($record);
?>