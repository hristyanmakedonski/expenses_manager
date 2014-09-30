<?php
require_once 'db.php';
require_once '../Other/Permissions.php'; 
Permissions::checkPermissions(); 
class ForumModel extends Db{
    
    public function __construct(){
        
       parent::__construct(); 
       
    }
    public function AddToForum_Post($data){
       
          $sql_add_posts =  "INSERT INTO `expenses-manager`.`forum_posts` (`user_id`, `forum_group_id`, `title`, `description`, `date`)
                             VALUES ("."'".$_SESSION['user_id']."'".','."'".$data['forum_group_id']."'".','."'".$data['title']."'".','."'".$data['description']."'".','."'".date('Y-m-d H:m:s')."'".")";                
          $sql_add_new_category = "INSERT INTO `expenses-manager`.`forum_groups` (`name`) VALUES ('".$data['category']."')";
             
          if($data['forum_group_id'] === 'all' && $data['category'] != NULL){
             //Add new category
             $result = parent::query($sql_add_new_category);
             $new_category_id = mysqli_insert_id($this->db);
             $result = parent::query("INSERT INTO `expenses-manager`.`forum_posts` (`user_id`, `forum_group_id`, `title`, `description`, `date`)
                                      VALUES ("."'".$_SESSION['user_id']."'".','."'".$new_category_id."'".','."'".$data['title']."'".','."'".$data['description']."'".','."'".date('Y-m-d H:m:s')."'".")"); 
         }else{
             // Add only new expenses with old category
             $result = parent::query($sql_add_posts);
        }     
                 if($result){
                    return TRUE;
                 }
                    return FALSE;
    }
    public function GetGrups(){
        
        $sql = "SELECT * FROM forum_groups";
        $result = parent::select($sql);
        if(!empty($result) && is_array($result)){
            return $result;
        }
            return FALSE;        
    }
    public function GetPosts(){
        
        $sql = "SELECT * FROM forum_posts JOIN users ON users.id = forum_posts.user_id WHERE forum_group_id = '".$_GET['forum_group_id']."'";  
                
        $result = parent::select($sql);
        if(!empty($result) && is_array($result)){
            return $result;
        }
            return FALSE;    
        
    } 
    public function GetUsersPosts($data){
        $sql = "SELECT * FROM forum_posts JOIN users ON users.id = forum_posts.user_id WHERE forum_group_id = '".$data['forum_group_id']."' AND users.id='".$data['users']."'"; 
        $result = parent::select($sql);//print_r($result);die;
        if(!empty($result) && is_array($result)){//echo "here";die;
            return $result;
        }
            return FALSE;    
        
    }
}
