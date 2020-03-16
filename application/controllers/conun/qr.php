<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qr extends CI_Controller {

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
        $this->load->language("scan");
        $data = array();
        $data['header'] = array('title'=>SITE_NAME_EN,'group'=>'Coin Qr');
        $conf = get_site();
        $data['conf'] 	= $conf;
        $data['coin_index'] =$this->input->get("coin_index");
        layout('conun/scan.html',$data,'conun_qr');



    }



}