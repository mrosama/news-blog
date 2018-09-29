  <meta charset="utf-8" />
  <?php
$api = $this -> load -> library('apiservices');
$api->CP_Auth(1,true,'No direct script access allowed');
$TPL_Config = $this -> config -> item('Template_Type'); 
?>
  
  <style>
 .circular {
 background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #CCCCCC;
    border-radius: 50% 50% 50% 50%;
    box-shadow: 0 0 3px 0 #B5B5B5;
     width:40px;
     height:40px;
    margin: 0 10px 5px 0;
    padding: 4px;
    }
 </style>  
  
<?php
   $base = base_url($this ->config ->item('template_path'));
   $seg = $this -> uri -> segment(3);
  
  ?>
  
  
  

<script type="text/javascript">
$.fn.passwordStrength = function( options ){
    return this.each(function(){
        var that = this;that.opts = {};
        that.opts = $.extend({}, $.fn.passwordStrength.defaults, options);
        
        that.div = $(that.opts.targetDiv);
        that.defaultClass = that.div.attr('class');
        
        that.percents = (that.opts.classes.length) ? 100 / that.opts.classes.length : 100;

         v = $(this)
        .keyup(function(){
            if( typeof el == "undefined" )
                this.el = $(this);
            var s = getPasswordStrength (this.value);
            var p = this.percents;
            var t = Math.floor( s / p );
            
            if( 100 <= s )
                t = this.opts.classes.length - 1;
                
            this.div
                .removeAttr('class')
                .addClass( this.defaultClass )
                .addClass( this.opts.classes[ t ] );
                
        })
        .after('<a href="#">Generate Password</a>')
        .next()
        .click(function(){
           // $(this).prev().val( randomPassword() ).trigger('keyup');
           $("#rando_text").html(randomPassword());
           $("#rando_text").show(1000);
            
            
            return false;
        });
    });

    function getPasswordStrength(H){
        var D=(H.length);
        if(D>5){
            D=5
        }
        var F=H.replace(/[0-9]/g,"");
        var G=(H.length-F.length);
        if(G>3){G=3}
        var A=H.replace(/\W/g,"");
        var C=(H.length-A.length);
        if(C>3){C=3}
        var B=H.replace(/[A-Z]/g,"");
        var I=(H.length-B.length);
        if(I>3){I=3}
        var E=((D*10)-20)+(G*10)+(C*15)+(I*10);
        if(E<0){E=0}
        if(E>100){E=100}
        return E
    }

    function randomPassword() {
        var chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$_+";
        var size = 10;
        var i = 1;
        var ret = ""
        while ( i <= size ) {
            $max = chars.length-1;
            $num = Math.floor(Math.random()*$max);
            $temp = chars.substr($num, 1);
            ret += $temp;
            i++;
        }
        return ret;
    }

};
    
$.fn.passwordStrength.defaults = {
    classes : Array('is10','is20','is30','is40','is50','is60','is70','is80','is90','is100'),
    targetDiv : '#passwordStrengthDiv',
    cache : {}
}
$(function(){
    $('input[name="password"]').passwordStrength();
    $('input[name="password2"]').passwordStrength({targetDiv: '#passwordStrengthDiv2',classes : Array('is10','is20','is30','is40')});

});
</script>  

  <style>
.is0{background:url(<?php echo $base?>/img/progressImg1.png) no-repeat 0 0;width:138px;height:7px;}
.is10{background-position:0 -7px;}
.is20{background-position:0 -14px;}
.is30{background-position:0 -21px;}
.is40{background-position:0 -28px;}
.is50{background-position:0 -35px;}
.is60{background-position:0 -42px;}
.is70{background-position:0 -49px;}
.is80{background-position:0 -56px;}
.is90{background-position:0 -63px;}
.is100{background-position:0 -70px;}

#passwordStrengthDiv2.is0{background:url(<?php echo $base?>/img/progressImg2.png) no-repeat 0 0;width:27px;height:30px;display:inline-block;}
#passwordStrengthDiv2.is10{background-position:-27px 0;}
#passwordStrengthDiv2.is20{background-position:-53px 0;}
#passwordStrengthDiv2.is30{background-position:-79px 0;}
#passwordStrengthDiv2.is40{background-position:-106px 0;}
</style>
  
<script src="<?php echo base_url('assets/lib/lazyload/jquery.lazyload.min.js?v=1.9.1');?>"></script> 
 <script>
 $(function() {
    $("img.lazy").lazyload({container: $("#content-table")});
  });
  </script>    
  
  
  <?php
   $base = base_url($this ->config ->item('template_path'));
  switch($seg) {
        
      case "new":
?>          
 <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle" >
    <ul class="uk-navbar-nav tm-navbar navtitle"  >
        <li class="navtitle"  ><a href="<?php echo base_url('cp/memebers');?>"> <?php echo $this->lang->line('mem_newuser');?> <i class="uk-icon-user"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
         <li><a href="<?php echo base_url('cp/memebers');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('mem_listuser');?>   </a></li>
           <li class="uk-nav-divider"></li>
                                               
            <li><a href="<?php echo base_url('cp/memebers/new');?>" class="dirTemplate"><i class="uk-icon-user"></i>  <?php echo $this->lang->line('mem_newuser');?>   </a> </li>
            <li class="uk-nav-divider"></li>
             <li><a href="<?php echo base_url('cp/memebers/options');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('mem_options');?>   </a> </li>
               <li class="uk-nav-divider"></li>
                                                 
       <li><a href="#members_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
      </div>


  </div>
    
</nav>



</div>

<br/>

<!-- end nav -->
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



 <div id="_page_members" class="container_inner uk-animation-fade"> 
  <?php echo validation_errors(); ?>


       <?php
     if(@$result_newuser=='OK'){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('mem_msg_add');?> </div>
         <?php
     }
     
     ?> 

  <?php
     if(@$result_newuser=='ERROR'){
       ?>  
       <div class="uk-alert uk-alert-danger font_deafult dirTemplate"> <?php echo $this->lang->line('mem_msg_error');?> </div>
         <?php
     }
     
     ?> 



 <div class="uk-grid" data-uk-grid-margin>   
     
     
      <div class="uk-width-medium-1-1">
             <div class="uk-panel uk-panel-box backcolors dirTemplate">
    

  <form    class="uk-form uk-form-stacked font_deafult" method="post" enctype="multipart/form-data"   >

  <div class="uk-grid">
<!-- -->



 <div class="uk-width-1-2">
     
       <div class="uk-form-row" >
        <label class="uk-form-label" for="country"> <?php echo $this->lang->line('mem_country');?> </label>

  <div class="uk-form-controls ">
  <select class="uk-form-width-medium font_deafult" name="country" id="country" style="font-family:Tahoma;size: 15px;">
      
      <?php
      if(is_array($mem_country)){
          foreach($mem_country as $country){
              if( $country['flag']=='eg'){
                  @$selected='selected="selected"';
              } else {
                   @$selected='';
              }
               
      ?>
      <?php
      if($TPL_Config == 'A'){    
      ?>
        <option <?php echo @$selected;?> value="<?php echo $country['flag'];?>" > <?php echo $country['arabic'];?></option>
      <?php
      }
      ?>  
       
       <?php
      if($TPL_Config == 'B'){    
      ?>
        <option <?php echo @$selected;?> value="<?php echo $country['flag'];?>" > <?php echo $country['english'];?></option>
      <?php
      }
      ?> 
     <?php
      if($TPL_Config == 'C' || $TPL_Config == 'D' || $TPL_Config == 'E'  || $TPL_Config == 'F'){    
      ?>
        <option <?php echo @$selected;?> value="<?php echo $country['flag'];?>" > <?php echo $country['arabic'] . ' | '.$country['english'];?></option>
      <?php
      }
      ?>    
        
        
        
        
      <?php
          }}
      ?>

 
 </select>
  </div>
  </div>
  
  
  
       <div class="uk-form-row" >
        <label class="uk-form-label" for="gender"> <?php echo $this->lang->line('mem_gender');?> </label>

  <div class="uk-form-controls ">
  <select class="uk-form-width-medium font_deafult" name="gender" id="gender">
  <option value="male" > <?php echo $this->lang->line('mem_gender_male');?></option>
  <option value="female" > <?php echo $this->lang->line('mem_gender_female');?></option>
 </select>
  </div>
  </div>
  
  
    <div class="uk-form-row" >
        <label class="uk-form-label" for=" roles"> <?php echo $this->lang->line('mem_role');?> </label>

  <div class="uk-form-controls ">
  <select class="uk-form-width-medium font_deafult" name="roles" id="roles">
 <option value="0" > <?php echo $this->lang->line('mem_role_user');?></option>
  <option value="1" > <?php echo $this->lang->line('mem_role_admin');?></option>
 
 </select>
  </div>
  </div> 
  
  
  
     
     
 </div>





 <div class="uk-width-1-2">
     
      <div class="uk-form-row">
         <label class="uk-form-label" for="fullname"> <?php echo $this->lang->line('mem_name');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="fullname" id="fullname"  />
             </div>
            </div>
            
           
            <div class="uk-form-row">
         <label class="uk-form-label" for="email"> <?php echo $this->lang->line('mem_email');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="email" id="email"  />
             </div>
            </div> 
            
         
           <div class="uk-form-row">
         <label class="uk-form-label" for="field_two"> <?php echo $this->lang->line('mem_pic');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="field_two" id="field_two"  />
           <a href="<?php echo base_url("cp/apimedia"); ?>" id="field_src"
title="Upload link" >  <img src="<?php echo $base?>/img/register.gif"> </a>
             </div>
            </div> 
         
            
     
     
</div>


 <div class="uk-width-1-1">
       <br/>
   <hr class="uk-article-divider">
   <br/>
  <!--<div class="uk-form-row">
         <label class="uk-form-label" for="username"> <?php echo $this->lang->line('mem_username');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="username" id="username"  />
            
             </div>
    </div> -->
            
            
    <div class="uk-form-row">
         <label class="uk-form-label" for="password"> <?php echo $this->lang->line('mem_password');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="password" name="password" id="password"   />
            
             </div>
             <div id="passwordStrengthDiv" class="is0"></div>
             <br/>
  <div style=" display: none; max-width: 300px;border:1px #ccc solid; color: red; font-family:Tahoma " id="rando_text"></div>
            </div>          



      <hr class="uk-article-divider">
        <p align="center">
  <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_adduser" value="y"  data-uk-button><?php echo $this->lang->line('masmail_maillist_btn1');?>     </button>
        
 <hr class="uk-article-divider">
       </p>


 </div>    




 
 
 
 
<!-- -->

</div>







</form>


</div></div></div></div>





















 
<?php
          break;
          
        case "edit":
          ?>
           <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
        <li class="navtitle"><a href="<?php echo base_url('cp/memebers');?>"> <?php echo $this->lang->line('mem_edituser');?> <i class="uk-icon-user"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
         <li><a href="<?php echo base_url('cp/memebers');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('mem_listuser');?>   </a></li>
           <li class="uk-nav-divider"></li>
                                               
            <li><a href="<?php echo base_url('cp/memebers/new');?>" class="dirTemplate"><i class="uk-icon-user"></i>  <?php echo $this->lang->line('mem_newuser');?>   </a> </li>
            <li class="uk-nav-divider"></li>
             <li><a href="<?php echo base_url('cp/memebers/options');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('mem_options');?>   </a> </li>
               <li class="uk-nav-divider"></li>
                                                 
       <li><a href="#members_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
      </div>


  </div>
    
</nav>



</div>

<br/>


<!-- end nav -->





<br/>

<!-- end nav -->
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



 <div id="_page_members" class="container_inner uk-animation-fade"> 
  <?php echo validation_errors(); ?>


       <?php
     if(@$result_edituser=='Edit'){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('options_message');?> </div>
         <?php
     }
     
     ?> 

  <?php
     if(@$result_edituser=='Error_edit'){
       ?>  
       <div class="uk-alert uk-alert-danger font_deafult dirTemplate"> <?php echo $this->lang->line('mem_msg_error');?> </div>
         <?php
     }
     
     ?> 



 <div class="uk-grid" data-uk-grid-margin>   
     
     
      <div class="uk-width-medium-1-1">
             <div class="uk-panel uk-panel-box backcolors dirTemplate">
    

  <form    class="uk-form uk-form-stacked font_deafult" method="post" enctype="multipart/form-data"   >

  <div class="uk-grid">
<!-- -->



 <div class="uk-width-1-2">
     
       <div class="uk-form-row" >
        <label class="uk-form-label" for="country"> <?php echo $this->lang->line('mem_country');?> </label>

  <div class="uk-form-controls ">
  <select class="uk-form-width-medium font_deafult" name="country" id="country" style="font-family:Tahoma;size: 15px;">
      
      <?php
      if(is_array($mem_country)){
          foreach($mem_country as $country){
              if( $country['flag']==$memeber_info['country']){
                  @$selected='selected="selected"';
              } else {
                   @$selected='';
              }
               
      ?>
      
      <?php
      if($TPL_Config == 'A'){    
      ?>
        <option <?php echo @$selected;?> value="<?php echo $country['flag'];?>" > <?php echo $country['arabic'];?></option>
      <?php
      }
      ?>  
       
       <?php
      if($TPL_Config == 'B'){    
      ?>
        <option <?php echo @$selected;?> value="<?php echo $country['flag'];?>" > <?php echo $country['english'];?></option>
      <?php
      }
      ?> 
     <?php
      if($TPL_Config == 'C' || $TPL_Config == 'D' || $TPL_Config == 'E'  || $TPL_Config == 'F'){    
      ?>
        <option <?php echo @$selected;?> value="<?php echo $country['flag'];?>" > <?php echo $country['arabic'] . ' | '.$country['english'];?></option>
      <?php
      }
      ?>    
      
      
      
      
       <?php
          }}
      ?>

 
 </select>
  </div>
  </div>
  
  
  
       <div class="uk-form-row" >
        <label class="uk-form-label" for="gender"> <?php echo $this->lang->line('mem_gender');?> </label>

  <div class="uk-form-controls ">
  <select class="uk-form-width-medium font_deafult" name="gender" id="gender">
  <option value="male" <?php echo ($memeber_info['gender']=='male')? "selected='selected'":'';  ?>> <?php echo $this->lang->line('mem_gender_male');?></option>
  <option value="female" <?php echo ($memeber_info['gender']=='female')? "selected='selected'":'';  ?>> <?php echo $this->lang->line('mem_gender_female');?></option>
 </select>
  </div>
  </div>
  
  
    <div class="uk-form-row" >
        <label class="uk-form-label" for=" roles"> <?php echo $this->lang->line('mem_role');?> </label>

  <div class="uk-form-controls ">
  <select class="uk-form-width-medium font_deafult" name="roles" id="roles">
 <option value="0" <?php echo ($memeber_info['roles']=='0')? "selected='selected'":'';  ?> > <?php echo $this->lang->line('mem_role_user');?></option>
  <option value="1" <?php echo ($memeber_info['roles']=='1')? "selected='selected'":'';  ?> > <?php echo $this->lang->line('mem_role_admin');?></option>
 
 </select>
  </div>
  </div> 
  
  
  
     
     
 </div>





 <div class="uk-width-1-2">
     
      <div class="uk-form-row">
         <label class="uk-form-label" for="fullname"> <?php echo $this->lang->line('mem_name');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="fullname" id="fullname" value="<?php echo $memeber_info['name'];?>"  />
             </div>
            </div>
            
           
            <div class="uk-form-row">
         <label class="uk-form-label" for="email"> <?php echo $this->lang->line('mem_email');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="email" id="email" value="<?php echo $memeber_info['email'];?>"  />
             </div>
            </div> 
            
         
           <div class="uk-form-row">
         <label class="uk-form-label" for="field_two"> <?php echo $this->lang->line('mem_pic');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="field_two" id="field_two" value="<?php echo $memeber_info['pic'];?>"  />
           <a href="<?php echo base_url("cp/apimedia"); ?>" id="field_src"
title="Upload link" >  <img src="<?php echo $base?>/img/register.gif"> </a>
             </div>
            </div> 
         
            
     
     
</div>


 <div class="uk-width-1-1">
       <br/>
   <hr class="uk-article-divider">
   <br/>
 <!--<div class="uk-form-row">
         <label class="uk-form-label" for="username"> <?php echo $this->lang->line('mem_username');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="username" id="username"  />
            
             </div>
    </div> -->
            
            
    <div class="uk-form-row">
         <label class="uk-form-label" for="password"> <?php echo $this->lang->line('mem_password');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="password" name="password" id="password" value="<?php echo $memeber_info['password'];?>" />
            
             </div>
             <div id="passwordStrengthDiv" class="is0"></div>
             <br/>
  <div style=" display: none; max-width: 300px;border:1px #ccc solid; color: red; font-family:Tahoma " id="rando_text"></div>
            </div>          



      <hr class="uk-article-divider">
      
        <p align="center">
  <button  class="uk-button uk-button-success uk-width-1-4 font_deafult"
   type="button" onclick="window.location.href='<?php echo base_url('cp/memebers');?>';"   data-uk-button><?php echo $this->lang->line('masmail_msg_back');?>     </button>
        
 
      
      
      
      
         
  <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_edituser" value="y"  data-uk-button><?php echo $this->lang->line('masmail_maillist_btn1');?>     </button>
        
 <hr class="uk-article-divider">
       </p>


 </div>    




 
 
 
 
<!-- -->

</div>


<?php
$cr_key=base64_encode(serialize($memeber_info));
?>

<input type="hidden" value="<?php echo $cr_key;?>" id="reports" name="reports" />
<input type="hidden" value="<?php echo $memeber_info['ID'];?>" id="c1" name="c1" />
<input type="hidden" value="<?php echo $memeber_info['password'];?>" id="c2" name="c2" />
</form>


</div></div></div></div>











































 
          <?php
          break;    
          
          
        case "options":
         ?>
         
                    <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
        <li class="navtitle"><a href="<?php echo base_url('cp/memebers');?>"> <?php echo $this->lang->line('mem_options');?> <i class="uk-icon-user"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
         <li><a href="<?php echo base_url('cp/memebers');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('mem_listuser');?>   </a></li>
           <li class="uk-nav-divider"></li>
                                               
            <li><a href="<?php echo base_url('cp/memebers/new');?>" class="dirTemplate"><i class="uk-icon-user"></i>  <?php echo $this->lang->line('mem_newuser');?>   </a> </li>
            <li class="uk-nav-divider"></li>
             <li><a href="<?php echo base_url('cp/memebers/options');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('mem_options');?>   </a> </li>
               <li class="uk-nav-divider"></li>
                                                 
       <li><a href="#members_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
      </div>


  </div>
    
</nav>



</div>

<br/>

<!-- end nav -->


         
   <div id="_page_options" class="container_inner uk-animation-fade">  
       
             <?php
     if(@$members_options==true){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('options_message');?> </div>
         <?php
     }
     
     ?> 
       
       
       <div class="uk-grid" data-uk-grid-margin>    
       
 <div class="uk-width-medium-1-1">
  <div class="uk-panel uk-panel-box backcolors dirTemplate">
                 
<form class="uk-form uk-form-stacked font_deafult" method="post"   >
         
          <div class="uk-grid">
             
             <div class="uk-width-1-2"> 
                 
              <div class="uk-form-row">
         <label class="uk-form-label" for="iuser_avatar">   <?php echo $this->lang->line('mem_option_avatar');?>  </label>
         <div class="uk-form-controls">
         <input type="checkbox" id="iuser_avatar" name="iuser_avatar" value="On"  <?php echo ($memeber_options['iuser_avatar']=='On')? "checked='checked'":'';  ?>  /> 
          </div>
            </div>    
             
               <div class="uk-form-row">
         <label class="uk-form-label" for="iuser_reg">   <?php echo $this->lang->line('mem_option_reg');?>  </label>
         <div class="uk-form-controls">
         <input type="checkbox" id="iuser_reg" name="iuser_reg" value="On"  <?php echo ($memeber_options['iuser_reg']=='On')? "checked='checked'":'';  ?>  /> 
          </div>
            </div>       
                 
                 
             </div>    
             
             
             
             
             
         <div class="uk-width-1-2"> 
                 <div class="uk-form-row" >
  <label class="uk-form-label" for=" iuser_active"> <?php echo $this->lang->line('mem_option_activeuser');?> </label>

  <div class="uk-form-controls ">
  <select class="uk-form-width-medium font_deafult" name="iuser_active" id="roles">
 <option value="auto" <?php echo (@$memeber_options['iuser_active']=='auto')? "selected='selected'":'';  ?> > <?php echo $this->lang->line('mem_option_activeby_auto');?></option>
  <option value="admin" <?php echo (@$memeber_options['iuser_active']=='admin')? "selected='selected'":'';  ?> > <?php echo $this->lang->line('mem_option_activeby_admin');?></option>
   <option value="email" <?php echo (@$memeber_options['iuser_active']=='email')? "selected='selected'":'';  ?> > <?php echo $this->lang->line('mem_option_activeby_email');?></option>

 </select>
  </div>
  </div> 
         
  
       <div class="uk-form-row">
         <label class="uk-form-label" for="iuser_notification">   <?php echo $this->lang->line('mem_option_notifications');?>  </label>
         <div class="uk-form-controls">
         <input type="checkbox" id="iuser_notification" name="iuser_notification" value="On"  <?php echo ($memeber_options['iuser_notification']=='On')? "checked='checked'":'';  ?>  /> 
          </div>
            </div>       
         
             
             
          </div>
          
 
  <div class="uk-width-1-1">          
 <hr class="uk-article-divider">
 <p align="center">
 <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_updatememberOptions" value="y"  data-uk-button><?php echo $this->lang->line('masmail_maillist_btn1');?>     </button>
        
 <hr class="uk-article-divider">
       </p>   
   </div>       
          
          
          </div>
          
          
 </form>
       
       
   </div>
   </div>
   </div>
   </div>
   </div>



<?php
break;    
          
          
      default:
          ?>  
          
         <!-- begin nav --> 
         <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
        <li class="navtitle"><a href="<?php echo base_url('cp/memebers');?>"> <?php echo $this->lang->line('mem_title');?> <i class="uk-icon-user"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
         <li><a href="<?php echo base_url('cp/memebers');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('mem_listuser');?>   </a></li>
           <li class="uk-nav-divider"></li>
                                               
            <li><a href="<?php echo base_url('cp/memebers/new');?>" class="dirTemplate"><i class="uk-icon-user"></i>  <?php echo $this->lang->line('mem_newuser');?>   </a> </li>
            <li class="uk-nav-divider"></li>
             <li><a href="<?php echo base_url('cp/memebers/options');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('mem_options');?>   </a> </li>
               <li class="uk-nav-divider"></li>
                                                 
       <li><a href="#members_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
      </div>


  </div>
    
</nav>



</div>

<br/>

<!-- end nav -->
 

   <div id="_page_members" class="container_inner uk-animation-fade"> 


 <div class="uk-grid" data-uk-grid-margin>   
     
     
      <div class="uk-width-medium-1-1">
             <div class="uk-panel uk-panel-box backcolors dirTemplate">
      <h3 class="uk-panel-title font_deafult">  <?php echo $this->lang->line('mem_listuser');?> ( <?php echo @$Total_memebers; ?> ) </h3>
 <hr class="uk-article-divider">
<!-- -->
     
     
    
<div id="content-table" style="background-color: #fff">
    <form method="post">
 <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed uk-text-center">
   <!-- -->  
     
              <thead class="uk-text-center">
              <tr class="classTableHeader font_deafult">
                  <th class="uk-text-center"><?php echo $this->lang->line('mem_pic');?></th>
                 <th class="uk-text-center"><?php echo $this->lang->line('mem_name');?></th>
           <th class="uk-text-center"><?php echo $this->lang->line('mem_email');?></th>
          <th class="uk-text-center"><?php echo $this->lang->line('mem_status_acount');?></th>
           <th class="uk-text-center"><?php echo $this->lang->line('mem_viewinfo');?></th>
          <th class="uk-text-center"><?php echo $this->lang->line('mem_datereg');?></th>
           <th class="uk-text-center"><input type="checkbox"   id="r1" name="r1"></th>
                                            
                                              
                                    </tr>
                                </thead>
     
     
     
     
       <tbody >
                                    <?php
                                    if(is_array($Rows_memebers)){
                                        $api = $this->load->library('apiservices');
                                     
                                    foreach($Rows_memebers as $V_record){
                                      
                                    ?>
                                    <tr class=" uk-text-center font_deafult">
                                        
 <td class="uk-text-center" style="font-family:Tahoma">
    
    <?php
     if($V_record['pic'] !='' || $V_record['pic']!=0 ){
        $imgs=base_url($V_record['pic']);
        
    } else {
        if($api->getAvatar($V_record['email'])!=''){
            
            $imgs=$api->getAvatar($V_record['email']);
            
        } else {
            $imgs=base_url('html/application/modules/cp/views/themes/Default/img/noimg.png');
            
        }
        
    }?>
    
    
    
     <img   class="lazy circular "  data-original="<?php echo $imgs;?>">
     
 </td> 
 
 
 <td class="uk-text-center" ><?php echo mb_substr($V_record['name'],0,20);?></td>                              
 <td class="uk-text-center" style="font-family:Tahoma"><?php echo $V_record['email'];?></td>
 <td class="uk-text-center" style="font-family:Tahoma">
     <?php
     if($V_record['active']=='on'){
       ?>
        
       <img src="<?php echo $base?>/img/jv7f81.gif" title="<?php echo $this->lang->line('mem_on');?>">
       <?php  
         
     } else {
         ?>
          <img src="<?php echo $base?>/img/gydsvt.gif" title="<?php echo $this->lang->line('mem_off');?>">
         <?php
     }
     ?>
      
     
     
 </td>
 
 
 <td class="uk-text-center" ><a  href="<?php echo base_url('cp/memebers/edit/'.$V_record['ID']);?>">   <i class="uk-icon-edit"></i></a></td>
 <td class="uk-text-center" style="font-family:Tahoma"><i class="uk-icon-clock-o"></i> <?php echo $V_record['date_reg'];?></td>
<td class="uk-text-center"><input type="checkbox" id="del[]"  name="del[]" value="<?php echo $V_record['ID'];?>" /></td>                               
</tr>                                                                      
 <?php
  }
  }
 ?>
 </tbody>
     
     
   


 <tfoot>
                                    
<tr>
<td colspan="7" >
                                            
<button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_delmembers" value="y"  data-uk-button><?php echo $this->lang->line('mem_btn_delete');?></button>
   

<button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_activemembers" value="y"  data-uk-button><?php echo $this->lang->line('mem_active');?></button>
     
     
     
 <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_deactivemembers" value="y"  data-uk-button><?php echo $this->lang->line('mem_btn_dactive');?></button>
            
   
   
             
</td>
</tr>
</tfoot>     
     
     
     
     
      
     
     
    <!-- --> 
 </table></form>
    <?php
     echo @$Paging_memebers;
     ?>
 
 </div>    
     
     <?php
     echo br(10);
     ?>
     
   <!-- -->  
    </div></div> 
</div>    
</div>

<?php        
  }
?>

  <!--api documentions -->
<div id="members_help" class="uk-modal font_deafult">
  <div class="uk-modal-dialog">
 <a href="" class="uk-modal-close uk-close"></a>
 <h1 class="dirTemplate"><img src="<?php echo $base; ?>/img/22.png"/> &nbsp; <div class="uk-badge uk-badge-notification">API Documentation</div>   &nbsp; </h1>
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
  </div>
  </div>
   



      