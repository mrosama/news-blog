<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');






if ( ! function_exists('Textedtior'))
{

/*
to use it 
$this->load->helper('texteditor');
Textedtior(3);

*/
function Textedtior($Params){

$CI =& get_instance(); 

switch($Params){
case "0":
break;
case "1":
$CI->load->view('editor/editor1');
break;
case "2":
$CI->load->view('editor/editor2');
break;
case "3":
$CI->load->view('editor/editor3');
break;
default:

}


return true;

}













}


?>