<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['ssl'] = FALSE;
/*
$config['user'] = 'mircoinrpc';
$config['password'] = 'EPaAHh46AmsAmHyxwFdrPgiLwA3d6TWCMGjozLbhAD7u';
$config['host'] = '211.238.13.157';
$config['port'] = '30303';
*/


$config['ssl'] = ($config['ssl'] == TRUE) ? 'https://' : 'http://';
$config['url'] = $config['ssl'].$config['user'].':'.$config['password'].'@'.$config['host'].':'.$config['port'].'/';




			case 'etc' :
				$driver = 'CB_Ethereum';
				$host_name = ENVIRONMENT !== 'production' ? '10.0.5.9' : '52.231.206.57'; // 테스트 | 운영
				$port = 18545;
				
				
				
				

	//ETH  ETC지갑 생성
	public function setWalletAddrHC($params)
	{

		if (!$params['wallet-name']) {
			$response = ['status' => 0, 'message' => '지갑이름 입력하세요. '];
			exit(json_encode($response));
		}

		$mb_no = $this->member['mb_no'];
		$mb_locker = $this->member['mb_locker'];

		$this->load->model('Rpc_model', 'rpc');
		$ethereum = $this->rpc->getRpcClass($params['coin_type']);

		$_params['addr'] = $ethereum->personal_newAccount($mb_locker); // 계정 생성
		$addr_check = $ethereum->eth_accounts(); // 계정 정보 조회
		$_params['key'] = sizeof($addr_check) - 1;

		if ($_params['addr'] == $addr_check[$_params['key']]) {

			$this->load->model('Wallet_model', 'wallet');
			$_params['ad_name'] = $params['wallet-name'];
			$_params['ad_addr'] = $_params['addr'];
			$_params['ad_key'] = $mb_locker;
			$_params['coin_type'] = $params['coin_type'];
			$this->wallet->setWalletAddr($_params, $mb_no);
			$response = ['status' => 1, 'message' => ' 지갑이 생성 되었습니다..', 'url' => "/wallet/deposit/" . $params['coin_type']];
			exit(json_encode($response));

		} else {

			$response = ['status' => 0, 'message' => ' 지갑 생성 오류 잠시후 시도해주세요!.', 'url' => "/wallet/deposit/" . $params['coin_type']];
			exit(json_encode($response));

		}

	}
?>