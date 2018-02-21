<!DOCTYPE html>
<html>
    <div id = "main">
    <head>
        <title> Weather Predictor </title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h1>The Weather Predictor</h1>
        <h2>Random weather predictor generator!</h2>
        <h3>Predict tomorrows weather!</h3>
        <?php
function displaySymbol($randomValue, $pos) {
         
             
                switch ($randomValue) {
                    
                    case 0: $symbol = "Cloudy";
                        $picture = "droplet";
                        $picture = "cloud";
                            break;
                    case 1: $symbol = "Rainy";
                    $picture = "cloud2";
                    $picture = "rain";
                            break;
                    case 2: $symbol = "Sunny";
                     $picture = "sun";
                }            
            
               echo "<img id = 'reel$pos' src='img/$symbol/$picture.png' width='70' alt=\"$symbol\" title=\"$symbol\" />";
                
            }       
        
            for($i=1;$i<3;$i++)
            {
                ${"randomValue" . $i} = rand(0,2);
                displaySymbol( ${"randomValue" . $i},$i);
            }
        
        ?>
         <form>
            <input id= "type" type="submit" value="Another one!" style="margin-left: 50%"/>

            </form>
            <style>
                @import url("css/styles.css");
            </style>

<!--
          <img  id='reel1'  src=' img/Cloudy/cloud.png ' alt='cloud' title='cloud' width='70'class="center" > 
         <img  id='reel2'  src=' img/Cloudy/droplet.png ' alt='droplet' title='droplet' width='70'class="center" > 
         <img  id='reel3'  src=' img/Rainy/cloud2.png ' alt='cloud2' title='cloud2' width='70'class="center" > 
         <img  id='reel4'  src=' img/Rainy/rain.png ' alt='rain' title='rain' width='70' class="center" > 
          <img  id='reel5'  src=' img/Sunny/sun.png ' alt='sun' title='sun' width='70' class="center" >
          
-->

    </body>
</div>
</html>