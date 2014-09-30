<?php
 require_once '../Models/db.php';
class Upload extends Db{

    private $path;
   
    public function __construct(){
                 
       parent::__construct(); 
      
    }
    public function SetUploadedPicturesPath($path){
        
           $this->path = $path;
    } 
    public function RunUpload(){
        
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);

        if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
        && ($_FILES["file"]["size"] < 999999)
        && in_array($extension, $allowedExts)) {
          if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>"; 
          } else {
            echo "Upload: " . $_FILES["file"]["name"] . "<br>";
            echo "Type: " . $_FILES["file"]["type"] . "<br>";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
            if (file_exists("../Save/" . $_FILES["file"]["name"])) {
              echo $_FILES["file"]["name"] . " already exists. ";
            } else {
              move_uploaded_file($_FILES["file"]["tmp_name"],
             $this->path . $_FILES["file"]["name"]);
              echo "Stored in: " .  $this->path. $_FILES["file"]["name"];
             
            }
          }
        } else {
          echo "Invalid file";
        } 
    }
    public function MovePicturesToDb($data){
   
           $result = $this->db->query("INSERT INTO `expenses-manager`.`pictures` (`picture_path`, `user_id`) VALUES ('".$data['image']['file']['name']."', ".$_SESSION['user_id'].");");
           return $result;     
    }
}









