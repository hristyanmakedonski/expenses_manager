<?php
class Permissions {
     
    public static function checkPermissions($home_dir ='../'){
         
          if(empty($_SESSION)){
             session_start();   
          } 
          if($_SESSION['is_logged'] != "1" || $_SESSION['is_logged'] ==null){
              header('Location: '.$home_dir); die;
          }
    }
}
