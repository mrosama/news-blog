  <meta charset="utf-8" />
 <?php
$api = $this -> load -> library('apiservices');
$api->CP_Auth(1,true,'No direct script access allowed');
?>
 <?php
    $base = base_url($this ->config ->item('template_path'));
      $seg = $this -> uri -> segment(3);
  
  switch($seg) {
      
      
      case "singleemail":
          ?>
      
                    <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
        <li class="navtitle"><a href="<?php echo base_url('cp/masmail/mailinglist');?>"> <?php echo $this->lang->line('masmail_sendmail');?> <i class="uk-icon-envelope-o"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
         <li><a href="<?php echo base_url('cp/masmail');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('masmail_inbox');?>   </a></li>
           <li class="uk-nav-divider"></li>
                                               
            <li><a href="<?php echo base_url('cp/masmail/sendemail');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_sendmail');?>   </a> </li>
            <li class="uk-nav-divider"></li>
                                                 
               <li><a href="<?php echo base_url('cp/masmail/mailinglist');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_maillist');?>   </a> </li>
            <li class="uk-nav-divider"></li>
                                                 
           <li><a href="<?php echo base_url('cp/masmail/masmaillist');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_sendmaillist');?>   </a> </li>
               <li class="uk-nav-divider"></li>
                                                 
    <li><a href="<?php echo base_url('cp/masmail/contactus');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_countactus');?>   </a> </li>
  <li class="uk-nav-divider"></li>
                                                 
   <li><a href="<?php echo base_url('cp/masmail/emailoptions');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_options');?>   </a> </li>
 <li class="uk-nav-divider"></li>
                                                 
                                                 
 <li><a href="#masmail_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
      </div>


  </div>
    
</nav>



</div>

<br/>

 <div id="_page_sendmail" class="container_inner uk-animation-fade">  
     
      <?php echo validation_errors(); ?>
     
     
         <?php
     if(@$email_send=='send'){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('masmail_sendmail_messageok');?> </div>
         <?php
     }
     
     ?> 
     
          <?php
     if(@$email_send=='error'){
       ?>  
       <div class="uk-alert uk-alert-danger font_deafult dirTemplate"> <?php echo $this->lang->line('masmail_sendmail_messageerror');?> </div>
         <?php
     }
     
     ?> 
     
     
     
               
   <div class="uk-grid" data-uk-grid-margin>    
       
        <div class="uk-width-medium-1-1">
             <div class="uk-panel uk-panel-box backcolors dirTemplate">
                 
                 <form class="uk-form uk-form-stacked font_deafult" method="post"  enctype="multipart/form-data" >
                     
            <div class="uk-form-row">
         <label class="uk-form-label" for="to"> <?php echo $this->lang->line('masmail_sendmail_to');?> </label>
         <div class="uk-form-controls">
          <input readonly="readonly"  class="uk-form-width-large font_deafult" type="text" name="to" id="to" value="<?php echo $User_Email;?>"  >
             </div>
            </div>
        
          
          
             <div class="uk-form-row">
         <label class="uk-form-label" for="subject"> <?php echo $this->lang->line('masmail_sendmail_subject');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large font_deafult" type="text" name="subject" id="subject"  >
             </div>
            </div>
         
         
              <div class="uk-form-row">
         <label class="uk-form-label" for="msg" style="font-family:Tahoma"> <?php echo $this->lang->line('masmail_sendmail_message');?></label>
         <div class="uk-form-controls">
          <textarea id="msg" name="msg"  cols="70" rows="9" placeholder=""></textarea>
           </div>
          </div>  
         
         
         
            <div class="uk-form-row">
         <label class="uk-form-label" for="file1"> <?php echo $this->lang->line('masmail_sendmail_attach');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large font_deafult" type="file" name="file1" id="file1"  >
             </div>
            </div> 
          
          
             <hr class="uk-article-divider">
        <p align="center">
            
  
            
  <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_sendmailone" value="y"  data-uk-button><?php echo $this->lang->line('masmail_sendmail_btn');?>     </button>
        
                  <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_backmaillist" value="y"  data-uk-button><?php echo $this->lang->line('masmail_maillist_backtomaillist');?>     </button>
            
        
        
 <hr class="uk-article-divider">
       </p>
          
           
        <br/>     
                  
           <br/>   <br/>   <br/>    
          
                     
                     
                     
                  </form>   
            
            </div>
        </div>    
       
   </div>   
       
 </div>      
       
    
      
      <?php
      break;
      
        case 'sendemail':
            ?>
            
              <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
        <li class="navtitle"><a href="<?php echo base_url('cp/masmail');?>"> <?php echo $this->lang->line('masmail_sendmail');?> <i class="uk-icon-envelope-o"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
         <li><a href="<?php echo base_url('cp/masmail');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('masmail_inbox');?>   </a></li>
           <li class="uk-nav-divider"></li>
                                               
            <li><a href="<?php echo base_url('cp/masmail/sendemail');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_sendmail');?>   </a> </li>
            <li class="uk-nav-divider"></li>
                                                 
               <li><a href="<?php echo base_url('cp/masmail/mailinglist');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_maillist');?>   </a> </li>
            <li class="uk-nav-divider"></li>
                                                 
           <li><a href="<?php echo base_url('cp/masmail/masmaillist');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_sendmaillist');?>   </a> </li>
               <li class="uk-nav-divider"></li>
                                                 
    <li><a href="<?php echo base_url('cp/masmail/contactus');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_countactus');?>   </a> </li>
  <li class="uk-nav-divider"></li>
                                                 
   <li><a href="<?php echo base_url('cp/masmail/emailoptions');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_options');?>   </a> </li>
 <li class="uk-nav-divider"></li>
                                                 
                                                 
 <li><a href="#masmail_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
      </div>


  </div>
    
</nav>



</div>

<br/>

 <div id="_page_sendmail" class="container_inner uk-animation-fade">  
     
      <?php echo validation_errors(); ?>
     
     
         <?php
     if(@$email_send=='send'){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('masmail_sendmail_messageok');?> </div>
         <?php
     }
     
     ?> 
     
          <?php
     if(@$email_send=='error'){
       ?>  
       <div class="uk-alert uk-alert-danger font_deafult dirTemplate"> <?php echo $this->lang->line('masmail_sendmail_messageerror');?> </div>
         <?php
     }
     
     ?> 
     
     
     
               
   <div class="uk-grid" data-uk-grid-margin>    
       
        <div class="uk-width-medium-1-1">
             <div class="uk-panel uk-panel-box backcolors dirTemplate">
                 
                 <form class="uk-form uk-form-stacked font_deafult" method="post"  enctype="multipart/form-data" >
                     
            <div class="uk-form-row">
         <label class="uk-form-label" for="to"> <?php echo $this->lang->line('masmail_sendmail_to');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large font_deafult" type="text" name="to" id="to"  >
             </div>
            </div>
        
          
          
             <div class="uk-form-row">
         <label class="uk-form-label" for="subject"> <?php echo $this->lang->line('masmail_sendmail_subject');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large font_deafult" type="text" name="subject" id="subject"  >
             </div>
            </div>
         
         
              <div class="uk-form-row">
         <label class="uk-form-label" for="msg" style="font-family:Tahoma"> <?php echo $this->lang->line('masmail_sendmail_message');?></label>
         <div class="uk-form-controls">
          <textarea id="msg" name="msg"  cols="70" rows="9" placeholder=""></textarea>
           </div>
          </div>  
         
         
         
            <div class="uk-form-row">
         <label class="uk-form-label" for="file1"> <?php echo $this->lang->line('masmail_sendmail_attach');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large font_deafult" type="file" name="file1" id="file1"  >
             </div>
            </div> 
          
          
             <hr class="uk-article-divider">
        <p align="center">
  <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_sendmail" value="y"  data-uk-button><?php echo $this->lang->line('masmail_sendmail_btn');?>     </button>
        
 <hr class="uk-article-divider">
       </p>
          
           
        <br/>     
                  
           <br/>   <br/>   <br/>    
          
                     
                     
                     
                  </form>   
            
            </div>
        </div>    
       
   </div>   
       
 </div>      
       
       
       
            
            
            
          <?php
          break;
      
        case 'mailinglist':
            
            ?>
            
           <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
        <li class="navtitle"><a href="<?php echo base_url('cp/masmail/mailinglist');?>"> <?php echo $this->lang->line('masmail_maillist');?> <i class="uk-icon-envelope-o"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
         <li><a href="<?php echo base_url('cp/masmail');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('masmail_inbox');?>   </a></li>
           <li class="uk-nav-divider"></li>
                                               
            <li><a href="<?php echo base_url('cp/masmail/sendemail');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_sendmail');?>   </a> </li>
            <li class="uk-nav-divider"></li>
                                                 
               <li><a href="<?php echo base_url('cp/masmail/mailinglist');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_maillist');?>   </a> </li>
            <li class="uk-nav-divider"></li>
                                                 
           <li><a href="<?php echo base_url('cp/masmail/masmaillist');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_sendmaillist');?>   </a> </li>
               <li class="uk-nav-divider"></li>
                                                 
    <li><a href="<?php echo base_url('cp/masmail/contactus');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_countactus');?>   </a> </li>
  <li class="uk-nav-divider"></li>
                                                 
   <li><a href="<?php echo base_url('cp/masmail/emailoptions');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_options');?>   </a> </li>
 <li class="uk-nav-divider"></li>
                                                 
                                                 
 <li><a href="#masmail_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
      </div>


  </div>
    
</nav>



</div>

<br/>   
            
   <div id="_page_maillist" class="container_inner uk-animation-fade"> 
       
        <?php echo validation_errors(); ?>
     
     
         <?php
     if(@$email_add=='add'){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('masmail_maillist_addmailok');?> </div>
         <?php
     }
     
     ?> 
     
          <?php
     if(@$email_add=='error'){
       ?>  
       <div class="uk-alert uk-alert-danger font_deafult dirTemplate"> <?php echo $this->lang->line('masmail_maillist_addmailerror');?> </div>
         <?php
     }
     
     ?> 
    
     <div class="uk-grid" data-uk-grid-margin>    
       
        <div class="uk-width-medium-1-1">
             <div class="uk-panel uk-panel-box backcolors dirTemplate">
      <h3 class="uk-panel-title font_deafult"><?php echo $this->lang->line('masmail_maillist_title1');?></h3>
 <hr class="uk-article-divider">
                 <form class="uk-form uk-form-stacked font_deafult" method="post"  enctype="multipart/form-data" >
                     
            <div class="uk-form-row">
         <label class="uk-form-label" for="to"> <?php echo $this->lang->line('masmail_maillist_email');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large font_deafult" type="text" name="to" id="to"  >
             </div>
            </div>
        
          
          
            
          
          
             <hr class="uk-article-divider">
        <p align="center">
  <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_addEmail" value="y"  data-uk-button><?php echo $this->lang->line('masmail_maillist_btn1');?>     </button>
        
 <hr class="uk-article-divider">
       </p>
          
 </form>   
            
 </div>
</div> 

<!-- -->


  <div class="uk-width-medium-1-1">
             <div class="uk-panel uk-panel-box backcolors dirTemplate">
      <h3 class="uk-panel-title font_deafult"><?php echo $this->lang->line('masmail_maillist_titlep');?></h3>
 <hr class="uk-article-divider">
<!-- -->

<div id="content-table" style="background-color: #fff">
    <form method="post">
 <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed uk-text-center">
                                <thead class="uk-text-center">
              <tr class="classTableHeader font_deafult">
               <th class="uk-text-center"><?php echo $this->lang->line('visitor_id');?></th>
             
             <th class="uk-text-center"><?php echo $this->lang->line('masmail_maillist_email');?></th>
           <th class="uk-text-center"><?php echo $this->lang->line('masmail_maillist_sendmail');?></th>
          <th class="uk-text-center"><?php echo $this->lang->line('masmail_maillist_datemsg');?></th>
      
       
  <th class="uk-text-center"><input type="checkbox"   id="r1" name="r1"></th>
                                            
                                              
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php
                                    if(is_array($Rows_maillist)){
                                        $api = $this->load->library('apiservices');
                                         $id_maillist=0;
                                    foreach($Rows_maillist as $V_record){
                                       $id_maillist++;
                                    ?>
                                    <tr class=" uk-text-center font_deafult">
                                        <td class="uk-text-center" style="font-family:Tahoma"><?php echo $V_record['ID'];?></td>
                                      
                                        <td class="uk-text-center" style="font-family:Tahoma"><?php echo $V_record['maillist_email'];?></td>
                                        <td class="uk-text-center" ><a  href="<?php echo base_url('cp/masmail/singleemail/'.$V_record['ID']);?>">   <i class="uk-icon-envelope-o"></i></a></td>
                                        <td class="uk-text-center" style="font-family:Tahoma"><?php echo $V_record['mailist_date'];?></td>
                                        <td class="uk-text-center"><input type="checkbox" id="del[]"  name="del[]" value="<?php echo $V_record['ID'];?>" /></td>
                                      
                                    </tr>
                                    
                                    
                                 <?php
                                    }
                                    }
                                 ?>
                                </tbody>
                                <tfoot>
                                    
                                    <tr>
                                        <td colspan="5" >
                                            
 <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_delEmail" value="y"  data-uk-button><?php echo $this->lang->line('masmail_maillist_delemail');?>     </button>
             
                                        </td>
                                        </tr>
                                    
                                </tfoot>
                            </table>
 
 </form>
     
      <?php
     echo @$Paging_maillist;
     ?>
   
     </div> 
     
<br/><br/><br/><br/><br/>
<!-- -->

</div>
   </div>
<!-- -->     
</div>          
</div>              
            
            
            
            
            
            
            
            
            
            
            
            
            
            <?php
          
          break;
            
        case 'contactus':
     ?> 
           
           
<div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
        <li class="navtitle"><a href="<?php echo base_url('cp/masmail/contactus');?>"> <?php echo $this->lang->line('masmail_countactus');?> <i class="uk-icon-envelope-o"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
         <li><a href="<?php echo base_url('cp/masmail');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('masmail_inbox');?>   </a></li>
           <li class="uk-nav-divider"></li>
                                               
            <li><a href="<?php echo base_url('cp/masmail/sendemail');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_sendmail');?>   </a> </li>
            <li class="uk-nav-divider"></li>
                                                 
               <li><a href="<?php echo base_url('cp/masmail/mailinglist');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_maillist');?>   </a> </li>
            <li class="uk-nav-divider"></li>
                                                 
           <li><a href="<?php echo base_url('cp/masmail/masmaillist');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_sendmaillist');?>   </a> </li>
               <li class="uk-nav-divider"></li>
                                                 
    <li><a href="<?php echo base_url('cp/masmail/contactus');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_countactus');?>   </a> </li>
  <li class="uk-nav-divider"></li>
                                                 
   <li><a href="<?php echo base_url('cp/masmail/emailoptions');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_options');?>   </a> </li>
 <li class="uk-nav-divider"></li>
                                                 
                                                 
 <li><a href="#masmail_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
      </div>


  </div>
    
</nav>



</div>

<br/>              
           
   <div id="_page_optionmaillist" class="container_inner uk-animation-fade">  
     
          <?php
     if(@$optionsForm_update==true){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('options_message');?> </div>
         <?php
     }
     
     ?> 
     
     
  <div class="uk-grid" data-uk-grid-margin>    
       
 <div class="uk-width-medium-1-1">
  <div class="uk-panel uk-panel-box backcolors dirTemplate">
                 
         
           
      <form    class="uk-form uk-form-stacked font_deafult" method="post"   >
         <div class="uk-grid">
             
             
         <div class="uk-width-1-2">
              
              <div class="uk-form-row">
         <label class="uk-form-label" for="options_useform">   <?php echo $this->lang->line('masmail_options_allow_formcountactus');?>  </label>
         <div class="uk-form-controls">
         <input type="checkbox" id="options_useform" name="options_useform" value="On"  <?php echo ($contactus_rows['options_useform']=='On')? "checked='checked'":'';  ?>  /> 
          </div>
            </div>
            
             <div class="uk-form-row">
         <label class="uk-form-label" for="options_useinfo">   <?php echo $this->lang->line('masmail_options_allow_infobox');?>  </label>
         <div class="uk-form-controls">
         <input type="checkbox" id="options_useinfo" name="options_useinfo" value="On" <?php echo ($contactus_rows['options_useinfo']=='On')? "checked='checked'":'';  ?>    /> 
          </div>
            </div>
            
          </div>   
          
          
         <div class="uk-width-1-2">
         
           <div class="uk-form-row">
         <label class="uk-form-label" for="options_email"> <?php echo $this->lang->line('masmail_options_incomeemail');?> </label>
         <div class="uk-form-controls">
          <input readonly="readonly" class="uk-form-width-large font_deafult" type="text" name="options_email" id="options_email" value="<?php echo $opt_rows['email_received'];?>"  >
             </div>
            </div>
         
         
                      <div class="uk-form-row">
         <label class="uk-form-label" for="options_alertemail">   <?php echo $this->lang->line('masmail_options_allow_notifications');?>  </label>
         <div class="uk-form-controls">
         <input type="checkbox" id="options_alertemail" name="options_alertemail" value="On" <?php echo ($contactus_rows['options_alertemail']=='On')? "checked='checked'":'';  ?>      /> 
          </div>
            </div>
         
         
    <div class="uk-form-row" >
  <div class="uk-form-controls ">
  <select class="uk-form-width-medium font_deafult" name="options_order" id="options_order" style="font-family:Tahoma;size: 15px;">
  <option value="up" <?php echo ($contactus_rows['options_order']=='up')? "selected='selected'":'';  ?> >  <?php echo $this->lang->line('masmail_options_order_box_up');?></option>
 <option value="down" <?php echo ($contactus_rows['options_order']=='down')? "selected='selected'":'';  ?>> <?php echo $this->lang->line('masmail_options_order_box_down');?></option>
 </select>
  </div>
  </div>
  
         
         
          </div>  
          
          <div class="uk-width-1-1">
              <br/>
         <div class="uk-article-divider">
                <?php echo $this->lang->line('masmail_options_allow_infobox_title');?>
                 <hr class="uk-article-divider">
            </div>
            
            <?php
             $api = $this->load->library('apiservices');
             $tokens_editors= $this->config->item('Token_access_key');
             $api ->Editor($tokens_editors, '_editor','ar');
            ?>
            
            
     <div class="uk-form-row">
         <div class="uk-form-controls">
          <textarea id="options_info" class="_editor" name="options_info"  cols="70" rows="9" placeholder="">
              <?php 
              if( isset($contactus_rows['options_info']) && !empty($contactus_rows['options_info'])) {
               echo $contactus_rows['options_info'];
                  }
              
              ?></textarea>
           </div>
          </div>  
            
            
          
 
         
          
          
        
            
          </div>
            <div class="uk-width-1-1">
                    <br/>
          
                  <hr class="uk-article-divider">
        <p align="center">
 <button   class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" id="btn_maillist"  name="IsPost_save_options_maillist" value="y"  data-uk-button><?php echo $this->lang->line('options_sendbutton');?>     </button>
       </p> <br/>     <br/> <br/>
                </div>
          
      
          
          </div>
        </form>    
           
           
           
 
   </div>
   </div>
   </div>
   </div>        
           
            
        
        
        
            
            
            
            
          <?php  
          
          break;
                  
        case 'masmaillist':
         
            ?>
            
            
                    <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
        <li class="navtitle"><a href="<?php echo base_url('cp/masmail/masmaillist');?>"> <?php echo $this->lang->line('masmail_sendmaillist');?> <i class="uk-icon-envelope-o"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
         <li><a href="<?php echo base_url('cp/masmail');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('masmail_inbox');?>   </a></li>
           <li class="uk-nav-divider"></li>
                                               
            <li><a href="<?php echo base_url('cp/masmail/sendemail');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_sendmail');?>   </a> </li>
            <li class="uk-nav-divider"></li>
                                                 
               <li><a href="<?php echo base_url('cp/masmail/mailinglist');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_maillist');?>   </a> </li>
            <li class="uk-nav-divider"></li>
                                                 
           <li><a href="<?php echo base_url('cp/masmail/masmaillist');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_sendmaillist');?>   </a> </li>
               <li class="uk-nav-divider"></li>
                                                 
    <li><a href="<?php echo base_url('cp/masmail/contactus');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_countactus');?>   </a> </li>
  <li class="uk-nav-divider"></li>
                                                 
   <li><a href="<?php echo base_url('cp/masmail/emailoptions');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_options');?>   </a> </li>
 <li class="uk-nav-divider"></li>
                                                 
                                                 
 <li><a href="#masmail_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
      </div>


  </div>
    
</nav>



</div>

<br/>

 <div id="_page_sendmail" class="container_inner uk-animation-fade">  
     
  <div class="uk-grid" data-uk-grid-margin>    
       
        <div class="uk-width-medium-1-1">
             <div class="uk-panel uk-panel-box backcolors dirTemplate">
                 
                 <div class="uk-grid">
                     
                      <div class="uk-width-1-2 ">

        <iframe name="responspage" src="<?php echo base_url("cp/requestMaillist");?>" width="100%" style="height: 500px"></iframe>

                      </div>
                     
                     
                     
                 <div class="uk-width-1-2">
                 
  <form  name="form_1s" class="uk-form uk-form-stacked font_deafult" method="post" target="responspage" action="<?php echo base_url("cp/requestMaillist");?>" >
                     
           
        
          
          
             <div class="uk-form-row">
         <label class="uk-form-label" for="subject2"> <?php echo $this->lang->line('masmail_sendmail_subject');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large font_deafult" type="text" name="subject2" id="subject2"  >
             </div>
            </div>
         
         
              <div class="uk-form-row">
         <label class="uk-form-label" for="msg2" style="font-family:Tahoma"> <?php echo $this->lang->line('masmail_sendmail_message');?></label>
         <div class="uk-form-controls">
          <textarea id="msg2" name="msg2"  cols="70" rows="9" placeholder=""></textarea>
           </div>
          </div>  
         
         
         
      
          
          
             <hr class="uk-article-divider">
        <p align="center">
 <button   class="uk-button uk-button-primary font_deafult"
   type="submit" id="btn_maillist"  name="IsPost_sendmaillist" value="y"  data-uk-button><?php echo $this->lang->line('masmail_maillist_btn_send');?>     </button>
       </p>
          
            </form>   
        </div>
        
        
        
        
        </div>  
          
                     
                     
                     
                 
            
            </div>
            
           
            
            
            
        </div> 
        
       
           
       
   </div>   
       
       
 
       
 
       
 </div>      
       
       
       
            
            
            
            
            
            
          <?php
          break;
                        
         case 'emailoptions':
             
             ?>
             
             
            
<div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
        <li class="navtitle"><a href="<?php echo base_url('cp/masmail/emailoptions');?>"> <?php echo $this->lang->line('masmail_options');?> <i class="uk-icon-envelope-o"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
         <li><a href="<?php echo base_url('cp/masmail');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('masmail_inbox');?>   </a></li>
           <li class="uk-nav-divider"></li>
                                               
            <li><a href="<?php echo base_url('cp/masmail/sendemail');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_sendmail');?>   </a> </li>
            <li class="uk-nav-divider"></li>
                                                 
               <li><a href="<?php echo base_url('cp/masmail/mailinglist');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_maillist');?>   </a> </li>
            <li class="uk-nav-divider"></li>
                                                 
           <li><a href="<?php echo base_url('cp/masmail/masmaillist');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_sendmaillist');?>   </a> </li>
               <li class="uk-nav-divider"></li>
                                                 
    <li><a href="<?php echo base_url('cp/masmail/contactus');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_countactus');?>   </a> </li>
  <li class="uk-nav-divider"></li>
                                                 
   <li><a href="<?php echo base_url('cp/masmail/emailoptions');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_options');?>   </a> </li>
 <li class="uk-nav-divider"></li>
                                                 
                                                 
 <li><a href="#masmail_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
      </div>


  </div>
    
</nav>



</div>

<br/>              
           
   <div id="_page_optionmaillist" class="container_inner uk-animation-fade">  
     
          <?php
     if(@$optionsForm_update2==true){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('options_message');?> </div>
         <?php
     }
     
     ?> 
     
     
  <div class="uk-grid" data-uk-grid-margin>    
       
 <div class="uk-width-medium-1-1">
  <div class="uk-panel uk-panel-box backcolors dirTemplate">
                 
         
           
      <form    class="uk-form uk-form-stacked font_deafult" method="post"   >
         <div class="uk-grid">
             
             
         <div class="uk-width-1-2">
              
              <div class="uk-form-row">
         <label class="uk-form-label" for="options_useMaillist_alert">   <?php echo $this->lang->line('masmail_options_maillist_notifications');?>  </label>
         <div class="uk-form-controls">
         <input type="checkbox" id="options_useMaillist_alert" name="options_useMaillist_alert" value="On"  <?php echo ($masmail_options_rows['options_useMaillist_alert']=='On')? "checked='checked'":'';  ?>  /> 
          </div>
            </div>
            
             <div class="uk-form-row">
         <label class="uk-form-label" for="options_useMaillist_dellink">   <?php echo $this->lang->line('masmail_options_maillist_deletelinks');?>  </label>
         <div class="uk-form-controls">
         <input type="checkbox" id="options_useMaillist_dellink" name="options_useMaillist_dellink" value="On" <?php echo ($masmail_options_rows['options_useMaillist_dellink']=='On')? "checked='checked'":'';  ?>    /> 
          </div>
            </div>
            
          </div>   
          
          
         <div class="uk-width-1-2">
         
             <div class="uk-form-row">
         <label class="uk-form-label" for="options_useMaillist_dellink">   <?php echo $this->lang->line('masmail_options_maillist_allowform');?>  </label>
         <div class="uk-form-controls">
         <input type="radio" id="options_useMaillist_form" name="options_useMaillist_form" value="form" <?php echo ($masmail_options_rows['options_useMaillist_form']=='form')? "checked='checked'":'';  ?>    /> 
          </div>
            </div>
         
         
                      <div class="uk-form-row">
         <label class="uk-form-label" for="options_alertemail">   <?php echo $this->lang->line('masmail_options_maillist_allowcode');?>  </label>
         <div class="uk-form-controls">
         <input type="radio" id="options_useMaillist_form" name="options_useMaillist_form" value="custome" <?php echo ($masmail_options_rows['options_useMaillist_form']=='custome')? "checked='checked'":'';  ?>      /> 
          </div>
            </div>
         
         

  
         
         
          </div>  
          
          <div class="uk-width-1-1">
              <br/>
         <div class="uk-article-divider">
                <?php echo $this->lang->line('masmail_options_maillist_codedata');?>
                 <hr class="uk-article-divider">
            </div>
            
          
            
            
     <div class="uk-form-row">
         <div class="uk-form-controls">
          <textarea id="options_useMaillist_code" name="options_useMaillist_code"  cols="70" rows="9">
              <?php 
              if( isset($masmail_options_rows['options_useMaillist_code']) && !empty($masmail_options_rows['options_useMaillist_code'])) {
               echo trim($masmail_options_rows['options_useMaillist_code']);
                  }
              
              ?></textarea>
           </div>
          </div>  
            
            
          
 
         
          
          
        
            
          </div>
            <div class="uk-width-1-1">
                    <br/>
          
                  <hr class="uk-article-divider">
        <p align="center">
 <button   class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" id="btn_maillist"  name="IsPost_save_options_maillistForm" value="y"  data-uk-button><?php echo $this->lang->line('options_sendbutton');?>     </button>
       </p> <br/>     <br/> <br/>
                </div>
          
      
          
          </div>
        </form>    
           
           
           
 
   </div>
   </div>
   </div>
   </div>        
           
                        
             
             
             
             
             
             
             
             
             
             
             
             
             <?php
             
          
          break;
      
      
      
   case "viewmsg":
    
    ?>
    
    
            <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
        <li class="navtitle"><a href="<?php echo base_url('cp/masmail');?>"> <?php echo $this->lang->line('masmail_inbox');?> <i class="uk-icon-envelope-o"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
                  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
                     <div data-uk-dropdown="{mode:'click'}">
                     <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
                       <div class="uk-dropdown uk-dropdown-small selectmylist">
                    <ul class="uk-nav uk-nav-dropdown  ">
                     <li><a href="<?php echo base_url('cp/masmail');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('masmail_inbox');?>   </a></li>
               <li class="uk-nav-divider"></li>
                                               
               <li><a href="<?php echo base_url('cp/masmail/sendemail');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_sendmail');?>   </a> </li>
             <li class="uk-nav-divider"></li>
              <li><a href="<?php echo base_url('cp/masmail/mailinglist');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_maillist');?>   </a> </li>
                <li class="uk-nav-divider"></li>
                                                 
                                                 
                  <li><a href="<?php echo base_url('cp/masmail/masmaillist');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_sendmaillist');?>   </a> </li>
                   <li class="uk-nav-divider"></li>
                                                 
                 <li><a href="<?php echo base_url('cp/masmail/contactus');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_countactus');?>   </a> </li>
               <li class="uk-nav-divider"></li>
                                                 
              <li><a href="<?php echo base_url('cp/masmail/emailoptions');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_options');?>   </a> </li>
             <li class="uk-nav-divider"></li>
                                                 
                                                 
                                                 
            <li><a href="#masmail_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
          </ul>
        </div>
       </div>
      </div>


  </div>  
</nav>
</div>

<br/>
      
    
    
    
    <br/>

 <div id="_page_sendmail" class="container_inner uk-animation-fade">  
     
         <?php
     if(@$replay_check=='send'){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('masmail_sendmail_messageok');?> </div>
         <?php
     }
     
     ?> 
     
     
          <?php
     if(@$replay_check=='error'){
       ?>  
       <div class="uk-alert uk-alert-danger font_deafult dirTemplate"> <?php echo $this->lang->line('masmail_sendmail_messageerror');?> </div>
         <?php
     }
     
     ?> 
     
     
     
  <div class="uk-grid" data-uk-grid-margin>    
       
        <div class="uk-width-medium-1-1">
             <div class="uk-panel uk-panel-box backcolors dirTemplate">
                 
                
  
                 
  <form  class="uk-form uk-form-stacked font_deafult" method="post"  >
             <div class="uk-grid">
                 
                 
                  <div class="uk-width-1-2"> 
                 
                    
        <p align="center">
  <button  class="uk-button uk-button-success uk-width-1-4 font_deafult"
   type="button" onclick="window.location.href='<?php echo base_url('cp/masmail');?>';"   data-uk-button><?php echo $this->lang->line('masmail_msg_back');?>     </button>
        
 
       </p>
       
    <hr class="uk-article-divider">
       <p align="center">
  <button  class="uk-button uk-button-danger uk-width-1-4 font_deafult"
   type="submit" name="IsPost_delete_msg_inbox" value="y"  data-uk-button><?php echo $this->lang->line('masmail_msg_delete');?>     </button>
 </p>   
                    
                      
                   </div> 
                   
                   
                     
             <div class="uk-width-1-2">         
           
           <!-- begin-->
            <div class="uk-form-row">
         <label class="uk-form-label" for="inbox_name"> <?php echo $this->lang->line('masmail_msg_name');?> </label>
         <div class="uk-form-controls">
          <input readonly="readonly" class="uk-form-width-large font_deafult" type="text" name="inbox_name" id="inbox_name"  value="<?php echo $inbox_rows['name'];?>">
             </div>
            </div>
          
            <!--end -->
            
            
               <div class="uk-form-row">
         <label class="uk-form-label" for="inbox_email"> <?php echo $this->lang->line('masmail_msg_email');?> </label>
         <div class="uk-form-controls">
          <input readonly="readonly" class="uk-form-width-large font_deafult" type="text" name="inbox_email" id="inbox_email"  value="<?php echo $inbox_rows['email'];?>">
             </div>
            </div>
          
            <!--end -->
            
            
               <div class="uk-form-row">
         <label class="uk-form-label" for="inbox_site"> <?php echo $this->lang->line('masmail_msg_site');?> </label>
         <div class="uk-form-controls">
          <input readonly="readonly" class="uk-form-width-large font_deafult" type="text" name="inbox_site" id="inbox_site"  value="<?php echo $inbox_rows['name'];?>">
             </div>
            </div>
          <!--end -->
            <div class="uk-form-row">
         <label class="uk-form-label" for="inbox_msg" style="font-family:Tahoma"> <?php echo $this->lang->line('masmail_msg_content');?></label>
         <div class="uk-form-controls">
          <textarea readonly="readonly" id="inbox_msg" name="inbox_msg"  cols="60" rows="4" placeholder=""><?php echo $inbox_rows['message'];?></textarea>
           </div>
          </div>   
            
        
            <!--end -->
         </div>  </div>
         
        
           <div class="uk-grid">
         
          <div class="uk-width-1-1">  
               
            <div class="uk-article-divider">
                <?php echo $this->lang->line('masmail_msg_replay');?>
                 <hr class="uk-article-divider">
            </div>
            </div>
            
             <div class="uk-width-1-2">  
        <p align="center">
  <button id="btn_replay"   class="uk-button uk-button-success uk-width-1-4 font_deafult"
   type="submit" name="IsPost_replay_msg" value="y"  data-uk-button><?php echo $this->lang->line('masmail_msg_send');?>     </button>
  </p>
       
    <hr class="uk-article-divider">
       <p align="center">
  <button type="reset" value="Reset" class="uk-button uk-button-danger uk-width-1-4 font_deafult"
    ><?php echo $this->lang->line('masmail_msg_clear');?>     </button>
   
   
 </p>   
     </div>   
              
               <div class="uk-width-1-2">  
             <div class="uk-form-row">
         <label class="uk-form-label" for="title_msg"> <?php echo $this->lang->line('masmail_msg_title');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="title_msg" id="title_msg">
             </div>
            </div>
            
            
             <div class="uk-form-row">
         <label class="uk-form-label" for="msg_replay" style="font-family:Tahoma"> <?php echo $this->lang->line('masmail_msg_content');?></label>
         <div class="uk-form-controls">
          <textarea  id="msg_replay" name="msg_replay"  cols="60" rows="4" placeholder=""></textarea>
           </div>
          </div>   
            
            
            
          </div>   
         
         
         
         
          </div>
 
 
 
            </form>   
        
        
        <br/><br/><br/><br/>
        <br/><br/><br/><br/>
        
        
     </div>
    </div> 
   </div>   
  </div>      
       
       
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <?php
    break;
      
      
      default:
      
      ?>
      
        <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
        <li class="navtitle"><a href="<?php echo base_url('cp/masmail');?>"> <?php echo $this->lang->line('masmail_inbox');?> <i class="uk-icon-envelope-o"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
                                    <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
                                    <div data-uk-dropdown="{mode:'click'}">
                                        <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
                                        <div class="uk-dropdown uk-dropdown-small selectmylist">
                                            <ul class="uk-nav uk-nav-dropdown  ">
                                                <li><a href="<?php echo base_url('cp/masmail');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('masmail_inbox');?>   </a></li>
                                                 <li class="uk-nav-divider"></li>
                                               
                                                  <li><a href="<?php echo base_url('cp/masmail/sendemail');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_sendmail');?>   </a> </li>
                                                 <li class="uk-nav-divider"></li>
                                                 
                                                      <li><a href="<?php echo base_url('cp/masmail/mailinglist');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_maillist');?>   </a> </li>
                                                 <li class="uk-nav-divider"></li>
                                                 
                                                 
                                                   <li><a href="<?php echo base_url('cp/masmail/masmaillist');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_sendmaillist');?>   </a> </li>
                                                 <li class="uk-nav-divider"></li>
                                                 
                                                   <li><a href="<?php echo base_url('cp/masmail/contactus');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_countactus');?>   </a> </li>
                                                 <li class="uk-nav-divider"></li>
                                                 
                                                     <li><a href="<?php echo base_url('cp/masmail/emailoptions');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('masmail_options');?>   </a> </li>
                                                 <li class="uk-nav-divider"></li>
                                                 
                                                 
                                                 
                                                     <li><a href="#masmail_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
      </div>


  </div>
    
</nav>



</div>

<br/>
      
     
     
  <!-- -->   
     
     
    <div id="_page_maillist" class="container_inner uk-animation-fade"> 
   
   
    <div class="uk-grid" data-uk-grid-margin>    
       
        <div class="uk-width-medium-1-1">
             <div class="uk-panel uk-panel-box backcolors dirTemplate">
             
              
              
              <div id="content-table" style="background-color: #fff">
    <form method="post">
 <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed uk-text-center">
                                <thead class="uk-text-center">
              <tr class="classTableHeader font_deafult">
               <th class="uk-text-center"><?php echo $this->lang->line('visitor_id');?></th>
             
             <th class="uk-text-center"><?php echo $this->lang->line('masmail_maillist_email');?></th>
           <th class="uk-text-center"><?php echo $this->lang->line('masmail_viewmsg');?></th>
          <th class="uk-text-center"><?php echo $this->lang->line('masmail_maillist_datemsg');?></th>
      
       
  <th class="uk-text-center"><input type="checkbox"   id="r1" name="r1"></th>
                                            
                                              
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php
                                    if(is_array(@$Rows_inbox)){
                                        $api = $this->load->library('apiservices');
                                         $id_maillist=0;
                                    foreach($Rows_inbox as $V_record){
                                       $id_maillist++;
                                        if($V_record['read']=='0'){
                                            $clas="uk-icon-envelope";
                                        } else {
                                            $clas="uk-icon-envelope-o";
                                            
                                        }
                                    ?>
                                    <tr  class=" uk-text-center font_deafult">   
                                        
                                     
                                        <td   class="uk-text-center" style="font-family:Tahoma"><?php echo $V_record['ID'];?></td>
                                  
                                     
                                      <td class="uk-text-center" style="font-family:Tahoma"><?php echo $V_record['email'];?></td>
                                        <td class="uk-text-center" ><a  href="<?php echo base_url('cp/masmail/viewmsg/'.$V_record['ID']);?>"> 
                                            
                                              <i class="<?php echo $clas;?>"></i>
                                            
                                            
                                        </a></td>
                                        <td class="uk-text-center" style="font-family:Tahoma"> <i class="uk-icon-clock-o"></i> <?php echo $V_record['message_dat'];?></td>
                                        <td class="uk-text-center"><input type="checkbox" id="del[]"  name="del[]" value="<?php echo $V_record['ID'];?>" /></td>
                                      
                                    </tr>
                                    
                                    
                                 <?php
                                    }
                                    }
                                 ?>
                                </tbody>
                                <tfoot>
                                    
                                    <tr>
                                        <td colspan="5" >
                                            
 <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_delinbox" value="y"  data-uk-button><?php echo $this->lang->line('masmail_delete');?>     </button>
             
                                        </td>
                                        </tr>
                                    
                                </tfoot>
                            </table>
 
 </form>
     
      <?php
     echo @$Paging_inbox;
     ?>
   
     </div> 
              
              
              
             <br/>   <br/>   <br/>  <br/>  
              
              
              
              
              
              
              
              
              
              
             
             
             
             </div>
                </div>
                   </div>
                      </div>    
     
   
 <!-- -->    
  <?php
      
  }
      
   ?> 
   
   
   
  <!--api documentions -->
<div id="masmail_help" class="uk-modal font_deafult">
  <div class="uk-modal-dialog">
 <a href="" class="uk-modal-close uk-close"></a>
 <h1 class="dirTemplate"><img src="<?php echo $base; ?>/img/22.png"/> &nbsp; <div class="uk-badge uk-badge-notification">API Documentation</div>   &nbsp; </h1>
  <p>
      <!-- begin-->
       
 <div class="uk-article-divider" style="font-family:Tahoma">
Use and add contactus in template or view
  <hr class="uk-article-divider">
            </div>
    <?php
   $tokens= $this->config->item('Token_access_key');
    ?>       
 <pre>
<code>  
/**
* Run Contact us
* You must add (token)  as parameter
* You can override Style   ID and class className (contact_form)
* You can override Style Form  Classname   (form_contact_us)
* You can override Style message  Classname   (alert-message-success)
* You can override Style   ID and className for info box (contact_info)
*
*
**/
 
 modules::run('api/Contactus','<?php echo $tokens;?>');
</code>
</pre>
       
       
 <div class="uk-article-divider" style="font-family:Tahoma">
  Use and add maillist in template or view
  <hr class="uk-article-divider">
            </div>       
    
<pre> <code>  
 /**
* Run maillist form
* You must add (token)  as parameter
* You must add (action page)  as parameter
* configure style
* You can override Style   ID and className for mailling list(contact_info)
**/
 
modules::run('api/email_list','<?php echo $tokens;?>','app/elist');

---------------------------------------------------------------------
/**
 * run mailling list  action page add code in template or view 
 * You can override Style ID and className for (sucess_message) - (error_message) 
 * modules::run('api/Process_list','<?php echo $tokens;?>');
 */


</code>
</pre>   
       
   
 
       
       
       
       
       
   <!-- end -->   
  </p>
  </div>
  </div>
   
   
     