  <meta charset="utf-8" />
  <?php
$api = $this -> load -> library('apiservices');
$api->CP_Auth(1,true,'No direct script access allowed');
?>
  <?php
    $base = base_url($this ->config ->item('template_path'));
      $seg = $this -> uri -> segment(3);
      
      
      switch($seg) {
          
          case "options":
              ?>
              
                <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
        <li class="navtitle"><a href="<?php echo base_url('cp/visitor/options');?>"> <?php echo $this->lang->line('visitor_counter_title');?> <i class="uk-icon-eye"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
                                    <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
                                    <div data-uk-dropdown="{mode:'click'}">
                                        <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
                                        <div class="uk-dropdown uk-dropdown-small selectmylist">
                                            <ul class="uk-nav uk-nav-dropdown  ">
                                                <li><a href="<?php echo base_url('cp/visitor');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('visitor_title');?>   </a></li>
                                                 <li class="uk-nav-divider"></li>
                                               
                                                  <li><a href="<?php echo base_url('cp/visitor/options');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('visitor_counter_title');?>   </a> </li>
                                                 <li class="uk-nav-divider"></li>
                                                 
                                                     <li><a href="#visitors_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
                                </div>


  </div>
    
</nav>



</div>

<br/>
       
            
    
    <!-- -->
    
    <?php error_reporting(5);?>
 <div id="_page_visitor" class="container_inner uk-animation-fade">
         <?php
     if(@$vistors_update==true){
       ?>  
       <div class="uk-alert uk-alert-success font_deafult dirTemplate"> <?php echo $this->lang->line('options_message');?> </div>
         <?php
     }
     
     ?>  
     
     <div class="uk-grid" data-uk-grid-margin>
  <div class="uk-width-medium-1-1">
 <div class="uk-panel uk-panel-box backcolors dirTemplate">
   
     
  <h3 class="uk-panel-title font_deafult"><?php echo $this->lang->line('visitor_counter_title');?></h3>
 <hr class="uk-article-divider">
 
   <!-- form begin -->
  
   <form class="uk-form uk-form-stacked font_deafult" method="post" >
       
       
        <div class="uk-article-divider">
                 <?php echo $this->lang->line('visitors_options_selectcounter');?>
                 <hr class="uk-article-divider">
            </div>
       
    <div class="uk-grid">
         <div class="uk-width-1-2">
              <div class="uk-form-row">
         <label class="uk-form-label" for="visitors_type">   <?php echo $this->lang->line('visitors_options_selectcustom');?>   </label>
         <div class="uk-form-controls">
         <input type="radio" id="visitors_type" name="visitors_type" value="custome" <?php echo ($vistors_rows['visitors_type']=='custome')? "checked='checked'":'';  ?>  /> 
          </div>
            </div>
          
          
            <div class="uk-form-row">
         <label class="uk-form-label" for="visitors_code_counter" style="font-family:Tahoma"> <?php echo $this->lang->line('visitors_options_entercode');?></label>
         <div class="uk-form-controls">
          <textarea id="visitors_code_counter" name="visitors_code_counter"  cols="50" rows="2" placeholder=""><?php echo $vistors_rows['visitors_code_counter'];?></textarea>
           </div>
          </div>   
            
            
            
            
            
             </div>
             
             
          <div class="uk-width-1-2">
             
        <div class="uk-form-row">
         <label class="uk-form-label" for="visitors_type">   <?php echo $this->lang->line('visitors_options_default');?>  </label>
         <div class="uk-form-controls">
         <input type="radio" id="visitors_type" name="visitors_type" value="default" <?php echo ($vistors_rows['visitors_type']=='default')? "checked='checked'":'';  ?>   /> 
          </div>
            </div>
          


    <div class="uk-form-row" >
  <label class="uk-form-label font_deafult" for="visitors_style">  <?php echo $this->lang->line('visitors_options_tempavalible');?></label>
 <div class="uk-form-controls">
  <select class="uk-form-width-medium " name="visitors_style" id="visitors_style" style="font-family:Tahoma;size: 15px;">
  <option value="normal" <?php echo ($vistors_rows['visitors_style']=='normal')? "selected='selected'":'';  ?> >Template 1</option>
  <option value="style1"  <?php echo ($vistors_rows['visitors_style']=='style1')? "selected='selected'":'';  ?> >Template 2</option>
 <option value="style2"  <?php echo ($vistors_rows['visitors_style']=='style2')? "selected='selected'":'';  ?> >Template 3</option>
 <option value="style3"   <?php echo ($vistors_rows['visitors_style']=='style3')? "selected='selected'":'';  ?>>Template 4</option>
 <option value="style4"   <?php echo ($vistors_rows['visitors_style']=='style4')? "selected='selected'":'';  ?>>Template 5</option>
 
 
 </select>
 <a href="#_counter" data-uk-modal> <img src="<?php echo $base;?>/img/12_eye.png" /></a>
  </div>
  </div>
  
  <!-- -->
  

        
  
  
  
  <!-- -->
  


  </div>    
    
     <div class="uk-width-1-1">
        
           <div class="uk-form-row">
         <label class="uk-form-label" for="visitors_counter"> <?php echo $this->lang->line('visitors_options_counternumber');?> </label>
         <div class="uk-form-controls">
          <input class="uk-form-width-large font_deafult" type="text" name="visitors_counter" id="visitors_counter"  value="<?php echo $vistors_rows['visitors_counter'];?>">
             </div>
            </div>
         </div>
    
    
             
        
    </div>    
       
       
         <div class="uk-article-divider">
                <?php echo $this->lang->line('visitors_options_online');?>
                 <hr class="uk-article-divider">
            </div>
       
    <div class="uk-grid">
        
       <div class="uk-width-1-2">
           
             <div class="uk-form-row" >
  <label class="uk-form-label font_deafult" for="visitors_template"><?php echo $this->lang->line('visitors_options_vistortmp');?></label>
 <div class="uk-form-controls">
  <select class="uk-form-width-medium " name="visitors_template" id="visitors_template" style="font-family:Tahoma;size: 15px;">
  <option value="default" <?php echo ($vistors_rows['visitors_template']=='default')? "selected='selected'":'';  ?> ><?php echo $this->lang->line('visitors_options_selectmp1');?>  </option>
 <option value="custom" <?php echo ($vistors_rows['visitors_template']=='custom')? "selected='selected'":'';  ?> > <?php echo $this->lang->line('visitors_options_selectmp2');?></option>
 </select>
  </div>
  </div>
       
   
         <div class="uk-form-row">
         <label class="uk-form-label" for="vistor_template_code" style="font-family:Tahoma"><?php echo $this->lang->line('visitors_options_entercode');?></label>
         <div class="uk-form-controls">
          <textarea id="keywords" name="vistor_template_code"  cols="50" rows="2" placeholder=""><?php echo $vistors_rows['vistor_template_code'];?></textarea>
           </div>
          </div>   
            
  </div>    
       
       
         <div class="uk-width-1-2">
           
             <div class="uk-form-row" >
  <label class="uk-form-label font_deafult" for="visitors_discover"> <?php echo $this->lang->line('visitors_options_discover');?></label>
 <div class="uk-form-controls">
  <select class="uk-form-width-medium " name="visitors_discover" id="visitors_discover" style="font-family:Tahoma;size: 15px;">
  <option value="db" <?php echo ($vistors_rows['visitors_discover']=='db')? "selected='selected'":'';  ?>>  <?php echo $this->lang->line('visitors_options_discover1');?></option>
 <option value="web" <?php echo ($vistors_rows['visitors_discover']=='web')? "selected='selected'":'';  ?> ><?php echo $this->lang->line('visitors_options_discover2');?></option>
 </select>
  </div>
  </div>
       
   
        
            
  </div>       
       
        
    </div>   
       
     
      <hr class="uk-article-divider">
        <p align="center">
  <button  class="uk-button uk-button-primary uk-width-1-4 font_deafult"
   type="submit" name="IsPost_visitor" value="y"  data-uk-button><?php echo $this->lang->line('options_sendbutton');?>     </button>
        
 <hr class="uk-article-divider">
       </p>
          
           
        <br/>     
                  
           <br/>   <br/>   <br/>      
     
       
       
       
       </form>
 
  <!-- end begin -->
 
 
 
 </div></div></div></div>
    
    
    <!-- -->
    
    
    
    
    
    
    
    
    
              
              
              
              
              
              
              
              <?php
          break;
          
          default:
  ?>
  
  
  <div style="width: 70%; margin: 0 auto"  >
  
  <nav class="uk-navbar navtitle">
    <ul class="uk-navbar-nav tm-navbar navtitle">
        <li class="navtitle"><a href="<?php echo base_url('cp/visitor');?>"> <?php echo $this->lang->line('visitor_title');?> <i class="uk-icon-eye"></i></a></li>
        
    </ul>
    
  <div id="select_nav1" class="mn">
  <div class="uk-button-group font_deafult">
                                    <button  class="uk-button  uk-button-danger">&nbsp;   <?php echo $this->lang->line('visitor_select_title');?>  &nbsp;   </button>
                                    <div data-uk-dropdown="{mode:'click'}">
                                        <a href="#"  class="uk-button  uk-button-danger"><i class="uk-icon-caret-down"></i></a>
                                        <div class="uk-dropdown uk-dropdown-small selectmylist">
                                            <ul class="uk-nav uk-nav-dropdown  ">
                                                <li><a href="<?php echo base_url('cp/visitor');?>" class="dirTemplate"><i class="uk-icon-home"></i> <?php echo $this->lang->line('visitor_title');?>   </a></li>
                                                 <li class="uk-nav-divider"></li>
                                               
                                                  <li><a href="<?php echo base_url('cp/visitor/options');?>" class="dirTemplate"><i class="uk-icon-cog"></i>  <?php echo $this->lang->line('visitor_counter_title');?>   </a> </li>
                                                 <li class="uk-nav-divider"></li>
                                                 
                                                  <li><a href="#visitors_help" data-uk-modal  class="dirTemplate" style="font-family:Tahoma"><i class="uk-icon-question"></i>  API Documentation   </a> </li>
                                                 
                                               
                                            </ul>
                                        </div>
                                    </div>
                                </div>


  </div>
    
</nav>



</div>

<br/>


 <div id="_page_visitor" class="container_inner uk-animation-fade">
     
     
     <div class="uk-grid" data-uk-grid-margin>
  <div class="uk-width-medium-1-1">
 <div class="uk-panel uk-panel-box backcolors dirTemplate">
   
     
  <h3 class="uk-panel-title font_deafult"><?php echo $this->lang->line('visitor_title');?></h3>
 <hr class="uk-article-divider">
 
 
 <div id="content-table" style="background-color: #fff">
 <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed uk-text-center">
                                <thead class="uk-text-center">
                                    <tr class="classTableHeader font_deafult">
                                        <th class="uk-text-center"><?php echo $this->lang->line('visitor_id');?></th>
                                        <th class="uk-text-center">IP Address</th>
                                        <th class="uk-text-center"><?php echo $this->lang->line('visitor_os');?></th>
                                        <th class="uk-text-center"><?php echo $this->lang->line('visitor_browser');?></th>
                                         <th class="uk-text-center"><?php echo $this->lang->line('visitor_mobile');?></th>
                                          <th class="uk-text-center"><?php echo $this->lang->line('visitor_country');?></th>
                                           <th class="uk-text-center"><?php echo $this->lang->line('visitor_status');?></th>
                                            <th class="uk-text-center"><?php echo $this->lang->line('visitor_date');?></th>
                                            
                                              
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php
                                    if(is_array($Rows_visitors)){
                                        $api = $this->load->library('apiservices');
                                         $id_vistors=0;
                                    foreach($Rows_visitors as $V_record){
                                       $id_vistors++;
                                    ?>
                                    <tr class=" uk-text-center font_deafult">
                                        <td class="uk-text-center"><?php echo $V_record['ID'];?></td>
                                         <td class="uk-text-center"><?php echo $V_record['visitor_ip'];?></td>
                                        <td class="uk-text-center"><?php echo $V_record['visitor_os'];?></td>
                                        <td class="uk-text-center"><?php echo $V_record['visitor_browser'];?></td>
                                        <td class="uk-text-center"><?php echo $V_record['vistor_mobile'];?></td>
                                        <td class="uk-text-center">
                                            <?php 
                                           $rowCountry= @$api->getCountry($V_record['visitor_country']);
                                            echo  @$api->getflag($V_record['visitor_country'],$rowCountry['arabic']);
                                            ?>
                                            
                                            
                                        </td>
                                        <td class="uk-text-center">
                                            <?php
                                            if( $V_record['visitor_status']=='status_On'){
                                                
                                    
                                     echo "<img src=\"$base/img/online.png\"  title=' متصل' /> ";          
                                                           
                                            } else {
                                                 echo "<img src=\"$base/img/offline.png\"  title=' غير متصل' /> ";  
                                             
                                                
                                            }
                                            
                                            ?>
                                            
                                            
                                        </td>
                                        <td class="uk-text-center"><?php 
                                        echo  @$api->timeFormatAR($V_record['visitor_time']);
                                      //  echo  @$api->timeFormatEN($V_record['visitor_time']);
                                        
                                        ?>
                                        
                                        </td>
                                    </tr>
                                    
                                    
                                 <?php
                                    }
                                    }
                                 ?>
                                </tbody>
                            </table>
 
 
     
     
     <?php
     echo $Paging_visitors;
     ?>
     <br/><br/><br/><br/><br/>
     </div>
     
     
     
   
   
   
   
   
   
   
   
   
   
   
   
     
     <!-- end continer -->
     </div>



<?php
}
?>






     <div id="_counter" class="uk-modal uk-animation-fade font_deafult">
  <div class="uk-modal-dialog">
 <a href="" class="uk-modal-close uk-close"></a>
  
  <p>
  <!-- begin-->
    <table class="uk-table">
        <tr><td>0123456789</td><td>Template 1</td></tr>
    <tr><td><img src="../../assets/lib/counter/style1/style1.gif"></td><td>Template 2</td></tr>
     <tr><td><img src="../../assets/lib/counter/style2/style2.gif"></td><td>Template 3</td></tr>
      <tr><td><img src="../../assets/lib/counter/style3/style3.gif"></td><td>Template 4</td></tr>
       <tr><td><img src="../../assets/lib/counter/style4/style4.gif"></td><td>Template 5</td></tr>
         
     </table>
   <!-- end -->   
  </p>
  </div>
  </div>
  
  
  
  
  
  
  <!--api documentions -->
<div id="visitors_help" class="uk-modal font_deafult">
  <div class="uk-modal-dialog">
 <a href="" class="uk-modal-close uk-close"></a>
 <h1 class="dirTemplate"><img src="<?php echo $base; ?>/img/22.png"/> &nbsp; <div class="uk-badge uk-badge-notification">API Documentation</div>   &nbsp; </h1>
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
  </div>
  </div>
 
  




