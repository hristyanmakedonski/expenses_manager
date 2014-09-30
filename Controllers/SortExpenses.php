<?php
require_once '../Other/Permissions.php';
class SortExpenses{
    
    private $ExpensesModel;
    public function __construct(){
        
        Permissions::checkPermissions();
        require_once '../Models/FormExpensesModel.php';
        $this -> ExpensesModel = new FormExpensesModel();
    }
    public function Sort($data){
        
     
        if($data['groups'] != 'all'){
              $result = $this->ExpensesModel->GetExpenses($data);               
       }else{
              $result = $this->ExpensesModel->GetExpenses();     
            } 
              return $result;
   }
}

if(!empty($_POST)){
    $sort_expenses = new SortExpenses();
    $result = $sort_expenses->Sort($_POST);
    $_SESSION['filter'] = true;
    $_SESSION['expenses_result'] = $result;
    $_SESSION['selected'] = $_POST['groups'];
    header('Location: ../Views/expenses.php');die;
}
