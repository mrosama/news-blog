  <meta charset="utf-8" />
  <?php
$api = $this -> load -> library('apiservices');
$api->CP_Auth(1,true,'No direct script access allowed');
?>
  <?php
    $base = base_url($this ->config ->item('template_path'));
      $seg = $this -> uri -> segment(3);
      
     ?> 

  
  <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
        <li class="navtitle"><a href="<?php echo base_url('cp/visitor');?>"> <?php echo $this->lang->line('app_notify');?> <i class="uk-icon-comment-o"></i></a></li>
        
    </ul>
    
  
    
</nav>



</div>

<br/>


 <div id="_page_visitor" class="container_inner uk-animation-fade">
     
     
     <div class="uk-grid" data-uk-grid-margin>
  <div class="uk-width-medium-1-1">
 <div class="uk-panel uk-panel-box backcolors dirTemplate">
   
     
  <h3 class="uk-panel-title font_deafult"><?php echo $this->lang->line('app_notify');?></h3>
 <hr class="uk-article-divider">
 
 
 <div id="content-table" style="background-color: #fff">
 <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed uk-text-center">
                                <thead class="uk-text-center">
                                    <tr class="classTableHeader font_deafult">
                                        <th class="uk-text-center"><?php echo $this->lang->line('visitor_id');?></th>
                                     
                                        <th width="60%"  class="uk-text-center"><?php echo $this->lang->line('app_notify');?></th>
                                      
                                         <th class="uk-text-center"><?php echo $this->lang->line('visitor_date');?></th>
                                            
                                              
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php
                                    if(is_array($Rows_notifcation)){
                                       
                                         
                                    foreach($Rows_notifcation as $V_record){
                                       
                                    ?>
                                    <tr class=" uk-text-center font_deafult">
                                        <td class="uk-text-center"><?php echo $V_record['ID'];?></td>
                                         <td width="60%" class="uk-text-center">
                                             
                                             <?php
                                             if($V_record['links']!=''){
                                             ?>
                                             <a href="<?php echo $V_record['links'];?>"><?php echo $V_record['message'];?></a>
                                             <?php
                                             } else {
                                                 
                                                 echo $V_record['message'];
                                             }
                                             ?>
                                             </td>
                                          
                                        <td class="uk-text-center"> <i class="uk-icon-clock-o"></i><?php echo $V_record['date_add'];?></td>
                                       
                                    </tr>
                                    
                                    
                                 <?php
                                    }
                                    }
                                 ?>
                                </tbody>
                            </table>
 
 
     
     
     <?php
     echo @$Paging_notifcation;
     ?>
     <br/><br/><br/><br/><br/>
     </div>
     
     
     
   
   
   
   
   
   
   
   
   
   
   
   
     
     <!-- end continer -->
     </div>



 




    
  
  
  
  
  

  




