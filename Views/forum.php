<?php 
$class='forum';  
$sms='Wellcome to our forum'; 
include './templates/default/header.php';
include './templates/default/footer.php';         
require '../Other/Permissions.php';  
Permissions::checkPermissions();
require '../Controllers/ForumController.php';
$forum = new ForumController();
$groups =  $forum->getGroups();
?>
   <script src="../Other/js/jquery2.1.js"></script>    
        <div class='content1'>
            <div class='here2'>Click <b onclick="showForm()">HERE</b> to add  a coment </div>
            <div class='here3'>Click <b onclick="showPosts()">HERE</b> to see all posts</div>
            <div class='form' style="display:none;">
                   <form method="POST" action="../Controllers/ForumController.php">
                        <div class='here2'>Title <input type="text" name='title' /></div>
                        <div class='here2'>Description<input type="text" name='description'/></div>
                        <div class='here2'>Category<input type="text" name='category' /></div>
                        <div class='here1'>Click <b onclick="showCurrentCategories()">HERE</b> to  chouse some of the existing categories</div>
                        <div class='currentCategories' style="display:none;">
                            <div class='here1'><select name="forum_group_id">
                                <option value="all">---</option>
                                <?php foreach( $groups as $k=>$v):?>
                                      <option value="<?php echo $v['forum_group_id'];?>"><?php echo $v['name'];?></option>
                                <?php endforeach;?>
                            </select></div>
                        </div> 
                        <div class='here1'><input type="submit" value="Create" /></div>
                   </form>            
            </div>
            <div class='post'style="display:none;">
               <?php foreach($groups as $k=>$v): ?>
                    <div class='here3'> <a href='./posts.php?forum_group_id=<?php echo $v['forum_group_id']; ?>&sort=all'><?php echo $v['name']; ?></a></div>  
               <?php endforeach; ?>  
            </div>
        </div>
<style>
    b{
        cursor: pointer;
    }
</style>
<script>
      function  showForm(){
             $('.form').show();
      }
      function  showPosts(){
             $('.post').show();
      }
      
      function showCurrentCategories(){
          
         $('.currentCategories') .show();
          
      }
</script>

