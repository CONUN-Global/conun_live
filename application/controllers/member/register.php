<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once('/home/mircoinnet/www/application/libraries/ethereum.php');

class Register extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		$this->load->library('qrcode');

		// 비트코인 라이브러리 로드
		$this->load->library('bitcoin');
		// 이더리움 라이브러리 로드
//		$this->load->library('ethereum');
		
		$this ->load-> model('m_member');

		
	}
	
	
	
	// 회원가입
	function index() {
		
		// 이미 로그인 햇다면
		if ($this->session->userdata('is_login') == TRUE) {
			redirect('/token');
		}
		
		$data = array();

		$data['header'] = array('title'=>'Join','group'=>'signup-page');
		$data['conf'] = get_site(); 

		$this->form_validation->set_rules('member_id', '이메일주소', 'required');
		$this->form_validation->set_rules('password', '암호입력', 'required');
		$this->form_validation->set_rules('password2', '암호확인', 'required');
		
		if ($this->form_validation->run() == FALSE)	{
			
			$lang = get_cookie('lang');
		
			if ($lang == "us" or $lang == "") {
				layout('/member/register',$data);
			}

			else if ($lang == "cn") {
				layout('/member/register_CN',$data);
			}

			else if ($lang == "jp") {
				layout('/member/register_JP',$data);
			}
			
			else if ($lang == "kr") {
				layout('/member/register_KR',$data);	
			}


		} else {
			
			$member_id = strtolower($this->input->post('member_id'));
			$arr_id = explode('@', $member_id);
			$coin_id = $arr_id[0]; // 있으면 틀리게 입력하기
				
			// 중복 있으면 생성하기
			$ck = $this->m_member->get_id($coin_id);
			if($ck){
				$coin_id= id_make($coin_id);
				
				// 한번만 더 체크하기
				$ck = $this->m_member->get_id($coin_id);
				if(!$ck){
					alert("Email Checked");					
				}
			}
			
			/*-------------------------------------------------------------*/
			
			/* 코인 지갑생성*/
			// 비트코인 지갑주소 생성
			$address = $this->bitcoin->getnewaddress($coin_id);
			
			//통신 안될경우 중단
			if(!$address) {
				alert("Error : 123008 Code");
			}
			
			$qrimg = $coin_id; // mircoin qrcode
			qrcode($qrimg,$address);
			
			$coin_img = $qrimg .".png";
			$type = "coin"; // 전자지갑 coin
			$this->m_member->member_wallet($coin_id,$address,$coin_img,$type);
			
			/*-------------------------------------------------------------*/
			
			/* ICO토큰주소 생성 */
			$addr = generateRandomString2(); // 짧게
			$addr = generateRandomText($addr); // 길게
			/* ICO토큰주소 생성 */
			
			$qrimg = $coin_id ."_t"; // ico qrcode
			qrcode($qrimg,$addr);
			
			$tok_img = $qrimg .".png";
			$type = "token"; // 전자지갑 token
			$this->m_member->member_wallet($coin_id,$addr,$tok_img,$type);
			
			/*-------------------------------------------------------------*/
			
			/* ETC 주소 생성
			$item = $this->m_member->get_etc(); //  디비의 값 추출
			
			$qrimg = $coin_id ."_e"; // ico qrcode
			qrcode($qrimg,$item->wallet);
			
			$etc_img = $qrimg .".png";
			$type = "etc"; // 전자지갑 etc
			$this->m_member->member_wallet($coin_id,$item->wallet,$etc_img,$type);
				
			$this->db->where('idx', $item->idx);
			$this->db->set('qrcode',$qrimg);
			$this->db->update('m_ico');	 */		
			
			/* ETC 주소 생성 */
			require '/home/mircoinnet/www/application/libraries/ethereum.php';
			$eth = new Ethereum('211.238.13.157', 8545);

			$item = $eth->personal_newAccount($coin_id);

			$qrimg = $coin_id ."_e"; // ico qrcode
			qrcode($qrimg,$item);
			
			$etc_img = $qrimg .".png";
			$type = "etc"; // 전자지갑 etc

			// ico 정보 기록
			$this->m_member->ico_reg($coin_id, $item, $qrimg);
			$this->m_member->member_wallet($coin_id,$item->wallet,$etc_img,$type);
			
			/*-------------------------------------------------------------*/
			
			// 회원 정보 기록
			$this->m_member->member_reg($coin_id);
			
			/*-------------------------------------------------------------*/
			
			//기록된 회원 정보 가져오기
			$member = $this->m_member->get_member($member_id);

			//세션 굽기
			$member_ses= array(
				'member_id'  => $member->member_id,
				'coin_id'  => $member->coin_id,
				'is_login' => TRUE,
				'login_type' => "default"
			);
			$this->session->set_userdata($member_ses);
		

			// 가입후 페이징 처리
			if ($this->session->userdata('is_login') == 1) {
				alert("Create An Account", "token");
			}
		}

	}
	
}

?>
