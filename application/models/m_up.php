<?
class M_up extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	
	function get_member_li() {
		$this->db->select('*');
		$this->db->from('m_member');
		$this->db->order_by('member_no','asc');
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
/* =================================================================
* 지갑 정보
================================================================= */
	function get_etc() {
		$this->db->select('*');
		$this->db->from('m_ico');
		$this->db->where('member_id','');
		$this->db->order_by('idx','asc');
		$query = $this->db->get();
		$item = $query->row();

		return $item;
	}
	
	function get_etc_mb($id) {
		$this->db->select('*');
		$this->db->from('m_ico');
		$this->db->where('member_id',$id);
		$this->db->order_by('idx','asc');
		$query = $this->db->get();
		$item = $query->row();

		return $item;
	}
	
	function get_ico_li() {
		$this->db->select('*');
		$this->db->from('m_ico');
		$this->db->order_by('idx','asc');
		$query = $this->db->get();
		$item = $query->result();
		
		return $item;
	}
	
/* =================================================================
* 지갑 정보
================================================================= */
	function member_wallet($coin_id,$addr,$qrimg,$type) {
		
		$query = array(
			'member_id' => $coin_id,
			'wallet' => $addr,
			'qrcode' => $qrimg,
			'type' => $type,
		);

		$this->db->set('regdate', 'now()', FALSE);
		$this->db->insert('m_wallet', $query);
	}
	
	function get_wallet($id,$type) {
		$this->db->select('*');
		$this->db->from('m_wallet');
		$this->db->where('member_id',$id);
		$this->db->where('type',$type);
		$this->db->order_by('wallet_no','asc');
		$query = $this->db->get();
		$item = $query->row();
		
		return $item;
	}
	
	function get_wallet_li($type=NULL) {
		$this->db->select('*');
		$this->db->from('m_wallet');
		if($type){
			$this->db->where('type',$type);			
		}
		$this->db->order_by('member_id','asc');
		$query = $this->db->get();
		$item = $query->result();
		
		return $item;
	}
	
}