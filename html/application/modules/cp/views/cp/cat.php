<meta charset="utf-8" />
<?php
$api = $this -> load -> library('apiservices');
$api->CP_Auth(1,true,'No direct script access allowed');
?>
 <?php
    $base = base_url($this ->config ->item('template_path'));
      $seg = $this -> uri -> segment(3);
      ?>
       <script src="<?php echo base_url('assets/lib/lazyload/jquery.lazyload.min.js?v=1.9.1');?>"></script> 


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



     <style>
.vlist  {
display: inline-block;
border: 1px solid #ccc;
padding: 2px;
width: 50px;
height: 50px;
background: #fff;

margin-left: 10px;
}

 .blocks_red {font-family:Tahoma bold; font-size:12px; color:#FF0000; font-weight:bold; text-decoration:none}    
     </style> 
      
  <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
        <li class="navtitle"><a href="<?php echo base_url('cp/cat');?>"> <?php echo $this->lang->line('cat_title');?> <i class="uk-icon-book"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
<a class="uk-button uk-button-success btnapi" data-uk-tooltip
   title="How To Use Configuration in any Plugins or modules :For Developer Only"
    href="#option_cat_help" data-uk-modal>API Documentation</a>   

  </div>
    
</nav>



</div>

<br/>  

   <script>
 $(function() {
    $("img.lazy").lazyload({container: $("#content-table")});
  });
  </script>   
  
  
<div id="_page_cat" class="container_inner uk-animation-fade"> 
    
           <?php echo validation_errors(); ?> 
   
     <?php
     if(@$result_cat=='add'){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('cat_addok');?> </div>
         <?php
     }
     
     ?>  
     
     
     
        <?php
     if(@$result_cat=='error'){
       ?>  
       <div class="uk-alert uk-alert-danger font_deafult dirTemplate"> <?php echo $this->lang->line('cat_adderror');?> </div>
         <?php
     }
     
     ?>  
     
    
      <div class="uk-grid" data-uk-grid-margin>    
       
        <div class="uk-width-medium-1-1">
             <div class="uk-panel uk-panel-box backcolors dirTemplate">
    
     <h3 class="uk-panel-title font_deafult">
         
         <?php
          if(@$cat_edit=='edit'){
              echo $this->lang->line('cat_edit'); 
              
          } else {
               echo $this->lang->line('cat_new');
              
          }
         
          
          ?></h3>
 <hr class="uk-article-divider">
 
 <form class="uk-form uk-form-stacked font_deafult" method="post"  enctype="multipart/form-data" >
        <div class="uk-grid" data-uk-grid-margin>  
            
            <div class="uk-width-medium-1-4">
                  
                   <div class="uk-form-row">
         <label class="uk-form-label" for="to"> <?php echo $this->lang->line('cat_module');?> </label>
         <div class="uk-form-controls">
         <select name="module" class="uk-form-width-medium font_deafult">
             <option value="post" <?php echo (@$cat_row['module']=='post')? "selected='selected'":'';  ?>> <?php echo $this->lang->line('plugin_article');?></option>
             <option value="video" <?php echo (@$cat_row['module']=='video')? "selected='selected'":'';  ?>> <?php echo $this->lang->line('plugin_media');?></option>
            </select>
             </div>
             </div>
            </div>                
  
            
            
            
        <div class="uk-width-medium-1-4">
         <div class="uk-form-row">
         <label class="uk-form-label" for="to"> <?php echo $this->lang->line('cat_img');?> </label>
         <div class="uk-form-controls">
         <input class="uk-form-width-medium font_deafult" type="text" name="field_two" id="field_two" 
         value="<?php echo @$cat_row['pic']?>" />
         <a href="<?php echo base_url("cp/apimedia"); ?>" id="field_src"
title="Upload link" >
          <img src="<?php echo $base?>/img/register.gif"> </a>
             </div>
            </div>
         </div> 
         
         
         
         
           <div class="uk-width-medium-1-4">
           <div class="uk-form-row" >
  <label class="uk-form-label" for="to"> <?php echo $this->lang->line('cat_parent');?> </label>

  <div class="uk-form-controls ">
      <?php
      if(@$cat_edit=='edit'){
          echo $select_cat2;
          
      }
      else{
       echo $select_cat;
   
      }
   ?>
   
 </select>
  </div>
  </div>
         </div> 
         
         
         
         
           <div class="uk-width-medium-1-4">
        
          <div class="uk-form-row">
         <label class="uk-form-label" for="to"> <?php echo $this->lang->line('cat_name1');?> </label>
         <div class="uk-form-controls">
         <input class="uk-form-width-medium font_deafult" type="text" name="name1" id="name1" value="<?php echo @$cat_row['name']?>" />
             </div>
            </div>
            <?php
  $TPL_Config = $this -> config -> item('Template_Type');
   
   if($TPL_Config =='E' || $TPL_Config =='F'){
 // if($TPL_Config != 'A' && $TPL_Config!='B'){
  ?>
              <div class="uk-form-row">
         <label class="uk-form-label" for="to"> <?php echo $this->lang->line('cat_name2');?> </label>
         <div class="uk-form-controls">
         <input class="uk-form-width-medium font_deafult" type="text" name="name2" id="name2" value="<?php echo @$cat_row['name_allies']?>" />
             </div>
            </div>
           <?php
            }
           ?> 
            
         </div> 
              
           <div class="uk-width-medium-1-1">    
        <p align="center">
         
         <?php
      if(@$cat_edit=='edit'){
          ?>
        <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_editcat" value="y"  data-uk-button><?php echo $this->lang->line('cat_update');?>  
      </button>
      &nbsp; &nbsp; &nbsp;
            <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="button" onclick="location.href='<?php echo base_url('cp/cat');?>'" data-uk-button><?php echo $this->lang->line('cat_back');?>  
      </button>
      
      <input type="hidden" name="IDS" value="<?php echo @$cat_row['ID']?>">
          
          
          <?php
          
      } else {
          ?>  
  <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_addcat" value="y"  data-uk-button><?php echo $this->lang->line('cat_save');?>  
      </button>
      <?php
      }
      ?>
        
 <hr class="uk-article-divider">
       </p>
        </div> 
         
 </form>  
      <div class="uk-width-medium-1-1"> 
  <form method="post"  name="form_catlist" id="form_catlist">
       
  <h3 class="uk-panel-title font_deafult"><?php echo $this->lang->line('cat_archive');?></h3>
 <hr class="uk-article-divider">  
      
   
<div id="content-table"  class="uk-scrollable-box uk-width-large-1-1" style="max-height: 600px; background: #fff ">
    <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed uk-text-center">
    
        <thead class="uk-text-center">
              <tr class="classTableHeader font_deafult">
               <th class="uk-text-center"><?php echo $this->lang->line('cat_ID');?></th>
             
             <th class="uk-text-center"><?php echo $this->lang->line('cat_name1');?></th>
           <th class="uk-text-center"><?php echo $this->lang->line('cat_edit');?></th>
          <th class="uk-text-center"><?php echo $this->lang->line('cat_img');?></th>
      
<th class="uk-text-center"><input type="checkbox"   id="r1" name="r1"></th>
                                                  
</tr>
</thead>

   <tbody >
       
         <?php
        if(is_array($cat_list)){
 
       foreach($cat_list as $keys=>$V_record){
       ?>
     <tr class=" uk-text-center font_deafult">
    <td class="uk-text-center"><div class="uk-badge "><?php echo $cat_list[$keys]['ID'];?></div></td>
         
       <td class="uk-text-center" width="30%">
           
           <span style="font-weight: bold; float: right;style="font-family:Tahoma" class="uk-text-danger">
               <b><?php echo $cat_list[$keys]['level'];?></b></span>
               <span style="float: right">
                   
                  
                   &nbsp;<?php echo $cat_list[$keys]['name1'];?>
                    <?php
                  //   if($TPL_Config != 'A' && $TPL_Config!='B'){
                      if($TPL_Config =='E' || $TPL_Config =='F'){   
                   if(isset($cat_list[$keys]['name2']) && $cat_list[$keys]['name2']!='' ){
                       echo  '<span style=font-family:Tahoma> - ( '. $cat_list[$keys]['name2'] .' )</span>';
                   }
                     }
                   ?>
                   
               </span>
               
           
       </td>
        
        <td class="uk-text-center"><a href="<?php echo @base_url("cp/cat/edit/".$cat_list[$keys]['ID']);?>"><i class="uk-icon-pencil"></i></a></td> 
         <td class="uk-text-center">
    
   
   <?php
   if($cat_list[$keys]['pic']==''){
       
   echo $this->lang->line('cat_nopic'); 
       
   }else {
   ?>
<img class="lazy vlist"    data-original="<?php echo base_url($cat_list[$keys]['pic']);?>">
<?php
   }
?>
</td>
 
          <td class="uk-text-center"><input type="checkbox" id="del[]"  name="del[]" value="<?php echo @$cat_list[$keys]['ID'];?>" /></td>    
     </tr>
     
       
     <?php
     }
      }
     ?>
       
   </tbody>
    
      <tfoot>
          <tr><td colspan="5" align="left">
             
              <?php
 echo @$Paging_cat;
 ?> </td></tr>
          </tfoot>
          
    
    </table>
</div>       
      <br/><br/>  
  <p align="left"> <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_delcat" value="y"  data-uk-button><?php echo $this->lang->line('cat_delete');?>     </button>
   </p>
   </form>  
      <br/><br/><br/><br/> 
    </div>
    
 
    
    
    
    
    
    
    
    
        </div></div></div>
    
</div> 
<br/><br/><br/><br/><br/><br/> 



<!--api documentions -->
<div id="option_cat_help" class="uk-modal font_deafult">
  <div class="uk-modal-dialog">
 <a href="" class="uk-modal-close uk-close"></a>
 <h1 class="dirTemplate"><img src="<?php echo $base; ?>/img/22.png"/> &nbsp; <div class="uk-badge uk-badge-notification">API Documentation</div>   &nbsp; </h1>
  <p>
      <!-- begin-->
       
 <div class="uk-article-divider" style="font-family:Tahoma">
Use and add Category Selection in template or view in admin
  <hr class="uk-article-divider">
            </div>
    <?php
   $tokens= $this->config->item('Token_access_key');
    ?>       
 <pre>
<code>  
/**
* Run MainCatSelect
* Paramter $class :className default: uk-form-width-large font_deafult
* Paramter $cat  :default Category  ,0 parent
* Paramter $catselect : Category Selected
*
*
**/
    $this->load->model('Admin_model');
    $this->Admin_model->MainCatSelect($class,$cat,$catselect=0);
 
</code>
</pre>
       
       
 <div class="uk-article-divider" style="font-family:Tahoma">
  Use and get Category table for one section in template or view
  <hr class="uk-article-divider">
            </div>       
    
<pre> <code>  
 /**
* Run getPartCat function
* You must add (ID Category)  as parameter
* return array
**/
 
$api = $this->load->library('apiservices');
  
return $api->getPartCat(1);
 


</code>
</pre>   
       
   <div class="uk-article-divider" style="font-family:Tahoma">
  Use and get Category breadcrumbs 
  <hr class="uk-article-divider">
            </div>       
    
<pre> <code> 
     /**
* Run get_breadcrumbs function
* You must add (ID Category)  as parameter
* return array
**/ 
$api = $this->load->library('apiservices'); 
  $api -> get_breadcrumbs(ID)
   </code>
</pre>  
   
   
 
       
       
       
       
       
   <!-- end -->   
  </p>
  </div>
  </div>

    
 