<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        define('SKIN_DIR', '/views/web/conun');

        //모델 로드
        $this->load->model('m_cfg');
        $this->load->model('m_member');
        $this->load->model('m_coin');
        $this->load->model('m_bbs');


    }

    public function index()
    {
        loginCheck();
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        $this->lang->load('mypage');
        $this->load->language('alert');
        $data = array();
        $data['header'] = array('title'=>SITE_NAME_EN,'group'=>'CTCCOIN WALLET');
        $data['conf'] 	= get_site();
        $cfg 			= get_cfg(); // 환경설정부분
        $data['cfg'] 	= $cfg; // 환경설정부분
        $data['level'] = $this->session->userdata('level');
        $mb = $this->m_member->get_member($this->session->userdata('member_id'));
        $data['coin_id'] = $mb->coin_id;
        $data['name'] = $mb->name;
        $data['email'] = $mb->email;
        $data['coin_addr'] = $mb->coin_addr;
        $data['regdate'] = $mb->regdate;
        $data['last_login'] = $mb->last_login;

        layout('conun/account.html',$data,'app');

    }
    // 로그아웃
    function out()
    {

        delete_cookie('autologin');
        $this->session->sess_destroy();

        redirect('/conun');

    }
    function  terms(){
        $this->load->language('alert');
        $data['header'] = array('title'=>SITE_NAME_EN,'group'=>'signup-page');
        $data['conf'] = get_site();
        layout('/conun/terms.html',$data,'app');
    }

}