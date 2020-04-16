<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userqna extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('file','form', 'url'));
		// 라이브러리
		$this->load->library('form_validation');
		define('SKIN_DIR', '/views/web/app');
		$this -> load -> model('m_coin');
		$this -> load -> model('m_member');
		//모델 로드
		$this -> load -> model('m_bbs');

		loginCheck();

	}

	public function index(){
		$this->userq();
	}

	function userq()
	{
		$data = $member = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'QnA');
		$data['conf'] = get_site();

		// 회원정보		
		$data['email'] = $this->session->userdata('member_id');
			
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('memo', 'memo', 'required');
			
		if ($this->form_validation->run() == FALSE)
		{			
			layout('/app/qna_write',$data,'app');

		} else {
			// 개인정보 수정
			$this->m_bbs->memo_in($this->session->userdata('member_id'));
			
			$lang = get_cookie('lang');
			if ($lang == "us") {
				alert("'The post has been registered.", "app/userqna/lists");
			}else if ($lang == "jp") {
				alert("'The post has been registered.", "app/userqna/lists");
			}else if ($lang == "cn") {
				alert("'The post has been registered.", "app/userqna/lists");
			}else if ($lang == "kr" or   $lang == "") {
				alert("문의 글이 등록되었습니다.", "app/userqna/lists");
			}	
		}
		
	}
	
	function modify()
	{
		$data = $member = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'QnA');
		$data['conf'] = get_site(); 		
		
		$idx   = $this->uri->segment(4,0);
		$data['item'] = $this->m_bbs->get_memo_view($idx);
			
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('memo', 'memo', 'required');
			
		if ($this->form_validation->run() == FALSE)
		{			
			layout('/app/qna_edit',$data,'app');

		} else {
			// 수정
			$this->m_bbs->memo_up($idx);
			
			$lang = get_cookie('lang');
			if ($lang == "us" ) {
				alert("'Your post has been edited.", "app/userqna/lists");
			}else if ($lang == "jp") {
				alert("'Your post has been edited.", "app/userqna/lists");
			}else if ($lang == "cn") {
				alert("'Your post has been edited.", "app/userqna/lists");
			}else if ($lang == "kr" or $lang == "") {
				alert("문의 글이 수정되었습니다.", "app/userqna/lists");
			}	
		}
		
	}
	
	public function lists()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'QnA');
		$data['conf'] = get_site(); 
		
		//리스트 - 각각의 답변 달린 숫자 표시함
		$data['item'] = $this->m_bbs->get_memo_li($this->session->userdata('member_id'));
		foreach ($data['item'] as $row) {
			$row->cnt = $this->m_bbs->memo_ans_cnt($row->memo_no);		
		}

		layout('/app/qna_list',$data,'app');

	}
	
	public function views()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'QnA');
		$data['conf'] = get_site(); 
		
		$idx   = $this->uri->segment(4,0);
		
		//리스트
		$data['item'] = $this->m_bbs->get_memo_view($idx);
		
		// 답변이 있는지 체크 같이 보여준다.
		$data['ans'] = array();//$this->m_bbs->get_memo_ans($idx);

		layout('/app/qna_view',$data,'app');

	}

}
?>
