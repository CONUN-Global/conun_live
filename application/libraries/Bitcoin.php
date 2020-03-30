<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class Bitcoin {
	
	public $CI;
	

	public $config;
	

	public $testnet;
	

	public function __construct() {
		$this->CI = &get_instance();
		
		$this->CI->config->load('bitcoin', TRUE);
		$this->config = $this->CI->config->item('bitcoin');	

		$this->CI->load->library('jsonrpcclient', $this->config);
	}


	public function __call($method,$arguments) {
        if(method_exists($this, $method) && $method !== 'ratenotify' && $method !== 'getinfo') {
           $info = $this->getinfo();
          if($info == NULL) 
				return FALSE;
				
            call_user_func_array(array($this,$method),$arguments);
		}
    }
	

	/**
	 * Get Account
	 계정에서 할당된 지갑 주소 확인
	 */
	public function getaccount($address) {
		$account = $this->CI->jsonrpcclient->getaccount($address);
		return ($account !== NULL) ? $account : FALSE;
	}




	/**
	 * Get Account Address
	 */
	public function getaccountaddress($account_name) {
		$address = $this->CI->jsonrpcclient->getaccountaddress($account_name);
		return ($address !== NULL) ? $address : FALSE;
	}


	public function getnewaddress($account_name) {
		$address = $this->CI->jsonrpcclient->getnewaddress($account_name);
		return ($address !== NULL) ? $address : FALSE;
	}
	
	

	/**
	 * Get Balance
	 상호형 할때 getbalance 아닌 getbal 함수 사용하삼
	 */
	public function getbalance($account) {
		return $this->CI->jsonrpcclient->getbalance($account);
	}


	// 위 발란스가 계정 개별 좋회가 안되서 만든것
	public function getbal($account) {
		$point = 0;
		$tmp = (array)$this->CI->jsonrpcclient->listaccounts();
		$res = array();
		foreach($tmp as $acc => $bal) {
			if(!preg_match('/\s+/', $acc) && $acc !== '') 
			$res[$acc] = (float)$bal;

			if ($account == $acc) {
				$point = $bal;
			}
			
		}

		return $point;
	}
	

	public function getblock($block_hash) {
		return $this->CI->jsonrpcclient->getblock($block_hash);
	}
	

	public function getblockhash($block_no) {
		return $this->CI->jsonrpcclient->getblockhash($block_no);
	}
		
	
	public function getinfo() {
		return $this->CI->jsonrpcclient->getinfo();
	}


	public function getmininginfo() {
		return $this->CI->jsonrpcclient->getmininginfo();
	}
	

	public function getreceivedbyaddress($address) {
		return $this->CI->jsonrpcclient->getreceivedbyaddress($address);
	}
	
	

	/* 조회 */

	public function listtransactions($account) {
		return $this->CI->jsonrpcclient->listtransactions($account);
	}

	public function listunspent($confirmations) {
		return $this->CI->jsonrpcclient->listunspent($confirmations);
	}
	public function listreceivedbyaddress() {
		return $this->CI->jsonrpcclient->listreceivedbyaddress();
	}
	public function gettransaction($tx_hash) {
		return $this->CI->jsonrpcclient->gettransaction($tx_hash);
	}
	
	public function getrawtransaction($transaction) {
		return $this->CI->jsonrpcclient->getrawtransaction($transaction);
	}
	public function createrawtransaction($transaction) {
		return $this->CI->jsonrpcclient->createrawtransaction($transaction['inputs'], $transaction['outputs']);
	}
	public function decoderawtransaction($transaction_hex) {
		return $this->CI->jsonrpcclient->decoderawtransaction($transaction_hex);
	}
	public function signrawtransaction($transaction_hex, $inputs = NULL, $privkey = NULL) {
		if($inputs == NULL)
			return $this->CI->jsonrpcclient->signrawtransaction($transaction_hex);
		if($privkey == NULL)
			return $this->CI->jsonrpcclient->signrawtransaction($transaction_hex, $inputs);
		return $this->CI->jsonrpcclient->signrawtransaction($transaction_hex, $inputs, $privkey);
	}
	
	public function sendrawtransaction($transaction_hex){
		return $this->CI->jsonrpcclient->sendrawtransaction($transaction_hex);
	}
	public function addmultisigaddress($n, $public_keys, $account = ""){
		return $this->CI->jsonrpcclient->addmultisigaddress($n, $public_keys, $account);
	}
	public function createmultisig($n, $public_keys){
		return $this->CI->jsonrpcclient->createmultisig($n, $public_keys);
	}


	public function importprivkey($wif, $account, $reindex = TRUE) {
		return $this->CI->jsonrpcclient->importprivkey("$wif", "$account", $reindex);
	}
	
		
	public function listaccounts($confirmations = 6) {
		$tmp = (array)$this->CI->jsonrpcclient->listaccounts($confirmations);
		$res = array();
		foreach($tmp as $acc => $bal) {
			if(!preg_match('/\s+/', $acc) && $acc !== '')
				$res[$acc] = (float)$bal;			
		}
		return $res;
	}




	/**
	 머니 이동
	 */			
	public function move($from, $to, $amount) {
		return $this->CI->jsonrpcclient->move($from, $to, (float)$amount);
	}
	

	public function id_from_input($input) {
		$raw = $this->getrawtransaction($input);
		if(isset($raw['code']))
		{
			$send = $this->sendrawtransaction($input);
			if(isset($send['code']) && $send['message'] == 'transaction already in block chain')
			{
				$decode = $this->decoderawtransaction($input);
				$tx_id = $decode['txid'];
			} else {
				if(!isset($send['code']))
				{
					$tx_id = $send;
				}
			}
		} else {
			$tx_id = $input;
		}
	
		return (isset($tx_id) == TRUE) ? $tx_id : FALSE;
	}
	
	/**
	 * Send From
	 코인 보내기 src_ac 는 계정
	 */			
	public function sendfrom($src_ac, $to_address, $value) {
		return $this->CI->jsonrpcclient->sendfrom($src_ac, $to_address, (float)$value);
	}

	
	public function validateaddress($address) {
		$valid = $this->CI->jsonrpcclient->validateaddress($address);
		return $valid['isvalid'];
	}

};
