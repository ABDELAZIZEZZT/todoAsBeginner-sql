<?php
function checkRequestMethod($method)
{
    if($_SERVER['REQUEST_METHOD']== $method)
    {return true;}

    return false;

}

function checkPostInput($input){
    if(isset($_POST[$input])){return true;}
    return false;
}

function insert($name,$email,$pass){
    try {
    $con = new PDO('mysql:host=localhost;dbname=todo', 'root', '');
    $con->beginTransaction();
    $con->exec("INSERT INTO users (name, email,password)
    VALUES ('$name', '$email', '$pass');");
    $con->commit();
  
        } catch(PDOException $e) {
        $con->rollback();
        echo "Error: " . $e->getMessage();
        $conn = null;
    }
}


    

function sanitizeInput($input)
{
    return trim(htmlspecialchars(htmlentities($input)));
}

function emailVal($email)
{
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        return false;
    }
    return true;
}


//Zezonassar113