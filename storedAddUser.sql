drop procedure if exists addUser;
DELIMITER //
create procedure `addUser`(
	IN userID varchar(10),
	IN fname varchar(20),
	IN lname varchar(20),
	IN phNum int(10),
	IN accType varchar(10),
	IN passwd varchar(255)
	
BEGIN
INSERT into Users
   (Users.userID,
    Users.fname,
    Users.lname,
    Users.phNum,
    Users.accType)
    VALUES
    (userID, fname, lname, phNum, accType);

INSERT into passwds
  (
  passwds.userID,
  passwds.Hashes
  )
  Values
  (userID, passwd);
  
END //

