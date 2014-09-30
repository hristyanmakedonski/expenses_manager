<?php
class ForgetPassword{
    
    private $ForgetPasswordModel;
    private $Email;
    private $ActivationCode;
    public function __construct(){
            require_once '../Models/ForgetPasswordModel.php';
            require_once '../Other/Email.php';
            require_once '../Other/ActivationCode.php';
           
             $this->ForgetPasswordModel = new ForgetPasswordModel();
             $this->Email = new Email(); 
             $this->ActivationCode = new ActivationCode();
    }
    public function check($dataFromPOST){
       
        $result = $this->ForgetPasswordModel->checkIfUserExist($dataFromPOST);  
        if($result){
            $this->ActivationCode->setLenght(5);
            $newPassword =  $this->ActivationCode->generateCode();
               // Send email to the client
            $this->Email->setRecipient($dataFromPOST['email']);
            $this->Email->setSubject('Password change');
            $this->Email->setContent('Your new password is '.$newPassword );
            $email_status = $this->Email->send();
            
            if(!$email_status){
                $msg[] = 'Unfortunately the email was not send to you';
            }
            $dataFromPOST['newPassword'] = $newPassword;    
            $this->ForgetPasswordModel->changePassword($dataFromPOST); 
        }else{
            echo ' INVALID USERNAME OR EMAIL';
        }
    }
}
      
$StupidUser = new ForgetPassword();
$StupidUser->check($_POST);
