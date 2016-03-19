#!/usr/bin/php
<?php
require_once("newUser.php.inc");

$workoutDB = new workoutDB("workoutDB.ini");

$workoutDB->addUser("og39","Omar","Gomez",1234567890,"trainer","boom");
?>