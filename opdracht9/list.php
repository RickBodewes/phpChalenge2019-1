<?php
require '../increq/PDOcon.php';


    if(isset($_GET['date'])){
        $date = $_GET['date'];
        
            $query = "SELECT productName, productID, date FROM product WHERE date = :date";
            $stmt = $con->prepare($query);
            $stmt->bindvalue(':date', $date);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while($row = $stmt->fetch()){
                echo "<a href='?type=delete&item=".$row['productID']."'><li>".$row['date']." ".$row['productName']."</li></a>";
            }
        
    }









            /*
            $query = "SELECT productName, productID, date FROM product WHERE date = :date";
            $stmt = $con->prepare($query);
            $stmt->bindvalue(':date', "2019-09-20");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while($row = $stmt->fetch()){
                echo "<a href='?type=delete&item=".$row['productID']."'><li>".$row['date']." ".$row['productName']."</li></a>";
            }
*/
?>
