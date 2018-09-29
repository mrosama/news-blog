<meta charset="utf-8" />
  <?php
$api = $this -> load -> library('apiservices');
$api -> CP_Auth(1, true, 'No direct script access allowed');
$TPL_Config = $this -> config -> item('Template_Type');

$base = base_url($this -> config -> item('template_path'));
@$session_language = @$this->session->userdata('cplang');  
 @$session_style = @$this->session->userdata('cpstyle');  
 @$this -> load -> model('post_model');
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

<script type="text/javascript">
   
   function validate1(myform){
 
 var img=new RegExp("(.+)\\.(JPEG|JPG|PNG|GIF)","i");
      
      if(myform.title.value==''){
          alert("<?php echo $this->lang->line('posts_validate_title'); ?>");
          return false;
      }
      
      else if(myform.author.value==''){
           alert("<?php echo $this->lang->line('posts_validate_authur'); ?>");
          return false;
          
      }
   else if(myform.cat.value=='0'){
           alert("<?php echo $this->lang->line('posts_validate_cat'); ?>");
          return false;
          
      }
      
      

      
      
      else {
          
          // add array
           
          var tags=tagArr.join(',');
           var taghid=document.getElementById('taghid');
           taghid.value=tags;
      
          return true;
      }
      
       
   }
/////////////////////////////////////////////////


var tag_selected;
var tagArr=Array();
function addTag(){
      
 var tag=document.getElementById('tags_area').value;   
  
 var tag_selected=document.getElementById('tag_selected');
 /*if(taghid.value!=''){
     var tag= document.getElementById('tags_area').value=taghid.value;
 } */
 
 var s1;
  var tag=tag.replace(/,$/,"");
  tag=tag.replace(/^,/,"");
     // var str2=str.replace(/,$/,"");
     
 // alert(tag);
   
 if(tag.length > 0){
   var str=tag.split(',');

   for(var i=0 ;i<str.length;i++){
     
      //generate id
      var mdate = new Date();
       var n = mdate.getMilliseconds();
       var id =i + n + 1 + Math.floor(Math.random() * 1000);
       
       if(str[i].length!=0){
           if(findinArray(str[i])==false){
               continue;
           }
       //
       tagArr.push(str[i]);
      s1="<span class='borddiv' id='tgs_"+ id +"'> &nbsp;<a onclick=removeTag('tgs_"+ id +"','"+str[i]+ "'); href='javascript:void(0)'><i class='imgdelete'></a></i>&nbsp;"+str[i]+ " </span>";
      // s1=sprintf("<span id=tg1_%d> %s <i class='imgdelete'></i></span>",i,str[i]);
       tag_selected.innerHTML+=s1 +'  &nbsp;&nbsp;';
       
       
       }
       
       
   }
   
 }
 //   alert(tag);
  
  //empty
  document.getElementById('tags_area').value=null;   
    // alert(tagArr.length);
   // console.warn(tagArr.length);
  return false;  
}
//////////////////////
function addTag2(val){
      
 var tag=val;   
  
 var tag_selected=document.getElementById('tag_selected');
 /*if(taghid.value!=''){
     var tag= document.getElementById('tags_area').value=taghid.value;
 } */
 
 var s1;
  var tag=tag.replace(/,$/,"");
  tag=tag.replace(/^,/,"");
     // var str2=str.replace(/,$/,"");
     
 // alert(tag);
   
 if(tag.length > 0){
   var str=tag.split(',');

   for(var i=0 ;i<str.length;i++){
     
      //generate id
      var mdate = new Date();
       var n = mdate.getMilliseconds();
       var id =i + n + 1 + Math.floor(Math.random() * 1000);
       
       if(str[i].length!=0){
           if(findinArray(str[i])==false){
               continue;
           }
       //
       tagArr.push(str[i]);
      s1="<span class='borddiv' id='tgs_"+ id +"'> &nbsp;<a onclick=removeTag('tgs_"+ id +"','"+str[i]+ "'); href='javascript:void(0)'><i class='imgdelete'></a></i>&nbsp;"+str[i]+ " </span>";
      // s1=sprintf("<span id=tg1_%d> %s <i class='imgdelete'></i></span>",i,str[i]);
       tag_selected.innerHTML+=s1 +'  &nbsp;&nbsp;';
       
       
       }
       
       
   }
   
 }
 //   alert(tag);
  
  //empty
 // document.getElementById('tags_area').value=null;   
    // alert(tagArr.length);
   // console.warn(tagArr.length);
  return false;  
}


////

function removeItem(array, item){
    for(var i in array){
        if(array[i]==item){
            array.splice(i,1);
            break;
            }
    }
}


function removeTag(id,val){
    var tg=document.getElementById(id).style.display='none';
    removeItem(tagArr,val);
    console.warn(id + val);
    
    
    
}


function findinArray(val){
  /*  
    for(var i=0;i<tagArr.length;i++){
        if(tagArr[i]==val){
            return false;
            
        } else {
            return true;
        }
        
    }
    */
    
    
   var a = tagArr.indexOf(val);  
    if(a != -1){
        return false;
    } else {
        return true;
    }
    
}

</script>


  <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle" >
    <ul class="uk-navbar-nav tm-navbar navtitle"  >
        <li class="navtitle"  ><a href="<?php echo base_url('post/admin/index'); ?>"> <?php echo $this -> lang -> line('posts_add'); ?> <i class="uk-icon-laptop"></i></a></li>
        
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




<div id="_page_post" class="container_inner uk-animation-fade"> 
    
    
    
       
      <?php
     if(@$result_add=='ADD'){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('posts_msgadd');?> </div>
         <?php
     }
     
     ?> 

 
    
    
    
    
    
    
    
    
   <div class="uk-grid" data-uk-grid-margin>   
<div class="uk-width-medium-1-1">
<div class="uk-panel uk-panel-box backcolors dirTemplate">
<form    class="uk-form uk-form-stacked font_deafult" method="post" enctype="multipart/form-data"   >

<div class="uk-grid">
    
     <div class="uk-width-1-2">
     <!-- -->  
     
            
         
      <div class="uk-form-row">
         <label class="uk-form-label" for="field_one"> <?php echo $this->lang->line('posts_pic');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large font_deafult" type="text" name="field_one" id="field_one" placeholder="" >
            <a href="<?php echo base_url("cp/apimedia"); ?>" id="field_src"
title="Upload link" >
          <img src="<?php echo $base?>/img/register.gif"> </a>
          
             </div>
            </div>

<input type="hidden" name="field_two" id="field_two" value="" />

        <div class="uk-form-row">
         <label class="uk-form-label" for="title_pic"> <?php echo $this->lang->line('posts_picstitle');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large font_deafult" type="text" name="title_pic" id="title_pic" placeholder="" >
             </div>
            </div>

       
          <div class="uk-form-row">
         <label class="uk-form-label" for="cat"> <?php echo $this->lang->line('posts_cat');?> </label>
         <?php
         echo @$cat;
         ?>
         </div>
           

             
      <div class="uk-form-row">
         <label class="uk-form-label" for="author"> <?php echo $this->lang->line('posts_author');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-mediam font_deafult" type="text" name="author" id="author" value="<?php echo @$this->session->userdata('IUser_name'); ?>" >
             </div>
            </div>             



  
  <div class="uk-form-row">
         <label class="uk-form-label" for="tags_area"> <?php echo $this->lang->line('posts_tag');?> </label>
         <div class="uk-form-controls">
              <span class="uk-text-danger">( , )<?php echo $this->lang->line('posts_hint');?></span>
              <br/>
          <input class="uk-form-width-mediam font_deafult" style="font-family: Tahoma; font-size: 14px" type="text" name="tags_area" id="tags_area" placeholder="" >
          <a class="uk-button uk-button-danger"  onclick="addTag();" href="javascript:void(0);"><i class="uk-icon-plus"></i><?php echo $this->lang->line('posts_addtags');?></a>
            </div>
            <div class="uk-text-danger" style="max-width:450px;
    word-wrap:break-word; font-family: Tahoma; font-size: 14px" id="tag_selected" >&nbsp;</div>
             <a href="javascript:void(0)" id="tagschoose"><?php echo $this->lang->line('posts_choosetag');?></a>
            </div>
  <div id="toptags" style="display: none;max-width:450px;word-wrap:break-word;">
      <br/>
      <?php
      echo @$top_tag;
      ?>
      </div>
  
  
            
     <!-- -->  
     </div>
     
     
     
     
     
     
    
     <div class="uk-width-1-2">
     <!-- -->  
     
      <div class="uk-form-row">
         <label class="uk-form-label" for="title"> <?php echo $this->lang->line('posts_name');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large font_deafult" type="text" name="title" id="title" placeholder="" >
             </div>
            </div>
           
            <?php  if($TPL_Config =='E' || $TPL_Config =='F'){
 // if($TPL_Config != 'A' && $TPL_Config!='B'){
  ?>     
           <div class="uk-form-row">
         <label class="uk-form-label" for="title_en"> <?php echo $this->lang->line('posts_name_en');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large font_deafult" type="text" name="title_en" id="title_en" placeholder="" >
             </div>
            </div>
           <?php
            }
           ?>
           
           
        <?php
        $api ->Editor($this -> config -> item('Token_access_key'),'_editor', $lang = 'ar');
        ?>   
           
     <div class="uk-form-row">
 <label class="uk-form-label" for="content" ><?php echo $this->lang->line('posts_content');?></label>
  <div class="uk-form-controls">
 <textarea class="_editor" id="content" name="content" cols="70" rows="4" placeholder=""></textarea>
  </div>
  <span class="uk-text-danger"><small><?php echo $this->lang->line('posts_fullscreen');?></small></span>
 </div>
      
    <?php  if($TPL_Config =='E' || $TPL_Config =='F'){
 // if($TPL_Config != 'A' && $TPL_Config!='B'){
  ?>    
   <?php
        $api ->Editor($this -> config -> item('Token_access_key'),'_editor', $lang = 'ar');
        ?>  
      <div class="uk-form-row">
 <label class="uk-form-label" for="content_en" ><?php echo $this->lang->line('posts_content_en');?></label>
  <div class="uk-form-controls">
 <textarea id="content_en" class="_editor" name="content_en" cols="70" rows="4" placeholder=""></textarea>
  </div>
  <span class="uk-text-danger"><small><?php echo $this->lang->line('posts_fullscreen');?></small></span>
 </div>   
 <?php
 }
 ?>      
         
       
      

     <!-- -->  
     </div>
    
    <div class="uk-width-1-1">
        <p align="center">
         <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_addpost" value="y" onclick="return validate1(this.form);"   ><?php echo $this -> lang -> line('posts_save'); ?></button>
   </p>
       </div> 
    
    
    
    </div>
    <input type="hidden" name="taghid" id="taghid" value="">
 </form></div></div></div>   
   
   
    
    
</div>    



<?php
echo br(10);
?>




