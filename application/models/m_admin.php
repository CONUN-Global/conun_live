<?php
class M_admin extends CI_Model {

	function M_admin()
	{
		parent::__construct();
	}


/* =================================================================
* config
================================================================= */

	function get_config() {
		$this->db->select('*');
		$this->db->from('m_config');
		$this->db->where('cfg_no',1);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
	
	function set_config() {
		
		$regdate = nowdate();
		
		$query = array(
			'coin1_name' => $this->input->post('coin1_name'),
			'coin1_symbol' => $this->input->post('coin1_symbol'),
			'coin1_total' => $this->input->post('coin1_total'),
			'coin1_unit' => $this->input->post('coin1_unit'),
			'coin1_state' => $this->input->post('coin1_state'),
			'coin1_volume' => $this->input->post('coin1_volume'),
			'coin1_flgs' => $this->input->post('coin1_flgs'),
			'exchange' => $this->input->post('exchange'),
			'change_name' => $this->input->post('change_name'),
			'regdate' => $regdate				
		);

		if($this->input->post('cfg_no') == 1){
			$this->db->where('cfg_no', $this->input->post('cfg_no'));
			$this->db->update('m_config', $query);
		}
		else{
			$this->db->insert('m_config', $query);			
		}
	}
	
	function set_config2() {
		
		$regdate = nowdate();
		
		$query = array(
			'su_recommend' => $this->input->post('su_recommend'),
			'su_sponsor' => $this->input->post('su_sponsor'),
			'sponsor_sub' => $this->input->post('sponsor_sub'),
			'su_day' => $this->input->post('su_day'),
			'global1_state' => $this->input->post('global1_state'),
			'su_global1' => $this->input->post('su_global1'),
			'global2_state' => $this->input->post('global2_state'),
			'su_global2' => $this->input->post('su_global2'),
			'global3_state' => $this->input->post('global3_state'),
			'su_global3' => $this->input->post('su_global3'),
			'su_level1' => $this->input->post('su_level1'),
			'level1_state' => $this->input->post('level1_state'),
			'level1_name' => $this->input->post('level1_name'),
			'su_level2' => $this->input->post('su_level2'),
			'level2_state' => $this->input->post('level2_state'),
			'level2_name' => $this->input->post('level2_name'),
			'su_level3' => $this->input->post('su_level3'),
			'level3_state' => $this->input->post('level3_state'),
			'level3_name' => $this->input->post('level3_name'),
			'su_maching1' => $this->input->post('su_maching1'),
			'su_maching2' => $this->input->post('su_maching2'),
			'su_maching3' => $this->input->post('su_maching3'),
			'su_maching4' => $this->input->post('su_maching4'),
			'su_maching5' => $this->input->post('su_maching5'),
			'su_maching6' => $this->input->post('su_maching6'),
			'su_maching7' => $this->input->post('su_maching7'),
			'su_maching8' => $this->input->post('su_maching8'),
			'su_maching9' => $this->input->post('su_maching9'),
			'su_maching10' => $this->input->post('su_maching10'),
			'regdate' => $regdate				
		);

		if($this->input->post('cfg_no') == 1){
			$this->db->where('cfg_no', $this->input->post('cfg_no'));
			$this->db->update('m_config', $query);
		}
		else{
			$this->db->insert('m_config', $query);			
		}
	}
	
	function set_config3() {
		
		$regdate = nowdate();
		
		$query = array(
			'package1TR' => $this->input->post('package1TR'),
			'package1CR' => $this->input->post('package1CR'),
			'package1JSC' => $this->input->post('package1JSC'),
			'package1HSC' => $this->input->post('package1HSC'),
			'package2TR' => $this->input->post('package2TR'),
			'package2CR' => $this->input->post('package2CR'),
			'package2JSC' => $this->input->post('package2JSC'),
			'package2HSC' => $this->input->post('package2HSC'),
			'package3TR' => $this->input->post('package3TR'),
			'package3CR' => $this->input->post('package3CR'),
			'package3JSC' => $this->input->post('package3JSC'),
			'package3HSC' => $this->input->post('package3HSC'),
			'package4TR' => $this->input->post('package4TR'),
			'package4CR' => $this->input->post('package4CR'),
			'package4JSC' => $this->input->post('package4JSC'),
			'package4HSC' => $this->input->post('package4HSC'),
			'package5TR' => $this->input->post('package5TR'),
			'package5CR' => $this->input->post('package5CR'),
			'package5JSC' => $this->input->post('package5JSC'),
			'package5HSC' => $this->input->post('package5HSC'),
			'package6TR' => $this->input->post('package6TR'),
			'package6CR' => $this->input->post('package6CR'),
			'package6JSC' => $this->input->post('package6JSC'),
			'package6HSC' => $this->input->post('package6HSC'),
			'change' => $this->input->post('change'),
			'change_name' => $this->input->post('change_name'),
			'regdate' => $regdate				
		);

		if($this->input->post('cfg_no') == 1){
			$this->db->where('cfg_no', $this->input->post('cfg_no'));
			$this->db->update('m_config', $query);
		}
		else{
			$this->db->insert('m_config', $query);			
		}
	}
		
		
	function list_news() {
		$this->db->select('*');
		$this->db->from('m_news');
		$this->db->order_by("news_no", "desc");
		$query = $this->db->get();
		$list = $query->result();
		return $list;
	}

	function get_news($idx) {
		$this->db->select('*');
		$this->db->from('m_news');
		$this->db->where('news',$idx);
		$query = $this->db->get();
		$item = $query->rows();
		return $item;
	}

	function set_news() {
		
		$regdate = nowdate();
		
		$query = array(
			'title' => $this->input->post('title'),
			'contents' => $this->input->post('contents'),
			'kind' => $this->input->post('kind'),
			'regdate' => $regdate				
		);

		if($this->input->post('idx') > 0){
			$this->db->where('news_no', $this->input->post('idx'));
			$this->db->update('m_news', $query);
		}
		else{
			$this->db->insert('m_news', $query);			
		}
	}
	


/* =================================================================
* 포인트 관련
================================================================= */

	// 수당 히스토리 가져오기
	function get_per_his($id,$type) {
		$this->db->select('*');
		$this->db->from('m_point');
		$this->db->where('cate','payment');
		$this->db->where('member_id',$id);
		$this->db->order_by("regdate", "desc");
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
/* =================================================================
* 매출 관리
================================================================= */
	function sales_lists($limit,$page,$st,$sc) {
	

		$sel = " m_account.account_no, m_account.member_id as member_id, m_account.account_id, m_account.point, m_account.sponsor_id, m_account.order_code, m_member.office, m_member.level, m_account.dep, m_account.level, m_account.regdate, m_account.is_stop, m_member.name";
		$this->db->select($sel);
		$this->db->from('m_account');
		$this->db->join('m_member', 'm_account.member_id = m_member.member_id');

		
		if($sc) {
			$this->db->like($st,$sc);
		}
		$this->db->limit($limit,$page);

		$this->db->order_by('account_no','desc');

		$query = $this->db->get();
		$item['lists'] = $query->result();
		
		
		//검색용
		$this->db->select($sel);
		$this->db->from('m_account');
		$this->db->join('m_member', 'm_account.member_id = m_member.member_id');
		
		if($sc) {
			$this->db->like($st,$sc);
		}
		$query = $this->db->get();
		$item['lists_total'] = $query->num_rows();
		
		return $item;
	}
	

	function sales_profitedit($idx) {
	
		$query = array(
			'regdate' => $this->input->post('regdate'),
			'is_give' => $this->input->post('is_give'),
			'is_approval' => $this->input->post('is_approval'),
			'pay' => $this->input->post('payment'),
		);

		$this->db->where('plan_no', $idx);
		$this->db->update('m_plan', $query);
	}

	// 매출 자료중 지출 포인트 수정
	function sales_beneedit($idx) {
		$query = array(
			'point' => $this->input->post('point'),
			'regdate' => $this->input->post('regdate'),
			'memo' => "Admin Edit",
		);
		$this->db->where('point_no', $idx);
		$this->db->update('m_point', $query);
	}


/* =================================================================
* 환전 관리
================================================================= */
	function point_exchange($order_code){
		$CI =& get_instance();
		
		// 계좌번호 번호 가공
		$mb = $CI->m_member->get_member($this->input->post('member_id'));		
			$bank_name = $mb->bank_name;
			$bank_num = $mb->bank_number;
			$bank_holder = $mb->bank_holder;
		
		$query = array(
			'order_code' => $order_code,
			'member_id' => $this->input->post('member_id'),
			'event_id' => 'Company',
			'type' => 'payment',
			'cate' => 'out',
			'kind' => 'exchange',
			'point' => $this->input->post('point'),
			'fee' => $this->input->post('fee'),
			'saved_point' => $this->input->post('saved_point'),
			'bank_name' => $bank_name,
			'bank_num' => $bank_num,
			'bank_holder' => $bank_holder,
			'regdate' => nowdate(),
			'msg' => '송금 완료',
				
		);

		$this->db->insert('m_point', $query);

	}
	

	function ex($order_code) {
        $this->db->select('member_id,type,appdate,sum(point) as point');
        $this->db->from('m_point');
        $this->db->where('order_code', $order_code);
        $this->db->group_by('member_id');
        $query = $this->db->get();
        $item = $query->result();
        return $item;
   	}
    
    

	function exchange_edit($idx) {

		$kind = $this->input->post('kind');

		if($kind == "송금 완료") {

			$type = "out";
			$appdate = nowdate();
		}

		
		if($kind == "송금 보류") {

			$type = "out";
			$appdate = '0000-00-00 00:00:00';
		}
		

		if($kind == "송금 대기중") {

			$type = "out";
			$appdate = '0000-00-00 00:00:00';
		}


		$query = array(
			'msg' => $kind,
			'appdate' => $appdate,
		);

		$this->db->where('point_no', $idx);
		$this->db->update('m_point', $query);
	}
	
	
	
	function exchangefind($start,$end,$kind) {
		$this->db->select('*');
		$this->db->from('m_point');
		$this->db->where('regdate >', $start);
		$this->db->where('regdate <', $end);
		$this->db->where('kind', 'exchange');
		$this->db->where('msg', $kind);
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	
	function exchangeupdate($start,$end) {
	
		$query = array(
			'msg' => '송금 완료',
			'appdate' => nowdate()
		);
		$this->db->where('regdate >', $start);
		$this->db->where('regdate <', $end);
		$this->db->where('cate', 'payment');
		$this->db->where('kind', 'exchange');
		$this->db->where('msg', '송금 대기중');
		$this->db->update('m_point', $query);

	}
	
	
	
	function cardupdate($start,$end) {
	
		$query = array(
			'msg' => '교환 완료',
			'appdate' => nowdate()
		);
		$this->db->where('regdate >', $start);
		$this->db->where('regdate <', $end);
		$this->db->where('cate', 'payment');
		$this->db->where('kind', 'exchange');
		$this->db->where('msg', '교환 대기중');
		$this->db->update('m_point', $query);

	}
	
	

/* =================================================================
* 송금 관리
================================================================= */



    function banking_list2($start,$end,$kind) {
        $this->db->select('member_id,bank_name,bank_num,bank_holder,bank_fee,regdate,appdate,sum(point) as point,sum(bank_fee) as bank_fee');
        $this->db->from('m_point');
		$this->db->where('regdate >', $start.' 00:00:00');
		$this->db->where('regdate <', $end.' 23:59:59');
		$this->db->where('kind', 'exchange');
		$this->db->where('msg', $kind);
        $this->db->group_by('bank_num');
        $query = $this->db->get();
        $item = $query->result();
        return $item;
    }
    
    
    function banking_list1($start,$end,$kind) {
        $this->db->select('*');
        $this->db->from('m_point');
		$this->db->where('regdate >', $start.' 00:00:00');
		$this->db->where('regdate <', $end.' 23:59:59');
		$this->db->where('kind', 'exchange');
		$this->db->where('msg', $kind);
        $query = $this->db->get();
        $item = $query->result();
        return $item;
    }
    
	function get_total_point($holder,$order_code) {	
		$this->db->select('*');
        $this->db->from('m_point');
        $this->db->where('order_code', $order_code);
        $this->db->where('bank_holder', $holder);
        $this->db->where('kind','exchange');
		$query = $this->db->get();
		$item = $query->result();
		
		
		$point = 0;
		
		foreach ($item as $row) {
			$point =  $row->point + $point; 
		}
		
		return $point;
		
	}
	

/* =================================================================
* 검색 관리
================================================================= */

	//총 게시물수 가져오기
	function get_total($table_id,$where,$clm,$where2=NULL,$clm2=NULL,$where3=NULL,$clm3=NULL,$where4=NULL,$clm4=NULL,$where5=NULL,$clm5=NULL) {
		//게시물 TOTAL 수
		$this->db->from($table_id);
		if ($where != NULL) {
			$this->db->where($where,$clm);
		}
		if ($where2 != NULL) {
			$this->db->where($where2,$clm2);
		}
		if ($where3 != NULL) {
			$this->db->where($where3,$clm3);
		}
		
		if ($where4 != NULL) {
			$this->db->where($where4,$clm4);
		}
		
		if ($where5 != NULL) {
			$this->db->where($where5,$clm5);
		}
		$item =  $this->db->count_all_results();
		return $item;
	}


	//게시물 리스트 가져오기
	function get_lists($table,$limit,$page,$order_by,$where,$clm,$where2=NULL,$clm2=NULL,$where3=NULL,$clm3=NULL,$where4=NULL,$clm4=NULL,$where5=NULL,$clm5=NULL) {
		$this->db->select(' *');
		$this->db->from($table);
		//$this->db->join('m_member', 'member_id = member_id','left');
		//$this->db->limit($limit,$page);
		if ($where != NULL) {
			$this->db->where($where,$clm);
		}



		if ($where2 != NULL) {
			$this->db->where($where2,$clm2);
		}
		if ($where3 != NULL) {
			$this->db->where($where3,$clm3);
		}


		
		if ($where4 != NULL) {
			$this->db->where($where4,$clm4);
		}
		
		if ($where5 != NULL) {
			$this->db->where($where5,$clm5);
		}
		

		$this->db->limit($limit,$page);

		if($order_by!= null){
			$this->db->order_by($order_by,'desc');
		}



		$query = $this->db->get();
		$item = $query->result();
		return $item;


	}
    
    	//게시물 리스트 가져오기
	function get_lists_partner($table,$limit,$page,$order_by,$where,$clm,$where2=NULL,$clm2=NULL,$where3=NULL,$clm3=NULL,$where4=NULL,$clm4=NULL,$where5=NULL,$clm5=NULL) {
		$this->db->select(' *');
		$this->db->from($table);
	 
		if ($where != NULL) {
			$this->db->where($where,$clm);
		}
		if ($where2 != NULL) {
			$this->db->where($where2,$clm2);
		}
		if ($where3 != NULL) {
			$this->db->where($where3,$clm3);
		}
		
		if ($where4 != NULL) {
			$this->db->where($where4,$clm4);
		}
		
		if ($where5 != NULL) {
			$this->db->where($where5,$clm5);
		}
        
        
        $CI =& get_instance();
		$member=$CI->session->userdata('member_id');
        
        
        if($member){
            	$this->db->where("member_id",$member);
        }
        

		$this->db->limit($limit,$page);

		if($order_by!= null){
			$this->db->order_by($order_by,'desc');
		}



		$query = $this->db->get();
		$item = $query->result();
		return $item;


	}

		//게시물 리스트 가져오기
	function get_lists_mssql($table,$limit,$page,$order_by,$where1,$clm1,$where2=NULL,$clm2=NULL,$where3=NULL,$clm3=NULL,$where4=NULL,$clm4=NULL,$where5=NULL,$clm5=NULL) {
		$query = "
			SELECT * FROM 
			  ( SELECT A.*, Row_Number() OVER (ORDER BY ".$order_by." DESC) AS rownum 
			      FROM ".$table." A
				 WHERE 1=1
		";
		//$this->db->join('m_member', 'member_id = member_id','left');
		//$this->db->limit($limit,$page);
		if ($where1 != NULL) {
			$query .= " AND ".$where1. " = '".$clm1."' ";
		}
		if ($where2 != NULL) {
			$query .= " AND ".$where2. " = '".$clm2."' ";
		}
		if ($where3 != NULL) {
			$query .= " AND ".$where3. " = '".$clm3."' ";
		}
		
		if ($where4 != NULL) {
			$query .= " AND ".$where4. " = '".$clm4."' ";
		}
		
		if ($where5 != NULL) {
			$query .= " AND ".$where5. " = '".$clm5."' ";
		}

		$query .= " ) T1 WHERE rownum BETWEEN ".(($limit * ($page - 1)) + 1)." AND ".$limit * $page;
		$query .= " ORDER BY ".$order_by." desc ";

		$tables = $this->db->query($query);
		$item = $tables->result();
		return $item;


	}



	//검색 리스트 가져오기
	function get_sc_lists($table,$limit,$page,$order_by,$st,$sc,$where=NULL,$clm=NULL,$where2=NULL,$clm2=NULL,$where3=NULL,$clm3=NULL,$where4=NULL,$clm4=NULL,$where5=NULL,$clm5=NULL) {

		$sc = urldecode($sc);

		$this->db->from($table);

		if($table == "m_coin"){
			$this->db->select('m_coin.*');
			$this->db->join('m_member', $table.'.member_id = m_member.coin_id','inner');
			if($st =="member_id"){
				$this->db->like("m_member.member_id",$sc);

			}else{
				$this->db->like($st,$sc);
			}

			if ($where != NULL  &&  $clm != null) {
				$this->db->where($where,$clm);
			}

			if($clm2!= "" && $clm3!=""){

				$this->db->where("m_coin.regdate BETWEEN '$clm2' AND '$clm3'");

			}


			if ($where4 != NULL  &&  $clm4 != null) {
				$this->db->where($where4,$clm4);
			}

			if ($where5 != NULL  &&  $clm5 != null) {
				$this->db->where($where5,$clm5);
			}

		}else{
			$this->db->select('*');
			$this->db->like($st,$sc);

			if ($where != NULL) {
				$this->db->where($where,$clm);
			}
			if ($where2 != NULL) {
				$this->db->where($where2,$clm2);
			}
			if ($where3 != NULL) {
				$this->db->where($where3,$clm3);
			}

			if ($where4 != NULL) {
				$this->db->where($where4,$clm4);
			}

			if ($where5 != NULL) {
				$this->db->where($where5,$clm5);
			}

		}



		
		$this->db->order_by($order_by,'desc');
		$this->db->limit($limit,$page);
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	//검색 리스트 가져오기
	function get_sc_lists_mssql($table,$limit,$page,$order_by,$st,$sc,$where=NULL,$clm=NULL,$where2=NULL,$clm2=NULL,$where3=NULL,$clm3=NULL,$where4=NULL,$clm4=NULL,$where5=NULL,$clm5=NULL) {
		$sc = urldecode($sc);
		$query = "
			SELECT * FROM 
			  ( SELECT A.*, Row_Number() OVER (ORDER BY ".$order_by." DESC) AS rownum 
			      FROM ".$table." A
				 WHERE 1=1
		";
		//$this->db->join('m_member', 'member_id = member_id','left');
		//$this->db->limit($limit,$page);
		if ($st != NULL) {
			$query .= " AND ".$st. " like '%".$sc."%' ";
		}
		if ($where1 != NULL) {
			$query .= " AND ".$where1. " = '".$clm1."' ";
		}
		if ($where2 != NULL) {
			$query .= " AND ".$where2. " = '".$clm2."' ";
		}
		if ($where3 != NULL) {
			$query .= " AND ".$where3. " = '".$clm3."' ";
		}
		
		if ($where4 != NULL) {
			$query .= " AND ".$where4. " = '".$clm4."' ";
		}
		
		if ($where5 != NULL) {
			$query .= " AND ".$where5. " = '".$clm5."' ";
		}

		$query .= " ) T1 WHERE rownum BETWEEN ".(($limit * ($page - 1)) + 1)." AND ".$limit * $page;
		$query .= " ORDER BY ".$order_by." desc ";

	 
		$tables = $this->db->query($query);
		$item = $tables->result();
		return $item;

	}

	//검색시 총 게시물수 가져오기
	function get_sc_total($table,$limit,$page,$order_by,$st,$sc,$where=NULL,$clm=NULL,$where2=NULL,$clm2=NULL,$where3=NULL,$clm3=NULL,$where4=NULL,$clm4=NULL,$where5=NULL,$clm5=NULL) {
		$sc = urldecode($sc);

		$this->db->from($table);

		if($table == "m_coin"){
			$this->db->select('m_coin.*');
			$this->db->join('m_member', $table.'.member_id = m_member.coin_id','inner');
			if($st =="member_id"){
				$this->db->like("m_member.member_id",$sc);

			}else{
				$this->db->like($st,$sc);
			}

			if ($where != NULL  &&  $clm != null) {
				$this->db->where($where,$clm);
			}

			echo $where3;
			if($clm2!= "" && $clm3!=""){

				$this->db->where("m_coin.regdate BETWEEN '$clm2' AND '$clm3'");

			}


			if ($where4 != NULL  &&  $clm4 != null) {
				$this->db->where($where4,$clm4);
			}

			if ($where5 != NULL  &&  $clm5 != null) {
				$this->db->where($where5,$clm5);
			}

		}else{
			$this->db->select('*');
			$this->db->like($st,$sc);

			if ($where != NULL) {
				$this->db->where($where,$clm);
			}
			if ($where2 != NULL) {
				$this->db->where($where2,$clm2);
			}
			if ($where3 != NULL) {
				$this->db->where($where3,$clm3);
			}

			if ($where4 != NULL) {
				$this->db->where($where4,$clm4);
			}

			if ($where5 != NULL) {
				$this->db->where($where5,$clm5);
			}

		}





		$item =  $this->db->count_all_results();
		return $item;
	}

}

?>
