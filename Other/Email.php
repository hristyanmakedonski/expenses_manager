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
    public function send(){
        
        $headers =  'From: himakedonski@gmail.com' . "\r\n" .
                    'Reply-To: '.$this->recipient . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
        if( mail($this->recipient, $this->subject, $this->content, $headers)){
            return true;
        }
        return false;
        
    }
}
