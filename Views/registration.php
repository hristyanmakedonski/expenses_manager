<?php
$class='hello';  
$sms='Please register to view the application!'; 
$path = '';   
require './templates/login/header.php';
?>
<div class="registration">
    <form method="POST" action="../Controllers/Registration.php">
         <div> user name: <input type="text" name ="username" /></div>
         <div> password: <input type="password" name="pass" /></div>
         <div> first name : <input type="text" name ="firstname" /></div>
         <div> last name : <input type="text" name ="lastname" /></div>
         <div> email : <input type="text" name ="email" /></div>
         <div > <input type="submit" value="save"/></div>
    </form>
</div>    
<div class="registration1"> <a href="../index.php">Login</a></div>
<?php require './templates/login/footer.php';?>

