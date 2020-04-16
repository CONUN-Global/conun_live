<?php
class M_point extends CI_Model {
	/*
		
		 payment : 수당
		 system : 인베스트등
		 exchang : 환전
	*/ 
	function __construct()
	{
		parent::__construct();
	}
	
	// 전체 수당리스트
	function get_point_li() {
		$this->db->select('*');
		$this->db->from('m_point');
		$this->db->order_by('point_no','asc');
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	// 분류 리스트
	function get_point_li_cat($id,$cate) {
		$this->db->select('*');
		$this->db->from('m_point');
		$this->db->where('member_id',$id);
		$this->db->where('cate',$cate);
		$this->db->order_by('point_no','asc');
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	
	// 분류 리스트
	function get_point_li_kind($id,$kind) {
		$this->db->select('*');
		$this->db->from('m_point');
		$this->db->where('member_id',$id);
		$this->db->where('kind',$kind);
		$this->db->order_by('point_no','asc');
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	function get_point_ac_kind($id,$kind) {
		$this->db->select('*');
		$this->db->from('m_point');
		$this->db->where('account_id',$id);
		$this->db->where('kind',$kind);
		$this->db->order_by('point_no','asc');
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	// 포인트 가져오기 (IDX)
	function get_point_no($id) {
		$this->db->select('*');
		$this->db->from('m_point');
		$this->db->where('point_no',$id);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
	
	
	// 잔여 포인트 가져오기 - 입금 + 수당 - 매출등록 + 트랜스 + 환전
	function get_point($id,$type=NULL) {
		$this->db->select('*');
		$this->db->from('m_point');
		$this->db->where('account_id',$id);
		
        if ($type) {
			$this->db->where('type',$type);
        }
        
		$query = $this->db->get();
		$list = $query->result();

		$su_point = 0;
		$out_point = 0;
		$item = 0;
		foreach ($list as $row) {
			
			// 입금 할 경우
			if ($row->cate == 'in') {
				$su_point = $su_point + $row->point;
			}
			
			
			// 수당 발생 할 경우 - 외상값 및 쇼핑포인트 제외하기
			if ($row->cate == 'out') {
				$out_point = $out_point + $row->point;
			}


			$item = $su_point - $out_point;
		}
		//echo "$item = $su_point - $out_point";

		 $item = round($item,3);
		 
		
		return $item;
	}
	
/* =================================================================
* 입력기록 -> 매출/수당/트랜스퍼/출금 등등
================================================================= */

	function point_ck($idx,$point,$fee,$saved_point) {
		
		$query = array(
			'point' => $point,
			'fee' => $fee,
			'saved_point' => $saved_point
		);

		$this->db->where('point_no',$idx);
		$this->db->update('m_point', $query);
	}
	
	// 수당 처리 기록
	function point_su($order_code,$member_id,$event_id,$points,$loan,$kind,$msg=NULL,$type=NULL,$regdate=NULL,$flgs=NULL,$saved_point=NULL) 
	{
		$CI =& get_instance();
		
		// 회원정보로 은행정보를 넣어준다.
		$mb = $CI->m_member->get_member($member_id);
		$ev = $CI->m_member->get_member($event_id);
		
		
		$org_point 		= $points; 	// 지급 포인트	
		$fee 			= $loan;	// 수수료 -> 외상값	
		if ($saved_point == NULL) {
			$saved_point = 0; 	// save 적립
		}
		
		$cate = "su";
		$type = "payment";
		
		if ($regdate == NULL) {
			$regdate = nowdate();
		}
		
		// 메세지 없다면
		if ($msg == NULL) {
			$msg = '';
		}
		
		// 정상/외상/인정 - 매출구분
		if ($flgs == NULL) {
			$flgs = 0;
		}
		
		$query = array(
			'order_code' 	=> $order_code,
			'account_id' 	=> $mb->coin_id,
			'member_id' 	=> $member_id,
			'member_addr' 	=> $mb->coin_addr,
			'event_id' 		=> $event_id,
			'event_addr' 	=> $ev->coin_addr,
			'point' 		=> $org_point,
			'fee' 			=> $fee,
			'saved_point' 	=> $saved_point,
			'cate' 		=> $cate,
			'kind' 		=> $kind,
			'type' 		=> $type,
			'flgs' 		=> $flgs,	
			'regdate' 	=> $regdate,
			'msg' 		=> $msg,		
		);
		$this->db->insert('m_point', $query);
	
	}
	
	
	// 매출등록 - 입금확인 후 충전
	function point_in($order_code,$member_id,$event_id,$points,$kind,$regdate=NULL,$flgs=NULL,$msg=NULL)
	{		
		$CI =& get_instance();
		
		// 회원정보로 은행정보를 넣어준다.
		$mb = $CI->m_member->get_member($member_id);
		$ev = $CI->m_member->get_member($event_id);
		
		$org_point 		= $points; 	// 지급 포인트	
		$fee 			= 0; // fee
		$saved_point 	= 0; // save
		
		$cate = "in";
		$type = "complete";
		
		if ($regdate == NULL) {
			$regdate = nowdate();
		}
		
		// 메세지 없다면
		if ($msg == NULL) {
			$msg = '';
		}
		
		// 정상/외상/인정 - 매출구분
		if ($flgs == NULL) {
			$flgs = 0;
		}
		
		$query = array(
			'order_code' 	=> $order_code,
			'account_id' 	=> $mb->coin_id,
			'member_id' 	=> $member_id,
			'member_addr' 	=> $mb->coin_addr,
			'event_id' 		=> $event_id,
			'event_addr' 	=> $ev->coin_addr,
			'point' 		=> $org_point,
			'fee' 			=> $fee,
			'saved_point' 	=> $saved_point,
			'cate' 		=> $cate,
			'kind' 		=> $kind,
			'type' 		=> $type,
			'flgs' 		=> $flgs,	
			'regdate' 	=> $regdate,
			'msg' 		=> $msg
		);

		if ($points != 0) {
			$this->db->insert('m_point', $query);
		}
	
	}
	
	
	// 포인트 출금
	function point_out($order_code,$member_id,$event_id,$points,$kind,$regdate=NULL,$flgs=NULL,$msg=NULL)
	{
		$CI =& get_instance();
		$mb = $CI->m_member->get_member($member_id);
		$ev = $CI->m_member->get_member($event_id);
		
		
		$org_point 		= $points; 	// 지급 포인트	
		$fee 			= 0; // fee
		$saved_point 	= 0; // save
		
		$cate = "out";
		$type = "complete";
		
		if ($regdate == NULL) {
			$regdate = nowdate();
		}		
		// 메세지 없다면
		if ($msg == NULL) {
			$msg = '';
		}
		// 정상/외상/인정 - 매출구분
		if ($flgs == NULL) {
			$flgs = 0;
		}
		
		$query = array(
			'order_code' 	=> $order_code,
			'account_id' 	=> $mb->coin_id,
			'member_id' 	=> $member_id,
			'member_addr' 	=> $mb->coin_addr,
			'event_id' 		=> $event_id,
			'event_addr' 	=> $ev->coin_addr,
			'point' 		=> $org_point,
			'fee' 			=> $fee,
			'saved_point' 	=> $saved_point,
			'cate' 		=> $cate,
			'kind' 		=> $kind,
			'type' 		=> $type,
			'flgs' 		=> $flgs,	
			'regdate' 	=> $regdate,
			'msg' 		=> $msg
		);

		if ($points != 0) {
			$this->db->insert('m_point', $query);
		}

	}
	
	
	// 포인트 환전
	function point_exchange($order_code,$member_id,$event_id,$points,$regdate=NULL,$flgs=NULL,$msg=NULL)
	{
		$CI =& get_instance();
		
		// 회원정보로 은행정보를 넣어준다.
		$mb = $CI->m_member->get_member($member_id);
		$ev = $CI->m_member->get_member($event_id);
		
		$org_point 		= $points; 	// 지급 포인트	
		$fee 			= $points * 0.05;
		$saved_point 	= $points - $fee;
		
		$cate = "out";
		$kind = "exchange";
		$type = "hold";
		
		if ($regdate == NULL) {
			$regdate = nowdate();
		}		
		// 메세지 없다면
		if ($msg == NULL) {
			$msg = '송금 대기중';
		}
		// 정상/외상/인정 - 매출구분
		if ($flgs == NULL) {
			$flgs = 0;
		}
		
		
		$query = array(
			'order_code' 	=> $order_code,
			'account_id' 	=> $mb->coin_id,
			'member_id' 	=> $member_id,
			'member_addr' 	=> $mb->coin_addr,
			'event_id' 		=> $event_id,
			'event_addr' 	=> $ev->coin_addr,
			'point' 		=> $org_point,
			'fee' 			=> $fee,
			'saved_point' 	=> $saved_point,
			'cate' 			=> $cate,
			'kind' 			=> $kind,
			'type' 			=> $type,
			'flgs' 			=> $flgs,	
			'regdate' 		=> $regdate,
			'bank_name' 	=> $mb->bank_name,
			'bank_num' 		=> $mb->bank_number,
			'bank_holder' 	=> $mb->bank_holder,
			'msg' 			=> $msg			
		);

		$this->db->insert('m_point', $query);

	}
	
	
	// 트랜스퍼 - 코인보내는 사람정보 저장
	function point_trans($order_code,$member_id,$event_id,$points,$kind,$msg=NULL) 
	{
		$CI =& get_instance();
		
		// 회원정보로 은행정보를 넣어준다.
		$mb = $CI->m_member->get_member($member_id);
		$ev = $CI->m_member->get_member($event_id);
		
		
		$org_point 		= $points; 	// 지급 포인트	
		$fee 			= 0; // fee
		$saved_point 	= 0; // save
		
		$cate = "out";
		$kind = "trade";
		$type = "complete";
		
		if ($regdate == NULL) {
			$regdate = nowdate();
		}		
		// 메세지 없다면
		if ($msg == NULL) {
			$msg = '송금 대기중';
		}
		// 정상/외상/인정 - 매출구분
		if ($flgs == NULL) {
			$flgs = 0;
		}
		
		$query = array(
			'order_code' 	=> $order_code,
			'account_id' 	=> $mb->coin_id,
			'member_id' 	=> $member_id,
			'member_addr' 	=> $mb->coin_addr,
			'event_id' 		=> $event_id,
			'event_addr' 	=> $ev->coin_addr,
			'point' 		=> $org_point,
			'fee' 			=> $fee,
			'saved_point' 	=> $saved_point,
			'cate' 			=> $cate,
			'kind' 			=> $kind,
			'type' 			=> $type,
			'flgs' 			=> $flgs,	
			'regdate' 		=> $regdate,
			'msg' 			=> $msg	
		);

		if ($points != 0) {
			$this->db->insert('m_point', $query);
		}

	}
	
/* =================================================================
* 수정기록 -> 매출/수당/트랜스퍼/출금 등등
================================================================= */

	function point_up($no) 
	{		
		$query = array(
			'order_code' 	=> $this->input->post('order_code'),
			'member_id' 	=> $this->input->post('member_id'),
			'event_id' 		=> $this->input->post('event_id'),
			'type' 			=> $this->input->post('type'),
			'kind' 			=> $this->input->post('kind'),
			'point' 		=> $this->input->post('point'),
			'fee' 			=> $this->input->post('fee'),
			'saved_point' 	=> $this->input->post('saved_point'),
			'regdate' 		=> $this->input->post('regdate'),
			'msg' 			=> $this->input->post('msg')
		);
		$this->db->where('point_no', $no);
		$this->db->update('m_point', $query);
	
	}
	
/* =================================================================
* 수당정보
================================================================= */
	
	// 최근 매출을 기준으로 그동안 받아간 전체 수당 가져오기 (조회용?)
	function get_su($id,$kind=NULL,$regdate=NULL) {
		$this->db->select('*');
		$this->db->from('m_point');
		$this->db->where('member_id',$id);
		$this->db->where('cate','su');	
		
        // 수당구분이 존재 한다면
		if ($kind) {
        	$this->db->where('kind',$kind);
		}
		
		// 날짜 정보가 존재 한다면
		if ($regdate) {
			$this->db->where('regdate >= ',$regdate);
		}
		
		$query = $this->db->get();
		$list = $query->result();

		$point = 0;
		foreach ($list as $row) {
			$point = $point + $row->point;
			$point = $point - $row->fee;
		}

		$point = round($point,3);
		return $point;
	}
	
	
	// 누적 포인트 (적립금 제외) -> 특정 수당 제외
	function get_su_out($id,$kind=NULL,$regdate=NULL) {
		$this->db->select('*');
		$this->db->from('m_point');
		$this->db->where('member_id',$id);
		$this->db->where('cate','su');
		
        // 수당구분이 존재 한다면
		if ($kind) {
			$this->db->where('kind !=',$kind);
		}
		
		// 날짜 정보가 존재 한다면
		if ($regdate) {
			$this->db->where('regdate >= ',$regdate);
		}
		
		$query = $this->db->get();
		$list = $query->result();

		$point = 0;
		foreach ($list as $row) {
			$point = $point + $row->point;
			$point = $point - $row->fee;
		}

		$point = round($point,3);
		return $point;
    }
    
	// 계정 총수당
	function get_su_account($id) {
		$this->db->select('*');
		$this->db->from('m_point');
		$this->db->where('account_id',$id);
		$this->db->where('type','payment');
		$query = $this->db->get();
		$list = $query->result();

		$point = 0;
		foreach ($list as $row) {
			$point = $point + $row->point;
			$point = $point + $row->saved_point;
		}

		$point = round($point,3);
		return $point;
	}


/* =================================================================
* 매출,입금
================================================================= */
	
	// 총 나의 투자금 (인베스트)
    function total_invest($id) {
        $this->db->select('*');
        $this->db->from('m_point');
        $this->db->where('member_id',$id);
		$this->db->where('cate','in');
        $query = $this->db->get();
        $list = $query->result();
 
        $point = 0;
        foreach ($list as $row) {
            $point = $point + $row->amount;
        }
        
		$point = round($point,3);
        return $point;
    }
    
    
	// 입금통보
	function bank($order_code,$member_id){
		
		$coin = $this->input->post('amount') / 100;
		$kind = 0;
		
		$query = array(
			'order_code' => $order_code,
			'member_id' => $member_id,
			'coin' => $coin,
			'amount' => $this->input->post('amount'),
			'bank_holder' => $this->input->post('bank_holder'),
			'bank_name' => $this->input->post('bank_name'),
			'bank_number' => $this->input->post('bank_number'),
			'kind' => $kind,
			'regdate' => nowdate()
		);

		$this->db->insert('m_bank', $query);

	}
	
	
	
/* =================================================================
* 포인트 관련 합계
================================================================= */

	//총 매출건
	function get_total_in() {
		$this->db->select('sum(point) as point');
		$this->db->from('m_point');
		$this->db->where('cate','in');
		$query = $this->db->get();
		$item = $query->row();
		return $item->point;
	}

	//총 수당 건
	function get_total_su() {
		$this->db->select('sum(point) as point');
		$this->db->from('m_point');
		$this->db->where('cate','su');
		$query = $this->db->get();
		$item = $query->row();
		return $item->point;
	}
	
	//총 지출 건
	function get_total_out() {
		$this->db->select('sum(point) as point');
		$this->db->from('m_point');
		$this->db->where('cate','out');
		$query = $this->db->get();
		$item = $query->row();
		return $item->point;
	}
	
	// 총 환전 금액
	function get_total_exchange() {
		$this->db->select('sum(point) as point');
		$this->db->from('m_point');
		$this->db->where('type','exchange');
		$this->db->where('cate','out');
		$query = $this->db->get();
		$item = $query->row();
		return $item->point;
	}
	
	//총 지출 건
	function get_total_trans() {
		$this->db->select('sum(point) as point');
		$this->db->from('m_point');
		$this->db->where('cate','trans');
		$query = $this->db->get();
		$item = $query->row();
		return $item->point;
	}
	
	
    // 날짜별 수당정보 curdate() : 현재날짜
	function get_point_date($cate,$date,$kind=NULL) {
		$this->db->select('sum(point) as point');
        $this->db->from('m_point');
        $this->db->where('cate',$cate);
        $this->db->where('type','payment');
        
        if ($kind) {
        	$this->db->where('kind',$kind);
        }

        if ($date == 'yesterday') {
        	$this->db->where('regdate','date_sub(curdate(), interval 1 day)',FALSE); // date_add->날짜 더하기, date_sub->날짜빼기
		}
		else if ($date == 'today') {
        	$this->db->where('regdate >=','curdate()',FALSE);
		}
		
		$query = $this->db->get();
		$item = $query->row();
		return $item->point;
    }

	
/* =================================================================
* 시스템 포인트
================================================================= */
	
	// 시스템 포인트 처리
	function point_move($member_id,$order_code,$event_id,$cate,$kind,$type,$point,$regdate=NULL,$msg=NULL) {
		
	
		// 등록일 값이 없다면
		if ($regdate == NULL) {
			$regdate = nowdate();
		}
		
		
		// 메세지 없다면
		if ($msg == NULL) {
			$msg = '';
		}

		$query = array(
			'order_code' => $order_code,
			'member_id' => $member_id,
			'event_id' => $event_id,
			'cate' => $cate,
			'type' => $type,
			'point' => $point,
			'kind' => $kind,
			'regdate' => $regdate,
			'appdate' => $regdate,
			'msg' => $msg,
		);
		
		$this->db->insert('m_point', $query);
	}
	
}
?>