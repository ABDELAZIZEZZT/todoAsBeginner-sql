<?php

include "DB.php";
class validation extends DB {



public function checkRequestMethod($method)
{
    if($_SERVER['REQUEST_METHOD']== $method)
    {return true;}

    return false;

}

public function checkPostInput($input){
    if(isset($_POST[$input])){return true;}
    return false;
}

public function sanitizeInput($input)
{
    return trim(htmlspecialchars(htmlentities($input)));
}

public function emailVal($email)
{
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        return false;
    }
    return true;
}

public function getUsers($con)
    {
        $sql = $con->query('SELECT * FROM users');
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
public function searchInDB_email($email)
{
   
    
    $users=DB::getdata("users");
    foreach ($users as $user ) {
        if($user['email']==$email)return true;
    }
    return false;
    }


public function searchInDB($email,$pass)
{
   
    $users=DB::getdata("users");
    foreach ($users as $user ) {
        if($user["email"]== $email && password_verify($pass, $user["password"])){
        $_SESSION["id"]=$user["id"];
        $_SESSION["name"]=$user["name"];
         return true;}
    }
    return false;
  
}

public function requiredVal($input){
    if(empty($input)){
        return false;
    }
    return true;

}


public function validUserName($username)
{
   
    $users =DB::getdata("users");
    foreach ($users as $user) {
        if($user["name"]== $username)
        return false;
    }
    return true;


}

public function minVal($input,$length){
    if(strlen($input)<$length){
        return false;
    }
    return true;

}

public function maxVal($input,$length){
    if(strlen($input)>$length){
        return false;
    }
    return true;

}

public function validUserEmail($email)
{
    $users = DB::getdata("users");
    foreach ($users as $user) {
        if($user["email"]== $email)
        return false;
    }
    return true;


}


public function checkComfirm_Password ($con_pass,$pass)
{
    if ($con_pass==$pass) {
        return true;
    }
    else {
       return false;
    }
}

public function insert($name,$email,$pass){
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
}


 
