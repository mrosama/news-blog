 <meta charset="utf-8" />
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
 
 
<script>
var uploadajax=function(){
     
     var folder=$("#Path",parent.document).val();
     var d=$("#folder").val(folder);
    parent.times();
   // console.info(d);
    
    $("#formajax").submit();
}
</script>
 

  <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <?php
      if(@$result_upload_ajax=='ERROR_Upload'){
          ?>
          <script>
           $("#msg_upload",parent.document).hide('fast');
              $("#msg_error",parent.document).show('slow');
                parent.stopload2();
              </script>
          <?php
      }
    ?>
    
      <?php
     if(is_array(@$result_upload_ajax)){
       ?> 
        <script>
       $("#msg_upload",parent.document).show('slow');
       $("#msg_error",parent.document).hide('fast');
           // alert(response);
           $.get("<?php echo base_url("cp/do_upload");?>", function( data ) {
      // alert(data);
         if(data.File_name!=''){
                  // alert(data.File_name);
                   $("#src_files",parent.document).val(data.File_name);
              $("#file1_path",parent.document).show("slow");
              parent.stopload();

               }
               
                if(data.File_GD!=''){
                      $("#file2_path",parent.document).show("slow");
                   $("#gd_files",parent.document).val(data.File_GD);
                   parent.stopload();
                  }
       
        
         }, "json" );
       
       </script>
    <?php
     }
    ?>
 <div class="uk-panel uk-panel-box font_deafult backcolors_inner  dirTemplate"> 
<form class="uk-form  font_deafult"  method="post" id="formajax" enctype="multipart/form-data">
<table>
    
<tr><td><input type="file" class="uk-form-width-large" name="userfile"></td>
    <td><button onclick="uploadajax();" name="IsPost_Upload" value="y" class="uk-button  uk-button-success font_deafult" type="button"> <?php echo $this->lang->line('media_upload_uploadfile');?></button></td></tr>
</table>
<input type="hidden" value="6" id="indir" name="indir">
<input type="hidden" value="" id="folder" name="folder">
</form>
</div>