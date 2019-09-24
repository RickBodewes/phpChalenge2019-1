<?php
session_start();
require '../increq/PDOcon.php';
if(isset($_GET['type'])){
    $value = $_GET['item'];
    $date = $_GET['date'];
    if($_GET['type'] == "add"){
        $query = "INSERT INTO product (productName, date) VALUES (:name, :date)";
        $stmt = $con->prepare($query);
        $stmt->bindvalue(':name', $value);
        $stmt->bindvalue(':date', $date);
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
echo "Today is " . date("Y-m-d") . "<br>";


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Opdracht8</title>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <form method="get">
        <input type="text" name="item" required>
        <input type="date" name="date" id="dateInput">
        <input type="hidden" name="type" value="add">
        <input type="submit">
    </form>
    <input type="date" name="date" id="dateSelect">
    <ul id="list">
        <?php
            $query = "SELECT productName, productID, date FROM product WHERE date = :date";
            $stmt = $con->prepare($query);
            $stmt->bindvalue(':date', date("Y-m-d"));
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while($row = $stmt->fetch()){
                echo "<a href='?type=delete&item=".$row['productID']."'><li>".$row['date']." ".$row['productName']."</li></a>";
            }
        ?>
    </ul>
</body>
</html>