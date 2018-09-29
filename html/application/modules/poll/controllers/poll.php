<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Poll extends MX_Controller {

    const VIEWPATH = '../../poll/views/poll/';

    public function __construct() {
        parent::__construct();
        $api = $this -> load -> library('apiservices');
        $api -> setClang('poll');
        $this -> load -> model('poll_model');
    }

    public function poll($token = null) {
$api = $this -> load -> library('apiservices');
         $api->start_Cache();
        try {
            $ConfigToken = $this -> config -> item('Token_access_key');
            if ($ConfigToken != $token) {

                exit("Error :Token is invalid");
            }
            $data = array();

            

            $rs_poll = $this -> poll_model -> getselectedPoll();

            if (@$_COOKIE['poll'] != $rs_poll['question']['ID']) {
                ////////////////////////////////////
                if ($this -> input -> post('IsPost_viewPolls') == "view") {
                    $this -> viewpoll();
                } else if ($this -> input -> post("IsPost_sendPolls") == "send") {

                    $this -> poll_model -> addpoll();
                    $this -> viewpoll();
                } else {

                    $data['polls'] = $rs_poll;

                    $this -> load -> view(Poll::VIEWPATH . 'index', $data);
                }

                ///////////////////////////////////////////////////////////
            } else {
                $this -> viewpoll();
            }

        } catch (Exception $e) {
            echo $e -> getMessage();
        }

    }

    public function viewpoll() {
        $api = $this -> load -> library('apiservices');
         $api->start_Cache();
        $data = array();

        $data['polls'] = $this -> poll_model -> getselectedPoll();
        $this -> load -> view(Poll::VIEWPATH . 'view', $data);
    }

}
