<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Member extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('form','url','admin','search','office'));		
		admin_chk();
		
		$this->load->library('form_validation');
		$this->load->library('bitcoin');
		$this->load->library('qrcode');
			
		//model load
		$this->load->model('m_cfg');
		$this->load->model('m_coin'); // 코인전송용
		$this->load->model('m_admin'); // 서치용 및 리스트용
		
		$this->load->model('m_member');
		$this->load->model('m_office');
		$this->load->model('m_point');
		$this->load->model('m_research');
		
	}

	function lists()
	{
		
		$data = array();
		$data['title'] = "회원현황";
		$data['group'] = "회원관리";
		$data['level'] =$this->session->userdata('level');
	
		$data = page_lists_mssql('m_member','member_no',$data,'type','1');
		
		// 가공
		foreach ($data['item'] as $row) {			
			// 코인잔고
			$param_bal = array();

			$param_bal['APT_TYPE'] = 'W_GETBAL';
			$param_bal['COIN'] = 'CON';
			$param_bal['MEMBER_ID'] = $row->member_id;
			$bal = $this->m_member->getApiData($param_bal);
			$balance = json_decode(trim($bal), true);
			$row->bal = $balance['BALANCE'];  // 잔고
		}


		layout('memberLists',$data,'admin');
	}
	
	
	// 회원정보 수정
	function write()
	{
//		alert("test");




		$data = array();
		$data['title'] = "회원정보 수정";
		$data['group'] = "회원관리";
		$data['level'] =$this->session->userdata('level');
		$member_id   = $this->uri->segment(4,0);
		
		
		if ($member_id) {
			
			$data['item'] = $this->m_member->get_mb($member_id); //멤버 정보 가져오기
			
			$data['mode'] = "update";

		} else {
		
			$data['mode'] = "new";
		}

		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('coin_id', 'coin_idpassword', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/memberWrite',$data);

		} else {
			
			$coin_id = $this->input->post('coin_id');
			
			$this->m_member->member_up1($coin_id);


		 alert("수정이 완료되었습니다", "admin/member/write/".$coin_id ."");

		}
	}
	
	
	// 회원 등록 - 관리자에서 회원가입하기
	function add()
	{

		$data = array();
		$data['title'] = "회원정보 수정";
		$data['group'] = "회원관리";

		$member_id   = $this->uri->segment(4,0);
		
		$data['center'] = $this->m_office->get_center_li(); //센터 리스트 가져오기
		

		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('admin/memberAdd',$data);

		} else {
			
			$member_id = $this->input->post('member_id');
			
			$addr = $this->generateRandomString();
			$addr = $this->generateRandomText($addr);
			
			$this->qrcode($member_id,$addr);
			$qrimg = $member_id .".png";
			
			$this->qrcode($member_id,$addr);
			$myqr = $member_id .".png";		
			$qrimg = '/home/ibt/www/data/member/'.$myqr;
			
			$reg = $this->m_member->member_in($addr,$qrimg);
			alert("등록 완료 되었습니다","admin/member/add");			

		}
	}
	
	
	public function qrcode($member_id,$addr)
	{

		$qrimg = '/home/Revv_Wallet/www/data/member/'.$member_id .".png";

		QRcode::png($member_id,$qrimg,QR_ECLEVEL_L);

	}
	
	// 회원정보 삭제
	function delete()
	{

		$data['level'] =$this->session->userdata('level');

		$idx = $this->input->post('idx'); // 아이디
		
		$this->db->where('member_id', $idx);
		$this->db->delete('m_member');
		
		$this->db->where('member_id', $idx);
		$this->db->delete('m_coin');
		
		
		goto_url($_SERVER['HTTP_REFERER']);
		
	}
	
	function id_make()
	{

		$item = 1;
		
		while ($item == 1 ) { 

			$rand = rand(1,999999);

			$mb =  'K'.$rand;

			$this->db->select('member_id');
			$this->db->from('m_member');
			$this->db->where('member_id',$mb);
			$query = $this->db->get();
			$item = $query->num_rows();

		}

		return $mb;

	}
	
	// 지갑주소
	function addressList()
	{
		$data = array();
		$data['title'] = "회원 실적";
		$data['group'] = "회원관리";
		
		$member_id = $this->uri->segment(4,0);
		$data['member_id'] = $member_id;
		$data['item']['member_id'] = $member_id;
		$data['item'] = $this->m_member->get_Coinaddr($member_id); //멤버 정보 가져오기

		$this->load->view('admin/memberAddress',$data);

	}

	// 코인 환전 현황
	function exchange()
	{
		
		$data = array();
		$data['title'] = "환전 현황";
		$data['group'] = "회원관리";
		
		$cfg = get_cfg(); //멤버 정보 가져오기
			$data['cfg'] = $cfg;
		
		$member_id   = $this->uri->segment(4,0);
			$data['member_id'] = $member_id;
		
		$data['exchange_total'] = $this->m_coin->get_coin_cate('exchange',$member_id);
		$data['list'] = $this->m_coin->list_coin_cate('exchange',$member_id);
		
		
		$this->load->view('admin/memberExchange',$data);	
	}


	// 회원 입금확인 - 코인지급하기
	function bank()
	{
		$data = array();
		$data['title'] = "회원 입금확인";
		$data['group'] = "회원관리";
		
		$cfg = get_cfg(); //멤버 정보 가져오기
			$data['cfg'] = $cfg;
			
		$member_id   = $this->uri->segment(4,0);
		$data['member_id'] = $member_id;

		$this->form_validation->set_rules('amount', 'amount', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('admin/memberBank',$data);

		} else {
					
			$member_id = $this->input->post('member_id');
			
			// 현재 가격에 맞게 코인수 지급하기 coin1_unit			
			//$sale = $this->input->post('amount') / $this->input->post('coin1_unit');
			
			//$flgs = $this->input->post('coin1_flgs'); // 매출구분
			
			// 인센티브 적용하면 반영해 추가 지급하기 coin1_volume
			//$add = $sale * $this->input->post('coin1_flgs') / 100;

			//$amount = $sale + $add + 1;			
			
				
			$order_code = order_code();  // 주문코드 만들기

			// 코인 지급 - 회원정보에서 지갑 주소를 얻음
			$sd = $this->m_member->get_member('admin');			
			
			// 코인 받는 - 회원정보에서 지갑 주소를 얻음
			$mb = $this->m_member->get_mb($member_id);
		
			
			// 디비저장 - 코인기록
			$this->m_coin->coin_in($order_code,$member_id,$mb->coin_addr,'admin',$sd->coin_addr,$this->input->post('amount'),'0.01',$this->input->post('coin1_flgs'),'bank');	
			

			alert("토큰 지급처리를 하었습니다", "admin/member/bank/".$member_id ."");	
			
		}
	}
	

	// 회원 입금확인 - 토큰지급하기
	function send()
	{
		$data = array();
		$data['title'] = "회원 입금확인";
		$data['group'] = "회원관리";
			
		$member_id   = $this->uri->segment(4,0);
		$data['member_id'] = $member_id;

		$this->form_validation->set_rules('amount', 'amount', 'required');
		$this->form_validation->set_rules('receive', 'receive', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('admin/memberSend',$data);

		} else {
			
			$amount = $this->input->post('amount');	
			$member_id = $this->input->post('member_id');				

			// 코인 지급 - 회원정보에서 지갑 주소를 얻음
			$sen = $this->m_member->get_mb($member_id);
			
			// 코인 받는 - 회원정보에서 지갑 주소를 얻음
			$receive = $this->input->post('receive');
			$rev = $this->m_member->get_member($receive);
			
			// 코인 잔액
			$data['bal'] = $this->m_point->get_point($member_id);
			$data['bal'] = $this->m_coin->get_coin_last($member_id);

			//$data['bal'] = $this->bitcoin->getbal($sen->coin_id);
			
			//예외 처리
			if ($data['bal'] < $amount) {
				alert($bal);
			}
			$order_code = order_code();  // 주문코드 만들기

			$this->m_coin->coin_trans($order_code,$rev->coin_id,$rev->coin_addr,$member_id,$sen->coin_addr,$amount,'out'); // 트랜스퍼기록하기 보내기

			alert("토큰을 전송하였습니다.", "admin/member/send/".$member_id ."");	
			
		}
	}
		
	// 코인지급하기(내부지갑이동)
	// 2018-04-09


	function  multicoinsend(){

		if( $this->session->userdata('level') == "10") {
			//alert("권한이 없습니다");

			$data = array();
			$data['title'] = "코인지급";
			$data['group'] = "회원관리";

			$member_id = $this->uri->segment(4, 0);
			$coin = $this->uri->segment(5, 0);
			$data['member_id'] = $member_id;
			$data['coin'] = $coin;

			$this->form_validation->set_rules('Sender', 'Sender', 'required');
			$this->form_validation->set_rules('Sender', 'sender_amount', 'required');

			if ($coin == "") {
				$coin = default_coin;
			}


			$users = $this->input->post("users");
			$users = explode(",", $users);
			$sender_id = array();
			$sender_name = array();
			$sender_email = array();

			foreach ($users as $user) {


				$row = explode("|", $user);


				array_push($sender_id, $row[0]);
				array_push($sender_name, $row[2]);
				array_push($sender_email, $row[1]);

			}


			$data['sender_id'] = $sender_id;
			$data['sender_name'] = $sender_name;
			$data['sender_email'] = $sender_email;


			// 코인잔고
			$param_bal = array();

			$param_bal['APT_TYPE'] = 'W_GETBAL';
			$param_bal['COIN'] = $coin;
			$param_bal['MEMBER_ID'] = 'admin';


			$bal = $this->m_member->getApiData($param_bal);
			$balance = json_decode(trim($bal), true);

			$data['bal'] = $balance['BALANCE'];


			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/memberCoinSends', $data);
			} else {


				$sender_id = explode(",", $this->input->post("sender_id"));
				$sender_amount = explode(",", $this->input->post("sender_amount"));
				$sucess = array();
				foreach ($sender_id as $key => $item) {


					$member_id = $item;

					$wallet = $this->m_member->get_Coinaddr($member_id, $coin);


					if ($wallet[0]->wallet) {
						//	$data['wallet_status'] = "<font color='blue'><b>주소 발급된 계정</b></font>";
						$trade_status = true;

						// 코인잔고
						$param_bal = array();

						$param_bal['APT_TYPE'] = 'W_GETBAL';
						$param_bal['COIN'] = $coin;
						$param_bal['MEMBER_ID'] = $wallet[0]->member_id;


						$bal = $this->m_member->getApiData($param_bal);


						$balance = json_decode(trim($bal), true);

						$data['balance'] = $balance['BALANCE'];
					}


					$amount = $this->input->post('amount');


					// 코인 지급자 아이디를 넣음
					// 차후에 다른곳에서 보낼 수도 있으므로 INPUT으로 처리
					$Sender = $this->input->post('Sender');

					//예외 처리
					if ($data['bal'] < $amount) {
						alert($bal);
					}

					$param_tran = array();
					$param_tran['APT_TYPE'] = 'W_TRANS';
					$param_tran['FROM_ADDR'] = $Sender;
					$param_tran['TO_ADDR'] = $wallet[0]->wallet;
					$param_tran['COIN'] = $coin;
					$param_tran['AMOUNT'] = $sender_amount[$key];

					$data['coin'] = $coin;
					$curl_tran = $this->m_member->getApiData($param_tran);


					$tran = json_decode(trim($curl_tran), true);


					$sucess[$key] = $tran['CODE'];


				}
				$data['sender_id'] = explode(",", $this->input->post("sender_id"));
				$data['sender_name'] = explode(",", $this->input->post("sender_name"));
				$data['sender_email'] = explode(",", $this->input->post("sender_email"));
				$data['sucess'] = $sucess;

				$this->load->view('admin/memberCoinSends_result', $data);

			}
		}else{
			echo "권한이 없습니다.";
		}

	}
	function coinsend()
	{



		if( $this->session->userdata('level') == "10") {

			//alert("권한이 없습니다");

			$data = array();
			$data['title'] = "코인지급";
			$data['group'] = "회원관리";

			$member_id = $this->uri->segment(4, 0);
			$mem = $this->m_member->get_id($member_id);

			$coin = $this->uri->segment(5, 0);
			$data['name'] = $mem->name;
			$data['member_id'] = $member_id;
			$data['coin'] = $coin;
			$this->form_validation->set_rules('amount', 'amount', 'required');
			$this->form_validation->set_rules('Sender', 'Sender', 'required');

			if ($coin == "") {
				$coin = default_coin;

			}


			// 코인잔고
			$param_bal = array();

			$param_bal['APT_TYPE'] = 'W_GETBAL';
			$param_bal['COIN'] = $coin;
			$param_bal['MEMBER_ID'] = 'admin';


			$bal = $this->m_member->getApiData($param_bal);
			$balance = json_decode(trim($bal), true);

			$data['bal'] = $balance['BALANCE'];

			$wallet = $this->m_member->get_Coinaddr($member_id, $coin);


			if ($wallet[0]->wallet) {
				//	$data['wallet_status'] = "<font color='blue'><b>주소 발급된 계정</b></font>";
				$trade_status = true;

				// 코인잔고
				$param_bal = array();

				$param_bal['APT_TYPE'] = 'W_GETBAL';
				$param_bal['COIN'] = $coin;
				$param_bal['MEMBER_ID'] = $wallet[0]->member_id;


				$bal = $this->m_member->getApiData($param_bal);


				$balance = json_decode(trim($bal), true);

				$data['balance'] = $balance['BALANCE'];
			} else {
				$param_bal['APT_TYPE'] = 'ERC20_ADD';
				$param_bal['COIN'] = default_coin;
				$param_bal['MEMBER_ID'] = $member_id;
				$bal = $this->m_member->getApiData($param_bal);


				//$data['wallet_status'] = "<font color='red'><b>주소 미발급 계정</b></font>";
				$trade_status = false;

				$data['balance'] = 0;
			}

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/memberCoinSend', $data);
			} else {


				$amount = $this->input->post('amount');
				$amount = str_replace(",", "", $amount);
				$member_id = $this->input->post('member_id');

				// 코인 지급자 아이디를 넣음
				// 차후에 다른곳에서 보낼 수도 있으므로 INPUT으로 처리
				$Sender = $this->input->post('Sender');

				//예외 처리
				if ($data['bal'] < $amount) {
					alert($bal);
				}

				$param_tran = array();
				$param_tran['APT_TYPE'] = 'W_TRANS';
				$param_tran['FROM_ADDR'] = $Sender;
				$param_tran['TO_ADDR'] = $wallet[0]->wallet;
				$param_tran['COIN'] = $coin;
				$param_tran['AMOUNT'] = $amount;


				$data['coin'] = $coin;
				$curl_tran = $this->m_member->getApiData($param_tran);

				echo $curl_tran;


				$tran = json_decode(trim($curl_tran), true);

				if ($tran['CODE'] == "0000") {
					// 지급한 토큰은 0으로..
					//	$order_code = order_code();  // 주문코드 만들기
					//	$this->m_coin->coin_in($order_code,'admin','admin',$member_id,$member_id,'0',$amount,'0','coin',$Sender.'->'.$member_id." : ".$amount." REC");

					alert($tran['MSG'], "admin/member/coinsend/" . $member_id . "");
				} else {

					alert($tran['MSG'], "admin/member/coinsend/" . $member_id . "");
				}

			}
		}else{
			echo "권한이 없습니다.";
		}
	}	
		
/*=============================================================================================================*/

	// 추천 수당 처리
	function recommend($member_id,$order_code,$recommend_id){
		
		$r_amount = 100; // 추천수당
		$loan = 0;
		$kind = "recommend";
		
		$get_user = $this->m_member->get_member($member_id);

		$user = $this->m_member->get_member($get_user->member_id); //시작 유저 (매출자)


		if ($user) {
				
			$re = $this->m_member->get_member($recommend_id);
				$re_addr = $re->coin_addr;
				$re_coin = $re->coin_id;	// 최초의 회원아이디 -> 아이디 변경할 경우 대비
				
			// 이체 전송
			//$send = $this->bitcoin->sendfrom($member_id,$re_addr,$r_amount);
			$this->m_coin->coin_in($order_code,$get_user->coin_id,$get_user->coin_addr,$re_coin,$re_addr,$r_amount,'0.00',$kind);

			//수당기록
			$this->m_point->point_su($order_code,$recommend_id,$member_id,$r_amount,$loan,$kind,'활동비 / 회원 : '.$member_id);

		}

	}
	
	// 센터비
	function center($member_id,$order_code,$center_id){
		
		$c_amount = 50; // 센터비
		$loan = 0;
		$kind = "center";
		
		$get_user = $this->m_member->get_member($member_id);

		$user = $this->m_member->get_member($get_user->member_id); //시작 유저 (매출자)

		if ($user) {
				
			$ct = $this->m_member->get_member($center_id);
				
			// 이체 전송
			//$send = $this->bitcoin->sendfrom($member_id,$ct->coin_addr,$c_amount);
			//$this->m_coin->coin_in($order_code,$get_user->coin_id,$get_user->coin_addr,$ct->coin_id,$ct->coin_addr,$c_amount,'0.00',$kind);
			
			//수당기록
			$this->m_point->point_su($order_code,$center_id,$member_id,$c_amount,$loan,$kind,'관리비 / 회원 : '.$member_id);

		}
	}   

	// 회원 히스토리
	function history()
	{
		$data = array();
		$data['title'] = "회원 히스토리";
		$data['group'] = "회원관리";
		
		$member_id   = $this->uri->segment(4,0);
		$data['item']['member_id'] = $member_id;
		
		$data['history'] = $this->m_office->get_su_his($member_id);
		
		
		$this->load->view('admin/memberHistory',$data);

	}

	// 회원 전체히스토리 - excel down
	function excel()
	{
		$data = array();
		$data['title'] = "회원 히스토리";
		$data['group'] = "회원관리";
		
		$list = $this->m_member->get_member_li();

		// PHPExcel 라이브러리 로드
		$this->load->library('excel');
		// 워크시트에서 1번째는 활성화
		$this->excel->setActiveSheetIndex(0);
		// 워크시트 이름 지정
		$this->excel->getActiveSheet()->setTitle('회원목록');
		// A1의 내용을 입력 합니다.
		$this->excel->getActiveSheet()->setCellValue('A1', '번호');
		$this->excel->getActiveSheet()->setCellValue('B1', 'Account');
		$this->excel->getActiveSheet()->setCellValue('C1', '회원이름');
		$this->excel->getActiveSheet()->setCellValue('D1', 'Email');
		$this->excel->getActiveSheet()->setCellValue('E1', '가입일');
//		$this->excel->getActiveSheet()->setCellValue('H1', '보낸이클수');

		$i = 2;
		foreach ($list as $row) {
			
			$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-1);
			$this->excel->getActiveSheet()->setCellValue('B'.$i, $row->coin_id);
			$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->name);
			$this->excel->getActiveSheet()->setCellValue('D'.$i, $row->member_id);
			$this->excel->getActiveSheet()->setCellValue('E'.$i, date("y-m-d",strtotime($row->regdate)));
//			$this->excel->getActiveSheet()->setCellValue('H'.$i, 0);
			$i ++;
		}
		// A1의 폰트를 변경 합니다. 
		//$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		// A1의 글씨를 볼드로 변경합니다.
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
//		$this->excel->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);
		// A1의 컬럼에서 가운데 쓰기를 합니다.
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		 
		$filename='member_list.xls'; // 엑셀 파일 이름
		header('Content-Type: application/vnd.ms-excel'); //mime 타입
		header('Content-Disposition: attachment;filename="'.$filename.'"'); // 브라우저에서 받을 파일 이름
		header('Cache-Control: max-age=0'); //no cache
					 
		// Excel5 포맷으로 저장 엑셀 2007 포맷으로 저장하고 싶은 경우 'Excel2007'로 변경합니다.
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		// 서버에 파일을 쓰지 않고 바로 다운로드 받습니다.
		$objWriter->save('php://output');
	}


	
/*------------------------------------------------------------------------------*/

}
?>
