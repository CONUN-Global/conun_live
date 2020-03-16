<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lang extends CI_Controller {


	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->helper('cookie');
	
		// 라이브러리
		$this->load->library('form_validation');


	}


	function index()
	{
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'signup-page');
		$data['conf'] = get_site(); 

		layout('lang/lists',$data);
		
	}



	function result() 
	{
		
	$host =explode('.',$_SERVER['HTTP_HOST']);
	$cnt = count($host);

	if ($cnt == 2) { 
		$host = $host[0].'.'.$host[1];
	}

	if ($cnt == 3) { 
		$host = $host[1].'.'.$host[2];
	}

	if ($cnt == 4) { 
		$host = $host[2].'.'.$host[3];
	}

		$lang = $this->input->get('lang');
		$url = $this->input->get('url');
		
		$cookie = array(
            'name'   => 'lang',
            'value'  => $lang,
            'expire' => '86500',
            'domain' => '.'.$host,
            'path'   => '/',
		);

		set_cookie($cookie); 
		
		redirect($url);
	}


}
?>