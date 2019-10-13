DELIMITER //
CREATE PROCEDURE InsertBrand(IN brand_name varchar(45))
BEGIN
    INSERT INTO brand(brand)VALUES(brand_name); 
END;
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE InsertUserType(IN user_type varchar(45))
BEGIN
    INSERT INTO user_type(user_type)VALUES(user_type); 
END;
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE InsertUserRole(IN user_role varchar(45))
BEGIN
    INSERT INTO user_role(user_role)VALUES(user_role); 
END;
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE InsertSectionLength(IN section_length varchar(45))
BEGIN
    INSERT INTO section_weight_length(section_weight_length)VALUES(user_role); 
END;
//
DELIMITER ;


DELIMITER //
CREATE PROCEDURE InsertCategory(IN category varchar(45))
BEGIN
    INSERT INTO categoty(category)VALUES(category); 
END;
//
DELIMITER ;

/*
 *       PROCEDURE CALL
 *    
 *        CALL InsertBrand("test")
 *		  DROP PROCEDURE InsertBrand; 
 */
  