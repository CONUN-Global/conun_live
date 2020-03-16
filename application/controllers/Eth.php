<?php

class Eth extends CB_Controller
{

	public function _remap($method)
	{
		$this->db->trans_start();


		$this->db->trans_complete();



		$this->load->model('Wallet_model');
		$this->load->model('Balance_model');
		$this->load->model('Rpc_model');

		exit;
		$this->setDepositHC($method);
	}

	function setDepositHC($coin_type)
	{
		$client = &$this->Rpc_model->getRpcClass($coin_type);


//		fn_ansi_echo('-. HC Accounts', 'color:yellow', false);
		$_start_time = microtime(true);

		$this->Wallet_model->select('mb_no, ad_key, ad_addr')->from('cb_wallet_addr');
		$Address = $this->Wallet_model->fetch(['coin_type' => $coin_type, 'ad_addr!' => ''], 'h:mb_no');
		$Accounts = $client->eth_accounts();// 클라이언트 소유 주소목록을리터

		$index = 0;
		$count = count($Address);
		$listed = empty($Accounts) === true ? 0 : count($Accounts);
		/*
		fn_ansi_echo([': ', 'color:yellow'], [' Address ' . number_format($count) . ', Account ' . number_format($listed), 'bold;color:light-green'], [' (' . fn_tp($_start_time) . ')', 'color:white']);
		if (!$listed) {
			fn_ansi_echo(['-. Total Execute time: ', 'color:light-green'], [fn_tp($_start_time), 'bold;color:light-cyan']);
			return;
		}
*/
		$gas = 210000;

		if ($coin_type == "etc") {

			foreach ($Address as $mb_no => $row) {
				if (empty($row['ad_addr'])) {
					continue;
				}

				$balance = $client->eth_getBalance($row['ad_addr'], false);//
				$value = strip_tags(fn_money_format($balance['wei2eth'], false, 8));

				if ($value <= 0.01 || $row['ad_addr'] == $Accounts[22]) {
					continue;
				}
				$transactions = json_decode(file_get_contents("https://api.gastracker.io/addr/" . $row['ad_addr'] . "/transactions")); // 거래 내역 가져요기

				$client->personal_unlockAccount((string)$row['ad_addr'], (string)$row['ad_key'], 200); // testpassword

				foreach ($transactions->items as $val) {
					if ($val->to == $row['ad_addr']) {
						$params['txid'] = $val->hash;
						$getbalance_bc = $val->valueEther;

						if ($this->Wallet_model->getTradingCnt($params) > 0) {
							continue;
						}
						$bchexdec = (string)$client->toWei($val->valueEther - $client->wei2eth($client->decode_hex($client->eth_gasPrice()) * $gas) - $client->wei2eth($gas));
						$array_bchexdec = explode('.', $bchexdec);

						$Transaction = new Ethereum_Transaction($row['ad_addr'], $Accounts[22], $gas, (string)$client->decode_hex($client->eth_gasPrice()), (string)$array_bchexdec[0]);


						$txid = $client->eth_sendTransaction($Transaction);

						if ($txid) {
							$value = strip_tags(fn_money_format($getbalance_bc, false, 8));

							$params['mb_no'] = $mb_no;
							$params['reve_address'] = $row['ad_addr'];
							$params['balance'] = $value;
							$params['commission'] = "0";
							$params['coin_type'] = $coin_type;
							$params['ad_key'] = $row['ad_key'];
							$params['state'] = 3;
							$params['kind'] = 1;

							$this->Balance_model->setBalance($coin_type, '1', $mb_no, $value, "{$coin_type} 입금");
							$this->Wallet_model->setDeposit($params);
						}
					}
				}


				if (_IS_CLI_VERBOSE_ === true) {
					system('echo -e "\e[1A"');
				}
				fn_ansi_progress('-. Each ' . $coin_type, $index + 1, $count, $_start_time, 0, " - {$row['ad_key']}");
				++$index;
			}
		} else {


			foreach ($Address as $mb_no => $row) {
				if (empty($row['ad_addr'])) {
					continue;
				}
				$balance = $client->eth_getBalance($row['ad_addr'], false);//
				$value = strip_tags(fn_money_format($balance['wei2eth'], false, 8));
				if ($value <= 0.01 || $row['ad_addr'] == $Accounts[22]) {
					continue;
				}

				$transactions = json_decode(file_get_contents("https://etherchain.org/api/account/" . $list[$i] . "/tx/1"));

				$client->personal_unlockAccount((string)$row['ad_addr'], (string)$row['ad_key'], 200); // testpassword

				foreach ($transactions->data as $val) {

					if ($val->recipient == $row['ad_addr']) {
						$params['txid'] = $val->hash;

						if ($this->Wallet_model->getTradingCnt($params) > 0) {
							continue;
						}

						$bchexdec = (string)$client->toWei($val->amount - $client->wei2eth($client->decode_hex($client->eth_gasPrice()) * $gas) - $client->wei2eth($gas));
						$array_bchexdec = explode('.', $bchexdec);
						$encodeamount = "0x".dechex($array_bchexdec[0]);
						$Transaction = new Ethereum_Transaction($row['ad_addr'], $Accounts[22], "0x7530", "0x7530", $encodeamount);

						$txid = $client->eth_sendTransaction($Transaction);

						if ($txid) {
							$value = strip_tags(fn_money_format($rpc->wei2eth($val->amount), false, 8));

							$params['mb_no'] = $mb_no;
							$params['reve_address'] = $row['ad_addr'];
							$params['balance'] = $value;
							$params['commission'] = "0";
							$params['coin_type'] = $coin_type;
							$params['ad_key'] = $row['ad_key'];
							$params['state'] = 3;
							$params['kind'] = 1;

							$this->Balance_model->setBalance($coin_type, '1', $mb_no, $value, "{$coin_type} 입금");
							$this->Wallet_model->setDeposit($params);
						}
					}
				}


				if (_IS_CLI_VERBOSE_ === true) {
					system('echo -e "\e[1A"');
				}
				fn_ansi_progress('-. Each ' . $coin_type, $index + 1, $count, $_start_time, 0, " - {$row['ad_key']}");
				++$index;
			}
		}

		fn_ansi_echo(['-. Total Execute time: ', 'color:light-green'], [fn_tp($_start_time), 'bold;color:light-cyan']);
	}

}
