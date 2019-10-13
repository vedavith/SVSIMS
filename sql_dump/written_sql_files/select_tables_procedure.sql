DELIMITER //

CREATE DEFINER=`root`@`localhost` PROCEDURE SelectTables(IN TableName varchar(45))
BEGIN
    SET @tab_name = TableName;
    
    SET @concat_product = concat('SELECT * FROM ',@tab_name);
    PREPARE stmt1 FROM @concat_product;
    EXECUTE stmt1;
    DEALLOCATE PREPARE stmt1;
    
END
//
DELIMITER ;

 -- DROP PROCEDURE SelectTables;
  call SelectTables('brand');