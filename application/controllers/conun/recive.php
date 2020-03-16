<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recive extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('file','form', 'url','office','search'));

        // 라이브러리
        $this->load->library('form_validation');
        define('SKIN_DIR', '/views/web/conun');


        //모델 로드
        $this -> load -> model('m_member');
        $this -> load -> model('m_coin');

        loginCheck();
    }



    public function index()
    {
        $this->load->language('alert');
        $this->lang->load('recive');
        $data = array();
        $data['header'] = array('title'=>SITE_NAME_EN,'group'=>'Coin TRANSFER');
        $conf = get_site();
        $data['conf'] 	= $conf;
        $data['coin'] = $this->input->get("coin");



        $wallet_is =false;
        $param_list = array();
        $param_bal['APT_TYPE'] = 'COINLIST';
        $coin_list = $this->m_member->getApiData($param_bal);
        $bal_list=array();
        $coin_list = json_decode(trim($coin_list), true);


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





        if($wallet_is )
        {

            $param_bal = array();
            $data['coin_view'] = 'display:block';
            $data['bal_list'] =$bal_list;
        }
        $data['wallet'] = $bal_list[0][WALLET];
        
        layout('/conun/recive.html',$data,'conun_main');



    }



}