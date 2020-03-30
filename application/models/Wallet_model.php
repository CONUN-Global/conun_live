<?php

class Wallet_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * @param $mb_no
	 * @param $coin_type
	 * @return array|mixed
	 */
	public function getWalletAddr($mb_no, $coin_type = null)
	{
		$where['mb_no'] = $mb_no;
		if ($coin_type) {
			$where['coin_type'] = $coin_type;
			$this->select('*')->from('cb_wallet_addr');
			return $this->fetch($where, 'one');

		} else {
			$this->select('*')->from('cb_wallet_addr');
			return $this->fetch($where, 'All');
		}
	}

	// 지갑 생성하기
	public function setWalletAddr($_param, $mb_no)
	{

		$sql = "
				insert cb_wallet_addr set
					mb_no					= {$mb_no}
					,coin_type	= '{$_param['coin_type']}'
					,ad_name	= '{$_param['ad_name']}'
					,ad_key	= '{$_param['ad_key']}'
					,ad_addr	= '{$_param['ad_addr']}'
					on duplicate key update
					mb_no					= {$mb_no}
					,coin_type	= '{$_param['coin_type']}'
					,ad_name	= '{$_param['ad_name']}'
					,ad_key	= '{$_param['ad_key']}'
					,ad_addr	= '{$_param['ad_addr']}'
		";


		$this->db->query($sql);


	}


	// 지갑정보 조회

	/**
	 * @param $mb_no
	 * @return mixed
	 */

	/**
	 * @param $_param
	 */
	public function setDeposit($_param)
	{
		$sql = "
				insert cb_wallet_list set
					mb_no= {$_param['mb_no']}
					,send_address	= '{$_param['send_address']}'
					,reve_address	= '{$_param['reve_address']}'
					,balance	= '{$_param['balance']}'
					,txid	= '{$_param['txid']}'
					,commission	= '{$_param['commission']}'
					,ad_key	= '{$_param['ad_key']}'
					,state	= '{$_param['state']}'
					,coin_type	= '{$_param['coin_type']}'
					,kind	= '{$_param['kind']}'
					,create_at	= now()
		";

		$this->db->query($sql);

	}


	// 입출금 페이지
	public function getTradingWhere($params)
	{
		$where = array();
		if ($params['mb_no']) {
			$where['A.mb_no'] = $params['mb_no'];
		}
		if ($params['kind']) {
			$where['A.kind'] = $params['kind'];
		}
		if ($params['state']) {
			$where['A.state'] = $params['state'];
		}
		if ($params['coin_type']) {
			$where['A.coin_type'] = $params['coin_type'];
		}
		if ($params['no']) {
			$where['A.no'] = $params['no'];
		}
		if ($params['mb_login']) {
			$where['B. mb_login LIKE "%'.$params['mb_login'].'%"'] = "";
		}

		if ($params['keyword']) {
			$where['( B.mb_login LIKE "%'.$params['keyword'].'%" or C.mb_nickname LIKE "%'.$params['keyword'].'%" or C.mb_mobile LIKE "%'.$params['keyword'].'%")'] = null;
		}

		if ($params['sdate']) {
			$where[ 'DATE_FORMAT(A.create_at, "%Y-%m-%d")  between "'.$params['sdate'].'" and  "'.$params['edate'].'"' ] = "";
		}
		if ($params['txid']) {
			$where['A.txid'] = $params['txid'];
		}
		return $where;

	}

	/**
	 * @param $mb_no
	 * @param int $page
	 */

	public function getTradingCnt($params)
	{
		$where = $this->getTradingWhere($params);

		$this->select('count(*) as cnt')
			->from('cb_wallet_list A')
			->join('cb_member B', 'B.mb_no=A.mb_no', 'LEFT OUTER')
			->join('cb_member_extra C', 'C.mb_no=A.mb_no', 'LEFT OUTER');

		$row = $this->fetch($where, 'one');
		return $row['cnt'];

	}

	/**
	 * @param $params
	 * @param int $page
	 * @return array|mixed
	 */

	public function getTradingList($params,$limit= "one")
	{
		$where = $this->getTradingWhere($params);

		$this->select('A.*,B.mb_login,C.mb_nickname,B.mb_id')
			->from('cb_wallet_list A')
			->join('cb_member B', 'B.mb_no=A.mb_no', 'LEFT OUTER')
			->join('cb_member_extra C', 'C.mb_no=A.mb_no', 'LEFT OUTER');

		$this->order_by("A.no desc");

		$rows = $this->fetch($where,$limit);

		return $rows;


	}
	public function updateState($params)
	{
		$sql = "
				update  cb_wallet_list set
					state	= ".$params['state']."
					,txid	= '{$params['txid']}'
					,update_at	= now()
				WHERE 	
				 no = {$params['no']}
		";
		$this->db->query($sql);
	}

	/**
	 * @param $params
	 * @return mixed
	 */
	function daily_wallet_sum($mb_no,$coin_type)
	{

		$where['mb_no'] = $mb_no;
		$where['coin_type'] = $coin_type;
		$where[ 'DATE_FORMAT(create_at, "%Y-%m-%d")  = DATE_FORMAT(now(), "%Y-%m-%d")'] = null;
		$this->select('sum(balance) as balance')->from('cb_wallet_list');
		$row = $this->fetch($where, 'one');

		return $row['balance'];

	}

	/**
	 * @param $params
	 */
	function setAdminWalletHistory($_params)
	{
		$sql = "
			insert cb_admin_wallet_history  set
			mb_no= {$_params['mb_no']}
			,wl_no	= '{$_params['wl_no']}'
			,coin_type	= '{$_params['coin_type']}'
			,balance	= '{$_params['balance']}'
			,commission	= '{$_params['commission']}'
			,state	= '{$_params['state']}'
			,history_memo	= '{$_params['history_memo']}'
			,create_at	= now()
		";

		$this->db->query($sql);
	}


	/**
	 * 지갑 키로 지갑 정보 가져오기
	 * @param $coin_type
	 * @param $key
	 * @return array|mixed
	 */
	public function getAddressByKey($coin_type, $key) {
		$this->select('*')->from('cb_wallet_addr');
		return $this->fetch(['ad_key'=>$key, 'coin_type'=>$coin_type], 'one');
	}


}
