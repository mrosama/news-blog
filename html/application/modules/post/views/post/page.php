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
        
 