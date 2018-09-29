<meta charset="utf-8" />

<?php
$TPL_Config = $this -> config -> item('Template_Type');
@$session_language = @$this->session->userdata('Plang');  
@$session_style = @$this->session->userdata('Pstyle');  

$baseImg=base_url('assets/images');
$api=$this -> load -> library('apiservices');
  
 if($TPL_Config =='E' || $TPL_Config =='F'){
          
          switch($session_style){
              case 'ar':
                  $case= "ar";            
              break;             
               case 'en':
                    $case='en';                     
              break;                  
               default:
                  $case='ar';                                
          }          
       } else {
             $case='ar';
        
       }
 
             
 
 $api = $this -> load -> library('apiservices');
$params=@$recordset['cat'];
if($case=='ar'){
     $Crumb_link=@$api->get_breadcrumbs($params,'post');
} else {
    $Crumb_link=@$api->get_breadcrumbs2($params,'post'); 
}
$this->load->model('Articles_model');
?>


<script type="text/javascript">
 <script type="text/javascript">
  $(document).ready(function() {
    $("#bookmarkme").click(function() {
      if (window.sidebar) { // Mozilla Firefox Bookmark
        window.sidebar.addPanel(location.href,document.title,"");
      } else if(window.external) { // IE Favorite
        window.external.AddFavorite(location.href,document.title); }
      else if(window.opera && window.print) { // Opera Hotlist
        this.title=document.title;
        return true;
  }
});
</script>




<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/breadcrumb/css/global.css');?>" />
 

    <div id="breadcrumb2">
            <ul class="crumbs2">
                
               <?php
               if(is_array($Crumb_link) && count($Crumb_link)!=0){
                   for($k=0;$k <= count($Crumb_link);$k++){
                       $Crumb_val=@explode('-', @$Crumb_link[$k]);
                      //  echo $Crumb_val[0];
                      if($Crumb_val[0]=='') continue;
                   //    print_r($Crumb_val);
                     ?>
               <li class="first"><a  class="mytext" href="<?php echo base_url('post/category/'.@$Crumb_val[1]);?>"><?php  echo @$Crumb_val[0];?></a></li>

                     <?php
                   }
               }
               
               ?>
                <li class="first"><a  class="mytext" href="<?php echo base_url('post/category');?>"><?php echo $this->lang->line('article_title');?></a></li>
                  
                <li class="last"><a class="mytext" href="<?php echo base_url();?>"><?php echo $this->lang->line('app_home');?></a></li>            
            </ul>
        </div>
            <div class="space"></div>










            <div class="puertoLftCnt article">
                <div style="border-bottom:1px solid #eee;"><a href="#">
                    <h1>
                        <?php
                        if($case =='ar'){
                            echo @mb_substr($recordset['title'], 0,100);
                        } else {
                              echo @mb_substr($recordset['title_en'], 0,100);
                        }
                        ?>
                         
                        </h1></a></div>
                <div class="artInfo">
                    <span class="artIcon"><img src="<?php echo $baseImg;?>/user.png" /></span>
                    <span><?php echo $recordset['author'];?></span>
                    <span class="artIcon"><img src="<?php echo $baseImg;?>/comments.png" /></span>
                    <span><?php echo @$number_comments;?> <?php echo $this->lang->line('article_comnum');?></span>
                    <span class="artIcon"><img src="<?php echo $baseImg;?>/users.png" /></span>
                    <span><?php echo @$recordset['visitor'];?> <?php echo $this->lang->line('article_show');?></span>
                    <span class="artIcon"><img src="<?php echo $baseImg;?>/calendar.png" /></span>
                    <span> <?php
                    $ti=strtotime($recordset['dat']);
                       if($case =='ar'){
                         echo $api->timeFormatAR($ti);   
                        } else {
                           echo $api->timeFormatEN($ti);     
                        }
                        ?></span>
                    <div class="clr"></div>
                </div>
                <div class="img">
                  
                    <?php
                    if(@$recordset['pic']!=''){
                      if($api->Check_Url(@$recordset['pic'])){
                          ?>
                   <img  class="lazy" src="<?php echo base_url('assets/images/blank.gif');?>"  data-original="<?php echo @$recordset['pic'];?>" width="620" height="150" />
                   <?php       
                      } else {
                          ?>
                         <img  class="lazy" src="<?php echo base_url('assets/images/blank.gif');?>"  data-original="<?php echo base_url($recordset['pic']);?>" width="620" height="150" />  
                          <?php
                          
                      } 
                        
                    } 
                    ?>
                    
                    </div>
                <p> 
                     <?php
                        if($case =='ar'){
                            echo @$recordset['content'];
                        } else {
                             echo @$recordset['content_en'];
                        }
                        ?>
                    
                     </p>
                     <p>
                         <!-- code addthis-->
<!-- AddThis Button BEGIN -->
<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4d0fb8a16f822e50"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4d0fb8a16f822e50"></script>
<!-- AddThis Button END -->
<!-- end-->
                         
                     </p>
                     
        <p align="left" >
            <ul id="pp_options">
                <li>
   <!--                 
 <a id="bookmarkme" href="javascript:void(0)" rel="sidebar" title="<?php echo @$recordset['title'];?>"><img src="<?php echo base_url("assets/images/14.png");?>"></a>                   
       -->              
                     </li>
               <li>
                   
                     <?php

$atts1 = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 
echo anchor_popup("post/printpdf/$recordset[ID]",img(array("src"=>base_url("assets/images/pdf_button.png"),"border"=>0)), $atts1);

?>            
     
               </li>
                 <li>
                     <?php

$atts1 = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 
echo anchor_popup("post/printdoc/$recordset[ID]",img(array("src"=>base_url("assets/images/print1.gif"),"border"=>0)), $atts1);

?>
                    
                     
                 </li>
            </ul>
      </p>         
            
        </p> 
        

        
        </div>
        
<!-- -->

<script type="text/javascript">
function validate_comment(myform){
 var pattern1=new RegExp("^([-a-z0-9_]+(\.[_a-z0-9-]+)*@([a-z0-9-]+(\.[a-z0-9-]+)+))$","i");
 
 if(myform.comment_name.value==""){
 alert(" <?php echo $this->lang->line('article_misname');?>   ");
 return false;
 }
 else if(pattern1.test(myform.comment_email.value)==false){
  alert(" <?php echo $this->lang->line('article_misemail');?>  ");
  return false;
 }
 
 else {
 return true;
 }
 
 }
 
</script>


   <div class="puertoLftCnt article">
                <div style="border-bottom:1px solid #eee;"><a href="#">
                    <h1> <?php echo $this->lang->line('article_comments');?> </h1></a></div>      
        
        <div id="fbcomments"></div>
        
      <?php
      switch(@$comment_result){
          case 'ErrorName':
                ?>
                      <div class="alert-message-danger"><?php echo $this->lang->line('article_misname');?></div>
                      <?php
              
              break;
                  case 'ErrorEmail':
                      ?>
                      <div class="alert-message-danger"><?php echo $this->lang->line('article_misemail');?></div>
                      <?php
              break;
                  case 'ErrorCode':
                      
                       ?>
                       <div class="alert-message-danger"><?php echo $this->lang->line('article_errorcode');?></div>
                      <?php
              break;
                  case 'add':
                       ?>
                       <div class="alert-message-success"><?php echo $this->lang->line('article_addcomments');?></div>
                      <?php
              break;
          default;
          
      }
      ?>  
        
        
        <div id="comments">
            <table dir="ltr" align="center" id="tablecomment" width="100%" cellpadding="0" cellspacing="5" style="border:1px #CCCCCC solid">
<form method="post" name="form_comments">
<tr><td align="right"><input type="text" size="30" class="text_field" name="comment_name" required="required"></td><td> <?php echo $this->lang->line('article_name');?> </td></tr>
<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td>
<tr><td align="right"><input type="text" size="30" class="text_field" name="comment_email" required="required"></td><td>   <?php echo $this->lang->line('article_email');?> </td></tr>
<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td>
<tr><td></td><td> <?php echo $this->lang->line('article_msg');?> </td></tr>
<tr><td colspan="2" align="center"><textarea cols="70"  style="width:80%" rows="5" name="comment_msg" required="required"></textarea></td> </tr>

<tr><td align="right">
<img src="<?php echo  base_url('assets/lib/reCaptcha/verfiy.php');?>">

<input type="text" name="code" size="10" class="text_field" /></td><td  class="blocks"> <?php echo $this->lang->line('article_code');?>   </td></tr>

<tr><td colspan="2" align="center"><input type="submit" value="  <?php echo $this->lang->line('article_send');?>  " class="mybutton" onclick="return validate_comment(this.form);"></td>
<input type="hidden" value="addComment" name="IsPost">
<input type="hidden" value="<?php echo $recordset['ID'];?>" name="v" />
</form>
</table>
        
            </div>        
            
            
     <!-- -->       
 <style type="text/css">
 .contents_comments
{padding-top:3px;padding-bottom:4px;padding-right:0px; 
padding-left:0px;margin-bottom:8px;
 -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  border: 1px solid #CCCCCC;

}
 .title_comments{ 
color:#777; background:#F4F4F4; 
font-weight:bold; font-size:14px;font-family:arial; padding-top:4px; padding-bottom:4px;
border-top:1px solid #CCCCCC; padding-right:10px;
}

.date_comments{ color:#777;font-family:arial; font-size:12px; margin-top:5px; margin-bottom:2px;
padding-right:10px; padding-left:9px;}



.text_comments{ color:#777;font-family:tahoma; 
font-size:11px; text-align:right; margin-bottom:5px; padding-right:10px; line-height:16px;}
.text_comments a{ text-decoration:none; color:#777; font-size:10px;font-family:arial; margin-right:4px;}
 .text_comments span{ color:#FF0000;}

 #links_links{padding-right:10px;}
 #links_comments a{font-size:12px;font-family:arial; text-decoration:none; color:#17653B;}
#links_comments span{color:#FF0000; vertical-align:bottom;}
.contents_links_comments{margin-top:6px; border-bottom:1px dotted #E3E0C0; padding-bottom:4px;}
</style>  
<br/>  <br/>         
      <?php
if(is_array($comments)){
foreach($comments as $rocom){
?>

<div class="contents_comments">
<div class="icons"><table cellpadding="4px"><tbody><tr>
    <td height="15px"> </td>
</tr></tbody></table></div>
 <div class="title_comments" align="right" dir="ltr"><i style="float:right"></i><?php echo $rocom['name'];?>&nbsp;&nbsp;<?php echo img("$baseImg/users.png");?></div>
 <div class="date_comments" dir="rtl" align="left"> <?php echo img("$baseImg/calendar.png");?>&nbsp;&nbsp;<?php echo $rocom['dat'];?></div>
<div class="text_comments">

<?php echo nl2br($rocom['comment']);?>
 </div>

</div>


<?php
}
}
?>      
            
            
                   
 </div>
            
<script src="<?php echo base_url('assets/lib/lazyload/jquery.lazyload.min.js');?>"></script>

<script>
$("img.lazy").lazyload({
    // container: $("#container_im")
    effect : "fadeIn"
});
</script>



<script type="text/javascript">
    $(document).ready(function() {
        $(this).attr("title", "<?php echo $recordset['title'];?>");
    });
</script>
