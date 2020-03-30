<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
 
        define('SKIN_DIR', '/views/web/conun');

        //모델 로드
        $this->load->model('m_cfg');
        $this -> load -> model('m_member');
        $this -> load -> model('m_coin');
        $this -> load -> model('m_bbs');

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
        $this->lang->load('main');
        $this->load->language('alert');
        $data = array();
        $data['header'] = array('title'=>SITE_NAME_EN,'group'=>'CTCCOIN WALLET');
        $data['conf'] 	= get_site();

        $cfg 			= get_cfg(); // 환경설정부분
        $data['cfg'] 	= $cfg; // 환경설정부분

        $data['level'] = $this->session->userdata('level');
        $mb = $this->m_member->get_member($this->session->userdata('member_id'));
        $data['coin_id'] = $mb->coin_id;
        $data['coin_no'] = $this->input->get_post('coin_no');


        if($data['coin_no']){

            $data['tran_info'] = $this->m_coin->get_coin_no($data['coin_no'] );
            $data['tran_history'] = $this->m_coin->get_history($data['tran_info']->tx_id );

            if($data['tran_info']->partner_id){
                $data['partner_info'] = $this->m_member->get_member($data['tran_info']->partner_id);
            }




        }


        $data['name'] = $mb->name;
        $data['token_view'] = 'display:none';
        $data['coin_view'] = 'display:none';
        $data['wallet'] = '';
        $data['img'] = '';
        $data['bal'] = '';
        $data['body'] = "home";

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


     
        $data['bal_list'] =$bal_list;
        $data['sise'] = $sise;




            layout('conun/index.html',$data,'conun_main');

    }


}