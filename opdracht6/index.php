<?php
session_start();
require '../increq/PDOcon.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Opdracht6</title>
</head>
<body>
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