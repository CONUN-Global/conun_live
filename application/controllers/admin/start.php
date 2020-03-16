<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Start extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','admin','search','office'));			
		admin_chk();
		
		$this->load->library('form_validation');
 		$this -> load -> model('m_research');
		$this -> load -> model('m_point');
		$this -> load -> model('m_coin');
        $this -> load -> model('m_member');

	}

	function index()
	{
	
		if ($this->session->userdata('is_login') == FALSE) {
			alert("admin login", "".login_url()."");
		}
		$data['title'] = "대시보드";
		$data['group'] = "대시보드";
		// 가입 회원수
		$data['member_total'] = $this->m_research->get_member_total() - 1;
        $param_bal['APT_TYPE'] = 'W_GETADDR';
        $param_bal['MEMBER_ID'] = "admin";
        $bal_list = $this->m_member->getApiData($param_bal);
        $bal_list = json_decode(trim($bal_list), true);
        $data['bal_list'] = $bal_list['coin_list'];
  		layout('start',$data,'admin');
	}

}
?>