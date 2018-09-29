<?php
$api = $this -> load -> library('apiservices');
$api->CP_Auth(1,true,'No direct script access allowed');

  @$session_style = @$this->session->userdata('cpstyle');  

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cpanel administrator</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />  
          
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
        
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
            <script src="<?php echo base_url("assets/lib/switcher_css/styleswitcher.js");?>"></script>
               <script type="text/javascript">
 
</script>  
            
     <script  type="text/javascript" src="<?php echo $base; ?>/uikit_lib/js/uikit.min.js"></script>
      
<link   rel="stylesheet" href="<?php echo $base; ?>/css/fontadmin.css?version=0.1" type="text/css" charset="utf-8" />
      
<link title="default" id="theme" href="<?php echo $base; ?>/css/style_<?php echo @$session_style;?>.css?version=0.1" rel="stylesheet"  media="screen"/>

<link title="style_yellow" href="<?php echo $base; ?>/css/style2_<?php echo @$session_style;?>.css?version=0.1" rel="alternate stylesheet" type="text/css"/>

<link title="style_black" href="<?php echo $base; ?>/css/style3_<?php echo @$session_style;?>.css?version=0.1" rel="alternate stylesheet" type="text/css" />



        
<script type="text/javascript" src="<?php echo $base;?>/js/customjs.js?version=0.1"></script>
      
<link rel="stylesheet" href="<?php echo base_url()?>/assets/lib/flag/flags.css?v=0.1" type="text/css">





    </head>

    <body>

        <!--begin body  -->

        <div id="wrapper">
            <!-- begin wrapper -->

            <header class="header">
                
                <!--begin  header-inner clear-->
                    <div class="header-inner clear">
                         
<div class="header-content">
                             
<div id="nav1" >
<div id="welcome_icon"><img src="<?php echo $base; ?>/img/green.png"/></div>


</div>

<div id="nav2" >
 <div id="welcome_msg">  <?php echo $this->lang->line('app_welcome');?></div>
</div>


<div id="nav3" >
 <div id="welcome_user"> <?php echo $this->session->userdata('IUser_name');?></div>
 </div>
 


 <div class="nav4" >
      
   <a href="javascript:void(0);" onclick="return false" id="notify_id" title="notifications" class="uk-icon-button uk-icon-flag-checkered">
     
       </a>
     <span class="notify_nav1"><sup><span id="num_notifications" style="display: none"  class="uk-badge uk-badge-danger" >0</span></sup></span>
   
   
    <div id="list_notify" style="display:none" >
       <div class="arrow-up_4"></div>
<ul id="menu_list_notify">
<li style="background-color:#FFFFFF "><a style="color:#000 " href="<?php echo base_url('cp/notifcation');?>"> <?php echo $this->lang->line('app_notify');?> &nbsp;&nbsp;</a><i class="uk-icon-comment-o"></i>&nbsp;</li>
<span id="n_alert"></span>
</ul>
</div>  
 </div>
 
  
 <div class="nav4" >
      
   <a title="Email - Message" href="javascript:void(0);" id="message_id" class="uk-icon-button uk-icon-envelope-o"></a>
    <span class="notify_nav1"><sup><span id="notify_num_msg" style="display: none"  class="uk-badge uk-badge-danger" >0</span></sup></span>
    
   
 <div id="list_message" style="display:none"  >
       <div class="arrow-up_3"></div>
<ul id="menu_list_message"  >
<li style="background-color:#FFFFFF "><?php echo $this->lang->line('app_mailbox');?> &nbsp;&nbsp;<i class="uk-icon-envelope-o"></i>&nbsp;</li>

<span id="n_msg"></span>
</ul>
</div>     
 


  </div>

  

  
  
 <div id="nav8" >
     <a title="style -themes" href="javascript:void(0);" id="themes_id" ><img src="<?php echo $base?>/img/colors.png" border='0' /></a>   
  
 <div id="list_themes" style="display:none">
       <div class="arrow-up_2"></div>
<ul id="menu_list_themes">
<li><a  href="javascript: void(0)" onclick="setActiveStyleSheet('default'); return false;"  ><?php echo $this->lang->line('app_colorA');?></a><div class="graystyle"></div></li>
<li><a  href="javascript: void(0)" onclick="setActiveStyleSheet('style_yellow'); return false;" ><?php echo $this->lang->line('app_colorC');?></a><div class="yellowstyle"></div></li>
<li><a  href="javascript: void(0)" onclick="setActiveStyleSheet('style_black'); return false;" ><?php echo $this->lang->line('app_colorB');?></a><div class="blackstyle"></div></li>
</ul>
</div>     
 
 
   
   
   
 </div>   
 
 
  <div id="nav5" >

     
<!-- -->

                                <div class="uk-button-group font_deafult">
                                    <button title="--" id="b_plugin"  class="uk-button ">&nbsp;   <?php echo $this->lang->line('app_modules');?> &nbsp;   </button>
                                    <div data-uk-dropdown="{mode:'click'}">
                                        <a href="#" title="--" id="b_plugin2"   class="uk-button"><i class="uk-icon-caret-down"></i></a>
                                        <div class="uk-dropdown uk-dropdown-small">
                                            <ul class="uk-nav uk-nav-dropdown">
                                                <li><a href="<?php echo base_url('post/admin/index');?>">&nbsp;&nbsp;&nbsp; <?php echo $this->lang->line('plugin_article');?> &nbsp;&nbsp;&nbsp; </a></li>
                                                 <li class="uk-nav-divider"></li>
                                               
                                                  <li><a href="<?php echo base_url('video/admin/index');?>">&nbsp;&nbsp;&nbsp;   <?php echo $this->lang->line('plugin_media');?>  &nbsp;&nbsp;&nbsp; </a></li>
                                                 <li class="uk-nav-divider"></li>
                                                  <li><a href="<?php echo base_url('poll/admin/index');?>">&nbsp;&nbsp;&nbsp;   <?php echo $this->lang->line('plugin_poll');?>  &nbsp;&nbsp;&nbsp; </a></li>
                                                 <li class="uk-nav-divider"></li>
                                                  <li><a href="<?php echo base_url('ads/admin/index');?>">&nbsp;&nbsp;&nbsp;   <?php echo $this->lang->line('plugin_advert');?>  &nbsp;&nbsp;&nbsp; </a></li>
                                                 <li class="uk-nav-divider"></li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                </div>



<!-- -->
  </div>
  
  <!-- begin List Language -->
 
  <div id="nav6" >
      <?php
  $TPL_Config = $this -> config -> item('Template_Type');
 if($TPL_Config != 'A' && $TPL_Config!='B'){
  ?>
          <div class="uk-button-group font_deafult">
                                    <button title="--" class="uk-button">&nbsp;   <?php echo $this->lang->line('app_language');?>  &nbsp;   </button>
                                    <div data-uk-dropdown="{mode:'click'}">
                                        <a href="#" title="--" class="uk-button"><i class="uk-icon-caret-down"></i></a>
                                        <div class="uk-dropdown uk-dropdown-small">
                                            <ul class="uk-nav uk-nav-dropdown">
                                                <li><a href="<?php echo base_url('cp/setlang/arabic');?>" class="dirTemplate"><img src="<?php echo $base?>/img/ar.png" /> عربي   </a></li>
                                                 <li class="uk-nav-divider"></li>
                                               
                                                  <li><a href="<?php echo base_url('cp/setlang/english');?>" class="dirTemplate"><img src="<?php echo $base?>/img/en.png" />   English     </a> </li>
                                                 <li class="uk-nav-divider"></li>
                                                 
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
                                </div>
    
           <?php
     }
     ?>
     </div>
    
     <!-- end List Language -->
     
    
   
    <div id="nav7" >
<a title="setting -privacy" href="javascript:void(0);" id="privacy_id" ><img class="listimg" src="<?php echo $base?>/img/privacy.png" /></a>
        
        <!-- -->
      <div id="privacy-menu" style="display:none">
          <div class="arrow-up_1"></div>
    <ul id="privacy">
 <li><a href="<?php echo base_url("cp/signout");?>" id="sign_out" onclick="return log_out();"><?php echo $this->lang->line('app_signout');?> </a><span class="icon1 uk-icon-small uk-icon-power-off"></span></li>
<li><a href="<?php echo base_url()?>" target='_blank'><?php echo $this->lang->line('app_home');?></a><span class="icon1 uk-icon-small uk-icon-home"></span></li>
<li><a href="<?php echo base_url("cp/admin")?>"><?php echo $this->lang->line('app_chart');?></a><span class="icon1 icon1 uk-icon-small uk-icon-bar-chart-o"></span></li>
<li><a href="<?php echo base_url("cp/options")?>"><?php echo $this->lang->line('app_options');?></a><span class="icon1 icon1 uk-icon-small uk-icon-wrench"></span></li>
<li><a href="<?php echo base_url("cp/memebers")?>"><?php echo $this->lang->line('app_memebers');?> &nbsp;</a><span class="icon1 icon1 uk-icon-small uk-icon-user"></span></li>
<li><a href="<?php echo base_url("cp/media");?>"><?php echo $this->lang->line('app_filesys');?>&nbsp;</a><span class="icon1 icon1 uk-icon-small uk-icon-folder"></span></li>
<li><a href="<?php echo base_url("cp/masmail");?>">  <?php echo $this->lang->line('app_msmail');?></a><span class="icon1 icon1 uk-icon-small uk-icon-envelope"></span></li>
<li><a href="<?php echo base_url("cp/visitor")?>"><?php echo $this->lang->line('app_vistors');?></a><span class="icon1 icon1 uk-icon-small uk-icon-users"></span></li>
<li><a href="<?php echo base_url("cp/backup");?>"><?php echo $this->lang->line('app_backup');?></a><span class="icon1 icon1 uk-icon-small uk-icon-gear"></span></li>
<li><a href="<?php echo base_url("cp/cat");?>"><?php echo $this->lang->line('cat_title');?></a><span class="icon1 icon1 uk-icon-small uk-icon-tag"></span></li>
<li><a href="#_help" data-uk-modal>  <?php echo $this->lang->line('app_help');?> </a><span class="icon1 icon1 uk-icon-small uk-icon-question-circle"></span></li>
</ul>
        <!-- -->
        
        
        
        </div>
   
   
    
                            
                            
                            
                            
    <!--end header content -->                        
 </div>
                          
                        
                     </div>
                 <!-- end header-inner clear-->


            </header>

            <div class="clear"></div>

 <script src="<?php echo base_url("assets/lib/js/scroll/jquery.slimscroll.min.js");?>">
      
  </script>
  
<script type="text/javascript">
  /*  $(function(){

     
      $('#main').slimScroll({
            height: '900px',
        alwaysVisible: true,
         size: '12px',
         color: '#555'
      });

    });*/
</script>



            <section id="main">

<br/>
 
 
  <?php echo $content_for_layout;?>
 
   
  <?php //echo modules::run('app/news');?>

            </section>

            <div class="clear"></div>



<input type="hidden" value="<?php echo base_url("cp/getCount_message");?>" name="base_num_msg" id="base_num_msg">
<input type="hidden" value="<?php echo base_url("cp/getnew_message");?>" name="base_list_msg" id="base_list_msg">
<input type="hidden" value="<?php echo base_url("cp/get_notifcation");?>" name="base_num_alert" id="base_num_alert">
<input type="hidden" value="<?php echo base_url("cp/get_new_notify");?>" name="base_list_alert" id="base_list_alert">
<input type="hidden" value="<?php echo base_url("cp/update_notify");?>" name="base_up_alert" id="base_up_alert">


            <footer class="page-footer">
                <div id="copyright" class="pull-right ">
             <img src="<?php echo $base;?>/img/php-48-black.png" /> 
              <img src="<?php echo $base;?>/img/mysql.png" />     
             
             
             
  Programmed & Designed By Osama Salama. © <?php echo date('Y');?> - <?php echo date('Y')+1;?> All rights reserved.           
                </div>
            </footer>

            <!-- end wrapper -->

        </div>

        <!--end body  -->
        
  <form>
          <input type="hidden" value="<?php echo $base; ?>" id="_base">
  </form>  
        
   <div id="_help" class="uk-modal font_deafult">
  <div class="uk-modal-dialog">
 <a href="" class="uk-modal-close uk-close"></a>
 <h1 class="font_deafult dirTemplate"><img src="<?php echo $base; ?>/img/5454.png"/> &nbsp;  <?php echo $this->lang->line('app_help');?>  &nbsp; </h1>
  <p>
      <!-- begin-->
    <p>
      <!-- begin-->
       
 <div class="uk-article-divider" style="font-family:Tahoma">
Use and add contactus in template or view
  <hr class="uk-article-divider">
            </div>
    <?php
   $tokens= $this->config->item('Token_access_key');
    ?>       
 <pre>
<code>  
/**
* Run Contact us
* You must add (token)  as parameter
* You can override Style   ID and class className (contact_form)
* You can override Style Form  Classname   (form_contact_us)
* You can override Style message  Classname   (alert-message-success)
* You can override Style   ID and className for info box (contact_info)
*
*
**/
 
 modules::run('api/Contactus','<?php echo $tokens;?>');
</code>
</pre>
       
       
 <div class="uk-article-divider" style="font-family:Tahoma">
  Use and add maillist in template or view
  <hr class="uk-article-divider">
            </div>       
    
<pre> <code>  
 /**
* Run maillist form
* You must add (token)  as parameter
* You must add (action page)  as parameter
* configure style
* You can override Style   ID and className for mailling list(contact_info)
**/
 
modules::run('api/email_list','<?php echo $tokens;?>','app/elist');

---------------------------------------------------------------------
/**
 * run mailling list  action page add code in template or view 
 * You can override Style ID and className for (sucess_message) - (error_message) 
 * modules::run('api/Process_list','<?php echo $tokens;?>');
 */


</code>
</pre>   
       
   
 
       
       
       
       
       
   <!-- end -->   
  </p>
  
  
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
  
  
    <p>
      <!-- begin-->
       
 <div class="uk-article-divider" style="font-family:Tahoma">
Use and add Login  in template or view
  <hr class="uk-article-divider">
            </div>
    <?php
   $tokens= $this->config->item('Token_access_key');
    ?>       
 <pre>
<code>  
/**
* Run Login Form
* You must add (token)  as parameter
* You must add (Array) Page_Register- Page_Password - Page_Profile - page_Logout as parameter
* You can override Style   className (loginForm)
* You can override Style Form  ID   (loginForm)
* You can override Style message  Error Login   (Error_Login)
* You can override Style   Class Profile Div   (profile)
*
*
**/
   

  $optionLogin=array(
  'Page_Register'=>base_url('app/register'),
   'Page_Password'=>base_url('app/restorpass'),
    'Page_Profile'=>base_url('app/profile'),
    'page_Logout'=>base_url('app/logout'),
  );
           
modules::run('api/login_form','<?php echo $tokens;?>',$optionLogin);
--------------------------------------------------------
* get Current User :
$api = $this -> load -> library('apiservices');
 $resultArray=$api->CurrentUser();
 return Array();
</code>
</pre>
       
       
 <div class="uk-article-divider" style="font-family:Tahoma">
  Use and add Restore Password in template or view
  <hr class="uk-article-divider">
            </div>       
    
<pre> <code>  
 /**
* Run Restore Password form
* You must add (token)  as parameter
* configure style
* You can override Style Form (form_restorepass)
* You can override Style message (alert-message-success)
* You can override Style message (alert-message-danger)
* modules::run('api/restorpass','<?php echo $tokens;?>');
**/
  
---------------------------------------------------------------------

+Page To Active Acount By Email
-----------------------------------------------

/**
 * run Active Acount list
 * You can override Style ID and className for 
 * (alert-message-success) - (alert-message-danger) 
 * modules::run('api/activeAccount','<?php  echo $tokens;?>');
 */


+Page subscribe ,registering users 
-----------------------------------------------
Parameter :
1-Token
2-Link Page To active Acount by Email


/**
 * run subscribe  
 * You can override Style ID and className for (alert-message-danger) - (alert-message-danger) 
 * modules::run('api/register','<?php  echo $tokens;?>',base_url('app/reg'));
 */


+authenticate access to pages
******************************************************
$api = $this -> load -> library('apiservices');
$api->Acl_Auth('null',true);
Parameter :
1-message
2- true for redirect to Custome URl Page (If Enter False will Show Message And Exit App)
3-url  

Acl_Auth($msg=null,$redirect=true,$url='/')
</code>
</pre>   
       
 <!-- end -->   
  </p>
  
    <p>
      <!-- begin-->
       
 <div class="uk-article-divider" style="font-family:Tahoma">
  Return all configurations .You Can Choose data format json , array
  <hr class="uk-article-divider">
            </div>
    <?php
   $tokens= $this->config->item('Token_access_key');
    ?>       
 <pre>
<code>  
/**
* data return format(array or json)
*
**/
$api = $this->load->library('apiservices');
$conf = $api->get_config('<?php echo $tokens;?>','array');
</code>
</pre>
       
       
 <div class="uk-article-divider" style="font-family:Tahoma">
  Return  Social networking links.You Can Choose data format json , array
  <hr class="uk-article-divider">
            </div>       
    
<pre> <code>  
$api = $this->load->library('apiservices');
$conf = $api->get_fp('<?php echo $tokens;?>','array');
</code>
</pre>   
       
   
 
 
  <div class="uk-article-divider" style="font-family:Tahoma">
  Return  MetaData.You Can Choose data format json , array
  <hr class="uk-article-divider">
            </div>       
    
<pre> <code>  
$api = $this->load->library('apiservices');
$conf = $api->get_meta('<?php echo $tokens;?>','array');
</code>
</pre> 


  <div class="uk-article-divider" style="font-family:Tahoma">
  Return  Mail Configurations.You Can Choose data format json , array
  <hr class="uk-article-divider">
            </div>       
    
<pre> <code>  
$api = $this->load->library('apiservices');
$conf = $api->get_MailConfig('<?php echo $tokens;?>','array');
</code>
</pre>


  <div class="uk-article-divider" style="font-family:Tahoma">
  Run Cache automatically
  <hr class="uk-article-divider">
            </div>       
    
<pre> <code>  
$api = $this->load->library('apiservices');
$api->start_Cache('<?php echo $tokens;?>');
</code>
</pre>   



  <div class="uk-article-divider" style="font-family:Tahoma">
  Close WebSite and Show Message.add in custome template
  <hr class="uk-article-divider">
            </div>       
    
<pre> <code>  
$api = $this->load->library('apiservices');
$api->turnOff('<?php echo $tokens;?>');
</code>
</pre> 

 <div class="uk-article-divider" style="font-family:Tahoma">
 Add New Notifications
 <hr class="uk-article-divider">
 </div>          
<pre> <code>  
$api = $this->load->library('apiservices');

$options = array(
'token'=>'<?php echo $tokens;?>',
'message'=>'message here..',
'links'=>'Target link',
 
);

$api->notification($options);
===============================
 echo $this->db->dbprefix; 
</code>
</pre>    
<!-- end -->   
  </p>
  
  
  
  
  
  
  
    <p>
      <!-- begin-->
       
 <div class="uk-article-divider" style="font-family:Tahoma">
Use and add hitcounter in template or view
  <hr class="uk-article-divider">
            </div>
    <?php
   $tokens= $this->config->item('Token_access_key');
    ?>       
 <pre>
<code>  
/**
* Run visitor counter
* You must add (token)  as parameter
* You can override Style class className (hitCounter)
**/

 modules::run('api/hitCounter','<?php echo $tokens;?>');
</code>
</pre>
       
       
 <div class="uk-article-divider" style="font-family:Tahoma">
  Use and add visitor online in template or view
  <hr class="uk-article-divider">
            </div>       
    
<pre> <code>  
 /**
* Run visitor Who online with flag counter
* You must add (token)  as parameter
* You can override Style class className (whoisOnline)
**/
modules::run('api/visitorOnline','<?php echo $tokens;?>');
</code>
</pre>   
       
   
 
       
       
       
       
       
   <!-- end -->   
  </p>
  
 
  
  
  
  
   <!-- end -->   
  </p>
  </div>
  </div>
        
        


 

    </body>

</html>