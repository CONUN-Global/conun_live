<?
class M_coin extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	
/* =================================================================
* 지갑 정보
================================================================= */

    /**
     * @param $id
     * @param $type
     * @return mixed
     */
    function get_wallet($id, $type) {
		$this->db->select('*');
		$this->db->from('m_wallet');
		$this->db->where('member_id',$id);
		$this->db->where('type',$type);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}

    function get_wallet_no($wallet_no) {
        $this->db->select('*');
        $this->db->from('m_wallet');
        $this->db->where('wallet_no',$wallet_no);

        $query = $this->db->get();
        $item = $query->row();
        return $item;
    }

	function get_ico($id) {
		$this->db->select('*');
		$this->db->from('m_ico');
		$this->db->where('member_id',$id);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
	
	//주소기준으로 아이디 찾기
	function get_wallet_addr($address,$type) {
		$this->db->select('*');
		$this->db->from('m_wallet');
		$this->db->where('wallet',$address);
		$this->db->where('type',$type);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
    //주소기준으로 아이디 찾기
    function get_wallet_master() {
        $this->db->select('*');
        $this->db->from('m_wallet');
        $this->db->where('master_yn','Y');
        $query = $this->db->get();
        $item = $query->row();
        return $item;
    }
	function get_wallet_mb($id,$type=NULL) {
		$this->db->select('*');
		$this->db->from('m_wallet');
		$this->db->where('member_id',$id);
		if($type){
			$this->db->where('type',$type);			
		}
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	function get_wallet_li($type=NULL) {
		$this->db->select('*');
		$this->db->from('m_wallet');
		if($type){
			$this->db->where('type',$type);			
		}
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
/* =================================================================
* 코인 정보
================================================================= */

	// 코인에서 회원정보 가져오기
	function get_coin($member_id) {
		$this->db->select('*');
		$this->db->from('m_coin');
		$this->db->where('member_id',$member_id);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
    function get_history($tx_id) {
        $this->db->select('*');
        $this->db->from('m_assets_history');
        $this->db->where('txid',$tx_id);
        $query = $this->db->get();
        $item = $query->row();
        return $item;
    }


    function get_coin_no($coin_no) {
        $this->db->select('*');
        $this->db->from('m_coin');
        $this->db->where('coin_no',$coin_no);
        $query = $this->db->get();
        $item = $query->row();
        return $item;
    }
	
	function get_coin_his($id,$type) {
		$this->db->select('*');
		$this->db->from('m_coin');
		$this->db->where('member_id',$id);
		$this->db->where('type',$type);
		$this->db->order_by('coin_no','desc');
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	
	// 코인 전체리스트
	function get_coin_li($type,$id=NULL) {
		$this->db->select('*');
		$this->db->from('m_coin');
		$this->db->where('type',$type);
		if($id){
			$this->db->where('member_id',$id);	
			$this->db->or_where('event_id',$id);	
		}
		$this->db->order_by('coin_no','asc');
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}
	
	function get_total_coin() {
		$this->db->select('sum(point) as point');
		$this->db->from('m_coin');
		$query = $this->db->get();
		$item = $query->row();
		return $item->point;
	}
	
/* =================================================================
* 코인 관련 합계
================================================================= */


	// 잔여 코인가져오기 - 총 보낸 코인 기준
	function get_coin_last($id,$type=NULL) {
		$this->db->select('member_id,event_id,point');
        $this->db->from('m_coin');
		if($type){
			$this->db->where('type',$type);			
		}   
		$this->db->where('member_id',$id);
        $this->db->or_where('event_id',$id);     
		$query = $this->db->get();
		$list = $query->result();

		$coin = 0;
		foreach ($list as $row) {			
			if ($row->event_id == $id) { // 코인받음
				$coin = $coin - $row->point;
			}
			else if ($row->member_id == $id) { // 코인보냄
				$coin = $coin + $row->point;
			}
		}
		
		$coin = round($coin,3);
		return $coin;
	}

	
	// 받은코인 수량
	function get_coin_receive($member_id,$kind= NULL) {
        $this->db->select('point');
        $this->db->from('m_coin');
        $this->db->where('event_id',$member_id);
        
		if ($kind != '') {
			$this->db->where('kind',$kind);
		}
        
		$query = $this->db->get();		
		$list = $query->result();

		$point = 0;
		foreach ($list as $row) {
			$point = $point + $row->point;
		}

		return $point;
    }
    
	// 보낸코인 수량
	function get_coin_send($member_id,$kind= NULL) {
        $this->db->select('point');
        $this->db->from('m_coin');
        $this->db->where('event_id',$member_id);
        
		if ($kind != '') {
			$this->db->where('kind',$kind);
		}
        
		$query = $this->db->get();		
		$list = $query->result();

		$point = 0;
		foreach ($list as $row) {
			$point = $point + $row->point;
		}

		return $point;
    }
    
/* =================================================================
* 코인 전송정보
================================================================= */

	// 코인전송내역 디비기록
	function coin_in($order_code,$member_id,$member_address,$event_id,$event_address,$unit,$point,$fee,$type,$msg=NULL) {
			
		$kind = "complete";
		
		$regdate = nowdate();
		
		// 메세지 없다면
		if ($msg == NULL) {
			$msg = '';
		}
		
		$query = array(
			'order_code' => $order_code,
			'member_id' => $member_id,
			'member_address' => $member_address,
			'event_id' => $event_id,
			'event_address' => $event_address,
			'type' => $type,
			'kind' => $kind,			
			'unit' => $unit,
			'point' => $point,
			'fee' => $fee,
			'saved_point' => $point,			
			'msg' => $msg,
		);

		$this->db->set('regdate', 'CURRENT_DATE()', FALSE);
		$this->db->insert('m_coin', $query);

	}
	
/* =================================================================
* 코인 etc
================================================================= */

	function get_coin_date($date) {
		$this->db->select('sum(point) as point');
        $this->db->from('m_coin');

        if ($date == 'yesterday') {
        	$this->db->where('regdate','CURRENT_DATE()',FALSE); // date_add->날짜 더하기, date_sub->날짜빼기
		}
		else if ($date == 'today') {
        	$this->db->where('regdate >=','CURRENT_DATE()',FALSE);
		}
		
		$query = $this->db->get();
		$item = $query->row();
		return $item->point;
    }
    

/* =================================================================
* 코인 관련 합계
================================================================= */
	
	// 코인합 정보 가져오기	
	function get_coin_total() {
		$this->db->select('point');
		$this->db->from('m_coin');        
		$query = $this->db->get();
		$list = $query->result();

		$item = 0;
		foreach ($list as $row) {
			$item = $item + $row->point;
		}
		$item = round($item,8); 
		
		return $item;
	}
	/*
	function get_coin_total() {
		$this->db->select('*');
		$this->db->from('m_cointotal');
		$this->db->where('state','');
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
	*/

	function  search_coin_list($payment_type,$from="",$to="",$sf="",$st="",$limit="10",$offeset=0){

	    $sql="SELECT  m_coin.* FROM m_coin INNER JOIN m_member ON m_coin.member_id = m_member.coin_id ";
	    $sql.=" WHERE payment_type = '$payment_type' ";
	    if($from && $to){
           $sql.=" AND m_coin.regdate BETWEEN '$from' AND '$to' ";
        }

	    if($sf && $st){
            $sql.=" AND $sf='$st'";
	    }

	    $sql.=" ORDER BY coin_no DESC ";

        $sql.=" LIMIT $offeset,$limit";



        $query= $this->db->query($sql);

        $row= $query->result();

        return $row;





    }




    function  search_coin_group($from="",$to="",$sf="",$st="",$search_type="date",$limit="10",$offeset=0){




        $sql = "SELECT *
            FROM (
            SELECT SUM(saved_point) total_point,event_address,(
            SELECT partner_company
            FROM m_member
            WHERE coin_addr=event_address) partner_company,m_coin.type, IF(m_coin.type = 'CON', SUM(payment_price*payment_amount), SUM(saved_point)) AS total_amount";
        if($search_type=="date"){
            if($from && $to){
                $sql.=",DATE_FORMAT( m_coin.regdate,'%Y-%m-%d')  regdate ";
            }
        }
        if($search_type=="month"){
            if($from && $to){
                $sql.=",DATE_FORMAT( m_coin.regdate,'%Y-%m')  regdate ";
            }
        }

        if($search_type=="year"){
            if($from && $to){
                $sql.=",DATE_FORMAT( m_coin.regdate,'%Y')  regdate ";
            }
        }
        $sql.="
            FROM m_coin
            INNER JOIN m_member ON m_coin.member_id = m_member.coin_id
            WHERE payment_type = 'PAYMENT'";

        if($search_type=="date"){
            if($from && $to){
                $sql.=" AND DATE_FORMAT( m_coin.regdate,'%Y-%m-%d') BETWEEN '$from' AND '$to' ";
            }

        }


        if($search_type=="month"){
            if($from && $to){
                $sql.=" AND DATE_FORMAT( m_coin.regdate,'%Y-%m') BETWEEN '$from' AND '$to' ";
            }

        }
        if($search_type=="year"){
            if($from && $to){
                $sql.=" AND  DATE_FORMAT( m_coin.regdate,'%Y')  BETWEEN '$from' AND '$to' ";
            }

        }



        $sql.="   GROUP BY event_address,m_coin.type";

        if($from && $to && $search_type=="date"){
            $sql.=",DATE_FORMAT( m_coin.regdate,'%Y-%m-%d')";
        }

        if($from && $to && $search_type=="month"){
            $sql.=",DATE_FORMAT( m_coin.regdate,'%Y-%m') ";
        }
        if($from && $to && $search_type=="year"){
            $sql.=",DATE_FORMAT( m_coin.regdate,'%Y') ";
        }
        $sql.="
            )imsi_table
            
            ";

        if($sf && $st){
            $sql.=" where $sf like '%$st%'";
        }
        if($from && $to) {
            $sql .= " order by regdate desc ";
        }
        $sql.=" LIMIT $offeset,$limit";



 




        $query= $this->db->query($sql);

        $row= $query->result();

        return $row;





    }



    function  search_coin_group_count($from="",$to="",$sf="",$st="",$search_type="date"){




        $sql = "SELECT  count(*)  as total 
            FROM (
            SELECT SUM(saved_point) total_point,event_address,(
            SELECT partner_company
            FROM m_member
            WHERE coin_addr=event_address) partner_company,m_coin.type, IF(m_coin.type = 'CON', SUM(payment_price*payment_amount), SUM(saved_point)) AS total_amount";
        if($search_type=="date"){
            if($from && $to){
                $sql.=",DATE_FORMAT( m_coin.regdate,'%Y-%m-%d') regdate";
            }
        }
        if($search_type=="month"){
            if($from && $to){
                $sql.=",DATE_FORMAT( m_coin.regdate,'%Y-%m')  regdate ";
            }
        }

        if($search_type=="year"){
            if($from && $to){
                $sql.=",DATE_FORMAT( m_coin.regdate,'%Y')  regdate ";
            }
        }
        $sql.="
            FROM m_coin
            INNER JOIN m_member ON m_coin.member_id = m_member.coin_id
            WHERE payment_type = 'PAYMENT'";

        if($search_type=="date"){
            if($from && $to){
                $sql.=" AND DATE_FORMAT( m_coin.regdate,'%Y-%m-%d') BETWEEN '$from' AND '$to' ";
            }

        }


        if($search_type=="month"){
            if($from && $to){
                $sql.=" AND DATE_FORMAT( m_coin.regdate,'%Y-%m') BETWEEN '$from' AND '$to' ";
            }

        }
        if($search_type=="year"){
            if($from && $to){
                $sql.=" AND  DATE_FORMAT( m_coin.regdate,'%Y')  BETWEEN '$from' AND '$to' ";
            }

        }



        $sql.="   GROUP BY event_address,m_coin.type";

        if($from && $to && $search_type=="date"){
            $sql.=",DATE_FORMAT( m_coin.regdate,'%Y-%m-%d')";
        }

        if($from && $to && $search_type=="month"){
            $sql.=",DATE_FORMAT( m_coin.regdate,'%Y-%m')";
        }
        if($from && $to && $search_type=="year"){
            $sql.=",DATE_FORMAT( m_coin.regdate,'%Y')";
        }
        $sql.="
            )imsi_table
            
            ";


        if($sf && $st){
            $sql.=" where $sf like '%$st%'";
        }

        $query=$this->db->query($sql);
        $item =$query->row();
        return $item->total;

        return $row;





    }




    function  search_coin_list_count($payment_type,$from="",$to="",$sf="",$st=""){

        $sql="SELECT    count(*)  as total  FROM m_coin INNER JOIN m_member ON m_coin.member_id = m_member.coin_id ";

        $sql.=" WHERE payment_type = '$payment_type' ";
        if($from && $to){
            $sql.=" AND m_coin.regdate BETWEEN '$from' AND '$to' ";
        }

        if($sf && $st){
            $sql.=" AND $sf='$st'";
        }
        $query=$this->db->query($sql);
        $item =$query->row();
        return $item->total;
    }
	
	// 개별 코인 합
	function get_coin_name_total($id,$type=NULL) {
		
		if($type == NULL){
			$type = "token";		
		}
		$whereOr = "member_id = '$id' OR event_id = '$id' ";
		
        $this->db->select('member_id,event_id,type,point,msg');
		$this->db->from('m_coin');
        $this->db->or_where($whereOr);
         
		$query = $this->db->get();
		$list = $query->result();
		

		$coin = 0;
		foreach ($list as $row) {
		
			if($type == $row->type){
				if ($row->member_id == $id) { // 코인충전
					$coin = $coin + $row->point;
				}
				else if ($row->event_id == $id) { // 코인보냄
					$coin = $coin - $row->point;
				}
			}
			if($row->type == 'token' && $row->msg == '토큰변환')
			{
				$coin = $coin - $row->point;
			}
		}

		$coin = round($coin,3);
		
		return $coin;
	}
}