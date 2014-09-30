<?php
class ShowInfoUser{
   
   private $infoUser; 
   private $ShowInfoUserModel;
   public function __construct(){
        
   require_once '../Models/ShowInfoUserModel.php';
   $this->ShowInfoUserModel = new ShowInfoUserModel();
   }
   public function GetInfo(){
       
     $data = $this->ShowInfoUserModel->GetInfoUserDb($_SESSION['username']);
     return $data; 
   }
}
require_once '../Other/Permissions.php';  Permissions::checkPermissions(); 
$infoUser = new ShowInfoUser();
$result = $infoUser->GetInfo(); 
$_SESSION['result'] = $result; 
