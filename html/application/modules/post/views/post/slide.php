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
 
   ?>  
   
<link rel="stylesheet" href="<?php echo base_url('assets/lib/slide/themes/default/default.css');?>" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo base_url('assets/lib/slide/nivo-slider.css');?>" type="text/css" media="screen"/>
 
            
<style>
.theme-default .nivoSlider img {
    position:absolute;
    top:0px;
    left:0px;
    display:none;
    width: 618px;
    height: 246px !important;
}
</style>
 
<div id="wrapper" style="width: 628px;">
<div class="slider-wrapper theme-default">
<div id="slider" class="nivoSlider">
    
 
  <?php
               if(is_array(@$slide) && count(@$slide)!=0){
                   $i=0;
                   foreach(@$slide as $nivoSlider ){
                       
                        
                       
                         if(@$nivoSlider['pic']!=''){
                      if($api->Check_Url(@$nivoSlider['pic'])){
                       ?>
                     <a href="<?php echo base_url("post/index/$nivoSlider[slug]");?>" >      <img src="<?php echo $nivoSlider['pic'];?>"  data-thumb="<?php echo $nivoSlider['pic'];?>" alt=""     data-transition="slideInLeft"  title="#imgs<?php echo $i;?>" /></a>
                       <?php
                      } else {
                        ?>
                 <a href="<?php echo base_url("post/index/$nivoSlider[slug]");?>" >    <img src="<?php echo base_url($nivoSlider['pic']);?>"   data-thumb="<?php echo $nivoSlider['pic'];?>"        data-transition="slideInLeft"    title="#imgs<?php echo $i;?>"/></a>    
                        
                          <?php
                      }
                      
                      
                      
                      
                         }
                       //
                       
                       $i++;
                   }
                   
                   
               }
               ?> 





</div>


   <?php
               if(is_array(@$slide) && count(@$slide)!=0){
                    $j=0;
                   foreach(@$slide as $nivoSlider ){
                       
                       ?>
                        <div id="imgs<?php echo $j;?>" class="nivo-html-caption">
                <a href="<?php echo base_url("post/index/$nivoSlider[slug]");?>" class="slideTitle">          
                          <?php
                        if($case =='ar'){
                            echo @mb_substr($nivoSlider['title'], 0,80);
                        } else {
                              echo @mb_substr($nivoSlider['title_en'], 0,80);
                        }
                        ?></a>
                 <span class="mycslide">
                  <?php
                        if($case =='ar'){
                            echo @strip_tags(mb_substr($nivoSlider['content'], 0,100));
                        } else {
                              echo @strip_tags(mb_substr($nivoSlider['content_en'], 0,100));
                        }
                        ?>
                 </span>
                      
                        </div>
                       <?php
                       $j++;
               
                   }
               }
                       ?>






</div>



</div>








<script  src="<?php echo base_url('assets/lib/slide/jquery.nivo.slider.js');?>"></script>
<script>
    $(document).ready(function() {
        $('#slider').nivoSlider();
    });
    </script>