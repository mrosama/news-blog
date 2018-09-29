  <meta charset="utf-8" />
  <?php
$api = $this -> load -> library('apiservices');
$api->CP_Auth(1,true,'No direct script access allowed');
  @$session_style = @$this->session->userdata('cpstyle');  
?>
  <?php
    $base = base_url($this ->config ->item('template_path'));
     
    $this->load->helper('html');
 $this->load->helper('url');
 $this->load->helper('directory');
      
 
 $api = $this->load->library('apiservices'); 
             
             
         ?>
  <link href="<?php echo $base; ?>/css/normalize.css" rel="stylesheet" media="screen"/>

        <link rel="stylesheet" href="<?php echo $base; ?>/uikit_lib/css/uikit_flat_en.css?version=0.1" />
        <!--<script  type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>-->
         
         <script>
           if (!Array.prototype.forEach) {
    Array.prototype.forEach = function (fn, scope) {
        for (var i = 0, len = this.length; i < len; ++i) {
            if (i in this) {
                fn.call(scope, this[i], i, this);
            }
        }
    };
}
         </script>
          <script src="<?php echo $base; ?>/js/jquery.js?version=0.1"></script>
            
            
     <script  type="text/javascript" src="<?php echo $base; ?>/uikit_lib/js/uikit.min.js"></script>
      
     <link rel="stylesheet" href="<?php echo $base; ?>/css/fontadmin.css?version=0.1" type="text/css" charset="utf-8" />
       
       <link title="default" id="theme" href="<?php echo $base; ?>/css/style_<?php echo @$session_style;?>.css?version=0.1" rel="stylesheet"  media="screen"/>

<link title="style_yellow" href="<?php echo $base; ?>/css/style2_<?php echo @$session_style;?>.css?version=0.1" rel="alternate stylesheet" type="text/css"/>

<link title="style_black" href="<?php echo $base; ?>/css/style3_<?php echo @$session_style;?>.css?version=0.1" rel="alternate stylesheet" type="text/css" />

 
        
        
        
<script type="text/javascript" src="<?php echo $base;?>/js/customjs.js?version=0.1"></script>
 <script src="<?php echo base_url('assets/lib/lazyload/jquery.lazyload.min.js?v=1.9.1');?>"></script> 

  <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
 
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
    
     $('input[name=indir]').val('6');
       $("#form_dir").submit();
  return false;
       //document.form_dir.submit();
 } 
 
 
 
 
 var add_func =function(){
         
     if ($("#field_one",window.parent.document).length > 0){        
         var field_one_val= $("#src_files").val();
         $('#field_one', window.parent.document).val(field_one_val);         
}
     
 if ($("#field_two",window.parent.document).length > 0){
      var field_two_val= $("#gd_files").val();
       $('#field_two', window.parent.document).val(field_two_val);
}       
 }
 
 
 </script>
  
  
<br/><br/>
   
                     <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
       <li class="navtitle"><a href="<?php echo base_url('cp/apimedia');?>"> <?php echo $this->lang->line('media_title');?> <i class="uk-icon-folder-open-o"></i></a></li>
      </ul>
    


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
 <div class="uk-alert  font_deafult dirTemplate">
      <button type="button" id="file1s" onclick="add_func();"> <?php echo $this->lang->line('media_formadd');?></button>   

     <input dir="ltr" id='src_files'  readonly="readonly" type="text" size="60" value="<?php echo $result_upload['File_name']?>"> <?php echo $this->lang->line('media_upload_listfile');?>

     
 </div>
 <?php
 }
 ?>
 
  <?php
 if(@$result_upload['File_GD']!=''){
 ?>
 
     <div class="uk-alert  font_deafult dirTemplate">
                <button type="button" id="file2s" onclick="add_func();"> <?php echo $this->lang->line('media_formadd');?></button>      

         <input dir="ltr" id="gd_files" readonly="readonly" type="text" size="60" value="<?php echo $result_upload['File_GD']?>"> <?php echo $this->lang->line('media_upload_listimg');?>
     
         
     </div>
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
  <button type="button" id="file1s" onclick="add_func();"> <?php echo $this->lang->line('media_formadd');?></button>   <input id='src_files'   dir="ltr"    type="text" size="60"> <?php echo $this->lang->line('media_upload_listfile');?>
</div>

     <div  id="file2_path"  style="display: none" class="uk-alert  font_deafult dirTemplate">
   <button type="button" id="file2s" onclick="add_func();"> <?php echo $this->lang->line('media_formadd');?></button>      <input id="gd_files"  dir="ltr" readonly="readonly" type="text" size="60"> <?php echo $this->lang->line('media_upload_listimg');?>
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
  <table width="100%" class="toolbar" cellpadding="5" cellspacing="5" dir="rtl">
  <tr><td align="center">
  <a style="font-family: Tahoma;" href="javascript:;" onclick="remap('<?php  echo $item['name'];?>');"><IMG class="lazy" data-original="<?php echo $icon;?>" <?php echo  @$options;?> border="0" /></a></td>
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
         







 



