<?php
include 'function.php';
if(checkRequestMethod("POST")&&checkPostInput("task"))
{
$id=$_POST['id'];
$task=$_POST['task'];
$con = new PDO('mysql:host=localhost;dbname=todo', 'root', '');
$con->beginTransaction();
$con->exec("UPDATE tasks SET task = '$task' WHERE id='$id';");
$con->commit();
unset($_POST);
header('location:profile.php');
die;
}
else{
    echo"not valid task";
}