<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Etc extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->load->library('bitcoin');

		//모델 로드
		$this -> load -> model('m_member');
		$this -> load -> model('m_coin');

		loginCheck();
	}
	
	public function index()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'ETC');
		$data['conf'] = get_site(); 


		layout('etc',$data,'etc');
	}
}
?>