<?php
require_once 'db.php';  
class ForgetPasswordModel extends Db{
    
    private $email;
    
    public function checkIfUserExist($data){
          
       $result = parent::query("Select username, email FROM users where username = '".$data['username']."' and email = '".$data['email']."'");
       
       if($result->num_rows>0){
          return true; 
        }
          return false;
    }
    public function changePassword($data){
 
         $result = parent::query("UPDATE `expenses-manager`.`users` SET `password`='" .$data['newPassword']. "' WHERE  `username`= '".$data['username']."' and email = '".$data['email']."'");
         if($result->num_rows>0){
             return true;
         }
             return false; 
    } 
}

