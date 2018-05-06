<?php

   include '../../dbConnection.php';

      $conn = getDatabaseConnection('heroku_53875b1d81962c9');
      
      $sql = "SELECT * FROM pets WHERE id = :id";
      
      $stmt = $conn->prepare($sql);  
      $stmt->execute(array(":id"=>$_GET['id']));
      $record = $stmt->fetch(PDO::FETCH_ASSOC);
      //print_r($record);  
    
    
     echo json_encode($record);
?>