<?php
$boodschappen = array("aardappelen", "aardbeien", "3 pakken melk", "yoghurt");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Opdracht1</title>
</head>
    <body>
        <ul>
            <?php
                foreach($boodschappen as $boodschap){
                    echo "<li>".$boodschap."</li>";
                }
            ?>
        </ul>
    </body>
</html>