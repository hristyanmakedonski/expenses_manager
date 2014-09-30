<?php
require_once 'db.php'; 
require_once '../Other/Normalization.php';
require_once '../Other/Validation.php'; 

class LoginModel extends Db{
    private $normalization ;
    private $validation;
    
    public function __construct(){
        
       parent::__construct(); 
       $this->normalization = new Normalization();
       $this->validation = new Validation();
    }
    public function LoginUser ($data){
        
    $errors = array();
        $this->normalization->SetParams($data);
        $normalization_status = $this->normalization->Start();
        if(is_array($normalization_status)){ 
            foreach($normalization_status as $k=>$v){
                $errors[] = 'The field '.$v.' should not be empty! </br>';
            }
        }
        $this->validation->SetValidationParans($data);
        $validation_status = $this->validation->RunValidation();
        if(is_array($validation_status)){ 
            foreach($validation_status as $k=>$v){
                $errors[] = ' '.$v.' </br>';
            }
        }
        if(empty($errors)){
             $sql = "SELECT username, password, is_active,id, first_name FROM users WHERE 
                username ='".$data['username']."' AND password = '".$data['pass']."' AND is_active = 1";
                     $result = parent::select($sql);
                if (!empty($result)){
                   if(empty($_SESSION)){
                      session_start();
                   } 
                     $_SESSION['is_logged'] = '1';
                     $_SESSION['firstname'] = $result[0]['first_name'] ;
                     $_SESSION['username'] = $result[0]['username'];
                     $_SESSION['user_id'] = $result[0]['id'];
                     header('Location: ../Views/home.php');die;
                }else{
                     $errors[] = "The account is not active or login credentials are not correct!";
                   }     
         }
          return $errors;
    }
}



