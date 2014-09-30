<?php
class FormExpenses{
    private $ExpensesModel;
  
    public function __construct(){
        
        require_once '../Models/FormExpensesModel.php';
        $this -> ExpensesModel = new FormExpensesModel();
    }
    public function RunExpenses($data){
      
       $result_status = $this -> ExpensesModel ->CheckDataExpenses($data);
       return $result_status; 
    }
    public function WriteInfoExpenses($data_expenses){
        
         $resultWrite = $this -> ExpensesModel ->WriteDataExpenses($data_expenses);
         return $resultWrite;
    }
    public function SetExpenses(){
        
        $result = $this ->ExpensesModel ->GetExpenses();
        return $result;
    }
    public function NewCategories($data){
        
        $resultAddCategories = $this->ExpensesModel->AddCategory($data);
        return $resultAddCategories;
    }
}
   
if($_POST){ 
    $newExpenses = new FormExpenses();
    $expensesResult = $newExpenses ->RunExpenses($_POST);   
    if(!is_array($expensesResult) && $expensesResult === TRUE && !is_array($expensesResultWrite) && $expensesResultWrite === TRUE){
        $_SESSION['msg'] = 'The expenses was succesfully inserted!';
    }
    else{
        $_SESSION['msg'] = 'The expenses was not inserted!';
        if(is_array($expensesResult) && is_array($expensesResultWrite)){
            $_SESSION['errors'] = $expensesResult . 'and' .$expensesResultWrite;
        }
    }
    header('Location: ../Views/expenses.php'); die;
}else{
    $expensesView = new FormExpenses();
    $expenses = $expensesView ->SetExpenses();
    $expenses=$expenses;
}
