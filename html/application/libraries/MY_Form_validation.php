<?php
class MY_Form_validation extends CI_Form_validation {
       public $CI;

      function My_Form_validation($config = array()) {

        parent::__construct($config); 
        $this->CI = &get_instance();

    }

   //example functions
  function my_custom_validation($str){ //or override , for example, required
      if($this->CI->method_from_instance()){
        return true;
       }
     return false;
  }

}