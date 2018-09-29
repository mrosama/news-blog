<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class bootstrap
{

 public function checkvistor()

  {

     $CI =& get_instance();
       $api=$CI->load->library('apiservices');
      
       $api->setVisitors();
      $api->remove_notify();
     $api->UpdateStatus();

 }

}