<?php
function requiredVal($input){
    if(empty($input)){
        return false;
    }
    return true;

}

function getUsers()
    {
        $con = new PDO('mysql:host=localhost;dbname=todo', 'root', '');
        $sql = $con->query('SELECT * FROM users');
       
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
function validUserName($username)
{
   
    $users =getUsers();
    foreach ($users as $user) {
        if($user["name"]== $username)
        return false;
    }
    return true;


}

function minVal($input,$length){
    if(strlen($input)<$length){
        return false;
    }
    return true;

}

function maxVal($input,$length){
    if(strlen($input)>$length){
        return false;
    }
    return true;

}

function validUserEmail($email)
{
    $users = getUsers();
    foreach ($users as $user) {
        if($user["email"]== $email)
        return false;
    }
    return true;


}

function checkPassword (string $pass)
{
    $count=0;
    if(requiredVal($pass)&&minVal($pass,6)&&maxVal($pass,25))
    {
        for ($i=0;$i<strlen($pass) ;$i++) {
            if($i>'Z')$count++;
        }
        if($count==strlen($pass))return false;
        else return true;
    }
}
function checkComfirm_Password ($con_pass,$pass)
{
    if ($con_pass==$pass) {
        return true;
    }
    else {
       return false;
    }
}


