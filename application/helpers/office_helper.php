<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 불륨 및 직급 처리
function vlm_tree($member_id,$account_id,$amount,$order_code,$regdate=NULL)
{
	$CI =& get_instance();
		
	// 등록일 값이 없다면
	if ($regdate == NULL) {
		$regdate = nowdate();
	}
	
	
	$point= $amount;
		
	// 등록회원 계정아이디
	$gu = $CI->m_office->get_account($account_id);
	
	$i = 0;
	while ($gu->sponsor_id) {
			
		$i += 1;
		$side = $CI->m_office->get_side($gu->sponsor_id,$gu->account_id); // 나는 스폰서의 좌우 어디에 있나?

		if ($side  == 1) {
			$side = 'left';
		}
		else if ($side  == 2 ) {
			$side = 'right';
		}

		//DB 입력
		$CI->m_office->vlm_in($order_code,$gu->sponsor_id,$account_id,$side,$i,$amount,$regdate);

		// 볼륨에서 후원인의 전체 좌우 숫자 파악 - 직급에 등록하기
		$vlm = $CI->m_office->get_vlm_row($gu->sponsor_id);
			$vlm_left = $vlm['vlm_left'];
			$vlm_right = $vlm['vlm_right'];
		
		// 산하 2:2 이면
		// 특약점이 되면 볼륨에서 자신의 이벤트아이디 직급란에 특약점이라는 숫자증가를 해준다.
		$ck_left = floor($vlm_left/ 2);
		$ck_right = floor($vlm_right/ 2);
		if($ck_left > 0 and $ck_right > 0){
			
			$query = array(
				'lv1_regdate' => $regdate
			);
			$CI->db->where('account_id',$gu->sponsor_id);
			$CI->db->update('m_level', $query);
			
			$level_up = "특약점";				
			$query = array(
				'level' => $level_up
			);
			$CI->db->where('account_id',$gu->sponsor_id);
			$CI->db->update('m_account', $query);
			
			$level_mb = 4;
			// 회원의 레벨도 올려줌
			$spn = $CI->m_office->get_account_fild($gu->sponsor_id);
			$query = array(
				'level' => $level_mb
			);
			$CI->db->where('member_id',$spn->member_id);
			$CI->db->update('m_member', $query);
			
			$level_up = 1;
			$list = $CI->m_office->get_vlm_event($gu->sponsor_id);
			foreach ($list as $row) {
				if ($row->event_id == $gu->sponsor_id) {			
					$CI->m_office->vlm_lv_up($row->vlm_no,$level_up);
				}
			}
		}
		
		// 대리점 구하기
		$level = 1;
		$vlm = $CI->m_office->get_vlm_level($gu->sponsor_id,$level);
			$vlm_left = $vlm['vlm_left'];
			$vlm_right = $vlm['vlm_right'];
		
		// 산하 3:3 이면
		// 대리점이 되면 볼륨에서 자신의 이벤트아이디 직급란에 대리점이라는 숫자증가를 해준다.
		$ck_left = floor($vlm_left/ 3);
		$ck_right = floor($vlm_right/ 3);
		if($ck_left > 0 and $ck_right > 0){
			
			$query = array(
				'lv2_regdate' => $regdate
			);
			$CI->db->where('account_id',$gu->sponsor_id);
			$CI->db->update('m_level', $query);
			
			$level_up = "대리점";				
			$query = array(
				'level' => $level_up
			);
			$CI->db->where('account_id',$gu->sponsor_id);
			$CI->db->update('m_account', $query);
			
			$level_mb = 5;
			// 회원의 레벨도 올려줌
			$spn = $CI->m_office->get_account_fild($gu->sponsor_id);
			$query = array(
				'level' => $level_mb
			);
			$CI->db->where('member_id',$spn->member_id);
			$CI->db->update('m_member', $query);
			
			$level_up = 2;
			$list = $CI->m_office->get_vlm_event($gu->sponsor_id);
			foreach ($list as $row) {
				if ($row->event_id == $gu->sponsor_id) {			
					$CI->m_office->vlm_lv_up($row->vlm_no,$level_up);
				}
			}
			
		}
		
		// 총판 구하기
		$level = 2;
		$vlm = $CI->m_office->get_vlm_level($gu->sponsor_id,$level);
			$vlm_left = $vlm['vlm_left'];
			$vlm_right = $vlm['vlm_right'];
		
		// 산하 3:3 이면
		// 대리점이 되면 볼륨에서 자신의 이벤트아이디 직급란에 대리점이라는 숫자증가를 해준다.
		$ck_left = floor($vlm_left/ 4);
		$ck_right = floor($vlm_right/ 4);
		if($ck_left > 0 and $ck_right > 0){
			
			$query = array(
				'lv3_regdate' => $regdate
			);
			$CI->db->where('account_id',$gu->sponsor_id);
			$CI->db->update('m_level', $query);
			
			$level_up = "총판";				
			$query = array(
				'level' => $level_up
			);
			$CI->db->where('account_id',$gu->sponsor_id);
			$CI->db->update('m_account', $query);
			
			$level_mb = 6;
			// 회원의 레벨도 올려줌
			$spn = $CI->m_office->get_account_fild($gu->sponsor_id);
			$query = array(
				'level' => $level_mb
			);
			$CI->db->where('member_id',$spn->member_id);
			$CI->db->update('m_member', $query);
			
			$level_up = 3;
			$list = $CI->m_office->get_vlm_event($gu->sponsor_id);
			foreach ($list as $row) {
				if ($row->event_id == $gu->sponsor_id) {			
					$CI->m_office->vlm_lv_up($row->vlm_no,$level_up);
				}
			}
			
		}
		
		// 조합장 구하기
		$level = 3;
		$vlm = $CI->m_office->get_vlm_level($gu->sponsor_id,$level);
			$vlm_left = $vlm['vlm_left'];
			$vlm_right = $vlm['vlm_right'];
		
		// 산하 3:3 이면
		// 대리점이 되면 볼륨에서 자신의 이벤트아이디 직급란에 대리점이라는 숫자증가를 해준다.
		$ck_left = floor($vlm_left/ 5);
		$ck_right = floor($vlm_right/ 5);
		if($ck_left > 0 and $ck_right > 0){
			
			$query = array(
				'lv4_regdate' => $regdate
			);
			$CI->db->where('account_id',$gu->sponsor_id);
			$CI->db->update('m_level', $query);
			
			
			$level_up = "조합장";				
			$query = array(
				'level' => $level_up
			);
			$CI->db->where('account_id',$gu->sponsor_id);
			$CI->db->update('m_account', $query);
			
			$level_mb = 7;
			// 회원의 레벨도 올려줌
			$spn = $CI->m_office->get_account_fild($gu->sponsor_id);
			$query = array(
				'level' => $level_mb
			);
			$CI->db->where('member_id',$spn->member_id);
			$CI->db->update('m_member', $query);
			
			$level_up = 4;
			$list = $CI->m_office->get_vlm_event($gu->sponsor_id);
			foreach ($list as $row) {
				if ($row->event_id == $gu->sponsor_id) {			
					$CI->m_office->vlm_lv_up($row->vlm_no,$level_up);
				}
			}
			
		}
				
		
		// 상위 유저 찾기 (스폰서)
		$gu = $CI->m_office->get_account($gu->sponsor_id);
	}
	
	

}


// 불륨만 처리 - 회원테이블 기준 후원인처리
function set_volume($member_id,$order_code,$amount,$regdate=NULL){
		
	$CI =& get_instance();

	$get_member = $CI->m_member->get_member($member_id);

	while ($get_member->sponsor_id != '') {

		$side = $CI->m_office->get_side($get_member->sponsor_id,$get_member->member_id); // 나는 스폰서의 좌우 어디에 있나?
			

		if ($side == '1') {
			$point= $amount;
			$side = 'left';
		}

		if ($side == '2' ) {
			$side = 'right';
			$point = $amount;
		}

		//DB 입력
		$CI->m_office->vlm_in($order_code,$get_member->sponsor_id,$member_id,$side,$amount,$regdate);

		// 상위 유저 찾기 (스폰서)
		$get_member = $CI->m_member->get_member($get_member->sponsor_id);
		
	}

}


function set_donation($order_code,$member_id,$do_amount,$do_mb,$msg)
{
	$CI =& get_instance();
	
	$total_amount = 0;
	$i = 0;
		
	for($i=1; $i<=8; $i++)
	{		
		$send_amount = $do_amount * 0.1;
		
		if($do_mb != ''){
			// 회원아이디로 조인문 지갑주소 및 기부 매출구분 가져오기
			$don = $CI->m_member->join_member_donation(strtolower($do_mb));			
		}			
		
		// 전자지갑 주소가 있으면 지급해주기	
		if($do_mb != ""){				
				
			// 기부자를 따라서 쭉 전송하기 - 외상인 경우 외상값부터 갚아야 한다. 인정인 경우 위로 안 올려준다.		
			// 외상구좌인지 체크하기 체크하여 외상값 부터 갚기 - 현재 발생한 수당에서 외상값을 갚고
			$loan = 0;
			if($don->state == "외상" and $don->last > 0){
				if($don->last >= $send_amount){
					$last 			= $don->last - $send_amount; // 나머지
					$loan 			= $send_amount;
					$send_amount 	= 0;
										
				}
				else{
					$loan 			= $don->last;
					$send_amount 	= $send_amount - $don->last;
					$last 			= 0;										
				}
					
				if($loan > 0){
					$CI->m_donation->donation_loan($do_mb,$last);						
				}
					
			}
				
			if($msg == 'first'){
				$meno = '첫번째기부 / 회원 : '.$member_id;
			}
			else{
				$meno = '두번째기부 / 회원 : '.$member_id;					
			}
				
			// 이제 전송 -> 잔고,인/아웃 구할 수 있음
			//$send = $CI->bitcoin->sendfrom($mb_coin_id,$don->coin_addr,$send_amount);
			//$CI->m_coin->coin_in($order_code,$mb_coin_id,$mb_coin_addr,$don->coin_id,$don->coin_addr,$send_amount,$loan,'su');
			$CI->m_point->point_su($order_code,$do_mb,$member_id,$send_amount,$loan,$msg,$meno);
			
					
			$total_amount +=  ($send_amount + $loan); // 실제적으로 보낸 금액
			
		}					
					
		$next = $CI->m_donation->get_donation(strtolower($do_mb));
		if(isset($next->first_id)){
			$do_mb = $next->first_id;						
		}
		else{
			$do_mb = '';						
		}
									
	}
		
	// 보내고 남는 금액은 관리자에게 보낸다. 적립금 20%는 일단 기록하지 않기 차후에 처리한다.
	$last_amount = $do_amount - $total_amount;
	if($last_amount > 0){
		$loan = 0;
		$keep_mb = "kcp1";
		$keep = $CI->m_member->get_member($keep_mb);
	
		// 이제 전송
		//$send = $CI->bitcoin->sendfrom($member_id,$keep->coin_addr,$last_amount);
		//$CI->m_coin->coin_in($order_code,$mb_coin_id,$mb_coin_addr,$keep->coin_id,$keep->coin_addr,$last_amount,'0.00','donation');
		$CI->m_point->point_su($order_code,$keep_mb,$member_id,$last_amount,$loan,$msg,$meno);
	}
}


function vlm_donation($order_code,$member_id,$amount,$regdate=NULL){
		
	$CI =& get_instance();

	$do = $CI->m_donation->get_donation($member_id);

	$i = 0;
	while ($do->first_id != '') {

		$i += 1;
		$side = $CI->m_donation->get_first_side($do->first_id,$do->member_id); // 나는 스폰서의 좌우 어디에 있나?


		//DB 입력
		$CI->m_donation->set_vlm_do($order_code,$do->first_id,$member_id,$side,$i,$amount,$regdate);

		// 상위 유저 찾기 (스폰서)
		$do = $CI->m_donation->get_donation($do->first_id);
		
	}

}
	
/*------------------------------------------------------------------------------*/

function mom_chk($id,$point,$regdate){

	$CI =& get_instance();


	// 마지막 매출 정보 가져오기
	$get_mom = $CI->m_office->get_last_plan($id,$regdate);

	$mom_amount = 0;
	$su_point = 0;
	
	if ($get_mom) { // 몸값이 존재 한다면
		$mom_amount = $get_mom->amount * MAX_MOM * 0.01;
		
		// 그동안 받아간 수당 가져오기
		$su_point = $CI->m_point->get_payment($id,$get_mom->regdate);
	}
	
	///// 순환 검증 ////
	
	//남은 몸값
	$my_mom = $mom_amount - $su_point ;

	//포인트가 남은 몸값 보다 크다면
	if ($my_mom <= $point) {

		if ($su_point > $mom_amount) {

			$point = 0;

			return $point;

		} else {

			$over = $point - $my_mom;  // 오버잔액 구하기


			$point =  $point - $over;
			

			return $point;

		}


	} else {

		return $point;

		

	}
	
	
	

}

function auto_mom_chk($taget,$point,$regdate){

	$CI =& get_instance();


	// 마지막 매출 정보 가져오기
	$get_mom = $CI->m_office->get_last_plan($taget,$regdate);

	$mom_amount = 0;
	$su_point = 0;
	
	if ($get_mom) { // 몸값이 존재 한다면
		$mom_amount = $get_mom->amount * DAY_MAX_MON * 0.01;
		
		// 그동안 받아간 수당 가져오기
		$su_point = $CI->m_point->get_payment($taget,$get_mom->regdate);
	}
	
	
	///// 순환 검증 ////
	
	//남은 몸값
	$my_mom = $mom_amount - $su_point ;

	//포인트가 남은 몸값 보다 크다면
	if ($my_mom <= $point) {

		if ($su_point > $mom_amount) {

			$point = 0;

			return $point;

		} else {

			$over = $point - $my_mom;  // 오버잔액 구하기
			$point =  $point - $over;
			
			if ($point > 0) {
				$point = $point; 
			} else {
				$point = 0;
			}
			
			return $point;

		}


	} else {

		return $point;

	}

}


?>
