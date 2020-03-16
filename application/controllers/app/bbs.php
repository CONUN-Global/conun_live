<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bbs extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this -> load -> model('m_member');
		$this->load->helper(array('file','form', 'url'));
		// 라이브러리
		$this->load->library('form_validation');
		define('SKIN_DIR', '/views/web/app');		

		//모델 로드
		$this -> load -> model('m_bbs');

		loginCheck();

	}

	public function index(){
		$this->write();
	}

	function write()
	{
		$data = $member = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'QnA');
		$data['conf'] = get_site(); 		
		
		// 회원정보		
		$data['level'] = $this->session->userdata('level');
		$data['email'] = $this->session->userdata('member_id');
			
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('contents', 'contents', 'required');
			
		if ($this->form_validation->run() == FALSE)
		{			
			layout('/app/bbs_write',$data,'app');

		} else {
			// 개인정보 수정
			$this->m_bbs->notice_in($this->session->userdata('member_id'));
			
			$lang = get_cookie('lang');
			if ($lang == "us") {
				alert("'The post has been registered.", "app/bbs/lists");
			}else if ($lang == "jp") {
				alert("'The post has been registered.", "app/bbs/lists");
			}else if ($lang == "cn") {
				alert("'The post has been registered.", "app/bbs/lists");
			}else if ($lang == "kr"  or $lang == "") {
				alert("글이 등록되었습니다.", "app/bbs/lists");
			}	
		}
		
	}
	
	
	public function lists()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'QnA');
		$data['conf'] = get_site(); 
		
		//리스트
		$data['level'] = $this->session->userdata('level');
		$data['item'] = $this->m_bbs->get_notice_li($this->session->userdata('member_id'));
		
		layout('/app/bbs_list',$data,'app');

	}
	
	public function views()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'QnA');
		$data['conf'] = get_site(); 
		
		$idx   = $this->uri->segment(4,0);
		
		//리스트
		$data['item'] = $this->m_bbs->get_notice_view($idx);

		layout('/app/bbs_view',$data,'app');

	}

}
?>
