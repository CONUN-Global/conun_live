<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Scan extends CI_Controller {

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
        $this->lang->load('scanp');
        $this->load->language('alert');
        $data = array();
        $data['header'] = array('title'=>SITE_NAME_EN,'group'=>'Coin Qr');
        $conf = get_site();
        $data['conf'] 	= $conf;
        $data['coin_index'] =$this->input->get("coin_index");
        layout('conun/scan_payment.html',$data,'conun_qr');



    }

    public function  act(){
        $this->load->language('alert');
        $data = array();
        $data['header'] = array('title'=>SITE_NAME_EN,'group'=>'Coin Qr');
        $conf = get_site();


        $mb= $this->m_member->get_addr_mb($this->input->post('send_id'));
        $amount = $this->input->post('amount');
        $content = $this->session->userdata('member_id')."^|^PAYMENT^|^".$amount;


        $result= send_socket($mb->member_id,$content,'payment');

        if($result=="ok"){

            alert('결재요청완료', "conun/scan");

        }else if ($result=="ok"){

            alert('결재요청실패 offline', "conun/scan");

        }




    }



}