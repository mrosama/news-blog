  <meta charset="utf-8" />
  <?php
$api = $this -> load -> library('apiservices');
$api->CP_Auth(1,true,'No direct script access allowed');
?>
  <?php
    $base = base_url($this ->config ->item('template_path'));
  ?>
  
  
 
  
  
  
 <div id="_page_options" class="container_inner ">
     
     
     <?php
     if(@$options_update==true){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('options_message');?> </div>
         <?php
     }
     
     ?>
     
     
 
<div class="uk-grid" data-uk-grid-margin>
  <div class="uk-width-medium-1-1">
 <div class="uk-panel uk-panel-box backcolors dirTemplate">
 <a class="uk-button uk-button-success btnapi" data-uk-tooltip
   title="How To Use Configuration in any Plugins or modules :For Developer Only"
    href="#options_help" data-uk-modal>API Documentation</a>   
     
  <h3 class="uk-panel-title font_deafult"><?php echo $this->lang->line('options_title');?></h3>
 <hr class="uk-article-divider">
  
  <!-- form begin -->
  
   <form class="uk-form uk-form-stacked font_deafult" method="post" >
       
      
      
      
      
   <div class="uk-grid">
      
   
      
      
      <div class="uk-width-1-2">
          
          <div class="uk-form-row">
         <label class="uk-form-label" for="web_cache"> <?php echo $this->lang->line('options_web_cache');?></label>
         <div class="uk-form-controls">
         <input type="checkbox" id="web_cache" value="cache_on" name="web_cache" <?php echo ($options_rows['web_cache']=='cache_on')? "checked='checked'":'';  ?>> 
          </div>
            </div>
          
           <div class="uk-form-row">
         <label class="uk-form-label" for="web_cache_time"> <?php echo $this->lang->line('options_web_cache_time');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-small font_deafult" type="text" name="web_cache_time" id="web_cache_time" placeholder="" value="<?php echo $options_rows['web_cache_time'];?>">
             </div>
            </div>
          
          
            <div class="uk-form-row">
         <label class="uk-form-label" for="notification_time"> <?php echo $this->lang->line('options_notification_time');?></label>
         <div class="uk-form-controls">
          <input class="uk-form-width-small font_deafult" type="text" name="notification_time"  id="notification_time" placeholder="number of days" value="<?php echo $options_rows['notification_time'];?>">
             </div>
            </div>
          
          
          
       </div>
       
       
       
       
          <div class="uk-width-1-2">
          
          <div class="uk-form-row">
         <label class="uk-form-label" for="web_title"><?php echo $this->lang->line('options_web_title');?></label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large font_deafult" type="text" name="web_title" id="web_title" value="<?php echo $options_rows['web_title'];?>" placeholder="">
             </div>
            </div>
          
          
          
           <div class="uk-form-row">
         <label class="uk-form-label" for="capacity"><?php echo $this->lang->line('options_capacity');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-small font_deafult" type="text" name="capacity" id="capacity" placeholder="Megabyte" value="<?php echo $options_rows['capacity'];?>">
             </div>
            </div>
          
          
        
          <div class="uk-form-row">
         <label class="uk-form-label" for="web_status">   <?php echo $this->lang->line('options_web_status');?> </label>
         <div class="uk-form-controls">
         <input type="checkbox" id="web_status" name="web_status" value="status_off" <?php echo ($options_rows['web_status']=='status_off')? "checked='checked'":'';  ?> /> 
          </div>
            </div>
          
          
          <div class="uk-form-row">
 <label class="uk-form-label" for="web_status_message" style="font-family:Tahoma"><?php echo $this->lang->line('options_web_status_message');?></label>
  <div class="uk-form-controls">
 <textarea id="web_status_message" name="web_status_message" cols="50" rows="2" placeholder=""><?php echo $options_rows['web_status_message'];?></textarea>
  </div>
 </div>
          
          
          </div>
       
       
       
       
       
       
       
       
    </div>     
          
          
          
          
          
          
       
       
       
            
            <div class="uk-article-divider">
                <?php echo $this->lang->line('options_title_metadata');?>
                 <hr class="uk-article-divider">
            </div>
            
        
            
      <!-- begin -->
      
      <div class="uk-grid">
    <div class="uk-width-1-2">
          
  <div class="uk-form-row">
 <label class="uk-form-label" for="copyright" style="font-family:Tahoma">CopyRight</label>
 <div class="uk-form-controls">
 <textarea id="copyright" name="copyright" cols="50" rows="2" placeholder=""><?php echo $options_rows['copyright'];?></textarea>
 </div>
  </div>   
        
        
<div class="uk-form-row">
 <label class="uk-form-label" for="author" style="font-family:Tahoma">Author</label>
  <div class="uk-form-controls">
 <textarea id="author" name="author"  cols="50" rows="2" placeholder=""><?php echo $options_rows['author'];?></textarea>
  </div>
 </div>
          

</div>



 <!-- end-->


   <!-- begin -->
    <div class="uk-width-1-2">

 <div class="uk-form-row">
         <label class="uk-form-label" for="description" style="font-family:Tahoma">Description</label>
         <div class="uk-form-controls">
          <textarea id="description" name="description"  cols="50" rows="2" placeholder=""><?php echo $options_rows['description'];?></textarea>
           </div>
          </div>
          
           <div class="uk-form-row">
         <label class="uk-form-label" for="keywords" style="font-family:Tahoma">Keywords</label>
         <div class="uk-form-controls">
          <textarea id="keywords" name="keywords"  cols="50" rows="2" placeholder=""><?php echo $options_rows['keywords'];?></textarea>
           </div>
          </div> 
          
 </div>
</div>
  
             
 <!-- end-->           
             
             <div class="uk-article-divider">
                <?php echo $this->lang->line('options_title_socialnetwork');?>
                 <hr class="uk-article-divider">
            </div>
       
             
             
  <div class="uk-grid">
      
      <div class="uk-width-1-2">
          
                 <div class="uk-form-row">
                <label class="uk-form-label" for="facebook" style="font-family:Tahoma">Facebook</label>
               <div class="uk-form-controls">
 <img src="<?php echo $base;?>/img/facebook_social_circle-20.png">
 <input class="uk-form-width-large font_deafult" type="text" name="facebook" id="facebook" placeholder="facebook account" value="<?php echo $options_rows['facebook'];?>">
              
                </div>
                </div>
                
                
                  <div class="uk-form-row " >
                <label class="uk-form-label" for="twitte" style="font-family:Tahoma">Twitter</label>
              
                 <div class="uk-form-controls">
                     <img src="<?php echo $base;?>/img/twiiter.png">
                <input class="uk-form-width-large font_deafult" type="text" name="twitte" id="twitte" placeholder="Twitter account" value="<?php echo $options_rows['twitte'];?>">
              
                </div>
                </div>  
          
          
          
      </div>
      
      
      
      
           <div class="uk-width-1-2">
          
                 <div class="uk-form-row">
                <label class="uk-form-label" for="google_plus" style="font-family:Tahoma">Google+</label>
                
               <div class="uk-form-controls">
                    <img src="<?php echo $base;?>/img/google+.png">
               <input class="uk-form-width-large font_deafult" type="text" name="google_plus" id="google_plus" placeholder="Google+ account" value="<?php echo $options_rows['google_plus'];?>">
               
                </div>
                </div>
                
                
                  <div class="uk-form-row">
                <label class="uk-form-label" for="youtube" style="font-family:Tahoma">YouTube</label>
               
               <div class="uk-form-controls">
                     
 <img src="<?php echo $base;?>/img/youtube.png">
      <input class="uk-form-width-large font_deafult" type="text" name="youtube" id="youtube" placeholder="YouTube account" value="<?php echo $options_rows['youtube'];?>">
    </div>
                    
                    
             
               
                
                </div>  
          
          
          
          </div>
      
      
      
       
  </div>             
             
             
             
  <div class="uk-article-divider">
                  <?php echo $this->lang->line('options_title_email');?>
                 <hr class="uk-article-divider">
            </div>


       <div class="uk-form-row">
  <label class="uk-form-label" for="mail_server"><?php echo $this->lang->line('options_mail_server');?></label>
 <div class="uk-form-controls">
  <select class="uk-form-width-medium " name="mail_server" id="mail_server" style="font-family:Tahoma;size: 15px;">
 <option value="Mail" <?php echo ($options_rows['mail_server']=='Mail')? "selected='selected'":'';  ?> >Mail</option>
 <option value="sendmail" <?php echo ($options_rows['mail_server']=='sendmail')? "selected='selected'":'';  ?>>SendMail</option>
  <option value="smtp" <?php echo ($options_rows['mail_server']=='smtp')? "selected='selected'":'';  ?> >SMTP</option>
 </select>
  </div>
  </div>
      
    
      
       <div class="uk-grid">
           
    <div class="uk-width-1-2"> 
      
      
       <div class="uk-form-row">
         <label class="uk-form-label" for="email_received"><?php echo $this->lang->line('options_email_received');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-medium font_deafult" type="text" name="email_received" id="email_received" placeholder="" value="<?php echo $options_rows['email_received'];?>">
             </div>
            </div>
      
      
        <div class="uk-form-row">
         <label class="uk-form-label" for="mail_sendmail"> <?php echo $this->lang->line('options_mail_sendmail');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-medium font_deafult" type="text" name="mail_sendmail" id="mail_sendmail" placeholder="" value="<?php echo $options_rows['mail_sendmail'];?>">
             </div>
            </div>
      
       <div class="uk-form-row">
         <label class="uk-form-label" for="mail_sender"> <?php echo $this->lang->line('options_mail_sender');?>  </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-medium font_deafult" type="text" name="mail_sender" id="mail_sender" placeholder="" value="<?php echo $options_rows['mail_sender'];?>">
             </div>
            </div>
      
      
      
    <div class="uk-form-row" >
  <label class="uk-form-label font_deafult" for="mail_type"> <?php echo $this->lang->line('options_mail_format');?></label>
 <div class="uk-form-controls">
  <select class="uk-form-width-medium " name="mail_type" id="mail_type" style="font-family:Tahoma;size: 15px;">
  <option value="text" <?php echo ($options_rows['mail_type']=='text')? "selected='selected'":'';  ?>>Text</option>
 <option value="html" <?php echo ($options_rows['mail_type']=='html')? "selected='selected'":'';  ?> >Html</option>
 
  
 </select>
  </div>
  </div>
  
  
  
  
      <div class="uk-form-row" data-uk-tooltip
   title="Gmail using tls --  ssl (deprecated)">
  <label class="uk-form-label font_deafult" for="mail_encryption"> <?php echo $this->lang->line('options_encryption');?> </label>
 <div class="uk-form-controls">
  <select class="uk-form-width-medium " name="mail_encryption" id="mail_encryption" style="font-family:Tahoma;size: 15px;">
       <option value="none" <?php echo ($options_rows['mail_encryption']=='none')? "selected='selected'":'';  ?> ><?php echo $this->lang->line('options_encryptionselect1');?></option>
  <option value="tls" <?php echo ($options_rows['mail_encryption']=='tls')? "selected='selected'":'';  ?>>tls</option>
 <option value="ssl" <?php echo ($options_rows['mail_encryption']=='ssl')? "selected='selected'":'';  ?> >ssl</option>
 
  
 </select>
  </div>
  </div>
      
      
      
      
      
      
      
      
   </div>
      
      
  <div class="uk-width-1-2"> 
      
      
       <div class="uk-form-row" data-uk-tooltip
   title="Gmail using smtp.gmail.com">
         <label class="uk-form-label" for="mail_smtp"> <?php echo $this->lang->line('options_mail_smtp');?>  </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-medium font_deafult" type="text" name="mail_smtp" id="mail_smtp" placeholder="البريد الالكتروني لارسال الرسائل" value="<?php echo $options_rows['mail_smtp'];?>">
             </div>
            </div>
      
      
        <div class="uk-form-row">
         <label class="uk-form-label" for="mail_user"> <?php echo $this->lang->line('options_mail_user');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-medium font_deafult" type="text" name="mail_user" id="mail_user" placeholder="" value="<?php echo $options_rows['mail_user'];?>">
             </div>
            </div>
      
       <div class="uk-form-row">
         <label class="uk-form-label" for="mail_pwd"><?php echo $this->lang->line('options_mail_pwd');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-medium font_deafult" type="password" name="mail_pwd" id="mail_pwd" placeholder="" value="<?php echo $options_rows['mail_pwd'];?>">
             </div>
            </div>
            
            <div class="uk-form-row" data-uk-tooltip
   title="Gmail using Port 465 or 587 for authenticated with encryptionTLS ">
         <label class="uk-form-label" for="mail_port">  <?php echo $this->lang->line('options_mail_port');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-medium font_deafult" type="text" name="mail_port" id="mail_port" placeholder="default 25" value="<?php echo $options_rows['mail_port'];?>">
             </div>
            </div>
            
      
      
      
     </div>
    
   </div>
      
        <hr class="uk-article-divider">
        <p align="center">
  <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_options" value="y"  data-uk-button><?php echo $this->lang->line('options_sendbutton');?>     </button>
        
 <hr class="uk-article-divider">
       </p>
          
           
        <br/>     
                  
           <br/>   <br/>   <br/>    
            
            
            
       
       
       
       
       
       
       
       
   </form>    
  
  
  
  
  
  
   <!-- form end -->
   </div>
  </div> </div> </div>
  
  
 
 <!--api documentions -->
<div id="options_help" class="uk-modal font_deafult">
  <div class="uk-modal-dialog">
 <a href="" class="uk-modal-close uk-close"></a>
 <h1 class="dirTemplate"><img src="<?php echo $base; ?>/img/22.png"/> &nbsp; <div class="uk-badge uk-badge-notification">API Documentation</div>   &nbsp; </h1>
  <p>
      <!-- begin-->
       
 <div class="uk-article-divider" style="font-family:Tahoma">
  Return all configurations .You Can Choose data format json , array
  <hr class="uk-article-divider">
            </div>
    <?php
   $tokens= $this->config->item('Token_access_key');
    ?>       
 <pre>
<code>  
/**
* data return format(array or json)
*
**/
$api = $this->load->library('apiservices');
$conf = $api->get_config('<?php echo $tokens;?>','array');
</code>
</pre>
       
       
 <div class="uk-article-divider" style="font-family:Tahoma">
  Return  Social networking links.You Can Choose data format json , array
  <hr class="uk-article-divider">
            </div>       
    
<pre> <code>  
$api = $this->load->library('apiservices');
$conf = $api->get_fp('<?php echo $tokens;?>','array');
</code>
</pre>   
       
   
 
 
  <div class="uk-article-divider" style="font-family:Tahoma">
  Return  MetaData.You Can Choose data format json , array
  <hr class="uk-article-divider">
            </div>       
    
<pre> <code>  
$api = $this->load->library('apiservices');
$conf = $api->get_meta('<?php echo $tokens;?>','array');
</code>
</pre> 


  <div class="uk-article-divider" style="font-family:Tahoma">
  Return  Mail Configurations.You Can Choose data format json , array
  <hr class="uk-article-divider">
            </div>       
    
<pre> <code>  
$api = $this->load->library('apiservices');
$conf = $api->get_MailConfig('<?php echo $tokens;?>','array');
</code>
</pre>


  <div class="uk-article-divider" style="font-family:Tahoma">
  Run Cache automatically
  <hr class="uk-article-divider">
            </div>       
    
<pre> <code>  
$api = $this->load->library('apiservices');
$api->start_Cache('<?php echo $tokens;?>');
</code>
</pre>   



  <div class="uk-article-divider" style="font-family:Tahoma">
  Close WebSite and Show Message.add in custome template
  <hr class="uk-article-divider">
            </div>       
    
<pre> <code>  
$api = $this->load->library('apiservices');
$api->turnOff('<?php echo $tokens;?>');
</code>
</pre> 

 <div class="uk-article-divider" style="font-family:Tahoma">
 Add New Notifications
 <hr class="uk-article-divider">
 </div>          
<pre> <code>  
$api = $this->load->library('apiservices');

$options = array(
'token'=>'<?php echo $tokens;?>',
'message'=>'message here..',
'links'=>'Target link',
 
);

$api->notification($options);
===============================
 echo $this->db->dbprefix; 
</code>
</pre>    

    
   
   
       
       
       
       
       
       
   <!-- end -->   
  </p>
  </div>
  </div>
 
 
 
 
 
 
 
 
 
 
 
 
  
 