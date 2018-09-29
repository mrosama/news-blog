  <meta charset="utf-8" />
  <?php
$api = $this -> load -> library('apiservices');
$api->CP_Auth(1,true,'No direct script access allowed');
?>
  <?php
    $base = base_url($this ->config ->item('template_path'));
     
    $this->load->helper('html');
 $this->load->helper('url');
 $this->load->helper('directory');
      
 
 $api = $this->load->library('apiservices'); 
             
             
         ?>
         

    <script type="text/javascript" src="<?php echo base_url("assets/lib/fancybox/jquery.fancybox.pack.js");?>"></script>
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


<p></p>
<p></p>
<p></p>

 <form id="form1" method="post">
  
 
   <a href="<?php echo base_url("cp/apimedia"); ?>" id="field_src" title="تحميل ملف" >Open</a>
   <input type="text" name="field_one" id="field_one"   size="30"/> 
   <br/>
  <input type="text" name="field_one" id="field_two"   size="30"/> 

  <p><input type="submit" value="Continue &rarr;"/></p>
</form>