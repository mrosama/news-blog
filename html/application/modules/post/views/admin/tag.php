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

  
  <script>
  
  function validate(myform){
      
      if(myform.tag.value==""){
          alert(" <?php echo $this -> lang -> line('posts_tagsname_missing'); ?>");
          return false;
          
      } else {
          
          return true;
      }
      
  }
  </script>
  
  <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle" >
    <ul class="uk-navbar-nav tm-navbar navtitle"  >
        <li class="navtitle"  ><a href="<?php echo base_url('post/admin/index'); ?>"> <?php echo $this -> lang -> line('posts_tag'); ?> <i class="uk-icon-tag"></i></a></li>
        
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


  
  
<div id="_page_tags" class="container_inner uk-animation-fade"> 
    
    
     <?php
     if(@$result_cat=='add'){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('posts_msgadd');?> </div>
         <?php
     }
     
     ?>  
     
     
     
        <?php
     if(@$result_cat=='error'){
       ?>  
       <div class="uk-alert uk-alert-danger font_deafult dirTemplate"> <?php echo $this->lang->line('posts_msgerror');?> </div>
         <?php
     }
     
     ?>  
     
    
      <div class="uk-grid" data-uk-grid-margin>    
       
        <div class="uk-width-medium-1-1">
             <div class="uk-panel uk-panel-box backcolors dirTemplate">
    
    
 
 <form class="uk-form uk-form-stacked font_deafult" method="post"  enctype="multipart/form-data" >
        <div class="uk-grid" data-uk-grid-margin>  
            
       
            
            
 
         
         
           <div class="uk-width-medium-1-1">
        
          <div class="uk-form-row">
         <label class="uk-form-label" for="to"> <?php echo $this->lang->line('posts_addTags');?> </label>
         <div class="uk-form-controls">
         <input class="uk-form-width-medium font_deafult" type="text" name="tag" id="tag" value="<?php echo @$cat_row['tag']?>" />
             </div>
            </div>
  
  
            
         </div> 
              
           <div class="uk-width-medium-1-1">    
        <p align="center">
         
         <?php
      if(@$cat_edit=='edit'){
          ?>
        <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_editcat" value="y" onclick="return validate(this.form)"  data-uk-button><?php echo $this->lang->line('posts_edit');?>  
      </button>
      &nbsp; &nbsp; &nbsp;
            <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="button" onclick="location.href='<?php echo base_url('post/admin/tag');?>'" data-uk-button><?php echo $this->lang->line('cat_back');?>  
      </button>
      
      <input type="hidden" name="IDS" value="<?php echo @$cat_row['ID']?>">
          
          
          <?php
          
      } else {
          ?>  
  <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_addcat" value="y" onclick="return validate(this.form)"><?php echo $this->lang->line('cat_save');?>  
      </button>
      
      
 
      
      
      <?php
      }
      ?>
        
 <hr class="uk-article-divider">
       </p>
        </div> 
         
 </form>  
 
 <?php
   $total_seq= $this->uri->total_segments();
    if($total_seq!=5){
 ?>
 
 
      <div class="uk-width-medium-1-1"> 
  <form method="post"  name="form_catlist" id="form_catlist">
       
  <h3 class="uk-panel-title font_deafult"><?php echo $this->lang->line('posts_tag');?></h3>
 <hr class="uk-article-divider">  
      
   
<div id="content-table"  class="uk-width-large-1-1" >
    <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed uk-text-center">
    
        <thead class="uk-text-center">
              <tr class="classTableHeader font_deafult">
               <th class="uk-text-center"><?php echo $this->lang->line('posts_ID');?></th>
             
             <th class="uk-text-center"><?php echo $this->lang->line('posts_tagsname');?></th>
           <th class="uk-text-center"><?php echo $this->lang->line('posts_edit');?></th>
       
      
<th class="uk-text-center"><input type="checkbox"   id="r1" name="r1"></th>
                                                  
</tr>
</thead>

   <tbody >
       
         <?php
        if(is_array($Rows_video)){
 
       foreach($Rows_video as $V_record){
       ?>
     <tr class=" uk-text-center font_deafult">
    <td class="uk-text-center"><div class="uk-badge "><?php echo $V_record['ID'];?></div></td>
        <td class="uk-text-center"><div class="uk-badge  uk-badge-warning"><?php echo $V_record['tag'];?></div></td> 
      
        
        <td class="uk-text-center"><a href="<?php echo @base_url("post/admin/tag/edit/".$V_record['ID']);?>"><i class="uk-icon-pencil"></i></a></td> 
       
    
   
 
 
          <td class="uk-text-center"><input type="checkbox" id="del[]"  name="del[]" value="<?php echo @$V_record['ID'];?>" /></td>    
     </tr>
     
       
     <?php
     }
      }
     ?>
       
   </tbody>
    
      <tfoot>
          <tr><td colspan="5" align="left">
             
              <?php
              if (isset($Paging_video))
{
 echo @$Paging_video;
}
 ?> </td></tr>
          </tfoot>
          
    
    </table>
</div>       
      <br/><br/>  
  <p align="left"> <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_deltag" value="y"  data-uk-button><?php echo $this->lang->line('posts_delete');?>     </button>
   </p>
   </form>  
      <br/><br/><br/><br/> 
    </div>
    
 
    
    
    
    
    
    
    
    
        </div></div></div>
    
</div> 
<br/><br/><br/><br/><br/><br/> 

<?php
}
?>
 

    
 