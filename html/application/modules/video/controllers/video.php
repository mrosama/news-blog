<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends MX_Controller  {
    
    const VIEWPATH='../../video/views/video/';
    private $api;
    
      public function __construct() {
    
      parent::__construct();
       $this->api = $this -> load -> library('apiservices');
   
     $this->api->setThemes('app/app');
   $this->api->setThemes('video');
    $this->api->setClang('media');
   $this->load->model('media_model');
  }
    
    
    
    
   public function index(){
       $api = $this -> load -> library('apiservices');
         $api->start_Cache();
    $data=array(); 
     
     
       if ($this->uri->segment(3) !== FALSE){
           $param = (string) $this->uri->segment(3);
           $rs=$this->media_model->getVideoBySlug( $param ); 
           
            if( $rs=='Error'){
              show_404(); 
           }
           
           
           
          $data['recordset']= $rs;
       } else {
           
           show_404();
       }
     
       //update view
       $this->media_model->updateVisitor($rs['ID']);
       //
     
     
     if($this->input->post("IsPost")=="addComment"){
         
        $data['comment_result']=$this->media_model->addComments();
         
     }
     
     
     $data['comments']=$this->media_model->getComments($rs['ID']);
     $data['number_comments'] = $this->media_model->getnumCommt($rs['ID']);
     
     
   $this->template->TPL(video::VIEWPATH.'index', $data);  
 }   
      
    
    
    
    
    
    
    
    
    
   
   
   
    public function category(){
        $api = $this -> load -> library('apiservices');
		  $this->load->model('media_model');
         $api->start_Cache();
    $data=array(); 
     
     
     
     //get cat
     if ($this->uri->segment(3) === FALSE){
         $cat=0;
     } else {
        $cat= intval($this->security->xss_clean($this->uri->segment(3)));
     }
     $data['cat']=$this->media_model->getCat( $cat );
     
     
     
  $this->template->TPL(video::VIEWPATH.'category', $data);  
 }   
   
   
   
   
     ///
    
   public function pages(){
    //   $api = $this -> load -> library('apiservices');
     //    $api->start_Cache();
      $data=array();    
       
       if ($this->uri->segment(3) === FALSE){
         $cat=0;
     } else {
        $cat= intval($this->security->xss_clean($this->uri->segment(3)));
     }
     
      $result_row=$this->media_model->getAllVideo( $cat );  
       
       $data['Rows_data']=$result_row['Rows_data'];
       $data['Total_data']=$result_row['Total_data'];
       $data['Paging_data']=$result_row['Paging_data'];
       
      $this->template->TPL(video::VIEWPATH.'pages', $data);   
   }   
    
   
   
   
   
   
   
    
    
 
 
 
 
 
 
 
 
 
 
 
 
 
}   