<?php
class M_qr extends CI_Model {

	function M_office()
	{
		parent::__construct();
	}
		
	function memo_in() {
		
		$query = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'memo' => $this->input->post('memo'),
		);

		$this->db->set('regdate', 'now()', FALSE);
		$this->db->insert('m_memo', $query);
	}
	
	function qr_in($member_id) {
		
		$query = array(
			'qr_member' => $this->input->post('qr_member'),
			'qr_amount' => $this->input->post('qr_amount'),
			'qr_type' => $this->input->post('qr_type'),
            'qr_memo' => $this->input->post('qr_memo'),
		 
		);

		$this->db->set('regdate', 'now()', FALSE);
		$this->db->insert('m_qr', $query);
	}
	
	function qr_up($table,$idx) {
		
		$query = array(
			'qr_member' => $this->input->post('qr_member'),
			'qr_amount' => $this->input->post('qr_amount'),
			'qr_type' => $this->input->post('qr_type'),
            'qr_memo' => $this->input->post('qr_memo'),
		);

		$this->db->where('qr_no',$idx);
		$this->db->update($table, $query);
	}
	
	function bbs_hit($table,$idx,$hit) {
		
		$hit = $hit+1;
		$query = array(
			'hit' => $hit,
		);

		$this->db->where('bbs_no',$idx);
		$this->db->update($table, $query);
	}
	
	function get_bbs_li($table) {
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by('qr_no','asc');
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	function get_bbs($table,$idx) {
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('qr_no',$idx);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
}