<meta charset="utf-8" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/lib/flag/flags.css?v=0.1" type="text/css">

<?php

 $api=$this->api=$this->load->library('apiservices');
  $TPL_Config = $this -> config -> item('Template_Type');
 @$session_language = @$this->session->userdata('Plang'); 
 ?>
 
 <div class="whoisOnline">
 <?php
 if($conf_vistors['visitors_template']=='default'){
 
 ?>
 <table width="80%" cellpadding="0" cellspacing="0">
 <?php
 
 if(is_array( @$visitoronline)){
     
   foreach(@$visitoronline as $vistorON){
       $country=$api->getCountry($vistorON['visitor_country']);
   ?>    
    <tr>
     <td><?php echo $api->getflag($vistorON['visitor_country'],$country['arabic']);?></td>
     <td><?php 
     //language debend
 
  if($TPL_Config=='A'){
 
 echo $country['arabic'];
  }
 
   if($TPL_Config=='B'){
    echo $country['english'];   
       
   }
 
   if($TPL_Config!='A' && $TPL_Config!='B' ){
   switch(@$session_language){
        case 'arabic':
            echo $country['arabic'];
            break;
        case 'english':
             echo $country['english'];  
            break;   
        default:
         echo $country['arabic'];
            break;
       
       
   }
   }
 
 ?></td>
     <td><?php echo $vistorON['vtotal'];?></td>    
   </tr>
    <?php   
   }  
     
 }
 

 ?>
 </table>
 
 <?php
 } else {
     
     echo @$conf_vistors['vistor_template_code'];
     
 }
 ?>
 
</div>