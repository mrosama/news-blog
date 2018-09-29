<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model {
    
    
    public $api;
      


 public function __construct() {
    
      parent::__construct();
      $this->api=$this->load->library('apiservices');
     
    
    
    
  }
    
   private function getToken(){
      return $this -> config -> item('Token_access_key');
       
   } 
    
    
  public function getOptionsVistors() {
        $query = $this -> db -> get('visitors_counters');
        $row = $query -> row_array();
        return $row;
    
}
 
 
 
 
    
public function HitCounter(){
    
$array1=array(0,1,2,3,4,5,6,7,8,9);
$html="";
 
$row=$this->getOptionsVistors();
//print_r($row);

$total=$row['visitors_counter'];
if($row['visitors_type']=='default'){
    
    
 


switch($row['visitors_style']){
case "normal":
$html=$total;
break;

case "style1":
$len=strlen($total);
for($i=0;$i<$len;$i++){
if(in_array($total[$i],$array1)){
$html.="<img src=". base_url()."assets/lib/counter/style1/$total[$i].gif />";
 }}
break;

case "style2":
$len=strlen($total);
for($i=0;$i<$len;$i++){
if(in_array($total[$i],$array1)){
$html.="<img src=". base_url()."assets/lib/counter/style2/$total[$i].png />";
 }}
break;
case "style3":
$len=strlen($total);
for($i=0;$i<$len;$i++){
if(in_array($total[$i],$array1)){
$html.="<img src=". base_url()."/assets/lib/counter/style3/$total[$i].gif />";
 }}
break;
case "style4":
$len=strlen($total);
for($i=0;$i<$len;$i++){
if(in_array($total[$i],$array1)){
$html.="<img src=". base_url()."assets/lib/counter/style4/$total[$i].png />";
 }}
break;
 

}
} else {
    
   $html.=$row['visitors_code_counter']; 
    
}

 
return $html;
 
    }
    
 
 
 
 
 
 public function getvistorOnline(){
     $tablename= $this->db->dbprefix('visitors');
     
      $sql="select count(visitor_country) as vtotal,visitor_country
      from $tablename
      where `visitor_status`='status_On'
       group by  visitor_country
      limit 15;
        ";
      //  echo $sql;
     $query = $this->db->query($sql);
     
   
    
   $result= $query->result_array();
     return $result;
     
 }
 
 public function getOptions() {

        $query = $this -> db -> get('options');
        $row = $query -> row_array();
        return $row;

    }
 
 
 public function get_contactus(){
       $query = $this -> db -> get('maillist_options');
        $row = $query -> row_array();
        return $row;
     
     
 }
 
 
 public function add_message(){
      $conf=$this->getOptions();
      $options=$this->get_contactus();
      $message=$this->input->post('message',true);
      $subject=$this->input->post('name',true);
      $data_msg=array(
      'name'=>$this->input->post('name',true),
       'email'=>$this->input->post('email',true),
       'site'=>$this->input->post('website',true),
       'message'=>$this->input->post('message',true),
       'message_dat'=>date('Y-m-d h:i:s'),
      );
      
      
      $this -> db -> insert('message', $data_msg);
       $last_id=$this->db->insert_id();
       if ($this -> db -> affected_rows()) {
           //send message
            $api = $this -> load -> library('apiservices');
            $title = $subject.' _ '.mb_substr($message,0,20);
            $api->Send_Email($conf['email_received'],$title,$message);     
           
           ////add notification if allow
         /*  if($options['options_alertemail']=='On'){
              
               $param=array(
               'token'=>$this->getToken(),
                  'message'=>$title ,
                     'links'=>base_url('cp/masmail/viewmsg/'.$last_id),
               );
             $this->api->notification($param);
               
               
               
           }*/
           
           
           /////
            return true;

        }
      
   
 }
 
 
    
    
     

public function addEmail_list(){
     $conf=$this->getOptions();
      $options=$this->get_contactus();
    $email=$this->input->post('email_maillist',true);
    $type_action=$this->input->post('type_action',true);
    switch($type_action){
        case "0":
              $this -> db -> where(array('maillist_email' => $email));
           $query = $this -> db -> get('maillist');  
             if ($query -> num_rows() != 0) {
                 return 'Email_Found';
                 
             } else {
          $data_add=array('maillist_email'=>$email,'mailist_date'=>date('Y-m-d h:i:s'));
                 
            $this -> db -> insert('maillist', $data_add); 
            //notification
              if($options['options_useMaillist_alert']=='On'){
                $param=array(
               'token'=>$this->getToken(),
                  'message'=>$this->lang->line('maillinglist_add_msg5') ,
                     'links'=>base_url('cp/masmail/mailinglist'),
               );
             $this->api->notification($param);
              }
            
            return 'Email_Add';
             }
        break;
         case "1":
             
             $this -> db -> where(array('maillist_email' => $email));
        $query = $this -> db -> get('maillist');
        $row = $query -> row_array();
                if ($query -> num_rows() != 0) {
                   //found check if delete direct or by link 
                if($options['options_useMaillist_dellink']=='On'){
                    //send link maillinglist_msg_email
               $msg= $this->lang->line('maillinglist_msg_email');
               $v=md5($row['ID'].$row['maillist_email']. $this->getToken());
               $msg.='<br/><hr/><br/>';
               $link=current_url().'/confirmEmail/'.$row['ID'].'/'.$v;     
                $msg.=$link;   
              $subject =  $this->lang->line('maillinglist_subject_email');     
                    
              $this->api->Send_Email($row['maillist_email'],$subject,$msg);      
                    
                return 'Email_SendEmail';    
                } else {
                   $this -> db -> where(array('ID' => $row['ID']));
        $query = $this -> db -> delete('maillist');  
                    return 'Email_Delete';
                }    
                    
                    
                    
                } 
                else {
                    
                    
                    return 'Email_NotFound';
                }
             
             
             
        break;    
        
    }
    
    
    
    
   /// 
}
 
 
 
 
 
 public function delete_Cmail($id,$keys){
     
 $this -> db -> where(array('ID' => (int) $id));
        $query = $this -> db -> get('maillist');
        $row = $query -> row_array();
         if ($query -> num_rows() != 0) {
           $v=md5($row['ID'].$row['maillist_email']. $this->getToken());
           
           if($v==$keys){
                $this -> db -> where(array('ID' => (int) $id));
        $query = $this -> db -> delete('maillist');  
               return 'Email_Delete'; 
           } else {
               
                return 'Error_Link';
           }
           
           
       } else {
           
           return 'Error_Link';
       }
     
     
          
                   
     
     
 }
 
 
 
 
 
 

public function Auth_Login(){
    @$email_login=$this->input->post('email_login',true);
    @$password_login=md5($this->input->post('password_login',true));
    
   $this->db->where('email',$email_login);
   $this->db->where('password',$password_login); 
    $this->db->where('active','on'); 
    $query = $this -> db -> get('members');
    
         if ($query -> num_rows() != 0) {
             //found
       $row=$query->row_array();
             
             
     
@$CPUser = array(
'IUser_ID'  => $row['ID'],
'IUser_name'  => $row['name'],
'IUser_pic'     => $row['pic'],
'IUser_email'     => $row['email'],
'IUser_role'     => $row['roles'],
'IUser_admin' => 'user'
);
             
$this->session->set_userdata($CPUser);             


 $dataoptions=array(
 'time_login'=>time(),
 'status'=>'online'
 ); 
 $this->db->where('ID',$row['ID']); 
$this -> db -> update('members', $dataoptions);       
                       
             
  return true;                    
         } else {         
    return 'ERROR_LOGIN';            
         } 
}
 
 
 
 
 
 
 
 public function getCountry(){
    
$query = $this -> db -> get('country');
$row = $query -> result_array();
return $row;
     
}
 
 
 
 
 
 


public function setNewMembers($url){
     
     $options=$this->getOptions();
     
     if( $options['iuser_active']=='auto'){
       $active='on';  
         
     } else {
        $active='off';  
         
     }
     
     
     $country=$this->input->post('country',true);
     $gender=$this->input->post('gender');
    
     $name=$this->input->post('name',true);
     $email=$this->input->post('email',true);
     $password=$this->input->post('password',true);
    // $pic=$this->input->post('field_two',true);
     
    $this->db->where('email', $email ); 
   
     $query = $this -> db -> get('members');
  //  $row = $query -> row_array();
     
     if ($query -> num_rows() != 0) {
         return 'found';
     }
     else {
         
         
      //upload   
         
         
        $filename= $this->UploadImg('assets/media/profile/');
         
         
         
         
         
         
         //////////////////////
       $datacat=array(
       'name'=>$name,
       'email'=>$email,
      // 'username'=>$username,
       'password'=> md5($password),
       'gender'=> $gender,
       'roles'=>'0',
       'pic'=> $filename,
       'date_reg'=>date('Y-m-d h:i:s'),
       'active'=> $active,
       'country'=> $country
       );  
       
       ////////////////////////////////////
       
       
       
       
       
       
       
       
       
         
    $this -> db -> insert('members', $datacat);
    if ($this -> db -> affected_rows()) {
        
           $isd=$this->db->insert_id();
      ///////////////     
      if($options['iuser_notification']=='On'){
       
                  $param = array(
                    'token'=>$this->getToken(),
                    'message'=>$this->lang->line('mem_nofication') ,
                     'links'=>base_url('cp/memebers/edit/'. $isd),
               );
             $this->api->notification($param);
              }    
        
        
     //////////////     
        
        
        
        
        //depand on setting active message
        
        
        if($options['iuser_active']=='auto'){
            return 'add';
            }
           
          if($options['iuser_active']=='admin'){
            return 'addbyadmin';
            }
            
            
            if($options['iuser_active']=='email'){
                //send email
                
            $msg= $this->lang->line('mem_email_links');
               $v=md5($isd . $email. $this->getToken());
               $msg.='<br/><hr/><br/>';
               $link=$url.'/creg/'.$isd.'/'.$v;     
                $msg.=$link;   
              $subject =  $this->lang->line('mem_email_msg');     
                    
              $this->api->Send_Email($email,$subject,$msg);        
                
                
                
                
                ///////////
            return 'addbyemail';
            }
             
           
            
            

        } 
         
         
     }
     
 
    
    
}

 

 
 

 
 public function UploadImg($targetPath){
    if (!empty($_FILES)) {
 if(!is_dir($targetPath)){
      @mkdir($targetPath,0775);
     
 }       
$allowedExts = array("GIF", "JPEG", "JPG", "PNG");
$temp = explode(".", $_FILES["file1"]["name"]);
$tempFile = $_FILES['file1']['tmp_name'];
$extension = end($temp);  
 

if ((($_FILES["file1"]["type"] == "image/gif")
|| ($_FILES["file1"]["type"] == "image/jpeg")
|| ($_FILES["file1"]["type"] == "image/jpg")
|| ($_FILES["file1"]["type"] == "image/pjpeg")
|| ($_FILES["file1"]["type"] == "image/x-png")
|| ($_FILES["file1"]["type"] == "image/png"))
&& ($_FILES["file1"]["size"] < 500000)
&& in_array(strtoupper($extension), $allowedExts))
  {
          
      
  if ($_FILES["file1"]["error"] > 0)
    {
       
 return false;
    } 
    
    else {
        
     
       
       
   
  if (($file = @fopen($tempFile, 'rb')) === FALSE) // "b" to force binary
            {
                return false; // Couldn't open the file, return FALSE
            }
   
     if (($data = @file_get_contents($file)) === FALSE)
        {
             return false;
        }

      
     
   if ($this->security->xss_clean($data , TRUE) === FALSE){
       
       return false;
   }
   
   $filename = md5(uniqid(mt_rand())).'.'.$extension;     
 $targetFile = $targetPath . $filename;     
   if ( !@move_uploaded_file($tempFile,$targetFile)){
    
    
        return false;
 }  
     
 $config['image_library'] = 'gd2';
$config['source_image'] = $targetFile;
$config['create_thumb'] = false;
$config['maintain_ratio'] = TRUE;
$config['width']     = 75;
$config['height']   = 50;;
$this->load->library('image_lib', $config);     
     
   if ( ! $this->image_lib->resize())
{
    return false;
} else {
    
    return $targetFile;
}     
        
 }

  } else {
return false;     
  }        
 ///////////////////////       
    } else {        
        return null;       
    }  
        
 }
 
 
 
 
 
 
  public function Enabled_Account($id,$keys){
     
 $this -> db -> where(array('ID' => (int) $id));
        $query = $this -> db -> get('members');
        $row = $query -> row_array();
         if ($query -> num_rows() != 0) {
           $v=md5($row['ID'].$row['email']. $this->getToken());
           
           if($v==$keys){
               
         $data = array(
               'active' => 'on',

            );      
               
         $this -> db -> where(array('ID' => $id));              
        $query = $this -> db -> update('members',$data);  
               return 'Active_Account'; 
           } else {
               
                return 'Error_Link';
           }
                      
       } else {
           
           return 'Error_Link';
       }
     
 }
 
 
 
 
 
 
 
 public function Restor_Password(){
  $api=$this->load->library('apiservices');
  $email=$this->input->post('email_r',true);
    $newpass= $api->generateRandomString(6);
    
    
   $this -> db -> where(array('email' => $email));
        $query = $this -> db -> get('members');
       
       if ($query -> num_rows() != 0) {
             //found
       $row=$query->row_array();
       
       //send email
       $cryptPass = md5($newpass);
       $msg= $this->lang->line('mem_restoremsg1');
               $v=md5($row['ID'].$row['email']. $this->getToken());
               $msg.='<br/><hr/><br/>';
               $link=current_url().'/repass/'.$cryptPass.'/'.time().'/'.base64_encode($row['email']).'/'.$v;     
                $msg.=$link;  
             $msg.= "<br/><hr/>";
               $msg.=   $this->lang->line('mem_restoremsg2');
               $msg.="<br/><hr/>";
               $msg.= $newpass;
              $subject =  $this->lang->line('mem_restoresubject');     
                    
              $this->api->Send_Email($row['email'],$subject,$msg);      
                    
                return 'Email_SendEmail';  
 
       /////////////
       } else {
           
           
           return 'Error_Found';
       }   
    
    
    
 }
 
 
 
 
 
 public function Active_Password(){
     
     $segs = $this->uri->segment_array();
       if(in_array('repass',$segs)){
     
      $keys=array_search("repass",$segs);
           //check pass
         if (isset($segs[$keys+1])){
             //check time
            if (isset($segs[$keys+2])){
                //check email
                if (isset($segs[$keys+3])){
               //check email
               //cech token
               if(!isset($segs[$keys+4])){
                   return 'ERROR_LINK'; 
               }
               
                 $pass=$segs[$keys+1];
                 $time=$segs[$keys+2];
                 $emailc=$segs[$keys+3];
                 $token=$segs[$keys+4];
                 $email=base64_decode($emailc);
                 //check time one houre
                   $expires=time()- 86400;
                   
                     if( $time > $expires){
                   //  echo 'ok'.$email;   
                         
                         
        $this -> db -> where(array('email' => $email));
        $query = $this -> db -> get('members');
       
       if ($query -> num_rows() != 0) {   
                  //found and active
                   $row=$query->row_array();
                  // 
                 $v=md5($row['ID'].$row['email']. $this->getToken());
                 if($v!= $token){
                   return 'ERROR_LINK';     
                 }   
                 ///  
                   
                $data = array(
               'password' => $pass,

            );      
               
         $this -> db -> where(array('ID' => (int) $row['ID']));              
        $query = $this -> db -> update('members',$data);       
              if ($this -> db -> affected_rows()) {
                return 'Change';  
                  
              }           
            ///             
       } else {
             return 'ERROR_LINK';  
           
       }            
                         
                        
                        
                    } else {
                        
                     return 'ERROR_LINK';    
                    }
                   
                   
                   


                } else {
                            
                  return 'ERROR_LINK';         
                    
                }
                
                
                
            } else {
                
              return 'ERROR_LINK';  
            } 
             
             
             
             
         }  else {
             
             return 'ERROR_LINK';
         } 
           
           
           
     
     
       } else {
           
           return 'ERROR_LINK';
       }
 }
 
 
 
 
 
 public function CurrentUser(){
     $email=$this->session->userdata('IUser_email');
    $this -> db -> where(array('email' => $email));
        $query = $this -> db -> get('members');  
        $row=$query->row_array();
        return $row;
 }
 
 
 




public function setUpdateMembers(){
     
    $userdata=$this->CurrentUser();
     
     $country=$this->input->post('country',true);
     $gender=$this->input->post('gender');
    
     $name=$this->input->post('name',true);
     $password=$this->input->post('password',true);
      
     
     
     if( $userdata['password']==$password){
         $pass=$password;
         
     } else {
      $pass=md5($password);   
         
     }
     
     //echo 'ID !=',  $key_report['ID'];
   
     $this->db->where('email', $userdata['email'] ); 
      $this->db->where('ID !=',$userdata['ID']);
    // $this->db->or_where('email', $email ); 
     $query = $this -> db -> get('members');
   //$row = $query -> row_array();
     
     if ($query -> num_rows() != 0) {
       
      return 'found';
     }
     else {
         
          $filename= $this->UploadImg('assets/media/profile/');
          
         if($filename!= ''){
              @unlink($userdata['pic']);
             $filename = $filename;
         } else {
            
             $filename = $userdata['pic'];
             
         }
         
       $datacat=array(
       'name'=>$name,
       'password'=>  $pass,
       'gender'=> $gender,
       'pic'=> $filename,
       'country'=> $country
       );  
         
     $this->db->where('ID',   $userdata['ID']);
    $this -> db -> update('members', $datacat);
    if ($this -> db -> affected_rows()) {
            return 'update';

        } else {
               // return false;
            
        }
         
         
     }
     
 
    
    
}
























 
 
 
    
    
    
}