
<?php

    function getRandomColor() {
        
       echo " rgba(".rand(0,255).", ".rand(0,255)." ,".rand(0,255).",".(rand(0,100)/100).");";

    }


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Random Color </title>
        
        <style>
        
            
            
            body {
            
                <?php
                
                    $red = rand(0,255);
                    $green = rand(0,255);
                    echo "background-color: rgba(".rand(0,255).", ".rand(0,255)." ,".rand(0,255).",".(rand(0,100)/100).");";
                
                ?>
                
                
            }
            
            h1 {
            
                <?php
                
                    $red = rand(0,255);
                    $green = rand(0,255);
                    echo "background-color: rgba(".rand(0,255).", ".rand(0,255)." ,".rand(0,255).",".(rand(0,100)/100).");";
                    echo "color: rgba(".rand(0,255).", ".rand(0,255)." ,".rand(0,255).",".(rand(0,100)/100).");";
                
                ?>
                
                
                
            }
            
            
            h2 {
                
                color: <?php  getRandomColor() ?>;
                background-color: <?= getRandomColor() ?>;
            }
            
        </style>
        
    </head>
    <body>
        
        <h1> Welcome! </h1>
        
        <h2> Random Background Color!</h2>
        

    </body>
</html>