<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ico extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->load->library('bitcoin');

		//모델 로드
		$this->load->model('m_cfg');
		$this -> load -> model('m_member');
		$this -> load -> model('m_coin');

		loginCheck();
	}
	
	public function index()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'ICO');
		$data['conf'] = get_site(); 

		require '/home/mircoinnet/www/application/libraries/ethereum.php';
		$eth = new Ethereum('211.238.13.157', 8545);

		// 회원정보에서 나의 지갑 주소를 얻음
		$mb = $this->m_member->get_member($this->session->userdata('member_id'));
			$data['coin_id'] = $mb->coin_id;
			
		//etc address
		$str = $this->m_coin->get_ico($mb->coin_id);
		if($str){
			$data['etc_wallet'] = $str->wallet; // wallet
			$data['etc_date'] = $str->regdate;
			$coin_img = "http://mircoin.net/data/member/" .$str->qrcode;	
			$data['etc_img'] = $coin_img;			
			$data['balance'] = base_convert($eth->eth_getBalance($str->wallet), 16, 10)*0.000000000000000001;
		}
		else{
			$data['etc_wallet'] = "<a href='/token/etcaddress/make'>ETC 주소생성하기</a>"; // wallet
			$data['etc_date'] = "";	
			$data['etc_img'] = "/assets/img/gallery-1.jpg";
			$data['balance'] = 0;
		}
		
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
		
		// token
		// 코인 잔액
		//$data['coin'] = $this->bitcoin->getbal($mb->coin_id);
		$data['coin'] = $this->m_coin->get_coin_name_total($mb->coin_id,'token');
		
		layout('ico',$data,'token');
	}
	
	// 이더리움을 토큰으로 치환하기
	public function change()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'ICO');
		$data['conf'] 	= get_site(); 
		$cfg 			= get_cfg(); // 환경설정부분
		$change_name	= $cfg->change_name; // 운영자의 이클주소
		$price			= $cfg->coin1_unit; // 빗썸에서 가져온 이클시세
		$unit			= $cfg->coin1_volume; // 토큰 가격
		
		$mb = $this->m_member->get_member($this->session->userdata('member_id'));
		$data['coin_id'] = $mb->coin_id;
			
		/*etc---------------------------------------------------------------------------*/
		require '/home/mircoinnet/www/application/libraries/ethereum.php';
		$eth = new Ethereum('211.238.13.157', 8545);
		
		$etc = $this->m_coin->get_ico($mb->coin_id);
		$etc_wallet = $etc->wallet; // wallet
		$balance = base_convert($eth->eth_getBalance($etc->wallet), 16, 10)*0.000000000000000001; // 이더잔고
		
		//test용
		//$balance = 0.0001;
		if($balance < 0.00009){			
			alert("보유하신 이더리움클래식 수량이 소수점4자리 이하입니다.");
		}
		
		/*token---------------------------------------------------------------------------*/
		$str = $this->m_coin->get_wallet($mb->coin_id,'token');
		$tok_wallet = $str->wallet; // wallet
		$token = $this->m_coin->get_coin_name_total($mb->coin_id,'token'); // 토큰잔고
		
		/*치환하기---------------------------------------------------------------------------*/
		// 이클수량 * 시세 = 현재 보유가격
		$etc_total = $price * $balance;
		
		// 보유가격 / 토큰의 가격 = 지급 토큰수량
		$cnt = $etc_total / $unit;
		
		// 토큰저장하기
		$order_code = order_code();  // 주문코드 만들기
		$this->m_coin->coin_in($order_code,$mb->coin_id,$tok_wallet,'etc',$change_name,$balance,$cnt,$price,'token');
		
		// 이클 외부출금하기
		//$eth->personal_unlockAccount($etc_wallet, $mb->coin_id);
		//$eth_tran = new Ethereum_Transaction($etc_wallet, $change_name, 35000, 10000000, "web3.toWei(".$balance.", 'ether')", ''); // $from, $to, $gas, $gasPrice, $value, $data='', $nonce=NULL)
		//$eth->eth_sendTransaction($eth_tran);
		//$eth->personal_lockAccount($etc_wallet, $mb->coin_id);

		
				
		// 메시지띄우기
		alert("보유하신 이더리움클래식을 토큰으로 변환하였습니다.");
		//echo "$etc_total = $price * $balance === $cnt";
	}
}









