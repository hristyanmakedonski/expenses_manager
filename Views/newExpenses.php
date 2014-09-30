<?php
$class='here1';  
$sms='New expenses';  
include './templates/default/header.php';
include './templates/default/footer.php';
?>
<?php 
require '../Other/Expenses.php';
require '../Other/Permissions.php'; 
Permissions::checkPermissions();
?>
    <?php if(key_exists('msg', $_SESSION) ):?>
         <h1> <?php echo $_SESSION['msg']; ?></h1>
    <?php  unset($_SESSION['msg']); ?>
    <?php endif;?>
        <?php if(key_exists('errors', $_SESSION) ):?>
           <?php foreach($_SESSION['errors'] as $k=>$v):?>
             <h1><?php echo $v ; ?></h1>
           <?php unset($_SESSION['errors']); ?> 
           <?php endforeach;?>
        <?php endif;?>
<?php $categories = Expenses::GetExpensesCategories();?>
<form method="POST" action="../Controllers/FormExpenses.php">
    <div class="new_expenses">
            Name <input name='name' type ='text'>
        <br>
            Price <input name ='price' type ='text'>
        <br>
            New Categories <input name ='add_categories' type ='text'>
        <br> 
            Categories <select name="categories"> 
                 <?php foreach($categories as $k=>$v): ?>
                   <option value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
                 <?php endforeach; ?>
                       </select>  
    </div>
    <div>
       <input name='submit' type ='submit' value ='Submit'>
    </div>
</form>
