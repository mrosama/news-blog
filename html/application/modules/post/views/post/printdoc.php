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
 
?>

<?php
if($case == 'ar'){
$title=@$recordset['title'];
$content=@$recordset['content'];
} else {
    $title=@$recordset['title_en'];
$content=@$recordset['content_en'];
}

  $out= "<HTML DIR=RTL LANG=AR-SA>
     <head>
     <meta charset='utf-8' />
     <title> Print: ".$title."</title>
     <script language=JavaScript>
     function fermer()
     {
         self.close();
     }
     </script>
     </head>
     <body onload='window.print()'>
     <table width='600' border='0' align=center>
      <tr>
        <td width='100%'>
            <center>
            <table border='0' width='89%' cellspacing='0' cellpadding='0'>
              <tr>
                <td width='100%'>
                <h3 align=\"center\">".$title."</h3>
                 <font size='2'><b>".$_SERVER['HTTP_REFERER']."</b></font>
                 <hr noshade color=\"#000000\" size=\"0\" width=\"100%\">
                <font size='2'><b>".strip_tags($content)."
               </b></font>
               <hr noshade color=\"#000000\" size=\"0\" width=\"100%\">
               </td>
              </tr>
              
              <tr><td> <font size='2'><tt>".$_SERVER['HTTP_HOST']." &copy;  ".date("Y/m/d H:i:s A")."</tt></font></td></tr>
            </table>

        </td>
      </tr>
  </table>
</body>
</html>";

echo $out;
