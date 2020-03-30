<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lists extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('file','form', 'url'));
	
		// 라이브러리
		$this->load->library('form_validation');


		//모델 로드
		$this -> load -> model('m_member');
		$this -> load -> model('m_coin');

		loginCheck();
	}
	
	
	
	public function index()
	{
		$this->lists();
	}
		
	
	// 코인 전송내역 트랜스퍼 기록
	public function lists()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'HISTORY');
		$data['conf'] = get_site(); 
		
		$mb = $this->m_member->get_member($this->session->userdata('member_id'));
			$data['coin_id'] = $mb->coin_id; // 초기아이디
				
		$str = $this->m_coin->get_wallet($mb->coin_id,'token');
		if($str){
			$data['wallet'] = $str->wallet; // token wallet
			$data['date'] = $str->regdate;			
		}
		else{
			$data['wallet'] = "<a href='/token/address/make'>주소생성하기</a>"; // starcoin wallet
			$data['date'] = "";	
		}
		
		$data['coin'] = $this->m_coin->get_coin_name_total($mb->coin_id,'token');
		
		//리스트
		//$data['item'] = (array)$this->bitcoin->listtransactions($mb->coin_id);
		$data['item'] = $this->m_coin->get_coin_li('token',$mb->coin_id);
		$data['coin_id'] = $mb->coin_id;
		
		//$i=0;
		//foreach ($data['item'] as $row) {
			//$blocks = (array)$this->bitcoin->getblock($row['blockhash']);
			//$data['item'][$i]['height']  = $blocks['height'];
			//echo $data['item'][0]['height'] ."<br>";
			//$i+=1;
		//}
	
		
		layout('lists',$data,'token');

	}
		
}