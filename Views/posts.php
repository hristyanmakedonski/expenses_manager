<?php 
$class='forum';  
$sms="This is a forum"."'"."s posts"; 
include './templates/default/header.php';
require '../Other/Permissions.php';  
Permissions::checkPermissions();
require '../Controllers/ForumController.php';
require '../Other/ForumUsers.php';
$forum = new ForumController();
    if(key_exists('sort', $_GET) && $_GET['sort'] === 'all'){  //Show all results
        $result = $forum->getAllPosts();    
    }
    if(key_exists('users', $_GET)){
        $result = $forum->getUsersPosts($_GET);
    }
?>
<div class="table"><form method="get" action="../Views/posts.php">    
    <input type="hidden" name="forum_group_id" value="<?php  echo $_GET['forum_group_id'];?>"/>
      <div class="select"><select name='users' onchange= "this.form.submit()"></div>
        <div class="posts"><option value="all">All</option> </div>
        <?php foreach(ForumUsers::GetUsers($_GET['forum_group_id']) as $k=>$v): ?>  
              <?php if($_GET['users'] == $v['id']) : ?>  
                  <div class="posts"><option value="<?php echo $v['id']; ?>" selected><?php echo $v['username'] ?></option></div>
              <?php else:?>    
                  <div class="posts"><option value="<?php echo $v['id']; ?>" ><?php echo $v['username'] ?></option> </div>
              <?php  endif;?>
        <?php endforeach; ?>
      </select>
</form></div>
    <table border ="1">
          <tr>
             <td align="center" valign="middle">title</td>
             <td align="center" valign="middle">description</td>
             <td align="center" valign="middle">date</td>
             <td align="center" valign="middle">username</td>
          </tr>    
        <?php if(!empty($result)): ?>        
          <?php foreach($result as $k=>$v): ?>
            <tr>
                <td align="center" valign="middle"><?php echo $v['title'];?></td>
                <td align="center" valign="middle"><?php echo $v['description'];?></td>
                <td align="center" valign="middle"><?php echo $v['date']; ?></td>
                <td align="center" valign="middle"><?php echo $v['username']; ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif;?>    
    </table>
<?php include './templates/default/footer.php'; ?>
      

















