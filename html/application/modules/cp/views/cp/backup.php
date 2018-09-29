  <meta charset="utf-8" />
  <?php
$api = $this -> load -> library('apiservices');
$api->CP_Auth(1,true,'No direct script access allowed');
?>
 <?php
    $base = base_url($this ->config ->item('template_path'));
  ?>
  
   <div id="_page_backup" class="container_inner ">
     
        <?php
     if(@$backup_email=='send'){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('backup_msgok');?> </div>
         <?php
     } 
      if(@$backup_email=='error'){
         ?>
          <div class="uk-alert uk-alert-danger  font_deafult dirTemplate"> <?php echo $this->lang->line('backup_msgerror');?> </div>
         <?php
     }
     ?>
     
     
     
     <div class="uk-grid" data-uk-grid-margin>
  <div class="uk-width-medium-1-1">
 <div class="uk-panel uk-panel-box backcolors dirTemplate">
  
     
  <h3 class="uk-panel-title font_deafult"> <?php echo $this->lang->line('backup_title');?></h3>
 <hr class="uk-article-divider">
 
 <form class="uk-form uk-form-stacked font_deafult" method="post" >
     
     
    
            
    
         <div class="uk-form-row">
  <label class="uk-form-label" for="mail_server"><?php echo $this->lang->line('backup_select');?></label>
 <div class="uk-form-controls">
  <select class="uk-form-width-medium " name="backup_type" id="backup_type" style="font-family:Tahoma;size: 15px; font-weight: bold">
 <option value="txt"  >SQL/TXT</option>
 <option value="zip" >ZIP</option>
  
 </select>
  </div>
  </div>
  
  
  
  
  
    <hr class="uk-article-divider">
        <p align="center">
  <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_backup" value="y"  data-uk-button><?php echo $this->lang->line('backup_btn1');?></button>
     
    <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="button" id="btn_senddbmail" data-uk-button> <?php echo $this->lang->line('backup_btn2');?></button>   
     
        
 <hr class="uk-article-divider">
 
 
 
 
 
       </p>
          
  
  
  <div id="form_mail_db" style="display:none ">
         <div class="uk-form-row">
         <label class="uk-form-label font_deafult" for="mail_send">   <?php echo $this->lang->line('backup_select2');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large" type="text" name="mail_send" id="mail_send" placeholder="  <?php echo $this->lang->line('backup_select2');?> "   />
           
           <button  class="uk-button uk-button-danger uk-width-1-5 font_deafult"
   type="submit" name="IsPost_dbbackup" value="y"  data-uk-button>  <?php echo $this->lang->line('backup_btn3');?> </button>   
     
           
            </div>
            </div>
            
        
        
        
        
        
        
            
     
     
     
     
 </form>
 
 
<!-- <div id="form_mail_db" style="display:none ">

<form id="form2" class="uk-form uk-form-stacked font_deafult" method="post" enctype="multipart/form-data">

   <div class="uk-form-row">
         <label class="uk-form-label font_deafult" for="mail_send">  البريد الالكتروني  </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large" type="text" name="mail_send" id="mail_send" placeholder="البريد الالكتروني "   />
           
           <button  class="uk-button uk-button-danger uk-width-1-5 font_deafult"
   type="submit" name="IsPost_dbbackup" value="y"  data-uk-button> إرسال </button>   
     
           
            </div>
            
            
            
            


</form>
</div>



 </div>
 -->
 
 </div>
 </div>
 
     
     
     
     
     
       


   </div>