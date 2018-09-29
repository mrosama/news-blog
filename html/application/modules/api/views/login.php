<meta charset="utf-8" />
<?php $this -> load -> helper('html');
        $this -> load -> helper('url');
        $base = base_url($this ->config ->item('template_path'));
        ?>
  <style>
 .circular {
 background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #CCCCCC;
    border-radius: 50% 50% 50% 50%;
    box-shadow: 0 0 3px 0 #B5B5B5;
     width:40px;
     height:40px;
    margin: 0 10px 5px 0;
    padding: 4px;
    }
 

.loginForm{
    text-align: center;
    
    
}

</style>

<?php
if(@$this->session->userdata('IUser_ID')==''){
?>
<div class="loginForm">
<table border="0" cellpadding="0" cellspacing="0" >
<form method="post" id="loginForm" >
 <tr><td>  <?php echo $this->lang->line('member_login_username')?></td></tr>
 <tr><td><input type="text" size="20" name="email_login" /></td></tr>    
 <tr><td> <?php echo $this->lang->line('member_login_password')?></td></tr>      
 <tr><td><input type="password" size="20" name="password_login" /></td></tr>        
 <tr><td><button name="IsPost_LoginForm" value="y" type="submit"> <?php echo $this->lang->line('member_login_btn')?></button></td></tr>
 <?php
 if(@$conf_options_memebers['iuser_reg']=='On'){
 ?>
 <tr><td><span class="Login_link"><a href="<?php echo $Login_Options['Page_Register'];?>"><?php echo $this->lang->line('member_regLink')?></span></a></td></tr>
 <?php
 }
 ?>
 
 <tr><td><span class="Login_link"><a href="<?php echo $Login_Options['Page_Password'];?>"><?php echo $this->lang->line('member_forgetpass')?></span></a></td></tr> 
 <?php
 if(@$rs_c_login=='errorlogin'){
 ?>
  <tr><td><span class="Error_Login"><?php echo $this->lang->line('member_login_Errormsg')?></span></td></tr>
  <?php
 }
  ?>
</form>
</table>
</div>
<?php
} else {
     $api=$this->load->library('apiservices');
     $options_members=$this->Api_model->getOptions();
?>
<div class="profile">
    
<table align="center" width="100%" dir="ltr">
<tr><td align="right"  width="60%"><?php  echo mb_substr($this->session->userdata('IUser_name'),0,30);?></td>
<td   align="right"><?php echo $this->lang->line('member_msg_welcome')?> </td><td width="3%">
    
<?php
$picsess=$this->session->userdata('IUser_pic');
    if($this->session->userdata('IUser_pic') !='' || $this->session->userdata('IUser_pic')!=0 ){
        $img=base_url($this->session->userdata('IUser_pic'));
        
    } else {
        if($options_members['iuser_avatar']=='On'){
             if($api->getAvatar($this->session->userdata('IUser_email'))!=''){
            $img=$api->getAvatar($this->session->userdata('IUser_email'));
        } else {
            $img=base_url('html/application/modules/cp/views/themes/Default/img/noimg.png');
            
        }
        } else {
          $img=base_url('html/application/modules/cp/views/themes/Default/img/noimg.png');   
            
        }
       
        
        
        
    }
    ?>
    <img class="circular" src="<?php   echo $img;?>" >
</td></tr>

<tr><td align="right"   colspan="2">

<a href="<?php echo $Login_Options['Page_Profile'];?>"><?php echo $this->lang->line('member_profile');?></a>
</td> <td width="3%"><img src="<?php   echo $base;?>/img/page_skin.png"></td></tr>




<tr><td align="right"   colspan="2">
 
 
<a href="<?php echo $Login_Options['page_Logout'];?>"><?php echo $this->lang->line('member_logout');?></a>
</td> <td width="3%"><img src="<?php echo $base;?>/img/logout.gif"></td></tr>
</table>







</div>    

<?php
}
?>
