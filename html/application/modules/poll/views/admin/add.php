<meta charset="utf-8" />
  <?php
$api = $this -> load -> library('apiservices');
$api -> CP_Auth(1, true, 'No direct script access allowed');
$TPL_Config = $this -> config -> item('Template_Type');
$base = base_url($this -> config -> item('template_path'));
@$session_language = @$this->session->userdata('cplang');  
 @$session_style = @$this->session->userdata('cpstyle');  
?>


    <script type="text/javascript">
 function validate1(myform){
     var element = document.getElementById('question_en');
 if(myform.question.value==""){
 alert(" <?php echo $this->lang->line('poll_mis_question')?> ");
 return false;
 } 
 else if (typeof (element) != undefined && typeof (element) != null && typeof (element) != 'undefined') {
     
      if(myform.question_en.value==""){
 alert(" <?php echo $this->lang->line('poll_mis_question')?> ");
 return false;
 } 
     
     
 }
 
 else {
 return true;
 }
 
 }
 </script>


  <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle" >
    <ul class="uk-navbar-nav tm-navbar navtitle"  >
        <li class="navtitle"  ><a href="<?php echo base_url('poll/admin/index'); ?>"> <?php echo $this -> lang -> line('poll_new'); ?> <i class="uk-icon-bar-chart-o"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this -> lang -> line('visitor_select_title'); ?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
           <li><a href="<?php echo base_url('poll/admin/index'); ?>" class="dirTemplate"><i class="uk-icon-bar-chart-o"></i> <?php echo $this -> lang -> line('poll_list'); ?>   </a></li>
           <li class="uk-nav-divider"></li>
            <li><a href="<?php echo base_url('poll/admin/addpoll'); ?>" class="dirTemplate"><i class="uk-icon-plus"></i>  <?php echo $this -> lang -> line('poll_new'); ?>   </a> </li>
            <li class="uk-nav-divider"></li>
             
       <li><a href="#poll_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>                                                                                              
 </ul>
  </div>
 </div>
      </div>
  </div>
</nav>
</div>
<br/>

<div id="_page_poll" class="container_inner uk-animation-fade"> 
    
    
       <?php
     if(@$result=='add'){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('poll_message_add');?> </div>
         <?php
     }
     
     ?> 
    
    <?php
     if(@$result=='found'){
       ?>  
       <div class="uk-alert uk-alert-danger font_deafult dirTemplate"> <?php echo $this->lang->line('poll_message_found');?> </div>
         <?php
     }
     
     ?> 
    
    
    <div class="uk-grid" data-uk-grid-margin>   
<div class="uk-width-medium-1-1">
<div class="uk-panel uk-panel-box backcolors dirTemplate">
<form    class="uk-form uk-form-stacked font_deafult" method="post" enctype="multipart/form-data"   >

<div class="uk-grid">
    
    
   
          <?php
       if($TPL_Config =='E' || $TPL_Config =='F'){
           ?>
            <div class="uk-width-1-2">
  <div class="uk-form-row">
         <label class="uk-form-label" for="question_en"> <?php echo $this->lang->line('poll_question2');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="question_en" id="question_en"  />
             </div>
            </div>
              



   <div class="uk-form-row">
         <label class="uk-form-label" for="question"> 1 -&nbsp; <?php echo $this->lang->line('poll_option2');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="polloption_en[]" id="polloption_en1"  />
             </div>
            </div>
            <!--  //////////////// -->
            
           <div class="uk-form-row">
         <label class="uk-form-label" for="question"> 2 -&nbsp; <?php echo $this->lang->line('poll_option2');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="polloption_en[]" id="polloption_en2"  />
             </div>
            </div>
            <!--  //////////////// -->
            
            
              <div class="uk-form-row">
         <label class="uk-form-label" for="question"> 3 -&nbsp; <?php echo $this->lang->line('poll_option2');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="polloption_en[]" id="polloption_en3"  />
             </div>
            </div>
            <!--  //////////////// -->
            
              <div class="uk-form-row">
         <label class="uk-form-label" for="question"> 4 -&nbsp; <?php echo $this->lang->line('poll_option2');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="polloption_en[]" id="polloption_en4"  />
             </div>
            </div>
            <!--  //////////////// -->
            
            
              <div class="uk-form-row">
         <label class="uk-form-label" for="question"> 5 -&nbsp; <?php echo $this->lang->line('poll_option2');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="polloption_en[]" id="polloption_en5"  />
             </div>
            </div>
            <!--  //////////////// -->
            
            
              <div class="uk-form-row">
         <label class="uk-form-label" for="question"> 6 -&nbsp; <?php echo $this->lang->line('poll_option2');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="polloption_en[]" id="polloption_en6"  />
             </div>
            </div>
            <!--  //////////////// -->
            
              <div class="uk-form-row">
         <label class="uk-form-label" for="question"> 7 -&nbsp; <?php echo $this->lang->line('poll_option2');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="polloption_en[]" id="polloption_en7"  />
             </div>
            </div>
            <!--  //////////////// -->
            
            
              <div class="uk-form-row">
         <label class="uk-form-label" for="question"> 8 -&nbsp; <?php echo $this->lang->line('poll_option2');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="polloption_en[]" id="polloption_en8"  />
             </div>
            </div>
            <!--  //////////////// -->   
            
               
               </div>  
            <?php
            } else {
            ?>
              <div class="uk-width-1-2">
                  &nbsp;
               </div>   
            <?php
            }
            ?>










  
    
    
     <div class="uk-width-1-2">
         
          <div class="uk-form-row">
         <label class="uk-form-label" for="question"> <?php echo $this->lang->line('poll_question1');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="question" id="question"  />
             </div>
            </div>
            
            
         
         
          <div class="uk-form-row">
         <label class="uk-form-label" for="question"> 1 -&nbsp; <?php echo $this->lang->line('poll_option');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="polloption[]" id="polloption1"  />
             </div>
            </div>
            <!--  //////////////// -->
            
           <div class="uk-form-row">
         <label class="uk-form-label" for="question"> 2 -&nbsp; <?php echo $this->lang->line('poll_option');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="polloption[]" id="polloption2"  />
             </div>
            </div>
            <!--  //////////////// -->
            
            
              <div class="uk-form-row">
         <label class="uk-form-label" for="question"> 3 -&nbsp; <?php echo $this->lang->line('poll_option');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="polloption[]" id="polloption3"  />
             </div>
            </div>
            <!--  //////////////// -->
            
              <div class="uk-form-row">
         <label class="uk-form-label" for="question"> 4 -&nbsp; <?php echo $this->lang->line('poll_option');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="polloption[]" id="polloption4"  />
             </div>
            </div>
            <!--  //////////////// -->
            
            
              <div class="uk-form-row">
         <label class="uk-form-label" for="question"> 5 -&nbsp; <?php echo $this->lang->line('poll_option');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="polloption[]" id="polloption5"  />
             </div>
            </div>
            <!--  //////////////// -->
            
            
              <div class="uk-form-row">
         <label class="uk-form-label" for="question"> 6 -&nbsp; <?php echo $this->lang->line('poll_option');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="polloption[]" id="polloption6"  />
             </div>
            </div>
            <!--  //////////////// -->
            
              <div class="uk-form-row">
         <label class="uk-form-label" for="question"> 7 -&nbsp; <?php echo $this->lang->line('poll_option');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="polloption[]" id="polloption7"  />
             </div>
            </div>
            <!--  //////////////// -->
            
            
              <div class="uk-form-row">
         <label class="uk-form-label" for="question"> 8 -&nbsp; <?php echo $this->lang->line('poll_option');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="polloption[]" id="polloption8"  />
             </div>
            </div>
            <!--  //////////////// -->   
            
               
            
            
            
            
            
            
            
     </div>    
    
     <div class="uk-width-1-1">
       
          
                 
  
           <br/>   
           <p align="center">
  <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
type="submit" name="IsPost_addpoll" value="y" onclick="return validate1(this.form);" ><?php echo $this->lang->line('poll_save');?>     </button>  
   </div>     
    
    
</div>    
    
</div>    
</form></div></div></div>   
    
    
    
    
</div>    



<?php
echo br(10);
?>






<div id="poll_help" class="uk-modal font_deafult">
  <div class="uk-modal-dialog">
 <a href="" class="uk-modal-close uk-close"></a>
 <h1 class="dirTemplate"><img src="<?php echo $base; ?>/img/22.png"/> &nbsp; <div class="uk-badge uk-badge-notification">API Documentation</div>   &nbsp; </h1>
  <p>
      <!-- begin-->
       
 <div class="uk-article-divider" style="font-family:Tahoma">
Use and add Polls  in template or view 
  <hr class="uk-article-divider">
            </div>
    <?php
   $tokens= $this->config->item('Token_access_key');
    ?>       
 <pre>
<code>  
/**
* Run Poll  
* You must add (token)  as parameter
* You can override Style class className (poll)
**/
 
  echo modules::run('poll/poll','<?php echo $tokens?>'); 
</code>
</pre>
       
       
 
       
   <!-- end -->   
  </p>
  </div>
  </div>




