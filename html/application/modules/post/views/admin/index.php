<meta charset="utf-8" />
  <?php
$api = $this -> load -> library('apiservices');
$api -> CP_Auth(1, true, 'No direct script access allowed');
$TPL_Config = $this -> config -> item('Template_Type');
$base = base_url($this -> config -> item('template_path'));
@$session_language = @$this->session->userdata('cplang');  
 @$session_style = @$this->session->userdata('cpstyle');  
 $this -> load -> model('post_model');
?>

<script src="<?php echo base_url("assets/lib/fancybox/jquery.fancybox.pack.js");?>"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/lib/fancybox/jquery.fancybox.css");?>" media="screen" />
<script type="text/javascript">
jQuery(document).ready(function() {
jQuery("#field_src").fancybox({
'width'             : '95%',
'height'            : '90%',
'autoScale'         : true,
'transitionIn'      : 'fade',
'transitionOut'     : 'none',
'type'              : 'iframe'
            });
 })
    </script>


  <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle" >
    <ul class="uk-navbar-nav tm-navbar navtitle"  >
        <li class="navtitle"  ><a href="<?php echo base_url('post/admin/index'); ?>"> <?php echo $this -> lang -> line('posts_title'); ?> <i class="uk-icon-laptop"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this -> lang -> line('visitor_select_title'); ?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
           <li><a href="<?php echo base_url('post/admin/index'); ?>" class="dirTemplate"><i class="uk-icon-bar-video-camera"></i> <?php echo $this -> lang -> line('plugin_article'); ?>   </a></li>
           <li class="uk-nav-divider"></li>
            <li><a href="<?php echo base_url('post/admin/add'); ?>" class="dirTemplate" ><i class="uk-icon-plus"></i>  <?php echo $this -> lang -> line('posts_add'); ?>   </a> </li>
            <li class="uk-nav-divider"></li>
             
              
             <li><a href="<?php echo base_url('post/admin/tag'); ?>" class="dirTemplate"><i class="uk-icon-tag"></i>  <?php echo $this -> lang -> line('posts_tag'); ?>   </a> </li>
            <li class="uk-nav-divider"></li>
              <li><a href="<?php echo base_url('post/admin/comment'); ?>" class="dirTemplate"><i class="uk-icon-comment"></i>  <?php echo $this -> lang -> line('posts_comments'); ?>   </a> </li>
            <li class="uk-nav-divider"></li>
 
</ul>
  </div>
 </div>
      </div>
  </div>
</nav>
</div>
<br/>







  <div id="_page_post" class="container_inner uk-animation-fade"> 
         
       
         
 <div class="uk-grid" >    
 <div class="uk-width-medium-1-1">
<div class="uk-panel uk-panel-box backcolors dirTemplate">     
<div id="content-table" style="background-color: #fff">
    
  <form    class="uk-form uk-form-stacked font_deafult" method="post"    >
  

<table class="uk-table uk-table-hover uk-table-striped uk-table-condensed uk-text-center">
   <!-- -->  
     
              <thead class="uk-text-center">
              <tr class="classTableHeader font_deafult">
                  <th class="uk-text-center"><?php echo $this -> lang -> line('posts_ID'); ?></th>
                 <th class="uk-text-center"><?php echo $this -> lang -> line('posts_title'); ?></th>
                  <th class="uk-text-center"><?php echo $this -> lang -> line('posts_date'); ?></th>
           <th class="uk-text-center"><?php echo $this -> lang -> line('posts_edit'); ?></th>
          <th class="uk-text-center"><?php echo $this -> lang -> line('posts_cat'); ?></th>
            
           <th class="uk-text-center"><input type="checkbox"   id="r1" name="r1"></th>
                                            
                                              
                                    </tr>
                                </thead>
     
     
     
     
       <tbody >
           <?php
                                    if(is_array($Rows_post)){
                                        $api = $this->load->library('apiservices');
                                   
                                    
 foreach($Rows_post as $V_record){
              
        ?>
     
     
           <tr class=" uk-text-center font_deafult">
                                        
 <td class="uk-text-center" style="font-family:Tahoma"><div class="uk-badge "><?php echo @$V_record['ID']; ?></div></td>
   <td class="uk-text-center" >
       
       <?php
       if($TPL_Config =='E' || $TPL_Config =='F'){
          
          switch($session_style){
              case 'ar':
              echo  mb_substr(@$V_record['title'], 0, 50); 
              break;
              
               case 'en':
                   echo  mb_substr(@$V_record['title_en'], 0, 50);  
              break;
                   
               default:
                echo  mb_substr(@$V_record['title'], 0, 50);     
              
          }
          
           
       } else {
           
       echo  mb_substr(@$V_record['title'], 0, 50);    
       }
       ?>
       
        
       
       
       
       </td>    
       
      <td class="uk-text-center" ><?php echo @$V_record['dat']; ?><i class="uk-icon-clock-o"></i></td> 
       
      <td class="uk-text-center" ><a href="<?php echo @base_url("post/admin/edit/" . @$V_record['ID']); ?>"><i class="uk-icon-pencil"></i></a></td> 
      
      <td class="uk-text-center" ><div class="uk-badge uk-badge-warning">
          <?php
        $cat = $this->post_model->getCatName($V_record['cat']);
          if($TPL_Config =='E' || $TPL_Config =='F'){
          
          switch($session_style){
              case 'ar':
              echo  mb_substr(@$cat['name'], 0, 20); 
              break;
              
               case 'en':
                   echo  mb_substr(@$cat['name_allies'], 0, 20);  
              break;
                   
               default:
                echo  mb_substr(@$cat['name'], 0, 20);     
              
          }
          
           
       } else {
           
       echo  mb_substr(@$cat['name'], 0, 20);    
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
<td colspan="6" >
 <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_delvideo" value="y"  data-uk-button><?php echo $this -> lang -> line('posts_delete'); ?></button>
             
</td>
</tr>
  </tfoot>      
       
       
  </table>         
 
</form>

<?php
echo @$Paging_post;
     ?>
</div></div></div></div>
</div>   
    
<?php
echo br(7);
?>




 