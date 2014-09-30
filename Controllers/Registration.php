<?php
class Registration{
    private $RegisterModel;
    private $Email;
    private $ActivationCode;
    private $EmptyUser;
    private $DeleteUser;
   
    public function __construct(){
      
        require_once '../Models/RegistrationModel.php';
        require_once '../Other/Email.php';
        require_once '../Other/ActivationCode.php';
    
        $this->Email = new Email();
        $this->RegisterModel = new RegistrationModel();
        $this->ActivationCode = new ActivationCode();
        $this->EmptyUser = new RegistrationModel();
        $this->DeleteUser = new RegistrationModel();     
    }   
    public function add($data){
        $msg = array();
        $this->ActivationCode->setLenght(20);
        $data['activation_code'] =  $this->ActivationCode->generateCode();
        $ResultEmptiUser = $this->EmptyUser->CheckEmptyUsername($_POST);
        if($ResultEmptiUser === TRUE){
            $result  = $this->RegisterModel->addUser($data); // Add user in to DB
          // var_dump($result);die;
            if($result === TRUE){
                    // Send email to the client
                    $this->Email->setRecipient($data['email']);
                    $this->Email->setSubject('New Registration Confirmation for '.$data['username']);
                    $this->Email->setContent('You must clik on the link below in order to compleate the registration .  Link :  http://localhost/ExpensesManager/Views/activation.php?u='.$data['username'].'&ac='.$data['activation_code']);
               
                    if($this->Email->send() !== TRUE){
                        $msg[] = 'Unfortunately the email was not send to you';
                      //  $this->DeleteUser->Delete($_POST);
                   }else{
                       
                        $msg[] = 'The data was succesfully inserted.Please, check your email - '.$data['email'].' in order to compleate the registration!';
                        }
            }else{
                        $msg[] = 'Unfortunately the data wasn\'t inserted!';
                 }
             return  $msg;     
        }else{
             $msg[] = 'The username is busy!';
        }
             return  $msg;    
    }    
}
if(empty($_SESSION)){
             session_start();   
          } 
$register = new Registration(); 
$msg = $register->add($_POST);
$_SESSION['msg'] = $msg;
header('Location: ../Views/succesful_registration.php'); 
die;











