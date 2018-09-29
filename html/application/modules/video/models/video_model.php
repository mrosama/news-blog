<?php
class Video_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }

    public function getVideo() {
        $api = $this -> load -> library('apiservices');

        $seg = $this -> uri -> segment(4);
        if ($seg == "") {
            $start = 1;
        } else {
            $start = (int)$seg;
        }

        $startResults = ($start - 1) * 30;

        $record_total = $this -> db -> count_all('video');

        $this -> db -> order_by("ID", "desc");
        $this -> db -> limit(30, $startResults);
        $query = $this -> db -> get('video');

        $row_video = $query -> result_array();

        $options = array('class' => 'uk-pagination', 'url' => 'video/admin/index', 'total' => $record_total, 'per' => '30', 'uri' => 4);

        $result = array('Rows_video' => $row_video, 'Total_video' => $record_total, 'Paging_video' => $api -> Pager($options), );
        return $result;

    }

    ////////////////////////////

    public function DeleteVideo() {

        $this -> db -> db_debug = false;
        $data_delete = $this -> input -> post('del', true);

        for ($i = 0; $i < count($data_delete); $i++) {
            $this -> db -> where('ID', $data_delete[$i]);
            $query = $this -> db -> get('video');
            $row = $query -> row_array();

            @unlink($row['pic']);
            @unlink($row['filename']);

        }
        $ids = @implode(',', $data_delete);

        @$this -> db -> delete('video', "ID in($ids) ");
        @$this -> db -> delete('comments', "ref_id in($ids) and com_type='video' ");
        redirect('video/admin/index', 'location');
    }

    public function getCatName($id) {

        $this -> db -> where('ID', (int)$id);

        $query = $this -> db -> get('categories');
        if ($query -> num_rows() != 0) {
            return $query -> row_array();
        }
    }
    
    
    
    
    public function getYouTube(){
        $search=$this->input->post('search',true);
        
        
        $query=urlencode( $search );
$url="https://gdata.youtube.com/feeds/api/videos?q=$query&orderby=published&start-index=1&max-results=20&v=2";
 
if(function_exists('curl_init')){

$curl = curl_init(); 
$timeout = 0;
curl_setopt ($curl, CURLOPT_URL, $url); 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
$buffer = curl_exec($curl); 
curl_close($curl); 
return  $buffer;
}
else {
$handle = fopen($url, "rb");
$buffer = stream_get_contents($handle);
fclose($handle);
return $buffer;
}
}
    
    
    
 

public function ImportMedia(){
$api = $this -> load -> library('apiservices');
$cat=$this->input->post('cat');
$ck=$this->input->post('ck');
$len=count($ck);

for($i=0;$i<$len;$i++){

$val=@explode("#",$ck[$i]);

$title=$val[0];
$pic_youtube=$val[1];
$youtube=$val[2];

$slug= $api->url_slug($title);

$data = array(
'title' =>$title ,
'title_en' =>$title ,
'dat' =>date('Y-m-d h:m:s'),
'author' =>$this->session->userdata('IUser_name'),
'youtube' =>$youtube,
'pic_youtube' =>$pic_youtube,
'cat' => @$cat,
 'slug'=>$slug
);
 
$this->db->insert('video', $data); 

}


 if ($this -> db -> affected_rows()) {
            return 'add';

        }


}


    
    
//////////////////////////////////////////////


public function getmedia(){
  $id = (int) $this -> uri -> segment(4);

$this->db->where('ID', $id ); 
 $query = $this -> db -> get('video');
$row = $query->row_array();
return $row;
}   



//
 public function AddMedia(){
 $api = $this -> load -> library('apiservices');
require_once ('assets/lib/YouTube/youtube_class.php');

///
$this->load->library('Images');


$title=$this->input->post('title');
$title_en=$this->input->post('title_en');
$cat=$this->input->post('cat');
$author=$this->input->post('author');
$content=$this->input->post('content');
$content_en=$this->input->post('content_en');
$file2=$this->input->post('field_one'); //file from archive
$youtube=$this->input->post('youtube');
 $slug= $api->url_slug($title);
if($youtube!=""){
//add from api
$obj = new youtube;
$obj->url = $youtube;   
$pic_youtube=$obj->thumb_url();
$info = $obj->info();
$title_youtube=$info["titulo"];
/// add into db
$slug= $api->url_slug($title_youtube);
$data = array(
'title' =>"$title_youtube" ,
'title' =>"$title_youtube" ,
'content' =>$content ,
'content_en' =>$content_en,
'dat' =>date('Y-m-d h:m:s'),
'author' =>$author,
'youtube' =>$youtube,
'pic_youtube' => "$pic_youtube",
'cat' => $cat,
 'slug'=>$slug

);
$this->db->insert('video', $data); 
///
return 'ADD';
} else {
//add normal
///////////////////////image handle
if(@$_FILES['file1']['name']){
$dir="video";
if(is_dir("assets/media/$dir")){
}
else {
@mkdir("assets/media/$dir",0777);
}

//upload
$config['upload_path'] = "assets/media/$dir";
$config['allowed_types'] = 'gif|jpg|png|jpeg';
$config['file_name']=md5(uniqid(mt_rand()));
$this->load->library('upload', $config);
if(!$this->upload->do_upload('file1')){
return 'ERROR_Upload';
}
else {
$file = $this->upload->data();
$filepath="assets/media/$dir/".$file['file_name'];
$filepath2="assets/media/$dir/small_".$file['file_name'];
$this->images->Size($filepath,$filepath2,120,90);
}



//
} else {
$filepath="";
$filepath2='';
}



//******

$data = array(
'title' => $title ,
'title_en' => $title ,
'content' =>$content ,
'content_en' =>$content_en,
'dat' =>date('Y-m-d h:m:s'),
'author' =>$author,
'filename' =>$file2,
//'pic' => $filepath,
'pic' => $filepath2,
'cat' => $cat,
'slug'=>$slug,
);
$this->db->insert('video', $data); 
///


return 'ADD';


}

}   
    
    
    
    //////////////////////////////////
    
    
   

public function EditMedia(){
 $api = $this -> load -> library('apiservices');
require_once ('assets/lib/YouTube/youtube_class.php');

///
$this->load->library('Images');

$id=$this->input->post('id');

$title=$this->input->post('title');
$title_en=$this->input->post('title_en');
$cat=$this->input->post('cat');
$author=$this->input->post('author');
$content=$this->input->post('content');
$content_en=$this->input->post('content_en');
$file2=$this->input->post('field_one'); //file from archive
$youtube=$this->input->post('youtube');
 $slug= $api->url_slug($title);
if($youtube!=""){
//add from api
$obj = new youtube;
$obj->url = $youtube;   
$pic_youtube=$obj->thumb_url();
$info = $obj->info();
$title_youtube=$info["titulo"];
$slug= $api->url_slug($title_youtube);
/// add into db
$data = array(
'title' =>"$title_youtube" ,
'title' =>"$title_youtube" ,
'content' =>$content ,
'content_en' =>$content_en,
'dat' =>date('Y-m-d h:m:s'),
'author' =>$author,
'youtube' =>$youtube,
'pic_youtube' => "$pic_youtube",
'cat' => $cat,
'slug'=>$slug,
);

/////////////////////////////////////////////////////edit
$this->db->where('ID', $id);
$this->db->update('video', $data); 

///
return 'ADD';
} else {
//add normal
///////////////////////image handle
if(@$_FILES['file1']['name']){
$dir="video";
if(is_dir("assets/media/$dir")){
}
else {
@mkdir("assets/media/$dir",0777);
}

//upload
$config['upload_path'] = "assets/media/$dir";
$config['allowed_types'] = 'gif|jpg|png|jpeg';
$config['file_name']=md5(uniqid(mt_rand()));
$this->load->library('upload', $config);

if(!$this->upload->do_upload('file1')){
return 'ERROR_Upload';
}
else {
$file = $this->upload->data();
$filepath="assets/media/$dir/".$file['file_name'];
$filepath2="assets/media/$dir/small_".$file['file_name'];
$this->images->Size($filepath,$filepath2,120,90);
}

//
} else {
$filepath2=$this->input->post('pic');
}

//******

$data = array(
'title' => $title ,
'title_en' => $title_en ,
'content' =>$content ,
'content_en' =>$content_en,
'dat' =>date('Y-m-d h:m:s'),
'author' =>$author,
'filename' =>$file2,
'pic' => $filepath2,
'cat' => $cat,
'slug'=>$slug,
);
$this->db->where('ID', $id);
$this->db->update('video', $data); 
///


return 'ADD';


}
 

}    
    
    
    
    
    //////////////
    
    
    
       public function getComments() {
        $api = $this -> load -> library('apiservices');

        $seg = $this -> uri -> segment(4);
        if ($seg == "") {
            $start = 1;
        } else {
            $start = (int)$seg;
        }

        $startResults = ($start - 1) * 30;

        $record_total = $this -> db -> count_all('comments');

        $this -> db -> order_by("ID", "desc");
        $this -> db -> limit(30, $startResults);
        $this->db->where('com_type', 'video');
        $query = $this -> db -> get('comments');

        $row_video = $query -> result_array();

        $options = array('class' => 'uk-pagination', 'url' => 'video/admin/comment', 'total' => $record_total, 'per' => '30', 'uri' => 4);

        $result = array('Rows_video' => $row_video, 'Total_video' => $record_total, 'Paging_video' => $api -> Pager($options), );
        return $result;

    }

    ////////////////////////////
    
    
    
    
    
    
    
    
 public function setActive() {

$dataoptions = array(
         'active' =>'YES'
 );
 
     $this->db->db_debug = false;
     $data_delete=$this -> input -> post('del', true);
   
     $ids=@implode(',',$data_delete);
 
 
  $this -> db -> update('comments', $dataoptions,"ID in($ids) and com_type='video' ");

 if ($this -> db -> affected_rows()) {
            return true;

        }
  }




 public function setDeActive() {

$dataoptions = array(
         'active' =>'NO'
 );
 
     $this->db->db_debug = false;
     $data_delete=$this -> input -> post('del', true);
   
     $ids=@implode(',',$data_delete);
 
 
  $this -> db -> update('comments', $dataoptions,"ID in($ids) and com_type='video'");

 if ($this -> db -> affected_rows()) {
            return true;

        }
  }
    
    
    
    
    
    
    
    
    public function DeleteComments() {

        $this -> db -> db_debug = false;
        $data_delete = $this -> input -> post('del', true);

        
        $ids = @implode(',', $data_delete);

        @$this -> db -> delete('comments', "ID in($ids) ");
       
        redirect('video/admin/comment', 'location');
    } 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    ///

}
