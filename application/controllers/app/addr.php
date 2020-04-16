<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addr extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->load->library('qrcode');
		$this->load->library('bitcoin');
		define('SKIN_DIR', '/views/web/app');

		//모델 로드
		$this -> load -> model('m_member');
		$this -> load -> model('m_coin');

		loginCheck();
	}
	
	public function index()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'MIRCOIN ADDRESS');
		$data['conf'] = get_site(); 

		// 회원정보에서 나의 지갑 주소를 얻음
		$mb = $this->m_member->get_member($this->session->userdata('member_id'));
			$data['coin_id'] = $mb->coin_id;

		$str = $this->m_coin->get_wallet($mb->coin_id,'coin');
		if($str){
			$data['wallet'] = $str->wallet; // wallet
			$data['date'] = $str->regdate;			
			$coin_img = "http://mircoin.net/data/member/" .$str->qrcode;	
			$data['coin_img'] = $coin_img;	

		}
		else{
			$data['wallet'] = "reset";//<a href='/coin/address/make'>주소 다시 생성(클릭)</a>"; // wallet
			$data['date'] = "";
			$data['coin_img'] = "/assets/img/gallery-1.jpg";
		}
		
		/*
		//절대경로로 찾음
		if(is_file($coin_img)==true){
			$data['addqr'] = ""; // wallet
		}else{
			$data['addqr'] = "<a href='/app/addr/qrcode'>큐알코드 다시 생성</a>"; // wallet
			$data['date'] = "";
			$data['coin_img'] = "/assets/img/gallery-1.jpg";
		}
		*/
		
		$data['bal'] = $this->bitcoin->getbal($mb->coin_id);
		
		//리스트
		//$data['item'] = $this->m_office->get_coin_his($this->session->userdata('member_id'));
		$data['item'] = (array)$this->bitcoin->listtransactions($mb->coin_id);
		
		layout('/app/addr',$data,'app');
	}

	
	public function qrcode()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'ADDRESS');
		$data['conf'] = get_site(); 
		
		// 회원정보
		$mb = $this->m_member->get_member($this->session->userdata('member_id'));
			$data['coin_id'] = $mb->coin_id;

		$str = $this->m_coin->get_wallet($mb->coin_id,'coin');			
		
		
		qrcode($mb->coin_id,$str->wallet);
		$qrimg = $mb->coin_id .".png"; // 스타코인 qrcode		
		
		$this->db->where('member_id', $mb->coin_id);
		$this->db->set('qrcode', $qrimg, true);
		$this->db->update('m_wallet');	
		
				
		redirect('/app/addr');

	}
	
	public function make()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'ADDRESS');
		$data['conf'] = get_site(); 
		
		$mb = $this->m_member->get_member($this->session->userdata('member_id'));
			$coin_id = $mb->coin_id;
		
		// 비트코인 지갑주소 생성
		$addr = $this->bitcoin->getnewaddress(strtolower($coin_id));
			
		//통신 안될경우 중단
		if(!$addr) {
			alert($coin_id ."Error : 123008 Code");
		}
		
		$qrimg = $coin_id .".png"; // ico qrcode
		qrcode($qrimg,$addr);
			
		// 회원 정보 기록
		$type = "coin";
		$this->m_member->member_wallet($coin_id,$addr,$qrimg,$type);
		
		$lang = get_cookie('lang');
		if ($lang == "us") {
			alert("Create A Mirtoken Address", "app/addr");
		}else if ($lang == "jp") {
			alert("Create A Mirtoken Address", "app/addr");
		}else if ($lang == "cn") {
			alert("Create A Mirtoken Address", "app/addr");
		}else if ($lang == "kr"  or $lang == "") {
			alert("미르토큰 주소를 생성했습니다.", "app/addr");
		}
	}

		
}