<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Template {

	private $obj;
	private $template;
	// const DEFAULTLAYOUT='../../app/views/Template/default/Template';
	private $uri = '../../app/views/Template/';
	public function __construct() {
		$this -> obj = &get_instance();
		$this -> template = Layout::DEFAULTLAYOUT;
	}

	public function setTemplate($template) {

		$this -> template = $this -> uri . $template . '/Template';
	}

	public function TPL($view, $data = null, $return = false) {
		$loadedData = array();
		$loadedData['container'] = $this -> obj -> load -> view($view, $data, true);

		if ($return) {
			$output = $this -> obj -> load -> view($this -> template, $loadedData, true);
			return $output;
		} else {
			$this -> obj -> load -> view($this -> template, $loadedData, false);
		}
	}

}