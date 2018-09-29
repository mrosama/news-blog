<meta charset="utf-8" />
  <?php
$api = $this -> load -> library('apiservices');
$api -> CP_Auth(1, true, 'No direct script access allowed');
$TPL_Config = $this -> config -> item('Template_Type');
$base = base_url($this -> config -> item('template_path'));
@$session_language = @$this->session->userdata('cplang');  
 @$session_style = @$this->session->userdata('cpstyle');  
 $this -> load -> model('video_model');
?>

     
 <script>   
function validate_8(myform){

var allunchecked = false;

for(var i=0;i<20;i++){
if (myform.elements['opt' +i].checked) 
{
allunchecked = true;
 break;
}
} 


if(allunchecked==false){
alert("<?php echo $this -> lang -> line('video_error1'); ?>");
return false;
}

else if(myform.cat.value=="0"){
alert("<?php echo $this -> lang -> line('video_error2'); ?>");
return false;
}

else {
 
return true;
}




}   
    
    </script>


  <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle" >
    <ul class="uk-navbar-nav tm-navbar navtitle"  >
        <li class="navtitle"  ><a style="font-family:Tahoma" href="<?php echo base_url('video/admin/index'); ?>">&nbsp; YouTube &nbsp;<i class="uk-icon-youtube"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this -> lang -> line('visitor_select_title'); ?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
           <li><a href="<?php echo base_url('video/admin/index'); ?>" class="dirTemplate"><i class="uk-icon-bar-video-camera"></i> <?php echo $this -> lang -> line('video_title'); ?>   </a></li>
           <li class="uk-nav-divider"></li>
            <li><a href="<?php echo base_url('video/admin/add'); ?>" class="dirTemplate" ><i class="uk-icon-plus"></i>  <?php echo $this -> lang -> line('video_add'); ?>   </a> </li>
            <li class="uk-nav-divider"></li>
             
               <li><a href="<?php echo base_url('video/admin/youtube'); ?>" class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-youtube"></i>  YouTube   </a> </li>
            <li class="uk-nav-divider"></li>
            
              <li><a href="<?php echo base_url('video/admin/comment'); ?>" class="dirTemplate"><i class="uk-icon-comment"></i>  <?php echo $this -> lang -> line('video_comments'); ?>   </a> </li>
            <li class="uk-nav-divider"></li>
     
    


 </ul>
  </div>
 </div>
      </div>
  </div>
</nav>
</div>
<br/>



<div id="_page_video" class="container_inner uk-animation-fade"> 
    <?php
     if(@$result_m=='add'){
         ?>
   <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('video_msgadd');?> </div>       
         <?php
     }
    
    ?>
    
    <div class="uk-grid" data-uk-grid-margin>   
<div class="uk-width-medium-1-1">
<div class="uk-panel uk-panel-box backcolors dirTemplate">
<form    class="uk-form uk-form-stacked font_deafult" method="post" enctype="multipart/form-data"   >
    
    <div class="uk-grid">
   
   
    <div class="uk-width-1-1">
        
             <div class="uk-article-divider">
                <?php echo $this->lang->line('video_serach_title');?></a>
                 <hr class="uk-article-divider">
            </div>
             </div>
             <div class="uk-width-1-1">
                 
                    <div class="uk-form-row">
         
         <div class="uk-form-controls">
     <input class="uk-form-width-large font_deafult" type="text" name="search"  id="search"  >
     
       <button  class="uk-button uk-button-success uk-width-1-5 font_deafult"
   type="submit" name="IsPost_youtype" value="y"  data-uk-button><?php echo $this -> lang -> line('video_btn_search'); ?></button>
     
     
             </div>
            </div> 
      </div>    
  </div>
    
 </form>
  <hr class="uk-article-divider">
 
 
 <div id="content-table" style="background-color: #fff">
    
  <form  name='form_youtube'   class="uk-form uk-form-stacked font_deafult" method="post"    >
  
<?php
if($this->input->post('IsPost_youtype')=="y"){
if( count(@$youtube_list['title'])!=0 ){
 

?>
<table class="uk-table uk-table-hover uk-table-striped uk-table-condensed uk-text-center">
 
   
      <tbody>
 <?php
 $j=0;
  for($i=0;$i<count(@$youtube_list['title']);$i++){
 ?>
 <tr>
 <td align="right" valign="bottom" width="40%">
 <input type="checkbox" value="<?php echo $youtube_list['title'][$i];?>#<?php echo $youtube_list['thumbnail'][$i];?>#<?php echo $youtube_list['url'][$i];?>" name="ck[]"  id="opt<?php echo $j;?>"/></td><td align="right"><?php echo $youtube_list['title'][$i];?></td><td><img src="<?php echo $youtube_list['thumbnail'][$i];?>"> </td>
</tr>
 
 
 <?php
 $j++;
 }
 ?>
 
 </tbody>
 
 
 
 
 
 
</table>



 <tfoot>

<tr><th colspan="6"><?php echo @$cat;?>
<input type="hidden" value="add" name="youtube">
 <input type="submit"  class="uk-button uk-button-danger uk-width-1-4"   value="  <?php echo $this->lang->line('video_movetovideo');?>"    onclick="return validate_8(this.form);"/> </th>


</tfoot>


<?php
} }
 
?>
 



<?php
echo br(10);
?>

</form></div> 
 
 
 
 
 </div></div></div>   
    
    
    
</div>    



















