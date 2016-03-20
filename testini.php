#!/usr/bin/php
<?php
require_once("newUser.php.inc");

$workoutDB = new workoutDB("workoutDB.ini");

//$workoutDB->createRoutine("og39","boom","routine1");

$workoutDB->addSet('og39','boom','routine1','2016-03-04','dbbench',1,100,5,'chest');
?>
