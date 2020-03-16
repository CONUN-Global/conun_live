<?
class M_member extends CI_Model {


 private $urls = "http://api.conunkorea.io/api/wallet_api_self";
 private $url = "http://api.conunkorea.io//api/wallet_api_self";


	function __construct()
	{
		parent::__construct();
        $this->load->library('email');
	}



	function  mail($to,$title,$content){
        $config['useragent'] = '';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config["smtp_user"]="conun.help@gmail.com"; //메일아이디@gmail.com
        $config["smtp_pass"]="cn!@3456"; //메일아이디@gmail.com
        $config['smtp_port'] = 465;
        $config['smtp_timeout'] = 5;
        $config['wordwrap'] = TRUE;
        $config['wrapchars'] = 76;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['newline'] = "\r\n";
        $config['crlf']    = "\n";
        $config['bcc_batch_mode'] = FALSE;
        $config['bcc_batch_size'] = 200;

        $this->load->library("email");
        $this->email->initialize($config);

        $this->email->from("conun.help@gmail.com");
        
        $this->email->to($to);
        $this->email->subject($title);
        $this->email->message($content);
        $this->email->send();



    }

    function get_member_memonic($crypt, $filder='*') {
        $this->db->select($filder);
        $this->db->from('m_member');
        $this->db->where("member_memnic='$crypt'");
        $query = $this->db->get();
        $item = $query->row();
        return $item;
    }
	// 전체 회원리스트
	function get_member_li() {
		$this->db->select('*');
		$this->db->from('m_member');
		$this->db->order_by('member_no','asc');
		$query = $this->db->get();
		$item = $query->result();
		return $item;
	}

	// 회원정보 가져오기
	function get_member($member_id, $filder='*') {
		$this->db->select($filder);
		$this->db->from('m_member');
		$this->db->where('member_id',$member_id);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
    function get_member_crypt($crypt, $filder='*') {
        $this->db->select($filder);
        $this->db->from('m_member');
        $this->db->where("member_crypt='$crypt'");
        $query = $this->db->get();
        $item = $query->row();
        return $item;
    }
	// 코인아이디로 정보 가져오기
	function get_id($coin_id, $filder='*') {
		$this->db->select($filder);
		$this->db->from('m_member');
		$this->db->where('coin_id',$coin_id);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
	
	// 지갑주소로 정보 가져오기
	function get_wallet($wallet) {
		$this->db->select('*');
		$this->db->from('m_wallet');
		$this->db->where('wallet',$wallet);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
	
	// 사용자 ID에서 정보가져오기
	function get_addr($id) {
		$this->db->select('*');
		$this->db->from('m_wallet');
		$this->db->where('member_id',$id);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
	// 회원정보 가져오기
	function get_mb($coin_id) {
		$this->db->select('*');
		$this->db->from('m_member');
		$this->db->where('coin_id',$coin_id);
		$query = $this->db->get();
		$item = $query->row();

		$item->password = aes_decrypt($item->password);
        $item->wallet_password = aes_decrypt($item->wallet_password);
 

		return $item;
	}
    function get_addr_mb($addr) {
        $this->db->select('*');
        $this->db->from('m_member');
        $this->db->where('coin_addr',$addr);
        $query = $this->db->get();
        $item = $query->row();
        return $item;
    }
	// 사용자 코인 ACCOUNT에서 정보가져오기
	function get_Coinaddr($id,$type=null) {
		$this->db->select('A.*');
		$this->db->from('m_wallet A');
		$this->db->join('m_member B', 'A.member_id=B.member_id', 'LEFT OUTER');
		$this->db->where('B.coin_id', $id);
       if($type){
           $this->db->where('A.type', $type);
       }


		$query = $this->db->get();
		$item = $query->result();
	
		return $item;
	}
	
	// 추천정보가져오기
	function get_recommend($member_id) {;
		$this->db->select('*');
		$this->db->from('m_member');
		$this->db->where('recommend_id',$member_id);
		$query = $this->db->get();
		$item = $query->result();

		return $item;
	}
	
	// 후원정보가져오기
	function get_sponsor($member_id) {
		$this->db->select('*');
		$this->db->from('m_member');
		$this->db->where('sponsor_id',$member_id);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}

	// 빈 이클주소 가져오기
	function get_etc() {
		$this->db->select('*');
		$this->db->from('m_ico');
		$this->db->where('member_id','');
		$this->db->order_by('idx','asc');
		$query = $this->db->get();
		$item = $query->row();

		return $item;
	}
	// 지갑주소로 정보 가져오기
	function get_ico($wallet) {
		$this->db->select('*');
		$this->db->from('m_ico');
		$this->db->where('member_id',$wallet);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}

	// 이더 ico참여자 TXID 정보 가져오기
	function get_tx($member_id) {
		$this->db->select('*');
		$this->db->from('m_tx');
		$this->db->where('member_id',$member_id);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}

	// 이더 ico참여자 TXID 정보 가져오기
	function get_txdate($member_id) {
		$this->db->select('regdate');
		$this->db->from('m_tx');
		$this->db->where('member_id',$member_id);
		$this->db->order_by('regdate','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}


/* =================================================================
* 입력기록
================================================================= */

	// 회원가입시 정보 입력 - 회원등록
	function member_reg($coin_id,$entropy=null) {
		
		$level = 1;

		$password= aes_encrypt( $this->input->post('password'));
		$wallet_password =aes_encrypt($this->input->post('wallet_password'));
		$query = array(
			'member_id' => strtolower($this->input->post('member_id')),
			'password' => $password,
			'name' => $this->input->post('member_name'),
			'email' => $this->input->post('member_id'),
            'wallet_password' =>$wallet_password,
            'member_crypt'=>(string)$entropy,
			'coin_id' => $coin_id,
			'level' => $level,
			'type' => $this->input->post('type'),
		);

		$this->db->set('regdate', 'now()', FALSE);
		$this->db->insert('m_member', $query);
	}
		
	// ico 정보 등록
	function ico_reg($coin_id, $wallet, $qrcode) {
		$query = array(
			'member_id' => $coin_id,
			'wallet' => $wallet,
			'coin' => 0,
			'result' => 0,
			'qrcode' => $qrcode,
			'type' => $coin_id,
		);

		$this->db->set('regdate', 'now()', FALSE);
		$this->db->insert('m_ico', $query);
	}
	
		
	// tx 정보 등록
	function tx_reg($coin_id, $txid, $eth, $token) {
		$query = array(
			'member_id' => $coin_id,
			'txid' => $txid,
			'eth_count' => $eth,
			'token_count' => $token,
		);

		$this->db->set('regdate', 'now()', FALSE);
		$this->db->insert('m_tx', $query);
	}

	
	// 회원 전자지갑 테이블
	function member_wallet($coin_id,$addr,$qrimg,$type) {
		
		$query = array(
			'member_id' => $coin_id,
			'wallet' => $addr,
			'qrcode' => $qrimg,
			'type' => $type,
		);

		$this->db->set('regdate', 'now()', FALSE);
		$this->db->insert('m_wallet', $query);
	}
	

	// 회원가입시 정보 입력 - 관리자 등록
	function member_in($coin_id) {
		
		$level = 2;
		
		$query = array(
			'member_id' => strtolower($this->input->post('member_id')),
			'password' => $this->input->post('password'),
			'coin_id' => $coin_id,
			'level' => $level,
			'name' => $this->input->post('member_name'),
			'mobile' => $this->input->post('mobile'),
			'email' => $this->input->post('email'),
			'type' => $this->input->post('type'),
		);

		$this->db->set('regdate', 'now()', FALSE);
		$this->db->insert('m_member', $query);
	}
	
	//회원정보 정보 업데이트 - 관리자 계정아이디로 수정한다 주의
    function member_up1($member_id) {


        $query = array(
            'name' => $this->input->post('name'),
            'password' => aes_encrypt( $this->input->post('password')),
            'wallet_password' =>aes_encrypt( $this->input->post('wallet_password')),
            'mobile' => $this->input->post('mobile'),
            'level' => $this->input->post('level'),
            'partner_company' => $this->input->post('partner_company'),
            'coin_lock' => $this->input->post('lock'),
        );

        $this->db->where('coin_id',$member_id);
        $this->db->update('m_member', $query);
        alert("수정이 완료되었습니다" .$member_id);

    }


    function member_up_recovery($member_id,$pass1,$pass2) {


        $query = array(

            'password' => aes_encrypt($pass1),
            'wallet_password' => aes_encrypt($pass2),

        );

        $this->db->where('member_id',$member_id);
        $this->db->update('m_member', $query);


    }

    function member_up_recovery2($member_id,$pass1) {


        $query = array(
            'password' => aes_encrypt($pass1),
        );

        $this->db->where('member_id',$member_id);
        $this->db->update('m_member', $query);


    }
    function member_up_recovery3($member_id,$pass1) {


        $query = array(
            'wallet_password' => aes_encrypt($pass1),
        );

        $this->db->where('member_id',$member_id);
        $this->db->update('m_member', $query);


    }

	
	//회원정보 정보 업데이트 - 회원
	function member_up($member_id) {		
		
		$query = array(
			'name' => $this->input->post('name'),
			'mobile' => $this->input->post('mobile')
		);

		$this->db->where('member_id',$member_id);
		$this->db->update('m_member', $query);
	}
	
	
/* =================================================================
* etc
================================================================= */
	
	// 회원 복제 - 아이디만 추가
	function member_copy($make_id,$member_id) {
		
		$CI =& get_instance();
		$mb = $CI->m_member->get_member($member_id); //멤버 정보 가져오기
			
		$level = 2;
		$query = array(
			'member_id' => strtolower($make_id),
			'password' => $mb->password,
			'coin_id' => $mb->coin_id,
			'level' => $level,
			'name' => $mb->name,
			'mobile' => $mb->mobile,
			'email' => $mb->email,
			'type' => $mb->type,
		);

		$this->db->set('regdate', 'now()', FALSE);
		$this->db->insert('m_member', $query);
	}
	
	function getApiData($param) { 
		$url = $this->url;
		$ch = curl_init();		

		curl_setopt($ch,CURLOPT_URL,$url); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_NOSIGNAL, 1);
		curl_setopt($ch,CURLOPT_POST, 1); 
		curl_setopt($ch,CURLOPT_POSTFIELDS, $param); 
		
		$data = curl_exec($ch);
		$curl_errno = curl_errno($ch);
		$curl_error = curl_error($ch);
 
		curl_close($ch);

		return $data;
	}
	
	function getApiData_https($param) { 
		$url = $this->urls;
		$ch = curl_init();
		
		curl_setopt($ch,CURLOPT_URL,$url); 
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, 0); 
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, TRUE);
		curl_setopt($ch,CURLOPT_SSLVERSION,4);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_HEADER, 0); 
		curl_setopt($ch,CURLOPT_POST, 1); 
		curl_setopt($ch,CURLOPT_POSTFIELDS, $param); 
		
		$data = curl_exec($ch);
		$curl_errno = curl_errno($ch);
		$curl_error = curl_error($ch);
		if (curl_error($ch))  
 { 
    exit('CURL Error('.curl_errno( $ch ).') '.

                                        curl_error($ch)); 
 }
		
		curl_close($ch);

		return $data;
	}
}