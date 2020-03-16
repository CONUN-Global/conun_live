<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class otpauth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url','admin','search','office'));
        $this->load->library('form_validation');
        $this->load->library('session');

        define('SKIN_DIR', '/views/admin');
        $this->load->model('m_admin'); // 서치용 및 리스트용
        $this->load->model('m_point');
        $this->load->model('m_member');
        $this->load->model('m_office');
        $this->load->model('m_vlm');
        $this->load->model('m_coin');

    }

    // 코인테이블 아이디 조회
    function index()
    {


        $this->load->library("otp");


        $member_id= $this->session->get_userdata("member_id");

        $opt= $this->otp->ci_generator($member_id,'LiumWallet');


        print_r($opt);



    }


}