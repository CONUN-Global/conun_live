<?php
class M_office extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
		
/* ======================================================*/
/* 센터정보                                                */
/* ======================================================*/

	// 센터 리스트 가져오기
	function get_center_li() {
		$this->db->select('*');
		$this->db->from('m_center');
		$this->db->where('state !=','운영종료');
		$this->db->order_by('center_no','asc');
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	// 센터장 찾기
	function center_serch($office) {		
		$this->db->select('*');
		$this->db->from('m_center');
		$this->db->where('office',$office);
		$this->db->where('state','운영중');
		$query = $this->db->get();
		$item = $query->row();
		
		return $item;
	}
	
	// 센터장인지 확인
	function center_chk($id) {
		$this->db->select('*');
		$this->db->from('m_center');
		$this->db->where('member_id',$id);
		$this->db->where('state','운영중');
		$query = $this->db->get();
		$item = $query->num_row();
		return $item;
	}

	// 센터 상세 정보 가져오기
	function get_center($idx) {
		$this->db->select('*');
		$this->db->from('m_center');
		$this->db->where('center_no',$idx);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}

	// 센터 정보 수정
	function center_up($idx) {
		$query = array(
			'state' => $this->input->post('state'),
			'office' => $this->input->post('office'),
			//'office_recommend_id' => $this->input->post('office_recommend_id'),
			//'member_id' => $this->input->post('member_id'),
			'fax' => $this->input->post('fax'),
			'addr1' => $this->input->post('addr1'),
			'mobile' => $this->input->post('mobile'),
			'fax' => $this->input->post('fax'),
			'saupja' => $this->input->post('saupja'),
		);
		$this->db->where('center_no', $idx);
		$this->db->update('m_center', $query);
	}

	// 센터 등록
	function center_in() {
		$query = array(
			'state' => $this->input->post('state'),
			'member_id' => $this->input->post('member_id'),
			'office' => $this->input->post('office'),
			'fax' => $this->input->post('fax'),
			'addr1' => $this->input->post('addr1'),
			'mobile' => $this->input->post('mobile'),
			'fax' => $this->input->post('fax'),
			'saupja' => $this->input->post('saupja'),
		);
		$this->db->set('regdate', 'now()', FALSE);
		$this->db->insert('m_center', $query);
	}


/* ======================================================*/
/* 직급                                               */
/* ======================================================*/

	// 직급테이블에 초기등록하기
	function level_in($order_code,$member_id,$dep,$flgs) {
		$dep = $dep + 1;
		$point = 1500;
		
		$query = array(
			'order_code' => $order_code,
			'member_id' => $member_id,
			'account_id' => strtolower($this->input->post('account_id')),
			'dep' => $dep,
			'point' => $point,
			'kind' => $flgs,
			'is_stop' => '정상',
		);

		$this->db->set('regdate', 'now()', FALSE);
		$this->db->insert('m_level', $query);
	}

	function level_update($id) {
		
		if($this->input->post('is_stop') == '탈퇴') {
			$stop_date = nowdate();
		} else {
			$stop_date = 0;
		}		

		$query = array(
			'is_stop' => $this->session->userdata('is_stop'),
			'regdate' => $this->input->post('regdate'),
			'stopdate' => $stop_date,
		);
		
		$this->db->where('account_id', $id);
		$this->db->update('m_level', $query);
	}
	
	function get_level($account_id) {
		$this->db->select('*');
		$this->db->from('m_level');
		$this->db->where('account_id',$account_id);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
	
	// 직급 초기화 다시 입력
	function level_reset($order_code,$member_id,$account_id,$dep,$flgs,$regdate) {
		$dep = $dep + 1;
		$point = 1500;
		
		$query = array(
			'order_code' => $order_code,
			'member_id' => $member_id,
			'account_id' => $account_id,
			'dep' => $dep,
			'point' => $point,
			'kind' => $flgs,
			'is_stop' => '정상',
			'regdate' => $regdate
		);

		$this->db->insert('m_level', $query);
	}
	
/* ======================================================*/
/* 어카운트                                                */
/* ======================================================*/
	
	// 어카운트 등록 is_stop -> 탈퇴인지 아닌지 구분
	function account_in($order_code,$member_id,$dep,$flgs,$command) {
		$dep = $dep + 1;
		$point = 1500;
		
		$query = array(
			'order_code' => $order_code,
			'member_id' => $member_id,
			'account_id' => strtolower($this->input->post('account_id')),
			'sponsor_id' => strtolower($this->input->post('sponsor_id')),
			'dep' => $dep,
			'point' => $point,
			'state' => $flgs,
			'command' => $command,
			'level' => '회원',
			'is_stop' => '정상',
		);

		$this->db->set('regdate', 'now()', FALSE);
		$this->db->insert('m_account', $query);
	}
	
	
	// 어카운트 수정
	function account_update($id) {
		
		if($this->input->post('is_stop') == '탈퇴') {
			$stop_date = nowdate();
		} else {
			$stop_date = 0;
		}		

		$query = array(
			'is_stop' => $this->session->userdata('is_stop'),
			'state' => $this->input->post('state'),
			'regdate' => $this->input->post('regdate'),
			'stopdate' => $stop_date,
		);
		
		$this->db->where('account_id', $id);
		$this->db->update('m_account', $query);
	}
	
	function account_sync($id,$sync,$msg=NULL) {		
		
		// 메세지 없다면
		if ($msg == NULL) {
			$msg = '';
		}
		
		$query = array(
			'sync' => $sync,
			'msg' => $msg
		);

		$this->db->where('account_id', $id);
		$this->db->update('m_account', $query);
	}
	
	// 외상값 차감 - 직급에 대해서만 차감
	function account_loan($account_id,$loan) {		
		
		$query = array(
			'last' => $loan
		);

		$this->db->where('account_id',$account_id);
		$this->db->update('m_account', $query);
	}
	
	// 외상회원 리스트
	function get_account_state() {
		$this->db->select('*');
		$this->db->from('m_account');
		$this->db->where('state','외상');
		$this->db->order_by("regdate", "desc");
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	// 회원아이디로 개별 어카운트 리스트
	function get_account_li($id) {
		$this->db->select('*');
		$this->db->from('m_account');
		$this->db->where('member_id',$id);
		$this->db->order_by("regdate", "desc");
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	
	// 계정 정보 가져오기 (idx)
	function get_account_no($id) {
		$this->db->select('*');
		$this->db->from('m_account');
		$this->db->where('account_no',$id);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
	
	// 어카운트 아이디로 개별 어카운트 정보 가져오기
	function get_account_mb($member_id) {
		$this->db->select('*');
		$this->db->from('m_account');
		$this->db->where('member_id',$member_id);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
	
	// 어카운트 아이디로 개별 어카운트 정보 가져오기
	function get_account($account_id) {
		$this->db->select('*');
		$this->db->from('m_account');
		$this->db->where('account_id',$account_id);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
	
	// 어카운트 아이디로 개별 어카운트 정보 가져오기
	function get_account_fild($account_id) {
		$this->db->select('member_id');
		$this->db->from('m_account');
		$this->db->where('account_id',$account_id);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
		
	
	// 어카운트 등록 여부 확인
	function get_account_chk($id) {
		$this->db->select('*');
		$this->db->from('m_account');
		$this->db->where('member_id',$id);
		$query = $this->db->get();
		$item = $query->num_rows();
		return $item;
	}
	
	// 후원인 깊이 정보
	function get_account_dep($account_id) {
		$this->db->select('dep');
		$this->db->from('m_account');
		$this->db->where('account_id',$account_id);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}

	// 마지막 등록자
	function get_account_last() {
		$this->db->select('account_id');
		$this->db->from('m_account');
		$this->db->order_by("account_id", "desc");
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}

	// 개별 어카운트 마지막 구매 정보 가져오기 (일반용)
	function get_member_account_last($id,$regdate=NULL) {
		
		$this->db->select('*');
		$this->db->from('m_account');
		$this->db->where('member_id',$id);
		$this->db->order_by("regdate", "desc");
		
		// 등록일 값이 있다면
		if ($regdate) {
			$this->db->where('regdate <= ',$regdate);
		}
		
		$query = $this->db->get();
		$item = $query->row();
           
        return $item;
	}
	
	
	// 텔링 리스트
	function telring_li($id) {
		$this->db->select('m_member.mobile, m_member.name, m_account.account_id, m_account.sponsor_id');
		$this->db->from('m_account');
		$this->db->join('m_member', 'm_account.member_id = m_member.member_id', 'left');
		$this->db->where('m_account.sponsor_id',$id);
		$this->db->order_by("m_account.regdate", "desc");
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	

	// 다운라인 카운트 - 후원산하 2명인지 체크
	function account_down_count($id) {
		$this->db->select('*');
		$this->db->from('m_account');
		$this->db->where('sponsor_id',$id);
		$query = $this->db->get();
		$item = $query->num_rows(); // 결과 갯수리턴
		return $item;
	}
	
	// 계정 전체리스트
	function get_account_all() {
		$this->db->select('*');
		$this->db->from('m_account');
		$this->db->order_by("account_no", "asc");
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	// 계정 직급별 가져오기
	function get_account_level($level) {
		$this->db->select('*');
		$this->db->from('m_account');
		$this->db->where('level',$level);
		$this->db->order_by("account_no", "asc");
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}

/* ======================================================*/
/*                  히스토리                             */
/* ======================================================*/

	// 개별 계정 히스토리 가져오기
	function get_account_his($id) {
		$this->db->select('*');
		$this->db->from('m_account');
		$this->db->where('member_id',$id);
		$this->db->order_by("regdate", "desc");
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	// 코인 히스토리 가져오기
	function get_coin_his($id) {
		$this->db->select('*');
		$this->db->from('m_coin');
		$this->db->where('member_id',$id);
        $this->db->where('event_id !=','kcp1'); // 기부적립금은 안보여준다.
        $this->db->or_where('event_id',$id); 
		$this->db->order_by("regdate", "desc");
		$this->db->limit(50);
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}	
	
	// 받은 코인 히스토리 가져오기
	function get_coin_receive_his($id) {
		$this->db->select('*');
		$this->db->from('m_coin');
        $this->db->where('event_id',$id); 
		$this->db->order_by("regdate", "desc");
		$this->db->limit(50);
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	// 보낸 코인 히스토리 가져오기
	function get_coin_send_his($id) {
		$this->db->select('*');
		$this->db->from('m_coin');
		$this->db->where('member_id',$id);
        $this->db->where('event_id !=','kcp1'); // 기부적립금은 안보여준다.
		$this->db->order_by("regdate", "desc");
		$this->db->limit(50);
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}

	// 수당 히스토리 가져오기
	function get_su_his($id) {
		$this->db->select('*');
		$this->db->from('m_point');
		$this->db->where('member_id',$id);
		$this->db->where('cate','su');
		//$this->db->where('type !=','hidden');
		$this->db->order_by("regdate", "desc");
		$this->db->limit(50);
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	

	// 환전 히스토리 가져오기
	function get_exchange_his($id) {
		$this->db->select('*');
		$this->db->from('m_point');
		$this->db->where('member_id',$id);
		$this->db->where('cate','out');
		//$this->db->where('type !=','hidden');
		$this->db->order_by("regdate", "desc");
		$this->db->limit(50);
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	// 입금통보 히스토리 가져오기
	function get_bank_his($id) {
		$this->db->select('*');
		$this->db->from('m_bank');
		$this->db->where('member_id',$id);
		$this->db->order_by("reg_date", "desc");
		$this->db->limit(30);
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	

/* ======================================================*/
/*                   볼륨 관련                             */
/* ======================================================*/


	// 볼륨 등록
	function vlm_in($order_code,$member_id,$event_id,$side,$count,$point,$regdate=NULL) {
		
		// 등록일 값이 없다면
		if ($regdate == NULL) {
			$regdate = nowdate();
		}
		
		$query = array(
			'order_code' => $order_code,
			'member_id' => $member_id,
			'event_id' => $event_id,
			'side' => $side,
			'is_off' => $count,
			'point' => $point,
			'regdate' => $regdate
		);
		$this->db->insert('m_volume', $query);
	}
	
	function vlm_lv_up($no,$level) {
		
		$query = array(
			'level' => $level
		);

		$this->db->where('vlm_no',$no);
		$this->db->update('m_volume', $query);
	}
	
	
	// 어카운트 좌우 확인 하기
	function get_side($target,$id) {
		$this->db->select('*');
		$this->db->from('m_account');
		$this->db->where('sponsor_id',$target);
		$this->db->order_by("account_no", "asc");
		$query = $this->db->get();
		$item = $query->result();
		
		$count = 0;
		$side = 0;
		
		foreach ($item as $row) {
		
			$count = $count + 1;
		
			if ($row->account_id == $id) {
			
				$side = $count;
			}
		}
		
		return $side;
	}

	// 볼륨 좌우 숫자 가져오기
	function get_vlm_row($id) {
		
		$this->db->select('*');
		$this->db->from('m_volume');
		$this->db->where('member_id',$id);
		$query = $this->db->get();
		$item = $query->result();

		$vlm_left = 0;
		$vlm_right = 0;

		foreach ($item as $row) {
		
			if ($row->side == 'left') {
				$vlm_left += 1;
			}

			if ($row->side == 'right') {
				$vlm_right += 1;
			}
		}
		
		if($vlm_left == ""){
			$vlm_left = 0;			
		}
		if($vlm_right == ""){
			$vlm_right = 0;			
		}
		
		$vlm = array();
		$vlm['vlm_left'] = $vlm_left;
		$vlm['vlm_right'] = $vlm_right;
		
		return $vlm;

	}
	
	// 볼륨 좌우 숫자 가져오기
	function get_vlm_level($id,$level) {
		
		$this->db->select('*');
		$this->db->from('m_volume');
		$this->db->where('member_id',$id);
		$this->db->where('level',$level);
		$query = $this->db->get();
		$item = $query->result();

		$vlm_left = 0;
		$vlm_right = 0;

		foreach ($item as $row) {
		
			if ($row->side == 'left') {
				$vlm_left += 1;
			}

			if ($row->side == 'right') {
				$vlm_right += 1;
			}
		}
		
		if($vlm_left == ""){
			$vlm_left = 0;			
		}
		if($vlm_right == ""){
			$vlm_right = 0;			
		}
		
		$vlm = array();
		$vlm['vlm_left'] = $vlm_left;
		$vlm['vlm_right'] = $vlm_right;
		
		return $vlm;

	}

	
	
	// 나의 볼륨 가져오기
	function get_vlm_my($id) {
		$this->db->select('*');
		$this->db->from('m_volume');
		$this->db->where('member_id',$id);
		$this->db->order_by("vlm_no", "asc");
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	// 이벤트아이디로 볼륨가져오기
	function get_vlm_event($id) {
		$this->db->select('vlm_no,event_id');
		$this->db->from('m_volume');
		$this->db->where('event_id',$id);
		$this->db->order_by("vlm_no", "asc");
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	
	//해당 뎁스에 몇몇이 있는지 확인
	function get_line_left($id,$event_id) {
		
		$get_account = $this->m_member->get_member($event_id);
		$dep = $get_account->dep;
		
		$this->db->select('*');
		$this->db->from('m_volume');
		$this->db->join('m_member', 'm_volume.event_id = m_member.member_id', 'first');
		$this->db->where('m_volume.member_id',$id);
		$this->db->where('m_volume.side','left');
		$this->db->order_by("vlm_no", "asc");
		$query = $this->db->get();
		$item = $query->num_rows();
		
		return $item;
	}
	
	
	//해당 뎁스에 몇몇이 있는지 확인
	function get_line_right($id,$event_id) {
		
		$get_account = $this->m_member->get_member($event_id);
		$dep = $get_account->dep;
		
		$this->db->select('*');
		$this->db->from('m_volume');
		$this->db->join('m_member', 'm_volume.event_id = m_member.member_id', 'second');
		$this->db->where('m_volume.member_id',$id);
		$this->db->where('m_volume.side','right');
		$this->db->order_by("vlm_no", "asc");
		$query = $this->db->get();
		echo $this->db->last_query().'<br>';
		$item = $query->num_rows();
		return $item;
	}
	
	
	
	//매출이 좌우측 어디에서 올라온지 확인
	function get_side_pay($member_id,$in_user){
		$this->db->select('*');
		$this->db->from('m_volume');
		$this->db->where('member_id',$member_id);
		$this->db->where('event_id',$in_user);
		$this->db->where('point >',0);	
		$this->db->order_by("vlm_no", "desc");
		$query = $this->db->get();
		$item = $query->row();
		
		return $item->side;
		
	}

	
}
?>
