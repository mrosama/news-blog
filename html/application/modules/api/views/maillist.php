<meta charset="utf-8" />




<?php
if(@$options_maillist['options_useMaillist_form']=='form'){

?>


<div id="maillisting" class="maillisting">
    
 <form method="post" name="form_maillist" id="form_maillist" action="<?php echo site_url($action_emailform);?>" > 
   <ul>
<li>
 <label for="email_maillist"><?php echo $this->lang->line('contactus_email')?></label>
<input type="text" name="email_maillist" id="email_maillist" size="20" required />
</li>

<li><select name="type_action">
    <option value="0"><?php echo $this->lang->line('maillinglist_subcribe')?></option>
    <option value="1"><?php echo $this->lang->line('maillinglist_unsubcribe')?></option>
    </select>
    
</li>
<li> <button type="submit" name="IsPost_emaillist" value="y" ><?php echo $this->lang->line('maillinglist_btnsubcribe')?></button></li>

  </ul>
     
 </form>      
    
    
</div>    

<?php
}
?>
<?php
if(@$options_maillist['options_useMaillist_form']=='custome'){
?>
<div id="maillisting" class="maillisting">
    <?php echo @$options_maillist['options_useMaillist_code'];?>
    
</div>

<?php }?>




 