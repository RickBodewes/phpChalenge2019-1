<?php
session_start();
if(isset($_GET['type'])){
    if($_GET['type'] == "add"){
        $value = $_GET['item'];
        $sessVal = $_GET['item'];
        $_SESSION[$sessVal] = $value;
    }else if($_GET['type'] == "delete"){
        unset($_SESSION[$_GET['item']]);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Opdracht5</title>
</head>
<body>
    <form method="get">
        <input type="text" name="item" required>
        <input type="hidden" name="type" value="add">
        <input type="submit">
    </form>
    <ul>
        <?php
            foreach($_SESSION as $key => $boodschap){
                echo "<a href='?item=".$key."&type=delete'><li>".$boodschap."</li></a>";
            }
        ?>
    </ul>
</body>
</html>