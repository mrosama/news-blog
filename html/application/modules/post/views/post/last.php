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
 
             


$dbpost=$this->load->model('Articles_model');
//$this->Articles_model->getnumCommt($rs['ID']);
?>


<?php
if(is_array(@$rs) && count(@$rs)!=0){
foreach(@$rs as $recordset){
?>


            <div class="puertoLftCnt article"  >
                <div style="border-bottom:1px solid #eee;"><a href="<?php echo base_url("post/index/$recordset[slug]");?>">
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
                    <span><?php echo @$dbpost->getnumCommt($recordset['ID']);;?> <?php echo $this->lang->line('article_comnum');?></span>
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
                   <img class="lazy" src="<?php echo base_url('assets/images/blank.gif');?>" data-original="<?php echo @$recordset['pic'];?>" width="620" height="150" />
                   <?php       
                      } else {
                          ?>
                         <img src="<?php echo base_url('assets/images/blank.gif');?>" class="lazy" data-original="<?php echo base_url($recordset['pic']);?>" width="620" height="150" />  
                          <?php
                          
                      } 
                        
                    } 
                    ?>
                    
                    </div>
                <p> 
                     <?php
                        if($case =='ar'){
                            echo strip_tags(mb_substr(@$recordset['content'], 0,200));
                        } else {
                              echo strip_tags(mb_substr(@$recordset['content_en'], 0,200));
                        }
                        ?>
                    
                     </p>
                     
        

        
        </div>
    

<?php
}
}
?>
<script src="<?php echo base_url('assets/lib/lazyload/jquery.lazyload.min.js');?>"></script>

<script>
$("img.lazy").lazyload({
    // container: $("#container_im")
    effect : "fadeIn"
});
</script>
