<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// 라이브러리
		$this->load->library('form_validation');

		//모델 로드
		$this -> load -> model('m_member');

	}

	//로그인
	function index()
	{
		
		$data = array();
		$data['header'] = array('title'=>'Login','group'=>'signup-page');
		$data['conf'] = get_site(); 
	
		// 이미 로그인 햇다면
		if ($this->session->userdata('is_login') == TRUE) {
			redirect('/token');
		}

		// 기존 머물렀던 url 존재 한다면
		$is_url = urldecode($this->uri->segment(3));
		$is_url = str_replace('.2F', '/', urlencode($is_url));

		// 폼검증
		$this->form_validation->set_rules('member_id', '아이디', 'required');
		$this->form_validation->set_rules('password', '암호', 'required');

		if ($this->form_validation->run() == FALSE)
		{

			$lang = get_cookie('lang');
		
			if ($lang == "us") {
				layout('/member/login',$data);
			}

			else if ($lang == "cn") {
				layout('/member/login_CN',$data);
			}
			else if ($lang == "jp") {
				layout('/member/login_JP',$data);
			}
			
			else if ($lang == "kr" or $lang == "") {
				layout('/member/login_KR',$data);	
			}


		} else {

			$member = $this->m_member->get_member(strtolower($this->input->post('member_id')));

			if (!$member || $this->input->post('password') != $member->password) {

				alert("ID or Password Check!!.");

			} else {
				

				//세션 굽기
				$member_ses= array(
					'member_id'  => $member->member_id,
					'level'  => $member->level,
					'is_login' => TRUE,
				);
				$this->session->set_userdata($member_ses);

				// 최근 접속일
				$this->db->where('member_id', $this->session->userdata('member_id'));
				$this->db->set('last_login', 'now()', FALSE);
				$this->db->update('m_member');

				redirect('/token');

			}

		}

	}



	// 로그아웃
	function out()
	{
		delete_cookie('autologin');
		$this->session->sess_destroy();

		redirect('conun');

	}

}
?>
