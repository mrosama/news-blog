<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MX_Controller {
        
    const VIEWPATH = '../../video/views/admin/';

    public function __construct() {
        parent::__construct();
        $api = $this -> load -> library('apiservices');

        $api -> CP_Auth(1, true, 'No direct script access allowed');
        $api -> setAdminLang('cp/app');
        $api -> setAdminLang('video/video' );
            $this -> load -> model('cp/admin_model');
            $this -> load -> model('video_model');
            }

            public function index() {
            $api = $this -> load -> library(
        'apiservices');

        $api -> CP_Auth(1, true, 'No direct script access allowed');
        $data = array();

       
       
          
          if($this->input->post("IsPost_delvideo")=="y"){
              
          $this->video_model->DeleteVideo();      
              
           }
          


                $result =   $this->video_model->getVideo(); 
              
 
     
                     $data['Rows_video']   =  $result['Rows_video'];
                     $data['Total_video']  =  $result['Total_video'];
                     $data['Paging_video'] =  $result['Paging_video'];
 $this -> layout -> view(Admin::VIEWPATH . 'index', $data);

           
       }
       
    
    
    
    
    
    public function add(){
           $api = $this -> load -> library(
        'apiservices');

        $api -> CP_Auth(1, true, 'No direct script access allowed');
        $data = array();
        
        $data['cat']= $this->admin_model->MainCatSelect('uk-form-width-large','video',0); 
        
        
           if($this->input->post("IsPost_addvideo")=="y"){
              
          $data['result_add']=$this->video_model->AddMedia();      
              
           }
        
        
        
        
        $this -> layout -> view(Admin::VIEWPATH . 'add', $data);
    }
    
    
    
    
    
    public function edit(){
           $api = $this -> load -> library(
        'apiservices');

        $api -> CP_Auth(1, true, 'No direct script access allowed');
        $data = array();
        
        ///get cat
        
      
           if($this->input->post("IsPost_addvideo")=="y"){
              
          $data['result_add']=$this->video_model->editMedia();      
              
           }
        
          $rs=$this->video_model->getmedia();
         $data['video_info']=$rs;
        
        $data['cat']= $this->admin_model->MainCatSelect('uk-form-width-large','video',0,$rs['cat']); 
        
        
        
        
        $this -> layout -> view(Admin::VIEWPATH . 'edit', $data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function youtube(){
          $api = $this -> load -> library(
        'apiservices');

        $api -> CP_Auth(1, true, 'No direct script access allowed');
        $data = array();
        $arr=array();
        
        
        
         
if($this->input->post('youtube')=="add"){

$data['result_m']=$this->video_model->ImportMedia();

}
        
        
        
        
         if($this->input->post("IsPost_youtype")=="y"){
             
             $result =   $this->video_model->getYouTube(); 
         }
        
        
        
if(@$result!=""){
$xml = new SimpleXMLElement($result);
foreach($xml->entry as $rs) {
$namespaces = $rs->getNameSpaces(true);
$arr['title'][]=(string)$rs->title;
$media = $rs->children($namespaces['media']); 
$arr['thumbnail'][]=(string)$media->group->thumbnail->attributes()->url;
$arr['url'][]=(string)$media->group->player->attributes()->url;
}

}
$data['youtube_list']=$arr;        
        
$data['cat']= $this->admin_model->MainCatSelect('uk-form-width-large','video',0);         
        
        
        
        
        
       $this -> layout -> view(Admin::VIEWPATH . 'youtube', $data);  
    }
    
    
    
    
    
    
    
    
 public function comment(){
     $data=array();
     $api = $this -> load -> library(
        'apiservices');

        $api -> CP_Auth(1, true, 'No direct script access allowed');
        $data = array();
        
       
        
           if($this->input->post("IsPost_delmembers")=="y"){
              
         $this->video_model->DeleteComments();      
              
     }
    
    if($this->input->post("IsPost_activemembers")=="y"){
              
         $this->video_model->setActive();      
              
     }
    
      if($this->input->post("IsPost_deactivemembers")=="y"){
              
         $this->video_model->setDeActive();      
              
     }
    




          


                    $result =   $this->video_model->getComments(); 
              
 
     
                     $data['Rows_video']   =  $result['Rows_video'];
                     $data['Total_video']  =  $result['Total_video'];
                     $data['Paging_video'] =  $result['Paging_video'];
 
        
        
   $this -> layout -> view(Admin::VIEWPATH . 'comment', $data);     
 }   
    
    
    
    
    
    
  
  
    
    
    
        
        
        
 ////////////////////////       
}
    