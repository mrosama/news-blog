<meta charset="utf-8" />
<?php $this -> load -> helper('html');
        $this -> load -> helper('url');
        $base = base_url($this ->config ->item('template_path'));
         $TPL_Config = $this -> config -> item('Template_Type');
          @$session_language = @$this->session->userdata('Plang'); 
?>
<script>
function validate5(myform){
var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
 var pattern1=new RegExp("^([-a-z0-9_]+(\.[_a-z0-9-]+)*@([a-z0-9-]+(\.[a-z0-9-]+)+))$","i");
 var img=new RegExp("(.+)\\.(JPEG|JPG|PNG|GIF)","i");

if(myform.name.value==""){
alert("<?php echo $this->lang->line('mem_missing_name')?>");
return false;
}

 
else if(emailfilter.test(myform.email.value)==false){
alert("<?php echo $this->lang->line('mem_missing_email')?>");
return false;
}

else if(myform.password.value==""){
alert("<?php echo $this->lang->line('mem_missing_password')?>");
return false;
}

else if(myform.password.value!=myform.cpass.value){
alert("<?php echo $this->lang->line('mem_missing_cpassword')?> ");
return false;
}

else if(myform.captchacode.value==""){
alert("<?php echo $this->lang->line('contactus_input_captcha')?>");
return false;
}

else if(myform.file1.value!="" && img.test(myform.file1.value)==false){
 alert(" <?php echo $this->lang->line('mem_msg_errorpic')?> ");
    return false;
 }


else {

return true;
}




}

</script>
 
 

 <div class="form_register">
     
       <?php
    if(@$rs_register=='success'){
        ?>
 <div class="alert-message-success">
     <?php echo $this->lang->line('mem_msg_add')?>
 </div>
 <br/>
  <br/>
    <?php
    }
    ?> 
    
    
       <?php
    if(@$rs_register=='addbyemail'){
        ?>
 <div class="alert-message-success">
     <?php echo $this->lang->line('mem_activebyemail')?>
 </div>
 <br/>
  <br/>
    <?php
    }
    ?> 
    
    
    
       <?php
    if(@$rs_register=='addbyadmin'){
        ?>
 <div class="alert-message-success">
     <?php echo $this->lang->line('mem_activebyadmin')?>
 </div>
 <br/>
  <br/>
    <?php
    }
    ?> 
    
    
     
  
    
       <?php
    if(@$rs_register=='error'){
        ?>
 <div class="alert-message-danger">
     <?php echo $this->lang->line('mem_msg_error')?>
 </div>
 <br/>
  <br/>
    <?php
    }
    ?> 
  
  
  
     
     
     
     
        <div style="color: red;float: right;">* <?php echo $this->lang->line('contactus_input_required')?> </div>
   <br/><br/>
 <form   enctype="multipart/form-data" name="form_register" method="post">    
 
 <ul id="form_register">
    <li><label for="name"><span style="color: red">*</span><?php echo $this->lang->line('mem_name')?></label></li> 
      <li><input type="text" name="name" id="name" size="50" maxlength="100" autocomplete=off  required="required" /></li> 
     <br/><span style="color: red"><?php echo form_error('name'); ?></span>
     
         <li><label for="email"><span style="color: red">*</span><?php echo $this->lang->line('member_login_username')?></label></li> 
      <li><input type="text" name="email" id="email" size="50" maxlength="100" autocomplete=off  required="required" /></li> 
<br/><span style="color: red"><?php echo form_error('name'); ?></span>
      
          <li><label for="country"><?php echo $this->lang->line('mem_country')?></label></li> 
      <li> 
<select  name="country" id="country">
<?php
      if(is_array($mem_country)){
          foreach($mem_country as $country){
              if( $country['flag']=='eg'){
                  @$selected='selected="selected"';
              } else {
                   @$selected='';
              }
               
      ?>
      <?php
      if($TPL_Config=='A'){
      ?>
      
    <option <?php echo @$selected;?> value="<?php echo $country['flag'];?>" > <?php echo $country['arabic'];?></option>
       
    <?php
    }
    ?>
    
     <?php
      if($TPL_Config=='B'){
      ?>
      
    <option <?php echo @$selected;?> value="<?php echo $country['flag'];?>" > <?php echo $country['english'];?></option>
       
    <?php
    }
    ?>  
    
     <?php
      if($TPL_Config!='A' && $TPL_Config!='B' ){
      
      switch(@$session_language){
          case 'arabic':
              ?>
              <option <?php echo @$selected;?> value="<?php echo $country['flag'];?>" > <?php echo $country['arabic'];?></option>
    
              <?php
              break;
              
          case 'english':
           ?>
               <option <?php echo @$selected;?> value="<?php echo $country['flag'];?>" > <?php echo $country['english'];?></option>

              <?php
              break;
          default:
               ?>
          <option <?php echo @$selected;?> value="<?php echo $country['flag'];?>" > <?php echo $country['arabic'];?></option>
  
              <?php   
          
      }
        
    
    }
    ?>   
       
       
       
       
        
      <?php
          }}
      ?></select> </li> 
      
      
 <li><label for="gender"><?php echo $this->lang->line('member_gender')?></label></li> 
      <li><select name="gender" id="gender">
  <option value="male" > <?php echo $this->lang->line('mem_gender_male');?></option>
  <option value="female" > <?php echo $this->lang->line('mem_gender_female');?></option>
 </select></li> 
 
 
      <li><label for="password"><span style="color: red">*</span><?php echo $this->lang->line('mem_password')?></label></li> 
      <li><input type="password" name="password" id="password" size="10" maxlength="10" autocomplete=off  required="required" /></li> 
 <br/><span style="color: red"><?php echo form_error('name'); ?></span>
     <li><label for="cpassword"><span style="color: red">*</span><?php echo $this->lang->line('mem_cpassword')?></label></li> 
      <li><input type="password" name="cpassword" id="cpassword" size="10" maxlength="10" autocomplete=off  required="required" /></li> 
 <br/><span style="color: red"><?php echo form_error('name'); ?></span>
    <li><label for="file1"><?php echo $this->lang->line('member_pic')?></label></li> 
      <li><input type="file" name="file1" id="file1" accept="image/gif, image/jpeg ,image/png"  /></li> 
 
 
 
 <li> <label for="codevalidate"><span style="color: red">*</span><?php echo $this->lang->line('contactus_captcha')?></label>
<input type="text" name="codevalidate" id="codevalidate" size="30" required /><?php echo $img_captcha;?>
<br/><span style="color: red"><?php echo form_error('codevalidate'); ?></span>
</li>      
  
     <li><label for="submit"></label>
<button type="submit" id="submit" name="IsPost_newuser" value="y" onclick="return validate5(this.form);"><?php echo $this->lang->line('member_addnew')?></button> </li>
 
     
 </ul>   
 
 
 
  
 
</form>
</div>