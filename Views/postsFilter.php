<?php 
require '../Other/Permissions.php';  
Permissions::checkPermissions();
require '../Controllers/ForumController.php';
?>
<a href="forum.php">All posts from this catagory</a>
<table border="1">
        <tr>
            <td>Title </td>
            <td>Description  </td>
            <td>Date  </td>
            <td>Username  </td>
        </tr>
    <?php if(!empty($_SESSION) && key_exists('userPosts', $_SESSION)): ?>
        <?php foreach($_SESSION['userPosts'] as $k=>$v): ?>
             <tr>
                 <td><?php echo $v['title']; ?></td>
                 <td><?php echo $v['description']; ?></td>
                 <td><?php echo $v['date']; ?></td>
                 <td><?php echo $v['username']; ?></td>
             </tr>
        <?php endforeach; ?>  
    <?php endif; ?>    
</table> 