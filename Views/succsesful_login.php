<?php 
$class='expenses';  
$sms='Please, check !'; 
$path = '';
include './templates/login/header.php';
    if(!isset($_SESSION)){
       session_start() ; 
    } 
       if(!empty($_SESSION) && isset($_SESSION) &&  key_exists('login_errors', $_SESSION)): 
          foreach($_SESSION['login_errors'] as $k=>$v): ?>
               <div class="expenses"><h1><?php echo $v ; ?></h1></div>
          <?php endforeach;?>
          <?php unset($_SESSION['login_errors']); ?>
       <?php endif;?>
<div class="forgot_login"><a href="../">Try again</a></div>
<?php require './templates/login/footer.php';?>

