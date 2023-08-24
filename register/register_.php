<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="register.css">
<title>register Form</title>
</head>
<body>
  <div class="container">
    <h1>Register</h1>
    <form class="register-form" action="register.php" method="post">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Enter your username" required>
        <br>
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required>
      <br>
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
      <br>
      <label for="confirm_password">confirm password</label>
      <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter confirm password" required>
      <br>
      <button type="submit">Register</button>
    </form>
  </div>
  
  <?php session_start();?>
        <?php
         if(isset($_SESSION['errors'])):
                
                foreach ($_SESSION['errors'] as $error ):?>
                <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <?php echo $error; ?>
                </div>
        <?php  
            endforeach;  
            endif;
           
         ?>
</body>
</html>
