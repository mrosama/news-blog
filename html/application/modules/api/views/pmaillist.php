<meta charset="utf-8" />




<?php
if(@$result_del=='Email_Delete'){
    ?>
  <div class="alert-message-danger"><?php echo $this->lang->line('maillinglist_remove_msg4');?></div>  
    <?php
}


if(@$result_del=='Error_Link'){
   ?>
   
   <div class="alert-message-danger"><?php echo $this->lang->line('maillinglist_remove_msg3');?></div>
   <?php 
}


?>






<?php echo validation_errors(); ?>



<?php


switch(@$rs_c_email){
        
    case "Email_Add":
        ?>
        <div class="alert-message-success"><?php echo $this->lang->line('maillinglist_add_sucess');?></div>
        <?php
    break;
    
    case "Email_Found":
        ?>
         <div class="alert-message-danger"><?php echo $this->lang->line('maillinglist_remove_msg2');?></div>
        <?php
    break;
        
    case "Email_SendEmail":
        ?>
         <div class="alert-message-success"><?php echo $this->lang->line('maillinglist_remove_msg1');?></div>
        <?php
    break;
            
    case "Email_Delete":
        ?>
         <div class="alert-message-success"><?php echo $this->lang->line('maillinglist_remove_msg4');?></div>
        <?php
    break;
        
   case "Email_NotFound":
         ?>
          <div class="alert-message-danger"><?php echo $this->lang->line('maillinglist_remove_msg5');?></div>
         <?php      
    break;        
            
        
    
    default:
}


?>
