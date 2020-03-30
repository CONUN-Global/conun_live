<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Phpinfo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','admin','lists'));
		$this->load->library('form_validation');

		$this -> load -> model('Admin_model');
		
		// 테마 선택여부 상수지정
		$config = $this->Common_model->get_config('theme');
		define('THEME_SKIN', $config->theme);
		admin_chk();
		
	}
	
	
	function index() {

		$this->lists();
	
	}

	function lists()
	{

		

		layout('phpinfo',$data,'admin');
	}
	

}
?>