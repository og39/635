<?php

($DB = mysql_connect ("localhost", "omar", "boom"))
    or die ("Unable to connect to MYSQL database");

    print "Connected to MySQL\n";

mysql_select_db ("workouts");

$uid = $argv[1];

$m = "Select * from Users where uid = '$uid'";
$n = mysql_query($m) or die (mysql_error());
($n != $uid) or die ("User name Taken");

$fname = $argv[3];

$lname = $argv[4];

$ph = $argv[5];

$add = $argv[6];

$passwd = SHA1($argv[7]);

$i = "insert into Users values ('$uid', '$fname', '$lname', '$ph', '$add')";
	   $new = mysql_query($i) or die(mysql_error());
   
$r = "insert into password values ('$uid','$passwd')";
	  $sec = mysql_query($r) or die(mysql_error());
	  
print "User Added".php_eol;	

?>
