<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Send extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('file','form', 'url','office','search'));

        // 라이브러리
        $this->load->library('form_validation');
        $this->load->library('bitcoin');
        define('SKIN_DIR', '/views/web/conun');


        //모델 로드
        $this -> load -> model('m_member');
        $this -> load -> model('m_coin');

        loginCheck();
    }



    public function index()
    {
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");



        $this->load->language("pay");

        $this->load->language('alert');
        $qr_value=$_POST["qr_value"];
        $qr_payment=explode("^|^",$qr_value);
       if($qr_payment[0]){

           $partner =  $this->m_member->get_member($qr_payment[0]);
       }

       if($qr_payment[0] &&  $partner->coin_addr==""){

           alert("QR CODE ERROR");
       }

        $data = array();
        $data['partner_wallet'] = $partner->coin_addr;
        $data['partner_company'] = $partner->partner_company;
        $data['send_type'] = $qr_payment[1] ;
        $data['amount'] = $qr_payment[2] ;

        $data['header'] = array('title'=>SITE_NAME_EN,'group'=>'Coin TRANSFER');
        $conf = get_site();
        $data['conf'] 	= $conf;
        $data['coin'] = $this->input->get("coin");
        $wallet_is =false;
        $param_list = array();
        $param_bal['APT_TYPE'] = 'W_GETADDR';
        $param_bal['MEMBER_ID'] = $this->session->userdata('member_id');
        $bal_list = $this->m_member->getApiData($param_bal);
        $bal_list = json_decode(trim($bal_list), true);



        $data['bal_list'] = $bal_list['coin_list'];



        $param_bal['APT_TYPE'] = 'COINLIST';
        $coin_list = $this->m_member->getApiData($param_bal);
        $bal_list=array();
        $coin_list = json_decode(trim($coin_list), true);


        $param_bal['APT_TYPE'] = 'W_TICK';
        $param_bal['COIN'] = 'CON';
        $sise = $this->m_member->getApiData($param_bal);


        $sise = json_decode(trim($sise), true);



        $i=0;
        foreach($coin_list['coin_list'] as $item){
            $param_bal = array();
            $param_bal['APT_TYPE'] = 'W_GETBAL';
            $param_bal['MEMBER_ID'] = $this->session->userdata('member_id');
            $param_bal['COIN'] = $item['COIN_SHORT'];
            $bal = $this->m_member->getApiData($param_bal);
            $bal = json_decode(trim($bal), true);



            $bal_list[$i]['COIN'] =$param_bal['COIN'];
            $bal_list[$i]['BALANCE'] =$bal['BALANCE'];
            if($bal['CODE']=="0000"){
                $wallet_is =true;
            }
            $bal_list[$i]['COIN_NAME'] =$item['COIN_NAME'];
            $bal_list[$i]['WALLET'] =$bal['WALLET'];
            $bal_list[$i]['CODE'] =$bal['CODE'];
            $bal_list[$i]['FEE'] =$bal['FEE'];
            $i++;
        }



        $data['con_amount'] = bcdiv(   $data['amount'] ,$sise['TICK']['CLOSING_PRICE'],4);
        $data['bonus_amount'] = bcmul($data['amount'] ,0.005);
        $data['bal_list'] =$bal_list;
        $data['sise'] = $sise;
        $data['qr_value'] = $qr_value;



        layout('/conun/pay.html',$data,'conun_main');
    }

    // 코인보내기
    public function send_ok()
    {







        $data = array();
        $data['header'] = array('title'=>SITE_NAME_EN,'group'=>'COIN TRANSFER');
        $conf = get_site();
        $data['conf'] 	= $conf;
        $this->load->language('alert');
        $bal = (float)$this->input->post('bal');
        $qr_value = $this->input->post('qr_value');
        $coin_cnt =  $this->input->post('amount');
        $coin = $this->input->post('coin');

        $member = $this->m_member->get_member($this->session->userdata('member_id'));
        // Master 주소에서 해당 발급 주소로 코인전송되도록 변경해야함.


        if (!$member || aes_encrypt( $this->input->post('wallet_password')) != $member->wallet_password) {
            alert("Password Check!!.");
        }

        // Master 주소에서 해당 발급 주소로 코인전송되도록 변경해야함.

        if($this->input->post('send_id') == "") {

            echo payment_error("There is no recipient’s address",$qr_value);
//            alert("There is no recipient’s address", "conun/send?coin_index=" . $coin);

        }
        if($bal < $coin_cnt)
        {
            echo payment_error("Coin you will send is more than coin you hold",$qr_value);
              //  alert("Coin you will send is more than coin you hold", "conun/scan");

       }

        $mb = $this->m_member->get_member($this->session->userdata('member_id'));

        try
        {
            $param_tran = array();


 

            $param_tran['APT_TYPE'] = 'W_PAYMENT';
            $param_tran['FROM_ADDR'] = $mb->coin_id;
            $param_tran['TO_ADDR'] = $this->input->post('send_id');
            $param_tran['AMOUNT'] = $coin_cnt;
            $param_tran['WONAMOUNT'] = $this->input->post('wonPrice');

            $param_tran['COIN'] = $coin;

 


            $curl_tran = $this->m_member->getApiData($param_tran);


 
            $tran = json_decode(trim($curl_tran), true);





            if ($tran['CODE'] == "0000")
            {
                alert($tran['MSG'], "conun");
            }
            else
            {
                alert($tran['MSG'], "conun");
            }

        }



        catch(exception $ex)
        {
            //alert($ex->getMessage(), "conun/scan");
            echo payment_error($ex->getMessage(),$qr_value);
        }
    }

}