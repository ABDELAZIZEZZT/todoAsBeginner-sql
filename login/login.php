<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Login Form</title>
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <form class="login-form" action="login_.php" method="post">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required>
      
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
      
      <button type="submit">Login</button>
    </form>
  </div>
  
  <?php session_start();?>
        <?php
         if(isset($_SESSION['error'])):
                
                foreach ($_SESSION['error'] as $error ):?>
                <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <?php
                echo $error;?>
               <?php if($error=="your email not required please register "):?>
                <form action="../register/register_.php">
                <button>register</button>
                </form> 
                <?php  endif; ?>
                </div>
        <?php  
           foreach ($_SESSION['error'] as $error ){
            unset($error);
           }
          
            endforeach;  
            endif;
           
         ?>
</body>
</html>
