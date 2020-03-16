<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Etcaddress extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('file');

		$this->load->library('qrcode');
		$this->load->library('bitcoin');

		//모델 로드
		$this -> load -> model('m_member');
		$this -> load -> model('m_coin');

		loginCheck();
	}
	
	public function index()
	{
		require '/home/mircoinnet/www/application/libraries/ethereum.php';
		$eth = new Ethereum('211.238.13.157', 8545);

		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'ETC');
		$data['conf'] = get_site(); 


		// 회원정보에서 나의 지갑 주소를 얻음
		$mb = $this->m_member->get_member($this->session->userdata('member_id'));
		$data['coin_id'] = $mb->coin_id;
			
			
		$str = $this->m_coin->get_ico($mb->coin_id);
		if($str){
			$data['wallet'] = $str->wallet; // wallet
			$data['date'] = $str->regdate;
			$coin_img = "http://mircoin.net/data/member/" .$str->qrcode;	
			$data['coin_img'] = $coin_img;			
			$data['balance'] = base_convert($eth->eth_getBalance($str->wallet), 16, 10)*0.000000000000000001;
		}
		else{
			$data['wallet'] = "<a href='/token/etcaddress/make'>ETC 주소생성하기</a>"; // wallet
			$data['date'] = "";	
			$data['coin_img'] = "/assets/img/gallery-1.jpg";
		}

		// token
		//$data['token'] = $this->m_coin->get_coin_last($mb->coin_id,'token'); // token 잔고
		//$data['coin'] = $this->m_coin->get_ico_coin_last($mb->coin_id); // 토큰신청 시 보낸 비트 또는 이더

		// 코인 잔액
		//$data['coin'] = $this->bitcoin->getbal($mb->coin_id);
		$data['coin'] = $this->m_coin->get_coin_name_total($mb->coin_id,'token');

		
		layout('etc_address',$data,'token');
	}
	
	// 작동 지금 안함 나중에
	public function make()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'ADDRESS');
		$data['conf'] = get_site(); 
		
		$mb = $this->m_member->get_member($this->session->userdata('member_id'));
			$coin_id = $mb->coin_id;
		
		// 비트코인 지갑주소 생성
		//$addr = $this->bitcoin->getnewaddress(strtolower($coin_id));
			
		//통신 안될경우 중단
		if(!$addr) {
			alert($coin_id ."Error : 123008 Code");
		}
		
		qrcode($coin_id,$addr);
		$qrimg = $coin_id; // ico qrcode
			
		// 회원 정보 기록
		$type = "token";
		$this->m_member->member_wallet($coin_id,$addr,$qrimg,$type);
		
		alert("Create Mircoin Address", "token/address");
	}
		
}