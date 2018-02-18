<!DOCTYPE html>
<html>
    <div id = "main">
    <head>
        <title> Lab 2: 777 Slot Machine </title>
        <meta charset="utf-8" />
    </head>
    <body>
        
        <?php
       include 'functions.php';
       
        
            for($i=1;$i<4;$i++)
            {
                ${"randomValue" . $i} = rand(0,2);
                displaySymbol( ${"randomValue" . $i},$i);
            }
      displayPoints($randomValue1,$randomValue2,$randomValue3);
            echo "<br /><hr> Values: $randomValue1 $randomValue2  $randomValue3 ";
         
          
        
        ?>
         <form>
            <input type="submit" value="Spin!"/>
            </form>
            <style>
                @import url("css/styles.css");
            </style>

<!--
          <img  id='reel1'  src=' img/lemon.png ' alt='lemon' title='Lemon' width='70' > 
          <img  id='reel2'  src=' img/cherry.png ' alt='cherry' title='Cherry' width='70' > 
          <img  id='reel3'  src=' img/lemon.png ' alt='lemon' title='Lemon' width='70' >
-->

    </body>
</div>
</html>