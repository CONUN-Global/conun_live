<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Config extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('form','url','admin','search','office'));		
		admin_chk();
		
		$this->load->library('form_validation');
			
		//model load
		$this->load->model('m_admin'); // 서치용 및 리스트용
		
	}

	function index()
	{
		
		$data = array();
		$data['title'] = "환경설정";
		$data['group'] = "대시보드";
	
		$data['item'] = $this->m_admin->get_config(); //멤버 정보 가져오기
			
			
		$this->form_validation->set_rules('coin1_name', 'coin1_name', 'required');

		if ($this->form_validation->run() == FALSE) {

			layout('config',$data,'admin');
			

		} else {
			$this->m_admin->set_config();
			
			alert("수정했습니다.","admin/config");	
			//$this->load->view('admin/config',$data,'admin');
		}
	}
	
	
	function su()
	{		
		$data = array();
		$data['title'] = "환경설정";
		$data['group'] = "대시보드";
		
		$data['item'] = $this->m_admin->get_config(); //멤버 정보 가져오기
			
			
		$this->form_validation->set_rules('cfg_no', 'cfg_no', 'required');

		if ($this->form_validation->run() == FALSE) {

			layout('configSu',$data,'admin');
			

		} else {
			$this->m_admin->set_config2();
			
			alert("수정했습니다.","admin/config/su");
		}
	}
	
	
	function package()
	{		
		$data = array();
		$data['title'] = "환경설정";
		$data['group'] = "대시보드";
		
		$data['item'] = $this->m_admin->get_config(); //멤버 정보 가져오기
			
			
		$this->form_validation->set_rules('cfg_no', 'cfg_no', 'required');

		if ($this->form_validation->run() == FALSE) {

			layout('configPackage',$data,'admin');
			

		} else {
			$this->m_admin->set_config3();
			
			alert("수정했습니다.","admin/config/package");
		}
	}
	
	
	function coin()
	{		
		$data = array();
		$data['title'] = "환경설정";
		$data['group'] = "대시보드";
		
		$data['item'] = $this->m_admin->get_config(); //멤버 정보 가져오기
			
			
		$this->form_validation->set_rules('cfg_no', 'cfg_no', 'required');

		if ($this->form_validation->run() == FALSE) {

			layout('configCoin',$data,'admin');
			

		} else {
			$this->m_admin->set_config2();
			
			alert("수정했습니다.","admin/config/coin");
		}
	}
	
	
}