<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MX_Controller {
        
    const VIEWPATH = '../../post/views/admin/';

    public function __construct() {
        parent::__construct();
        $api = $this -> load -> library('apiservices');

        $api -> CP_Auth(1, true, 'No direct script access allowed');
        $api -> setAdminLang('cp/app');
         $api -> setAdminLang('post/post' );
            $this -> load -> model('cp/admin_model');
            $this -> load -> model('post_model');
            }
    
    
    

    public function index() {
            $api = $this -> load -> library(
        'apiservices');

        $api -> CP_Auth(1, true, 'No direct script access allowed');
        $data = array();

       
       
           
          if($this->input->post("IsPost_delvideo")=="y"){
              
          $this->post_model->DeletePost();      
              
          }
          


                $result =   $this->post_model->getPost(); 
              
 
     
                     $data['Rows_post']   =  $result['Rows_video'];
                     $data['Total_post']  =  $result['Total_video'];
                     $data['Paging_post'] =  $result['Paging_video'];
 $this -> layout -> view(Admin::VIEWPATH . 'index', $data);

           
       }





    
    
 public function comment(){
     $data=array();
     $api = $this -> load -> library(
        'apiservices');

        $api -> CP_Auth(1, true, 'No direct script access allowed');
       
       
        
           if($this->input->post("IsPost_delmembers")=="y"){
              
         $this->post_model->DeleteComments();      
              
     }
    
    if($this->input->post("IsPost_activemembers")=="y"){
              
         $this->post_model->setActive();      
              
     }
    
      if($this->input->post("IsPost_deactivemembers")=="y"){
              
         $this->post_model->setDeActive();      
              
     }
    




          


                    $result =   $this->post_model->getComments(); 
              
 
     
                     $data['Rows_video']   =  $result['Rows_video'];
                     $data['Total_video']  =  $result['Total_video'];
                     $data['Paging_video'] =  $result['Paging_video'];
 
        
        
   $this -> layout -> view(Admin::VIEWPATH . 'comment', $data);     
 }   
    
    
 ////////////////////////////////////////////







public function tag(){
       $data=array();
     $api = $this -> load -> library(
        'apiservices');

        $api -> CP_Auth(1, true, 'No direct script access allowed');
       
       
       
       
        if($this->input->post("IsPost_addcat")=="y"){
        
          $result= $this->post_model->setTags();
        if($result=='add'){
            $data['result_cat']='add';
        } 
         if($result=='error'){
            $data['result_cat']='error';
        } 
    }
       
       
       
    if($this->input->post("IsPost_editcat")=="y"){
        
          $result= $this->post_model->editTags();
        if($result=='add'){
            $data['result_cat']='add';
        } 
         if($result=='error'){
            $data['result_cat']='error';
        } 
    }
      
     
      if($this->input->post("IsPost_deltag")=="y"){
                $this->post_model->DeleteTag();
          
      }
    
    
    
    ///////////////////
    
    
    
    $seg = $this -> uri -> segment(3);
    $total_seq= $this->uri->total_segments();
    if($total_seq==5){
        
        if($this -> uri -> segment(4)=='edit'){
            if(ctype_digit($this -> uri -> segment(5))){
                //
                 $data['cat_edit']='edit';
                 $data['cat_id']=$this -> uri -> segment(5);
                $cat_row = $this->post_model->get_tags($this -> uri -> segment(5));
              
                $data['cat_row']=$cat_row;
             
                
            }
        }
        
    } else {
    
    
    
    
    
    
    
    
    ///////////
    
    
    
    
    
    
      
      
                    $result = $this->post_model->getTags(); 
       
                     $data['Rows_video']   =  $result['Rows_video'];
                     $data['Total_video']  =  $result['Total_video'];
                    $data['Paging_video'] =  $result['Paging_video'];
    }
 $this -> layout -> view(Admin::VIEWPATH . 'tag', $data);     
}





public function add(){
  $data=array();
  
  
       
    if($this->input->post("IsPost_addpost")=="y"){
        
        $result = $this->post_model->addPost(); 
        $data['result_add']='ADD';
        
    }
  
  
   $data['top_tag']=$this->post_model->tag_cloud();
   $data['cat']= $this->admin_model->MainCatSelect('uk-form-width-large','post',0); 
   $this -> layout -> view(Admin::VIEWPATH . 'add', $data);   
}

/////////////////////////////////////////////


 function edit(){
   $data=array();
     
     
     if($this->input->post("IsPost_addpost")=="y"){
        
        $result = $this->post_model->EditPost(); 
         $data['result_add']=$result;
        
    }
     
     
     
     $rtag = $this->post_model->getSelectedTags();
   
     
     $data['etags']= $rtag;
     
    $rs= $this->post_model->getPosts();
    $data['row_post']=$rs;
    $data['top_tag']=$this->post_model->tag_cloud();
    $data['cat']= $this->admin_model->MainCatSelect('uk-form-width-large','post',0,$rs['cat']); 
    
  $this -> layout -> view(Admin::VIEWPATH . 'edit', $data);       
 }

























//end
    
}





   