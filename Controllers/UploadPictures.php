<?php
class UploadPictures{
    private $Upload;
    
    public function __construct(){
        
        require_once '../Other/Upload.php';
        $this->Upload = new Upload();
    }
    public function StartUpload($path){
       
        $this->Upload->SetUploadedPicturesPath($path); 
        $result =  $this->Upload->RunUpload();   
    }
    public function AddToDb($data){
       
        $result = $this->Upload ->MovePicturesToDb($data); 
        return $result;
    }
}

require '../Other/Permissions.php';  Permissions::checkPermissions(); 
$uploadedPictures = new UploadPictures();
$uploadedPictures->StartUpload("../Save/"); 
$imageDetails = array();
$imageDetails['image'] = $_FILES; 
$imageDetails['imagePath'] = "../Save/"; 

if($uploadedPictures->AddToDb($imageDetails)){
      $_SESSION['msg_upload'] = 'The image was succesfully uploaded';
}else{
      $_SESSION['msg_upload'] = 'The image was not uploaded.Please try again!';
     }
header('Location: ../Views/myProfile.php'); 
die; 

