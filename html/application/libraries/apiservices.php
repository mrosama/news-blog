<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$cssdir = base_url() . "assets/lib/flag/flags.css";

define('_BASE_FLAG_', base_url() . "assets/lib/flag/");

// echo " <link rel=\"stylesheet\" href=\"$cssdir\" type=\"text/css\">";
//require_once 'assets/lib/mailer/PHPMailerAutoload.php';
require_once 'assets/lib/mailer/PHPMailerAutoload.php';
define('DIR_SORT_NAME',  1);
define('DIR_SORT_SIZE',  2);
define('DIR_SORT_ATIME', 3);
define('DIR_SORT_MTIME', 4);
define('DIR_SORT_CTIME', 5);
class Apiservices {

    /*
     * get all settings
     * */

    private $vServer;
    private $Url;

    public function get_config($token, $type = 'array') {
        $CI = &get_instance();

        $ConfigToken = $CI -> config -> item('Token_access_key');

        if ($ConfigToken == $token) {

            $query = $CI -> db -> get('options');
            $row = $query -> row_array();

            switch(strtolower(trim($type))) {
                case "json" :
                    $val_return = json_encode($row, true);
                    break;
                default :
                    $val_return = $row;
            }

            return $val_return;

        } else {

            exit('Error Token..(get_config)');
            return false;
        }

    }

    /*
     * get sociallinks
     *
     * */

    public function get_fb($token, $type = 'array') {

        $CI = &get_instance();

        $ConfigToken = $CI -> config -> item('Token_access_key');

        if ($ConfigToken == $token) {
            $CI -> db -> select('facebook, google_plus,youtube,twitte');
            $query = $CI -> db -> get('options');
            $row = $query -> row_array();

            $newface['Facebook'] = $row['facebook'];
            $newface['google+'] = $row['google_plus'];
            $newface['Youtube'] = $row['youtube'];
            $newface['Twitte'] = $row['twitte'];
            switch(strtolower(trim($type))) {
                case "json" :
                    $val_return = json_encode($newface, true);
                    break;
                default :
                    $val_return = $newface;
            }
            return $val_return;
        } else {
            exit('Error Token..(get_fb)');
            return false;
        }

    }

    public function get_meta($token, $type = 'array') {

        $CI = &get_instance();

        $ConfigToken = $CI -> config -> item('Token_access_key');

        if ($ConfigToken == $token) {
            $CI -> db -> select('copyright, author,description,keywords,web_title');
            $query = $CI -> db -> get('options');
            $row = $query -> row_array();

            $newface['copyright'] = $row['copyright'];
            $newface['author'] = $row['author'];
            $newface['description'] = $row['description'];
            $newface['keywords'] = $row['keywords'];
            $newface['title'] = $row['web_title'];
            switch(strtolower(trim($type))) {
                case "json" :
                    $val_return = json_encode($newface, true);
                    break;
                default :
                    $val_return = $newface;
            }
            return $val_return;
        } else {
            exit('Error Token..(get_meta)');
            return false;
        }

    }

    /*
     *
     * get mail options
     * */

    public function get_MailConfig($token, $type = 'array') {

        $CI = &get_instance();

        $ConfigToken = $CI -> config -> item('Token_access_key');

        if ($ConfigToken == $token) {
            $CI -> db -> select('mail_server, mail_sendmail,email_received,mail_port,mail_smtp,mail_user,
            mail_pwd,mail_sender,mail_encryption,mail_type');
            $query = $CI -> db -> get('options');
            $row = $query -> row_array();

            $newface['MailServer'] = $row['mail_server'];
            $newface['SendMailPath'] = $row['mail_sendmail'];
            $newface['Mailreceived'] = $row['email_received'];
            $newface['MailPort'] = $row['mail_port'];
            $newface['MailSmtp'] = $row['mail_smtp'];
            $newface['MailUser'] = $row['mail_user'];
            $newface['MailPwd'] = $row['mail_pwd'];
            $newface['MailSender'] = $row['mail_sender'];
            $newface['Encryption'] = $row['mail_encryption'];
            $newface['MailFormat'] = $row['mail_type'];
            switch(strtolower(trim($type))) {
                case "json" :
                    $val_return = json_encode($newface, true);
                    break;
                default :
                    $val_return = $newface;
            }
            return $val_return;
        } else {
            exit('Error Token..(get_MailConfig)');
            return false;
        }

    }

    /*
     *
     * run cache
     * */
//$CI -> config -> item('Token_access_key');
    public function start_Cache() {

        $CI = &get_instance();
       /*  $ConfigToken = $CI -> config -> item('Token_access_key');
       if ($ConfigToken == $token) {
            $CI -> db -> select('web_cache, web_cache_time');
            $query = $CI -> db -> get('options');
            $row = $query -> row_array();

            if ($row['web_cache'] == 'cache_on') {
                $minutes = ($row['web_cache_time'] == '') ? 1 : $row['web_cache_time'];
                $CI -> output -> cache($minutes);
            }

        } else {
            exit('Error Token..(start_Cache)');
            return false;
        }
        
        */
         $CI -> db -> select('web_cache, web_cache_time');
            $query = $CI -> db -> get('options');
            $row = $query -> row_array();

            if ($row['web_cache'] == 'cache_on') {
                $minutes = ($row['web_cache_time'] == '') ? 1 : $row['web_cache_time'];
                $CI -> output -> cache($minutes);
            }

    }

    public function turnOff($token) {

        $CI = &get_instance();
        $ConfigToken = $CI -> config -> item('Token_access_key');
        if ($ConfigToken == $token) {
            $CI -> db -> select('web_status, web_status_message');
            $query = $CI -> db -> get('options');
            $row = $query -> row_array();

            if ($row['web_status'] == 'status_off') {

                exit("<html><meta charset='utf-8' /><body><pre><p align='center'><font color='red'>$row[web_status_message]</p></pre></body></html>");
            }

        } else {
            exit('Error Token..(turnOff)');
            return false;
        }

    }

    public function notification($options) {

        $CI = &get_instance();

        $ConfigToken = $CI -> config -> item('Token_access_key');

        if (is_array($options) && count($options) == 3) {

            $keys = array('token', 'message', 'links');

        for($i=0;$i<3;$i++){
             if(!array_key_exists($keys[$i],$options)){
             exit('Error in Array Key.Please Check input array (notification)');
             return false;
             }

             }



         /*   $func = function($value) use ($options) {

                $check = array_key_exists($value, $options);
                if ($check == false) {
                    exit('Error in Array Key.Please Check input array (notification)');
                    return false;
                }
            };

            array_map($func, $keys);
               */
            /********************************************************************
             *-------- this code for php5.2---------------*
             for($i=0;$i<3;$i++){
             if(!array_key_exists($keys[$i],$options)){
             exit('Error in Array Key.Please Check input array (notification)');
             return false;
             }

             }
             **********************************************************************/

            $token = $options['token'];

            if ($ConfigToken == $token) {

                $message = ($options['message'] == '') ? '' : $options['message'];
                $links = ($options['links'] == '') ? '' : $options['links'];
                $data_notify = array('message' => $CI -> security -> xss_clean($message), 'links' => $CI -> security -> xss_clean($links), 'date_add' => date('Y-m-d h:i:s a'), 'read_message' => '1', 'time_msg' => time());

                $CI -> db -> insert('notification', $data_notify);

            } else {

                exit('Error Token..(notification)');
                return false;

            }

        } else {
            exit("Error Paramters is not array ");
        }
    }

    public function remove_notify() {
        $CI = &get_instance();

        $ConfigToken = $CI -> config -> item('Token_access_key');
        $confdata = $this -> get_config($ConfigToken, 'array');

        switch($confdata['notification_time']) {
            case '' :
                $expire_time = 60 * 60 * 24 * 10;
                break;

            case '0' :
                $expire_time = 60 * 60 * 24 * 10;
                break;

            default :
                $val_day = (int)$confdata['notification_time'];
                $expire_time = 60 * 60 * 24 * $val_day;
        }

        $last_date = time() - $expire_time;
        //  $last_date=time()-50;

        $CI -> db -> delete('notification', "read_message = '0' and time_msg < '$last_date'");

        //
    }

    /////////////////////////setupmailer

    public function Send_Email($to, $Subject, $Message, $attach = false, $fromEmail = false, $fromName = false) {

        try {

            @date_default_timezone_set('Etc/UTC');

            $mymail = new PHPMailer();

            //check if to and subject found
            if (!isset($to) || empty($to)) {
                exit('Error Param sendmail (To)');

            }

            if (!isset($Subject) || empty($Subject)) {

                exit('Error Param sendmail (subject)');
            }

            //////////get setingmail/////////////////////////////////////

            $CI = &get_instance();
            $CI -> load -> helper('file');
            $ConfigToken = $CI -> config -> item('Token_access_key');

            $mailConfig = $this -> get_MailConfig($ConfigToken, 'array');

            $mimetype = $mailConfig['MailFormat'];
            switch($mimetype) {
                case "text" :
                    $mymail -> ContentType = "text/plain";
                    $mymail -> IsHTML(false);
                    break;

                case "html" :
                    $mymail -> ContentType = "text/html";
                    $mymail -> IsHTML(true);
                    break;

                default :
                    $mymail -> ContentType = "text/html";
                    $mymail -> IsHTML(true);
            }

            if ($fromEmail) {
                $fromEmail = $fromEmail;
            } else {
                $fromEmail = $mailConfig['MailUser'];
            }

            if ($fromName) {
                $fromName = $fromName;
            } else {
                $fromName = $mailConfig["MailSender"];
            }

            $mymail -> Priority = "1";
            $mymail -> CharSet = 'utf-8';

            if ($attach != false) {

                $mymail -> AddAttachment('assets/tmp/' . $attach);

            }

            $mymail -> Port = $mailConfig['MailPort'];

            $mymail -> setFrom($fromEmail, $fromName);

            switch($mailConfig["MailServer"]) {
                case "Mail" :
                    $mymail -> Mailer = "mail";
                    break;

                case "smtp" :
                    $mymail -> Mailer = "smtp";

                    $mymail -> Host = $mailConfig["MailSmtp"];
                    $mymail -> Debugoutput = 'html';
                    $mymail -> SMTPDebug = false;
                    $mymail -> SMTPAuth = true;
                    $mymail -> Username = $mailConfig["MailUser"];
                    $mymail -> Password = $mailConfig["MailPwd"];
                    if ($mailConfig['Encryption'] != 'none') {
                        $mymail -> SMTPSecure = $mailConfig['Encryption'];
                    }

                    break;

                case "sendmail" :
                    $mymail -> Mailer = "sendmail";
                    break;

                default :
                    $mymail -> Mailer = "mail";
            }

            $mymail -> AddAddress($to);
            $mymail -> Subject = $Subject;
            $mymail -> Body = $Message;

            if (!$mymail -> Send()) {

                // echo "Mailer Error: " . $mymail -> ErrorInfo;
                @unlink('assets/tmp/' . $attach);
                $mymail -> ClearAddresses();
                $mymail -> ClearAttachments();

                return false;
            } else {

                @unlink('assets/tmp/' . $attach);
                $mymail -> ClearAddresses();
                $mymail -> ClearAttachments();
                return true;
            }

        } catch (Exception $e) {
            @unlink('assets/tmp/' . $attach);
            echo $e -> getMessage();
        }

    }

    /////include js file/////

    public function Javascript_link($src) {
        // if (file_exists(base_url()."assets/lib/" . $src)) {
        //echo base_url()."assets/lib/" . $src;
        //we know it will exists within the HTTP Context
        return sprintf("<script type=\"text/javascript\" src=\"%s\"></script>", base_url() . "assets/lib/" . $src);
        //  }
        // return "<!-- Unable to load " . $src . "-->";
    }

    /////////////////////////begin  editor
    /*
     * basic
     * full
     * */

    public function Editor($token, $class, $lang = 'ar') {
        //en_GB , ar

        $CI = &get_instance();

        $ConfigToken = $CI -> config -> item('Token_access_key');

        if ($ConfigToken != $token) {

            exit('Error Invalide Token :(editor)');

        }
        if ($class == "") {

            exit('Error:  Please give textarea classname _editor :(editor)');
        }

        echo $this -> Javascript_link("editor/tinymce/tinymce.min.js");

        echo "<script type=\"text/javascript\">
tinymce.init({
     selector: \"textarea.$class\",
    language : \"$lang\",
        plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor'
    ],
    toolbar1: \"insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image\",
    toolbar2: \"print preview media | forecolor backcolor emoticons\",
    image_advtab: true,
    
 });
    </script>
    ";

    }

    /// get icon

    public function getflag($flag, $alt = '') {

        $flags = 'flag flag-' . $flag;
        return "<img src=" . _BASE_FLAG_ . "blank.gif class=\"$flags\" title=\" $alt\" /> ";

    }

    ///////////////

    public function _is_curl_installed() {
        if (in_array('curl', get_loaded_extensions())) {
            return true;
        } else {
            return false;
        }
    }

    ////////////////////////////
    public function isDomainAvailible($domain) {

        //initialize curl
        $curlInit = curl_init($domain);
        curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 10);
        //curl_setopt($curlInit,CURLOPT_HEADER,true);
        //  curl_setopt($curlInit,CURLOPT_NOBODY,true);
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);

        //get answer
        $response = curl_exec($curlInit);

        curl_close($curlInit);

        if ($response)
            return 'online';

        return 'offline';
    }

    //////////////age////////////////

    public function flagOnline($ip) {

        $uri_lookup = array('http://api.codehelper.io/ips/?php&ip=' . $ip, 'http://ipinfo.io/json');

        if ($this -> _is_curl_installed()) {

            foreach ($uri_lookup as $key => $val) {

                if ($this -> isDomainAvailible($val) == 'online') {

                    $this -> Url = $val;

                    $this -> vServer = $key;

                    break;
                }

            }

            ////code/////

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this -> Url);
            curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");

            curl_setopt($ch, CURLOPT_HEADER, 0);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            $output = curl_exec($ch);
            curl_close($ch);

            switch($this->vServer) {
                case "0" :
                    $flag_sign = @json_decode($output, true);

                    $country_code = @$flag_sign['CountryCode2'];
                    break;
                case "1" :
                    $flag_sign = @json_decode($output, true);

                    $country_code = @$flag_sign['country'];

                    break;
            }

            return @strtolower($country_code);
        } else {

            $output = file_get_contents('http://ipinfo.io/json');
            $flag_sign = @json_decode($output, true);
            $country_code = @$flag_sign['country'];
            return @strtolower($country_code);

        }
        return false;
        ///////////////
    }

    public function flagOffline($ip) {
        $CI = &get_instance();
        $ip_num = sprintf("%u", ip2long($ip));

        $tablename = $CI -> db -> dbprefix('ip');
        $query = $CI -> db -> query("SELECT country_code,country_name FROM " . $tablename . " WHERE " . $ip_num . " BETWEEN begin_ip_num AND end_ip_num");

        $row = $query -> row_array();

        if ($query -> num_rows() != 0) {
            return strtolower($row['country_code']);
        }
        return false;

    }

    public function getCountry($code) {
        $CI = &get_instance();
        $CI -> db -> where(array('flag' => $code));
        $query = $CI -> db -> get('country');
        $row = $query -> row_array();

        return $row;

    }

    public function OptionsIP($ip) {

        $conf = $this -> getConfigVistors();
        switch($conf['visitors_discover']) {
            case "db" :
                if ($ip == '127.0.0.1') {
                    return 'eg';
                } else {
                    return $this -> flagOffline($ip);
                }
                break;
            case "web" :
                if ($ip == '127.0.0.1') {
                    return 'eg';
                } else {
                    return $this -> flagOnline($ip);
                }

                break;
        }

    }

    private function getConfigVistors() {
        $CI = &get_instance();
        $query = $CI -> db -> get('visitors_counters');
        $row = $query -> row_array();
        return $row;

    }

    ///////////////////////////

    public function setVisitors() {
    $CI = &get_instance();
   $CI -> load -> library('user_agent');
        $expire_session = time() - 900;
        $row_recode = array('visitor_status' => 'status_Off');
        $CI -> db -> update('visitors', $row_recode, "visitor_time < '$expire_session'");
        $CI -> db -> update('visitors', $row_recode, "visitor_time is NULL");
        ////////////////////10 days//////////

        $expire_time = time() - 864000;
        $CI -> db -> delete('visitors', "visitor_time < '$expire_time'");

        //$v_sess=$CI->session->userdata("visitor");
        //$this->session->userdata('session_id');

        $ses_val = $CI -> session -> userdata('vistorSession');

        if (!isset($ses_val) || $ses_val == '') {

            $session_id = $CI -> session -> userdata('session_id');
            $v_sess = array('vistorSession' => $session_id);
            $CI -> session -> set_userdata($v_sess);

            $CI -> load -> library('user_agent');

            $data_v1 = array("visitor_ip" => $CI -> input -> ip_address(), "visitor_os" => $CI -> agent -> platform(), "visitor_browser" => substr($CI -> agent -> browser() . ' Version ' . $CI -> agent -> version(), 0, 30), "visitor_date" => date('Y-m-d h:m:s'), "visitor_time" => time(), "visitor_id" => $CI -> session -> userdata('vistorSession'), "visitor_status" => 'status_On', "vistor_mobile" => $CI -> agent -> is_mobile() . '-' . $CI -> agent -> mobile(), "visitor_country" => $this -> OptionsIP($CI -> input -> ip_address()),"visitor_ch" => date('Y-m-d'));

            $CI -> db -> insert('visitors', $data_v1);

            $CI -> db -> set('visitors_counter', 'visitors_counter+1', FALSE);
            $CI -> db -> update('visitors_counters');

        } else {

            // $uniqueId = uniqid($this->CI->input->ip_address(), TRUE);
            //$this->session->set_userdata("my_session_id", md5($uniqueId));
            $VistorSession = $CI -> session -> userdata('vistorSession');
            $query = $CI -> db -> get_where('visitors', array('visitor_id' => $VistorSession), '1');
            $len = $query -> num_rows();

            if ($len != 0) {

                $row_recode2 = array('visitor_time' => time(), 'visitor_status' => 'status_On');
                $CI -> db -> where('visitor_id', $VistorSession);
                $CI -> db -> update('visitors', $row_recode2);
            }

        }
 
    }

    public function Pager($options) {

        $CI = &get_instance();
        $CI -> load -> library('pagination');
        $CI -> load -> helper('url');
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

            $config['first_tag_open'] = '<li>';

            $config['first_tag_close'] = '</li>';

            $config['last_tag_open'] = '<li>';

            $config['last_tag_close'] = '</li>';

            $config['next_tag_open'] = '<li>';

            $config['next_tag_close'] = '</li>';

            $config['prev_tag_open'] = '<li>';

            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="uk-active"><span>';

            $config['cur_tag_close'] = '</span></li>';

            $config['full_tag_open'] = "<ul  class='$options[class]'>";
            $config['full_tag_close'] = '</ul>';
            $CI -> pagination -> initialize($config);
            $pagination = $CI -> pagination -> create_links();
            return $pagination;
        } else {
            exit("Error Paramters is not array ");
        }

    }

    ///////////////////////////

    public function timeFormatAR($start, $end = null) {
        $end = (is_null($end)) ? time() : $end;
        $time = $end - $start;

        if ($time <= 60) {

            if ($time <= 1) {
                return 'منذ ثانية واحدة';
            }
            if ($time <= 2) {
                return 'منذ ثانيتين';
            }
            if ($time <= 10) {
                return 'منذ ' . $time . ' ثواني';
            }
            if ($time <= 59) {
                return 'منذ ' . $time . ' ثانية';
            }
            if ($time <= 60) {
                return 'منذ دقيقة واحدة';
            }

        }

        if (60 < $time && $time <= 3600) {
            $r = intval($time / 60);

            if ($r <= 1) {
                return 'منذ دقيقة واحدة';
            }

            if ($r <= 2) {
                return 'منذ دقيقتين';
            }

            if ($r <= 10) {
                return 'منذ ' . $r . ' دقائق';
            }

            if ($r <= 59) {
                return 'منذ ' . $r . ' دقيقة';
            }

            if ($r <= 60) {
                return 'منذ ساعة واحدة';
            }

        }

        if (3600 < $time && $time <= 86400) {
            $r = intval($time / 3600);

            if ($r <= 1) {
                return 'منذ ساعة واحدة';
            }
            if ($r <= 2) {
                return 'منذ ساعتين';
            }
            if ($r <= 10) {
                return 'منذ ' . $r . ' ساعات';
            }

            if ($r <= 23) {
                return 'منذ ' . $r . ' ساعة';
            }

            if ($r <= 24) {
                return 'منذ يوم أمس';
            }

        }

        if ($time > 86400) {
            return date('M d Y \a\t h:i A', $start);
        }
    }

    public function timeFormatEN($start, $end = null) {
        $end = (is_null($end)) ? time() : $end;
        $time = $end - $start;

        if ($time <= 60) {

            if ($time <= 1) {
                return 'A few seconds ago';
            }
            if ($time <= 2) {
                return '2 seconds ago';
            }
            if ($time <= 10) {
                return 'ago ' . $time . ' seconds';
            }
            if ($time <= 59) {
                return 'ago ' . $time . ' ثانية';
            }
            if ($time <= 60) {
                return '1 minute ago';
            }

        }

        if (60 < $time && $time <= 3600) {
            $r = intval($time / 60);

            if ($r <= 1) {
                return 'one minute ago';
            }

            if ($r <= 2) {
                return 'Two minutes ago';
            }

            if ($r <= 10) {
                return 'ago ' . $r . ' Minutes';
            }

            if ($r <= 59) {
                return 'ago ' . $r . ' Minute';
            }

            if ($r <= 60) {
                return 'about an hour ago';
            }

        }

        if (3600 < $time && $time <= 86400) {
            $r = intval($time / 3600);

            if ($r <= 1) {
                return 'about an hour ago';
            }
            if ($r <= 2) {
                return 'Two hours ago';
            }
            if ($r <= 10) {
                return 'ago ' . $r . ' Hours';
            }

            if ($r <= 23) {
                return 'ago ' . $r . ' Hour';
            }

            if ($r <= 24) {
                return 'Since yesterday';
            }

        }

        if ($time > 86400) {
            return date('M d Y \a\t h:i A', $start);
        }
    }

    ////////////////////////

    /*
     * <?php echo validation_errors();

     ?>
     *
     *
     * required|min_length[5]|max_length[12] valid_email matches[passconf]'
     * $config = array(
     array(
     'field'   => 'username',
     'label'   => 'Username',
     'rules'   => 'required'
     ),
     array(
     'field'   => 'password',
     'label'   => 'Password',
     'rules'   => 'required'
     ),
     array(
     'field'   => 'passconf',
     'label'   => 'Password Confirmation',
     'rules'   => 'required'
     ),
     array(
     'field'   => 'email',
     'label'   => 'Email',
     'rules'   => 'required'
     )
     );
     *

     * */

    public function CheckControl($config) {
        $CI = &get_instance();
        $CI -> load -> helper(array('form', 'url'));

        $CI -> load -> library('form_validation');
        $CI -> form_validation -> set_error_delimiters('<div class="uk-alert uk-alert-danger font_deafult dirTemplate">', '</div>');
        $CI -> form_validation -> set_rules($config);
        if ($CI -> form_validation -> run() == FALSE) {

            return false;
        } else {

            return true;
        }

    }

    public function GenerateKey() {
        $seed = (double) microtime() * 1000000;
        srand($seed);
        return rand();
    }

    public function generateRandomString($length = 6) {

        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return strtolower($randomString);
    }

    public function ShowIP() {
        if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('REMOTE_ADDR')) {
            $ip = getenv('REMOTE_ADDR');
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    /**
     * ::remoteFile() -   Read file from server
     * @param url   string  path file
     * @return string
     */

    public function remoteFile($url) {
        if (function_exists('curl_init')) {
            $curl = @curl_init();
            $timeout = 0;
            @curl_setopt($curl, CURLOPT_URL, $url);
            @curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            @curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
            $buffer = @curl_exec($curl);
            @curl_close($curl);
            return $buffer;
        } elseif (function_exists('file_get_contents')) {
            $buffer = @file_get_contents($url);
            return $buffer;
        } elseif (function_exists('file')) {
            $buffer = @implode('', @file($url));
            return $buffer;
        } else {
            return false;
        }
    }

    /**
     * ::ServerInfo() -  get info about server
     * @return string
     */
    public function ServerInfo() {
        return phpinfo();
    }

    /**
     * ::Apacheinfo() -   Show Apacheinfo
     * @param att  (M,V,U) string  type info from apache
     * @param uri    string  filename form lookup
     * @return string
     */
    public function Apacheinfo($att, $uri = '') {

        switch($att) {
            case "M" :
                $appserv = apache_get_modules();
                return $appserv;
                break;
            case "V" :
                $appserv = apache_get_version();
                return $appserv;
                break;
            case "U" :
                $appserv = apache_lookup_uri($uri);
                return $appserv;
                break;
        }

    }

    /**
     *::__FormatSize() alies function To Format size  file
     *@param size Int File size
     *@return string
     */

    public function formatSize($fileSize) {

        $byteUnits = array(" GB", " MB", " KB", " bytes");

        if ($fileSize >= 1073741824) {
            $fileSize = round($fileSize / 1073741824 * 100) / 100 . $byteUnits[0];
        } elseif ($fileSize >= 1048576) {
            $fileSize = round($fileSize / 1048576 * 100) / 100 . $byteUnits[1];
        } elseif ($fileSize >= 1024) {
            $fileSize = round($fileSize / 1024 * 100) / 100 . $byteUnits[2];
        } else {
            $fileSize = $fileSize . $byteUnits[3];
        }
        return $fileSize;
    }

    /**
     *::dir_size()  function to get folder size
     *@param path string File path
     *@return int
     */

    public function dir_size($path) {
        $size = 0;

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
    }

    /**
     *DeleteDir() function To delete all file in dir
     *@param   dirs  string directory String
     *@return boolean
     */

    public function DeleteDir($dirs) {

        if ($handle = opendir("$dirs")) {
            while (false !== ($item = readdir($handle))) {
                if ($item != "." && $item != "..") {
                    if (is_dir("$dirs/$item")) {
                        $this -> DeleteDir("$dirs/$item");
                    } else {
                        @unlink("$dirs/$item");
                    }
                }
            }
            closedir($handle);
            rmdir($dirs);

        }
    }

    /**
     *::removeFolder() function To delete  directory
     *@param   dirs  string directory String
     *@return boolean
     */

    public function removeFolder($dir) {
        if (!is_dir($dir))
            return false;

        for ($s = DIRECTORY_SEPARATOR, $stack = array($dir), $emptyDirs = array($dir); $dir = array_pop($stack); ) {
            if (!($handle = @dir($dir)))
                continue;
            while (false !== $item = $handle -> read())
                $item != '.' && $item != '..' && (is_dir($path = $handle -> path . $s . $item) ? array_push($stack, $path) && array_push($emptyDirs, $path) : unlink($path));
            $handle -> close();
        }
        for ($i = count($emptyDirs); $i--; rmdir($emptyDirs[$i]));

    }

    /**
     *::File_extension() get File Exetention.......
     *@param filename string Filename &path file;
     *@return string
     */

    public function File_extension($filename) {

        $exe = end(explode(".", $filename));

        return $exe;

    }

    /**
     *::__File_extension()  alies function get File Exetention.......
     *@param filename string Filename &path file;
     *@return string
     */

    function __File_extension($filename) {
        $path_info = @pathinfo($filename);
        return $path_info['extension'];
    }

    public function ReadRss($url) {

        $filerss = $this -> remoteFile($url);
        $xml = new SimpleXMLElement($filerss);
        $rss = $xml -> xpath('//item');
        if (is_array($rss)) {
            return $rss;
        }
        return false;
    }

    /**
     * ::ReadXml() -   Read xml file
     * @param filename   string  path file xml
     * @return Object
     */
    public function ReadXml($filename) {

        $Chexe = strtoupper($this -> File_extension($filename));
        if ($Chexe == "XML") {
            $Obj = simplexml_load_file($filename);
            return $Obj;
        } else {
            return false;
        }

    }

    /**
     * ::ReadJson() -   Read json file
     * @param filename   string  path file xml
     * @return array
     */

    public function ReadJson($filename) {

        if (file_exists($filename)) {
            $file = file_get_contents($filename);
            $json = json_decode($file);
            return $json;
        } else {
            return false;
        }
    }

    /**
     *
     * Function to make URLs into links
     *
     * @param string The url string
     *
     * @return string
     *
     **/
    function makeLink($string) {
        $string = preg_replace("/([^\w\/])(www\.[a-z0-9\-]+\.[a-z0-9\-]+)/i", "$1http://$2", $string);
        $string = preg_replace("/([\w]+:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/i", "<a target=\"_blank\" href=\"$1\">$1</A>", $string);
        $string = preg_replace("/([\w-?&;#~=\.\/]+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?))/i", "<A HREF=\"mailto:$1\">$1</A>", $string);
        return $string;
    }

    /**
     * ::text2links() - convert all link to html link and active it
     * @param str  string
     * @return string
     */

    public function text2links($str = '') {
        if ($str == '' or !preg_match('/(http|www\.|@)/i', $str)) {
            return $str;
        }
        $lines = explode("\n", $str);
        $new_text = '';
        while (list($k, $l) = each($lines)) {
            $l = preg_replace("/([ \t]|^)www\./i", "\\1http://www.", $l);
            $l = preg_replace("/([ \t]|^)ftp\./i", "\\1ftp://ftp.", $l);

            $l = preg_replace("/(http:\/\/[^ )\r\n!]+)/i", "<a href=\"\\1\">\\1</a>", $l);

            $l = preg_replace("/(https:\/\/[^ )\r\n!]+)/i", "<a href=\"\\1\">\\1</a>", $l);

            $l = preg_replace("/(ftp:\/\/[^ )\r\n!]+)/i", "<a href=\"\\1\">\\1</a>", $l);

            $l = preg_replace("/([-a-z0-9_]+(\.[_a-z0-9-]+)*@([a-z0-9-]+(\.[a-z0-9-]+)+))/i", "<a href=\"mailto:\\1\">\\1</a>", $l);
            $new_text .= $l . "\n";
        }

        return $new_text;
    }

    /**
     *::fix_badwords() - Filter all bad words
     *@param str  string text want to filter
     *@param bad_words  string with bad words  fuck,shit,paragraph
     *@param replace_str  string ,*
     *@return string
     */

    public function fix_badwords($str, $bad_words, $replace_str = '') {
        if (!is_array($bad_words)) { $bad_words = explode(',', $bad_words);
        }
        for ($x = 0; $x < count($bad_words); $x++) {
            $fix = isset($bad_words[$x]) ? $bad_words[$x] : '';
            $_replace_str = $replace_str;
            if (strlen($replace_str) == 1) {
                $_replace_str = str_pad($_replace_str, strlen($fix), $replace_str);
            }
            $str = preg_replace('/' . $fix . '/i', $_replace_str, $str);
        }
        return $str;
    }

    /**
     *::showFile() -Show file by type
     *@param target string  target dir
     *@param typefile  string    {*.jpeg,*.jpeg,*.png,*.gif}
     *@return array
     */

    public function showFile($target, $typefile) {
        foreach (glob("$target/$typefile",GLOB_BRACE) as $filename) {
            $files[] = basename($filename);
        }
        return $files;
    }

    public function highlight_words($word, $subject) {
        if (is_array($word)) {
            $regex_chars = "*|#.+?(){}[]^$/";
            for ($j = 0; $j < count($word); $j++) {
                for ($i = 0; $i < strlen($regex_chars); $i++) {
                    $char = substr($regex_chars, $i, 1);
                    $word[$j] = str_replace($char, '\\' . $char, $word[$j]);
                }
                $subject = preg_replace("/(" . $word[$j] . ")/is", "<span style='background-color:yellow;font-weight:bold;padding-left:2px;padding-right:2px'>\\1</span>", $subject);
            }
        }
        return $subject;
    }

    public function div_words($text) {
        $MText = wordwrap($text, 20, "<br />\n");
        return nl2br($MText);
    }

    /////////////////////////////////////////////

    /*
     * convert xml 2 array
     */

    function xml2array($xml) {
        $xmlary = array();

        $reels = '/<(\w+)\s*([^\/>]*)\s*(?:\/>|>(.*)<\/\s*\\1\s*>)/s';
        $reattrs = '/(\w+)=(?:"|\')([^"\']*)(:?"|\')/';

        preg_match_all($reels, $xml, $elements);

        foreach ($elements[1] as $ie => $xx) {
            $xmlary[$ie]["name"] = $elements[1][$ie];

            if ($attributes = trim($elements[2][$ie])) {
                preg_match_all($reattrs, $attributes, $att);
                foreach ($att[1] as $ia => $xx)
                    $xmlary[$ie]["attributes"][$att[1][$ia]] = $att[2][$ia];
            }

            $cdend = strpos($elements[3][$ie], "<");
            if ($cdend > 0) {
                $xmlary[$ie]["text"] = substr($elements[3][$ie], 0, $cdend - 1);
            }

            if (preg_match($reels, $elements[3][$ie]))
                $xmlary[$ie]["elements"] = xml2array($elements[3][$ie]);
            else if ($elements[3][$ie]) {
                $xmlary[$ie]["text"] = $elements[3][$ie];
            }
        }

        return $xmlary;
    }

    public function directorySize($directory) {
        $size = 0;
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $file) {
            $size += $file -> getSize();
        }
        return $size;
    }
    
    
 /*
  * $r=explorer_Dir('img',2,SORT_DESC);
  * */   
   
public function explorer_Dir ($dir, $sortCol = DIR_SORT_NAME, $sortDir = SORT_ASC) {

  // Validate arguments
  $dir = rtrim(str_replace('\\', '/', $dir), '/');
  $sortCol = (int) ($sortCol >= 1 && $sortCol <= 5) ? $sortCol : 1;
  $sortDir = ($sortDir == SORT_DESC) ? SORT_DESC : SORT_ASC;
  $name = $size = $aTime = $mTime = $cTime = $table = array();

  // Open the directory, return FALSE if we can't
  if (!is_dir($dir) || (!$dp = opendir($dir))) return FALSE;

  // Fetch a list of files in the directory and get stats
  for ($i = 0; ($file = readdir($dp)) !== FALSE; $i++) {
    if (!in_array($file, array('.','..'))) {
      $path = "$dir/$file";
      $row = array('name'=>$file,'size'=>filesize($path),'atime'=>fileatime($path),'mtime'=>filemtime($path),'ctime'=>filectime($path));
      $name[$i] = $row['name'];
      $size[$i] = $row['size'];
      $aTime[$i] = $row['atime'];
      $mTime[$i] = $row['mtime'];
      $cTime[$i] = $row['ctime'];
      $table[$i] = $row;
    }
  }
//
//SORT_DESC  ,SORT_ASC
  // Sort the results
  switch ($sortCol) {
    case DIR_SORT_NAME:
      array_multisort($name, $sortDir, $table);
      break;
    case DIR_SORT_SIZE:
      array_multisort($size, $sortDir, $name, SORT_DESC, $table);
      break;
    case DIR_SORT_ATIME:
      array_multisort($aTime, $sortDir, $name, SORT_DESC, $table);
      break;
    case DIR_SORT_MTIME:
      array_multisort($mTime, $sortDir, $name, SORT_DESC, $table);
      break;
    case DIR_SORT_CTIME:
      array_multisort($cTime, $sortDir, $name, SORT_DESC, $table);
      break;
  }

  // Return the result
  return $table;

}
    
    
    
    
    public function downloadFile($file){
   $file_name = $file;
   $mime = 'application/force-download';
   header('Pragma: public');    
   header('Expires: 0');        
   header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
   header('Cache-Control: private',false);
   header('Content-Type: '.$mime);
   header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
   header('Content-Transfer-Encoding: binary');
   header('Connection: close');
   readfile($file_name);    
   exit();
}
    
    
    
    
    
    
  public function Check_Url($url){
      if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
     return false;
      }else {
          
          return true;
      }
      
  }  
    
   public function _Check_Url($url){
      if(preg_match('~((http|https|ftp|ftps)://|www.)(.+?)~',$url)) {
     return true;
      }
      else {         
   return false;
      }
      
  }  
      
    
    
/////////////


public function getPartCat($id){
    $CI = &get_instance();
    $CI->db->where('cat', $id ); 
    $query = $this -> db -> get('categories');
    $row_cat = $query -> result_array();
    return $row_cat;
    
} 
 
 
    
    
 

public function get_breadcrumbs($IDS,$type){
    $CI = &get_instance();
$c=0;
$tablename = $CI -> db -> dbprefix('categories');
for ($i=0;$i<=6;$i++){
if($c==0){
 
$query=$CI->db->query("select * from $tablename  where (`ID`='$IDS') and `module`='$type' " );
$r=$query->row_array();
$name[]=$r['name']."-".$r['ID'];
//$name[]=$r['name']."-".$r['ID']; for english
 
 
$id=$r['cat'];
$c++;
}else{
if($id!=0){

$query=$CI->db->query("select * from $tablename  where (`ID`='$id') and `module`='$type'");
$r=$query->row_array();

$name[]=$r['name']."-".$r['ID'];
$id=$r['cat'];
}else{
break;
}
}
}
return $name;
}

    
    


public function get_breadcrumbs2($IDS,$type){
    $CI = &get_instance();
$c=0;
$tablename = $CI -> db -> dbprefix('categories');
for ($i=0;$i<=6;$i++){
if($c==0){
 
$query=$CI->db->query("select * from $tablename  where (`ID`='$IDS') and `module`='$type'");
$r=$query->row_array();
$name[]=$r['name_allies']."-".$r['ID'];
//$name[]=$r['name']."-".$r['ID']; for english
 
 
$id=$r['cat'];
$c++;
}else{
if($id!=0){

$query=$CI->db->query("select * from $tablename  where (`ID`='$id') and `module`='$type'");
$r=$query->row_array();

$name[]=$r['name_allies']."-".$r['ID'];
$id=$r['cat'];
}else{
break;
}
}
}
return $name;
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
 
 
 
 
 public function CP_Auth($role=0,$redirect=true,$msg=''){
    $CI = &get_instance();
    $CI ->load->helper('url');
  if($CI->session->userdata('IUser_role')==$role){
     return true; 
      
  } else {
      if($redirect==true){
        redirect('cp/', 'location');  
      } else {
           
          exit($msg);
      }
      
  } 
    
    
    
 
     
 }
 
 
 
 
 
 public function Acl_Auth($msg=null,$redirect=true,$url='/'){
    $CI = &get_instance();
    $CI ->load->helper('url');
  if($CI->session->userdata('IUser_role')!=''){
     return true; 
      
  } else {
      if($redirect==true){
        redirect($url, 'location');  
      } else {
           
          exit($msg);
      }
      
  } 
    
    
    
 
     
 } 
 
 
 
 
  public function CurrentUser(){
      $CI = &get_instance();
     $email=$CI->session->userdata('IUser_email');
   $CI -> db -> where(array('email' => $email));
        $query =$CI -> db -> get('members');  
        $row=$query->row_array();
        return $row;
 }
 
 
 
 
 
 
 
 
 
 
 
 public  function UpdateStatus(){
     
   $CI = &get_instance();   
 
       $expire_session = time() - 900;
        $row_recode = array('status' => 'offline');
        $CI -> db -> update('members', $row_recode, "time_login < '$expire_session'");
        $CI -> db -> update('members', $row_recode, "time_login is NULL");
 
 
 
 if($CI->session->userdata('IUser_ID')!=''){
$n=time();
 
$dataoptions=array(
'status'=>'online',
'time_login'=>$n
);

$CI->db->where('ID', $CI->session->userdata('IUser_ID')); 
$CI -> db -> update('members', $dataoptions);  


}
 
}
 
 
 
 //echo '<img src="'.$url.'"/>'; 
 public function getAvatar($email){
     
$size = 40;
$url = 'http://www.gravatar.com/avatar/'; 
$url .= md5( strtolower( trim( $email ) ) ); 
$url .='?s='.$size;    
 return $url;    
 }
 
 
 
 
//change lang 
public function ChangeLanguage($lang,$uri='app'){
      $CI = &get_instance();
    $TPL_Config = $CI -> config -> item('Template_Type');
   
  
  if($TPL_Config != 'A' && $TPL_Config!='B'){
   
if($lang=='arabic'){
  $Pstyle='ar';
}
if($lang=='english'){
 $Pstyle='en';
}  
$PLang=array('Plang'=>$lang,'Pstyle'=>$Pstyle);
 
 $CI->session->set_userdata($PLang);
   
   
  }  
    redirect($uri,'location');  
    
} 
 
 
 
 /////////////////////////////////////////////
 //get key lang ar or en
 public function getLangKey(){
    $CI = &get_instance();
    $TPL_Config = $CI -> config -> item('Template_Type');
     @$session_style = @$CI->session->userdata('Pstyle'); 
    if($session_style!=''){
        return $session_style;
    } else {
          if( $TPL_Config !='B'){
              return 'en';
          } else {
              
              return 'ar';
          }
        
        
    }
     
 }
 
 
 
  //get lang only
  public function setClang($controller='app'){
    $CI = &get_instance(); 
    $TPL_Config = $CI -> config -> item('Template_Type');    
      @$session_language = @$CI->session->userdata('Plang');  
   @$session_style = @$CI->session->userdata('Pstyle');  
       if($session_language!=''){
            
    $CI->lang->load($controller, $session_language);
    } else {
      if( $TPL_Config !='B'){
          $CI->lang->load($controller, 'arabic');
      }   else {
          $CI->lang->load($controller, 'english');
      }  
           
       }
           
      
  }
 
 
 
 
  
 
 //get lang only
  public function setAdminLang($controller='app'){
    $CI = &get_instance(); 
   @$session_language = @$CI->session->userdata('cplang');  
 @$session_style = @$CI->session->userdata('cpstyle');    
  $TPL_Config = $CI -> config -> item('Template_Type');
    
 if($session_language!=''){
   $CI->lang->load($controller, $session_language);
  } else {
      
      switch($TPL_Config){
          case 'A':
            $CI->lang->load($controller, 'arabic');
            $CI->session->set_userdata('cpstyle', 'ar');  
          break;
          
          case 'B':
            $CI->lang->load($controller, 'english');
            $CI->session->set_userdata('cpstyle', 'en'); 
          break;
          
          default:
            $CI->lang->load($controller, 'arabic');
            $CI->session->set_userdata('cpstyle', 'ar'); 
          break;
           }
  }
     //end switch
     
           
      
  }
 
 
 
 
 
 
 
 
 //get lang and layout
   
 public function setThemes($controller='app'){
   $CI = &get_instance(); 
  
   $CI->load->library('template');
   $TPL_Config = $CI -> config -> item('Template_Type');    
   $Themes_ar=  $CI -> config -> item('Template_Arabic');      
   $Themes_en=    $CI -> config -> item('Template_English');     
     
   @$session_language = @$CI->session->userdata('Plang');  
   @$session_style = @$CI->session->userdata('Pstyle');     
     if($session_language!=''){
    $CI->lang->load($controller, $session_language);
         ////////////////
         switch($session_language){
             case 'arabic':
       $CI->template->setTemplate($Themes_ar);
                 break;
             case 'english':
       $CI->template->setTemplate($Themes_en);
                 break;     
         }
         
         
         ///////////////
     } else {
         
          switch($TPL_Config){
          case 'A':
            $CI->lang->load($controller, 'arabic');
            $CI->template->setTemplate($Themes_ar);
            $CI->session->set_userdata('Pstyle', 'ar');  
          break;
          
          case 'B':
            $CI->lang->load($controller, 'english');
            $CI->template->setTemplate($Themes_en);
            $CI->session->set_userdata('Pstyle', 'en'); 
          break;
          
          default:
            $CI->lang->load($controller, 'arabic');
            $CI->template->setTemplate($Themes_ar);
            $CI->session->set_userdata('Pstyle', 'ar'); 
          break;
           }
     //end switch
         
         
     }
     
     
   
 }
  ///////////////// 
    
    
   
   
   
   
  /*
* @param string $str
* @param array $options
* @return string
*/
public function url_slug($str, $options = array()) {
// Make sure string is in UTF-8 and strip invalid UTF-8 characters
$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
$defaults = array(
'delimiter' => '-',
'limit' => null,
'lowercase' => true,
'replacements' => array(),
'transliterate' => false,
);
// Merge options
$options = array_merge($defaults, $options);
$char_map = array(
// Latin
'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
'ß' => 'ss',
'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
'ÿ' => 'y',
 
// Latin symbols
'©' => '(c)',
 
// Greek
'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
'Ϋ' => 'Y',
'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
 
// Turkish
'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
 
// Russian
'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
'Я' => 'Ya',
'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
'я' => 'ya',
 
// Ukrainian
'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
 
// Czech
'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
'Ž' => 'Z',
'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
'ž' => 'z',
 
// Polish
'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
'Ż' => 'Z',
'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
'ż' => 'z',
 
// Latvian
'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
'š' => 's', 'ū' => 'u', 'ž' => 'z'
);
// Make custom replacements
$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
// Transliterate characters to ASCII
if ($options['transliterate']) {
$str = str_replace(array_keys($char_map), $char_map, $str);
}
// Replace non-alphanumeric characters with our delimiter
$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
// Remove duplicate delimiters
$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
// Truncate slug to max. characters
$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
// Remove delimiter from ends
$str = trim($str, $options['delimiter']);
return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
} 
   
   
   
   
   
   

}