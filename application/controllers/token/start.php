<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->load->library('bitcoin');

		//모델 로드
		$this -> load -> model('m_member');
		$this -> load -> model('m_coin');

		loginCheck();
	}
	
	public function index()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'ADDRESS');
		$data['conf'] = get_site(); 


		// 회원정보에서 나의 지갑 주소를 얻음
		$mb = $this->m_member->get_member($this->session->userdata('member_id'));
			$data['coin_id'] = $mb->coin_id;
			
		// 토큰주소
		$str = $this->m_coin->get_wallet($mb->coin_id,'token');
		if($str){
			$data['wallet'] = $str->wallet; // wallet
			$data['date'] = $str->regdate;				
			$coin_img = "http://mircoin.net/data/member/" .$str->qrcode;	
			$data['coin_img'] = $coin_img;			
		}
		else{
			$data['wallet'] = "<a href='/token/address/make'>주소생성하기</a>"; // wallet
			$data['date'] = "";	
			$data['coin_img'] = "/assets/img/gallery-1.jpg";
		}
		
		//etc address
		$str = $this->m_coin->get_wallet($mb->coin_id,'etc');
		if($str){
			$data['etc_wallet'] = $str->wallet; // wallet
			$data['etc_date'] = $str->regdate;				
			$coin_img = "http://mircoin.net/data/member/" .$str->qrcode;	
			$data['ect_img'] = $coin_img;			
		}
		else{
			$data['etc_wallet'] = "<a href='/token/address/make'>주소생성하기</a>"; // wallet
			$data['etc_date'] = "";	
			$data['etc_img'] = "/assets/img/gallery-1.jpg";
		}
		

		// token
		//$data['token'] = $this->m_coin->get_coin_last($mb->coin_id,'token'); // token 잔고
		//$data['coin'] = $this->m_coin->get_ico_coin_last($mb->coin_id); // 토큰신청 시 보낸 비트 또는 이더

		// 코인 잔액
		//$data['coin'] = $this->bitcoin->getbal($mb->coin_id);
		$data['coin'] = $this->m_coin->get_coin_name_total($mb->coin_id,'token');
		$data['etc'] = $this->m_coin->get_coin_name_total($mb->coin_id,'etc');


		// 코인 최근 거래 내역
		//$data['item'] = (array)$this->bitcoin->listtransactions($mb->coin_id);
		
		layout('address',$data,'token');
	}
		
}