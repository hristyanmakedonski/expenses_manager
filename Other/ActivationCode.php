<?php
class ActivationCode{
    
    private $activation_code ;
    private $RegistrationModel;
    private $lenght = 7;
    
    public function __construct(){
        require_once '../Models/RegistrationModel.php';
        $this->RegistrationModel = new RegistrationModel();
    }
    public function generateCode(){
        
           if($this->lenght == 7){
                $this->activation_code  = substr( md5(rand()), 0, 7);    
           }else{
                $this->activation_code  = substr( md5(rand()), 0, $this->lenght); 
           }
           return $this->activation_code;
    }
    public function setLenght($lenght){
        
        $this->lenght = $lenght;
    }
    public function activation($data){
        
        if($this->RegistrationModel->checkActivationCode($data)){
            return true;
        }
        else{
            return false;
        }
    }
}
