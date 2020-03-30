<?php

/**
 * Created by PhpStorm.
 * User: "kdg@coinpinex.com"
 * Date: 2017-07-31
 * Time: 오후 1:29
 */
class Balance_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	//포인트전체정보

	/**
	 * @param $mb_no
	 * @return mixed
	 */
	public function getInfo($mb_no)
	{
		$balanceResult = $this->select('cb.coin_type, cb.volume, cob.volume as order_volume')
			->from('cb_balance as cb')
			->join('cb_order_balance as cob', 'cb.mb_no=cob.mb_no AND cb.coin_type=cob.coin_type', 'left')
			->where('cb.mb_no', $mb_no)
			->get()
			->result_array();

		$balance = [];
		if (isset($balanceResult)) {
			foreach ($balanceResult as $row) {
				$balance["now" . $row['coin_type']] = $row['volume'];//현재  보유 코인
				if ($row['order_volume'] > 0) {
					$balance[$row['coin_type']] = $row['volume'] - floatval($row['order_volume']);
				}// 거래 가능한 보유 코인
				else {
					$balance[$row['coin_type']] = $row['volume'] + floatval($row['order_volume']);
				}// 거래 가능한 보유 코인
				$balance["order" . $row['coin_type']] = $row['order_volume'];//현재 거래중이 포인트
			}
		}
		//debug($balanceResult);
		return $balance;
	}


	/**
	 * @param $coin_type
	 * @param $kind
	 * @param $mb_no
	 * @param $balance
	 * @param $etc
	 */
	public function setBalance($coin_type, $kind, $mb_no, $balance, $etc, $trans = true)
	{
		$balance_info = $this->getInfo($mb_no);

		$pre = ($balance_info["now" . $coin_type]) ? $balance_info["now" . $coin_type] : 0;


		if ($coin_type == "cash") {
			$now = ($kind == 1) ? floor($balance_info["now" . $coin_type]) + floor($balance) : floor($balance_info["now" . $coin_type]) - floor($balance);


		} else {
			$now = ($kind == 1) ? bcadd(sprintf('%.8f', $balance_info["now" . $coin_type]), sprintf('%.8f', $balance), 8) : bcsub(sprintf('%.8f', $balance_info["now" . $coin_type]), sprintf('%.8f', $balance), 8);

		}


		if ($trans) {
			$this->db->trans_start();
		}
		// 포인트 저장
		$sql = "
				INSERT  cb_balance_history set
				   `mb_no`	  = {$mb_no}	
				  ,`coin_type`  = '{$coin_type}'
				  ,`pre`		  = '{$pre}'
				  ,`change`	  = '{$balance}'
				  ,`now`		  = '{$now}'
				  ,`kind`		  = '{$kind}'
				  ,`etc`		  = '{$etc}'
				  ,`create_at`  = now() 
		";

		$this->db->query($sql);

		$sql = "
				INSERT cb_balance  SET 
					 mb_no		= {$mb_no}
				   ,`coin_type`  = '{$coin_type}'
					,volume		= '{$now}'
				on duplicate key update
				 	volume = '{$now}'
		";

		$this->db->query($sql);
		if ($trans) {
			$this->db->trans_complete();
		}

	}

	public function getBalanceWhere($params)
	{
		$where = array();
		if ($params['mb_no']) {
			$where['mb_no'] = $params['mb_no'];
		}
		if ($params['wl_no']) {
			$where['wl_no'] = $params['wl_no'];
		}

		if ($params['state']) {
			$where['state'] = $params['state'];
		}

		if ($params['coin_type']) {
			$where['coin_type'] = $params['coin_type'];
		}

		if ($params['create_at']) {
			$where['DATE_FORMAT(create_at, "%Y%m%d")'] = date("Ymd");
		}
		return $where;
	}

	/**
	 * @param $mb_no
	 * @param int $page
	 */

	public function getBalanceCnt($params)
	{
		$where = $this->getBalanceWhere($params);
		$this->select('count(*) as cnt')->from('cb_balance_history');
		$row = $this->fetch($where, 'one');
		return $row['cnt'];
	}


	public function getBalanceHistory($params, $limit = "one")
	{
		$where = $this->getBalanceWhere($params);

		$this->select('*')->from('cb_balance_history');
		$this->order_by("no desc");

		$rows = $this->fetch($where, $limit);

		return $rows;

	}

}