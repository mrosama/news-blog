<meta charset="utf-8" />
  <?php
$api = $this -> load -> library('apiservices');
$api -> CP_Auth(1, true, 'No direct script access allowed');
$TPL_Config = $this -> config -> item('Template_Type');
$base = base_url($this -> config -> item('template_path'));
@$session_language = @$this->session->userdata('cplang');  
 @$session_style = @$this->session->userdata('cpstyle');  
?>




  <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle" >
    <ul class="uk-navbar-nav tm-navbar navtitle"  >
        <li class="navtitle"  ><a href="<?php echo base_url('poll/admin/index'); ?>"> <?php echo $this -> lang -> line('poll_list'); ?> <i class="uk-icon-bar-chart-o"></i></a></li>
        
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
         
       
         
 <div class="uk-grid" >   
     
     
      <div class="uk-width-medium-1-1">
          
             <div class="uk-panel uk-panel-box backcolors dirTemplate">
     
     
<div id="content-table" style="background-color: #fff">
    
  <form    class="uk-form uk-form-stacked font_deafult" method="post"    >
  

<table class="uk-table uk-table-hover uk-table-striped uk-table-condensed uk-text-center">
   <!-- -->  
     
              <thead class="uk-text-center">
              <tr class="classTableHeader font_deafult">
                  <th class="uk-text-center"><?php echo $this -> lang -> line('poll_ID'); ?></th>
                 <th class="uk-text-center"><?php echo $this -> lang -> line('poll_question1'); ?></th>
           <th class="uk-text-center"><?php echo $this -> lang -> line('poll_edit'); ?></th>
          <th class="uk-text-center"><?php echo $this -> lang -> line('poll_status'); ?></th>
            
           <th class="uk-text-center"><input type="checkbox"   id="r1" name="r1"></th>
                                            
                                              
                                    </tr>
                                </thead>
     
     
     
     
       <tbody >
           <?php
                                    if(is_array($Rows_poll)){
                                        $api = $this->load->library('apiservices');
                                   
                                    
 foreach($Rows_poll as $V_record){
              
        ?>
     
     
           <tr class=" uk-text-center font_deafult">
                                        
 <td class="uk-text-center" style="font-family:Tahoma"><div class="uk-badge "><?php echo @$V_record['ID']; ?></div></td>
   <td class="uk-text-center" >
       
       <?php
       if($TPL_Config =='E' || $TPL_Config =='F'){
          
          switch($session_style){
              case 'ar':
              echo  mb_substr(@$V_record['question'], 0, 20); 
              break;
              
               case 'en':
                   echo  mb_substr(@$V_record['question_en'], 0, 20);  
              break;
                   
               default:
                echo  mb_substr(@$V_record['question'], 0, 20);     
              
          }
          
           
       } else {
           
       echo  mb_substr(@$V_record['question'], 0, 20);    
       }
       ?>
       
        
       
       
       
       </td>    
      <td class="uk-text-center" ><a href="<?php echo @base_url("poll/admin/editpoll/" . @$V_record['ID']); ?>"><i class="uk-icon-pencil"></i></a></td> 
        <td class="uk-text-center" >
          <?php
            if($V_record['active']=="YES"){

echo anchor("poll/admin/index/activeN/$V_record[ID]",img("$base/img/checked.gif"));
}
else {
echo anchor("poll/admin/index/activeY/$V_record[ID]",img("$base/img/notchecked1.gif"));
}
?>

     </td> 
     
     
<td class="uk-text-center"><input type="checkbox" id="del[]"  name="del[]" value="<?php echo @$V_record['ID']; ?>" /></td>                               
     
                                    
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
   type="submit" name="IsPost_delpoll" value="y"  data-uk-button><?php echo $this -> lang -> line('poll_delete'); ?></button>
             
</td>
</tr>
  </tfoot>      
       
       
  </table>         
 
</form>

<?php
echo @$Paging_poll;
     ?>
</div></div></div></div>
         
         
         
         
         
      </div>   
    



<?php
echo br(7);
?>








<!--api documentions -->
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





