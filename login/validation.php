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

function getUsers($con)
    {
        $sql = $con->query('SELECT * FROM users');
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
function searchInDB_email($email)
    {
    $con = new PDO('mysql:host=localhost;dbname=todo', 'root', '');
    
    $users=getUsers($con);
    foreach ($users as $user ) {
        if($user['email']==$email)return true;
    }
    return false;
    }


function searchInDB($email,$pass)
{
    $con = new PDO('mysql:host=localhost;dbname=todo', 'root', '');
    $users=getUsers($con);
    foreach ($users as $user ) {
        if($user["email"]== $email && password_verify($pass, $user["password"])){
        $_SESSION["id"]=$user["id"];
        $_SESSION["name"]=$user["name"];
         return true;}
    }
    return false;
  
}




 
