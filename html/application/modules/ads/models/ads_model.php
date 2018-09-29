<?php
class ADS_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }

    // getads

    public function getAds() {
        $api = $this -> load -> library('apiservices');

        $seg = $this -> uri -> segment(4);
        if ($seg == "") {
            $start = 1;
        } else {
            $start = (int)$seg;
        }

        $startResults = ($start - 1) * 30;

        $record_total = $this -> db -> count_all('ads');

        $this -> db -> order_by("ID", "desc");
        $this -> db -> limit(30, $startResults);
        $query = $this -> db -> get('ads');

        $row_ads = $query -> result_array();

        $options = array('class' => 'uk-pagination', 'url' => 'ads/admin/index', 'total' => $record_total, 'per' => '30', 'uri' => 4);

        $result = array('Rows_ads' => $row_ads, 'Total_ads' => $record_total, 'Paging_Ads' => $api -> Pager($options), );
        return $result;

    }

    public function DeleteAds() {

        $this -> db -> db_debug = false;
        $data_delete = $this -> input -> post('del', true);

        for ($i = 0; $i < count($data_delete); $i++) {
            $this -> db -> where('ID', $data_delete[$i]);
            $query = $this -> db -> get('ads');
            $row = $query -> row_array();
            if (@file_exists($row['ads'])) {
                @unlink($row['ads']);
            }
        }
        $ids = @implode(',', $data_delete);

        @$this -> db -> delete('ads', "ID in($ids) ");

        redirect('ads/admin/index', 'location');

    }

    public function newAds() {

        $ads_name = $this -> input -> post('ads_name', true);
        $ads_link = $this -> input -> post('ads_link', true);
        $ads_winow = $this -> input -> post('ads_winow', true);
        $field_one = $this -> input -> post('field_one', true);
        $ads_code = $this -> input -> post('ads_code');
        $ads_width = $this -> input -> post('ads_width', true);
        $ads_height = $this -> input -> post('ads_height', true);

        $this -> db -> where('name', $ads_name);

        $query = $this -> db -> get('ads');
        //  $row = $query -> row_array();

        if ($query -> num_rows() != 0) {
            return 'found';
        } else {

            //insert
            $datacat = array('name' => $ads_name, 'width' => $ads_width, 'height' => $ads_height, 'code' => $ads_code, 'ads' => $field_one, 'view' => $ads_winow, 'url' => $ads_link);

            $this -> db -> insert('ads', $datacat);

            if ($this -> db -> affected_rows()) {
                return 'add';

            }

        }

    }

    //////////////

    public function get_ads() {

        $id = $this -> uri -> segment(5);
        $id = (int)$id;
        if (is_int($id)) {

            $this -> db -> where('ID', $id);
            $query = $this -> db -> get('ads');
            $row = $query -> row_array();
            return $row;
        }
    }

    //////////////////

    
    
    


public function edit_ads(){
     
        $ads_name = $this -> input -> post('ads_name', true);
        $ads_link = $this -> input -> post('ads_link', true);
        $ads_winow = $this -> input -> post('ads_winow', true);
        $field_one = $this -> input -> post('field_one', true);
        $ads_code = $this -> input -> post('ads_code');
        $ads_width = $this -> input -> post('ads_width', true);
        $ads_height = $this -> input -> post('ads_height', true);
        $ads_id = $this -> input -> post('ID', true);
     
         $old_ads=$this->input -> post('old_ads', true);
     
   
   
     $this->db->where('name', $ads_name ); 
      $this->db->where('ID !=',$ads_id);
    
     $query = $this -> db -> get('ads');
 
     
     if ($query -> num_rows() != 0) {
       
      return 'found';
     }
     else {
         $datacat = array('name' => $ads_name, 'width' => $ads_width, 'height' => $ads_height, 'code' => $ads_code, 'ads' => $field_one, 'view' => $ads_winow, 'url' => $ads_link);
       
         ///
         if( $old_ads != $field_one){
             @unlink($old_ads);
         }
         ///
         
         $this->db->where('ID',$ads_id);
    $this -> db -> update('ads', $datacat);
    if ($this -> db -> affected_rows()) {
            return 'update';

        }  
         
         
     }
     
 
    
    
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //////////
    public function Banner($id) {
        $api = $this -> load -> library('apiservices');
        $html = null;
        $this -> db -> where('ID', (int)$id);
        $query = $this -> db -> get('ads');
        $row = $query -> row_array();
        $target = $row['view'];
        if ($query -> num_rows() != 0) {
            if ($row['code'] != '') {

                $html = $row['code'];

            } else {
                ////////////
                $exe = strtoupper(end(explode(".", $row['ads'])));
                $is_uri = $api -> Check_Url($row['ads']);
                if ($is_uri == true) {
                    ///

                    if ($exe == "SWF") {
                        if (empty($row["url"])) {
                            @$html .= "<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0'
width='$row[width]' height='$row[height]'>
<param name='movie' value='$row[ads]'  />
<param name='quality' value='high' />
<embed src='$row[ads]' quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width='$V_record[width]' height='$V_record[height]'></embed>
</object>";
                        } else {
                            @$html .= "<a href='http://$row[url]' target='$target'> <object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0'
width='$row[width]' height='$row[height]'>
<param name='movie' value='$row[ads]'  />
<param name='quality' value='high' />
<embed src='$row[ads]' quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width='$V_record[width]' height='$V_record[height]'></embed>
</object></a>";

                        }

                    } else {
                        if (empty($row["url"])) {
                            @$html .= "<img src='$row[ads]' border='0' 
width='$row[width]' height='$row[height]' />";
                        } else {
                            @$html .= "<a href='http://$row[url]' target='$target'><img src='$row[ads]' border='0' 
width='$row[width]' height='$row[height]' /></a>";
                        }

                    }
                    ///
                } else {
                    $filename = base_url($row['ads']);

                    ///

                    if ($exe == "SWF") {
                        if (empty($row["url"])) {
                            @$html .= "<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0'
width='$row[width]' height='$row[height]'>
<param name='movie' value='$filename'  />
<param name='quality' value='high' />
<embed src='$filename' quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width='$V_record[width]' height='$V_record[height]'></embed>
</object>";
                        } else {
                            @$html .= "<a href='http://$row[url]' target='$target'> <object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0'
width='$row[width]' height='$row[height]'>
<param name='movie' value='$filename'  />
<param name='quality' value='high' />
<embed src='$filename' quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width='$V_record[width]' height='$V_record[height]'></embed>
</object></a>";

                        }

                    } else {
                        if (empty($row["url"])) {
                            @$html .= "<img src='$filename' border='0' 
width='$row[width]' height='$row[height]' />";
                        } else {
                            @$html .= "<a href='http://$row[url]' target='$target'><img src='$filename' border='0' 
width='$row[width]' height='$row[height]' /></a>";
                        }

                    }

                    ///
                }

                /////////////
            }

        }

        return $html;

        ///
    }

}
