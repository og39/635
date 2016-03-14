<?php

echo "<br>Hello<br>";
include ("woaccount.php") ;
( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );
print "Connected to MySQL<br>";
mysql_select_db( $project );

$t =$_GET['name'];
$t = mysql_real_escape_string($t);

$x =$_GET['password'];
$x = mysql_real_escape_string($x);

$g = "select * from passwords where passwd = sha1('$x') and uid = '$t'"; 
$f = mysql_query($g) or die(mysql_error());
(mysql_num_rows($f)!=0)or die("Incorrect password");


$exercise = $_GET['exercise'];
$exercise = mysql_real_escape_string ($exercise);

$set = $_GET['set'];
$set = mysql_real_escape_string ($set);

$weight = $_GET['weight'];
$weight = mysql_real_escape_string ($weight);

$reps = $_GET['reps'];
$reps = mysql_real_escape_string ($reps);

$s= "Insert into workouts values (NOW(), '$exercise', '$set', '$weight', '$reps','uid')";
	mysql_query ( $s  )  or die ( mysql_error() );
print "Update Complete\n\r";


?>
