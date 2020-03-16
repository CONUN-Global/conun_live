<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once('/home/mircoinnet/www/application/libraries/ethereum.php');
use Blocker\Bip39\Bip39;
use Blocker\Bip39\Util\Entropy;
class Register extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		define('SKIN_DIR', '/views/web/conun');
		
		$this->load->library('form_validation');
		$this->load->library('qrcode');

		
		$this ->load-> model('m_member');

		
	}
	
	
	// 회원가입
	function index() {
		$this->load->language('alert');
		$this->lang->load('register');
		// 이미 로그인 햇다면
		if ($this->session->userdata('is_login') == TRUE) {
			redirect('/coin');
		}
		
		$data = array();

		$data['header'] = array('title'=>'Join','group'=>'signup-page');
		$data['conf'] = get_site(); 

		$this->form_validation->set_rules('member_id', '이메일주소', 'required');
		$this->form_validation->set_rules('password', '암호입력', 'required');
		$this->form_validation->set_rules('password2', '암호확인', 'required');
		
		if ($this->form_validation->run() == FALSE)	{
			
			$lang = get_cookie('lang');
		
		 
				layout('/conun/signup.html',$data,'conun_login');
		 

		} else {
			
			$member_id = strtolower($this->input->post('member_id'));

			// code_id 자동생성하기	
			$code_id = $this->id_make();

			// 중복 있으면 생성하기
			$ck = $this->m_member->get_id($code_id);
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
			//$address = $this->bitcoin->getnewaddress($coin_id);
			
			//통신 안될경우 중단
			//if(!$address) {
			//	alert("Error : 123008 Code");
			//}
			
			//$qrimg = $coin_id; 
			//qrcode($qrimg ,$address);
			
			//$coin_img = $qrimg .".png";
			//$type = "coin"; // 전자지갑 coin
			//$this->m_member->member_wallet($coin_id,$address,$coin_img,$type);
			
			/*-------------------------------------------------------------*/
			
			/* ICO토큰주소 생성 */
			//$addr = generateRandomString2(); // 짧게
			//$addr = generateRandomText($addr); // 길게
			/* ICO토큰주소 생성 */
			
			//$qrimg = $coin_id ."_t"; // ico qrcode
			//qrcode($qrimg,$addr);
			
			//$tok_img = $qrimg .".png";
			//$type = "token"; // 전자지갑 token
			//$this->m_member->member_wallet($coin_id,$addr,$tok_img,$type);

			// 회원 정보 기록

			$entropy = Entropy::random(128);
			$this->m_member->member_reg($code_id,$entropy);

			// 지갑주소 발급

			/*-------------------------------------------------------------*/

			//기록된 회원 정보 가져오기
			$member = $this->m_member->get_member($member_id);			

			// 비트코인 지갑주소 생성
			$param = array();

			$param['APT_TYPE'] = 'W_CREATEADDR';
			$param['MEMBER_ID'] = $member_id;
			$curl_api = $this->m_member->getApiData($param);
			$create_addr = json_decode(trim($curl_api), true);
			$address = $create_addr['ADDR'];







			$param_bal['APT_TYPE'] = 'ERC20_ADD';
			$param_bal['COIN'] = 'CON';
			$param_bal['MEMBER_ID'] = $member->coin_id;
			$this->m_member->getApiData($param_bal);


			$param_bal['APT_TYPE'] = 'POINT_ADD';
			$param_bal['COIN'] = 'CONP';
			$param_bal['MEMBER_ID'] = $member->coin_id;
			 $this->m_member->getApiData($param_bal);



	        $param_bal['APT_TYPE'] = 'POINT_ADD';
			$param_bal['COIN'] = 'MOCP';
			$param_bal['MEMBER_ID'] = $member->coin_id;
			 $this->m_member->getApiData($param_bal);



			
			//$qrimg = $coin_id; 
			//qrcode($qrimg ,$address);

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
				alert("Create An Account", "conun/seed");
			}
		}

	}

	function  privacy(){
		$this->load->language('alert');
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'signup-page');
		$data['conf'] = get_site();
		layout('/app/privacy',$data,'app_main');
	}
	function  auth_mail(){
		$this->load->language('alert');
		$lang = get_cookie('lang');
		$email  = $this->input->get_post("email");
		$auth_number=str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

			$title="[CONUN] Certification number mail";
			$content="Please enter your Personal Identification number [{$auth_number}].";


		$this->m_member->mail($email,$title,$content);
	    echo "<input type='hidden' name='maile_send' value='Y' id='maile_send'>";
		echo "<input type='hidden' name='auth_number' id='auth_number' value='{$auth_number}'>";


	}
	function  seed_view(){

		$this->load->language('alert');
		$mb = $this->m_member->get_member($this->session->userdata('member_id'));

		$entropy = new Entropy($mb->member_crypt);

		$bip39 = new Bip39('en');
		$data['seed']= (string) $bip39->setEntropy($entropy)->encode();

		$lang = get_cookie('lang');

		layout('/app/seed_view',$data,'app_main');






	}

	function  reset_pw(){
		$this->lang->load('reset_pw');
		$this->load->language('alert');
		$data['header'] = array('title'=>SITE_NAME_EN,'group'=>'signup-page');


		$this->form_validation->set_rules('member_id', '이메일주소', 'required');
		$this->form_validation->set_rules('mail_code', '인증코드', 'required');


		if ($this->form_validation->run() == FALSE) {
			layout('/conun/resetpw.html',$data,'conun_login');

		}else{
			$pass1=generateRandomString(8);
			$this->m_member->member_up_recovery2($_POST[member_id],$pass1);


			$title="Conun temporary password";
			$content="Conun The temporary password is $pass1 <br>";
			$content.="Please change your password after login.";

			$msg="Your e-mail temporary password has been sent.";

			$this->m_member->mail($_POST[member_id],$title,$content);

			alert($msg,"/");

		}








	}

	function id_make()
	{

		$item = 1;
		
		while ($item == 1 ) { 

			$rand = rand(1,999999);

			$mb =  'RE'.$rand;

			$this->db->select('member_id');
			$this->db->from('m_member');
			$this->db->where('member_id',$mb);
			$query = $this->db->get();
			$item = $query->num_rows();

		}

		return $mb;

	}
	
}

?>
