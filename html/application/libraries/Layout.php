<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Layout {

	private $obj;

	private $layout;

	const DEFAULTLAYOUT = '../../cp/views/themes/Default/Template';

	public function __construct() {

		$this -> obj = &get_instance();

		$this -> layout = Layout::DEFAULTLAYOUT;

	}

	public function setLayout($layout) {

		@$this -> layout = $layout;

	}

	public function view($view, $data = null, $return = false) {

		$loadedData = array();

		$loadedData['content_for_layout'] = $this -> obj -> load -> view($view, $data, true);

		if ($return) {

			$output = $this -> obj -> load -> view($this -> layout, $loadedData, true);

			return $output;

		} else {

			$this -> obj -> load -> view($this -> layout, $loadedData, false);

		}

	}

}