<?php

class DBlogin
{
   private $db;
   private $ini;
 	
   public function __construct($inifile)
   {
	
	$this->ini = parse_ini_file($inifile,true);
	$host = $this->ini['workoutDB']['host'];
	$user = $this->ini['workoutDB']['user'];
	$password = $this->ini['workoutDB']['password'];
	$database = $this->ini['workoutDB']['database'];
	$this->db = new mysqli($host,$user,$password,$database);
	
	if ($this->db->connect_errno > 0)
	{
		echo __FILE__.":".__LINE__.": failed to connect to db, re: ".$this->db->connect_error.PHP_EOL;
		exit(0);
	}
   }

   public function __destruct()
   {
	$this->db->close();
   }

     public function checkIfUserExists($userID)
   {
	$userID = $this->db->real_escape_string($userID);
	$query = "select userID from Users where userID = '$userID';";
        $results = $this->db->query($query);
	$row = $results->fetch_assoc();
	if ($row['userID'] === $userID)
        {				
		return true;
	}       
	return false;
   }

   public function validateUser ($userID, $passwd)
   {
	$userID = $this->db->real_escape_string($userID);
	$passwd = $this->db->real_escape_string($this->saltPassword($passwd));	
	$query = "select userID, Hashes from passwds where userID = '$userID';";
        $results = $this->db->query($query);
	$row = $results->fetch_assoc();
	if ($row['Hashes'] === $passwd)
        {
		echo "User validated".PHP_EOL;		
		return true;
	}
	echo "validation failed".PHP_EOL;
        return false;
   }
   
   private function saltPassword($passwd)
   {
      $salt = $this->ini['workoutDB']['salt'];
      return substr(sha1($passwd.$salt),10,-10);
   }
   
   public function addUser($userID,$fname,$lname,$phNum,$accType,$passwd)
   {
	if ($this->checkIfUserExists($userID)== true)
	{
	  echo "User ID $userID already exists".PHP_EOL;
	  return;
	}
	
	$userID = $this ->db->real_escape_string($userID);
	$fname = $this->db->real_escape_string($fname);
	$lname = $this->db->real_escape_string($lname);
	$phNUm = $this->db->real_escape_string($phNum);
	$accType = $this->db->real_escape_string($accType);

	$query = "insert into Users(userID, fname, lname, phNum, accType) values ('$userID','$fname','$lname','$phNum','$accType');";

	$results = $this->db->query($query);
	if ($this->db->errno > 0)
	{
	    echo __FILE__.":".__LINE__."DB error: ".$this->db->error.PHP_EOL;
	}

	$passwd = $this->db->real_escape_string($this->saltPassword($passwd));	
	$query = "insert into passwds (userID, Hashes) values ('$userID', '$passwd');";
	$results = $this->db->query($query);
	if ($this->db->errno > 0)
	{
	    echo __FILE__.":".__LINE__."DB error: ".$this->db->error.PHP_EOL;
	}
	
	echo "User added".PHP_EOL;
	
   }
   public function checkUserPrivilegeLevel($userID)
   {
	$userID = $this->db->real_escape_string($userID);
	$query = "select accType from Users where userID = '$userID';";
        $results = $this->db->query($query);
	$row = $results->fetch_assoc();
	if ($row['accType'] === 'trainer')
        {	
		echo "Trainer Priviliges".PHP_EOL;
		return 1;
	}
	echo "User Privileges".PHP_EOL;
        return 0;	
   }
   public function updatePassword($userID,$oldpasswd,$newpasswd)
   {
	if (!$this->validateUser($userID,$oldpasswd))
		{
			echo "Invalid login. Update failed".PHP_EOL;
			return false;		
		}
   	$userID = $this->db->real_escape_string($userID);
	$newpasswd = $this->db->real_escape_string($this->saltPassword($newpasswd));
	$query = "update passwds set Hashes = '$newpasswd' where userID = '$userID';";
	$results = $this->db->query($query);	
	if ($this->db->errno > 0)
	{
	    echo __FILE__.":".__LINE__."DB error: ".$this->db->error.PHP_EOL;
	}
	echo "Password Updated".PHP_EOL;
   } 	
}


?>
