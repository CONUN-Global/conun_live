<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('file','form', 'url'));
        // 라이브러리
        $this->load->library('form_validation');
        $this->load->model('m_cfg');

        define('SKIN_DIR', '/views/web/app');

        //모델 로드
        $this -> load -> model('m_member');



    }

    public function index(){
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        $this->load->language('alert');
        $this->lang->load('setting');
        $data = array();
        $data['header'] = array('title'=>SITE_NAME_EN,'group'=>'CTCCOIN WALLET');
        $data['conf'] 	= get_site();
        $cfg 			= get_cfg(); // 환경설정부분
        $data['cfg'] 	= $cfg; // 환경설정부분
        $data['level'] = $this->session->userdata('level');
        $mb = $this->m_member->get_member($this->session->userdata('member_id'));
        $data['coin_id'] = $mb->coin_id;
        $data['name'] = $mb->name;
        $data['coin_addr'] = $mb->coin_addr;
        $data['last_login'] = $mb->last_login;
        $data['regdate'] = $mb->regdate;
        $data['body_class'] = "fill";



        layout('conun/setting.html',$data,'app');
    }

    public  function autologin(){
        $this->load->language('alert');
        $action = $this->input->get_post("action");
        if($action == "on"){
            set_cookie('userid', $this->session->userdata('member_id'), 356 * 24 * 60 * 60);
            set_cookie('autologin', 'on', 356 * 24 * 60 * 60);

        }else{
            set_cookie('userid', '', 356 * 24 * 60 * 60);
            set_cookie('autologin', '', 356 * 24 * 60 * 60);

        }


        redirect('/conun/setting');



    }

    public  function changelang(){
        $this->load->language('alert');
        $action = $this->input->get_post("language");


            set_cookie('language', $action, 356 * 24 * 60 * 60);
 


        redirect('/conun/setting');



    }



}
?>
