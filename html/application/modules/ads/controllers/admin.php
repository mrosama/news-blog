<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MX_Controller {

    const VIEWPATH = '../../ads/views/admin/';

    public function __construct() {
        parent::__construct();
        $api = $this -> load -> library('apiservices');
 
        $api->CP_Auth(1,true,'No direct script access allowed');
        $api -> setAdminLang('cp/app');
        $api -> setAdminLang('ads/ads');
        $this->load->model('ADS_model');
    }

    public function index() {
         $api = $this -> load -> library('apiservices');
 
        $api->CP_Auth(1,true,'No direct script access allowed');
        $data = array();
        $seg = $this -> uri -> segment(4); 
        
        switch($seg){
            case 'edit':
                 if($this->input->post("IsPost_editads")=="y"){
                
                $rs_edit =   $this->ADS_model->edit_ads(); 
               
                $data['result_ads']=$rs_edit;
                
                
                 }
                
                $rs_ads =   $this->ADS_model->get_ads(); 
               
                $data['row_ads']=$rs_ads;
                
                break;
           
            case 'addnew':
                
                  if($this->input->post("IsPost_addads")=="y"){
                   $rs =   $this->ADS_model->newAds();   
                      $data['result_ads']=$rs;
                  }
                
                break;
                
            default:
              //  if(ctype_digit($seg)){
                if($this->input->post("IsPost_delads")=="y"){
              
         $this->ADS_model->DeleteAds();      
              
     }
              
              
              
           $result= $this->ADS_model->getAds();
     
   $data['Rows_ads']   =  $result['Rows_ads'];
   $data['Total_ads']  =  $result['Total_ads'];
   $data['Paging_Ads'] =  $result['Paging_Ads'];
                   
            
        }




        $this -> layout -> view(Admin::VIEWPATH . 'index', $data);
    }

    //////////

}

/* End of file welcome.php */
