  <meta charset="utf-8" />
  <?php
$api = $this -> load -> library('apiservices');
//$api->CP_Auth(1,true,'No direct script access allowed');
?>
   <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
 <script src="<?php echo base_url('assets/lib/lazyload/jquery.lazyload.min.js?v=1.9.1');?>"></script> 

  <style>
  .myselect { 
FONT-SIZE: 11px; FONT-WEIGHT: bold; COLOR: #000000; FONT-FAMILY:Tahoma; text-decoration: none;
text-shadow:#CC6600;
font-weight:bold;


}

.toolbar {
margin-right: 10px;
 -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  border: 1px   solid #999999;
  background:#f9f9f9;
  width:100px;
    height:80px;
  overflow:hidden;
}

.toolbar a.toolbar {
color : #808080;
text-decoration : none;
display: block;
border: 1px solid #DDD;
 width:100px;
    height:80px;
padding: 2px 5px 2px 5px;
}
.toolbar a.toolbar:hover {

color : #C64934;
cursor: pointer;
border: 1px solid  #68A3CE  groove ;
background-color:#F8F5EF;
padding: 3px 5px 1px 5px;
}
.toolbar a.toolbar:active {
color : #FF9900;
}


.swfupload {
    z-index: 1 !important;
}
  </style>
  
   <script type="text/javascript">
 
 var remap=function(url){
     var oldPath=$("#Path").val();
     $("#Path").val('');
      $("#Path").val(oldPath+'/'+url);
      $('#indir').val('1');
       $("#form_dir").submit();
  
       //document.form_dir.submit();
 }
 
 
 
 var folderUp = function(){
              
     var path= $("#Path").val();
    
     var restoredArray = path.split("/");
      
  if(restoredArray.length >=3){
       
      restoredArray.pop();
      var newpath= restoredArray.join("/");
       $("#Path").val(newpath);
        $("#form_dir").submit();
  }
              
 }
  
  
  var downfile=function(){
       if($('input[type=checkbox]:checked').length == 0){
       alert("Please select minimum one checkbox");
       return false;
    } else {
       // $('#indir').val('2');
        $('input[name=indir]').val('2');
       $("#form_dir").submit();
        return false;
    }
         
  }
 
////////////////


var deldir = function(){
    if($('input[type=checkbox]:checked').length == 0){
       alert("Please select minimum one checkbox");
       return false;
    } else {
       // $('#indir').val('2');
        $('input[name=indir]').val('3');
       $("#form_dir").submit();
        return false;
    } 
    
} 
 
 
var mysortfunc=function(){
    
      
        $('input[name=indir]').val('5');
       $("#form_dir").submit();
  return false;
       //document.form_dir.submit();
 } 

var send_func =function(){
    
     $('#indir').val('6');
   ///  alert();
   //  alert(  $('#indir').val());
       $("#form_dir").submit();
       
  return false;
       //document.form_dir.submit();
 } 
 
 </script>
  
  
  <?php
    $base = base_url($this ->config ->item('template_path'));
      $seg = $this -> uri -> segment(3);
    $this->load->helper('html');
 $this->load->helper('url');
 $this->load->helper('directory');
      
 switch($seg) {
          
          case "options":
              ?>
             <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
        <li class="navtitle"><a href="<?php echo base_url('cp/media');?>"> <?php echo $this->lang->line('media_title');?> <i class="uk-icon-folder-open-o"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
                                    <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
                                    <div data-uk-dropdown="{mode:'click'}">
                                        <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
                                        <div class="uk-dropdown uk-dropdown-small selectmylist">
                                            <ul class="uk-nav uk-nav-dropdown  ">
                                                <li><a href="<?php echo base_url('cp/media');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('media_title');?>   </a></li>
                                                 <li class="uk-nav-divider"></li>
                                               
                                                  <li><a href="<?php echo base_url('cp/media/options');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('media_options');?>   </a> </li>
                                                 <li class="uk-nav-divider"></li>
                                                 
                                                     <li><a href="#media_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
                                </div>


  </div>
    
</nav>



</div>

<br/>
       
            
    
    <!-- -->
    
    
 <div id="_page_media" class="container_inner uk-animation-fade">
         <?php
     if(@$media_update==true){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('options_message');?> </div>
         <?php
     }
     
     ?>  
     
     <div class="uk-grid" data-uk-grid-margin>
  <div class="uk-width-medium-1-1">
 <div class="uk-panel uk-panel-box backcolors dirTemplate">
   
     
  

 
   <!-- form begin -->
  
   <form  class="uk-form uk-form-stacked font_deafult" method="post" >
       
       
        <div class="uk-article-divider">
                 <?php echo $this->lang->line('media_options');?>
                 <hr class="uk-article-divider">
            </div>
       
    <div class="uk-grid">
         <div class="uk-width-1-2">

          
            <div class="uk-form-row">
         <label class="uk-form-label" for="media_filetype" style="font-family:Tahoma"> <?php echo $this->lang->line('media_file_type');?></label>
         <div class="uk-form-controls">
          <textarea id="media_filetype" name="media_filetype"  cols="70" rows="2" placeholder="" style="font-family:Tahoma"><?php echo @$media_rows['media_filetype'];?></textarea>
           </div>
          </div>   
         </div>
             
             
          <div class="uk-width-1-2">
             
  <div class="uk-form-row" >
  <label class="uk-form-label font_deafult" for="media_upload_type">  <?php echo $this->lang->line('media_upload_options');?></label>
 <div class="uk-form-controls">
  <select class="uk-form-width-medium " name="media_upload_type" id="media_upload_type" style="font-family:Tahoma;size: 15px;">
  <option value="normal" <?php echo (@$media_rows['media_upload_type']=='normal')? "selected='selected'":'';  ?> ><?php echo $this->lang->line('media_upload_options_type1');?></option>
  <option value="ajax"  <?php echo  (@$media_rows['media_upload_type']=='ajax')? "selected='selected'":'';  ?> ><?php echo $this->lang->line('media_upload_options_type2');?></option>
 </select>

  </div>
   <br/>
    <div class="uk-form-row" >
  <label class="uk-form-label font_deafult" for="media_file_name">  <?php echo $this->lang->line('media_upload_filename_options');?></label>
 <div class="uk-form-controls">
  <select class="uk-form-width-medium " name="media_file_name" id="media_file_name" style="font-family:Tahoma;size: 15px;">
  <option value="normal" <?php echo (@$media_rows['media_file_name']=='normal')? "selected='selected'":'';  ?> ><?php echo $this->lang->line('media_upload_filename_byauto');?></option>
  <option value="auto"  <?php echo (@$media_rows['media_file_name']=='auto')? "selected='selected'":'';  ?> ><?php echo $this->lang->line('media_upload_filename_bytime');?></option>
 </select>
 
  </div>

  </div>
  
 </div>   
 


 
       
   
      </div>        
    </div>   
       
       
         <div class="uk-grid">
   <div class="uk-width-1-1">
        <div class="uk-article-divider">
                <?php echo $this->lang->line('media_upload_thumbnail_title');?>
                 <hr class="uk-article-divider">
            </div>
        </div>
  
  <!-- -->
   <div class="uk-width-1-2">
       
    <div class="uk-form-row" >
  <label class="uk-form-label font_deafult" for="media_gd_type">  <?php echo $this->lang->line('media_upload_thumbnail_handel');?></label>
 <div class="uk-form-controls">
  <select class="uk-form-width-large " name="media_gd_type" id="media_gd_type" style="font-family:Tahoma;size: 15px;">
  <option value="orgine" <?php echo (@$media_rows['media_gd_type']=='orgine')? "selected='selected'":'';  ?> ><?php echo $this->lang->line('media_upload_thumbnail_orginal');?></option>
  <option value="copy"  <?php echo (@$media_rows['media_gd_type']=='copy')? "selected='selected'":'';  ?> ><?php echo $this->lang->line('media_upload_thumbnail_copy');?></option>
 </select>
 
  </div>

  </div>


    </div>   
  
  
  
   <div class="uk-width-1-2">
         <div class="uk-form-row">
         <label class="uk-form-label" for="media_gd">   <?php echo $this->lang->line('media_upload_thumbnail');?>  </label>
         <div class="uk-form-controls">
         <input type="checkbox" id="media_gd" name="media_gd" value="On" <?php echo (@$media_rows['media_gd']=='On')? "checked='checked'":'';  ?>   /> 
          </div>
            </div>
   </div> 
  
   <div class="uk-width-1-4">
       <div class="uk-form-row">
         <label class="uk-form-label" for="media_gd_h"> <?php echo $this->lang->line('media_upload_thumbnail_height');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-mini font_deafult" type="text" name="media_gd_h" id="media_gd_h"  value="<?php echo @$media_rows['media_gd_h'];?>">px
             </div>
       </div>
       </div>
       
          <div class="uk-width-1-4">
         <div class="uk-form-row">
         <label class="uk-form-label" for="media_gd_w"> <?php echo $this->lang->line('media_upload_thumbnail_width');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-mini font_deafult" type="text" name="media_gd_w" id="media_gd_w"  value="<?php echo @$media_rows['media_gd_w'];?>">px
             </div>
            </div>
       </div>
  <div class="uk-width-1-4">
         <!-- //////////////// -->
       </div>
  <!-- -->
   </div>
     
       
     
     
        <p align="center">
  <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_media_options" value="y"  data-uk-button><?php echo $this->lang->line('options_sendbutton');?>     </button>
        
 <hr class="uk-article-divider">
       </p>
          
           
        <br/>     
                  
           <br/>   <br/>   <br/>      
     
       
       
       
       </form>
 
  <!-- end begin -->
 
 
 
 </div></div></div></div>
    
    
    <!-- -->
    
       
    
    
    
    
    
    
    
    
    
    
    
    
    
    

         <?php
         break;
         default:
              $api = $this->load->library('apiservices'); 
             
             
         ?>
         
                     <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
        <li class="navtitle"><a href="<?php echo base_url('cp/media');?>"> <?php echo $this->lang->line('media_title');?> <i class="uk-icon-folder-open-o"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
                                    <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
                                    <div data-uk-dropdown="{mode:'click'}">
                                        <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
                                        <div class="uk-dropdown uk-dropdown-small selectmylist">
                                            <ul class="uk-nav uk-nav-dropdown  ">
                                                <li><a href="<?php echo base_url('cp/media');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('media_title');?>   </a></li>
                                                 <li class="uk-nav-divider"></li>
                                               
                                                  <li><a href="<?php echo base_url('cp/media/options');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('media_options');?>   </a> </li>
                                                 <li class="uk-nav-divider"></li>
                                                 
          <li><a href="#media_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
         </ul>
      </div>
     </div>
 </div>

  </div> 
</nav>
</div>

<br/>
       
   <script>
 $(function() {
    $("img.lazy").lazyload({container: $("#img_content")});
  });
  </script>         
    
    <!-- -->
         
   <div id="_page_media" class="container_inner uk-animation-fade">       
        
        <?php
     if(@$result_upload=='ERROR_Upload'){
       ?>  
       <div class="uk-alert uk-alert-danger  font_deafult dirTemplate"> <?php echo $this->lang->line('media_upload_error');?> </div>
         <?php
     }
     
     ?>     
        
       <?php
     if(is_array(@$result_upload)){
       ?> 
        <div class="uk-alert uk-alert-success  font_deafult dirTemplate"> <?php echo $this->lang->line('media_upload_success');?> </div>
 <?php
 if(@$result_upload['File_name']!=''){
 ?>
 <div class="uk-alert  font_deafult dirTemplate"><input dir="ltr"  readonly="readonly" type="text" size="60" value="<?php echo $result_upload['File_name']?>"> <?php echo $this->lang->line('media_upload_listfile');?></div>
 <?php
 }
 ?>
 
  <?php
 if(@$result_upload['File_GD']!=''){
 ?>
 
     <div class="uk-alert  font_deafult dirTemplate"><input dir="ltr" readonly="readonly" type="text" size="60" value="<?php echo $result_upload['File_GD']?>"> <?php echo $this->lang->line('media_upload_listimg');?></div>
    <?php
 }
 ?>  
     
     
      </div>

   <?php
     }
     
     ?>
         
          <div id="msg_upload" style="display: none" class="uk-alert uk-alert-success  font_deafult dirTemplate"> <?php echo $this->lang->line('media_upload_success');?> </div>
              <div id="msg_error" style="display: none" class="uk-alert uk-alert-danger  font_deafult dirTemplate"> <?php echo $this->lang->line('media_upload_error');?> </div>
              
    <div  id="file1_path" style="display: none" class="uk-alert  font_deafult dirTemplate">
  <input id='src_files'   dir="ltr"    type="text" size="60"> <?php echo $this->lang->line('media_upload_listfile');?>
</div>

     <div  id="file2_path"  style="display: none" class="uk-alert  font_deafult dirTemplate">
         <input id="gd_files"  dir="ltr" readonly="readonly" type="text" size="60"> <?php echo $this->lang->line('media_upload_listimg');?>
         </div>

         
        <div class="uk-grid" data-uk-grid-margin>
  <div class="uk-width-medium-1-1">
 <div class="uk-panel uk-panel-box backcolors dirTemplate">   
  <form autocomplete="off" id="form_dir" name="form_dir" class="uk-form uk-form-stacked font_deafult" method="post" enctype="multipart/form-data">       
   <!-- 1 -->      
    
     <div class="uk-grid">
           <!-- 2 -->     
   <div class="uk-width-1-1">
       
    <div class="uk-grid">
        
        
    <div title="path dir" class="uk-width-1-3">
        <div style="margin-left: 10px; margin-right: 10px;">
          <input class="uk-form-width-large" style="font-family: Tahoma; direction: ltr" type="text" name="Path" id="Path"  readonly="readonly" value="<?php echo @$current_path;?>" />

</div>
 </div>
    <div class="uk-width-1-3" >
<div style="margin-left: 10px; margin-right: 10px;">
  
 <input class="uk-form-width-small font_deafult" type="text" name="foldername" id="foldername"  />
  <button class="uk-button uk-button-danger font_deafult" name="newfolder" value="y" type="submit"><?php echo $this->lang->line('media_upload_newdir');?></button>
    </div>
</div>
    <div class="uk-width-1-3">
    <div style="margin-left: 5px; margin-right: 5px;">
        &nbsp;&nbsp; &nbsp; &nbsp;   
        <a href="javascript:;" style="cursor:hand" onclick="folderUp();" ><img  title="<?php echo $this->lang->line('media_upload_updir');?>" src="<?php echo $base?>/img/1391413970_Button_Up.png" /></a> 
        &nbsp;&nbsp; &nbsp; &nbsp;   
        <a href="javascript:;" style="cursor:hand" onclick="deldir();" > <img title="<?php echo $this->lang->line('media_upload_deldir');?>" src="<?php echo $base?>/img/1391413304_Trash.png" /> </a>
        &nbsp;&nbsp; &nbsp; &nbsp; 
        <a href="javascript:;" style="cursor:hand" onclick="downfile();" >   <img  title="<?php echo $this->lang->line('media_upload_downdir');?>" src="<?php echo $base?>/img/1391413664_ark2.png" /></a> 
        &nbsp;&nbsp;  
        
        <select name="IsPost_sort" style="font-family: Tahoma" onchange="mysortfunc();">
            <option value="0">Sort</option>
             <option value="1"> By Name</option>
              <option value="2"> By Size</option>
               <option value="4"> By Time</option>
            </select>
                
    </div>   
     
      
        
    </div>
    
   
    </div>
    
    
    </div>
    <br/> <br/>
    
    
       <!-- 2 -->    
    <?php
    $fileexe=array('avi','doc','mov','mp3','mp4.','odc','odd','odt','ogg','pdf','ppt','rar','rtf','svg','sxd','tar','tgz','wma','wmv','xls','zip','gif','jpeg','jpg','png','exe');
 $photo=array("png","gif","jpeg","bmp","jpg");
    ?>
      <div class="uk-width-1-1">
           <div id="img_content" class="uk-scrollable-box uk-width-large-1-1" style="max-height: 400px; background: #fff ">
          <!-- content -->
       <table align="center" cellpadding="5" cellspacing="5"  width="100%" > 
          <tr>
              <input type="hidden" value="1" name="indir" id="indir">
          <?php
          //echo $media_sort . '::'.$media_sortasc.'==============================****************************';
         $map = $api->explorer_Dir($current_path,$media_sort,$media_sortasc);
          // var_dump($map);
           
            $i=1;
   if(is_array($map)){
       foreach($map as $key=>$item){
       //////////////a
        $exe=$api->File_extension($item['name']);
        
        $size=$api->formatSize($item['size']);
        
        
       if(in_array($exe,$fileexe)){
   $icon=base_url("assets/lib/mime/$exe.png");
   }
   else {
   $icon=base_url("assets/lib/mime/advertise.png");
   }
 
 if(@is_dir($current_path.'/'.$item['name'])){
  $icon=base_url("assets/lib/mime/folder.png");
    $size = $api->formatSize($api->directorySize($current_path.'/'.$item['name']));
 }
   
     if(in_array($exe,$photo)){
     $icon=base_url($current_path).'/'.ltrim ($item['name'],'.');
     @$options="width=80 height=50 style=' border: 1px   solid #999999;' ";
    }
    else {
    $options="";
    }
       ?> 
   
    <td class="myselect" align="center"  >
  <table width="100%" class="toolbar" cellpadding="5" cellspacing="5">
  <tr><td align="center">
  <a style="font-family: Tahoma;" href="javascript:;" onclick="remap('<?php  echo $item['name'];?>');"><IMG  class="lazy"  data-original="<?php echo $icon;?>" <?php echo  @$options;?> border="0" /></a></td>
  </tr>
  <tr><td class="myselect" align="center"><?php echo mb_substr($item['name'],0,10);?>
      <br/>
      <?php echo 'Size :' .$size  ;?>
      <br/>&nbsp;<input type="checkbox" name="del[]" value="<?php echo $item['name'];?>" /></td></tr>
  </table>
  </td>
   
        
        
      <?php  
       ///////////////a
       
         if($i==5){
   echo "</tr><tr>";
   $i=0;
   }
   
   
   $i++;
       
       
       }
   }
   }  
           ?>
           
           
           
           
           
               
      </table>
          <!-- /end content -->     
               </div>
    
    </div>
     
      <div class="uk-width-1-1">
         <br/>
          <div class="uk-article-divider">
                <?php echo $this->lang->line('media_upload_title');?>
                 <hr class="uk-article-divider">
            </div>
          
          
    
    
    
       <fieldset >
 
 
       <?php
      if($media_rows['media_upload_type']=='normal'){
      ?>
      
 <input class="uk-form-width-small font_deafult"  id="userfile" name="userfile" type="file"  size="30" />
<button onclick="send_func();" name="IsPost_Upload" value="y" class="uk-button uk-button-danger font_deafult"  type="button"> <?php echo $this->lang->line('media_upload_uploadfile');?></button>
 
    <br/> <br/>
      </fieldset>
  <?php
      }
  ?>
   
<input type="hidden" value="<?php echo @$current_path;?>" name="folder">
   
  
    
    
    
    
    
    
    
    
    
    
    
    
    </div>
    
    
    </div>
     
    
    
    <script>
var j=0;
 var ttm;
var showprogress=function(){
    //var bar=$("#progress_up",parent.document);
    var bar=$("#progress_up");
   // $("#testdiv",opener.document)
   bar.show();
   //
   
   console.info(j);
   var percent=Math.ceil(parseInt(j) / 100 * 100);
  // console.info(percent);
   
   bar.css('width',percent+'%');
  if( j  >= 100){
      clearTimeout(ttm);
  } else {
     times();
  }
 
   
   //return false;
}


var times=function(){
    j++;
     ttm = setTimeout('showprogress()',1000);
   // i++;
}


var stopload=function(){
  //  alert('s');
    $("#progress_up").css('width','100%');
    if(ttm){
    clearTimeout(ttm);
    ttm = null;
}
   
    j=100;
}

var stopload2=function(){
  //  alert('s');
    $("#progress_up").css('width','0%');
    if(ttm){
    clearTimeout(ttm);
    ttm = null;
}
   
    j=0;
}
</script> 
    
    
    
      <!-- /1 -->  
      <?php
      if($media_rows['media_upload_type']=='ajax'){
      ?>
     <div class="uk-progress  uk-progress-danger  uk-progress-striped uk-active">
        <div id="progress_up" class="uk-progress-bar" style="width: 0%; direction:ltr; display: none"></div>
         </div>
      <iframe width="80%" style="height: 70px" src="<?php echo base_url('cp/ajaxaupload');?>"></iframe>

  </div>  
  </div>  
  </div>  
  </div>      
         <br/> <br/> <br/> <br/>
            <!-- --> 
         
         <?php
             }
         ?>
         







  <!--api documentions -->
<div id="media_help" class="uk-modal font_deafult">
  <div class="uk-modal-dialog">
 <a href="" class="uk-modal-close uk-close"></a>
 <h1 class="dirTemplate"><img src="<?php echo $base; ?>/img/22.png"/> &nbsp; <div class="uk-badge uk-badge-notification">API Documentation</div>   &nbsp; </h1>
  <p>
      <!-- begin-->
     
 <div class="uk-article-divider" style="font-family:Tahoma">
Use and add ImageManager in template or view
  <hr class="uk-article-divider">
            </div>
         
 
   <?php
$x = <<<EOF
-----------------------------------------------------
 Files Require & Element Setting.
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
----------------------------------------------------------- 
Add Link To Open Imagemanager  
<a href="<?php echo base_url("cp/apimedia"); ?>" id="field_src"
title="Upload link" >Open</a>
      
 ----------------------------------------------------------
 Configure Form Field with:
** Input One :field_one
** Input One :field_two
 <input type="text" name="field_one" id="field_one"   size="30"/> 
 
<input type="text" name="field_one" id="field_two"   size="30"/>     
EOF;
  ?> 
<code><pre>  
  <?php echo highlight_string($x,true);?>
  </pre>      
 </code>
    
       
       
   <!-- end -->   
  </p>
  </div>
  </div>
 



