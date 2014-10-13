<?php

class ForumController{
    
    private $forumModel;
    
    public function __construct(){
          
        require_once '../Models/ForumModel.php';
        $this ->forumModel = new ForumModel();
       
    }
    public function CreatePost($data){ 

        $infoPost = $this->forumModel->AddToForum_Post($data);     
        return $infoPost; 
       
    }
    public function getGroups(){
        
        $result = $this->forumModel->GetGrups();
        return $result;
        
    }
    public function getAllPosts(){
        $resultPosts = $this->forumModel->GetPosts();
        return $resultPosts;
      
    }
    public function getUsersPosts($data){
        
        if($data['users'] == 'all'){
             $resultUsersPosts = $this->getAllPosts();;
             return $resultUsersPosts;
        } 
    
        $resultUsersPosts = $this->forumModel->GetUsersPosts($data);
        return $resultUsersPosts;
        
    }
}
if($_POST){
    
    $forum = new ForumController();
    $forum->CreatePost($_POST);
    header('Location: ../Views/forum.php');die;
}
