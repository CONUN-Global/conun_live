<?php
class M_vlm extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	

/*==========================================================*/
/* 마감 등록
/*==========================================================*/

	function set_deadline($order_code,$in_point,$out_point,$regdate=NULL) {
		
		if($regdate == NULL){
			$regdate = nowdate();			
		}
		
		$query = array(
			'order_code' => $order_code,
			'in_point' => $in_point,
			'out_point' => $out_point,
			'end_date' => $this->input->post('end_date'),
			'start_date' => $this->input->post('start_date'),
			'state' => $this->input->post('state'),
			'hold' => $this->input->post('hold'),
			'regdate' => $regdate,
		);
		
		$this->db->insert('m_deadline', $query);
	}		

/*==========================================================*/
/* 마감 조회
/*==========================================================*/

	function get_deadline_date($date) {
		$this->db->select('dead_no,order_code,end_date');
		$this->db->from('m_deadline');
		$this->db->where('end_date',$date);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
	
	// 포인트/코인 테이블에서 삭제하기
	function del_ordercode($order_code) {
		
		$this->db->select('point_no');
		$this->db->from('m_point');
		$this->db->where('order_code',$order_code);
		$query = $this->db->get();
		$list = $query->result();	
		foreach ($list as $row) {	
			$this->db->where('point_no', $row->point_no);
			$this->db->delete('m_point');
		}
		
		$this->db->select('coin_no');
		$this->db->from('m_coin');
		$this->db->where('order_code',$order_code);
		$query = $this->db->get();
		$list = $query->result();	
		foreach ($list as $row) {	
			$this->db->where('coin_no', $row->coin_no);
			$this->db->delete('m_coin');
		}
	}
	
}
?>
