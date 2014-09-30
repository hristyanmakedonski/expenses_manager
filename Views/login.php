<?php 
$path = './'; 
include_once './Views/templates/login/header.php';
?>
<form method="post" action="./Controllers/Login.php" class="login">
    <p>
      <label for="login">Username:</label>
      <input type="text" name="username" id="login" placeholder="Something">
    </p>
    
    <p>
      <label for="password">Password:</label>
      <input type="password" name="pass" id="password" placeholder="123456789">
    </p>
    
    <p class="login-submit">
      <button type="submit" class="login-button">Go</button>
    </p>
    
    <p class="forgot-password"><a href="./Views/forgotPassword.php">Forgot your password?</a>        
    </p>
    
    <p class="forgot-password"><a href="./Views/registration.php">New registration</a>        
    </p>
</form>
<?php include './Views/templates/login/footer.php';?>