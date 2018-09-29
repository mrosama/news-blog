<meta charset="utf-8" />
  <?php
$api = $this -> load -> library('apiservices');
$api -> CP_Auth(1, true, 'No direct script access allowed');
$TPL_Config = $this -> config -> item('Template_Type');
$base = base_url($this -> config -> item('template_path'));
@$session_language = @$this->session->userdata('cplang');  
 @$session_style = @$this->session->userdata('cpstyle');  
 $this -> load -> model('video_model');
  
 
?>

<script type="text/javascript">
   
   function validate1(myform){
 
 var img=new RegExp("(.+)\\.(JPEG|JPG|PNG|GIF)","i");
      
      if(myform.title.value=='' && myform.youtube.value==''){
          alert("<?php echo $this->lang->line('video_validate_title'); ?>");
          return false;
      }
      
      else if(myform.author.value==''){
           alert("<?php echo $this->lang->line('video_validate_authur'); ?>");
          return false;
          
      }
      
      else if(myform.file1.value!="" && img.test(myform.file1.value)==false){
           alert("<?php echo $this->lang->line('video_validate_pic'); ?>");
          return false;
          
      }
      
      
       else if(myform.cat.value=='0'){
           alert("<?php echo $this->lang->line('video_validate_cat'); ?>");
          return false;
          
      }
      
      
  else if(myform.field_one.value!="" && myform.youtube.value!=""){
           alert("<?php echo $this->lang->line('video_validate_file1'); ?>");
          return false;
          
      }
      
        else if(myform.field_one.value=="" && myform.youtube.value==""){
           alert("<?php echo $this->lang->line('video_validate_file1'); ?>");
          return false;
          
      }
      
        else if(myform.file1.value!="" && myform.youtube.value!=""){
           alert("<?php echo $this->lang->line('video_validate_youtubepic'); ?>");
          return false;
          
      }
      
      
      else {
          
          return true;
      }
      
       
   }



</script>

<script src="<?php echo base_url("assets/lib/fancybox/jquery.fancybox.pack.js");?>"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/lib/fancybox/jquery.fancybox.css");?>" media="screen" />
<script type="text/javascript">
jQuery(document).ready(function() {
jQuery("#field_src").fancybox({
'width'             : '95%',
'height'            : '90%',
'autoScale'         : true,
'transitionIn'      : 'fade',
'transitionOut'     : 'none',
'type'              : 'iframe'
            });
 })
    </script>

  <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle" >
    <ul class="uk-navbar-nav tm-navbar navtitle"  >
        <li class="navtitle"  ><a href="<?php echo base_url('video/admin/index'); ?>"> <?php echo $this -> lang -> line('video_add'); ?> <i class="uk-icon-video-camera"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this -> lang -> line('visitor_select_title'); ?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
           <li><a href="<?php echo base_url('video/admin/index'); ?>" class="dirTemplate"><i class="uk-icon-bar-video-camera"></i> <?php echo $this -> lang -> line('video_title'); ?>   </a></li>
           <li class="uk-nav-divider"></li>
            <li><a href="<?php echo base_url('video/admin/add'); ?>" class="dirTemplate" ><i class="uk-icon-plus"></i>  <?php echo $this -> lang -> line('video_add'); ?>   </a> </li>
            <li class="uk-nav-divider"></li>
             
               <li><a href="<?php echo base_url('video/admin/youtube'); ?>" class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-youtube"></i>  YouTube   </a> </li>
            <li class="uk-nav-divider"></li>
            
              <li><a href="<?php echo base_url('video/admin/comment'); ?>" class="dirTemplate"><i class="uk-icon-comment"></i>  <?php echo $this -> lang -> line('video_comments'); ?>   </a> </li>
            <li class="uk-nav-divider"></li>
            

 
 </ul>
  </div>
 </div>
      </div>
  </div>
</nav>
</div>
<br/>

<div id="_page_video" class="container_inner uk-animation-fade"> 
    
    
    
       
      <?php
     if(@$result_add=='ADD'){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('video_msgadd');?> </div>
         <?php
     }
     
     ?> 

  <?php
     if(@$result_add=='ERROR_Upload'){
       ?>  
       <div class="uk-alert uk-alert-danger font_deafult dirTemplate"> <?php echo $this->lang->line('video_validate_pic');?> </div>
         <?php
     }
     
     ?> 
    
    
    
    
    
    
    
    
    
   <div class="uk-grid" data-uk-grid-margin>   
<div class="uk-width-medium-1-1">
<div class="uk-panel uk-panel-box backcolors dirTemplate">
<form    class="uk-form uk-form-stacked font_deafult" method="post" enctype="multipart/form-data"   >

<div class="uk-grid">
    
     <div class="uk-width-1-2">
     <!-- -->  
       <div class="uk-form-row">
         <label class="uk-form-label" for="file1"> <?php echo $this->lang->line('video_pic');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large font_deafult" type="file" name="file1" id="file1" placeholder="" >
             </div>
            </div>
            
         
      <div class="uk-form-row">
         <label class="uk-form-label" for="field_one"> <?php echo $this->lang->line('video_filename');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large font_deafult" type="text" name="field_one" id="field_one" placeholder="" >
            <a href="<?php echo base_url("cp/apimedia"); ?>" id="field_src"
title="Upload link" >
          <img src="<?php echo $base?>/img/register.gif"> </a>
          
             </div>
            </div>



            <div class="uk-form-row">
 <label class="uk-form-label" for="youtube"  ><?php echo $this->lang->line('video_youtube');?></label>
  <div class="uk-form-controls">
 <textarea id="youtube" name="youtube" cols="70" rows="4" placeholder=""></textarea>
 <br/>
          <span  class="uk-text-danger"><?php
          echo $this->lang->line('video_tip');
          ?></span>
  </div>
 </div>
  
            
     <!-- -->  
     </div>
     
     
     
     
     
     
    
     <div class="uk-width-1-2">
     <!-- -->  
     
      <div class="uk-form-row">
         <label class="uk-form-label" for="title"> <?php echo $this->lang->line('video_name');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large font_deafult" type="text" name="title" id="title" placeholder="" >
             </div>
            </div>
           
            <?php  if($TPL_Config =='E' || $TPL_Config =='F'){
 // if($TPL_Config != 'A' && $TPL_Config!='B'){
  ?>     
           <div class="uk-form-row">
         <label class="uk-form-label" for="title_en"> <?php echo $this->lang->line('video_name_en');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large font_deafult" type="text" name="title_en" id="title_en" placeholder="" >
             </div>
            </div>
           <?php
            }
           ?>
           
     <div class="uk-form-row">
 <label class="uk-form-label" for="content" ><?php echo $this->lang->line('video_content');?></label>
  <div class="uk-form-controls">
 <textarea id="content" name="content" cols="70" rows="4" placeholder=""></textarea>
  </div>
 </div>
      
    <?php  if($TPL_Config =='E' || $TPL_Config =='F'){
 // if($TPL_Config != 'A' && $TPL_Config!='B'){
  ?>    
      <div class="uk-form-row">
 <label class="uk-form-label" for="content_en" ><?php echo $this->lang->line('video_content_en');?></label>
  <div class="uk-form-controls">
 <textarea id="content_en" name="content_en" cols="70" rows="4" placeholder=""></textarea>
  </div>
 </div>   
 <?php
 }
 ?>      
         
          <div class="uk-form-row">
         <label class="uk-form-label" for="cat"> <?php echo $this->lang->line('video_cat');?> </label>
         <?php
         echo @$cat;
         ?>
         </div>
            </div>  
            
      <div class="uk-form-row">
         <label class="uk-form-label" for="author"> <?php echo $this->lang->line('video_author');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-mediam font_deafult" type="text" name="author" id="author" value="<?php echo @$this->session->userdata('IUser_name'); ?>" >
             </div>
            </div>             


     <!-- -->  
     </div>
    
    <div class="uk-width-1-1">
        <p align="center">
         <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_addvideo" value="y" onclick="return validate1(this.form);"   ><?php echo $this -> lang -> line('video_save'); ?></button>
   </p>
       </div> 
    
    
    
    </div>
 </form></div></div></div>   
   
   
    
    
</div>    



<?php
echo br(10);
?>


