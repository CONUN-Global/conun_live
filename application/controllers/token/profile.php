<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('file','form', 'url','office','search'));
		$this->load->library('bitcoin');
		
		// 라이브러리
		$this->load->library('form_validation');

		//모델 로드
		$this -> load -> model('m_member');
		$this -> load -> model('m_coin');

	}

	public function index(){
		$this->profile();
	}

	function profile()
	{
		$data = $member = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'PROFILE');
		$data['conf'] = get_site(); 

		// 회원정보
		$member = $this->m_member->get_member($this->session->userdata('member_id'));
			$data['member_id'] = $member->member_id;
			$data['coin_id'] = $member->coin_id;
			$data['name'] = $member->name;
			$data['mobile'] = $member->mobile;
			$data['regdate'] = $member->regdate; // 가입일
		
		$tok = $this->m_coin->get_wallet($member->coin_id,'token');
			$data['t_wallet'] = $tok->wallet;
		
		$str = $this->m_coin->get_wallet($member->coin_id,'etc');
		if($str){
			$data['wallet'] = $str->wallet;			
		}
		else{
			$data['wallet'] = "";
		}
		
		$data['coin'] = $this->m_coin->get_coin_name_total($member->coin_id,'token');
		
		$this->form_validation->set_rules('mobile', 'mobile', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{			
			layout('profile',$data,'token');

		} else {
			
			// 개인정보 수정
			$this->m_member->member_up($this->session->userdata('member_id'));

			if ($lang == "us" or $lang == "") {
				alert("Your edit is complete", "token/profile");
			}
			else if ($lang == "jp") {
				alert("修正が完了しました", "token/profile");
			}			
			else if ($lang == "kr") {
				alert("수정이 완료되었습니다", "token/profile");
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
		$data['coin'] = $this->m_coin->get_coin_name_total($member->coin_id,'token');
		
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('new_password', 'new_password', 'required');
		$this->form_validation->set_rules('new_password_confirm', 'new_password_confirm', 'required');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			layout('password',$data,'token');

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
			
			if ($lang == "us" or $lang == "") {
				alert("Your edit is complete", "token/profile");
			}
			else if ($lang == "jp") {
				alert("修正が完了しました", "token/profile");
			}			
			else if ($lang == "kr") {
				alert("수정이 완료되었습니다", "token/profile");
			}
			//alert("비밀번호 수정이 완료되었습니다", "token/profile");	
			//$this->profile();
			//layout('/password',$data,'office');
		}

	}

}
?>
