 <script src="../Other/js/jquery2.1.js"></script>

<?php 
$class='Home_page';  
$sms='Home page';   
include './templates/default/header.php'; 
require '../Other/Permissions.php';  
Permissions::checkPermissions();    
 if($_SESSION['is_logged'] != "1" || $_SESSION['is_logged'] ==null){
       header('Location: ../'); die;
 }
?>
<div class="Wellcome"><h1>Wellcome, <?php echo  $_SESSION['username'];?> !</h1></div>
<?php include './templates/default/footer.php';?>



 