<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Coin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        set_time_limit(0);
        $this->load->helper(array('form', 'url', 'admin', 'search', 'office'));
        admin_chk();

        $this->load->library('form_validation');
        $this->load->library('bitcoin');
        $this->load->library('qrcode');
        $this->load->model('m_coin');
        //model load
        $this->load->model('m_cfg');
        $this->load->model('m_member');
        $this->load->model('m_admin'); // 서치용 및 리스트용


    }

    function addr()
    {
        $data = array();
        $data['title'] = "전자지갑 주소";
        $data['group'] = "코인관리";

        $cfg = get_cfg(); // 환경설정부분
        $data['cfg'] = $cfg; // 환경설정부분


        $data = page_lists('m_wallet', 'regdate', $data, 'state', 'active');

        layout('coinAddress', $data, 'admin');
    }




    function vmulticoinsend2()
    {


        if ($this->session->userdata('level') == "9") {
            alert("권한이 없습니다");
        }
        $data = array();
        $data['title'] = "코인지급";
        $data['group'] = "회원관리";

        $member_id = $this->uri->segment(4, 0);
        $coin = $this->input->post("coin");


        $data['member_id'] = $member_id;
        $data['coin'] = $coin;


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

        $sender_lit_bal = array();
        $sender_eth_bal = array();

        foreach ($sender_id as $key => $item) {


            unset($param_bal);
            $param_bal['APT_TYPE'] = 'W_GETBALV';
            $param_bal['COIN'] = 'LIT';
            $param_bal['WALLET_NO'] = $item;
            $bal = $this->m_member->getApiData($param_bal);

            $balance = json_decode(trim($bal), true);


            array_push($sender_lit_bal, $balance['BALANCE']);


            unset($param_bal);
            unset($balance);
            $param_bal['APT_TYPE'] = 'W_GETBALV';
            $param_bal['COIN'] = 'ETH';
            $param_bal['WALLET_NO'] = $item;
            $bal = $this->m_member->getApiData($param_bal);
            $balance = json_decode(trim($bal), true);
            array_push($sender_eth_bal, $balance['BALANCE']);
        }

        $data['sender_lit_bal'] = $sender_lit_bal;
        $data['sender_eth_bal'] = $sender_eth_bal;


        if (empty($this->input->post("sender_amount")) === true) {
            $this->load->view('admin/vCoinSends2', $data);
        } else {


            $sender_id = explode(",", $this->input->post("sender_id"));
            $sender_amount = explode(",", $this->input->post("sender_amount"));
            $sucess = array();
            foreach ($sender_id as $key => $item) {

                $member_id = $item;

                $wallet = $this->m_coin->get_wallet_no($member_id);


                if ($wallet->wallet) {
                    //	$data['wallet_status'] = "<font color='blue'><b>주소 발급된 계정</b></font>";
                    $trade_status = true;

                    // 코인잔고
                    $param_bal = array();
                    $param_bal['APT_TYPE'] = 'W_GETBALV';
                    $param_bal['COIN'] = $coin;
                    $param_bal['WALLET_NO'] = $item;
                    $bal = $this->m_member->getApiData($param_bal);
                    $balance = json_decode(trim($bal), true);
                    $data['balance'] = $balance['BALANCE'];
                }


                $amount = $this->input->post('amount');


                // 코인 지급자 아이디를 넣음
                // 차후에 다른곳에서 보낼 수도 있으므로 INPUT으로 처리
                $Sender = "admin";

              

                $param_tran = array();


                $param_tran['APT_TYPE'] = 'W_TRANSV';
                $param_tran['WALLET_NO'] = $item;
                $param_tran['SENDER'] = $wallet->wallet;
                $param_tran['TO_ADDR'] = $this->input->post("TO_ADDR");
                $param_tran['COIN'] = $coin;
                $param_tran['AMOUNT'] = $amount;
                $data['coin'] = $coin;


                $curl_tran = $this->m_member->getApiData($param_tran);
                $tran = json_decode(trim($curl_tran), true);
                $sucess[$key] = $tran['CODE'];


            }
            $data['sender_id'] = explode(",", $this->input->post("sender_id"));
            $data['sender_name'] = explode(",", $this->input->post("sender_name"));
            $data['sender_email'] = explode(",", $this->input->post("sender_email"));
            $data['sucess'] = $sucess;

            $this->load->view('admin/vCoinSends_result', $data);

        }


    }

    function vmulticoinsend()
    {

        if ($this->session->userdata('level') == "9") {
            alert("권한이 없습니다");
        }
        $data = array();
        $data['title'] = "코인지급";
        $data['group'] = "회원관리";

        $member_id = $this->uri->segment(4, 0);
        $coin = $this->input->post("coin");


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
            $this->load->view('admin/vCoinSends', $data);
        } else {


            $sender_id = explode(",", $this->input->post("sender_id"));
            $sender_amount = explode(",", $this->input->post("sender_amount"));
            $sucess = array();
            foreach ($sender_id as $key => $item) {

                $member_id = $item;

                $wallet = $this->m_coin->get_wallet_no($member_id);


                if ($wallet->wallet) {
                    //	$data['wallet_status'] = "<font color='blue'><b>주소 발급된 계정</b></font>";
                    $trade_status = true;

                    // 코인잔고
                    $param_bal = array();

                    $param_bal['APT_TYPE'] = 'W_GETBALV';
                    $param_bal['COIN'] = $coin;
                    $param_bal['WALLET_NO'] = $item;


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
                $param_tran['TO_ADDR'] = $wallet->wallet;
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

            $this->load->view('admin/vCoinSends_result', $data);

        }


    }

    function vcoinsend()
    {


        if ($this->session->userdata('level') == "9") {
            alert("권한이 없습니다");
        }


        $data = array();
        $data['title'] = "코인지급";
        $data['group'] = "회원관리";

        $wallet_no = $this->uri->segment(4, 0);


        $coin = $this->uri->segment(5, 0);

        $data['coin'] = $coin;
        $this->form_validation->set_rules('amount', 'amount', 'required');

        $this->form_validation->set_rules('TO_ADDR', 'TO_ADDR', 'required');

        if ($coin == "") {
            $coin = default_coin;

        }


        // 코인잔고
        $param_bal = array();

        $param_bal['APT_TYPE'] = 'W_GETBALV';
        $param_bal['COIN'] = $coin;
        $param_bal['WALLET_NO'] = $wallet_no;
        $bal = $this->m_member->getApiData($param_bal);
        $balance = json_decode(trim($bal), true);
        $data['bal'] = $balance['BALANCE'];
        $wallet = $this->m_coin->get_wallet_no($wallet_no);
        $data['wallet'] = $wallet->wallet;
        $param_bal['APT_TYPE'] = 'W_GETBALV';
        $param_bal['COIN'] = "ETH";
        $param_bal['WALLET_NO'] = $wallet_no;
        $bal = $this->m_member->getApiData($param_bal);
        $balance = json_decode(trim($bal), true);
        $data['eth_bal'] = $balance['BALANCE'];


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/vCoinSend', $data);
        } else {

            $amount = $this->input->post('amount');
            $member_id = $this->input->post('member_id');

            $amount = str_replace(",","",$amount);


            $Sender = $this->input->post('Sender');
            $TO_ADDR = $this->input->post('TO_ADDR');


            $param_tran = array();
            $param_tran['APT_TYPE'] = 'W_TRANSV';
            $param_tran['WALLET_NO'] = $wallet_no;
            $param_tran['SENDER'] = $wallet->wallet;
            $param_tran['TO_ADDR'] = $TO_ADDR;
            $param_tran['COIN'] = $coin;
            $param_tran['AMOUNT'] = $amount;
            $data['coin'] = $coin;


            $curl_tran = $this->m_member->getApiData($param_tran);


            $tran = json_decode(trim($curl_tran), true);

            if ($tran['CODE'] == "0000") {


                alert($tran['MSG'], "https://liumwallet.com/admin/coin/vcoinsend/" . $wallet_no . "");
            } else {

                alert($tran['MSG'], "https://liumwallet.com/admin/coin/vcoinsend/" . $wallet_no . "");
            }

        }
    }


    function vaddr()
    {


        $data = array();
        $data['level'] = $this->session->userdata('level');
        $data['title'] = "가상 전자지갑 주소";
        $data['group'] = "코인관리";

        $cfg = get_cfg(); // 환경설정부분
        $data['cfg'] = $cfg; // 환경설정부분

        if( $_POST['sc'] !=""){
            $_POST['st'] = "v_coin";

        }else{
            $_POST['st'] = "";
            $_POST['sc'] = "";
        }


        $data = page_lists3('m_wallet', 'regdate', $data, 'state', 'virtual');


        $data['v_coin']= $this->uri->segment(9);
        layout('coinvAddress', $data, 'admin');
    }


    function lists()
    {
        $data = array();
        $data['title'] = "코인전송현황";
        $data['group'] = "코인관리";
        $cfg = get_cfg(); // 환경설정부분
        $data['cfg'] = $cfg; // 환경설정부분
        $data['level'] = $this->session->userdata('level');

        $data = page_lists('m_coin', 'coin_no', $data, 'payment_type', 'SEND');
        foreach ($data['item'] as $key => $row) {

            $mem = $this->m_member->get_id($row->member_id);


            if($row->v_no){
                $data['item'][$key]->wallet = $row->member_address;
            }else{
                $data['item'][$key]->wallet = $mem->coin_addr;
            }

            $data['item'][$key]->name = $mem->name;


        }


        layout('coinLists', $data, 'admin');
    }


    function payment_list()
    {
        $data = array();
        $data['title'] = "결제현황";
        $data['group'] = "코인관리";
        $cfg = get_cfg(); // 환경설정부분
        $data['cfg'] = $cfg; // 환경설정부분
        $data['level'] = $this->session->userdata('level');
        $data['from_date'] =$this->input->post('from_date');
        $data['to_date'] =$this->input->post('to_date');



            $data = page_lists('m_coin', 'coin_no', $data, 'payment_type', 'PAYMENT');


        foreach ($data['item'] as $key => $row) {

            $mem = $this->m_member->get_id($row->member_id);
            $partner = $this->m_member->get_addr_mb($row->event_address);

            $data['item'][$key]->name = $mem->name;
            $data['item'][$key]->member_id = $mem->member_id;
            $data['item'][$key]->partner_name = $partner->partner_company;
            $data['item'][$key]->partner_id = $partner->member_id;



        }


        layout('paymentLists', $data, 'admin');
    }


    function exchange_list()
    {
        $data = array();
        $data['title'] = "결제현황";
        $data['group'] = "코인관리";
        $cfg = get_cfg(); // 환경설정부분
        $data['cfg'] = $cfg; // 환경설정부분
        $data['level'] = $this->session->userdata('level');

        $data = page_lists('m_coin', 'coin_no', $data, 'payment_type', 'EXCHANGE');
        foreach ($data['item'] as $key => $row) {

            $mem = $this->m_member->get_id($row->member_id);
            $partner = $this->m_member->get_addr_mb($row->event_address);

            $data['item'][$key]->name = $mem->name;
            $data['item'][$key]->member_id = $mem->member_id;
            $data['item'][$key]->partner_name = $partner->partner_company;
            $data['item'][$key]->partner_id = $partner->member_id;



        }


        layout('exchangeLists', $data, 'admin');
    }
    function banks()
    {

        $data = array();
        $data['title'] = "이체현황";
        $data['group'] = "코인관리";
        $cfg = get_cfg(); // 환경설정부분
        $data['cfg'] = $cfg; // 환경설정부분

        $data = page_lists('m_coin', 'coin_no', $data, 'cate', 'exchange');


        layout('coinBanks', $data, 'admin');
    }


    function trans()
    {

        $data = array();
        $data['title'] = "트랜스퍼현황";
        $data['group'] = "코인관리";
        $cfg = get_cfg(); // 환경설정부분
        $data['cfg'] = $cfg; // 환경설정부분

        $data = page_lists('m_coin', 'coin_no', $data, 'cate', 'send');


        layout('coinTrans', $data, 'admin');
    }


    function del()
    {

        $idx = $this->input->post('idx'); // 아이디

        $this->db->where('coin_no', $idx);
        $this->db->delete('m_coin');


        goto_url($_SERVER['HTTP_REFERER']);
    }



    function delete()
    {

        $idx = $this->input->post('idx'); // 아이디

        $this->db->where('wallet_no', $idx);
        $this->db->delete('m_wallet');


        goto_url($_SERVER['HTTP_REFERER']);
    }


    function make_vaddr()
    {

        $idx = $this->input->post('wallet_count'); // 아이디

        if ($idx != "") {
            $this->db->query("UPDATE m_wallet  SET member_id='admin',state='virtual'  WHERE wallet_no in  ( select wallet_no from ( (select wallet_no from m_wallet WHERE state='ready' AND member_id='' limit $idx) as tmp ) ) AND state='ready'");


            goto_url($_SERVER['HTTP_REFERER']);

        } else {
            goto_url($_SERVER['HTTP_REFERER'], "지갑 갯수 오류");
        }


    }

    function dels()
    {

        $idx = $this->input->post('idx'); // 아이디
        $idx = explode(",", $idx);

        $this->db->where_in('coin_no', $idx);
        $this->db->delete('m_coin');


        goto_url($_SERVER['HTTP_REFERER']);
    }
   function recipt(){

       $idx = $this->input->post('idx'); // 아이디
       $idx = explode(",", $idx);
       $date= date("Y-m-d H:i:s");

       $this->db->where_in('coin_no', $idx);
       $value = array('payment_recipt'=>"Y",'payment_recipt'=>"Y",'payment_recipt_date'=>$date);
       $this->db->update('m_coin',$value);


       goto_url($_SERVER['HTTP_REFERER']);



   }

    // 전체 수당리스트
    function get_coin_li($kind)
    {
        $this->db->select('*');
        $this->db->from('m_coin');
        $this->db->where('kind', $kind);
        $this->db->order_by('coin_no', 'asc');
        $query = $this->db->get();
        $item = $query->result();
        return $item;
    }
}