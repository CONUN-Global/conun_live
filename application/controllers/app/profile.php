<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('file','form', 'url'));
		// 라이브러리
		$this->load->library('form_validation');
		$this->load->library('bitcoin');
		define('SKIN_DIR', '/views/web/app');

		//모델 로드
		$this -> load -> model('m_member');

		loginCheck();

	}

	public function index(){
		$this->profile();
	}

	function profile()
	{
		$data = $member = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'PROFILE');
		$data['conf'] = get_site();


		//var_dump($this->session->userdata);
		//echo "<br>";
		//var_dump($this->session->userdata('is_login'));

		// 회원정보
		$member = $this->m_member->get_member($this->session->userdata('member_id'));
		$data['member_id'] = $member->member_id;
		$data['coin_id'] = $member->coin_id;
		$data['name'] = $member->name;
		$data['mobile'] = trim($member->mobile);
		$data['email'] = $member->email;
		$data['regdate'] = $member->regdate; // 가입일

		$this->form_validation->set_rules('mobile', 'mobile', 'required');

		// 코인 잔액
		//$data['bal'] = $this->bitcoin->getbal($member->coin_id);

		if ($this->form_validation->run() == FALSE)
		{

			layout('/app/profile',$data,'app');

		} else {
			// 개인정보 수정
			$this->m_member->member_up($this->session->userdata('member_id'));

			$lang = get_cookie('lang');
			if ($lang == "us" ) {
				alert("'Edit personal information ", "app/profile");
			}else if ($lang == "jp") {
				alert("'個人情報の変更完了！", "app/profile");
			}else if ($lang == "cn") {
				alert("'Edit personal information ", "app/profile");
			}else if ($lang == "kr" or $lang == "") {
				alert("개인정보 수정완료!", "app/profile");
			}
		}

	}


	function password()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'PROFILE');
		$data['conf'] = get_site();

		// 회원정보
		$member = $this->m_member->get_member($this->session->userdata('member_id'));

		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('new_password', 'new_password', 'required');
		$this->form_validation->set_rules('new_password_confirm', 'new_password_confirm', 'required');


		if ($this->form_validation->run() == FALSE)
		{
			layout('/app/password',$data,'app');

		} else {

			if (!$member || $this->input->post('password') != $member->password) {
				alert("Password Check!!.");
			}
			else{
				// 비밀번호 수정
				$this->db->where('member_id', $this->session->userdata('member_id'));
				$this->db->set('password', $this->input->post('new_password'), true);
				$this->db->update('m_member');
			}

			$lang = get_cookie('lang');
			if ($lang == "us" ) {
				alert("Your password edit is complete", "app/profile");
			}else if ($lang == "jp") {
				alert("Your password edit is complete", "app/profile");
			}else if ($lang == "cn") {
				alert("Your password edit is complete", "app/profile");
			}else if ($lang == "kr" or $lang == "") {
				alert("비밀번호 수정완료!", "app/profile");
			}
		}

	}



	function wallet_password()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'PROFILE');
		$data['conf'] = get_site();

		// 회원정보
		$member = $this->m_member->get_member($this->session->userdata('member_id'));

		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('new_password', 'new_password', 'required');
		$this->form_validation->set_rules('new_password_confirm', 'new_password_confirm', 'required');


		if ($this->form_validation->run() == FALSE)
		{
			layout('/app/wallet_password',$data,'app');

		} else {

			if (!$member || $this->input->post('password') != $member->wallet_password) {
				alert("Password Check!!.");
			}
			else{
				// 비밀번호 수정
				$this->db->where('member_id', $this->session->userdata('member_id'));
				$this->db->set('wallet_password', $this->input->post('new_password'), true);
				$this->db->update('m_member');
			}

			$lang = get_cookie('lang');
			if ($lang == "us" ) {
				alert("Your password edit is complete", "app/profile");
			}else if ($lang == "jp") {
				alert("Your password edit is complete", "app/profile");
			}else if ($lang == "cn") {
				alert("Your password edit is complete", "app/profile");
			}else if ($lang == "kr" or $lang == "") {
				alert("비밀번호 수정완료!", "app/profile");
			}
		}

	}

}
?>
