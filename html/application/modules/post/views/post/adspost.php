<meta charset="utf-8" />

<?php
$TPL_Config = $this -> config -> item('Template_Type');
@$session_language = @$this->session->userdata('Plang');  
@$session_style = @$this->session->userdata('Pstyle');  

$baseImg=base_url('assets/images');

  
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
 
 

if(is_array(@$ads_news) && count($ads_news)!=0){
    
    foreach($ads_news as $ads){
        ?>
        <li>
            
           <?php
       if($case=='ar'){
           echo anchor("post/index/$ads[slug]",$ads['title']);
       } else {
          echo anchor("post/index/$ads[slug]",$ads['title_en']); 
       }
       
       ?>
            </li>
        <?php
    }
    
}


?>