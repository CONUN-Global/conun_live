<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Qr extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','admin','search'));
		$this->load->library('form_validation');

		partner_chk();
				
		define('SKIN_DIR', '/views/partner');

		//model load
		$this->load->model('m_cfg');
		$this -> load -> model('m_admin');
		$this -> load -> model('m_memo');
        $this -> load -> model('m_qr');
	}

	function index()
	{
		
	}
	
	// write
	function add()
	{
 
		$data = array();
		$data['title'] = "QR 등록";
		$data['group'] = "QR 등록";

		$data['member_id']   = $this->session->userdata('member_id');
		
		
		$this->form_validation->set_rules('qr_amount', 'qr_amount', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('partner/qrWrite',$data);

		} else {
			
			$member_id = $this->input->post('member_id');
			
			$reg = $this->m_qr->qr_in($member_id);
			
			alert("등록 완료 되었습니다","partner/qr/add");

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




		
		$this->load->view('partner/qrWrite',$data);
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
	function qrWrite()
	{
		$data = array();
		$data['title'] = "환경설정";
		$data['group'] = "대시보드";

		$idx   = $this->uri->segment(4,0);
		$data['item'] = $this->m_qr->get_bbs('m_qr',$idx); //멤버 정보 가져오기





        $content = $data['item']->qr_member."^|^".$data['item']->qr_type."^|^".$data['item']->qr_amount;
        $filename = "/home/wallet/data/qr/".$data['item']->qr_no."_big.png";
        $width = $height = 250;
        if (!file_exists($filename))
        {
            $url = urlencode($content);
            $qr  = file_get_contents("http://chart.googleapis.com/chart?chs={$width}x{$height}&cht=qr&chl=$url");
            $img = imagecreatefromstring($qr);
            imagegif($img, $filename);
            imagedestroy($img);
        }

        $filename = "/home/wallet/data/qr/".$data['item']->qr_no."_middle.png";
        $width = $height = 125;
        if (!file_exists($filename))
        {
            $url = urlencode($content);
            $qr  = file_get_contents("http://chart.googleapis.com/chart?chs={$width}x{$height}&cht=qr&chl=$url");
            $img = imagecreatefromstring($qr);
            imagegif($img, $filename);
            imagedestroy($img);
        }




        $filename = "/home/wallet/data/qr/".$data['item']->qr_no."_small.png";
        $width = $height = 125;
        if (!file_exists($filename))
        {
            $url = urlencode($content);
            $qr  = file_get_contents("http://chart.googleapis.com/chart?chs={$width}x{$height}&cht=qr&chl=$url");
            $img = imagecreatefromstring($qr);
            imagegif($img, $filename);
            imagedestroy($img);
        }

        $this->form_validation->set_rules('qr_amount', 'qr_amount', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('partner/qrWrite',$data);

		} else {
			
			$idx = $this->input->post('qr_no');
			
			$reg = $this->m_qr->qr_up('m_qr',$idx);
            
          
			
	    	alert("수정이 완료되었습니다", "partner/qr/qrWrite/".$idx ."");

		}
		
	}
	
	function qrLists()
	{
		$data = array();
		$data['title'] = "QR관리";
		$data['group'] = "QR관리";

		$qr_member = $this->session->userdata('member_id');
	
		$data = page_lists_mssql('m_qr','qr_no',$data,'qr_member',$qr_member);
		layout('qrLists',$data,'partner');
		
	}
	
	function qrdelete()
	{
		$qr_no = $this->input->post('idx');
		
		$this->db->where('qr_no', $qr_no);
		$this->db->delete('m_qr');
		
		goto_url($_SERVER['HTTP_REFERER']);	

	}
	
}