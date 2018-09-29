<meta charset="utf-8" />


      <?php
    if(@$result_active=='Active_Account'){
        ?>
 <div class="alert-message-success">
     <?php echo $this->lang->line('mem_activeok')?>
 </div>
 <br/>
  <br/>
    <?php
    }
    ?> 
    

    <?php
    if(@$result_active=='Error_Link'){
        ?>
 <div class="alert-message-danger">
     <?php echo $this->lang->line('maillinglist_remove_msg3')?>
 </div>
 <br/>
  <br/>
    <?php
    }
    ?> 