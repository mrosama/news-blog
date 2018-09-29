<meta charset="utf-8" />
<?php
$TPL_Config = $this -> config -> item('Template_Type');

@$session_language = @$this->session->userdata('Plang');  
 @$session_style = @$this->session->userdata('Pstyle');  
 ?>

 <script type="text/javascript">
    function addvote(myform) {
        var radio=myform.r1;
    var valid = false;
    for (var i = 0; i < radio.length; i++) {
        if (radio[i].checked) {
       //     return true;
            // form_vote.submit();
            valid=true;
            break;
        }
    }
    if(valid==true){
    return true
        }
        else {
                alert("<?php echo $this->lang->line('poll_site_msg1')?>");
                return false;
            }

 
}

</script>




<div class="poll" id="poll">
    <form method="post" name="form_vote">

<table align="center" width="100%" cellpadding="0" cellspacing="4" dir="ltr">
<tr><td class="myselect" colspan="2" align="right">
    
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
    
    
    
    
    
</td></tr>
<tr><td colspan="2" height="1px" bgcolor="#cccccc"></td></tr>

   

<?php


if(is_array($polls['answer'])){

foreach(@$polls['answer'] as $row){
if(@$row[$case]==""){
continue;
}
?>

<tr><td align="right"><?php echo @$row[$case];?></td><td width="1%"><input type="radio" name="r1" value="<?php echo $row['ID'];?>"></td></tr>
<tr><td colspan="2" height="1px" bgcolor="#EEEEEE"></td></tr>

<?php
}



}


?>






<tr><td colspan="2" align="center">
 
<button type="submit" name="IsPost_viewPolls" value="view" ><?php echo $this->lang->line('poll_site_view')?></button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button type="submit" name="IsPost_sendPolls" value="send"  onclick="return addvote(this.form)"><?php echo $this->lang->line('poll_site_send')?></button>

 
</td></tr>
</table>
<input type="hidden" value="<?php echo base64_encode(serialize(@$polls['question']['ID']));?>" name="_tkon">
</form></div>
