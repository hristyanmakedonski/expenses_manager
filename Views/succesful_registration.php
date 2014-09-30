<?php 
$class='expenses';  
$sms='The result of your registration is:'; 
$path = '';
include './templates/login/header.php';
?>
<?php if(!isset($_SESSION)){ session_start() ; } ?>
     <?php if(!empty($_SESSION) && isset($_SESSION) &&  key_exists('msg', $_SESSION)): ?>
           <?php foreach($_SESSION['msg'] as $k=>$v): ?>
           <div class="expenses"><h1><?php echo $v ; ?></h1></div>
           <?php endforeach;?>
     <?php unset($_SESSION['msg']); ?>
<?php endif;?>
<div class="forgot_login"><a href="../">Login</a></div>
<div class="forgot_login1"><a href="registration.php">Try again</a></div>
<?php require './templates/login/footer.php';?>
