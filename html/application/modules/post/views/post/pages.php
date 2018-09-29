<meta charset="utf-8" />

<?php
$TPL_Config = $this -> config -> item('Template_Type');
@$session_language = @$this->session->userdata('Plang');  
@$session_style = @$this->session->userdata('Pstyle');  


  
 if($TPL_Config =='E' || $TPL_Config =='F'){
          
          switch($session_style){
              case 'ar':
                  $case= "ar";            
              break;             
               case 'en':
                    $case='en';                     
              break;                  
               default:
                  $case='ar';                                
          }          
       } else {
             $case='ar';
        
       }
 
             
 $api = $this -> load -> library('apiservices');
$params=$this->uri->segment(3,0);
if($case=='ar'){
     $Crumb_link=@$api->get_breadcrumbs($params,'post');
} else {
    $Crumb_link=@$api->get_breadcrumbs2($params,'post'); 
}
$this->load->model('Articles_model');
?>





<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/breadcrumb/css/global.css');?>" />
 

    <div id="breadcrumb2">
            <ul class="crumbs2">
                
               <?php
               if(is_array($Crumb_link) && count($Crumb_link)!=0){
                   for($k=0;$k <= count($Crumb_link);$k++){
                       $Crumb_val=@explode('-', @$Crumb_link[$k]);
                      //  echo $Crumb_val[0];
                      if($Crumb_val[0]=='') continue;
                   //    print_r($Crumb_val);
                     ?>
               <li class="first"><a  class="mytext" href="<?php echo base_url('post/category/'.@$Crumb_val[1]);?>"><?php  echo @$Crumb_val[0];?></a></li>

                     <?php
                   }
               }
               
               ?>
                <li class="first"><a  class="mytext" href="<?php echo base_url('post/category');?>"><?php echo $this->lang->line('article_title');?></a></li>
                  
                <li class="last"><a class="mytext" href="<?php echo base_url();?>"><?php echo $this->lang->line('app_home');?></a></li>            
            </ul>
        </div>
            <div class="space"></div>










<table width="100%" class="post_list">
<?php
if(is_array(@$Rows_data) && count(@$Rows_data)!=0){
    
foreach(@$Rows_data as $rowpost){
    
   ?> 
   <tr>
       <td width="3%"><img src="<?php echo base_url('assets/images/document-icon3.png')?>"></td> 
   <td> 
       <?php
       if($case=='ar'){
           echo anchor("post/index/$rowpost[slug]",$rowpost['title']);
       } else {
          echo anchor("post/index/$rowpost[slug]",$rowpost['title_en']); 
       }
       
       ?>
   </td> 
     
   </tr>
   <tr><td colspan="2" height="1px" style="background-color: #ccc"></td></tr>
    <?php
}    
    
}
else {

?>    
<tr><td colspan='2'><div class="alert-message-danger"><?php echo $this->lang->line('article_norow');?></div></td></tr>
  <?php  
}

?>
<tfoot>
    <tr>
        <td colspan="2" align="center">
  <p align="center"> <?php
    echo @$Paging_data;
    ?></p> 
    </td></tr>
</tfoot>
</table>