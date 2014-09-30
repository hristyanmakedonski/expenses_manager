<?php
require_once 'db.php'; 
class ShowInfoUserModel extends Db{
    
    public function __construct(){
        
         parent::__construct(); 
    } 
    public function GetInfoUserDb($username){
        
        $info = "Select * FROM users JOIN pictures ON users.id = pictures.user_id WHERE users.username = '".$username."' ";
        $result = parent::select($info);
        if(is_array($result) && !empty($result)){
            return $result;  
        } 
    }
}
