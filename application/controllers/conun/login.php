<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// 라이브러리
		$this->load->library('form_validation');
		define('SKIN_DIR', '/views/web/conun');

		//모델 로드
		$this -> load -> model('m_member');

	}



    function bioauth(){
		
		    $data=array();
          
			$this->load->view('app/bio_login');



	}



	//로그인

	function otpReg(){
		$data = array();
		$data['header'] = array('title'=>'Login','group'=>'signup-page');
		$data['conf'] = get_site();
		$this->load->library("otp");

		$this->form_validation->set_rules('otp_password', 'otp', 'required');
		$this->form_validation->set_rules('secretKey', 'secretKey', 'required');



		if ($this->form_validation->run() == FALSE) {


			$member_id = $this->session->userdata("member_id");
			$data['otp'] = $this->otp->ci_generator($member_id, 'LiumWallet');
			layout('admin/otp', $data, 'app_main');
		}else{

			$secretKey =$this->input->post("secretKey");
			$otp_password =$this->input->post("otp_password");
			$member_level = $this->session->userdata("member_level");
			if( $this->otp->ci_verify($secretKey,$otp_password)){

				$this->db->where('member_id', $this->session->userdata('member_id'));
				$this->db->set('member_otp', $secretKey);
				$this->db->update('m_member');

				$member_ses= array(
					'otp_login'  => true,
					'member_otp' =>$secretKey
				);
				$this->session->set_userdata($member_ses);

				if ($this->session->userdata('level') == 10) {
					redirect('/admin');
				}
				if ($this->session->userdata('level') == 9) {
					redirect('/admin');
				}

				alert("otp 등록되었습니다",'https://wallet.conun.io/');



	 


			}else{
				alert("otp 코드가 틀립니다.");
				$member_id = $this->session->userdata("member_id");
				$data['otp'] = $this->otp->ci_generator($member_id, 'LiumWallet');
				layout('admin/otp', $data, 'app_main');
			}

		}


	}
	//로그인

	function otpLogin(){
		$data = array();
		$data['header'] = array('title'=>'Login','group'=>'signup-page');
		$data['conf'] = get_site();
		$this->load->library("otp");

		$this->form_validation->set_rules('otp_password', 'otp', 'required');
		$this->form_validation->set_rules('secretKey', 'secretKey', 'required');

		if ($this->form_validation->run() == FALSE) {


			$data['secretKey'] =  $this->session->userdata('member_otp');
			layout('admin/otplogin', $data, 'app_main');
		}else{

			$secretKey =$this->input->post("secretKey");
			$otp_password =$this->input->post("otp_password");
			$member_level = $this->session->userdata("member_level");
			if( $this->otp->ci_verify($secretKey,$otp_password)){


				$member_ses= array(
					'otp_login'  => true,
				);
				$this->session->set_userdata($member_ses);


				if ($this->session->userdata('level') == 10) {
					redirect('/admin');
				}
				if ($this->session->userdata('level') == 9) {
					redirect('/admin');
				}
				redirect('/');

			}else{
				alert("otp 코드가 틀립니다.");

			}

		}


	}
    

	function index()
	{
		
		$data = array();
		$data['header'] = array('title'=>'Login','group'=>'signup-page');
		$data['conf'] = get_site();
		$this->load->language('alert');
		// 이미 로그인 햇다면
		if ($this->session->userdata('is_login') == TRUE) {
			redirect('/coin');
		}
		
		// 기존 머물렀던 url 존재 한다면
		$is_url = urldecode($this->uri->segment(3));
		$is_url = str_replace('.2F', '/', urlencode($is_url));

		// 폼검증
		$this->form_validation->set_rules('member_id', '아이디', 'required');
		$this->form_validation->set_rules('password', '암호', 'required');

		if ($this->form_validation->run() == FALSE)
		{

		 
				layout('/conun/login.html',$data,'conun');
		 

			




		} else {

			$member = $this->m_member->get_member(strtolower($this->input->post('member_id')));



			if (!$member || aes_encrypt($this-> input->post('password')) != $member->password) {

				alert('아이디가 틀리거나 비밀번호가 틀립니다');

			} else {
				

				//세션 굽기
				$member_ses= array(
					'member_id'  => $member->member_id,
					'level'  => $member->level,
					'member_crypt'  => $member->member_crypt,
					'member_otp'  => $member->member_otp,
					'is_login' => TRUE,
				);
				$this->session->set_userdata($member_ses);

				// 최근 접속일
				$this->db->where('member_id', $this->session->userdata('member_id'));
				$this->db->set('last_login', 'now()', FALSE);
				$this->db->update('m_member');



				redirect('/app/coin');

			}

		}

	}



	// 로그아웃
	function out()
	{
		delete_cookie('autologin');
		$this->session->sess_destroy();

		redirect('/conun');

	}

}
?>
