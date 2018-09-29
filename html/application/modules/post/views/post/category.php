<meta charset="utf-8" />




<?php
$TPL_Config = $this -> config -> item('Template_Type');
@$session_language = @$this->session->userdata('Plang');  
@$session_style = @$this->session->userdata('Pstyle');  
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
      

$this->load->model('articles_model');
 
 $api = $this -> load -> library('apiservices');
$params=$this->uri->segment(3,0);
if($case=='ar'){
     $Crumb_link=@$api->get_breadcrumbs($params,'post');
} else {
    $Crumb_link=@$api->get_breadcrumbs2($params,'post'); 
}
// print_r($Crumb_link);
  
?>


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





<table width="100%">
    <tr> 
<?php

if(is_array($cat) && count($cat) > 0){

   $i=0; 
foreach($cat as $catRow){
    
?>   
    

    <td align="center">
       <table align="center"  class="category_table">
           <tr>
               <td>
                  <?php if($catRow['pic']==""){
echo anchor("post/category/$catRow[ID]",img(array("src"=>base_url('assets/images/1238674125.gif'),'border'=>0)),''); 
} else {
    
 if($this->articles_model->CheckURL($catRow['pic'])==false){
     echo anchor("post/category/$catRow[ID]",img(array("src"=>base_url($catRow['pic']),'border'=>0)),"class='cat_img' "); 
 }  else {
    
    echo anchor("post/category/$catRow[ID]",img(array("src"=>$catRow['pic'],'border'=>0)),"class='cat_img' ");    
 }  
    
//echo anchor("app/post/category/$catRow[ID]",img(array("src"=>Jimage($row['img']),'border'=>0)),"class='cat_img' "); 

}
?>
               </td>
           </tr>
            <tr>
                <td align="center">
                <?php    
                       if($TPL_Config =='E' || $TPL_Config =='F'){
          
          switch($session_style){
              case 'ar':
              echo anchor("post/category/$catRow[ID]",$catRow['name']); 
              break;
              
               case 'en':
                     echo anchor("post/category/$catRow[ID]",$catRow['name_allies']); 
              break;
                   
               default:
                 
                 echo anchor("post/category/$catRow[ID]",$catRow['name']); 
              
          }
          
           
       } else {
             
       echo anchor("post/category/$catRow[ID]",$catRow['name']); 
       }
       ?>
                    
                    
                    
                  
                    
                    </td>
             </tr>   
            
        </table>
        
    </td>  
   
    
<?php
if($i==3){
echo "</tr><tr>";
$i=1;
}
$i++;
} 
} else {
    
$id=intval($this->uri->segment(3));
   redirect("post/pages/$id", 'location');    
    
}


?>
</tr> 
</table>