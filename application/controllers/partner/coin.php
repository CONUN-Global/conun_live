<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Coin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        set_time_limit(0);
        $this->load->helper(array('form', 'url', 'admin', 'search', 'office'));
        partner_chk();

        $this->load->library('form_validation');
        $this->load->library('bitcoin');
        $this->load->library('qrcode');
        $this->load->model('m_coin');
        //model load
        $this->load->model('m_cfg');
        $this->load->model('m_member');
        $this->load->model('m_admin'); // 서치용 및 리스트용


    }

 
    function lists()
    {
        $data = array();
        $data['title'] = "결제현황";
        $data['group'] = "코인관리";
        $cfg = get_cfg(); // 환경설정부분
        $data['cfg'] = $cfg; // 환경설정부분
        $data['level'] = $this->session->userdata('level');
        $member = $this->m_member->get_member($this->session->userdata('member_id'));
 

        $data = page_lists_partner('m_coin', 'coin_no', $data, 'partner_address', $member->coin_addr,'payment_type','PAYMENT');
        foreach ($data['item'] as $key => $row) {

            $mem = $this->m_member->get_id($row->member_id);


            if($row->v_no){
                $data['item'][$key]->wallet = $row->member_address;
            }else{
                $data['item'][$key]->wallet = $mem->coin_addr;
            }

              $data['item'][$key]->name = $mem->name;
              $data['item'][$key]->mem_name = $mem->name;
              $data['item'][$key]->member_id = $mem->member_id;


        }


        layout('coinLists', $data, 'partner');
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


     

    function dels()
    {

        $idx = $this->input->post('idx'); // 아이디
        $idx = explode(",", $idx);

        $this->db->where_in('coin_no', $idx);
        $this->db->delete('m_coin');


        goto_url($_SERVER['HTTP_REFERER']);
    }


 
}