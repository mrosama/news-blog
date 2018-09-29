<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MX_Controller {

    const VIEWPATH = '../../poll/views/admin/';

    public function __construct() {
        parent::__construct();
        $api = $this -> load -> library('apiservices');

        $api -> CP_Auth(1, true, 'No direct script access allowed');
        $api -> setAdminLang('cp/app');
        $api -> setAdminLang('poll/poll');
        $this -> load -> model('poll_model');
    }

    public function index() {
        $api = $this -> load -> library('apiservices');

        $api -> CP_Auth(1, true, 'No direct script access allowed');
        $data = array();

       
          $this->poll_model->actionPoll();  
          
          if($this->input->post("IsPost_delpoll")=="y"){
              
          $this->poll_model->DeletePolls();      
              
           }
          


                $result =   $this->poll_model->getPolls(); 
              
 
     
                     $data['Rows_poll']   =  $result['Rows_poll'];
                     $data['Total_poll']  =  $result['Total_poll'];
                     $data['Paging_poll'] =  $result['Paging_polls'];



        $this -> layout -> view(Admin::VIEWPATH . 'index', $data);

    }

    public function addpoll() {
        $api = $this -> load -> library('apiservices');

        $api -> CP_Auth(1, true, 'No direct script access allowed');
        $data = array();

         
            if($this->input->post("IsPost_addpoll")=="y"){
              
         $data['result']= $this->poll_model->AddNewPoll();      
              
           }
           

        $this -> layout -> view(Admin::VIEWPATH . 'add', $data);

    }

    public function editpoll() {
        $api = $this -> load -> library('apiservices');

        $api -> CP_Auth(1, true, 'No direct script access allowed');
        $data = array();



 if($this->input->post("IsPost_editpoll")=="y"){
              
         $data['results']= $this->poll_model->EditPoll();      
              
           }



           $data['rowPoll']= $this->poll_model->getPoll();
               
        $this -> layout -> view(Admin::VIEWPATH . 'edit', $data);

    }

}
