<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Send extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('file','form', 'url','office','search'));
	
		// 라이브러리
		$this->load->library('form_validation');
		$this->load->library('bitcoin');

		//모델 로드
		$this -> load -> model('m_member');
		$this -> load -> model('m_coin');

		loginCheck();
	}
	
	
	
	public function index()
	{
		$this->send();
	}
	
	// 코인보내기
	public function send()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'TRANSFER');
		$data['conf'] 	= get_site();

		
		// 회원정보에서 나의 지갑 주소를 얻음
		$mb = $this->m_member->get_member($this->session->userdata('member_id'));
			$data['coin_id'] = $mb->coin_id; // 초기아이디
				
		$str = $this->m_coin->get_wallet($mb->coin_id,'token');
		if($str){
			$data['wallet'] = $str->wallet; // wallet
			$data['date'] = $str->regdate;			
		}
		else{
			$data['wallet'] = "<a href='/token/address/make'>주소생성하기</a>"; // starcoin wallet
			$data['date'] = "";	
		}
			
		// 코인 잔액
		//$data['coin'] = $this->bitcoin->getbal($mb->coin_id);	
		$bal = $this->m_coin->get_coin_last($mb->coin_id,'token');
		//예외처리
		if($mb->coin_id == 'master'){
			$bal = 30000000000 - $bal;
		}
		$data['coin'] = $bal;
		/*-----------------------------------------------------------------------------
			---------------------------------------------------------------------------*/
		$count = $this->input->post('count');
		
		$this->form_validation->set_rules('send_id', 'send_id', 'required'); // 코인주소
		$this->form_validation->set_rules('count', 'count', 'required');		
		
		if ($this->form_validation->run() == FALSE)
		{
			layout('send',$data,'token');

		} else {
			
			$lang = get_cookie('lang');
			
			//예외 처리
			if ($bal <= 0) {
				if ($lang == "us" or $lang == "") {
					alert("Please check your coin balance." .$bal);
				}
				else if ($lang == "jp") {
					alert("コインの残高を確認してください");
				}			
				else if ($lang == "kr") {
					alert("코인 잔액을 확인해주세요");
				}
			}
			else if ($count <= 0.01) {
				if ($lang == "us" or $lang == "") {
					alert("Please check your coin quantity");
				}
				else if ($lang == "jp") {
					alert("お送りコイン数量を確認してください");
				}			
				else if ($lang == "kr") {
					alert("보내실 코인수량을 확인해주세요");
				}
			}
			
			if ($bal < $count) {
				if ($lang == "us" or $lang == "") {
					alert("Your coin balance is low. Check balance including commission");
				}
				else if ($lang == "jp") {
					alert("コイン残高が不足しています。手数料を含む残高チェック");
				}			
				else if ($lang == "kr") {
					alert("코인 잔액이 부족합니다. 수수료포함 잔액체크");
				}
			}
			
			
			// 받는사람 지갑주소 맞는지 검증하기
			//$rev = $this->bitcoin->validateaddress($this->input->post('send_id'));
			//$isvalid = $rev;
			$rev = $this->m_coin->get_wallet_addr($this->input->post('send_id'),'token'); // 주소로 정보찾기
				
			if($rev == false){
				if ($lang == "us") {
					alert("Please check the address of the recipient.");
				}
				else if ($lang == "jp") {
					alert("受ける方のアドレスを確認してください");
				}			
				else if ($lang == "kr" or $lang == "") {
					alert("받으시는 분의 주소를 확인해주세요");
				}
			}

			$order_code = order_code();  // 주문코드 만들기
			
			$co = $this->m_coin->get_wallet_addr($this->input->post('send_id'),'token'); // 주소로 받는사람 정보가져오기
			
				
			// 이제 전송
			//$send = $this->bitcoin->sendfrom($mb->coin_id,$this->input->post('send_id'),$this->input->post('count'));


			// 외부지갑으로 보낼경우 대비
			if($co){
				$this->m_coin->coin_in($order_code,$this->input->post('send_id'),$mb->coin_id,$str->wallet,$rev->member_id,'0',$this->input->post('count'),'0.01','token');				
			}
			else{
				$this->m_coin->coin_in($order_code,'out',$this->input->post('send_id'),$mb->coin_id,$str->wallet,'0',$this->input->post('count'),'0.01','token');				
			}

			
			redirect('/token/lists');
			//layout('send_ok',$data,'coin');
		}


	}


	// 보낸 결과값 보여주기
	public function sendok()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'SEND');
		$data['conf'] = get_site(); 
			
		layout('send_ok',$data,'token');

	}
	
		
}