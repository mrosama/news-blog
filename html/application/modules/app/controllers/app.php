<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends MX_Controller  {

 const VIEWPATH='../../app/views/include/';
 
  public function __construct() {
    
      parent::__construct();
     $api = $this -> load -> library('apiservices');
   
   $api->setThemes('app');
    $api-> setClang('api/api');
    
  }
 
 public function lang($lang){
      $api = $this -> load -> library('apiservices');
      $api->ChangeLanguage($lang);
 }
 
 
 
 
 
 
    public function index()
    {
   $api = $this -> load -> library('apiservices');
      $api->start_Cache();
       $data=array();
       //echo "test........";
       
       
       //echo $this->lang->line('key_1');
     //  $this->lang->switch_uri('ar');
     // echo $this->lang->lang();
      	//	$this->lang->load('app');
    //  echo $this->lang->line('key_1');
        $data['val1']="welcome..";
       
        // $this->load->view('index',$data);
         
     $this->template->TPL(App::VIEWPATH.'index', $data); 
    }
    
    
    
    public function contactus()
    {
        $api = $this -> load -> library('apiservices');
         $api->start_Cache();
         
         $data=array();
         
 /*  $api = $this -> load -> library('apiservices');
  $api->Acl_Auth('null',true);
       */ 
         
          
         
         
    $this->template->TPL(App::VIEWPATH.'contactus', $data);
    
    }
    
    
    public function elist(){
        $api = $this -> load -> library('apiservices');
         $api->start_Cache();
       $data=array();
       
    $this->template->TPL(App::VIEWPATH.'mail-list', $data); 
    }
    
    
    
    
  public function logout(){
      modules::run('api/singOut');
      
      
  }  
    
    
   
   
   
   
  public function register(){
    $data=array();  
   
       $this->template->TPL(App::VIEWPATH.'register', $data);
  } 
   
   
   
   public function reg(){
       $data=array();  
         $this->template->TPL(App::VIEWPATH.'reg', $data);
   } 
   
   
   public function restorpass(){
       
         $data=array();  
         $this->template->TPL(App::VIEWPATH.'restorpass', $data);  
   }
   
   
    
     public function profile(){
   
    
         $data=array();  
         $this->template->TPL(App::VIEWPATH.'profile', $data);  
   }
    
    
    
    
    /////
    
    public function aboutus(){
        $api = $this -> load -> library('apiservices');
         $api->start_Cache();
          $data=array();  
         $this->template->TPL(App::VIEWPATH.'aboutus', $data);  
    }
    
    
     public function job(){
        $api = $this -> load -> library('apiservices');
         $api->start_Cache();
          $data=array();  
         $this->template->TPL(App::VIEWPATH.'page_job', $data);  
    }
    
    
     public function services(){
        $api = $this -> load -> library('apiservices');
         $api->start_Cache();
          $data=array();  
         $this->template->TPL(App::VIEWPATH.'services', $data);  
    }
    
    
     public function ads(){
        $api = $this -> load -> library('apiservices');
         $api->start_Cache();
          $data=array();  
         $this->template->TPL(App::VIEWPATH.'ads', $data);  
    }
    
    
     public function info(){
        $api = $this -> load -> library('apiservices');
         $api->start_Cache();
          $data=array();  
         $this->template->TPL(App::VIEWPATH.'info', $data);  
    }
    
    
    
    
    
    
    
    
    
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
