<?php
require_once '../Models/db.php';
class ForumUsers{
    public static $db; 
    public static function GetUsers($forum_group_id){
        self::$db = new Db();
       $users = self::$db->select('SELECT id,username FROM users JOIN forum_posts ON forum_posts.user_id = users.id  WHERE forum_group_id = '.$forum_group_id.'  group by username'); 
        return $users;
    }    
}
if(!empty($users)){
$_SESSION['users'] = $users;
die;
}
