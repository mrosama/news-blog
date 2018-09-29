<meta charset="utf-8" />
  <?php
$api = $this -> load -> library('apiservices');
$api->CP_Auth(1,true,'No direct script access allowed');
$TPL_Config = $this -> config -> item('Template_Type');
$base = base_url($this ->config ->item('template_path'));
 $seg = $this -> uri -> segment(4); 
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
  
 
    <script>  
function validate5(myform){
 

if(myform.ads_name.value==""){
alert("<?php echo $this->lang->line('ads_mis_name')?>");
return false;
}

 
 

  if(myform.field_one.value =="" && myform.ads_code.value == ""){
 alert(" <?php echo $this->lang->line('ads_mis_codefile')?> ");
    return false;
 }


 if(myform.field_one.value!="" && myform.ads_code.value!=""){
 alert(" <?php echo $this->lang->line('ads_mis_codefile')?> ");
    return false;
 }
 
 
return true;

}

 </script>
 
<?php
 switch($seg) {
        
      case "addnew":
          ?>
          <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle" >
    <ul class="uk-navbar-nav tm-navbar navtitle"  >
        <li class="navtitle"  ><a href="<?php echo base_url('ads/admin/index/addnew');?>"> <?php echo $this->lang->line('ads_new');?> <i class="uk-icon-bookmark"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
           <li><a href="<?php echo base_url('ads/admin/index');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('ads_list');?>   </a></li>
           <li class="uk-nav-divider"></li>
            <li><a href="<?php echo base_url('ads/admin/index/addnew');?>" class="dirTemplate"><i class="uk-icon-bookmark"></i>  <?php echo $this->lang->line('ads_new');?>   </a> </li>
            <li class="uk-nav-divider"></li>
             
       <li><a href="#ads_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
      </div>


  </div>
    
</nav>



</div>

<br/>

<div id="_page_ads" class="container_inner uk-animation-fade"> 
    
      <?php
     if(@$result_ads=='add'){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('ads_msg_add');?> </div>
         <?php
     }
     
     ?> 

  <?php
     if(@$result_ads=='found'){
       ?>  
       <div class="uk-alert uk-alert-danger font_deafult dirTemplate"> <?php echo $this->lang->line('ads_msg_error');?> </div>
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
       <label class="uk-form-label" for="to"> <?php echo $this->lang->line('ads_file');?> </label>
         <div class="uk-form-controls">
         <input class="uk-form-width-large font_deafult" type="text" name="field_one" id="field_one" 
         />
         <a href="<?php echo base_url("cp/apimedia"); ?>" id="field_src"  
title="Upload link" >
          <img src="<?php echo $base?>/img/register.gif"> </a>
             </div>
            </div>
          
          
          
   <div class="uk-form-row">
 <label class="uk-form-label" for="ads_code" style="font-family:Tahoma"><?php echo $this->lang->line('ads_code');?></label>
  <div class="uk-form-controls">
 <textarea id="code" name="ads_code" cols="58" rows="3" placeholder=""></textarea>
  </div>
 </div>  
    
    <div class="uk-form-row">
         <label class="uk-form-label" for="ads_width"> <?php echo $this->lang->line('ads_width');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-small font_deafult" type="text" name="ads_width" id="ads_width" placeholder="" >
             </div>
            </div>
          
          
            <div class="uk-form-row">
         <label class="uk-form-label" for="ads_height"> <?php echo $this->lang->line('ads_height');?></label>
         <div class="uk-form-controls">
          <input class="uk-form-width-small font_deafult" type="text" name="ads_height"  id="ads_height"  >
             </div>
            </div>   
    
    
    
    
    
    
    
    
            
            
            

      <!-- -->
     </div>   
    
    
    
  <div class="uk-width-1-2">
      <!-- -->  
      <div class="uk-form-row">
         <label class="uk-form-label" for="ads_name"> <?php echo $this->lang->line('ads_name');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="ads_name" id="ads_name"  />
             </div>
            </div>
            
            <div class="uk-form-row">
         <label class="uk-form-label" for="ads_link"> <?php echo $this->lang->line('ads_link');?> </label>
         <div class="uk-form-controls">
         Http:// <input  class="uk-form-width-large font_deafult" type="text" name="ads_link" id="ads_link"  />
             </div>
            </div>
            
                <div class="uk-form-row" >
        <label class="uk-form-label" for="ads_winow"> <?php echo $this->lang->line('ads_winow');?> </label>

  <div class="uk-form-controls ">
  <select class="uk-form-width-medium font_deafult" name="ads_winow" id="ads_winow">
      <option value="_blank" > <?php echo $this->lang->line('ads_newwindow');?></option>
 <option value="_self" > <?php echo $this->lang->line('ads_inwindow');?></option>
  
 
 </select>
  </div>
  </div> 
            
            
     <!-- -->         
  </div>   
  
   <div class="uk-width-1-1">
       
          <br/>
                 
 <hr class="uk-article-divider">
           <br/>   
           <p align="center">
  <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
type="submit" name="IsPost_addads" value="y" onclick="return validate5(this.form);" ><?php echo $this->lang->line('ads_save');?>     </button>  
   </div>     
    
    
</div>    




</form></div></div></div>

</div>
        <?php
          echo br(5);
        break;  
  
  
    case "edit":
    ?>
    
              <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle" >
    <ul class="uk-navbar-nav tm-navbar navtitle"  >
        <li class="navtitle"  ><a href="<?php echo base_url('ads/admin/index');?>"> <?php echo $this->lang->line('ads_edit');?> <i class="uk-icon-bookmark"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
           <li><a href="<?php echo base_url('ads/admin/index');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('ads_list');?>   </a></li>
           <li class="uk-nav-divider"></li>
            <li><a href="<?php echo base_url('ads/admin/index/addnew');?>" class="dirTemplate"><i class="uk-icon-bookmark"></i>  <?php echo $this->lang->line('ads_new');?>   </a> </li>
            <li class="uk-nav-divider"></li>
             
       <li><a href="#ads_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
      </div>


  </div>
    
</nav>



</div>

<br/>

<div id="_page_ads" class="container_inner uk-animation-fade"> 
    
      <?php
     if(@$result_ads=='update'){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('ads_msg_add');?> </div>
         <?php
     }
     
     ?> 

  <?php
     if(@$result_ads=='found'){
       ?>  
       <div class="uk-alert uk-alert-danger font_deafult dirTemplate"> <?php echo $this->lang->line('ads_msg_error');?> </div>
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
       <label class="uk-form-label" for="to"> <?php echo $this->lang->line('ads_file');?> </label>
         <div class="uk-form-controls">
         <input class="uk-form-width-large font_deafult" type="text" name="field_one" id="field_one" 
         value="<?php echo $row_ads['ads'];?>" />
         <a href="<?php echo base_url("cp/apimedia"); ?>" id="field_src"  
title="Upload link" >
          <img src="<?php echo $base?>/img/register.gif"> </a>
             </div>
            </div>
          
          
          
   <div class="uk-form-row">
 <label class="uk-form-label" for="ads_code" style="font-family:Tahoma"><?php echo $this->lang->line('ads_code');?></label>
  <div class="uk-form-controls">
 <textarea id="code" name="ads_code" cols="58" rows="3" placeholder=""><?php echo $row_ads['code'];?></textarea>
  </div>
 </div>  
    
    <div class="uk-form-row">
         <label class="uk-form-label" for="ads_width"> <?php echo $this->lang->line('ads_width');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-small font_deafult" type="text" name="ads_width" id="ads_width" placeholder="" value="<?php echo $row_ads['width'];?>" >
             </div>
            </div>
          
          
            <div class="uk-form-row">
         <label class="uk-form-label" for="ads_height"> <?php echo $this->lang->line('ads_height');?></label>
         <div class="uk-form-controls">
          <input class="uk-form-width-small font_deafult" type="text" name="ads_height"  id="ads_height"  value="<?php echo $row_ads['height'];?>">
             </div>
            </div>   
    
    
    
    
    
    
    
    
            
            
            

      <!-- -->
     </div>   
    
    
    
  <div class="uk-width-1-2">
      <!-- -->  
      <div class="uk-form-row">
         <label class="uk-form-label" for="ads_name"> <?php echo $this->lang->line('ads_name');?> </label>
         <div class="uk-form-controls">
          <input  class="uk-form-width-large font_deafult" type="text" name="ads_name" id="ads_name" value="<?php echo $row_ads['name'];?>"  />
             </div>
            </div>
            
            <div class="uk-form-row">
         <label class="uk-form-label" for="ads_link"> <?php echo $this->lang->line('ads_link');?> </label>
         <div class="uk-form-controls">
           Http://<input  class="uk-form-width-large font_deafult" type="text" name="ads_link" id="ads_link" value="<?php echo $row_ads['url'];?>"  />
             </div>
            </div>
            
                <div class="uk-form-row" >
        <label class="uk-form-label" for="ads_winow"> <?php echo $this->lang->line('ads_winow');?> </label>

  <div class="uk-form-controls ">
  <select class="uk-form-width-medium font_deafult" name="ads_winow" id="ads_winow">
 <option value="_blank" <?php echo (@$row_ads['ads_winow']=='_blank')? "selected='selected'":'';  ?> > <?php echo $this->lang->line('ads_newwindow');?></option>
 <option value="_self" <?php echo (@$row_ads['ads_winow']=='_self')? "selected='selected'":'';  ?> > <?php echo $this->lang->line('ads_inwindow');?></option>
  
 
 </select>
  </div>
  </div> 
            
            
     <!-- -->         
  </div>   
  
   <div class="uk-width-1-1">
       
          <br/>
                 
 <hr class="uk-article-divider">
           <br/>   
           <p align="center">
               
             
               
               
  <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
type="submit" name="IsPost_editads" value="y" onclick="return validate5(this.form);" ><?php echo $this->lang->line('ads_save');?>     </button>

  <button  class="uk-button uk-button-success uk-width-1-4 font_deafult"
   type="button" onclick="window.location.href='<?php echo base_url('ads/admin/index');?>';"   data-uk-button><?php echo $this->lang->line('masmail_msg_back');?>     </button>
          
   </div>     
    
    
</div>    


<input type="hidden" value="<?php echo $row_ads['ID'];?>"  name="ID" />
<input type="hidden" value="<?php echo $row_ads['ads'];?>"  name="old_ads" />
</form></div></div></div>

</div>




    
    
    
    
    
    <?php
     echo br(5);
        break; 
        
        
        
        
        ////////////////////
    default:
        ?>
    
     <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle" >
    <ul class="uk-navbar-nav tm-navbar navtitle"  >
        <li class="navtitle"  ><a href="<?php echo base_url('ads/admin/index');?>"> <?php echo $this->lang->line('ads_list');?> <i class="uk-icon-bookmark"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
  <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
    <div data-uk-dropdown="{mode:'click'}">
    <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
       <div class="uk-dropdown uk-dropdown-small selectmylist">
          <ul class="uk-nav uk-nav-dropdown  ">
           <li><a href="<?php echo base_url('ads/admin/index');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('ads_list');?>   </a></li>
           <li class="uk-nav-divider"></li>
            <li><a href="<?php echo base_url('ads/admin/index/addnew');?>" class="dirTemplate"><i class="uk-icon-bookmark"></i>  <?php echo $this->lang->line('ads_new');?>   </a> </li>
            <li class="uk-nav-divider"></li>
             
       <li><a href="#ads_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
      </div>


  </div>
    
</nav>



</div>

<br/>


    
     <div id="_page_ads" class="container_inner uk-animation-fade"> 
         
       
         
 <div class="uk-grid" >   
     
     
      <div class="uk-width-medium-1-1">
          
             <div class="uk-panel uk-panel-box backcolors dirTemplate">
     
     
<div id="content-table" style="background-color: #fff">
    
  <form    class="uk-form uk-form-stacked font_deafult" method="post"    >
  

<table class="uk-table uk-table-hover uk-table-striped uk-table-condensed uk-text-center">
   <!-- -->  
     
              <thead class="uk-text-center">
              <tr class="classTableHeader font_deafult">
                  <th class="uk-text-center"><?php echo $this->lang->line('ads_ID');?></th>
                 <th class="uk-text-center"><?php echo $this->lang->line('ads_name');?></th>
           <th class="uk-text-center"><?php echo $this->lang->line('ads_edit');?></th>
          <th class="uk-text-center"><?php echo $this->lang->line('ads_preview');?></th>
            
           <th class="uk-text-center"><input type="checkbox"   id="r1" name="r1"></th>
                                            
                                              
                                    </tr>
                                </thead>
     
     
     
     
       <tbody >
           <?php
                                    if(is_array($Rows_ads)){
                                        $api = $this->load->library('apiservices');
                                     $img=array('PNG','JPG','JPEG','GIF');
                                    
 foreach($Rows_ads as $V_record){
      $html='';          
        ?>
     
     
           <tr class=" uk-text-center font_deafult">
                                        
 <td class="uk-text-center" style="font-family:Tahoma"><div class="uk-badge "><?php echo $V_record['ID'];?></div></td>
   <td class="uk-text-center" ><?php echo mb_substr($V_record['name'],0,20);?></td>    
      <td class="uk-text-center" ><a href="<?php echo @base_url("ads/admin/index/edit/".$V_record['ID']);?>"><i class="uk-icon-pencil"></i></a></td> 
        <td class="uk-text-center" >
            
        <?php
        
        if($V_record['code']!=''){
        $html=$V_record['code'];    
            
        } else {
             $exe=strtoupper(end(explode(".",$V_record['ads'])));
            $is_uri=$api->Check_Url($V_record['ads']);   
            
            if( $is_uri==true){
                
                 if($exe=="SWF"){
                @$html.= "<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0'
width='$V_record[width]' height='$V_record[height]'>
<param name='movie' value='$V_record[ads]'  />
<param name='quality' value='high' />
<embed src='$V_record[ads]' quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width='$V_record[width]' height='$V_record[height]'></embed>
</object>";
                 } else {
                   if (in_array($exe,$img)){
                        
  @$html.= "<img src='$V_record[ads]' border='0' 
width='$V_record[width]' height='$V_record[height]' />";
                      
                   }  
                     
                 }  
                
                
            } else {
                //base
                 $filename=base_url($V_record['ads']);
                  if($exe=="SWF"){
                @$html.= "<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0'
width='$V_record[width]' height='$V_record[height]'>
<param name='movie' value='$filename'  />
<param name='quality' value='high' />
<embed src='$filename' quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width='$V_record[width]' height='$V_record[height]'></embed>
</object>";
                 } else {
                 if (in_array($exe,$img)){
                        
  @$html.= "<img src='$filename' border='0' 
width='$V_record[width]' height='$V_record[height]' />";
                  }
                 }
                
                
                //end base
            }
            
            
            
            
            
        }
        
        
        
        
        
        
        
        
        ?>    
          
  
            
    <button type="button" class="uk-button" data-uk-modal="{target:'#my-ads<?php echo $V_record['ID'];?>'}"><i class="uk-icon-eye"></i></button>

<div id="my-ads<?php echo $V_record['ID'];?>" class="uk-modal" style="direction: ltr;text-align: left;">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
      <?php echo $html; ?>
    </div>
</div>            
            
       
           
             
        </td> 
<td class="uk-text-center"><input type="checkbox" id="del[]"  name="del[]" value="<?php echo $V_record['ID'];?>" /></td>                               
     
                                    
 </tr>                                   
                                    
    <?php
 }
   }
   ?>   
           
       </tbody>
       
       
       
       
       
       
  <tfoot>
      
                                         
<tr>
<td colspan="5" >
 <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_delads" value="y"  data-uk-button><?php echo $this->lang->line('ads_delete');?></button>
             
</td>
</tr>
  </tfoot>      
       
       
  </table>         
 
</form>

<?php
     echo @$Paging_Ads;
     ?>
</div></div></div></div>
         
         
         
         
         
      </div>   
    
    
    
    
    
    
    
    
    <?php
    echo br(7);
        
 }   
?>



<!--api documentions -->
<div id="ads_help" class="uk-modal font_deafult">
  <div class="uk-modal-dialog">
 <a href="" class="uk-modal-close uk-close"></a>
 <h1 class="dirTemplate"><img src="<?php echo $base; ?>/img/22.png"/> &nbsp; <div class="uk-badge uk-badge-notification">API Documentation</div>   &nbsp; </h1>
  <p>
      <!-- begin-->
       
 <div class="uk-article-divider" style="font-family:Tahoma">
Use and add ads  in template or view
  <hr class="uk-article-divider">
            </div>
    <?php
   $tokens= $this->config->item('Token_access_key');
    ?>       
 <pre>
<code>  
/**
* Run ads
* You must add (ID) ads  as parameter
* You must add (token)  as parameter
*
*
**/
           
modules::run('ads/banner','50','<?php echo $tokens;?>');

</code>
</pre>
       
  
  </div>
  </div>


























      
          