<?php 
$class='forum';  
$sms='Forgot your password?'; 
$path = '';
include './templates/login/header.php';
?>
<div class="forgot">
     <form method="POST" action="../Controllers/ForgetPassword.php">
         <div class="here1"> user name: <input type="text" name ="username" /></div>
         <div class="here1"> email : <input type="text" name ="email" /></div>
         <div class="here1"> <input type="submit" value="send"/></div>
         <div class="forgot_login"> <a href="../index.php">Login</a></div>
     </form>
</div>
<?php include './templates/login/footer.php';?>
