<?
class M_research extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	
	
	// 전체 센터수 가져오기
	function get_center_total() {
		$this->db->select('member_id');
		$this->db->from('m_center');
		$query = $this->db->get();
		$item = $query->num_rows();
		return $item;
	}
	
	// 전체 회원수 가져오기
	function get_member_total() {
		$this->db->select('member_no');
		$this->db->from('m_member');
		$query = $this->db->get();
		$item = $query->num_rows();
		return $item;
	}
	
	// 전체 구좌수
	function get_account_total() {
		$this->db->select('account_no');
		$this->db->from('m_account');
		$query = $this->db->get();
		$item = $query->num_rows();
		return $item;
	}
	
	// 개별 구좌수
	function get_member_account_total($id) {
		$this->db->select('member_id');
		$this->db->from('m_account');
		$this->db->where('member_id',$id);
		$query = $this->db->get();
		$item = $query->num_rows();
		return $item;
	}
	
	/*-----------------------------------------------*/
	//  토큰
	/*-----------------------------------------------*/
	
	// 전체 토큰수 가져오기
	function get_token_li() {
		$this->db->select('idx');
		$this->db->from('m_ico');
		$query = $this->db->get();
		$item = $query->num_rows();
		return $item;
	}
	
	function get_token_sum() {
		$this->db->select('tokens');
		$this->db->from('m_ico');
		$query = $this->db->get();
		$list = $query->result();

		$item = 0;
		foreach ($list as $row) {
			$item = $item + $row->tokens;
		}
		$item = round($item); 
		
		return $item;
	}
	
	function get_token_total($result=NULL) {
		$this->db->select('result,tokens');
		$this->db->from('m_ico');       
		$query = $this->db->get();
		$list = $query->result();

		$item = 0;
		foreach ($list as $row) {			
			if ($row->result == $result) {
				$item = $item + $row->tokens;
			}
		}
		$item = round($item,8); 
		
		return $item;
	}
	
	// 전체 받은 이더리움 수
	function get_eth_sum() {
		$this->db->select('coin');
		$this->db->from('m_ico');
		$this->db->where('type','ETH');
		$query = $this->db->get();
		$list = $query->result();

		$item = 0;
		foreach ($list as $row) {
			$item = $item + $row->coin;
		}
		$item = round($item,8); 
		
		return $item;
	}
	
	function get_eth_total($result=NULL) {
		$this->db->select('result,coin');
		$this->db->from('m_ico');
		$this->db->where('type','ETH');        
		$query = $this->db->get();
		$list = $query->result();

		$item = 0;
		foreach ($list as $row) {			
			if ($row->result == $result) {
				$item = $item + $row->coin;
			}
		}
		$item = round($item,8); 
		
		return $item;
	}
	
	// 전체 받은 비트코인 수
	function get_btc_sum() {
		$this->db->select('coin');
		$this->db->from('m_ico');
		$this->db->where('type','BTC');
		$query = $this->db->get();
		$list = $query->result();

		$item = 0;
		foreach ($list as $row) {
			$item = $item + $row->coin;
		}
		$item = round($item,8); 
		
		return $item;
	}
	
	function get_btc_total($result=NULL) {
		$this->db->select('result,coin');
		$this->db->from('m_ico');
		$this->db->where('type','BTC');      
		$query = $this->db->get();
		$list = $query->result();

		$item = 0;
		foreach ($list as $row) {			
			if ($row->result == $result) {
				$item = $item + $row->coin;
			}
		}
		$item = round($item,8); 
		
		return $item;
	}
	
	/*-----------------------------------------------*/
	//  포인트 테이블
	/*-----------------------------------------------*/
	
	// 전체 수당 합
	function get_point_su_total() {
		$this->db->select('sum(point) as point');
		$this->db->from('m_point');
		$this->db->where('cate','su');
		$query = $this->db->get();
		$item = $query->row();
		return $item->point;
	}
	
	// 전체 지출 합
	function get_point_out_total() {
		$this->db->select('sum(point) as point');
		$this->db->from('m_point');
		$this->db->where('cate','out');
		$query = $this->db->get();
		$item = $query->row();
		return $item->point;
	}
	
	// 개별 수당 합
	function get_point_member_su_total($member_id) {
		$this->db->select('sum(point) as point');
		$this->db->from('m_point');
		$this->db->where('member_id',$member_id);
		$this->db->where('cate','su');
		$query = $this->db->get();
		$item = $query->row();
		return $item->point;
	}
	
	// 개별 지출 합
	function get_point_member_out_total($member_id) {
		$this->db->select('sum(point) as point');
		$this->db->from('m_point');
		$this->db->where('member_id',$member_id);
		$this->db->where('cate','out');
		$query = $this->db->get();
		$item = $query->row();
		return $item->point;
	}
	
	/*-----------------------------------------------*/
	//  etc 테이블
	/*-----------------------------------------------*/
	// 전체 회원리스트
	function get_coin_mb() {
		$this->db->select('*');
		$this->db->from('coin_member');
		$this->db->order_by('idx','asc');
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	// coin list
	function get_ico_mb($email) {
		$this->db->select('*');
		$this->db->from('ico_list');
		$this->db->where('email',$email);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
	function get_ico_li() {
		$this->db->select('*');
		$this->db->from('ico_list');
		$this->db->order_by('idx','asc');
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
}

?>
