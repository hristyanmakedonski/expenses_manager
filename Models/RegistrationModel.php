<?php
require_once 'db.php';
require_once '../Other/Normalization.php';
require_once '../Other/Validation.php'; 

class RegistrationModel extends Db{
    private $normalization ;
    private $validation;
    
    public function __construct(){
        
       parent::__construct(); 
       $this->normalization = new Normalization();
       $this->validation = new Validation();
    }
    public function addUser($data){
           
           $this->normalization->SetParams($data);
           $this->validation->SetValidationParans($data);
           $normalization_status =   $this->normalization->Start();
           $validation_status    = $this->validation->RunValidation();
         
               $result =   parent::query("INSERT INTO `expenses-manager`.`users` (`username`, `password`, `first_name`, `last_name`, `email`,`last_modified`,`activation_code`) 
                           VALUES ("."'".$data['username']."'".','."'".$data['pass']."'".','."'"
                          .$data['firstname']."'".','."'".$data['lastname']."'".','."'".$data['email']."'".','."'"
                          .date('Y-m-d H:m:s')."'".','."'".$data['activation_code']."'".")");
               if($result){
                  return true; 
               }
                  return false;
        //echo "here";die;
           
    }
    public function checkActivationCode($data){
        
        $result = parent::query("Select activation_code FROM users where username = '".$data['u']."' and activation_code = '".$data['ac']."'");
        if($result->num_rows>0){
            // activate account
            $this->activate($data['u']);
            return true;
        }
            return false;
    }
    public function activate($username){
            
         parent::query("UPDATE `expenses-manager`.`users` SET `is_active`=1 WHERE  `username`='".$username."'");
    }
    public function CheckEmptyUsername($data){
            
        $sql = "SELECT * FROM users WHERE username = '".$data['username']."'";
        $result = parent::select($sql);
        if($result && is_array($result)){
          return FALSE;  
        }
          return TRUE;     
   }
   // public function delete($data){
//        
       // $sql = "DELETE FROM users WHERE username='".$data['activation_code']."'";
       // $result = parent::
//        
   // } 
}

