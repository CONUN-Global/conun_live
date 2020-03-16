<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exchange extends CI_Controller {

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


    public  function calculate(){
        $mode = $this->input->get_post("mode");
        $calA = $this->input->get_post("calA");
        $calB = $this->input->get_post("calB");


        if($mode=="add"){
          $cal = bcadd($calA,$calB,4);
        }

        else if($mode=="mul"){
            $cal = bcmul($calA,$calB,4);
        }


        if($cal==""){
            $cal=0;
        }

        echo $cal;


    }
    public function index()
    {


        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        $this->load->language('exchange');
        $this->load->language('alert');
        $qr_value=$_POST["qr_value"];
        $qr_payment=explode("^|^",$qr_value);


            $partner =  $this->m_member->get_member('admin');




        $data = array();
        $data['partner_wallet'] = $partner->coin_addr;
        $data['partner_company'] = $partner->partner_company;
        $data['send_type'] = 'EXCHANGE';
        $data['body'] = 'default';


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



        layout('/conun/change.html',$data,'conun_send');
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
        $coin_cnt =  $this->input->post('changefrom');
        $coin = $this->input->post('coin');

        $member = $this->m_member->get_member($this->session->userdata('member_id'));
        // Master 주소에서 해당 발급 주소로 코인전송되도록 변경해야함.


        if (!$member || aes_encrypt( $this->input->post('wallet_password')) != $member->wallet_password) {
            alert("Password Check!!.");
        }

        // Master 주소에서 해당 발급 주소로 코인전송되도록 변경해야함.

        if($this->input->post('send_id') == "") {


            alert("There is no recipient’s address", "conun/exchange" );

        }
      /*  if($bal < $coin_cnt)
        {

            alert("Coin you will send is more than coin you hold", "conun/send");

        }
*/
        $mb = $this->m_member->get_member($this->session->userdata('member_id'));

        try
        {
            $param_tran = array();



                $param_tran['APT_TYPE'] = 'W_EXCHANGE';
                $param_tran['FROM_ADDR'] = $mb->coin_id;
                $param_tran['TO_ADDR'] = $this->input->post('send_id');
                $param_tran['AMOUNT'] = $coin_cnt;
                $param_tran['WONAMOUNT'] = $this->input->post('wonPrice');
                $param_tran['COIN'] = $coin;



            $curl_tran = $this->m_member->getApiData($param_tran);




            $tran = json_decode(trim($curl_tran), true);





            if ($tran['CODE'] == "0000")
            {
                alert($tran['MSG'], "conun/exchange");
            }
            else
            {
                alert($tran['MSG'], "conun/exchange");
            }

        }



        catch(exception $ex)
        {
            alert($ex->getMessage(), "conun/exchange");
        }
    }

}