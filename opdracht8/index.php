<?php
session_start();
require '../increq/PDOcon.php';
if(isset($_GET['type'])){
    $value = $_GET['item'];
    if($_GET['type'] == "add"){
        $query = "INSERT INTO product (productName) VALUES (:name)";
        $stmt = $con->prepare($query);
        $stmt->bindvalue(':name', $value);
        $stmt->execute();
        header("location: index.php");
    }else if($_GET['type'] == "delete"){
        $query = "DELETE FROM product WHERE productID = :id";
        $stmt = $con->prepare($query);
        $stmt->bindvalue(':id', $value);
        $stmt->execute();
        header("location: index.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Opdracht8</title>
</head>
<body>
    <form method="get">
        <input type="text" name="item" required>
        <input type="hidden" name="type" value="add">
        <input type="submit">
    </form>
    <ul>
        <?php
            $query = "SELECT productName, productID FROM product";
            $stmt = $con->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while($row = $stmt->fetch()){
                echo "<a href='?type=delete&item=".$row['productID']."'><li>".$row['productName']."</li></a>";
            }
        ?>
    </ul>
</body>
</html>