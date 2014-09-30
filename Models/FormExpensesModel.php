<?php
require_once 'db.php'; 
require_once '../Other/Normalization.php';
require_once '../Other/Validation.php';
require_once '../Other/Permissions.php';

class FormExpensesModel extends Db{
    private $normalization;
    private $validation;
    public function __construct(){
       Permissions::checkPermissions(); 
       parent::__construct(); 
       $this->normalization = new Normalization();
       $this->validation = new Validation();
    }
    public function CheckDataExpenses($data){
        
        $errors = array();
        // $this->normalization->SetParams($data);
        // $normalization_status = $this->normalization->Start();
        // if(is_array($normalization_status)){ 
            // foreach($normalization_status as $k=>$v){
                // $errors[] = 'The field '.$v.' should not be empty! </br>';
            // }
// 
        // }
//         
        // $this->validation->SetValidationParans($data);
        // $validation_status = $this->validation->RunValidation();
        // if(is_array($validation_status)){ 
            // foreach($validation_status as $k=>$v){
                // $errors[] = ' '.$v.' </br>';
            // }
        // }
                                                             
              if(empty($errors)){
                  
                  $sql_add_category =  "INSERT INTO `expenses-manager`.`expenses_categories` (`name`, `user_id`)
                                        VALUES ("."'".$data['add_categories']."'".','."'".$_SESSION['user_id']."'".")";
                  
                  $sql_add_expenses = "INSERT INTO `expenses-manager`.`expenses` (`expenses_name`, `expenses_price`, `date`, `category_id`, `user_id`)
                          VALUES ("."'".$data['name']."'".','."'".$data['price']."'".','."'". date("Y-m-d")."'".','."'".$data['categories']."'".','."'".$_SESSION['user_id']."'".")";
                  
                 if($data['add_categories'] != NULL){
                      
                         //Add new category
                         $result = parent::query($sql_add_category);
                         $new_category_id = mysqli_insert_id($this->db);
                         $result = parent::query("INSERT INTO `expenses-manager`.`expenses` (`expenses_name`, `expenses_price`, `date`, `category_id`, `user_id`)
                          VALUES ("."'".$data['name']."'".','."'".$data['price']."'".','."'". date("Y-m-d")."'".','."'".$new_category_id."'".','."'".$_SESSION['user_id']."'".")"); 
                          
                 }else {
                        // Add only new expenses with old category
                        $result = parent::query($sql_add_expenses);
                 
                  }  
            }
     }
    public function GetExpenses($filter = NULL){
         if($filter === NULL){
             $sql = "SELECT * FROM expenses JOIN expenses_categories ON expenses_categories.id = expenses.category_id 
                 WHERE expenses.user_id ='".$_SESSION['user_id']."'";
         }else{
              $sql = "SELECT * FROM expenses JOIN expenses_categories ON expenses_categories.id = expenses.category_id 
                 WHERE expenses.user_id ='".$_SESSION['user_id']."' AND expenses.category_id = ".$filter['groups'];
              if($_POST['date'] !== NULL){
              $sql = "SELECT * FROM expenses JOIN expenses_categories ON expenses_categories.id = expenses.category_id 
                 WHERE expenses.user_id ='".$_SESSION['user_id']."' AND expenses.category_id = '".$filter['groups']."' AND expenses.date = '".$_POST['date']."'"; 
             }   
         }  
        $result = parent::select($sql);         
        if($result ){
               return $result; 
          }
          return false; 
        }
 }
     
   



