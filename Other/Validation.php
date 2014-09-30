<?php
class Validation{
        
    private $data = array();   
    private $errors = array();
        
    public function __construct(){
        
    }
    public function SetValidationParans($data){
        
        $this->data = $data;
    }
    public function RunValidation(){

          if(!empty($this->data)){
              foreach($this->data as $k=>$v ){
                    switch ($k) {
                        
                        case 'username':
                            if($v != ''  && strlen($v) > 2){         
                                 //OK  
                            }else{
                                $this->errors[] =  "<h2>The username is not correct</h2>";
                            }         
                        break;
                            
                        case 'pass':
                              if(($v != '')  && (strlen($v) > 2 )){
                                 //OK
                             }else {
                                    $this->errors[] = "The password is not correct";
                             }           
                        break;
                            
                        case 'firstname':
                               if(($v != '')  && (strlen($v) > 2 ) ){
                                 //OK
                                  if(!ctype_upper($v[0])){
                                      $this->errors[] = 'The first name should starts with capital letter!';
                                  }
                              }else {
                                    $this->errors[] = "The first name  is not correct";
                              }     
                         break;
                            
                         case 'lastname':
                                if(($v != '')  && (strlen($v) > 2 ) ){
                                 //OK
                                   if(!ctype_upper($v[0])){
                                      $this->errors[] = 'The last name should starts with capital letter!';
                                   }   
                                }else {
                                   $this->errors[] = "The last name  is not correct";
                                }
                         break;
                          
                         case 'email':
                             if(!is_string(filter_var($v, FILTER_VALIDATE_EMAIL))){
                                   $this->errors[] = 'Invalid email';
                             }
                         break;
                            
                         case 'name':
                             if(mb_strlen($v) >2 ){         
                                 // // OK  
                            }else{
                                $this->errors[] =  "<h2>Name must be longer than 3 characters!</h2>";
                               }         
                         break;
                            
                         case 'price':
                            if(is_numeric($v)){         
                                 // // OK  
                            }else{
                                $this->errors[] =  "<h2>The price is not correct!</h2>";
                            }         
                         break;     
                         
                         ///...... add more cases
                    }
              }
                        
        }else{
            $this->errors[] = 'Empty fields. PLease fill out all fields!';
        } 
            if(!empty($this->errors)){
                return $this->errors;
            }
                return true;   
    }
}
