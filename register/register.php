<?php
session_start();


include '../oop/validation.php';


$errors=[];
$val=new validation;

if($val->checkRequestMethod("POST")&& $val->checkPostInput("username")){

    foreach($_POST as $key => $valu)
    {
        $$key=$val->sanitizeInput($valu);
    }


    if(!$val->requiredVal($username)){
        $errors[]= "name is required ";
    }else if(!$val->minVal($username,4)){
        $errors[]= "name mast be greater than 4 chars";
    }else if(!$val->maxVal($username,25)){
        $errors[]= "name mast be smaller than 12 chars";
    }

    if(!$val->validUserName($username)){
        $errors[]= "this user name not valid ";
    }



    if(!$val->requiredVal($email)){
        $errors[]= "email is required ";
    }else if(!$val->emailVal($email)){
        $errors[]= "plase typa valid email";
    }
    if(!$val->validUserEmail($email)){
        $errors[]= "this email not valid becase it used";
    }



    if(!$val->requiredVal($password)){
        $errors[]= "password is required ";
    }else if(!$val->minVal($password,6)){
        $errors[]= "password mast be greater than 6 chars";
    }else if(!$val->maxVal($password,25)){
        $errors[]= "password mast be smaller than 12 chars";
    }
   




    if(!$val->requiredVal($confirm_password)){
        $errors[]= "confirm password is required ";
    }
    if(!$val->checkComfirm_Password($confirm_password,$password)){
        $errors[]= "confirm password mast be si,milar to password";
    }


  




   if(!empty($errors)){
   
    $_SESSION['errors'] = $errors;

    header("location:Register_.php");
    die;

   }
   else{
   
    $users = getUsers();
    if ($users == NULL) {
        
        $password_hashed=password_hash($password, PASSWORD_BCRYPT);
       insert($username,$email,$password_hashed); 
        $_SESSION['id'] = 1;
      
        
    } else {
        $password_hashed=password_hash($password, PASSWORD_BCRYPT);
        insert($username,$email,$password_hashed); 
    
    }
   
     header("location:../login/login.php");
     die;
   
   }
   
    

   
}
else{
    echo "not supported method<br>";
}
//Zezonasssar113