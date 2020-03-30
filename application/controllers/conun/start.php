<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {
	
	public function __construct () 
	{
		parent::__construct();

		// 라이브러리
		$this->load->library('form_validation');
		define('SKIN_DIR', '/views/web/app');

		//모델 로드
		$this -> load -> model('m_member');

		
	}


	public function index()
	{

		$data = array();
		$data['header'] = array('title'=>'Login','group'=>'signup-page');
		$data['conf'] = get_site();
        $this->lang->load('login');
        $this->load->language('alert');
		// 이미 로그인 햇다면
		if ($this->session->userdata('is_login') == TRUE) {
			//if ($this->session->userdata('level') == 10)
			//	redirect('/admin');
			// open 시에 주석 제거
			//else
				redirect('/conun/coin');
		}
		
		// 기존 머물렀던 url 존재 한다면
		$is_url = urldecode($this->uri->segment(3));
		$is_url = str_replace('.2F', '/', urlencode($is_url));

		$data['saveid'] = get_cookie('saveid');
		$data['userid'] = get_cookie('userid');
		$data['autologin'] = get_cookie('autologin');

		//var_dump($this->session->userdata);
		//echo "<br>";
		//var_dump($this->session->userdata('is_login'));

		if(get_cookie('autologin') == "on")
		{
			$member = $this->m_member->get_member(strtolower(get_cookie('userid')));

            $member_ses= array(
                'member_id'  => $member->member_id,
                'level'  => $member->level,
                'member_crypt'  => $member->member_crypt,
                'member_otp'  => $member->member_otp,
                'coin_addr'  => $member->coin_addr,
                'is_login' => TRUE,
            );
			$this->session->set_userdata($member_ses);

			// 최근 접속일
			$this->db->where('member_id', $this->session->userdata('member_id'));
			$this->db->set('last_login', 'now()', FALSE);
			$this->db->update('m_member');

			redirect('/conun/coin');
		}

		// 폼검증
		$this->form_validation->set_rules('member_id', '아이디', 'required');
		$this->form_validation->set_rules('password', '암호', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			layout('/conun/login.html',$data,'conun');
		} else {

			$member = $this->m_member->get_member(strtolower($this->input->post('member_id')));

            if (!$member || aes_encrypt($this-> input->post('password')) != $member->password) {
				alert("ID or Password Check!!.");
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
				

				// 서버점검
				if ($this->session->userdata('level') == 10) {
					redirect('/admin');
				}
                if ($this->session->userdata('level') == 9) {
                    redirect('/admin');
                }
				//else {
				//	alert('서버점검 중입니다.');
				//	die;
				//}


				// 최근 접속일
				$this->db->where('member_id', $this->session->userdata('member_id'));
				$this->db->set('last_login', 'now()', FALSE);
				$this->db->update('m_member');

				if($this->input->post('saveID') != "")
				{
					set_cookie('userid', $this->input->post('member_id'), 356 * 24 * 60 * 60);
					set_cookie('saveid', $this->input->post('saveID'), 356 * 24 * 60 * 60);
				}
				else
				{
					delete_cookie('userid');
					delete_cookie('saveid');
				}

				if($this->input->post('autoLogin') != null)
				{
					set_cookie('userid', $this->input->post('member_id'), 356 * 24 * 60 * 60);
					set_cookie('autologin', $this->input->post('autoLogin'), 356 * 24 * 60 * 60);
				}
				redirect('/conun/coin');
			}
		}
	}
}