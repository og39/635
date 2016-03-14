<?php

($DB = mysql_connect ("localhost", "omar", "boom"))
    or die ("Unable to connect to MYSQL database");

    print "Connected to MySQL\n";

mysql_select_db ("workouts");

$uid = $_GET['uid'];
$uid = mysql_real_escape_string($uid);

$m = "Select * from Users where uid = '$uid'";
$n = mysql_query($m) or die (mysql_error());
($n != $uid) or die ("User name Taken");

$fname = $_GET['fname'];
$fname = mysql_real_escape_string($fname);

$lname = $_GET['lname'];
$lname = mysql_real_escape_string($lname);

$ph = $_GET['ph'];
$ph = mysql_real_escape_string($ph);

$email = $_GET['email'];
$email = mysql_real_escape_string($email);

$passwd = SHA1($password);

$i = "insert into Users values ('$uid', '$fname', '$lname', '$ph', '$email')";
	   $new = mysql_query($i) or die(mysql_error());
   
$r = "insert into password values ('$uid','$passwd')";
	  $sec = mysql_query($r) or die(mysql_error());
	  
print "User Added".php_eol;	

?>
