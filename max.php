<?php

($DB = mysql_connect ("localhost", "omar", "boom"))
    or die ("Unable to connect to MYSQL database");

    print "Connected to MySQL\n";

mysql_select_db ("workouts");

$uid = $_GET['uid'];
$uid = mysql_real_escape_string($uid);

$exercise = $_GET['exercise'];
$exercise = mysql_real_escape_string($exercise);

$d= "SELECT Distinct Max(Weight), Reps from workouts where Exercise = '$exercise' and uid = '$uid' Group By Reps";
  $max= mysql_query($d) or die(mysql_error());

$n = "Select Avg(Weight) from workouts where Exercise = '$exercise'";
	  $avg = mysql_query($n) or die(mysql_error());
	  
print "Your max weight and reps on $exercise is: $max \n";
print "The average weight for $exercise is $avg \n";

?>
