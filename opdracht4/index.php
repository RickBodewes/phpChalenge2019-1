<?php
session_start();
if(isset($_GET['type'])){
    if($_GET['type'] = "add"){
        $value = $_GET['item'];
        $sessVal = $_GET['item'];

        $_SESSION[$sessVal] = $value;

    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Opdracht4</title>
</head>

<body>
    <form method="get">
        <input type="text" name="item">
        <input type="hidden" name="type" value="add">
        <input type="submit">
    </form>
    <ul>
        <?php
                foreach($_SESSION as $boodschap){
                    echo "<li>".$boodschap."</li>";
                }
            ?>
    </ul>
</body>

</html>
