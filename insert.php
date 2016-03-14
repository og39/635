<?php

($DB = mysql_connect ("localhost", "omar", "boom"))
    or die ("Unable to connect to MYSQL database");

    print "Connected to MySQL\n";

mysql_select_db("workouts");

$Exercise = $argv[1];
$SetNum = $argv[2];
$Weight = $argv[3];
$Reps = $argv[4];
$uid = $argv[5];

$i ="Insert into workouts values (NOW(),'$Exercise','$SetNum','$Weight','$Reps','$uid')";
    mysql_query($i) or die (mysql_error());
print "database updated".PHP_EOL;

?>
