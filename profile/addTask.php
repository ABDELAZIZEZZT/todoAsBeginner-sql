<?php

include 'function.php';
$task=$_POST["task"];

if(checkRequestMethod("POST")&&checkPostInput("task")){

$list_tasks=getTasks();
echo $task;
addTask($task);


 header("location:../profile/profile.php");
 die;
}else{
  $_SESSION['wrong']="not valid task";
 header("location:../profile/profile.php");
 die;
}


