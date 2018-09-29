<?php

class Admin_model extends CI_Model {

 public $html=array();

    public function __construct() {
        // Call the Model constructor
        parent::__construct();
       
    }

    ////////////begin option///////////////////
    public function setOptions() {

        $query = $this -> db -> get('options');

        $dataoptions = array('capacity' => (int)$this -> input -> post('capacity', true), 'copyright' => $this -> input -> post('copyright', true), 'author' => $this -> input -> post('author', true), 'description' => $this -> input -> post('description', true), 'facebook' => $this -> input -> post('facebook', true), 'twitte' => $this -> input -> post('twitte', true), 'youtube' => $this -> input -> post('youtube', true), 'google_plus' => $this -> input -> post('google_plus', true), 'web_status' => $this -> input -> post('web_status', true), 'web_status_message' => $this -> input -> post('web_status_message', true), 'web_cache' => $this -> input -> post('web_cache', true), 'web_cache_time' => (int)$this -> input -> post('web_cache_time', true), 'notification_time' => (int)$this -> input -> post('notification_time', true), 'web_title' => $this -> input -> post('web_title', true), 'keywords' => $this -> input -> post('keywords', true), 'mail_sendmail' => $this -> input -> post('mail_sendmail', true), 'mail_sender' => $this -> input -> post('mail_sender', true), 'mail_smtp' => $this -> input -> post('mail_smtp', true), 'email_received' => $this -> input -> post('email_received', true), 'mail_server' => $this -> input -> post('mail_server', true), 'mail_port' => $this -> input -> post('mail_port', true), 'mail_user' => $this -> input -> post('mail_user', true), 'mail_pwd' => $this -> input -> post('mail_pwd', true), 'mail_type' => $this -> input -> post('mail_type', true), 'mail_encryption' => $this -> input -> post('mail_encryption', true));

        if ($query -> num_rows() != 0) {
            //update
            $this -> db -> update('options', $dataoptions);

        } else {
            //insert
            $this -> db -> insert('options', $dataoptions);
        }

        if ($this -> db -> affected_rows()) {
            return true;

        }

    }

    //////////////end options///////////////

    ////////////begin option///////////////////
    public function getOptions() {

        $query = $this -> db -> get('options');
        $row = $query -> row_array();
        return $row;

    }

    //////////////end options///////////////

    //////////////////////backup///////////////////////

    function backup_db() {
        $this -> load -> dbutil();
        switch($this->input->post('backup_type',true)) {
            case "txt" :
                $filename = time() . '_' . date('Y-m-d h:i:s a') . '.sql';
                break;

            case "zip" :
                $filename = time() . '_' . date('Y-m-d h:i:s a') . '.zip';
                break;
        }

        $prefs = array(
        // 'tables'      => array('table1', 'table2'),  // Array of tables to backup.
        //  'ignore'      => array(),
        'format' => $this -> input -> post('backup_type', true), 'filename' => $filename, 'add_drop' => TRUE, 'add_insert' => TRUE, 'newline' => "\n");

        $backup = &$this -> dbutil -> backup($prefs);

        $this -> load -> helper('file');
        write_file(base_url('assets/tmp/' . $filename), $backup);

        $this -> load -> helper('download');
        force_download($filename, $backup);

    }

    ////////////////////////////end backup////////////

    //////////////////////////////backup and send email

    function backup_db_email() {
        $api = $this -> load -> library('apiservices');
        $this -> load -> dbutil();
        switch($this->input->post('backup_type',true)) {
            case "txt" :
                $filename = time() . '.sql';
                break;

            case "zip" :
                $filename = time() . '.zip';
                break;
        }

        $prefs = array(
        // 'tables'      => array('table1', 'table2'),  // Array of tables to backup.
        //  'ignore'      => array(),
        'format' => $this -> input -> post('backup_type', true), 'filename' => $filename, 'add_drop' => TRUE, 'add_insert' => TRUE, 'newline' => "\n");

        $backup = &$this -> dbutil -> backup($prefs);

        $this -> load -> helper('file');

        write_file("./assets/tmp/" . $filename, $backup);

        $to = $this -> input -> post('mail_send', true);
        $Subject = "Backup database";
        $Message = "Please Download Database File";
        $result = $api -> Send_Email($to, $Subject, $Message, $filename);

        @unlink("./assets/tmp/" . $filename);
        if ($result == true) {
            return TRUE;
        } else {
            return false;

        }

    }

    //get visitors

    public function getVisitors() {
        $api = $this -> load -> library('apiservices');

        $seg = $this -> uri -> segment(3);
        if ($seg == "") {
            $start = 1;
        } else {
            $start = (int) $seg;
        }
        
        $startResults = ($start - 1) * 30;
        
       $record_total =$this->db->count_all('visitors');
        
         $this->db->order_by("visitor_time", "desc"); 
          $this->db->limit(30, $startResults); 
        $query = $this -> db -> get('visitors');
          
        $row_vistors = $query -> result_array();

       // $record_total = $query -> num_rows();

        $options = array('class' => 'uk-pagination', 'url' => 'cp/visitor', 'total' => $record_total, 'per' => '30', 'uri' => 3);

        $result = array('Rows_visitors' => $row_vistors, 'Total_visitors' => $record_total, 'Paging_visitors' => $api -> Pager($options), );
        return $result;

    }





 public function setOptionsVistors() {

 $query = $this -> db -> get('visitors_counters');
  
        $dataoptions = array(
        'visitors_counter' => (int)$this -> input -> post('visitors_counter', true),
         'visitors_type' => $this -> input -> post('visitors_type', true),
          'visitors_code_counter' => $this -> input -> post('visitors_code_counter', true),
           'visitors_style' => $this -> input -> post('visitors_style', true),
            'visitors_template' => $this -> input -> post('visitors_template', true),
             'visitors_discover' => $this -> input -> post('visitors_discover', true),
              'vistor_template_code' => $this -> input -> post('vistor_template_code'),
             
                       );

        if ($query -> num_rows() != 0) {
            //update
            $this -> db -> update('visitors_counters', $dataoptions);

        } else {
            //insert
            $this -> db -> insert('visitors_counters', $dataoptions);
        }

        if ($this -> db -> affected_rows()) {
            return true;

        }
  }


public function getOptionsVistors() {
        $query = $this -> db -> get('visitors_counters');
        $row = $query -> row_array();
        return $row;
    
}






public function masmail_sendmail(){
   $api = $this -> load -> library('apiservices');
        $config['upload_path'] = './assets/tmp/';
       $config['allowed_types'] = '*';

        $this->load->library('upload', $config);
      $attach=false;
   if ( $this->upload->do_upload('file1')){
       $upload_data=$this->upload->data();
        $filename =   $upload_data['file_name']; 
       
        $attach=$filename;
       
       }
    
     
$result=$api->Send_Email($this->input->post('to'),$this->input->post('subject'),$this->input->post('msg'),$attach);
 return  $result;
}







    //get message

    public function getInboxMessage() {
        $api = $this -> load -> library('apiservices');

        $seg = $this -> uri -> segment(4);
         
        if ($seg == "") {
            $start = 1;
        } else {
            $start = (int) $seg;
        }
      
      $startResults = ($start - 1) * 30;
        
       $record_total =$this->db->count_all('message');
        $this->db->order_by("ID", "desc");
        
       $this->db->limit(30, $startResults); 
       
        $query = $this -> db -> get('message');
          
        $row_inbox = $query -> result_array();

   

        $options = array('class' => 'uk-pagination', 'url' => 'cp/masmail/page', 'total' => $record_total, 'per' =>  30, 'uri' => 4);

        $result = array('Rows_inbox' => $row_inbox, 'Total_inbox' => $record_total, 'Paging_inbox' => $api -> Pager($options) );
        return $result;

    }



///////////////////////////


    //get message

    public function getmaillist() {
        $api = $this -> load -> library('apiservices');

        $seg = $this -> uri -> segment(4);
         
        if ($seg == "") {
            $start = 1;
        } else {
            $start = (int) $seg;
        }
      
      $startResults = ($start - 1) * 30;
        
       $record_total =$this->db->count_all('maillist');
        $this->db->order_by("ID", "desc");
        
       $this->db->limit(30, $startResults); 
       
        $query = $this -> db -> get('maillist');
          
        $row_maillist = $query -> result_array();

   

        $options = array('class' => 'uk-pagination', 'url' => 'cp/masmail/mailinglist', 'total' => $record_total, 'per' =>  30, 'uri' => 4);

        $result = array('Rows_maillist' => $row_maillist, 'Total_maillist' => $record_total, 'Paging_maillist' => $api -> Pager($options) );
        return $result;

    }





/////////////////////////

















public function masmail_addEmail(){
    
   $query = $this->db->get_where('maillist', array('maillist_email' => $this -> input -> post('to', true))); 
    
    $total= $query -> num_rows();
    if($total==0){
      $data = array(
 'maillist_email' => $this -> input -> post('to', true),
 'mailist_date' => date('Y-d-m h:i:s')
  
);

$this->db->insert('maillist', $data); 

if($this->db->affected_rows() > 0)
{
    // Code here after successful insert
    return true;
}
    else {
        return false;
    }


 
     
    } else {
        
        return false;
        
    }
    
 
    
}




public function delete_maillist(){
    $this->db->db_debug = false;
    $data_delete=$this -> input -> post('del', true);
     $ids=@implode(',',$data_delete);
    @$this->db->delete('maillist',"ID in($ids)"); 
    
}

public function delete_Inbox(){
    
    $data_delete=$this -> input -> post('del', true);
     $ids=@implode(',',$data_delete);
    @$this->db->delete('message',"ID in($ids)"); 
    
}



public function getinfoEmail(){
       $id =(int) $this -> uri -> segment(4);
    
    $this -> db -> where(array('ID' => $id));
        $query = $this -> db -> get('maillist');
        $row = $query -> row_array();
    return $row;
}






public function delete_message(){
    $id =(int) $this -> uri -> segment(4);
    
    $this -> db -> where(array('ID' => $id));
    @$this->db->delete('message'); 
    redirect(base_url('cp/masmail'));
}









public function getNumEmail(){
    
    $data_update = array(
               'maillist_send' => '0'

            );
$this->db->update('maillist', $data_update); 
    
    
    
return $this->db->count_all('maillist');  
}


/////////////////////////

public function dosend_email($subject,$message){
    $api = $this -> load -> library('apiservices');
    
         $this->db->where('maillist_send', '0');   
         $query = $this -> db -> get('maillist');
          
        $row_maillist = $query -> result_array();
    
    
    if(is_array($row_maillist) || count($row_maillist)!=0 ){
        
        $c=0;
        foreach($row_maillist as $rs_mail){
            
          //in
          $c++;
            if($c==10){
              break;  
            }
           $return_mail= $api->Send_Email($rs_mail['maillist_email'], $subject, $message);
            
                $data_update = array(
               'maillist_send' => '1'
                           );
        $this->db->where('ID', $rs_mail['ID']);     
        $this->db->update('maillist', $data_update); 
            
            
      
          //in  
        }
        
        
        
    }
    
        $this->db->where('maillist_send', '1');   
       $query = $this -> db -> get('maillist');
     $total= $query -> num_rows();
            
            return $total;
    
    
} 





//////////////////////////////////////////////////



 public function setOptionsContactus() {

 $query = $this -> db -> get('maillist_options');
  
        $dataoptions = array(
         'options_alertemail' => $this -> input -> post('options_alertemail', true),
          'options_useform' => $this -> input -> post('options_useform', true),
           'options_useinfo' => $this -> input -> post('options_useinfo', true),
            'options_info' => $this -> input -> post('options_info'),
             'options_order' => $this -> input -> post('options_order', true),
            
             
                       );

        if ($query -> num_rows() != 0) {
            //update
            $this -> db -> update('maillist_options', $dataoptions);

        } else {
            //insert
            $this -> db -> insert('maillist_options', $dataoptions);
        }

        if ($this -> db -> affected_rows()) {
            return true;

        }
  }



 public function setOptionsMasmail() {

 $query = $this -> db -> get('maillist_options');
  
        $dataoptions = array(
         'options_useMaillist_form' => $this -> input -> post('options_useMaillist_form', true),
          'options_useMaillist_code' => $this -> input -> post('options_useMaillist_code', true),
           'options_useMaillist_alert' => $this -> input -> post('options_useMaillist_alert', true),
            'options_useMaillist_dellink' => $this -> input -> post('options_useMaillist_dellink',true),
           
                       );

        if ($query -> num_rows() != 0) {
            //update
            $this -> db -> update('maillist_options', $dataoptions);

        } else {
            //insert
            $this -> db -> insert('maillist_options', $dataoptions);
        }

        if ($this -> db -> affected_rows()) {
            return true;

        }
  }



public function getOptionsMaillist() {
        $query = $this -> db -> get('maillist_options');
        $row = $query -> row_array();
        return $row;
    
}






public function getinfoInbox(){
       $id =(int) $this -> uri -> segment(4);
    
    ///////////////////
    $data_update = array(
               'read' => '1'
                           );
        $this->db->where('ID', $id );     
        $this->db->update('message', $data_update); 
    /////////////
    
    
    
    $this -> db -> where(array('ID' => $id));
        $query = $this -> db -> get('message');
        $row = $query -> row_array();
    return $row;
}





public function replay_Email(){
    $api = $this -> load -> library('apiservices');
    $to=$this -> input -> post('inbox_email', true);
    $subject=$this -> input -> post('title_msg', true);
    $msg=$this -> input -> post('msg_replay');
   
     $return_mail= $api->Send_Email($to, $subject, $msg);
  return $return_mail;
    
    
    
    
}


public function num_table($table){
    
    return $this->db->count_all($table);  
}



public function get_new_messgae() {
      $this->db->where('read', 0 );  
      
       $this->db->order_by("ID", "desc");
       //   $this->db->limit(30); 
        $query = $this -> db -> get('message');
       $len= $query -> num_rows();
        $row = $query -> result_array();
        $re=array('row'=>$row,'len'=>$len);
        
        return $re;
    
}

public function get_notifcation_num() {
    $this->db->where('read_message', 1 );  
  
     $query = $this -> db -> get('notification');
     
       $len= $query -> num_rows();
    return $len;
}




///////////////////


public function get_new_notifcation() {
  // $expire_time = 60 * 60 * 24 * 7;
  //   $last_date = time() - $expire_time;
     // $this->db->where('notification', 1 );  
     // $this->db->where('time_msg <', $last_date);
      $this->db->order_by("time_msg", "desc");
          $this->db->limit(10); 
        $query = $this -> db -> get('notification');
      // $len= $query -> num_rows();
        $row = $query -> result_array();
         
        
        return $row;
    
}




public function set_notification_read(){
    
     $data_update = array(
               'read_message' => '0'
                           );
      
        $this->db->update('notification', $data_update); 
}










  public function getall_notification() {
        $api = $this -> load -> library('apiservices');

        $seg = $this -> uri -> segment(3);
        if ($seg == "") {
            $start = 1;
        } else {
            $start = (int) $seg;
        }
        
        $startResults = ($start - 1) * 30;
        
       $record_total =$this->db->count_all('notification');
        
         $this->db->order_by("time_msg", "desc"); 
          $this->db->limit(30, $startResults); 
        $query = $this -> db -> get('notification');
          
        $row_notifcation = $query -> result_array();

       // $record_total = $query -> num_rows();

        $options = array('class' => 'uk-pagination', 'url' => 'cp/notifcation', 'total' => $record_total, 'per' => '30', 'uri' => 3);

        $result = array('Rows_notifcation' => $row_notifcation, 'Total_notifcation' => $record_total, 'Paging_notifcation' => $api -> Pager($options), );
        return $result;

    }





 public function setOptions_media() {

        $query = $this -> db -> get('options');

        $dataoptions = array('media_filetype' =>$this -> input -> post('media_filetype', true), 
        'media_upload_type' => $this -> input -> post('media_upload_type', true),
         'media_gd' => $this -> input -> post('media_gd', true), 
         'media_gd_type' => $this -> input -> post('media_gd_type', true),
          'media_gd_w' => $this -> input -> post('media_gd_w', true),
           'media_gd_h' => $this -> input -> post('media_gd_h', true), 
           'media_file_name' => $this -> input -> post('media_file_name', true));
         

        if ($query -> num_rows() != 0) {
            //update
            $this -> db -> update('options', $dataoptions);

        } else {
            //insert
            $this -> db -> insert('options', $dataoptions);
        }

        if ($this -> db -> affected_rows()) {
            return true;

        }

    }









public function UploadFiles(){
    $options=$this->getOptions();
    
   if (!empty($_FILES)) {
   
   
       
       ////////////////////////////////////////
      $tempFile = $_FILES['userfile']['tmp_name'];
      $NameFile= $_FILES['userfile']['name'];
       $targetPath = $_REQUEST['folder'] . '/';  
    //
    $ext_allow =($options['media_filetype']!='')? $options['media_filetype']:'*';
    
    $ext = strtolower(end(explode(".", $NameFile)));
    $filewithout_ext=reset(explode(".", $NameFile));
    if($ext_allow != '*'){
        $extentions=explode(',',$ext_allow);
     if(!in_array(strtolower($ext),$extentions)){
         if($options['media_upload_type']=='ajax'){
  /*  header("HTTP/1.1 404"); //any 4XX error will work
    exit();*/
    return false;
         }
         return false;
     } } 

   //configure name  normal auto
   
   if($options['media_file_name']=='normal')
   {
       
       if ( !file_exists($targetPath.$NameFile)){
            $filename=$NameFile;
       }
       else {
           
           for ($i = 1; $i < 100; $i++){
            if ( ! file_exists($targetPath .$filewithout_ext.'_'.$i.'.'.$ext))
            {
                $filename = $filewithout_ext.'_'.$i.'.'.$ext;
                break;
            }   
           
       }
           
       
   }
       
       
   } 
   
   
   else {
            mt_srand();
            $filename = md5(uniqid(mt_rand())).'.'.$ext; 
       
   }
   
 //////////////////////////////////////////////////////////////////////////  
   
   
   
  if (($file = @fopen($tempFile, 'rb')) === FALSE) // "b" to force binary
            {
                return FALSE; // Couldn't open the file, return FALSE
            }
   
     if (($data = @file_get_contents($file)) === FALSE)
        {
            return FALSE;
        }

      
     
   if ($this->security->xss_clean($data , TRUE) === FALSE){
       
       return false;
   }
   
   
  
       
     
   
    $targetFile = $targetPath . $filename;

  //  mkdir(str_replace('//','/',$targetPath), 0777, true);
 if ( ! @move_uploaded_file($tempFile,$targetFile)){
     return false;
 }
   
       
     //configure gd  
       
       
 $image_img = array('gif', 'jpg', 'jpeg', 'png');   
       
     if($options['media_gd']=='On'){
             //load library
       //  $this->load->library('image_lib');
         //ok work
         if(in_array($ext,$image_img)){
          
            //////
 if($options['media_gd_type']=='orgine'){
  $config['thumb_marker'] = '';
         
 }          
$config['image_library'] = 'gd2';
$config['source_image'] = $targetFile;
$config['create_thumb'] = TRUE;
$config['maintain_ratio'] = TRUE;

$config['width']     = ($options['media_gd_w']!='')? $options['media_gd_w'] :75;
$config['height']   = ($options['media_gd_h']!='')? $options['media_gd_h'] :50;;
 $this->load->library('image_lib', $config); 
 
 //_thumb

 /*
  * echo $path_parts['dirname'], "\n";
echo $path_parts['basename'], "\n";
echo $path_parts['extension'], "\n";
echo $path_parts['filename'], "\n"; // since PHP 5.2.0
  * 
  * */
  $path_parts = pathinfo($targetFile);
  $ext = pathinfo($targetFile, PATHINFO_EXTENSION);
  $file_w_ext = basename($path_parts['basename'], ".".$ext); 
  
  if($options['media_gd_type']=='orgine'){
   $gdfile=$targetFile; 
      
  } else {
   $gdfile=$targetPath.$file_w_ext.'_thumb.'.$ext;
  }
 
if ( ! $this->image_lib->resize())
{
    return false;
}         
            
            /////// 
             
             
             
         }
         
         
         
     }  
////////////////for ajax////////
$newdata =@array('File_name'  => $targetFile,'File_GD' => @$gdfile);

 $query = $this -> db -> get('tmpos');
 /////////////
 
 
  if ($query -> num_rows() != 0) {
            //update
            $this -> db -> update('tmpos', $newdata);

        } else {
            //insert
            $this -> db -> insert('tmpos', $newdata);
        }
 
 
 
  
      return @array('File_name'=>$targetFile,'File_GD'=>$gdfile); 
   } 

    
    
}




 

 public function getCat(){
 
        $api = $this -> load -> library('apiservices');

        $seg = $this -> uri -> segment(3);
        if ($seg == "") {
            $start = 1;
        } else {
              $start = (int) $seg;
        }
        
         $startResults = ($start - 1) * 30;
        
        
       $record_total =$this->db->count_all('categories');
        
          $this->db->order_by("cat", "asc"); 
          $this->db->where('cat', 0 ); 
        //  $this->db->limit(30, $startResults); 
          
        $query = $this -> db -> get('categories');
        
        
          $row_cat = $query -> result_array();
       // $this->html=array();
        if(is_array( $row_cat )){
                $newcat=array();
            foreach($row_cat as $row_maincat){
              // $this->html=array();
               
               @$this->html[]= array(
                 'ID'=>$row_maincat['ID'],    
            'name1'=>$row_maincat['name'],  
             'name2'=>$row_maincat['name_allies'],  
              'cat'=>$row_maincat['cat'],   
              'pic'=>$row_maincat['pic'],
                'level'=>''
               ); 
                 
           
            
            $this->html=$this->getsubCat($row_maincat['ID']); 
           
           
            }
            
        }
        
        
         $options = array('class' => 'uk-pagination', 'url' => 'cp/cat', 'total' => $record_total, 'per' => '30', 'uri' => 3);

        $result = array('Rows_cat' => $this->html, 'Total_cat' => $record_total, 'Paging_cat' => $api -> Pager($options), );
        return $result; 
        
        
        
     //  return ;
     
 }
 
 
 
   public function getsubCat($cat){
      //$menu=array();
          $this->db->where('cat', $cat ); 
          $query = $this -> db -> get('categories');
     
          $row_cat1 = $query -> result_array();
         // $this->html=array();
          if(is_array( $row_cat1 )){
          foreach($row_cat1 as $row_subcat){
           
              $level='';
               for($i=0;$i < $row_subcat['level'];$i++){
          @$level.="ـــــــــــــــــــــــــــ&nbsp;";
                }
               
             $this->html[] = array(
             
               'ID'=>$row_subcat['ID'],    
            'name1'=>$row_subcat['name'],  
             'name2'=>$row_subcat['name_allies'],  
              'cat'=>$row_subcat['cat'],   
              'pic'=>$row_subcat['pic'],
                'level'=>'|'.$level

             
             
             ); 
              
              
            $this->html=$this->getsubCat($row_subcat['ID']); 
             
          
              
              
          }
          
        }
          
          return   $this->html;
     
     
 }








    
public function MainCatSelect($class,$module,$cat,$catselect=0){
  $TPL_Config = $this -> config -> item('Template_Type');
$html="";
$tablename = $this -> db -> dbprefix('categories');
$rows=$this->db->query("select * from ".$tablename . "  where `cat`='$cat' and `module` ='$module' ");
//print_r($rows->result_array());
$html="<select   class=\"$class\"  name=\"cat\" id='cat' >
 
<option value='0' >Main Section</option>";

foreach($rows->result_array() as $row){
  
 $lens=$this->db->query("select * from " . $tablename ." where `cat`='$row[ID]' ");
  
 
if($lens->num_rows!=0){
  //if($TPL_Config != 'A' && $TPL_Config!='B'){
   if($TPL_Config =='E' || $TPL_Config =='F'){ 
$html.="<optgroup title=\"You cant use this Section\" label=\"$row[name] .'('.$row[name_allies].')'\" class=\"blocks_red\"></optgroup>";
     } else {
$html.="<optgroup title=\"You cant use this Section\" label=\"$row[name]\" class=\"blocks_red\"></optgroup>";
         
         
     }


} 
else {
if($row["ID"]==$catselect){
     // if($TPL_Config != 'A' && $TPL_Config!='B'){
         if($TPL_Config =='E' || $TPL_Config =='F'){ 
$html.="<option class='option' selected='selected' value=\"$row[ID]\">$row[name] .'('.$row[name_allies].')'</option>";
      } else {
          $html.="<option class='option' selected='selected' value=\"$row[ID]\">$row[name]</option>";
          
      }
} else {
        // if($TPL_Config != 'A' && $TPL_Config!='B'){
    if($TPL_Config =='E' || $TPL_Config =='F'){ 
$html.="<option class='option' value=\"$row[ID]\">$row[name] .'('.$row[name_allies].')'</option>";
         } else {
          $html.="<option class='option' value=\"$row[ID]\">$row[name] </option>";
             
             
         }
             
}
}
  $html.=$this->SubCatSelect($row['ID'],$catselect);
}

$html.="</select>";
return $html;
}
//***********************************
public function SubCatSelect($ID,$catselect){
$TPL_Config = $this -> config -> item('Template_Type');
$html="";
 $tablename = $this -> db -> dbprefix('categories');
$rows2=$this->db->query("select * from ". $tablename ." where `cat`='$ID' ");

foreach($rows2->result_array() as $row2){
  $lens=$this->db->query("select * from ". $tablename ."  where `cat`='$row2[ID]' ");
//echo $lens."...................";
 

 if($lens->num_rows()!=0){
for($i=0;$i < $row2['level'];$i++){
@$bar.="--- &nbsp;";
}
$html.="<optgroup title='You cant use this Section' label='$row2[name] $bar' class='blocks_red' ></optgroup>";
} 
else {
if($row2["ID"]==$catselect){
     
$html.="<option class='option' selected='selected'  value='$row2[ID]' dir='rtl'>";
} else {
$html.="<option class='option' value='$row2[ID]' dir='rtl'>";
}


for($i=0;$i < $row2['level'];$i++){
$html.="--- &nbsp;";
}
if($TPL_Config =='E' || $TPL_Config =='F'){ 
$html.="$row2[name] .'('.$row2[name_allies].')'</option>";
} else {
 $html.="$row2[name]</option>";   
}

}
$html.=$this->SubCatSelect($row2['ID'],$catselect);

}

return $html;
}

    



    public function MainCatSelect2($class,$module,$catselect,$cat=0){
  $TPL_Config = $this -> config -> item('Template_Type');
$html="";

$tablename = $this -> db -> dbprefix('categories');
$rows=$this->db->query("select * from ".$tablename . "  where `cat`='$cat' and `module` ='$module'");
 
$html="<select   class=\"$class\"  name=\"cat\" id='cat' >

<option value='0' >Main Section</option>";

foreach($rows->result_array() as $row){
  
 if($row["ID"]==$catselect){
 // if($TPL_Config != 'A' && $TPL_Config!='B'){
     if($TPL_Config =='E' || $TPL_Config =='F'){      
$html.="<option class='option' selected='selected' value=\"$row[ID]\">$row[name] ( $row[name_allies] )</option>";
} else {
  $html.="<option class='option' selected='selected' value=\"$row[ID]\">$row[name] </option>";  
}
} else {
    // if($TPL_Config != 'A' && $TPL_Config!='B'){
        if($TPL_Config =='E' || $TPL_Config =='F'){ 
$html.="<option class='option' value=\"$row[ID]\">$row[name] ( $row[name_allies] )</option>";
     } else {
         $html.="<option class='option' value=\"$row[ID]\"> $row[name]</option>";
     }
}
 
 
  $html.=$this->SubCatSelect2($row['ID'],$catselect);
   
}

$html.="</select>";
return $html;
}
//***********************************






    public function MainCatSelect1($class,$catselect,$cat=0){
  $TPL_Config = $this -> config -> item('Template_Type');
$html="";

$tablename = $this -> db -> dbprefix('categories');
$rows=$this->db->query("select * from ".$tablename . "  where `cat`='$cat' ");
 
$html="<select   class=\"$class\"  name=\"cat\" id='cat' >

<option value='0' >Main Section</option>";

foreach($rows->result_array() as $row){
  
 if($row["ID"]==$catselect){
 // if($TPL_Config != 'A' && $TPL_Config!='B'){
     if($TPL_Config =='E' || $TPL_Config =='F'){      
$html.="<option class='option' selected='selected' value=\"$row[ID]\">$row[name] ( $row[name_allies] )</option>";
} else {
  $html.="<option class='option' selected='selected' value=\"$row[ID]\">$row[name] </option>";  
}
} else {
    // if($TPL_Config != 'A' && $TPL_Config!='B'){
        if($TPL_Config =='E' || $TPL_Config =='F'){ 
$html.="<option class='option' value=\"$row[ID]\">$row[name] ( $row[name_allies] )</option>";
     } else {
         $html.="<option class='option' value=\"$row[ID]\"> $row[name]</option>";
     }
}
 
 
  $html.=$this->SubCatSelect2($row['ID'],$catselect);
   
}

$html.="</select>";
return $html;
}
//**************************





public function SubCatSelect2($ID,$catselect){
$TPL_Config = $this -> config -> item('Template_Type'); 
$html="";
 $tablename = $this -> db -> dbprefix('categories');
$rows2=$this->db->query("select * from ". $tablename ." where `cat`='$ID' ");

foreach($rows2->result_array() as $row2){
  $lens=$this->db->query("select * from ". $tablename ."  where `cat`='$row2[ID]' ");
 

 if($row2["ID"]==$catselect){
     
$html.="<option class='option' selected='selected'  value='$row2[ID]' dir='rtl'>";
     
     
} else {
$html.="<option class='option' value='$row2[ID]' dir='rtl'>";
}

for($i=0;$i < $row2['level'];$i++){
$html.="--- &nbsp;";
}
 //if($TPL_Config != 'A' && $TPL_Config!='B'){
     if($TPL_Config =='E' || $TPL_Config =='F'){     
$html.="$row2[name] ( $row2[name_allies] )</option>";
 } else {
   $html.="$row2[name]</option>";  
 }

$html.=$this->SubCatSelect2($row2['ID'],$catselect);

}

return $html;
}

    























public function setNewCat(){
     
     $name=$this->input->post('name1',true);
     $name_alies=$this->input->post('name2');
     $name2= (isset($name_alies))? $this->input->post('name2'):'';
     $cat=$this->input->post('cat',true);
     $img=$this->input->post('field_two',true);
     $module=$this->input->post('module',true);
    $this->db->where('name', $name ); 
     $this->db->where('name_allies', $name2 ); 
     $query = $this -> db -> get('categories');
  //  $row = $query -> row_array();
     
     if ($query -> num_rows() != 0) {
         return false;
     }
     else {
        //get level
        $this->db->where('ID', $cat ); 
     $query = $this -> db -> get('categories');
      $row = $query -> row_array();
      if($cat==0){
          @$level=0;
      } else {
         @$level= $row['level']+1;    
          
      }
          //insert
         $datacat=array(
         'name'=>$name,
          'name_allies'=>$name2,
           'cat'=>$cat,
            'pic'=>$img,
            'level'=>$level,
            'module'=> $module
         );
         
        $this -> db -> insert('categories', $datacat);
      

        if ($this -> db -> affected_rows()) {
            return true;

        } else {
                return false;
            
        }
         
         
     }
     
 
    
    
}


public function DeleteCat(){
    
  $this->db->db_debug = false;
     $data_delete=$this -> input -> post('del', true);
   
     $ids=@implode(',',$data_delete);
  
    @$this->db->delete('categories',"ID in($ids) or cat in($ids)"); 
  
    
}

 
 public function get_cat($id) {
$this->db->where('ID', $id ); 
        $query = $this -> db -> get('categories');
        $row = $query -> row_array();
        return $row;

    }




public function setEditCat(){
     $id=$this->input->post('IDS',true);
     $name=$this->input->post('name1',true);
     $name_alies=$this->input->post('name2');
     $name2= (isset($name_alies))? $this->input->post('name2'):'';
     $cat=$this->input->post('cat',true);
     $img=$this->input->post('field_two',true);
     $module=$this->input->post('module',true);
     ///////////////////////
     
        $this->db->where('name', $name ); 
     $this->db->where('name_allies', $name2 );
       $this->db->where('ID !=', $id );
     $query = $this -> db -> get('categories');
      if ($query -> num_rows() != 0) {
         return false;
     }
      else {
          ////
          
            //get level
            
        $this->db->where('ID', $cat ); 
     $query = $this -> db -> get('categories');
      $row = $query -> row_array();
      if($cat==0){
          @$level=0;
      } else {
         @$level= $row['level']+1;    
          
      }


if($cat==$id){
    $cat= $row['cat'];
}

          //insert
         $datacat=array(
         'name'=>$name,
          'name_allies'=>$name2,
           'cat'=>$cat,
            'pic'=>$img,
            'level'=>$level,
              'module'=> $module
         );
         
         $this->db->where('ID', $id ); 
           $this -> db -> update('categories', $datacat);
      

        if ($this -> db -> affected_rows()) {
            return true;

        } else {
                return false;
            
        }
         
         
         
         
         
         
          
          
          
          
          ////
          
      }
      
     
     
     
     
    
    
    
}

/////////////////////////////


    // getMembers

    public function getMembers() {
        $api = $this -> load -> library('apiservices');

        $seg = $this -> uri -> segment(3);
        if ($seg == "") {
            $start = 1;
        } else {
            $start = (int) $seg;
        }
        
        $startResults = ($start - 1) * 30;
        
       $record_total =$this->db->count_all('members');
        
         $this->db->order_by("ID", "desc"); 
          $this->db->limit(30, $startResults); 
        $query = $this -> db -> get('members');
          
        $row_memebers = $query -> result_array();

   

        $options = array('class' => 'uk-pagination', 'url' => 'cp/memebers', 'total' => $record_total, 'per' => '30', 'uri' => 3);

        $result = array('Rows_memebers' => $row_memebers, 'Total_memebers' => $record_total, 'Paging_memebers' => $api -> Pager($options), );
        return $result;

    }




public function DeleteMembers(){
    
  $this->db->db_debug = false;
     $data_delete=$this -> input -> post('del', true);
     
   for($i=0;$i < count($data_delete);$i++){
       $this->db->where('ID', $data_delete[$i] ); 
     $query = $this -> db -> get('members');
      $row = $query -> row_array();
      if(@file_exists($row['pic'])){
          @unlink($row['pic']);
      }
   }
     $ids=@implode(',',$data_delete);

  
  
  
    @$this->db->delete('members',"ID in($ids) "); 
  
    
}








 public function setActiveMembers() {

$dataoptions = array(
         'active' =>'on'
 );
 
     $this->db->db_debug = false;
     $data_delete=$this -> input -> post('del', true);
   
     $ids=@implode(',',$data_delete);
 
 
  $this -> db -> update('members', $dataoptions,"ID in($ids) ");

 if ($this -> db -> affected_rows()) {
            return true;

        }
  }




 public function setDeActiveMembers() {

$dataoptions = array(
         'active' =>'off'
 );
 
     $this->db->db_debug = false;
     $data_delete=$this -> input -> post('del', true);
   
     $ids=@implode(',',$data_delete);
 
 
  $this -> db -> update('members', $dataoptions,"ID in($ids) ");

 if ($this -> db -> affected_rows()) {
            return true;

        }
  }



public function getCountry(){
    
$query = $this -> db -> get('country');
$row = $query -> result_array();
return $row;
     
}









public function setNewMembers(){
     
     $country=$this->input->post('country',true);
     $gender=$this->input->post('gender');
     $roles=$this->input->post('roles',true);
     $name=$this->input->post('fullname',true);
     $email=$this->input->post('email',true);
   //  $username=$this->input->post('username',true);
     $password=$this->input->post('password',true);
     $pic=$this->input->post('field_two',true);
     
    $this->db->where('email', $email ); 
     //$this->db->or_where('username', $username ); 
     $query = $this -> db -> get('members');
  //  $row = $query -> row_array();
     
     if ($query -> num_rows() != 0) {
         return false;
     }
     else {
       $datacat=array(
       'name'=>$name,
       'email'=>$email,
      // 'username'=>$username,
       'password'=> md5($password),
       'gender'=> $gender,
       'roles'=>$roles,
       'pic'=> $pic,
       'date_reg'=>date('Y-m-d h:i:s'),
       'active'=>'on',
       'country'=> $country
       );  
         
    $this -> db -> insert('members', $datacat);
    if ($this -> db -> affected_rows()) {
            return true;

        } else {
                return false;
            
        }
         
         
     }
     
 
    
    
}






 public function get_User() {

$id = $this -> uri -> segment(4);
   if(ctype_digit($id)){  
     
$this->db->where('ID', $id ); 
        $query = $this -> db -> get('members');
        $row = $query -> row_array();
        return $row;
   }
    }














public function setUpdateMembers(){
     
     $key_report=unserialize(base64_decode($this->input->post('reports')));
     
     $country=$this->input->post('country',true);
     $gender=$this->input->post('gender');
     $roles=$this->input->post('roles',true);
     $name=$this->input->post('fullname',true);
     $email=$this->input->post('email',true);
     $password=$this->input->post('password',true);
     $pic=$this->input->post('field_two',true);
     
     
     if( $key_report['password']==$password){
         $pass=$password;
         
     } else {
      $pass=md5($password);   
         
     }
     
     //echo 'ID !=',  $key_report['ID'];
   
     $this->db->where('email', $email ); 
      $this->db->where('ID !=',$key_report['ID']);
    // $this->db->or_where('email', $email ); 
     $query = $this -> db -> get('members');
  //  $row = $query -> row_array();
     
     if ($query -> num_rows() != 0) {
       
      return 'found';
     }
     else {
       $datacat=array(
       'name'=>$name,
       'email'=>$email,
   
       'password'=>  $pass,
       'gender'=> $gender,
       'roles'=>$roles,
       'pic'=> $pic,
       'date_reg'=>date('Y-m-d h:i:s'),
       'active'=>'on',
       'country'=> $country
       );  
         
         $this->db->where('ID',   $key_report['ID']);
    $this -> db -> update('members', $datacat);
    if ($this -> db -> affected_rows()) {
            return 'update';

        } else {
               // return false;
            
        }
         
         
     }
     
 
    
    
}








public function setOptions_members() {

        $query = $this -> db -> get('options');

        $dataoptions = array('iuser_active' =>$this -> input -> post('iuser_active', true), 
        'iuser_notification' => $this -> input -> post('iuser_notification', true),
         'iuser_reg' => $this -> input -> post('iuser_reg', true), 
         'iuser_avatar' => $this -> input -> post('iuser_avatar', true)
          );
         

        if ($query -> num_rows() != 0) {
            //update
            $this -> db -> update('options', $dataoptions);

        } else {
            //insert
            $this -> db -> insert('options', $dataoptions);
        }

        if ($this -> db -> affected_rows()) {
            return true;

        }

    }








public function Cp_Login(){
    @$email_login=$this->input->post('email_login',true);
    @$password_login=md5($this->input->post('password_login',true));
    
   $this->db->where('email',$email_login);
   $this->db->where('password',$password_login); 
    $this->db->where('roles','1');
    $query = $this -> db -> get('members');
    
         if ($query -> num_rows() != 0) {
             //found
       $row=$query->row_array();
             
             
     
@$CPAdmin = array(
'IUser_ID'  => $row['ID'],
'IUser_name'  => $row['name'],
'IUser_pic'     => $row['pic'],
'IUser_email'     => $row['email'],
'IUser_role'     => $row['roles'],
'IUser_admin' => 'admin'
);
             
$this->session->set_userdata($CPAdmin);             

//define('CPAUTH','1');

 $dataoptions=array(
 'time_login'=>time(),
 'status'=>'online'
 ); 
 $this->db->where('ID',$row['ID']); 
$this -> db -> update('members', $dataoptions);       
             
redirect('cp/admin', 'location');            
             
  return true;                    
         } else {         
    return 'ERROR_LOGIN';            
         } 
}





  public function Cp_logout(){
      
    $dataoptions=array(
 'status'=>'offline'
 ); 
  $this->db->where('ID', $this->session->userdata('IUser_ID')); 
  $this -> db -> update('members', $dataoptions);     
  
  
  @$CPAdmin = array(
'IUser_ID'  => '',
'IUser_name'  => '',
'IUser_pic'     => '',
'IUser_email'     => '',
'IUser_role'     => '',
'IUser_admin' => '',
);
     
  
      
  $this->session->unset_userdata($CPAdmin); 
    
  redirect('cp/', 'location');    
      
      
      
      
      
      
      
  }



public function GetDirectorySize($path){
     $bytestotal = 0;
    $path = realpath($path);
    if($path!==false){
       // foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object){
       	foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)) as $object){
            $bytestotal += $object->getSize();
        }
    }
    return $bytestotal; 
  /*    $size = 0;

        $dir = opendir($path);
        if (!$dir) {
            return 0;
        }

        while (($file = readdir($dir)) !== false) {

            if ($file[0] == '.') {
                continue;
            }

            if (is_dir($path . $file)) {
                // recursive:
                $size += dir_size($path . $file . DIRECTORY_SEPARATOR);
            } else {
                $size += filesize($path . $file);
            }
        }

        closedir($dir);
        return $size;
    */
}





public function getChartSize(){
    $option=$this->getOptions();
    $total=null;
   if($option['capacity']=='' || $option['capacity']==0){
       $total=100; //100 mb  1000 mb
   } else {
       $total = (int) $option['capacity']; 
       
   }

//current size 

$current=$this->GetDirectorySize('.');
$size=round($current/(1024*1024),1);
return array('TOTAL'=>$total,'CURRENT'=>$size);


    
}


///////////
  function getDbSize() {
    $api = $this -> load -> library('apiservices');    
       
        $this->load->database();
        
        $dbName = $this->db->database;
        
        $dbName = $this->db->escape($dbName);
        
        $sql = "SELECT table_schema AS db_name, sum( data_length + index_length )   AS db_size_mb 
                FROM information_schema.TABLES 
                WHERE table_schema = $dbName
                GROUP BY table_schema ;";
        
        $query = $this->db->query($sql);
        
        if ($query->num_rows() == 1) {
            
           $row = $query->row(); 
           $size = $row->db_size_mb;
           return $api->formatSize($size);
           
        } else {
            
          //  log_message('ERROR', "*** Unexpected number of rows returned " . ' | line ' . __LINE__ . ' of ' . __FILE__);
           // show_error('Sorry, an error has occured.');
            
        }
        
    }
  
  //////////////
  
  public function getmysqlversion(){
      $query = $this->db->query('SELECT VERSION() as mysql_version');
       $row=$query->row_array();
       return $row['mysql_version'];
  }

///
public function getsiteInfo(){
  $info=array();
  $info['server']=PHP_OS;  
   $info['php']= phpversion(); 
   $info['apache']=apache_get_version();
   $info['dbsize']=$this->getDbSize();
   $info['mysqlversion']=$this->getmysqlversion();
   return $info; 
}

///////////////////

public function getmemebersInfo(){

/////////////
       $this->db->where('visitor_status', 'status_On' ); 
        $query = $this -> db -> get('visitors');
      /*  $row = $query -> row_array();
        return $row; */
       $visitor= $query->num_rows();
    ///////////////////////////
      $this->db->where('status', 'online' );
      $this->db->where('roles', '0' );  
        $query = $this -> db -> get('members');
      $members= $query->num_rows();
      ////////////////////////////
       $this->db->where('roles', '0' );
       $query = $this -> db -> get('members');
      $allmembers= $query->num_rows();
      ////////////////////////////////////
      
       ////////////////////////////
       $this->db->where('roles', '0' );
        $this->db->where('active', 'off' );
       $query = $this -> db -> get('members');
      $activemembers= $query->num_rows();
      ////////////////////////////////////
      
       $this->db->where('roles', '1' );
         
       $query = $this -> db -> get('members');
       $manager= $query->num_rows();
      ////////////////////////
      
          //$this->db->where('roles', '1' );
         $this->db->where('status', 'online' );
       $query = $this -> db -> get('members');
       $ck= $query->num_rows();
      //
      
      
      return array(
      'CVisitor'=>($visitor - $ck),
      'CMembers'=>$members,
      'CAmembers'=>$allmembers,
      'CActivemembers'=>$activemembers,
      'CManager'=>$manager
      );
      
        
      
}




public function getNumVisitors($dat){
    
     $this->db->where('visitor_ch', $dat ); 
        $query = $this -> db -> get('visitors');
         $n= $query->num_rows();
         return $n;
}

public function getChartVisitor(){
    $days=array();
     $vRank=array();
     
  for($i=0;$i<7;$i++){
     $current_time= mktime(0, 0, 0, date("m"), date("d")-$i,  date("Y"));
        $date=date('Y-m-d',$current_time);
        $days[]=date('D',$current_time);
        $vRank[]=$this->getNumVisitors($date);
    }
  
  return array('DAYS'=> $days,'RANKS'=>$vRank);
    
}


/*
 * 
 for($i=0;$i<7;$i++){
 $timex[]= mktime(0, 0, 0, date("m"), date("d")-$i,  date("Y"));
 $d= mktime(0, 0, 0, date("m"), date("d")-$i,  date("Y"));
 $thedate=date('Y-m-d',$d);
  
 $days[]=date('D',$d);
$vRank[]=$this->admin_model->numVistor($thedate);
 } 
 
$dy=implode('|',$days);
$ts=implode(',',$vRank);

 ?>
 * 
 * 
public function numVistor($dat){
$query=$this->db->query("select * from `cm_vistors` where `dat`='$dat' ");
//echo "select * from `cm_vistors` where `dat`='$dat' ";
$len=$query->num_rows(); 
return $len;
}
*/





















    //end class

}
