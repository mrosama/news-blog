<?php
class Poll_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }
    
    
    
    
    // get poll

    public function getPolls() {
        $api = $this -> load -> library('apiservices');

        $seg = $this -> uri -> segment(4);
        if ($seg == "") {
            $start = 1;
        } else {
            $start = (int)$seg;
        }

        $startResults = ($start - 1) * 30;

        $record_total = $this -> db -> count_all('poll_question');

        $this -> db -> order_by("ID", "desc");
        $this -> db -> limit(30, $startResults);
        $query = $this -> db -> get('poll_question');

        $row_polls = $query -> result_array();

        $options = array('class' => 'uk-pagination', 'url' => 'poll/admin/index', 'total' => $record_total, 'per' => '30', 'uri' => 4);

        $result = array('Rows_poll' => $row_polls, 'Total_poll' => $record_total, 'Paging_polls' => $api -> Pager($options), );
        return $result;

    }
    
    
   ////////////////////////////
   
   
   
   
    public function DeletePolls() {

        $this -> db -> db_debug = false;
        $data_delete = $this -> input -> post('del', true);

         
        $ids = @implode(',', $data_delete);

        @$this -> db -> delete('poll_question', "ID in($ids) ");
        @$this -> db -> delete('poll_answer', "poll in($ids) ");

 redirect('poll/admin/index', 'location');

    }
   
   
   
   
   public function actionPoll() {
       
          $seg = $this -> uri -> segment(4);
          $ids = $this -> uri -> segment(5); 
           
          if($seg=='activeN'){
              
               
              
              
              /////////////
           $dataoptions=array('active'=>'NO');
           $this->db->where('ID', $ids);      
           $this -> db -> update('poll_question', $dataoptions);
               redirect('poll/admin/index', 'location');
          } 
          
          
            if($seg=='activeY'){
              
           $dataoptions=array('active'=>'NO');
                 
           $this -> db -> update('poll_question', $dataoptions);
              
              //
              $dataoptions=array('active'=>'YES');
           $this->db->where('ID', $ids);      
           $this -> db -> update('poll_question', $dataoptions);
               redirect('poll/admin/index', 'location');
          }    
       
       
       
       
           }
   
   
   
    
    
   ///////////////
   
   
   
   
 public function AddNewPoll(){
     
     
   $this -> db -> where('question', @$this->input->post('question'));

        $query = $this -> db -> get('poll_question');   
      if ($query -> num_rows() != 0) {
            return 'found';
      }  
     
     
     
$arrydata=array(
'question'=>@$this->input->post('question'),
'question_en'=>@$this->input->post('question_en'),
'active'=>'NO'
);
 $this->db->insert('poll_question',$arrydata);

$lastID=$this->db->insert_id();

$poll=@$this->input->post("polloption");
$poll_en=@$this->input->post("polloption_en");

for($i=0;$i<8;$i++){
$arrydata2=array(
'answer'=>$poll[$i],
'answer_en'=>$poll_en[$i],
'poll'=>$lastID
);
$this->db->insert('poll_answer',$arrydata2);
}

 if ($this -> db -> affected_rows()) {
  return 'add';

 }



    
}  
   
   
   
//////////////////////////////////



public function getPoll(){
$id=$this->uri->segment(4); 
if(ctype_digit($id)){
    
        $this -> db -> where('ID', $id);
        $query = $this -> db -> get('poll_question');   
        $data['poll']=$query->row_array();   
        /////////////////////////////////////////
         $this -> db -> where('poll', $id);
        $query = $this -> db -> get('poll_answer');   
        $data['answer']=$query->result_array(); 
    
 

return $data;
    
}

}   


//////////////////////////////



public function EditPoll(){
    
  $id=$this->input->post('ID');
$arrydata=array(
'question'=>$this->input->post('question'),
'question_en'=>$this->input->post('question_en'),
);  
 
$this->db->update('poll_question',$arrydata,array('ID'=>$id));  
////////////////////////////////////////    
$poll=@$this->input->post("polloption");
$poll_en=@$this->input->post("polloption_en");
 
$a_poll=$this->input->post("a_poll");  
  
  
 

for($i=0;$i<8;$i++){
$arrydata2=array(
'answer'=>$poll[$i],
'answer_en'=>$poll_en[$i]
);

$this->db->update('poll_answer',$arrydata2,array('poll'=>$id,'ID'=>$a_poll[$i]));
} 
  
  
 if ($this -> db -> affected_rows()) {
  return 'add';

 }
    
   return 'add'; 
    
    
}

///////




public function getselectedPoll(){
    $data=array();
         $this->db->limit(1);
         $this -> db -> where('active', 'YES');
        $query = $this -> db -> get('poll_question');
          if ($query -> num_rows() != 0) {
              $rs=$query->row_array();     
              $data['question']=$rs;
         
        /////////////////////////////////////////
         $this -> db -> where('poll', $rs['ID']);
        $query = $this -> db -> get('poll_answer');   
        $data['answer']=$query->result_array(); 
          }
    return $data;
    
    
    
    
}

   
  
  
public function Percent($q,$hits){
  $table_name=$this->db->dbprefix('poll_answer'); 
$sql="select sum(hits) as total from `$table_name` where `poll`='$q'  limit 1";
 
 $data=$this->db->query($sql);
 
$X=$data->row_array();
 
$total=$X['total'];
$percent=@round($hits/$total*100);
return $percent;
 
}  
  
   
   
   
  public function addpoll(){

  
$r1 = (int) $this->input->post('r1',true);
$id = unserialize(base64_decode($this->input->post('_tkon',true)));
if($r1!=""){
setcookie("poll", $id, time()+2678400);
   $table_name=$this->db->dbprefix('poll_answer'); 
$this->db->query("update  `$table_name`  set `hits`=(hits)+1 where `poll`='$id' and `ID`='$r1'  ");



}
 
}  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //end
    
}    