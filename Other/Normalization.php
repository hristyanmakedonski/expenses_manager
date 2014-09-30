<?php 
class Normalization{
    private $Params = array();
    private $errors = array();
   
    public function __construct(){
        
    }
    public function SetParams($data){
        
        $this->Params = $data;
    }
    public function Start(){
     
        foreach($this->Params as $key=>$value){
             if($value == ''){ 
                 $this->errors [] = $key;
             }else{
                $this->Params[$key] = trim($value);   
             }   
        }
        if(!empty($this->errors)){
             return $this->errors;
        }
        return true; 
    }
}
