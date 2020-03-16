<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bbs extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','admin','search'));
		$this->load->library('form_validation');

		admin_chk();
				
		define('SKIN_DIR', '/views/admin');

		//model load
		$this->load->model('m_cfg');
		$this -> load -> model('m_admin');
		$this -> load -> model('m_memo');

	}

	function index()
	{
		
	}
	
	// write
	function add()
	{

		$data = array();
		$data['title'] = "게시판 수정";
		$data['group'] = "게시판관리";

		$data['member_id']   = $this->session->userdata('member_id');
		
		
		$this->form_validation->set_rules('subject', 'subject', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('admin/bbsAdd',$data);

		} else {
			
			$member_id = $this->input->post('member_id');
			
			$reg = $this->m_memo->bbs_in($member_id);
			
			alert("등록 완료 되었습니다","admin/bbs/add");			

		}
	}
	
	//view
	function view()
	{

		$data = array();
		$data['title'] = "게시판 보기";
		$data['group'] = "게시판관리";

		$idx   = $this->uri->segment(4,0);

		$data['item'] = $this->m_memo->get_bbs('m_notice',$idx);
		
		$this->load->view('admin/noticeWrite',$data);
	}
	
	function memoLists()
	{
		$data = array();
		$data['title'] = "환경설정";
		$data['group'] = "대시보드";
	
		$data = page_lists_mssql('m_memo','memo_no',$data);
		layout('memoLists',$data,'admin');
		
	}
	
	function mdelete()
	{
		$memo_no = $this->input->post('idx');
		
		$this->db->where('memo_no', $memo_no);
		$this->db->delete('m_memo');
		
		goto_url($_SERVER['HTTP_REFERER']);	

	}
	
	// 공지사항
	function noticeWrite()
	{
		$data = array();
		$data['title'] = "환경설정";
		$data['group'] = "대시보드";

		$idx   = $this->uri->segment(4,0);
		$data['item'] = $this->m_memo->get_bbs('m_notice',$idx); //멤버 정보 가져오기
		
		
		$this->form_validation->set_rules('subject', 'subject', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('admin/noticeWrite',$data);

		} else {
			
			$idx = $this->input->post('bbs_no');
			
			$reg = $this->m_memo->bbs_up('m_notice',$idx);
			
			alert("수정이 완료되었습니다", "admin/bbs/noticeWrite/".$idx ."");			

		}
		
	}
	
	function noticeLists()
	{
		$data = array();
		$data['title'] = "환경설정";
		$data['group'] = "대시보드";
	
		$data = page_lists_mssql('m_notice','bbs_no',$data);
		layout('noticeLists',$data,'admin');
		
	}
	
	function noticedelete()
	{
		$bbs_no = $this->input->post('idx');
		
		$this->db->where('bbs_no', $bbs_no);
		$this->db->delete('m_notice');
		
		goto_url($_SERVER['HTTP_REFERER']);	

	}
	
}