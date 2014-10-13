<?php
class Email{
    private $recipient;
    private $subject;
    private $content;
        
    public function __construct(){
        
    }
    public function setRecipient($recipient){
        $this->recipient = $recipient;    
    }
    public function setSubject($subject){
        $this->subject = $subject;
    }
    public function setContent($content){
        $this->content = $content;
    }
    public function send($data){
        
     
$to       =  $data['email'];
$subject  = 'Welcome to expenses manager!';
$message  = 'Hi, you just received an email from expenses manager!';
$headers  = 'From: himakedonski@gmail.com' . "\r\n" .
            'Reply-To: himakedonski@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
if(mail($to, $subject, $message, $headers))
    return TRUE;
else
    return FALSE;
    }
}
