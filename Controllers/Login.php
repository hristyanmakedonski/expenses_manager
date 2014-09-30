<?php 
class Login{
   public $newuser;
 
   public function __construct(){
       
        require_once '../Models/LoginModel.php';
        $this->LoginModel=new LoginModel();
     }
   public function login($data){
             $login_errors =   $this->LoginModel->LoginUser($data);
            if(is_array($login_errors)){
                return $login_errors;
            }
   } 
}
if(empty($_SESSION)){
     session_start();   
  } 
$newuser=new Login();
$login_errors=$newuser->login($_POST);
$_SESSION['login_errors'] = $login_errors;
header('Location: ../Views/succsesful_login.php');
die;











