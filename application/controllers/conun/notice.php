<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notice extends CI_Controller {

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
        header("Pragma: no-cache");
        $this->lang->load('notice');
        $this->load->language('alert');
        $data = array();
        $data['header'] = array('title'=>SITE_NAME_EN,'group'=>'CTCCOIN WALLET');
        $data['conf'] 	= get_site();
        $cfg 			= get_cfg(); // 환경설정부분
        $data['cfg'] 	= $cfg; // 환경설정부분
        $data['level'] = $this->session->userdata('level');
        $mb = $this->m_member->get_member($this->session->userdata('member_id'));
        $data['name'] = $mb->name;

        $data['bbs'] = (array)$this->m_bbs->get_notice_li();
        $data['body'] = "default";



        layout('conun/notice.html',$data,'conun_main');

    }

    public  function view(){
        $this->lang->load('notice');
        $data = array();
        $data['header'] = array('title'=>SITE_NAME_EN,'group'=>'QnA');
        $data['conf'] = get_site();

        $idx   = $this->input->get_post("bbs_no");

        //리스트
        $data['item'] = $this->m_bbs->get_notice_view($idx);
        $data['body'] = "default";

        layout('conun/notice_view.html',$data,'conun_main');


    }


}