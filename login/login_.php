<?php

session_start();

include '../oop/validation.php';

$error_1=null;

$val=new validation;
if($val->checkRequestMethod("POST")&& $val->checkPostInput("email")){

    foreach($_POST as $key => $valu)
    {
        $$key=$val->sanitizeInput($valu);
    }

    if(!$val->searchInDB_email($email)){
        $error_1[]= "your email not required please register ";
    }

    if(!$val->searchInDB($email,$password)){
        $error_1[]= "wrong password ";
    }

}

if(!empty($error_1)){
    // var_dump($_SESSION['error']);
    $_SESSION['error'] = $error_1;
    header("location:login.php");
    die;
    
}
else{
    header("location:../profile/profile.php");
    die;
   
}