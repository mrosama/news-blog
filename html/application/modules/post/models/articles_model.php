<?php
class Articles_model extends CI_Model {

private $api;
    public function __construct() {
        parent::__construct();
        $this->api = $this -> load -> library('apiservices');
    }
    
 //////////////////////////
 public function CheckURL($uri){
     return $this->api ->Check_Url($uri);
     
 }
 
 //////////////////////////////
 public function getCat($cat=0){
     $cat = (int) $this->security->xss_clean($cat);
       $this -> db -> where('cat', $cat);
       $this -> db -> where('module','post');
       $query = $this -> db -> get('categories');
       $rows = $query -> result_array();
        return $rows;
 }
 
 ////////////////////////////
public function getPost($Param){
            $id = (int) $this->security->xss_clean($Param);
            $this -> db -> where('ID', $id);
            $query = $this -> db -> get('post');
            $row = $query -> row_array(); 
            return  $row;
} 
 
 
  ////////////////////////////
public function getPostBySlug($Param){
            $len=null;
            $val =  $this->security->xss_clean($Param);
			 
            $this -> db -> where('slug', $val);
            $query = $this -> db -> get('post');
            $row = $query -> row_array(); 
			 
            $len=$query -> num_rows();
			 
            if($len!=0){
               return  $row; 
            } else {
                
                return 'Error';
            }
            
            
            
} 
 ///////////////////////////////////////
 
 public function safeEmail($string)
    {
        return  preg_replace( '((?:\n|\r|\t|%0A|%0D|%08|%09)+)i' , '', $string );
    }
 ////
   public function Pager($options) {

        
        $this -> load -> library('pagination');
        $this -> load -> helper('url');
        if (is_array($options) && count($options) == 5) {

            $keys = array('class', 'url', 'total', 'per', 'uri');

         /*   $func = function($value) use ($options) {

                $check = array_key_exists($value, $options);
                if ($check == false) {
                    exit('Error in Array Key.Please Check input array (Pager)');
                    return false;
                }
            };

            array_map($func, $keys);
               */
               
                  for($i=0;$i<5;$i++){
             if(!array_key_exists($keys[$i],$options)){
             exit('Error in Array Key.Please Check input array (Pager)');
             return false;
             }

             }
               
               
            $config['base_url'] = base_url() . $options['url'];
            $config['total_rows'] = $options['total'];
            $config['per_page'] = $options['per'];
            $config['uri_segment'] = $options['uri'];
            $config['use_page_numbers'] = TRUE;
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['num_links'] = 10;

            $config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationA tsc_paginationA01">';
           $config['full_tag_close'] = '</ul>';
            $config['prev_link'] = '&lt;';
          $config['prev_tag_open'] = '<li>';
          $config['prev_tag_close'] = '</li>';
$config['next_link'] = '&gt;';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="current"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';

$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['first_link'] = '&lt;&lt;';
$config['last_link'] = '&gt;&gt;';
            $this -> pagination -> initialize($config);
            $pagination = $this -> pagination -> create_links();
            return $pagination;
        } else {
            exit("Error Paramters is not array ");
        }

    }
 
 
 /////
 
 
    public function getAllPost($cat=0) {
       // $api = $this -> load -> library('apiservices');
  $cat = (int) $this->security->xss_clean($cat);
        $seg = $this -> uri -> segment(4);
        if ($seg == "") {
            $start = 1;
        } else {
            $start = (int)$seg;
        }

        $startResults = ($start - 1) * 30;
if($cat==0){
    
     $record_total = $this -> db -> count_all('post');
}
else {
     $this -> db -> where('cat', $cat);
     $query = $this -> db -> get('post');
     $record_total =$query -> num_rows();
}

        $this -> db -> order_by("ID", "desc");
        $this -> db -> limit(30, $startResults);
        
        if($cat==0){
            
        } else {
             $this -> db -> where('cat', $cat);
        }
       
        
        $query = $this -> db -> get('post');

        $row_rs = $query -> result_array();
           
           $link='post/pages/'.$cat;

        $options = array('class' => '', 'url' => $link, 'total' => $record_total, 'per' => '30', 'uri' => 4);

        $result = array('Rows_data' => $row_rs, 'Total_data' => $record_total, 'Paging_data' => $this -> Pager($options), );
        return $result;

    }
 
 
 
 
 
 
 public function ads_post(){
      $this -> db -> order_by("ID", "desc");
        $this -> db -> limit(5);
          
     $query = $this -> db -> get('post');
     $row_rs = $query -> result_array();
     return $row_rs;
 }
 
 
 
 
 /////////////////////
 
 
 public function addComments(){
 @session_start();    
      $name = $this->security->xss_clean($this->input->post('comment_name',true));
      $email = $this->security->xss_clean($this->input->post('comment_email',true));
      $message =$this->security->xss_clean($this->input->post('comment_msg',true));
     $code=$this->security->xss_clean($this->input->post('code',true));
     $id=(int) $this->security->xss_clean($this->input->post('v',true));
      if($_SESSION['verfiy']==$this->input->post('code')){
          
        if(!isset($name) && $name ==''){
            return 'ErrorName';
        }  
          
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             return 'ErrorEmail';  
          }
          
          
          
 $re = array(
'name' => $name ,
'email' => $email ,
'active' => 'NO',
'dat' =>date('Y-m-d h:m:s'),
'comment' => $message ,
'ref_id' => $id,
'com_type' => 'post'
);

$this->db->insert('comments', $re); 
    if ($this -> db -> affected_rows()) {
        $msg = $this->lang->line('article_comment_link');
        $link = base_url('post/admin/comment');
        $arr=array('token'=>$this -> config -> item('Token_access_key'),'message'=>$msg,'links'=>$link);
        $this->api ->notification( $arr );
        
            return "add";
            }
          //insert
          
          
      } else {
          
          return 'ErrorCode';
      }
     
     
     
 }
 
 
 
 /////////////////////////////
 
 
 
 public function getComments($id){
       
     
        $this -> db -> order_by("ID", "desc");
      //  $this -> db -> limit(5);
      $this -> db -> where('active', 'YES');
      $this -> db -> where('ref_id', $id);
        $this -> db -> where('com_type', 'post');
         $query = $this -> db -> get('comments');
     $row_rs = $query -> result_array();
     return $row_rs;
     
 }
 
 
 ///
 
 
  public function getnumCommt($id){
       
     
        $this -> db -> order_by("ID", "desc");
      //  $this -> db -> limit(5);
      $this -> db -> where('active', 'YES');
      $this -> db -> where('ref_id', $id);
        $this -> db -> where('com_type', 'post');
         $query = $this -> db -> get('comments');
     
   return  $query -> num_rows();
     
 }
 
 
 
 ///
 
 public function updateVisitor($id){
@session_start(); 
     if(!isset($_SESSION['post_'.$id])){
     $this->db->where('ID', $id);
      $this->db->set('visitor', 'visitor+1', FALSE);                             
       $this->db->update('post');
     }
     $_SESSION['post_'.$id]=$id;
     
     
     
 }
 
 
 
 public function slide_post(){
     
     $this -> db -> order_by("ID", "desc");
        $this -> db -> limit(6);
        $con="";
       $this->db->where('pic !=', $con);
      
     $query = $this -> db -> get('post');
     $row_rs = $query -> result_array();
     return $row_rs;
     
 }
 
 
 
 public function getPage($id){
   $id =  intval( $this->security->xss_clean($id));
      $this -> db -> order_by("ID", "desc");
       $this->db->where('ID', $id);
      $query = $this -> db -> get('post');
     $row_rs = $query -> row_array();
     return $row_rs;
     
 }
 
 
////////////////////////////////////////////////////////



    public function SearchPost($param) {
       // $api = $this -> load -> library('apiservices');
  $param = $this->security->xss_clean($param);
        $seg = $this -> uri -> segment(4);
        if ($seg == "") {
            $start = 1;
        } else {
            $start = (int)$seg;
        }

        $startResults = ($start - 1) * 30;

      
     
         $this -> db ->like('title', $param);
         $this -> db -> or_like('title_en', $param);
     
     
     $query = $this -> db -> get('post');
     $record_total =$query -> num_rows();


        $this -> db -> order_by("ID", "desc");
        $this -> db -> limit(30, $startResults);
        
        
       
        $this -> db ->like('title', $param);
         $this -> db -> or_like('title_en', $param);
        $query = $this -> db -> get('post');

        $row_rs = $query -> result_array();
           
           $link='post/search/'.$param;

        $options = array('class' => '', 'url' => $link, 'total' => $record_total, 'per' => '30', 'uri' => 4);

        $result = array('Rows_data' => $row_rs, 'Total_data' => $record_total, 'Paging_data' => $this -> Pager($options), );
        return $result;

    }
 
  
  
  
  
  
  
    
    public function getTopTags(){

$tag=array();
      $tpl_tags=$this->db->dbprefix('tags');
      $tpl_count=$this->db->dbprefix('tags_view');
     $query = $this->db->query("SELECT
$tpl_count.counts,
$tpl_count.tag_id,
$tpl_tags.tag
FROM
$tpl_count
LEFT JOIN $tpl_tags
ON $tpl_count.tag_id= $tpl_tags.ID
ORDER BY $tpl_count.counts DESC LIMIT 10"); 
    if ($query -> num_rows() != 0) {
    foreach ($query->result_array() as $row){
      @$tag[$row['tag']]  =$row['counts'];
    }
    return $tag;
    }
      return $tag;
      
        
   }
    
    
    
    
    
    
    public function tag_cloud(){
        $html='';
       $tags=@$this->getTopTags();
        $maxsize=40;
        $minsize=20;
        $maxval=@max(array_values($tags));
        $minval=@min(array_values($tags));
        $spread=@($maxval -  $minval);
        $step=@(($maxsize - $minsize)/$spread);
        foreach($tags as $key => $value){
            $size= round($minsize + (($value - $minval) * $step));
            $link=base_url('post/tag/'.$key);
            $html.= '&nbsp;<a href='.$link.'   style="font-size:'.$size.'px">'.$key.'</a>&nbsp;';
        }
        $html.="";
        return $html;
        
    }
    
    
    
    
    ////////////////
  
  
  
  
  
////////////////////////////////////////////////////////



    public function Searchbytags($param) {
       // $api = $this -> load -> library('apiservices');
  $param = $this->security->xss_clean($param);
        $seg = $this -> uri -> segment(4);
        if ($seg == "") {
            $start = 1;
        } else {
            $start = (int)$seg;
        }

        $startResults = ($start - 1) * 30;

      
     
         $this->db->where('tag', $param);
     
     
     $query = $this -> db -> get('tags');
     $row_rs = $query -> row_array();
     $tag_id=@$row_rs['ID'];
     
     $table_tags=$this->db->dbprefix('tags_posts');
     $sql="select  (posts) from $table_tags where `tags`='$tag_id' ";
     //echo $sql;
       $query = $this->db->query($sql);
     if ($query -> num_rows() != 0) {
         
        $record_total =$query -> num_rows();
      foreach ($query->result_array() as $row){
         $posts[]=$row['posts'];
         // echo $row['posts'];
      }
    // print_r($posts);
   //  





        $this -> db -> order_by("ID", "desc");
        $this -> db -> limit(30, $startResults);
        
        
       
        //  print_r($posts);
$this->db->where_in('ID', $posts);      
        $query = $this -> db -> get('post');

        $row_rs2 = $query -> result_array();
          // print_r($row_rs);
           $link='post/search/'.$param;

        $options = array('class' => '', 'url' => $link, 'total' => $record_total, 'per' => '30', 'uri' => 4);

        $result = array('Rows_data' => $row_rs2, 'Total_data' => $record_total, 'Paging_data' => $this -> Pager($options), );
        return $result;
     }
     
     
     
    }
 
  
  
  
  
  
  
  
  
  
  
  
  
 
 
 
  
 
 
 
 
 
 



//end 
    
}