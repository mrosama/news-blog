<meta charset="utf-8" />
<?php
$TPL_Config = $this -> config -> item('Template_Type');
@$session_language = @$this->session->userdata('Plang');  
@$session_style = @$this->session->userdata('Pstyle');  
?>
 <style type="text/css">
 
 .poll .percent {
    FONT-SIZE: 12px; COLOR: #3c3c3c
}
  .text {
    FONT-SIZE: 12px; COLOR: #3c3c3c
}
.poll .title {
    PADDING-LEFT: 0px; FONT-WEIGHT: normal; FONT-SIZE: 12px;  PADDING-BOTTOM: 10px; COLOR: #3c3c3c
}
.poll .total {
    FONT-WEIGHT: normal; FONT-SIZE: 11px; COLOR: #3c3c3c
}
.bar {
    BORDER-RIGHT: #b8b8b8 1px solid; BORDER-TOP: #b8b8b8 1px solid; FONT-SIZE: 1px; BACKGROUND: #f9f9f9; BORDER-LEFT: #b8b8b8 1px solid; BORDER-BOTTOM: #b8b8b8 1px solid; HEIGHT: 8px
}


   .bar .foreground {
    FONT-SIZE: 1px; BACKGROUND:#046dd9; HEIGHT: 8px
}

/*  .bar .foreground {
    FONT-SIZE: 1px; BACKGROUND: #e5482a; HEIGHT: 8px
}*/
 </style>
 



 <table align="center" width="100%" id="resultpoll"  >
 <tr>
 <td valign="top"> 
 <form method="post" name="formvoteresult">
 
 
 <DIV   dir="rtl" style="overflow:visible">
<DIV  class="myselect" >
    
    
     <?php
       $case='answer';
       if($TPL_Config =='E' || $TPL_Config =='F'){
          
          switch($session_style){
              case 'ar':
              echo  mb_substr(@$polls['question']['question'], 0, 30); 
              break;
              
               case 'en':
                     $case='answer_en';
                   echo  mb_substr(@$polls['question']['question_en'], 0, 30);  
              break;
                   
               default:
                     $case='answer';
                echo  mb_substr($polls['question']['question'], 0, 30);     
              
          }
          
           
       } else {
             $case='answer';
       echo  mb_substr($polls['question']['question'], 0, 30);    
       }
       ?>
    
    
    
    
    
</DIV>

<?php 
if(is_array($polls['answer'])){
$this->load->model('poll_model');

foreach ($polls['answer'] as $row){
if($row[$case]==""){
continue;
}
?>
 

<DIV class=text><?php echo $row[$case];?></DIV>
<DIV class=bar>
<DIV  dir="rtl"  class=foreground style="WIDTH:<?php echo $this->poll_model->Percent($row['poll'],$row['hits']);?>%"> </DIV>
</DIV>
<DIV class=percent><?php echo $this->poll_model->Percent($row['poll'],$row['hits']);?>% </DIV>
<?php
}
}
?>

<DIV class=total>
<?php
//echo anchor("app/poll/listpoll","شاهد الاسئلة السابقة");
?></DIV></DIV>
</form>
 </td></tr></table>



















