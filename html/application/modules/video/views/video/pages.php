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
     $Crumb_link=@$api->get_breadcrumbs($params,'video');
} else {
    $Crumb_link=@$api->get_breadcrumbs2($params,'video'); 
}
$this->load->model('Media_model');
?>

<style type="text/css">
 .iconvedo {
    BORDER-RIGHT: #999 3px double; BORDER-TOP: #999 3px double; DISPLAY: block; OVERFLOW: hidden; BORDER-LEFT: #999 3px double; WIDTH: 130px; BORDER-BOTTOM: #999 3px double; HEIGHT: 85px; BACKGROUND-COLOR: white
}
    div.wrapper_video{  
        float:left; /* important */  
        position:relative; /* important(so we can absolutely position the description div */ 
         
    }  
    div.description_video a{  
        position:absolute; /* absolute position (so we can position it where we want)*/  
        bottom:0px; /* position will be on bottom */  
        left:0px;  
        width:100%;  
        /* styling bellow */  
        background-color:#000;  
        font-family: 'tahoma';  
        font-size:11px;  
        color:#fff;  
        opacity:0.7; /* transparency */  
        filter:alpha(opacity=70); /* IE transparency */  
        height: 30px;
    }  
    p.description_content_video{  
        padding:1px;  
        margin:0px;  
    }  
</style>



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
               <li class="first"><a  class="mytext" href="<?php echo base_url('video/category/'.@$Crumb_val[1]);?>"><?php  echo @$Crumb_val[0];?></a></li>

                     <?php
                   }
               }
               
               ?>
                <li class="first"><a  class="mytext" href="<?php echo base_url('video/category');?>"><?php echo $this->lang->line('app_video');?></a></li>
                  
                <li class="last"><a class="mytext" href="<?php echo base_url();?>"><?php echo $this->lang->line('app_home');?></a></li>            
            </ul>
        </div>
            <div class="space"></div>




<table width="100%" class="post_list" cellpadding="10">
 <tr>   
<?php
if(is_array(@$Rows_data) && count(@$Rows_data)!=0){
  $i=0;  
foreach(@$Rows_data as $rowpost){
    
?>    
    
  <td>
    
    <table>
        <tr><td>
            
            <div class='wrapper_video'>  
    <!-- image -->  
     <?php
     if(@$rowpost['pic_youtube']!=''){
         ?>
       <img src="<?php echo  $rowpost['pic_youtube'];?>" class="iconvedo"  /> 
         <?php
         
     } 
     else {
       ///
       
      
       if(@$rowpost['pic']!=''){
            if($api->Check_Url(@$rowpost['pic'])){
           ?>
      <img src="<?php echo @$rowpost['pic'];?>" class="iconvedo"  />
   <?php
      } else {
          ?>
            <img src="<?php echo base_url($rowpost['pic']);?>" class="iconvedo"  /> 
          <?php
      }
   
    } else {
         ?>
          <img src="<?php echo base_url('assets/images/video_preview_icon1.png');?>"class="iconvedo"  /> 
         <?php
         
     }
    ////  
    
     } 
    
    ?>
    
    
    <!-- description div -->  
    <div class='description_video'>  
        <!-- description content -->  
        <p class='description_content_video'>
<?php
       if($case=='ar'){
           echo anchor("video/index/$rowpost[slug]",mb_substr($rowpost['title'], 0,40));
       } else {
          echo anchor("video/index/$rowpost[slug]",mb_substr($rowpost['title_en'], 0,40)); 
       }
       
       ?>

</p>  
        <!-- end description content -->  
    </div>  
    <!-- end description div -->  
</div>  
            
        </td></tr>
        </table>  
      
      
  </td>  
    
<?php
$i++;
 if($i==4){
     echo '</tr><tr>'; 
  $i=0;   
 }   
 
}}
else {

?>    
<tr><td colspan='2'><div class="alert-message-danger"><?php echo $this->lang->line('media_norow');?></div></td></tr>
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
</tr>
</table>

<script src="<?php echo base_url('assets/lib/lazyload/jquery.lazyload.min.js');?>"></script>

<script>
$("img.lazy").lazyload({
    // container: $("#container_im")
    effect : "fadeIn"
});
</script>