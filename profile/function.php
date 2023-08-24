<?php
session_start();


function checkRequestMethod($method)
{
    if($_SERVER['REQUEST_METHOD']== $method)
    {return true;}

    return false;

}

function checkPostInput($input){
    if(isset($_POST[$input])&& $_POST[$input]!=null ){return true;}
    return false;
}

function getTasks(){
    $con = new PDO('mysql:host=localhost;dbname=todo', 'root', '');
    $sql = $con->query('SELECT * FROM tasks');
    return $sql->fetchAll(PDO::FETCH_ASSOC);
  }

function addTask($task){
    try {
        $user_id=$_SESSION['id'];
        $con = new PDO('mysql:host=localhost;dbname=todo', 'root', '');
        $con->beginTransaction();
        if(getTasks()==null){
            $con->exec("INSERT INTO tasks ( id ,user_id ,task)
            VALUES (1,'$user_id', '$task');");
            $con->commit();
        }
        else{
            $con->exec("INSERT INTO tasks ( user_id ,task)
            VALUES ('$user_id', '$task');");
            $con->commit();

        }
      
            } catch(PDOException $e) {
            $con->rollback();
            echo "Error: " . $e->getMessage();
            $con = null;
        }


}
function deletTask($idTask){
    $con = new PDO('mysql:host=localhost;dbname=todo', 'root', '');
    $con->beginTransaction();
    $con->exec("DELETE FROM tasks WHERE id='$idTask';");
    $con->commit();


}