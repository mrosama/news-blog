<meta charset="utf-8" />



<?php
if(@$viewform=='form'){
?>
 
 
      <?php
    if(@$results_r_m=='Email_SendEmail'){
        ?>
 <div class="alert-message-success">
     <?php echo $this->lang->line('mem_restoremsgok')?>
 </div>
 <br/>
  <br/>
    <?php
    }
    ?> 
    

    <?php
    if(@$results_r_m=='Error_Found'){
        ?>
 <div class="alert-message-danger">
     <?php echo $this->lang->line('maillinglist_remove_msg5')?>
 </div>
 <br/>
  <br/>
    <?php
    }
    ?> 
 
 
 
 <div class="form_restorepass">   
    
 <form method="post">
     
 <ul>    
 <li><label for="email_r"><?php echo $this->lang->line('mem_restorepass1')?></label></li>
 <li><input type="text" size="30" name="email_r" id="email_r" /></li>
      
       <li><button name="IsPost_restorepass" value="y" type="submit"> <?php echo $this->lang->line('mem_restorepass3')?></button></li>
 </ul>    
     
 </form>       
    
    
    
    
 </div>   
    
<?php  
}

?>



<?php
if(@$viewform=='link'){
?>
    
 
      <?php
    if(@$results_c_p=='Change'){
        ?>
 <div class="alert-message-success">
     <?php echo $this->lang->line('mem_changepassok')?>
 </div>
 <br/>
  <br/>
    <?php
    }
    ?> 
 
 
 
   <?php
    if(@$results_c_p=='ERROR_LINK'){
        ?>
 <div class="alert-message-danger">
     <?php echo $this->lang->line('maillinglist_remove_msg3')?>
 </div>
 <br/>
  <br/>
    <?php
    }
    ?> 
    
    
<?php  
}

?>