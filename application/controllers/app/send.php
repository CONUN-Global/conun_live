<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Send extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('file','form', 'url','office','search'));
	
		// 라이브러리
		$this->load->library('form_validation');
		$this->load->library('bitcoin');
		define('SKIN_DIR', '/views/web/app');


		//모델 로드
		$this -> load -> model('m_member');
		$this -> load -> model('m_coin');

		loginCheck();
	}
	
	
	
	public function index()
	{



        $coin=$this->input->get("coin_index");

        if($coin==""){
            alert("코인정보가  없습니다.", "app/coin");
        }

		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'Coin TRANSFER');
		$conf = get_site(); 
		$data['conf'] 	= $conf;
		$data['coin'] = $this->input->get("coin");
        $wallet_is =false;
        $param_list = array();
        $param_bal['APT_TYPE'] = 'W_GETADDR';
        $param_bal['MEMBER_ID'] = $this->session->userdata('member_id');
        $bal_list = $this->m_member->getApiData($param_bal);
        $bal_list = json_decode(trim($bal_list), true);


        $data['coin_index'] =$coin;
        $data['qr_address'] =$this->input->get("qr_address");
        $param_['APT_TYPE'] = 'W_GASFEE';
        $FEE = $this->m_member->getApiData($param_);
        $FEE = json_decode(trim($FEE), true);

        $data['FEE'] = $FEE['FEE'];
        $data['bal_list'] = $bal_list['coin_list'];
        if($wallet_is )
		{

			$param_bal = array();
			$data['coin_view'] = 'display:block';

		}
     
		layout('/app/send',$data,'app');
	}
	
	// 코인보내기
	public function send_ok()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'COIN TRANSFER');
		$conf = get_site(); 
		$data['conf'] 	= $conf;
		
		$bal = (float)$this->input->post('bal');
		$coin_cnt = (float)$this->input->post('real_bal');
        $coin = $this->input->post('coin');

        $member = $this->m_member->get_member($this->session->userdata('member_id'));
        // Master 주소에서 해당 발급 주소로 코인전송되도록 변경해야함.


        if (!$member || $this->input->post('wallet_password') != $member->wallet_password) {
            alert("Password Check!!.");
        }

		// Master 주소에서 해당 발급 주소로 코인전송되도록 변경해야함.

		if($this->input->post('send_id') == "")
		{
			$lang = get_cookie('lang');
			if ($lang == "us" ) {
				alert("There is no recipient’s address","app/send?coin_index=".$coin);
			}
			else if ($lang == "cn") {
				alert("没有基础的地址", "app/send?coin_index=".$coin);
			}
			else if ($lang == "kr" or $lang == "") {
				alert("보낼 주소가 없습니다", "app/send?coin_index=".$coin);
			}
			else if ($lang == "jp") {
				alert("送るアドレスがありません。", "app/send?coin_index=".$coin);
			}
		}

		if($bal < $coin_cnt)
		{
			$lang = get_cookie('lang');
			if ($lang == "us" ) {
				alert("Coin you will send is more than coin you hold", "app/send");
			}
			else if ($lang == "cn") {
				alert("比持有货币寄出的数量更多", "app/send?coin_index=".$coin);
			}
			else if ($lang == "kr" or $lang == "") {
				alert("보유코인보다 보낼수량이 많습니다", "app/send?coin_index=".$coin);
			}
			else if ($lang == "jp") {
				alert("保有コインより送信量が多いです。", "app/send?coin_index=".$coin);
			}
		}

		$mb = $this->m_member->get_member($this->session->userdata('member_id'));
			
		try
		{
			$param_tran = array();

			$param_tran['APT_TYPE'] = 'W_TRANS';
			$param_tran['FROM_ADDR'] = $mb->coin_id;
			$param_tran['TO_ADDR'] = $this->input->post('send_id');
			$param_tran['AMOUNT'] = $coin_cnt;
            $param_tran['COIN'] = $coin;


          

			$curl_tran = $this->m_member->getApiData($param_tran);

			$tran = json_decode(trim($curl_tran), true);


 


			if ($tran['CODE'] == "0000")
			{
			 	alert($tran['MSG'], "app/send?coin_index=".$coin);
			}
			else
			{
				 alert($tran['MSG'], "app/send?coin_index=".$coin);
			}

		}
		catch(exception $ex)
		{
			alert($ex->getMessage(), "app/send?coin_index=".$coin);
		}
	}
		
}