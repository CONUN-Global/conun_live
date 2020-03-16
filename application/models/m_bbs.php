<?
class M_bbs extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
/* =================================================================
* contact
================================================================= */

	function get_notice_li() {
		$this->db->select('*');
		$this->db->from('m_notice');
		$this->db->order_by('bbs_no','desc');
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	function get_notice_view($idx) {
		$this->db->select('*');
		$this->db->from('m_notice');
		$this->db->where('bbs_no',$idx);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
	
	function notice_in() {		
		$query = array(
			'email' => $this->input->post('email'),
			'subject' => $this->input->post('title'),
			'contents' => $this->input->post('contents'),
		);

		$this->db->set('regdate', 'now()', FALSE);
		$this->db->insert('m_notice', $query);
	}
	
	
/* =================================================================
* contact
================================================================= */
    
	function memo_in() {		
		$query = array(
			'title' => $this->input->post('title'),
			'email' => $this->input->post('email'),
			'memo' => $this->input->post('memo'),
		);

		$this->db->set('regdate', 'now()', FALSE);
		$this->db->insert('m_memo', $query);
	}
	
	function memo_up($idx) {		
		$query = array(
			'title' => $this->input->post('title'),
			'memo' => $this->input->post('memo'),
		);
		$this->db->where('memo_no',$idx);
		$this->db->update('m_memo', $query);
	}
	
	function get_memo_li($member_id) {
		$this->db->select('*');
		$this->db->from('m_memo');
		$this->db->where('email',$member_id);
		$this->db->order_by('memo_no','desc');
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	function get_memo_view($idx) {
		$this->db->select('*');
		$this->db->from('m_memo');
		$this->db->where('memo_no',$idx);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
	
	
	function get_memo_ans($idx) {
		$this->db->select('*');
		$this->db->from('m_memo');
		$this->db->where('memo_no',$idx);
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	// 답변 숫자 찾기
	function memo_ans_cnt($idx) {
		$this->db->select('*');
		$this->db->from('m_memo');
		$this->db->where('memo_no',$idx);
		$query = $this->db->get();
		$item = $query->num_rows();
		return $item;
	}
/* =================================================================
* contact
================================================================= */
	
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