<?php
class Post_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }
    
    
    
    
    
 
    
    
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
        $this->db->where('com_type', 'post');
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
 
 
  $this -> db -> update('comments', $dataoptions,"ID in($ids) and com_type='post' ");

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
 
 
  $this -> db -> update('comments', $dataoptions,"ID in($ids) and com_type='post'");

 if ($this -> db -> affected_rows()) {
            return true;

        }
  }
    
    
    
    
    
    
    
    
    public function DeleteComments() {

        $this -> db -> db_debug = false;
        $data_delete = $this -> input -> post('del', true);

        
        $ids = @implode(',', $data_delete);

        @$this -> db -> delete('comments', "ID in($ids) ");
       
        redirect('post/admin/comment', 'location');
    } 
       
    
    
    
   ////////////// 
    
    
    
     public function getPost() {
        $api = $this -> load -> library('apiservices');

        $seg = $this -> uri -> segment(4);
        if ($seg == "") {
            $start = 1;
        } else {
            $start = (int)$seg;
        }

        $startResults = ($start - 1) * 30;

        $record_total = $this -> db -> count_all('post');

        $this -> db -> order_by("ID", "desc");
        $this -> db -> limit(30, $startResults);
        $query = $this -> db -> get('post');

        $row_video = $query -> result_array();

        $options = array('class' => 'uk-pagination', 'url' => 'post/admin/index', 'total' => $record_total, 'per' => '30', 'uri' => 4);

        $result = array('Rows_video' => $row_video, 'Total_video' => $record_total, 'Paging_video' => $api -> Pager($options), );
        return $result;

    }

    ////////////////////////////

    public function DeletePost() {

        $this -> db -> db_debug = false;
        $data_delete = $this -> input -> post('del', true);

        for ($i = 0; $i < count($data_delete); $i++) {
            $this -> db -> where('ID', $data_delete[$i]);
            $query = $this -> db -> get('post');
            $row = $query -> row_array();

            @unlink($row['pic']);
            @unlink($row['pic_small']);

        }
        $ids = @implode(',', $data_delete);

        @$this -> db -> delete('post', "ID in($ids) ");
        @$this -> db -> delete('comments', "ref_id in($ids) and com_type='post' ");
        redirect('post/admin/index', 'location');
    }

    public function getCatName($id) {

        $this -> db -> where('ID', (int)$id);

        $query = $this -> db -> get('categories');
        if ($query -> num_rows() != 0) {
            return $query -> row_array();
        }
    }
    
    
    
 //////////
 
 
 public function DeleteTag(){
    
  $this->db->db_debug = false;
     $data_delete=$this -> input -> post('del', true);
   
     $ids=@implode(',',$data_delete);
  
    @$this->db->delete('tags',"ID in($ids)"); 
     @$this->db->delete('tags_posts',"tags in($ids)"); 
    //relation
    
     @$this->db->delete('tags_view',"tag_id in($ids)"); 
}   
    
    
    
    
/////////////////////////////////////////////////////
    
     public function getTags() {
     $api = $this -> load -> library('apiservices');

        $seg = $this -> uri -> segment(4);
        if ($seg == "") {
            $start = 1;
        } else {
            $start = (int)$seg;
        }

        $startResults = ($start - 1) * 30;

        $record_total = $this -> db -> count_all('tags');

        $this -> db -> order_by("ID", "desc");
        $this -> db -> limit(30, $startResults);
    
        $query = $this -> db -> get('tags');

        $row_video = $query -> result_array();

        $options = array('class' => 'uk-pagination', 'url' => 'video/admin/comment', 'total' => $record_total, 'per' => '30', 'uri' => 4);

        $result = array('Rows_video' => $row_video, 'Total_video' => $record_total, 'Paging_video' => $api -> Pager($options), );
        return $result;
    }
    
    
    
    
    
    
     public function get_tags($id) {
$this->db->where('ID', $id ); 
        $query = $this -> db -> get('tags');
        $row = $query -> row_array();
        return $row;

    }
    
    
    ////////////////////////
    
  public function setTags(){
    // $id=$this->input->post('IDS',true);
     $name=$this->input->post('tag',true);  
    
    $data=array(
    'tag'=>$name
    );
    
    
    $this->db->where('tag', $name ); 
      
     $query = $this -> db -> get('tags');
      if ($query -> num_rows() != 0) {
         return 'error';
      }
    
    
      $this -> db -> insert('tags', $data);
    
      if ($this -> db -> affected_rows()) {
            return "add";

        } else {
                return "error";
            
        }
    
    
    
    
  }
  
  ////
  
   public function editTags(){
     $id=$this->input->post('IDS',true);
     $name=$this->input->post('tag',true);  
    
    $data=array(
    'tag'=>$name
    );
     $this->db->where('ID', $id ); 
      $this -> db -> update('tags', $data);
    
      if ($this -> db -> affected_rows()) {
            return "add";

        } else {
                return "error";
            
        }
    
    
    
    
  }
    
   ///////////////////////////////
   
   
   public function addPost(){
       //echo $this->db->last_query();
       $api = $this -> load -> library('apiservices');
          $title=$this->input->post('title',true);
          $title_en=$this->input->post('title_en',true);
          $content=$this->input->post('content');
          $content_en=$this->input->post('content_en');
          $author=$this->input->post('author',true);
          $cat=$this->input->post('cat',true);
          $pic=$this->input->post('field_one',true);
          $pic_small=$this->input->post('field_two',true);
          $title_pic=$this->input->post('title_pic',true);
       
          $tagval = $this->input->post('taghid',true);
          
          $slug= $api->url_slug($title);
          
      // echo $tagval.'****************************';
     $data=array(
    'title'=>$title,
     'title_en'=>$title_en,
      'content'=>$content,
       'content_en'=>$content_en,
       'author'=>$author,
        'cat'=>$cat,
         'pic'=>$pic,
          'pic_small'=>$pic_small,
           'title_pic'=>$title_pic,
           'dat' =>date('Y-m-d h:i:s '),
           'slug'=>$slug
    );
     
      $this -> db -> insert('post', $data);
       
        if ($this -> db -> affected_rows()) {
         $postID=$this->db->insert_id();  
            
         if(isset($postID)){
             
             if(isset($tagval) && !empty($tagval) && $tagval!=','){
                 //1
                 $tags=explode(',',$tagval);
               //  echo count($tags).'ccccccccccccc'.$tagval;
                 if(count($tags)!=0){
                     //2
                     $Tagid=array();
                     for($i=0;$i<count($tags);$i++){
                      //   echo 'vvvvvv'.$tags[$i].'vvvvvvvvvvv';
                         //3
                         $this -> db -> where('tag', $tags[$i]);
                         $query = $this -> db -> get('tags');
                         $row = $query -> row_array();
                        // echo $query -> num_rows().'dddddddddddddd';
                        if ($query -> num_rows() == 0) {
                             //insert and get id
                             $c=array('tag'=>$tags[$i]);
                             $this->db->insert('tags',$c);
                          //   echo $this->db->last_query();
                             array_push($Tagid, $this->db->insert_id());  
                         } else {
                             //get id
                         array_push($Tagid, $row['ID']);   
                         }
                         
                         //3
                         
                         
                     }
                     ///////////add to counter tags_view//////////////////////
                     
                     if(is_array($Tagid) && count($Tagid)!=0){
                         //4
                          for($i=0;$i<count($Tagid);$i++){
                               $this -> db -> where('tag_id', $Tagid[$i]);
                         $query = $this -> db -> get('tags_view');
                         $row = $query -> row_array();
                          if ($query -> num_rows() == 0) {
                              //insert
                              $c=array('tag_id'=>$Tagid[$i],'counts'=>0);
                             $this->db->insert('tags_view',$c);
                             
                          } else{
                              //update count
                              $this->db->where('tag_id', $Tagid[$i]);
                              $this->db->set('counts', 'counts+1', FALSE);                             
                              $this->db->update('tags_view');
                              
                              
                          }
                         
                         
                          }
                         //4
                     }
                     
                     //////insert relation
                     
                     //5
                      if(is_array($Tagid) && count($Tagid)!=0){
                           for($i=0;$i<count($Tagid);$i++){
                       $this -> db -> where('posts',$postID);
                         $this -> db -> where('tags', $Tagid[$i]);
                         $query = $this -> db -> get('tags_posts');
                         $row = $query -> row_array();
                                if ($query -> num_rows() == 0) {
                                    //insert
                               $c=array('tags'=>$Tagid[$i],'posts'=>$postID);
                             $this->db->insert('tags_posts',$c); 
                                }
                               
                           }
                          
                          
                      }
                     //5
                     
                     
                     
                     
                   //2  
                 }
                 
                 
               //1  
             }
             
             
             
             
         }   
            
            
            
            
            
            
            //
        }
       
       
       
       
       return 'Add';
       
       
       
       //
       
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
ORDER BY $tpl_count.counts DESC LIMIT 6"); 
    if ($query -> num_rows() != 0) {
    foreach ($query->result_array() as $row){
      $tag[$row['tag']]  =$row['counts'];
    }
    return $tag;
    }
      return $tag;
      
        
   }
    
    
    
    
    
    
    public function tag_cloud(){
        $html='';
       $tags=$this->getTopTags();
        $maxsize=40;
        $minsize=20;
        $maxval=@max(array_values($tags));
        $minval=@min(array_values($tags));
        $spread=@($maxval -  $minval);
        $step=@(($maxsize - $minsize)/$spread);
        foreach($tags as $key => $value){
            $size= round($minsize + (($value - $minval) * $step));
            $html.= '&nbsp;<a href="javascript:void(0)" onclick=addTag2("' . $key. '") style="font-size:'.$size.'px">'.$key.'</a>&nbsp;';
        }
        return $html;
        
    }
    
    
    
    
    ////////////////
    
    
    public function getSelectedTags(){
    $id = (int) $this -> uri -> segment(4);         
       
$tag=array();
      $tpl_tags=$this->db->dbprefix('tags');
      $tpl_post=$this->db->dbprefix('tags_posts');
     $query = $this->db->query("SELECT
$tpl_post.tags,
$tpl_tags.tag
FROM
$tpl_post
LEFT JOIN $tpl_tags
ON $tpl_post.tags= $tpl_tags.ID
where $tpl_post.posts='$id'

"); 

  return $query->result_array() ;
                 
            
            
        
    }
    
    ///////////////////////
    
    public function getPosts(){
  $id = (int) $this -> uri -> segment(4);
  $this->db->where('ID', $id ); 
  $query = $this -> db -> get('post');
  $row = $query->row_array();
   return $row;
        
    }
    
    
  ///////////////////////////
  
  
  
  
  
  
  
  
  
  
  function EditPost(){
           $api = $this -> load -> library('apiservices');
          $title=$this->input->post('title',true);
          $title_en=$this->input->post('title_en',true);
          $content=$this->input->post('content');
          $content_en=$this->input->post('content_en');
          $author=$this->input->post('author',true);
          $cat=$this->input->post('cat',true);
          $pic=$this->input->post('field_one',true);
          $pic_small=$this->input->post('field_two',true);
          $title_pic=$this->input->post('title_pic',true);
          $tagval = $this->input->post('taghid',true);
          $id=$this->input->post('id',true);
           $slug= $api->url_slug($title);
          
          
         $data=array(
    'title'=>$title,
     'title_en'=>$title_en,
      'content'=>$content,
       'content_en'=>$content_en,
       'author'=>$author,
        'cat'=>$cat,
         'pic'=>$pic,
          'pic_small'=>$pic_small,
           'title_pic'=>$title_pic,
            'slug'=>$slug,
             'dat' =>date('Y-m-d h:i:s ')
          
    );
    
      $this->db->where('ID', $id);
      $this -> db -> update('post', $data);
      
       $postID=$id;
      
        if(isset($postID)){
             
             if(isset($tagval) && !empty($tagval) && $tagval!=','){
                   $tags=explode(',',$tagval);
         if(count($tags)!=0){
                     //2
                     $Tagid=array();
      
                  for($i=0;$i<count($tags);$i++){
      
                         $this -> db -> where('tag', $tags[$i]);
                         $query = $this -> db -> get('tags');
                         $row = $query -> row_array();
      
                             if ($query -> num_rows() == 0) {
                             //insert and get id
                             $c=array('tag'=>$tags[$i]);
                             $this->db->insert('tags',$c);
                          //   echo $this->db->last_query();
                             array_push($Tagid, $this->db->insert_id());  
                         } else {
                             //get id
                         array_push($Tagid, $row['ID']);   
                         }
          //end for
                  }
      
      ////////////////////////
      
        if(is_array($Tagid) && count($Tagid)!=0){
            
              for($i=0;$i<count($Tagid);$i++){
                         $this -> db -> where('tag_id', $Tagid[$i]);
                         $query = $this -> db -> get('tags_view');
                         $row = $query -> row_array();
                         if ($query -> num_rows() == 0) {
                              //insert
                              $c=array('tag_id'=>$Tagid[$i],'counts'=>0);
                             $this->db->insert('tags_view',$c);
                             
                          }
                         
                  //end for
              }
            
        }
      
      ///
        if(is_array($Tagid) && count($Tagid)!=0){
            
             for($i=0;$i<count($Tagid);$i++){
                     $this -> db -> where('posts',$postID);
                         $this -> db -> where('tags', $Tagid[$i]);
                   $query = $this -> db -> get('tags_posts');
                         $row = $query -> row_array();
                           if ($query -> num_rows() == 0) {
                                $c=array('tags'=>$Tagid[$i],'posts'=>$postID);
                             $this->db->insert('tags_posts',$c); 
                             /////
                           @$this->db->where('tag_id', $Tagid[$i]);
                             @$this->db->set('counts', 'counts+1', FALSE);                             
                              @$this->db->update('tags_view');  
                             
                           }  
                         
                         
                 //end for
             }
            
        }
      
      ///
         } }}
      
      
      
      
  //    
  return 'Add';
  }  
    
    
    
   
    
    
    
    
//end    
    
}






    
    