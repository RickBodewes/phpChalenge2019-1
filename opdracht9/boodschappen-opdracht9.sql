CREATE TABLE `rocchallboodschappen`.`product` ( `productID` INT NOT NULL AUTO_INCREMENT , `productName` INT(45) NOT NULL , PRIMARY KEY (`productID`)) ENGINE = InnoDB;

ALTER TABLE `product` ADD `date` DATE NOT NULL AFTER `productName`;