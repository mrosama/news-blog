<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends MX_Controller  {

public $api;

public $PathEmail;
public $keys;

 public function __construct() {
    
      parent::__construct();
      $this->load->library('form_validation');
            $this->form_validation->CI =& $this;
      $this->api=$this->load->library('apiservices');
      $this->load->model('Api_model');
   //  $this->lang->load('api', 'arabic');
     
    $this->api->setClang('api');
 
    
  }




    public function index()
    {
       
     
    }
    
    
    public function hitCounter($token){
        $api = $this -> load -> library('apiservices');
         $api->start_Cache();
           $ConfigToken = $this -> config -> item('Token_access_key');
        if($ConfigToken != $token){
            
           exit("Error :Token is invalid"); 
        }
        
          $data=array();
        
        $result = $this->Api_model->HitCounter();
         $data['hitcounter']=$result;
     
        $this->load->view('hitcounter',$data);
         
         
         
         
    }
    
    
      public function visitorOnline($token){
          
         $data=array(); 
           $ConfigToken = $this -> config -> item('Token_access_key');
        if($ConfigToken != $token){
            
           exit("Error :Token is invalid"); 
        }
        // $this->load->model('Api_model');
      $settings=$this->Api_model->getOptionsVistors();
        
        $data['conf_vistors'] = @$settings;
        
        
          $result = $this->Api_model->getvistorOnline();
         $data['visitoronline']=$result;
        
        
        
        
        
        
        
        $this->load->view('online',$data);
        
        
          
      }
    
    
    
    
     public function Contactus($token)
    {
        $api = $this -> load -> library('apiservices');
         $api->start_Cache();
          $ConfigToken = $this -> config -> item('Token_access_key');
        if($ConfigToken != $token){
            
           exit("Error :Token is invalid"); 
        } 
        
         $this->load->library('form_validation');
        
       $data=array();
      $data['conf_options_mail']=$this->Api_model->get_contactus();
      
 
       
       
       $this->load->helper('captcha');
  
 

  
  
    if($this->input->post('IsPost-email')=='send'){
      $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
       $name=$this->input->post('name',true);
       $email=$this->input->post('email',true);
        $site=$this->input->post('website',true);
        $msg=$this->input->post('message',true);
        $code=$this->input->post('codevalidate',true);
       
    $this->form_validation->set_rules('name', $this->lang->line('contactus_input_name'), 'required|xss_clean');
  $this->form_validation->set_rules('email', $this->lang->line('contactus_input_email'), 'required|valid_email|xss_clean');
   $this->form_validation->set_rules('message', $this->lang->line('contactus_input_msg'), 'required|xss_clean');
   $this->form_validation->set_rules('codevalidate', $this->lang->line('contactus_input_captcha'), 'required|callback_check_captcha');
    $this->form_validation->set_message('required', '  %s ');      
     $this->form_validation->set_message('valid_email', '  %s ');  
        
      if($this->form_validation->run() == FALSE)
  {
    
 //$this->Email();
  }
  else
  {
      
    $result=$this->Api_model->add_message();
    if($result==true){
        $data['rs_contactus']='success';
    }
  }
     
     
     
   
  }
  

   $data['img_captcha']=$this->_create_captcha();  
  
  
 $this->load->view('email',$data);
     
    }
    
    
    
    
   public function check_captcha()
 {
      $cap=$this->input->post('codevalidate');
    // echo  $this->session->userdata('word') . '------'.$val;
 

  if($cap== $this->session->userdata('word')) 
  
  {
   return true;
  }
  else{
   $this->form_validation->set_message('check_captcha',  $this->lang->line('contactus_input_captcha'));
   return false;
  }
 }  
    
    
    
    
    
   
   
 public function email_list($token,$action=''){
     if($action==''){
         exit("Error email_list:action is invalid"); 
         
     }
        $this->PathEmail=$action;
       $ConfigToken = $this -> config -> item('Token_access_key');
        if($ConfigToken != $token){
            
           exit("Error :Token is invalid"); 
        } 
        
    $this->form_validation->set_error_delimiters('<div class="alert-message-danger">', '</div>');    
        
        
        
        $data=array();
        $data['action_emailform']='';
        $data['action_emailform']=$action;
        
        $data['options_maillist']=$this->Api_model->get_contactus();
        
        
        $this->load->view('maillist',$data);
     
 }  
   
    public function Process_list($token){
        
         $ConfigToken = $this -> config -> item('Token_access_key');
         if($ConfigToken != $token){
            
           exit("Error :Token is invalid"); 
        } 
         
         
           $data=array();
           
        //////////////////////////////////////////
        
  $segs = $this->uri->segment_array();

 if (in_array("confirmEmail", $segs)) {
 
 $keys=array_search("confirmEmail",$segs);
    
     if (isset($segs[$keys+1])){
          if (isset($segs[$keys+2])){
          $result_del = $this->Api_model->delete_Cmail($segs[$keys+1],$segs[$keys+2]); 
          $data['result_del'] = $result_del ;  
              
          }
     }
     
 }
        
        
        
        
           //////////////////////////////////////////
           ////////////////delete add active
           if($this->input->post('IsPost_emaillist')=='y'){
             
                 $this->load->library('form_validation');
                   $this->form_validation->set_error_delimiters('<div class="alert-message-danger">', '</div>');    
               
               $this->form_validation->set_rules('email_maillist', $this->lang->line('contactus_input_email'), 'required|valid_email|xss_clean');
               $this->form_validation->set_message('valid_email', $this->lang->line('contactus_input_email')); 
               
                 if($this->form_validation->run() == FALSE)
                           {
    
 
                       } else {
                           
                     $result = $this->Api_model->addEmail_list();        
                     $data['rs_c_email']=  $result ;    
                          // echo $result 
                       }
               
               
               
               
               
               
               
               
          //end if post     
           }
           
           
         
          $this->load->view('pmaillist',$data);
        
        
    } 
    
    
    
    
    //$options array   registerPage   forgetPassword  profilePage  logout  
    
    //Page_Register
    //Page_Password
    //Page_Profile
    //page_Logout
    
    //modules::run('api/singOut'); inside page
    
  public function login_form($token,$options=array()){
      $api = $this -> load -> library('apiservices');
         $api->start_Cache();
      $data=array();
      $ConfigToken = $this -> config -> item('Token_access_key');
        if($ConfigToken != $token){
            
           exit("Error :Token is invalid"); 
        } 
        
        
        $options_members=$this->Api_model->getOptions();
         $data['conf_options_memebers']=$options_members;
        
        if(is_array($options) && count($options)!=0){
      
      $data['Login_Options']=$options;
        } else {
            
          exit("Error :login_form :options is invalid");   
        }
        
        ////////////////////
        
       if($this->input->post('IsPost_LoginForm')=='y'){
          $result = $this->Api_model->Auth_Login();  
           if($result=='ERROR_LOGIN'){
              $data['rs_c_login']=  'errorlogin' ;   
               
           }      
                       
            
            
        }
        
        
        
      
       $this->load->view('login',$data);
  }  
    
    
    
    
    
    
    
 public function singOut(){
      
    $dataoptions=array(
 'status'=>'offline'
 ); 
  $this->db->where('ID', $this->session->userdata('IUser_ID')); 
  $this -> db -> update('members', $dataoptions);     
  
  
  @$CPUser = array(
'IUser_ID'  => '',
'IUser_name'  => '',
'IUser_pic'     => '',
'IUser_email'     => '',
'IUser_role'     => '',
'IUser_admin' => '',
);
     
  
      
  $this->session->unset_userdata($CPUser); 
    
  redirect('/', 'refresh');    
      
      
      
      
      
      
      
  }
    
    
    

public function register($token,$url=''){
  
    
      $data=array();
      $ConfigToken = $this -> config -> item('Token_access_key');
        if($ConfigToken != $token){
            
           exit("Error :Token is invalid"); 
        } 
       
       $options_members=$this->Api_model->getOptions();
         $data['conf_options_memebers']=$options_members;
      
       if($options_members['iuser_reg']=='On'){
         // print_r($options_members);
       
         $this->load->library('form_validation');
         $data['mem_country']= $this->Api_model->getCountry();
         
           
           
           
           
           
              ////////////////
 

 
         if($this->input->post('IsPost_newuser')=='y'){
             
         
             
             $this->load->helper(array('form', 'url'));
    
        
          $name=$this->input->post('name',true);
       $email=$this->input->post('email',true);
        $country=$this->input->post('country',true);
        $gender=$this->input->post('gender',true);
        $code=$this->input->post('codevalidate',true);
        
            
     $this->form_validation->set_rules('name', $this->lang->line('contactus_input_name'), 'required|xss_clean');
     $this->form_validation->set_rules('email', $this->lang->line('contactus_input_email'), 'required|valid_email|xss_clean');
     $this->form_validation->set_rules('password', $this->lang->line('mem_missing_password'), 'required|xss_clean');
     $this->form_validation->set_rules('cpassword', $this->lang->line('mem_missing_cpassword'), 'required|xss_clean');
     $this->form_validation->set_rules('codevalidate', $this->lang->line('contactus_input_captcha'), 'required|xss_clean|callback_check_captchas');
     $this->form_validation->set_message('required', '  %s ');      
     $this->form_validation->set_message('valid_email', '  %s ');  
        
         if($this->form_validation->run() != FALSE) {
           
           $result=$this->Api_model->setNewMembers($url);
       if($result=="add"){
        $data['rs_register']='success';
        }
       
        if($result=="addbyemail"){
        $data['rs_register']='addbyemail';
        }

 if($result=="addbyadmin"){
        $data['rs_register']='addbyadmin';
        }
       
       
      if($result=="found"){
        $data['rs_register']='error';
        }


        
        }  
              
  }


   $data['img_captcha']=$this->_create_captcha();   
        
    
         
$this->load->view('register',$data);  
    
  }  
}






    
   private function _create_captcha()
  {
     
       $this->load->helper('captcha');
       $vals = array(
    'word'   => $this->api->generateRandomString(5),
    'img_path'   => './assets/lib/captcha/img/',
    'img_url'    => base_url().'assets/lib/captcha/img/',
    'font_path'  => './assets/lib/captcha/fonts/tahomabd.ttf',
    'img_width'  => '200',
    'img_height' => 50,
    'expiration' => 60
    );   
      
       $cap = create_captcha($vals);  
       $image = $cap['image'];
    // ...and store the captcha word in a session
    $this->session->set_userdata('word', $cap['word']);
    // we will return the image html code
    return $image;
      
      
  }  
    
   public function check_captchas($string)
  {
      
       
    if($string== $this->session->userdata('word'))
    {
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('check_captchas', 'Wrong captcha code');
      return FALSE;
    }
  } 
    
    
    
  public function activeAccount($token){
   $data=array();   
   $ConfigToken = $this -> config -> item('Token_access_key');
        if($ConfigToken != $token){
            
           exit("Error :Token is invalid"); 
        } 
   
   
        $segs = $this->uri->segment_array();

 if (in_array("creg", $segs)) {
 
 $keys=array_search("creg",$segs);
    
     if (isset($segs[$keys+1])){
          if (isset($segs[$keys+2])){
       $result_active = $this->Api_model->Enabled_Account($segs[$keys+1],$segs[$keys+2]); 
        $data['result_active'] = $result_active ;  
              
          }
     }
     
 }
 
  $this->load->view('activeaccount',$data);   
      
      
  }  
    
    
    
   public function restorpass($token){
       
       $data=array();   
   $ConfigToken = $this -> config -> item('Token_access_key');
        if($ConfigToken != $token){
            
           exit("Error :Token is invalid"); 
        } 
   
   
        $segs = $this->uri->segment_array();
        
       
        
        if(in_array('repass',$segs)){
          $data['viewform']='link';
          $data['results_c_p']=$this->Api_model->Active_Password();
            
        } else {
            
            
             if($this->input->post('IsPost_restorepass')=='y'){
                
               $result_rstore = $this->Api_model->Restor_Password();  
            $data['results_r_m']=$result_rstore;
            
             }
             
             
            
            $data['viewform']='form';
            
        }
        
        
         $this->load->view('restorpass',$data);  
         
   } 
    
    
    
    
    
  public function profile($token){
        $api = $this -> load -> library('apiservices');
  $api->Acl_Auth('null',true);
  
      $data=array();
       $ConfigToken = $this -> config -> item('Token_access_key');
        if($ConfigToken != $token){
            
           exit("Error :Token is invalid"); 
        } 
   
   
         $options_members=$this->Api_model->getOptions();
         $data['conf_options_memebers']=$options_members;
      $this->load->library('form_validation');
     
         $data['mem_country']= $this->Api_model->getCountry();
         
          
           if($this->input->post('IsPost_newuser')=='y'){
             
         
             
             $this->load->helper(array('form', 'url'));
    
        
          $name=$this->input->post('name',true);
         $country=$this->input->post('country',true);
        $gender=$this->input->post('gender',true);
        $code=$this->input->post('codevalidate',true);
        
            
     $this->form_validation->set_rules('name', $this->lang->line('contactus_input_name'), 'required|xss_clean');
     $this->form_validation->set_rules('password', $this->lang->line('mem_missing_password'), 'required|xss_clean');
     $this->form_validation->set_rules('cpassword', $this->lang->line('mem_missing_cpassword'), 'required|xss_clean');
     $this->form_validation->set_rules('codevalidate', $this->lang->line('contactus_input_captcha'), 'required|xss_clean|callback_check_captchas');
     $this->form_validation->set_message('required', '  %s ');      
     $this->form_validation->set_message('valid_email', '  %s ');  
        
         if($this->form_validation->run() != FALSE) {
           
       $result=$this->Api_model->setUpdateMembers();
             
       if($result=="update"){
        $data['rs_register']='success';
        }
       
       if($result=="found"){
       $data['rs_register']='error';
        }
       
       
      
        }


        
      
              
  }
         
      $data['img_captcha']=$this->_create_captcha();        
         
   
   
     $data['profile_data']= $this->Api_model->CurrentUser();
   
      $this->load->view('profile',$data);     
  }  
    
    
    
    
    
    
    
    
    
    
  
    
    
    
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */