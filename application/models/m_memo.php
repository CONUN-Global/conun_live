<?php
class M_memo extends CI_Model {

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
	
	function bbs_in($member_id) {
		
		$query = array(
			'member_id' => $this->input->post('member_id'),
			'category' => $this->input->post('category'),
			'subject' => $this->input->post('subject'),
			'contents' => $this->input->post('contents'),
		);

		$this->db->set('regdate', 'now()', FALSE);
		$this->db->insert('m_notice', $query);
	}
	
	function bbs_up($table,$idx) {
		
		$query = array(
			'member_id' => $this->input->post('member_id'),
			'category' => $this->input->post('category'),
			'subject' => $this->input->post('subject'),
			'contents' => $this->input->post('contents'),
		);

		$this->db->where('bbs_no',$idx);
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
		$this->db->order_by('bbs_no','asc');
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	function get_bbs($table,$idx) {
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('bbs_no',$idx);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
}