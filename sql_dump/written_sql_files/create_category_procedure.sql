CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateProductCategory`(IN category varchar(45))
BEGIN
	SET @tab_name = category;
    
    SET @concat_product = concat('CREATE TABLE product_',@tab_name,'( id INT(11) NOT NULL AUTO_INCREMENT, 
    sizes varchar(225) NOT NULL,
    quantity int(225) NOT NULL,
    numbers int(225) NOT NULL,
    sectionkgm int(225) NOT NULL,
    sectionweight int(225) NOT NULL,
    brand varchar(225) NOT NULL,
    description varchar(225) NOT NULL,
    time_stamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
    )');
    PREPARE stmt1 FROM @concat_product;
    EXECUTE stmt1;
    DEALLOCATE PREPARE stmt1;
    
    SET @concat_update_product = concat('CREATE TABLE product_update',@tab_name,'( id INT(11) NOT NULL AUTO_INCREMENT, 
    product_id int(11) NOT NULL,
    sizes varchar(225) NOT NULL,
    quantity int(225) NOT NULL,
    brand varchar(225) NOT NULL,
    addordel varchar(225) NOT NULL,
    time_stamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
    )');
    PREPARE stmt2 FROM @concat_update_product;
    EXECUTE stmt2;
    DEALLOCATE PREPARE stmt2;
    
    
    
END