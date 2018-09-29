<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ADS extends MX_Controller  {
    
 
 
 
  public function __construct()
       {
           
           
            parent::__construct();
       $this->load->model('ADS_model');
       }
       
       
       
 public function banner($id,$token){
     $api = $this -> load -> library('apiservices');
         $api->start_Cache();
        $ConfigToken = $this -> config -> item('Token_access_key');
        if($ConfigToken != $token){
            
           exit("Error :Token is invalid"); 
        }
     
     echo $this->ADS_model->Banner($id);
     
 }      
       
 
 
    
}