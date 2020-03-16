<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// �ҷ� �� ���� ó��
function vlm_tree($member_id,$account_id,$amount,$order_code,$regdate=NULL)
{
	$CI =& get_instance();
		
	// ����� ���� ���ٸ�
	if ($regdate == NULL) {
		$regdate = nowdate();
	}
	
	
	$point= $amount;
		
	// ���ȸ�� �������̵�
	$gu = $CI->m_office->get_account($account_id);
	
	$i = 0;
	while ($gu->sponsor_id) {
			
		$i += 1;
		$side = $CI->m_office->get_side($gu->sponsor_id,$gu->account_id); // ���� �������� �¿� ��� �ֳ�?

		if ($side  == 1) {
			$side = 'left';
		}
		else if ($side  == 2 ) {
			$side = 'right';
		}

		//DB �Է�
		$CI->m_office->vlm_in($order_code,$gu->sponsor_id,$account_id,$side,$i,$amount,$regdate);

		// �������� �Ŀ����� ��ü �¿� ���� �ľ� - ���޿� ����ϱ�
		$vlm = $CI->m_office->get_vlm_row($gu->sponsor_id);
			$vlm_left = $vlm['vlm_left'];
			$vlm_right = $vlm['vlm_right'];
		
		// ���� 2:2 �̸�
		// Ư������ �Ǹ� �������� �ڽ��� �̺�Ʈ���̵� ���޶��� Ư�����̶�� ���������� ���ش�.
		$ck_left = floor($vlm_left/ 2);
		$ck_right = floor($vlm_right/ 2);
		if($ck_left > 0 and $ck_right > 0){
			
			$query = array(
				'lv1_regdate' => $regdate
			);
			$CI->db->where('account_id',$gu->sponsor_id);
			$CI->db->update('m_level', $query);
			
			$level_up = "Ư����";				
			$query = array(
				'level' => $level_up
			);
			$CI->db->where('account_id',$gu->sponsor_id);
			$CI->db->update('m_account', $query);
			
			$level_mb = 4;
			// ȸ���� ������ �÷���
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
		
		// �븮�� ���ϱ�
		$level = 1;
		$vlm = $CI->m_office->get_vlm_level($gu->sponsor_id,$level);
			$vlm_left = $vlm['vlm_left'];
			$vlm_right = $vlm['vlm_right'];
		
		// ���� 3:3 �̸�
		// �븮���� �Ǹ� �������� �ڽ��� �̺�Ʈ���̵� ���޶��� �븮���̶�� ���������� ���ش�.
		$ck_left = floor($vlm_left/ 3);
		$ck_right = floor($vlm_right/ 3);
		if($ck_left > 0 and $ck_right > 0){
			
			$query = array(
				'lv2_regdate' => $regdate
			);
			$CI->db->where('account_id',$gu->sponsor_id);
			$CI->db->update('m_level', $query);
			
			$level_up = "�븮��";				
			$query = array(
				'level' => $level_up
			);
			$CI->db->where('account_id',$gu->sponsor_id);
			$CI->db->update('m_account', $query);
			
			$level_mb = 5;
			// ȸ���� ������ �÷���
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
		
		// ���� ���ϱ�
		$level = 2;
		$vlm = $CI->m_office->get_vlm_level($gu->sponsor_id,$level);
			$vlm_left = $vlm['vlm_left'];
			$vlm_right = $vlm['vlm_right'];
		
		// ���� 3:3 �̸�
		// �븮���� �Ǹ� �������� �ڽ��� �̺�Ʈ���̵� ���޶��� �븮���̶�� ���������� ���ش�.
		$ck_left = floor($vlm_left/ 4);
		$ck_right = floor($vlm_right/ 4);
		if($ck_left > 0 and $ck_right > 0){
			
			$query = array(
				'lv3_regdate' => $regdate
			);
			$CI->db->where('account_id',$gu->sponsor_id);
			$CI->db->update('m_level', $query);
			
			$level_up = "����";				
			$query = array(
				'level' => $level_up
			);
			$CI->db->where('account_id',$gu->sponsor_id);
			$CI->db->update('m_account', $query);
			
			$level_mb = 6;
			// ȸ���� ������ �÷���
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
		
		// ������ ���ϱ�
		$level = 3;
		$vlm = $CI->m_office->get_vlm_level($gu->sponsor_id,$level);
			$vlm_left = $vlm['vlm_left'];
			$vlm_right = $vlm['vlm_right'];
		
		// ���� 3:3 �̸�
		// �븮���� �Ǹ� �������� �ڽ��� �̺�Ʈ���̵� ���޶��� �븮���̶�� ���������� ���ش�.
		$ck_left = floor($vlm_left/ 5);
		$ck_right = floor($vlm_right/ 5);
		if($ck_left > 0 and $ck_right > 0){
			
			$query = array(
				'lv4_regdate' => $regdate
			);
			$CI->db->where('account_id',$gu->sponsor_id);
			$CI->db->update('m_level', $query);
			
			
			$level_up = "������";				
			$query = array(
				'level' => $level_up
			);
			$CI->db->where('account_id',$gu->sponsor_id);
			$CI->db->update('m_account', $query);
			
			$level_mb = 7;
			// ȸ���� ������ �÷���
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
				
		
		// ���� ���� ã�� (������)
		$gu = $CI->m_office->get_account($gu->sponsor_id);
	}
	
	

}


// �ҷ��� ó�� - ȸ�����̺� ���� �Ŀ���ó��
function set_volume($member_id,$order_code,$amount,$regdate=NULL){
		
	$CI =& get_instance();

	$get_member = $CI->m_member->get_member($member_id);

	while ($get_member->sponsor_id != '') {

		$side = $CI->m_office->get_side($get_member->sponsor_id,$get_member->member_id); // ���� �������� �¿� ��� �ֳ�?
			

		if ($side == '1') {
			$point= $amount;
			$side = 'left';
		}

		if ($side == '2' ) {
			$side = 'right';
			$point = $amount;
		}

		//DB �Է�
		$CI->m_office->vlm_in($order_code,$get_member->sponsor_id,$member_id,$side,$amount,$regdate);

		// ���� ���� ã�� (������)
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
			// ȸ�����̵�� ���ι� �����ּ� �� ��� ���ⱸ�� ��������
			$don = $CI->m_member->join_member_donation(strtolower($do_mb));			
		}			
		
		// �������� �ּҰ� ������ �������ֱ�	
		if($do_mb != ""){				
				
			// ����ڸ� ���� �� �����ϱ� - �ܻ��� ��� �ܻ󰪺��� ���ƾ� �Ѵ�. ������ ��� ���� �� �÷��ش�.		
			// �ܻ������� üũ�ϱ� üũ�Ͽ� �ܻ� ���� ���� - ���� �߻��� ���翡�� �ܻ��� ����
			$loan = 0;
			if($don->state == "�ܻ�" and $don->last > 0){
				if($don->last >= $send_amount){
					$last 			= $don->last - $send_amount; // ������
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
				$meno = 'ù��°��� / ȸ�� : '.$member_id;
			}
			else{
				$meno = '�ι�°��� / ȸ�� : '.$member_id;					
			}
				
			// ���� ���� -> �ܰ�,��/�ƿ� ���� �� ����
			//$send = $CI->bitcoin->sendfrom($mb_coin_id,$don->coin_addr,$send_amount);
			//$CI->m_coin->coin_in($order_code,$mb_coin_id,$mb_coin_addr,$don->coin_id,$don->coin_addr,$send_amount,$loan,'su');
			$CI->m_point->point_su($order_code,$do_mb,$member_id,$send_amount,$loan,$msg,$meno);
			
					
			$total_amount +=  ($send_amount + $loan); // ���������� ���� �ݾ�
			
		}					
					
		$next = $CI->m_donation->get_donation(strtolower($do_mb));
		if(isset($next->first_id)){
			$do_mb = $next->first_id;						
		}
		else{
			$do_mb = '';						
		}
									
	}
		
	// ������ ���� �ݾ��� �����ڿ��� ������. ������ 20%�� �ϴ� ������� �ʱ� ���Ŀ� ó���Ѵ�.
	$last_amount = $do_amount - $total_amount;
	if($last_amount > 0){
		$loan = 0;
		$keep_mb = "kcp1";
		$keep = $CI->m_member->get_member($keep_mb);
	
		// ���� ����
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
		$side = $CI->m_donation->get_first_side($do->first_id,$do->member_id); // ���� �������� �¿� ��� �ֳ�?


		//DB �Է�
		$CI->m_donation->set_vlm_do($order_code,$do->first_id,$member_id,$side,$i,$amount,$regdate);

		// ���� ���� ã�� (������)
		$do = $CI->m_donation->get_donation($do->first_id);
		
	}

}
	
/*------------------------------------------------------------------------------*/

function mom_chk($id,$point,$regdate){

	$CI =& get_instance();


	// ������ ���� ���� ��������
	$get_mom = $CI->m_office->get_last_plan($id,$regdate);

	$mom_amount = 0;
	$su_point = 0;
	
	if ($get_mom) { // ������ ���� �Ѵٸ�
		$mom_amount = $get_mom->amount * MAX_MOM * 0.01;
		
		// �׵��� �޾ư� ���� ��������
		$su_point = $CI->m_point->get_payment($id,$get_mom->regdate);
	}
	
	///// ��ȯ ���� ////
	
	//���� ����
	$my_mom = $mom_amount - $su_point ;

	//����Ʈ�� ���� ���� ���� ũ�ٸ�
	if ($my_mom <= $point) {

		if ($su_point > $mom_amount) {

			$point = 0;

			return $point;

		} else {

			$over = $point - $my_mom;  // �����ܾ� ���ϱ�


			$point =  $point - $over;
			

			return $point;

		}


	} else {

		return $point;

		

	}
	
	
	

}

function auto_mom_chk($taget,$point,$regdate){

	$CI =& get_instance();


	// ������ ���� ���� ��������
	$get_mom = $CI->m_office->get_last_plan($taget,$regdate);

	$mom_amount = 0;
	$su_point = 0;
	
	if ($get_mom) { // ������ ���� �Ѵٸ�
		$mom_amount = $get_mom->amount * DAY_MAX_MON * 0.01;
		
		// �׵��� �޾ư� ���� ��������
		$su_point = $CI->m_point->get_payment($taget,$get_mom->regdate);
	}
	
	
	///// ��ȯ ���� ////
	
	//���� ����
	$my_mom = $mom_amount - $su_point ;

	//����Ʈ�� ���� ���� ���� ũ�ٸ�
	if ($my_mom <= $point) {

		if ($su_point > $mom_amount) {

			$point = 0;

			return $point;

		} else {

			$over = $point - $my_mom;  // �����ܾ� ���ϱ�
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
