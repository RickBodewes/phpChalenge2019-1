<?php
session_start();
require '../increq/PDOcon.php';


if(isset($_GET['type'])){
    if($_GET['type'] == "add"){
        $value = $_GET['item'];
        $query = "INSERT INTO product (productName) VALUES (:name)";
        $stmt = $con->prepare($query);
        $stmt->bindvalue(':name', $value);
        $stmt->execute();
        header("location: index.php");
    }
}





?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Opdracht7</title>
</head>

<body>
    <form method="get">
        <input type="text" name="item" required>
        <input type="hidden" name="type" value="add">
        <input type="submit">
    </form>
    <ul>
        <?php
            $query = "SELECT productName FROM product";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while($row = $stmt->fetch()){
                echo "<li>".$row['productName']."</li>";
            }
        ?>
    </ul>
</body>

</html>
