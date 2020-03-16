<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lists extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('file','form', 'url'));
		define('SKIN_DIR', '/views/web/app');		

		//모델 로드
		$this->load->model('m_cfg');
		$this -> load -> model('m_member');
		$this -> load -> model('m_coin');

		loginCheck();

	}

	public function index(){

		$this->lists();
	}


	function lists_ajax(){

		$this->lang->load('history');
		$this->load->language('alert');
		$data = $member = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'HISTORY');
		$data['conf'] = get_site();
		$cfg 			= get_cfg(); // 환경설정부분
		$data['cfg'] 	= $cfg; // 환경설정부분
		$data['price']  = $cfg->coin1_unit; // 빗썸에서 가져온 이클시세
		$data['unit']	= $cfg->coin1_volume; // 토큰 가격


		$param_list = array();
		$param_bal['APT_TYPE'] = 'COINLIST';
		$coin_list = $this->m_member->getApiData($param_bal);
		$bal_list=array();
		$coin_list = json_decode(trim($coin_list), true);


		$i=0;
		foreach($coin_list['coin_list'] as $item){
			$param_bal = array();
			$param_bal['APT_TYPE'] = 'W_GETBAL';
			$param_bal['MEMBER_ID'] = $this->session->userdata('member_id');
			$param_bal['COIN'] = $item['COIN_SHORT'];
			$bal = $this->m_member->getApiData($param_bal);
			$bal = json_decode(trim($bal), true);
			$bal_list[$i]['COIN'] =$param_bal['COIN'];
			$bal_list[$i]['BALANCE'] =$bal['BALANCE'];
			$bal_list[$i]['COIN_NAME'] =$item['COIN_NAME'];
			$bal_list[$i]['WALLET'] =$bal['WALLET'];
			$bal_list[$i]['CODE'] =$bal['CODE'];
			$i++;
		}




		// 회원정보
		$mb = $this->m_member->get_member($this->session->userdata('member_id'));


		/*-- 토큰정보 --------------------------------------------------------------------------------------*/

		/*-- 코인정보 --------------------------------------------------------------------------------------*/



		// 코인전송내역
		$param = array();

		$param['APT_TYPE'] = 'W_TRANLIST_ALL';
		$param['MEMBER_ID'] = $this->session->userdata('member_id');
		$param['COIN'] = $this->input->get_post("COIN");
		$param['DATE'] = $this->input->get_post("DATE");

		$tran_str = $this->m_member->getApiData($param);



		$tran_list = json_decode($tran_str, true);



		if(empty($tran_list["TRANLIST"]) != "1")
			$data['item'] = $tran_list["TRANLIST"];
		else
			$data['item'] = array();
		$data['bal_list'] = $bal_list;
		$data['filter'] = $this->input->get_post("filter");
		// 이클 토큰 변환 내역
		//$data['item'] = $this->m_coin->get_coin_his($mb->coin_id,'token');

		layout('/conun/history_ajax.html',$data,'app');









	}
	function lists()
	{
		$this->lang->load('history');
		$this->load->language('alert');
		$data = $member = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'HISTORY');
		$data['conf'] = get_site(); 
		$cfg 			= get_cfg(); // 환경설정부분
		$data['cfg'] 	= $cfg; // 환경설정부분
		$data['price']  = $cfg->coin1_unit; // 빗썸에서 가져온 이클시세
		$data['unit']	= $cfg->coin1_volume; // 토큰 가격
		$param_list = array();
		$param_bal['APT_TYPE'] = 'COINLIST';
		$coin_list = $this->m_member->getApiData($param_bal);
		$bal_list=array();
		$coin_list = json_decode(trim($coin_list), true);

		$data['body_class'] = "fill";
		$i=0;
		foreach($coin_list['coin_list'] as $item){
			$param_bal = array();
			$param_bal['APT_TYPE'] = 'W_GETBAL';
			$param_bal['MEMBER_ID'] = $this->session->userdata('member_id');
			$param_bal['COIN'] = $item['COIN_SHORT'];
			$bal = $this->m_member->getApiData($param_bal);
			$bal = json_decode(trim($bal), true);
			$bal_list[$i]['COIN'] =$param_bal['COIN'];
			$bal_list[$i]['BALANCE'] =$bal['BALANCE'];
			$bal_list[$i]['COIN_NAME'] =$item['COIN_NAME'];
			$bal_list[$i]['WALLET'] =$bal['WALLET'];
			$bal_list[$i]['CODE'] =$bal['CODE'];
			$i++;
 		}




		// 회원정보
		$mb = $this->m_member->get_member($this->session->userdata('member_id'));

		
		/*-- 토큰정보 --------------------------------------------------------------------------------------*/
		
		/*-- 코인정보 --------------------------------------------------------------------------------------*/


		
		// 코인전송내역
		$param = array();

		$param['APT_TYPE'] = 'W_TRANLIST_ALL';
		$param['MEMBER_ID'] = $this->session->userdata('member_id');
		$tran_str = $this->m_member->getApiData($param);



		$tran_list = json_decode($tran_str, true);


		
		if(empty($tran_list["TRANLIST"]) != "1")
			$data['item'] = $tran_list["TRANLIST"];
		else
			$data['item'] = array();
		$data['bal_list'] = $bal_list;
		// 이클 토큰 변환 내역
		//$data['item'] = $this->m_coin->get_coin_his($mb->coin_id,'token');
		
		layout('/conun/history.html',$data,'app');

	
	}
	

}
?>
