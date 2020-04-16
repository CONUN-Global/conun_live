<?php
class M_ico extends CI_Model {
	/*
		
		 payment : 수당
		 system : 인베스트등
		 exchang : 환전
	*/ 
	function M_point()
	{
		parent::__construct();
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
	
	
	// 분류에 따라 값 추출
	function get_point_cate($id,$cate=NULL) {
		$this->db->select('*');
		$this->db->from('m_point');
		$this->db->where('member_id',$id);
        if ($cate) {
			$this->db->where('cate',$cate);
        }
		$query = $this->db->get();
		$list = $query->result();
		return $list;
	}
	
	// 총 환전 값 - 수수료 및 실 지급금 제외
	function get_point_exchange($id) {
		$this->db->select('point');
		$this->db->from('m_point');
		$this->db->where('member_id',$id);
		$this->db->where('kind','exchange');
		$query = $this->db->get();
		$list = $query->result();
		
		$item = 0;
		foreach ($list as $row) {			
			$item = $item + $row->point;
		}
		$item = round($item,3);
		
		return $item;
	}
	
	// 쇼핑포인트
	function get_point_shop($id,$type=NULL) {
		$this->db->select('saved_point');
		$this->db->from('m_point');
		$this->db->where('member_id',$id);
		$this->db->where('cate','su');
		$query = $this->db->get();
		$list = $query->result();
		
		$item = 0;
		foreach ($list as $row) {			
			$item = $item + $row->saved_point;
		}
		$item = round($item,3);
		
		return $item;
	}
	
/* =================================================================
* 입력기록 -> 매출/수당/트랜스퍼/출금 등등
================================================================= */

	// 수당 처리 기록 - 계정아이디 넣어주기
	function point_su($order_code,$member_id,$event_id,$points,$loan,$kind,$msg=NULL,$type=NULL,$regdate=NULL,$account_id=NULL,$saved_point=NULL) 
	{
		$org_point 		= $points; 				// 지급 포인트	
		$fee 			= $loan;				// 수수료 -> 외상값	
		
		if ($saved_point == NULL) {			
			$saved_point = $org_point * 0.1; 	// save 적립
		}		
		
		if ($regdate == NULL) {
			$regdate = nowdate();
		}
		
		// 메세지 없다면
		if ($msg == NULL) {
			$msg = '';
		}
		
		if ($account_id == NULL) {
			$account_id = '';
		}
		
		// 지급여부
		if ($type == NULL) {
			$type = "payment";
		}
		
		$cate = "su";
		
		
		$query = array(
			'order_code' => $order_code,
			'member_id' => $member_id,
			'account_id' => $account_id,
			'event_id' => $event_id,
			'type' => $type,
			'cate' => $cate,
			'kind' => $kind,
			
			'point' => $org_point,
			'fee' => $fee,
			'saved_point' => $saved_point,
			
			'regdate' => $regdate,
			'appdate' => $regdate,
			'msg' => $msg,
		);
		$this->db->insert('m_point', $query);
	
	}
	
	// 매출등록 - 입금확인 후 충전
	function point_in($order_code,$member_id,$code_id,$member_addr,$event_addr,$points,$saved_point,$fee,$shop_point,$flgs,$msg=NULL) 
	{
				
		$cate = "in";
		//$type = "Complete";
		$type = "Request";
		$regdate = nowdate();
		
		// 메세지 없다면
		if ($msg == NULL) {
			$msg = '';
		}
		
		
		$query = array(
			'order_code' => $order_code,
			'member_id' => $member_id,
			'account_id' => $code_id,
			'member_addr' => $member_addr,
			'event_id' => 'admin',
			'event_addr' => $event_addr,
			'type' => $type,
			'cate' => $cate,
			
			'point' => $points,
			'fee' => $fee,
			'saved_point' => $saved_point,
			'shop_point' => $shop_point,
			'flgs' => $flgs,			
			'regdate' => $regdate,
			'msg' => $msg,
		);

		//if ($points != 0) {
			$this->db->insert('m_point', $query);
		//}
	
	}
	
	// 트랜스퍼 - 코인보내는 사람정보 저장
	function point_trans($order_code,$member_id,$member_addr,$event_id,$event_addr,$points,$kind,$msg=NULL) 
	{
		$fee = $points * 0; // fee
		$save_point = $points - $fee; // save
		
		$cate = $kind;
		$type = "complete";
		$regdate = nowdate();
		
		// 메세지 없다면
		if ($msg == NULL) {
			$msg = '';
		}
		
		$query = array(
			'order_code' => $order_code,
			'member_id' => $member_id,
			'account_id' => $member_id,
			'member_addr' => $member_addr,
			'event_id' => $event_id,
			'event_addr' => $event_addr,
			
			'type' => $type,
			'kind' => 'sale',
			'cate' => $cate,
			
			'point' => $points,
			'fee' => $fee,
			'saved_point' => $save_point,
			
			'regdate' => $regdate,
			'msg' => $msg,
		);

		if ($points != 0) {
			$this->db->insert('m_point', $query);
		}

	}
	
	// 포인트 출금
	function point_out($order_code,$member_id,$event_id,$points,$kind,$msg=NULL) 
	{
		$fee = $points * 0; // fee
		$save_point = $points * 0; // save
		
		$cate = "out";
		$type = "complete";
		$regdate = nowdate();
		
		// 메세지 없다면
		if ($msg == NULL) {
			$msg = '';
		}
		
		$query = array(
			'order_code' => $order_code,
			'member_id' => $member_id,
			'event_id' => $event_id,
			'type' => $type,
			'kind' => $kind,
			'cate' => $cate,
			
			'point' => $points,
			'fee' => $fee,
			'saved_point' => $save_point,
			
			'regdate' => $regdate,
			'msg' => $msg,
		);

		if ($points != 0) {
			$this->db->insert('m_point', $query);
		}

	}
	
	// 포인트 환전
	function point_exchange($order_code,$member_id,$member_addr,$send_id,$send_addr,$amount,$msg=NULL)
	{
		// 5% 수수료
		$fee = $amount * 0.05; // fee
		$save_point = $amount - $fee; // save
		
		$cate = "out";
		$type = "hold";
		$regdate = nowdate();
		
		// 메세지 없다면
		if ($msg == NULL) {
			$msg = '';
		}		
		
		$query = array(
			'order_code' => $order_code,
			'member_id' => $member_id,
			'member_addr' => $member_addr,
			'event_id' => $send_id,
			'event_addr' => $send_addr,
			'cate' => $cate,
			'type' => $type,
			'kind' => 'exchange',
			
			'point' => $amount,
			'saved_point' => $save_point,
			'fee' => $fee,
			
			'regdate' => nowdate(),
			'appdate' => nowdate(),
			'msg' => '송금 대기중'				
		);

		$this->db->insert('m_point', $query);

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
	function get_point_date($date,$type) {
		$this->db->select('sum(point) as point');
        $this->db->from('m_point');
        $this->db->where('type',$type);

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

	
	function get_point_his($id) {
		$this->db->select('*');
		$this->db->from('m_point');
		$this->db->where('cate','in');
		$this->db->where('member_id',$id);
		$this->db->order_by("regdate", "desc");
		$query = $this->db->get();
		$item = $query->result();
		return $item;
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