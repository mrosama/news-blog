<meta charset="utf-8" />

 


<?php
if($conf_options_mail['options_useinfo']=='On' && $conf_options_mail['options_order']=='up'){
?>
<div  id="contact_info" class="contact_info"><?php echo $conf_options_mail['options_info'];?></div>
<hr/>
<?php
}
?>



 <?php
    if(@$rs_contactus=='success'){
        ?>
 <div class="alert-message-success">
     <?php echo $this->lang->line('contactus_messgae_send')?>
 </div>
 <br/>
  <br/>
    <?php
    }
    ?>



<?php
if($conf_options_mail['options_useform']=='On'){
?>
<div id="contact_form" class="contact_form">
    
   
    
   <br/>
     
   <div style="color: red">* <?php echo $this->lang->line('contactus_input_required')?> </div>
   <br/><br/>
 <form  method="post" class="form_contact_us">
<ul id="contact_us">
<li> <label class="text" for="name"><span style="color: red">*</span><?php echo $this->lang->line('contactus_name')?></label>
<input type="text" name="name" id="name" size="30" required />
<br/><span style="color: red"><?php echo form_error('name'); ?></span>
</li>
<li> <label class="text" for="email"><span style="color: red">*</span><?php echo $this->lang->line('contactus_email')?></label>
<input type="text" name="email" id="email" size="30" required />
<br/><span style="color: red"><?php echo form_error('email'); ?></span>
</li>

<li> <label class="text" for="website"><?php echo $this->lang->line('contactus_site')?></label>
<input type="text" name="website" id="website" size="30" />

</li>

<li> <label class="text" for="message"><span style="color: red">*</span><?php echo $this->lang->line('contactus_msg')?></label>
<textarea cols="50" rows="5" name="message" id="message" required></textarea>
<br/><span style="color: red"><?php echo form_error('message'); ?></span>
</li>
<li> <label class="text" for="codevalidate"><span style="color: red">*</span><?php echo $this->lang->line('contactus_captcha')?></label>
<input type="text" name="codevalidate" id="codevalidate" size="30" required /><?php echo $img_captcha;?>
<br/><span style="color: red"><?php echo form_error('codevalidate'); ?></span>
</li>
<li><label for="submit" class="text"></label>
<button type="submit" id="submit" name="IsPost-email" value="send"><?php echo $this->lang->line('contactus_btn_send')?></button> </li>

<ul>
</form>
</div>

<?php
}
?>


<?php
if($conf_options_mail['options_useinfo']=='On' && $conf_options_mail['options_order']=='down'){
?>
<br/><hr/><div id="contact_info" class="contact_info"><?php echo $conf_options_mail['options_info'];?></div>
<?php
}
?>




