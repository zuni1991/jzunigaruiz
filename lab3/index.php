<?php
    include 'inc/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Silver Jack Game</title>
        <meta charset = "utf-8" />
        
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <!--<center>-->
        <div id = "main">
            <?=playCards()?>
            <form>
                <input type="submit" value="Play!"/>
            </form>
        </div>
        <hr width = "100%" />
          <footer id = "footer">
            <img id="imgResize" src="img/csumb.jpg" alt="theses"/>
            <div class="foot">
            CST336. 2018&copy; Bianca, Eli, Juan, Mustafa <br />
            <strong>Disclaimer:</strong> The information in this webpage is fictitous. <br />
            It is used for academic purposes only.
        </footer>
        <!--</center>-->
    </body>
</html>