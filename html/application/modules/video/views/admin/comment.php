<meta charset="utf-8" />
  <?php
$api = $this -> load -> library('apiservices');
$api -> CP_Auth(1, true, 'No direct script access allowed');
$TPL_Config = $this -> config -> item('Template_Type');
$base = base_url($this -> config -> item('template_path'));
@$session_language = @$this->session->userdata('cplang');  
 @$session_style = @$this->session->userdata('cpstyle');  
 $this -> load -> model('video_model');
?>




  <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle" >
    <ul class="uk-navbar-nav tm-navbar navtitle"  >
        <li class="navtitle"  ><a href="<?php echo base_url('video/admin/index'); ?>"> <?php echo $this -> lang -> line('video_comments'); ?> <i class="uk-icon-comment"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this -> lang -> line('visitor_select_title'); ?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
           <li><a href="<?php echo base_url('video/admin/index'); ?>" class="dirTemplate"><i class="uk-icon-bar-video-camera"></i> <?php echo $this -> lang -> line('video_title'); ?>   </a></li>
           <li class="uk-nav-divider"></li>
            <li><a href="<?php echo base_url('video/admin/add'); ?>" class="dirTemplate" ><i class="uk-icon-plus"></i>  <?php echo $this -> lang -> line('video_add'); ?>   </a> </li>
            <li class="uk-nav-divider"></li>
             
               <li><a href="<?php echo base_url('video/admin/youtube'); ?>" class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-youtube"></i>  YouTube   </a> </li>
            <li class="uk-nav-divider"></li>
            
              <li><a href="<?php echo base_url('video/admin/comment'); ?>" class="dirTemplate"><i class="uk-icon-comment"></i>  <?php echo $this -> lang -> line('video_comments'); ?>   </a> </li>
            <li class="uk-nav-divider"></li>
            
 
 </ul>
  </div>
 </div>
      </div>
  </div>
</nav>
</div>
<br/>





  <div id="_page_video" class="container_inner uk-animation-fade"> 
         
       
         
 <div class="uk-grid" >    
 <div class="uk-width-medium-1-1">
<div class="uk-panel uk-panel-box backcolors dirTemplate">     
<div id="content-table" style="background-color: #fff">
    
  <form    class="uk-form uk-form-stacked font_deafult" method="post"    >
  

<table class="uk-table uk-table-hover uk-table-striped uk-table-condensed uk-text-center">
   <!-- -->  
     
              <thead class="uk-text-center">
              <tr class="classTableHeader font_deafult">
                  <th class="uk-text-center"><?php echo $this -> lang -> line('video_ID'); ?></th>
                 <th class="uk-text-center"><?php echo $this -> lang -> line('video_comment_name'); ?></th>
                  <th class="uk-text-center"><?php echo $this -> lang -> line('video_comment_email'); ?></th>
                  <th class="uk-text-center"><?php echo $this -> lang -> line('video_comment_content'); ?></th>
                  <th class="uk-text-center"><?php echo $this -> lang -> line('video_date'); ?></th>
          
          <th class="uk-text-center"><?php echo $this -> lang -> line('video_comment_status'); ?></th>
            
           <th class="uk-text-center"><input type="checkbox"   id="r1" name="r1"></th>
                                            
                                              
                                    </tr>
                                </thead>
     
     
     
     
       <tbody >
           <?php
                                    if(is_array($Rows_video)){
                                        $api = $this->load->library('apiservices');
                                   
                                    
 foreach($Rows_video as $V_record){
              
        ?>
     
     
           <tr class=" uk-text-center font_deafult">
                                        
 <td class="uk-text-center" style="font-family:Tahoma"><div class="uk-badge "><?php echo @$V_record['ID']; ?></div></td>
   <td class="uk-text-center" >
      <?php 
      echo  mb_substr(@$V_record['name'], 0, 60);    
       
       ?>
  </td>
  
   <td class="uk-text-center" >
      <?php 
      echo  mb_substr(@$V_record['email'], 0, 200);    
       
       ?>
  </td>      
       
     
       
      <td class="uk-text-center" >
         
          
             <button type="button" class="uk-button" data-uk-modal="{target:'#my-ads<?php echo $V_record['ID'];?>'}"><i class="uk-icon-eye"></i></button>

<div id="my-ads<?php echo $V_record['ID'];?>" class="uk-modal" style="direction: ltr;text-align: left;">
    <div class="uk-modal-dialog" uk-text-primary>
        <a class="uk-modal-close uk-close"></a>
     <?php echo @$V_record['comment']; ?> 
    </div>
</div>   
          
          
          
          
          
      </td> 
       <td class="uk-text-center" ><?php echo @$V_record['dat']; ?><i class="uk-icon-clock-o"></i></td> 
      <td class="uk-text-center" > 
         <?php
     if($V_record['active']=='YES'){
       ?>
        
       <img src="<?php echo $base?>/img/jv7f81.gif" alt="<?php echo $this->lang->line('video_comment_enable');?>">
       <?php  
         
     } else {
         ?>
          <img src="<?php echo $base?>/img/gydsvt.gif" alt="<?php echo $this->lang->line('video_comment_disabled');?>">
         <?php
     }
     ?>
          </div>
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
<td colspan="7" >
<button  class="uk-button uk-button-danger uk-width-1-4 font_deafult"
   type="submit" name="IsPost_delmembers" value="y"  data-uk-button><?php echo $this->lang->line('video_delete');?></button>
   

<button  class="uk-button uk-button-success uk-width-1-4 font_deafult"
   type="submit" name="IsPost_activemembers" value="y"  data-uk-button><?php echo $this->lang->line('video_comment_active');?></button>
     
     
     
 <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_deactivemembers" value="y"  data-uk-button><?php echo $this->lang->line('video_comment_deactive');?></button>
            
           
</td>
</tr>
  </tfoot>      
       
       
  </table>         
 
</form>

<?php
echo @$Paging_video;
     ?>
</div></div></div></div>
</div>   
    
<?php
echo br(7);
?>




 







