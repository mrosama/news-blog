<!DOCTYPE html><html lang="en"><head>  <meta charset="utf-8" />  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame        Remove this if you use the .htaccess -->  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />  <title>Cpanel administrator</title>  <?php   $base = base_url($this -> config -> item('template_path'));   @$session_style = @$this->session->userdata('cpstyle');     ?>  <meta name="description" content="" />  <meta name="author" content="osama" />          <link rel="shortcut icon" href="<?php echo $base?>/img/favicon.ico" type="image/x-icon">        <link rel="icon" href="<?php echo $base?>/img/favicon.ico" type="image/x-icon">        <link href="<?php echo $base; ?>/css/normalize.css" rel="stylesheet" media="screen"/>        <link rel="stylesheet" href="<?php echo $base; ?>/uikit_lib/css/uikit_flat_en.css" />                                   <script>           if (!Array.prototype.forEach) {    Array.prototype.forEach = function (fn, scope) {        for (var i = 0, len = this.length; i < len; ++i) {            if (i in this) {                fn.call(scope, this[i], i, this);            }        }    };}         </script>           <script src="<?php echo $base; ?>/js/jquery.js"></script>        <script src="<?php echo $base; ?>/uikit_lib/js/uikit.min.js"></script>          <link rel="stylesheet" href="<?php echo $base; ?>/css/fontadmin.css" type="text/css" charset="utf-8" />      <link title="default" id="theme" href="<?php echo $base; ?>/css/style_<?php echo @$session_style;?>.css?version=0.1" rel="stylesheet"  media="screen"/><link title="style_yellow" href="<?php echo $base; ?>/css/style2_<?php echo @$session_style;?>.css?version=0.1" rel="alternate stylesheet" type="text/css"/><link title="style_black" href="<?php echo $base; ?>/css/style3_<?php echo @$session_style;?>.css?version=0.1" rel="alternate stylesheet" type="text/css" />        <!--[if lt IE 9]>        <script src="<?php echo $base;?>/js/html5shiv.js"></script>        <![endif]--></head><body style="background-color:#666"> <?php    $api = $this->load->library('apiservices');   ?>       <div class="middleDiv">      <!-- -->               <div class="uk-grid" data-uk-grid-margin>  <div class="uk-width-larg-1-1">   <div class="uk-panel uk-panel-box">   <h3 class="uk-panel-title font_deafult"><i class="uk-icon-medium uk-icon-user"></i> <?php echo $this->lang->line('mem_login_title');?> </h3>   <hr class="uk-article-divider"><form method="post" class="uk-form uk-form-stacked font_deafult" style="width: 400px; text-align:center  ">                                    <div class="uk-form-row">                                        <label class="uk-form-label" for="email_login"> <?php echo $this->lang->line('mem_email');?> </label>                                        <div class="uk-form-controls">                                            <input type="text" value="osama_eg@outlook.com"  id="email_login" name="email_login" placeholder="<?php echo $this->lang->line('mem_email');?>">                                        </div>                                    </div>                                    <div class="uk-form-row">                                        <label class="uk-form-label" for="password_login"> <?php echo $this->lang->line('mem_password');?>  </label>                                        <div class="uk-form-controls">                                            <input type="password" value="000" id="password_login"  name="password_login" placeholder="<?php echo $this->lang->line('mem_password');?>">                                        </div>                                    </div><div class="uk-form-row">   <button name="IsPost_login" value="y" class="uk-button uk-button-success" type="submit"><?php echo $this->lang->line('mem_login');?>  </button>    </div>            <div class="uk-panel uk-panel-divider"></div>                                                    </form>             </div>   </div>              </div>          <?php      if(@$result_login=="ERROR_LOGIN"){      ?>      <div class="uk-alert uk-alert-danger font_deafult"> <?php echo $this->lang->line('mem_login_errormsg');?> </div>      <?php      }      ?>            <!-- -->    </div>  </body></html>