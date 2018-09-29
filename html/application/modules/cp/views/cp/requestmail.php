 <meta charset="utf-8" />
 <?php
$api = $this -> load -> library('apiservices');
$api->CP_Auth(1,true,'No direct script access allowed');
?>
<?php $this -> load -> helper('html');
        $this -> load -> helper('url');
        //$base= base_url("html/application/modules/cp/views/layouts/");
        $base = base_url($this ->config ->item('template_path'));
        ?>
        
          <!--[if lt IE 9]>
        <script src="<?php echo $base;?>/js/html5shiv.js"></script>
        <![endif]-->
  

        <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
        <link rel="shortcut icon" href="<?php echo $base?>/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo $base?>/img/favicon.ico" type="image/x-icon">

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
        <link href="<?php echo $base; ?>/css/style_ar.css?version=0.1" rel="stylesheet" media="screen"/>
<script type="text/javascript" src="<?php echo $base;?>/js/customjs.js?version=0.1"></script>
      
<link rel="stylesheet" href="<?php echo base_url()?>/assets/lib/flag/flags.css?v=0.1" type="text/css">

<script>

$("document").ready(function() {
    var handelTime;
    var base=$("#base_img").val();
    var urlbase=$("#base_url").val();
    var subject=$("#subject_email").val();
    var msg=$("#msg_email").val();
    var total=$("#num_total").val();
    var back_url=$("#back_url").val();
   
     var func_send = function() {

        //   
         /* send*/ 
         $.get( urlbase, { title: msg, message: subject },function( data ) {
            
          $("#num_send").val(data); 
             
         /*  update percent*/
        var percent=Math.ceil(data/total * 100);
        $("#progressbar").css("width", percent+"%");
        $("#percent").html(percent+"%");
          
             if(parseInt(data)==total){
                
                
                
                  func_stop();
                  
                  $("#result_emailsend").show('slow');
             }
             
             ///////////////
             } );
          /* end*/
          
        handelTime = setTimeout(func_send,3000);
        $('#imgstatus').attr('src', base + '/img/online.png');
     };

  var func_stop = function() {

         clearTimeout(handelTime);
         
 $('#imgstatus').attr('src', base + '/img/offline_2.png');
     };

var func_exit=function(){
    window.parent.document.location.href = back_url;
}


 handelTime = setTimeout(func_send,3000);
    
    
 
    
 $("#stop_sendmail").click(func_stop);
 $("#play_sendmail").click(func_send);
 $("#cancel_sendmail").click(func_exit);
    
    
    
    
    ////////////////end
    
});

</script>

<div class="uk-grid " data-uk-grid-margin>    
       
 <div class="uk-width-medium-1-1">
<div class="uk-panel uk-panel-box backcolors dirTemplate" style="height: 460px">
    <form class="uk-form">
 
 <div class="uk-grid">
     
       <div class="uk-width-1-1 font_deafult"> 
          
   <div class="uk-progress uk-progress-striped uk-active">
    <div id="progressbar" class="uk-progress-bar" style="width: 0%;"></div>
      </div> 
     </div>
     
      <br/>
       <i class="uk-icon-refresh uk-icon-spin"></i>
       <span id="percent" style="font-family:Tahoma"  > 0 % </span>
        <br/> <br/>
     <div class="uk-width-1-1 font_deafult"> 
          
    <div data-uk-button-checkbox>
    <button type="button" id="stop_sendmail" class="uk-button uk-button-primary uk-badge uk-badge-warning font_deafult"><?php echo $this->lang->line('masmail_maillist_off');?></button>
    <button type="button" id="play_sendmail" class="uk-button uk-button-success font_deafult"><?php echo $this->lang->line('masmail_maillist_on');?></button>
    <button type="button"    id="cancel_sendmail" class="uk-button uk-button-danger font_deafult"><?php echo $this->lang->line('masmail_maillist_cancel');?></button>
    </div>
     </div>
     <br/>
    <div class="uk-article-divider font_deafult">
                 <?php echo $this->lang->line('masmail_maillist_btn_chartsend');?>
                 <hr class="uk-article-divider">
            </div>
     <br/>
     
      <!--555 -->
         <div class="uk-width-1-3 font_deafult">
             <!-- ////////////-->
             
                <div class="uk-form-row">
         <label class="uk-form-label" for="num_total"> <?php echo $this->lang->line('masmail_maillist_status_send');?> </label>
         <div class="uk-form-controls">
             
          <img id="imgstatus" src="<?php echo $base ?>/img/online.png" />
             </div>
            </div>

             
             
             
           </div>
          
         <div class="uk-width-1-3 font_deafult">
           
          <div class="uk-form-row">
         <label class="uk-form-label" for="num_send"> <?php echo $this->lang->line('masmail_maillist_num_send');?> </label>
         <div class="uk-form-controls">
          <input readonly="readonly" class=".uk-form-width-medium font_deafult" type="text" name="num_send" id="num_send"  />
             </div>
            </div>

          </div>       
 
 
        <div class="uk-width-1-3 font_deafult">
            
              <div class="uk-form-row">
         <label class="uk-form-label" for="num_total"> <?php echo $this->lang->line('masmail_maillist_num_msg');?> </label>
         <div class="uk-form-controls">
          <input readonly="readonly" class=".uk-form-width-medium font_deafult" type="text" name="num_total" id="num_total"  value="<?php echo $total_email;?>">
             </div>
            </div>
            
          </div>  
          
           <!--555 -->
          
           <div class="uk-width-1-1 font_deafult" id="result_emailsend" style="display: none">
                <br/>  <br/>
           <div class="uk-alert uk-alert-success"> <?php echo $this->lang->line('masmail_sendmail_messageok');?> </div>
           </div>
 </div>

      
    
      
      <input type="hidden" value="0" name="num_sender" id="num_sender">
       <input type="hidden" value="<?php echo $base;?>" name="base_img" id="base_img">
       
         <input type="hidden" value="<?php echo base_url("cp/responseMaillist");?>" name="base_url" id="base_url">
         <input type="hidden" value="<?php echo $subject_email;?>" name="subject_email" id="subject_email">
          <input type="hidden" value="<?php echo $msg_email;?>" name="msg_email" id="msg_email">
           <input type="hidden" value="<?php echo $total_email;?>" name="totals" id="totals">
       <input type="hidden" value="<?php echo base_url("cp/masmail");?>" name="back_url" id="back_url">
      <!-- -->
    </form>
</div>     
</div>   
</div>    



