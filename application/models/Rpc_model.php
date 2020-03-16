<?php

class Rpc_model extends CI_Model {

	/**
	 * @param $coin_type
	 * @return CB_Ethereum|CB_RpcClient
	 */
	public function getRpcClass($coin_type)
	{
		$driver = 'CB_RpcClient';
		$host_name = NULL;
		$port = NULL;

		switch ($coin_type) {
			case 'eth' :
				$driver = 'CB_Ethereum';
				$host_name = ENVIRONMENT !== 'production' ? '10.0.5.9' : '52.231.202.52'; // 테스트 | 운영
				$port = 18546;

				//-- require_once APPPATH . 'libraries/CB_Ethereum.php';
				//-- $rpc = new CB_Ethereum('10.0.5.9', 18546); //테스트
				//-- $rpc = new CB_Ethereum('52.231.202.52', 18546);
				break;
            /*	case 'etc' :
                    $driver = 'CB_Ethereum';
                    $host_name = ENVIRONMENT !== 'production' ? '10.0.5.9' : '52.231.206.57'; // 테스트 | 운영
                    $port = 18545;

                    //-- require_once APPPATH . 'libraries/CB_Ethereum.php';
                    //-- $rpc = new CB_Ethereum('10.0.5.9', 18545);//테스트
                    //-- $rpc = new CB_Ethereum('52.231.206.57', 18545);//운영
                    break;


                case 'btc' :
                    $host_name = ENVIRONMENT !== 'production' ? 'http://coinpinex1:password1@10.0.5.6:19150/' : 'http://conefit:zhspvlt13524@52.231.198.184:19150/'; // 테스트 | 운영

                    //-- require_once APPPATH . 'libraries/CB_RpcClient.php';
                    //-- $rpc = new CB_RpcClient('http://coinpinex1:password1@10.0.5.6:19150/'); //테스트
                    //-- $rpc = new CB_RpcClient('http://conefit:zhspvlt13524@52.231.198.184:19150/');
                    break;
                case 'ltc' :
                    $host_name = ENVIRONMENT !== 'production' ? 'http://coinpinex1:password1@10.0.5.9:19151/' : 'http://conefit:zhspvlt13524@52.231.205.233:19151/'; // 테스트 | 운영

                    //-- require_once APPPATH . 'libraries/CB_RpcClient.php';
                    //-- $rpc = new CB_RpcClient('http://coinpinex1:password1@10.0.5.9:19151/');//테스트
                    //-- $rpc = new CB_RpcClient('http://conefit:zhspvlt13524@52.231.205.233:19151/');//운영
                    break;
                case 'bch' :
                    $host_name = ENVIRONMENT !== 'production' ? 'http://conefit:zhspvlt13524@52.231.201.61:19152/' : 'http://conefit:zhspvlt13524@52.231.201.61:19152/'; // 테스트 | 운영

                    //-- require_once APPPATH . 'libraries/CB_RpcClient.php';
                    //-- $rpc = new CB_RpcClient('http://conefit:zhspvlt13524@52.231.201.61:19152/');//테스트
                    break;
                case 'hana' :
                    $host_name = ENVIRONMENT !== 'production' ? 'http://apple:eogksalsrnr!@52.231.203.121:7201/' : 'http://apple:eogksalsrnr!@52.231.203.121:7201/'; // 테스트 | 운영

                    //-- require_once APPPATH . 'libraries/CB_RpcClient.php';
                    //-- $rpc = new CB_RpcClient('http://apple:eogksalsrnr!@52.231.203.121:7201/');//테스트
                    break;
                case 'ibt' :
                    $host_name = ENVIRONMENT !== 'production' ? 'http://bitcoinrpc:conefit!@52.231.203.121:7301/' : 'http://bitcoinrpc:conefit!@52.231.203.121:7301/'; // 테스트 | 운영

                    //-- require_once APPPATH . 'libraries/CB_RpcClient.php';
                    //-- $rpc = new CB_RpcClient('http://apple:eogksalsrnr!@52.231.203.121:7201/');//테스트
                    break;*/
			default:
				return NULL;
				break;
		}


		if (class_exists($driver) !== TRUE) require_once APPPATH . 'libraries/' . $driver . '.php';

		return new $driver($host_name, $port);
	}

}