<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coin extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('bitcoin');
		$this->load->library('qrcode');
		define('SKIN_DIR', '/views/web/app');

		//모델 로드
		$this->load->model('m_cfg');
		$this -> load -> model('m_member');
		$this -> load -> model('m_coin');
		$this -> load -> model('m_bbs');


		loginCheck();
	}

	public function index()
	{
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        $this->lang->load('main');
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'CTCCOIN WALLET');
		$data['conf'] 	= get_site();

		$cfg 			= get_cfg(); // 환경설정부분
		$data['cfg'] 	= $cfg; // 환경설정부분

		$data['level'] = $this->session->userdata('level');
		$mb = $this->m_member->get_member($this->session->userdata('member_id'));
		$data['coin_id'] = $mb->coin_id;
		$data['name'] = $mb->name;
		$data['token_view'] = 'display:none';
		$data['coin_view'] = 'display:none';
		$data['wallet'] = '';
		$data['img'] = '';
		$data['bal'] = '';





        





        /*-- 코인정보 --------------------------------------------------------------------------------------*/

		//$wallet = $this->m_coin->get_wallet($this->session->userdata('member_id'), "CTC");


     /*   $param_list = array();
        $param_bal['APT_TYPE'] = 'W_GETADDR';
        $param_bal['MEMBER_ID'] = $this->session->userdata('member_id');
        $bal_list = $this->m_member->getApiData($param_bal);
        $bal_list = json_decode(trim($bal_list), true);
        $data['bal_list'] = $bal_list['coin_list'];

*/



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
            if($bal['CODE']=="0000"){
                $wallet_is =true;
            }
            $bal_list[$i]['COIN_NAME'] =$item['COIN_NAME'];
            $bal_list[$i]['WALLET'] =$bal['WALLET'];
            $bal_list[$i]['CODE'] =$bal['CODE'];
            $bal_list[$i]['FEE'] =$bal['FEE'];
            $i++;
        }


        $data['bal_list'] =$bal_list;






	 
/*
		// 코인전송내역
		$param = array();

		$param['APT_TYPE'] = 'W_TRANLIST';
		$param['MEMBER_ID'] = $this->session->userdata('member_id');
		$tran_str = $this->m_member->getApiData($param);


		$tran_list = json_decode(trim($tran_str), true);


		//$data['tran'] = $tran_list;

		if(empty($tran_list["TRANLIST"]) != "1")
			$data['item'] = $tran_list["TRANLIST"];
		else
			$data['item'] = array();
		// 공지사항
	 */

		$data['bbs'] = (array)$this->m_bbs->get_notice_li();


		$lang = get_cookie('lang');
		if ($lang == "us") {
			layout('app/main',$data,'app');
		}
		else if ($lang == "cn") {
			layout('app/main_CN',$data,'app');
		}
		else if ($lang == "kr"  or $lang == "") {
			layout('app/main_KR',$data,'app');
		}
		else if ($lang == "jp") {
			layout('app/main_JP',$data,'app');
		}
	}

	public function createAddr()
	{
		$data = array();
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'CHANGE');
		$cfg 			= get_cfg(); // 환경설정부분
		$admin_wallet	= $cfg->change_name; // 운영자의 Master 주소

        $coin=$this->input->get("coin");
        if($coin==""){
            alert("코인정보가  없습니다.", "app/coin");
        }

		$mb = $this->m_member->get_member($this->session->userdata('member_id'));

		// token 잔액
		$token_bal = $this->m_coin->get_coin_name_total($mb->coin_id,'coin');

		$wallet = $this->m_member->get_wallet($this->session->userdata('member_id'), "coin");


		if($wallet != null)
		{
			$new_addr = $wallet->wallet;
		}
		else
		{
			$param = array();

			$param['APT_TYPE'] = 'W_CREATEADDR';
            $param['COIN'] = $coin;
			$param['MEMBER_ID'] = $this->session->userdata('member_id');
			$curl_api = $this->m_member->getApiData($param);

			$create_addr = json_decode(trim($curl_api), true);

			$new_addr = $create_addr['ADDR'];
            alert("주소가 생성 되었습니다.", "app/coin");
			//$qrimg = $mb->coin_id;
			//qrcode($qrimg ,$new_addr);
//				var_dump($curl_api);
		}

/*
		if($new_addr != '')
		{
			// Master 주소에서 해당 발급 주소로 코인전송되도록 변경해야함.
			if($token_bal <= 0)
			{
				alert("보유 토큰이 없습니다.", "app/coin");
			}

			try
			{
				$param_tran = array();

				$param_tran['APT_TYPE'] = 'W_TOKEN_MOVE';
				$param_tran['FROM_ADDR'] = $admin_wallet;
				$param_tran['TO_ADDR'] = $mb->coin_id;
				$param_tran['AMOUNT'] = $token_bal;

				$curl_tran = $this->m_member->getApiData($param_tran);

				$tran = json_decode(trim($curl_tran), true);

				if ($tran['CODE'] == "0000")
				{
					// 지급한 토큰은 0으로..
					$order_code = order_code();  // 주문코드 만들기
					$this->m_coin->coin_in($order_code,'admin','admin',$mb->coin_id,$new_addr,'0',$token_bal,'0','token','토큰변환');

					alert($tran['MSG'], "app/coin");
				}
				else
				{
					alert($tran['MSG'], "app/coin");
				}
			}
			catch(exception $ex)
			{
				alert($ex->getMessage(), "app/coin");
			}
		}
*/

	}

}