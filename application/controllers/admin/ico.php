<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ico extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','admin','search'));
		$this->load->library('form_validation');
		//$this->output->enable_profiler(TRUE);

		admin_chk();
				
		define('SKIN_DIR', '/views/admin');

		//model load
		$this->load->model('m_cfg');
		$this -> load -> model('m_member');
		$this -> load -> model('m_admin');
		$this -> load -> model('m_coin');
		$this -> load -> model('m_ico');

	}

	function index()
	{
		$this->lists();
	}
	
	function lists()
	{
		$data['title'] = "2차 입금 리스트";
		$data['group'] = "2차관리";
		$cfg 			= get_cfg(); // 환경설정부분
		$data['cfg'] 	= $cfg; // 환경설정부분

		$data = page_lists_mssql('m_ico','ico_no',$data);
//		$data = page_lists1('m_ico','regdate',$data);

		layout('icoLists',$data,'admin');
		
	}

	
	
	// 매출 정보 삭제
	function delete()
	{
		$point_no = $this->input->post('idx');
		
		$this->db->where('ico_no', $point_no);
		$this->db->delete('m_ico');
		
		goto_url($_SERVER['HTTP_REFERER']);	

	}
	
	
	/*---------------------------------------------------*/
	// 토큰지급하기
	function bankOk()
	{		
		$data = array();
		$data['title'] = "이체현황";
		$data['group'] = "토큰지급";
		$cfg 			= get_cfg(); // 환경설정부분

		$ico_no = $this->input->post('idx');
		$count = $this->input->post('count');
		$memberID = $this->input->post('id');
		$address = $this->input->post('address');
			
		
		// 현재 지급가격으로 토큰을 지급한다.
		$send = $cfg->coin1_unit * $count / $cfg->coin1_volume;
		
		$this->db->where('ico_no', $ico_no);
		$this->db->set('tokens', $send, true);
		$this->db->update('m_ico');
		
		
		// 코인테이블에 입력하기
		$order_code = order_code();
			
		$mb = $this->m_member->get_member($memberID);	
			$coin_id = $mb->coin_id;	
			$coin_addr = $mb->coin_addr;
								
		$token_add = 0;
		if($cfg->coin1_flgs > 0){
			$token_add = $token_coin * $cfg->coin1_flgs / 100; // 인센티브 추가			
		}
		$token_coin = $send + $token_add;

		// 디비저장 - 코인기록
		$this->m_coin->coin_in($order_code,$mb->coin_id,$mb->coin_addr,'ICO',$address,$token_coin,'0.01',$count,'eth');
		
		// -------------------------------------------------------------------------------------------------------------------		
		
		alert("토큰으로 지급 처리를 하었습니다", "admin/ico/lists");

	}
	
	// 입금확인하기
	function complate()
	{		
		$cfg 			= get_cfg(); // 환경설정부분
		$data['cfg'] 	= $cfg; // 환경설정부분

		$ico_no = $this->input->post('idx');
			
			
		$this->db->where('ico_no', $ico_no);
		$this->db->set('result', '1', true);
		$this->db->update('m_ico');
		
		// -------------------------------------------------------------------------------------------------------------------
		
		alert("입금확인 처리를 하었습니다", "admin/ico/lists");

	}
	/*---------------------------------------------------*/
	
	// 엑셀	
	function find()
	{
		$data['title'] = "환전 신청 리스트검색";
		$data['group'] = "포인트관리";
		
		$data['nowday'] = nowday();


		$this->form_validation->set_rules('startday', 'startday', 'required');


		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('admin/exchangeFind',$data);

		} else {
		
			$start = $this->input->post('startday').' 00:00:00';
			$end = $this->input->post('endday').' 23:59:59';
			$kind = $this->input->post('kind');
			
			$data['item'] = $this->m_admin->exchangefind($start,$end,$kind);
			
			// 가공
			$data['total'] = 0;
			
			foreach ($data['item'] as $row) {
				
			 	$member = $this->m_member->get_member($row->member_id);
			 		$row->mobile 		= $member->mobile;
			 		$row->name 			= $member->name;
			 		$row->bank_name 	= $member->bank_name;
			 		$row->bank_holder 	= $member->bank_holder;
			 		$row->bank_num 		= $member->bank_number;
			 		
			 	$row->regdate 	=  substr($row->regdate,0,10);
			 	$data['total'] 	= $data['total'] + $row->point;
			}
		
			$this->load->view('admin/exchangeFindLists',$data);

		}
		
		
	}	
	
	// 승인처리하기
	function findset()
	{
		$data['title'] = "환전 신청 리스트검색";
		$data['group'] = "포인트관리";
		
		$start = $this->input->post('startday').' 00:00:00';
		$end = $this->input->post('endday').' 23:59:59';
		
		
		$this->m_admin->exchangeupdate($start,$end);
		alert("저장이 완료 되었습니다", "admin/point/find");
		
	}
	
	
	function excel1()
	{
		$this->load->helper('download');
		
			$headers = '';
			$start = $this->input->post('startday');
			$end = $this->input->post('endday');
			$kind = $this->input->post('kind');
			
			$item = $this->m_admin->banking_list1($start,$end,$kind);
			
		$i = 1;

		header('Content-Type: application/vnd.ms-excel');
		header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		header('Content-Disposition: attachment; filename="IBTbank_' . nowday() . '.xls"');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('content-transfer-encoding: binary');
		echo "<html><head>";
		echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
		echo "</head><body>";

		echo "<table border=1 style='font-family:돋움; font-size:12pt;'>
		<tr bgcolor='#f2f2f2'>
			<td height='35' align='center'>번호</td>
			<td align='center'>아이디</td>
			<td align='center'>송금액</td>
			<td align='center'>수수료</td>
			<td align='center'>예금주</td>
			<td align='center'>계좌번호</td>
			<td align='center'>은행명</td>		
			<td align='center'>신청일</td>
		</tr>";
		
		foreach ($item as $row) {
			$row->point = $row->point;
			$row->fee = $row->fee;
			
			$mb = $this->m_member->get_member($row->member_id);	
	
		echo "<tr>\n";
		echo "<td height='25' align=center style='mso-number-format:\@'>" .$i ."</td>\n"; 
		echo "<td align=center>" .$row->member_id ."</td>\n";  
		echo "<td align=center style='mso-number-format:\@'>" .$row->point ."</td>\n"; 
		echo "<td align=center style='mso-number-format:\@'>" .$row->fee ."</td>\n"; 
		echo "<td align=center>" .$mb->bank_holder ."</td>\n"; 
		echo "<td align=center style='mso-number-format:\@'>" .$mb->bank_number ."</td>\n"; 
		echo "<td align=center>" .$mb->bank_name ."</td>\n";
		echo "<td align=center>" .$row->regdate ."</td>\n";  
		
		
		$i++;
		}
		
        echo "</tr>\n";
		echo "</table>";
		echo "</body></html>";
		
		if ($i == 0)
        	alert("자료가 없습니다.");

		exit;
		
		
	}
	
}
?>