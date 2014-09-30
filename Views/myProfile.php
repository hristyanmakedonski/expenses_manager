<?php  
$class='';  
$sms=''; 
require '../Other/Permissions.php';  
Permissions::checkPermissions();
include './templates/default/header.php';
include './templates/default/footer.php';
?>
<div class="helo"><h1> <?php echo 'Hello, '.$_SESSION['firstname'].'!'; ?> </h1></div>
<div class="msg">
<?php if(key_exists('msg_upload', $_SESSION)){
         echo $_SESSION['msg_upload'];
         unset($_SESSION['msg_upload']);  
      }
?>
</div>
<div class="picture">
    <form method="post" action="../Controllers/UploadPictures.php" enctype="multipart/form-data">
        <input type="file" name="file" />
        <input type="submit" value="Add"/>
    </form>
</div>