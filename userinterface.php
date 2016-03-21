#!/usr/bin/php
<?php

require_once("newUser.php.inc");
require_once("workoutDB.php.inc");


function print_help()
{
  echo "usage: ".PHP_EOL;
  echo __FILE__." -u <userID> -p <password> -c <command arguments...>".PHP_EOL;
}

if ($argc < 2)
{
   print_help();
   exit(0);
}
$cArgs = array();
for ($i = 0; $i < $argc;$i++)
{
  if (($argv[$i] === "-h") ||
      ($argv[$i] === "--help"))
  {
      print_help();
      exit(0);
  }
  if ($argv[$i] === '-u')
  {
    $userID = $argv[$i + 1];
    $i++;
    continue;
  }
  if ($argv[$i] === '-p')
  {
    $password = $argv[$i + 1];
    $i++;
    continue;
  }
  if ($argv[$i] === '-c')
  {
    $command = $argv[$i + 1];
    $i++;
    continue;
  }
  $cArgs[] = $argv[$i];  
}

if (!isset($userID))
{
   echo "no userID specified".PHP_EOL;
   print_help();
   exit(0);
}

if (!isset($password))
{
   echo "no password specified".PHP_EOL;
   print_help();
   exit(0);
}

if (!isset($command))
{
   echo "no command specified".PHP_EOL;
   print_help();
   exit(0);
}

switch ($command)
{
  case 'updatePassword':
    $DBlogin = new DBlogin("workoutDB.ini");
    $DBlogin->updatePassword($userID,$password,$cArgs[1]);
    break;
  
  case 'addUser':
    $DBlogin = new DBlogin("workoutDB.ini");
    $DBlogin->addUser($userID,$cArgs[1],$cArgs[2],$cArgs[3],$cArgs[4],$password);
    break;
  
  case 'createRoutine':
    $DBlogin = new DBlogin('workoutDB.ini');
    $DBlogin->validateUser($userID,$password);
    if (($DBlogin->checkUserPrivilegeLevel($userID))<1)
      {
	echo "Only trainers can create routines".PHP_EOL;
	return;
      }
    $workoutFunc = new workoutFunc("workoutDB.ini");
    $workoutFunc->createRoutine($userID,$password,$cArgs[1]);
    break;
  
  case 'deleteRoutine':
    $DBlogin = new DBlogin('workoutDB.ini');
    $DBlogin->validateUser($userID,$password);
    if (($DBlogin->checkUserPrivilegeLevel($userID))<1)
      {
	echo "Only trainers can delete routines".PHP_EOL;
	return;
      }
    $workoutFunc = new workoutFunc("workoutDB.ini");
    $workoutFunc->deleteRoutine($userID,$password,$cArgs[1]);
    break;
  
  case 'trainerReport':
    $DBlogin = new DBlogin('workoutDB.ini');
    $DBlogin->validateUser($userID,$password);
    if (($DBlogin->checkUserPrivilegeLevel($userID))<1)
      {
	echo "Only trainers can view this report. Try viewing a 'progressReport'".PHP_EOL;
	return;
      }
    $workoutFunc = new workoutFunc("workoutDB.ini");
    $workoutFunc->trainerReport($userID,$password,$cArgs[1]);
    break;
  
  case 'progressReport':
    $DBlogin = new DBlogin('workoutDB.ini');
    $DBlogin->validateUser($userID,$password);
    $workoutFunc = new workoutFunc("workoutDB.ini");
    $workoutFunc->progressReport($userID,$password,$cArgs[1]);
    break;
  
  case 'addSet':
    $DBlogin = new DBlogin('workoutDB.ini');
    $DBlogin->validateUser($userID,$password);
    $workoutFunc = new workoutFunc("workoutDB.ini");
    $workoutFunc->addSet($userID,$password,$cArgs[1],$cArgs[2],$cArgs[3],$cArgs[4],$cArgs[5],$cArgs[6],$cArgs[7]); 
    break;
}

?>