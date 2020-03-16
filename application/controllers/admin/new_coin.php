<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class New_coin extends CI_Controller
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
        $this->load->library('pagination');


    }


    function exchange_list()
    {
        $data = array();
        $data['title'] = "결제현황";
        $data['group'] = "코인관리";
        $cfg = get_cfg(); // 환경설정부분
        $data['cfg'] = $cfg; // 환경설정부분
        $data['level'] = $this->session->userdata('level');
        $data['from_date'] =$this->input->get_post('from_date');
        $data['to_date'] =$this->input->get_post('to_date');
        $data['st'] = $this->input->get_post("st");
        $data['sc'] = $this->input->get_post("sc");










        $config['per_page'] = 10;  //���������� ������ �Խù�
        $config['num_links'] = 5;  // �ִ뺸���� ������ �ѹ�



        $page_num = $this->input->get("per_page");
        if ($page_num == 1 or $page_num == NULL ) {
            $page_num = 0;
        }
        else {
            $page_num = $page_num * $config['per_page'] - $config['per_page'];
        }

        $data['item'] =  $this->m_coin->search_coin_list("EXCHANGE", $data['from_date'], $data['to_date'],$data['st'],$data['sc'],  $config['per_page'],$page_num  );

        $data['total_rows'] =  $this->m_coin->search_coin_list_count("EXCHANGE",$data['from_date'], $data['to_date'],$data['st'],$data['sc']);


        $config['total_rows'] =   $data['total_rows'] ;
        $config['base_url'] = '/admin/new_coin/exchange_list?from_date='.$data['from_date']."&to_date=".$data['to_date']."&st=".$data['st']."&sc=".$data['sc'];
        // ������
        $config['first_tag_open']  = '<span id=page>';
        $config['first_tag_close']  = '</span>';
        $config['last_tag_open']  = '<span id=page>';
        $config['last_tag_close']  = '</span>';
        $config['cur_tag_open']  = '<span id=page_con>';
        $config['cur_tag_close']  = '</span>';
        $config['next_tag_open']  = '<span id=page>';
        $config['next_tag_close']  = '</span>';
        $config['prev_tag_open']  = '<span id=page>';
        $config['prev_tag_open']  = '<span id=page>';
        $config['prev_tag_close']  = '</span>';
        $config['num_tag_open']  = '<span id=page>';
        $config['num_tag_close']  = '</span>';
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);
        define('PAGE_URL', $this->pagination->create_links());




        foreach ($data['item'] as $key => $row) {

            $mem = $this->m_member->get_id($row->member_id);
            $partner = $this->m_member->get_addr_mb($row->event_address);

            $data['item'][$key]->name = $mem->name;
            $data['item'][$key]->member_id = $mem->member_id;
            $data['item'][$key]->partner_name = $partner->partner_company;
            $data['item'][$key]->partner_id = $partner->member_id;



        }



        layout('exchangeLists2', $data, 'admin');
    }
    function payment_list()
    {
        $data = array();
        $data['title'] = "결제현황";
        $data['group'] = "코인관리";
        $cfg = get_cfg(); // 환경설정부분
        $data['cfg'] = $cfg; // 환경설정부분
        $data['level'] = $this->session->userdata('level');
        $data['from_date'] =$this->input->get_post('from_date');
        $data['to_date'] =$this->input->get_post('to_date');
        $data['st'] = $this->input->get_post("st");
        $data['sc'] = $this->input->get_post("sc");










        $config['per_page'] = 10;  //���������� ������ �Խù�
        $config['num_links'] = 5;  // �ִ뺸���� ������ �ѹ�



        $page_num = $this->input->get("per_page");
        if ($page_num == 1 or $page_num == NULL ) {
            $page_num = 0;
        }
        else {
            $page_num = $page_num * $config['per_page'] - $config['per_page'];
        }


        $data['item'] =  $this->m_coin->search_coin_list("PAYMENT", $data['from_date'], $data['to_date'],$data['st'],$data['sc'],  $config['per_page'],$page_num  );



        $data['total_rows'] =  $this->m_coin->search_coin_list_count("PAYMENT",$data['from_date'], $data['to_date'],$data['st'],$data['sc']);





        $config['total_rows'] =   $data['total_rows'] ;
        $config['base_url'] = '/admin/new_coin/payment_list?from_date='.$data['from_date']."&to_date=".$data['to_date']."&st=".$data['st']."&sc=".$data['sc'];
        // ������
        $config['first_tag_open']  = '<span id=page>';
        $config['first_tag_close']  = '</span>';
        $config['last_tag_open']  = '<span id=page>';
        $config['last_tag_close']  = '</span>';
        $config['cur_tag_open']  = '<span id=page_con>';
        $config['cur_tag_close']  = '</span>';
        $config['next_tag_open']  = '<span id=page>';
        $config['next_tag_close']  = '</span>';
        $config['prev_tag_open']  = '<span id=page>';
        $config['prev_tag_open']  = '<span id=page>';
        $config['prev_tag_close']  = '</span>';
        $config['num_tag_open']  = '<span id=page>';
        $config['num_tag_close']  = '</span>';
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);
        define('PAGE_URL', $this->pagination->create_links());




        foreach ($data['item'] as $key => $row) {

            $mem = $this->m_member->get_id($row->member_id);
            $partner = $this->m_member->get_addr_mb($row->partner_address);

            $data['item'][$key]->name = $mem->name;
            $data['item'][$key]->member_id = $mem->member_id;
            $data['item'][$key]->partner_name = $partner->partner_company;
            $data['item'][$key]->partner_id = $partner->member_id;



        }


        layout('paymentLists2', $data, 'admin');
    }
    function payment_day()
    {
        $data = array();
        $data['title'] = "결제현황";
        $data['group'] = "코인관리";
        $cfg = get_cfg(); // 환경설정부분
        $data['cfg'] = $cfg; // 환경설정부분
        $data['level'] = $this->session->userdata('level');
        $data['from_date'] =$this->input->get_post('from_date');
        $data['to_date'] =$this->input->get_post('to_date');
        $data['st'] = $this->input->get_post("st");
        $data['sc'] = $this->input->get_post("sc");

        $data['search'] = $data['sc'];






       if(  $data['from_date']==""  ||  $data['to_date']=="" ){

           $data['from_date'] = date("Y-m-"."01");
           $data['to_date'] = date("Y-m-"."31");

       }


        $config['per_page'] = 10;  //���������� ������ �Խù�
        $config['num_links'] = 5;  // �ִ뺸���� ������ �ѹ�



        $page_num = $this->input->get("per_page");
        if ($page_num == 1 or $page_num == NULL ) {
            $page_num = 0;
        }
        else {
            $page_num = $page_num * $config['per_page'] - $config['per_page'];
        }

        $data['item'] =  $this->m_coin->search_coin_group($data['from_date'], $data['to_date'],$data['st'],$data['sc'],'date',  $config['per_page'],$page_num  );

        echo $sql;

        $data['total_rows'] =  $this->m_coin->search_coin_group_count($data['from_date'], $data['to_date'],$data['st'],$data['sc']);




        $config['total_rows'] =   $data['total_rows'] ;
        $config['base_url'] = '/admin/new_coin/payment_day?from_date='.$data['from_date']."&to_date=".$data['to_date']."&st=".$data['st']."&sc=".$data['sc'];
        // ������
        $config['first_tag_open']  = '<span id=page>';
        $config['first_tag_close']  = '</span>';
        $config['last_tag_open']  = '<span id=page>';
        $config['last_tag_close']  = '</span>';
        $config['cur_tag_open']  = '<span id=page_con>';
        $config['cur_tag_close']  = '</span>';
        $config['next_tag_open']  = '<span id=page>';
        $config['next_tag_close']  = '</span>';
        $config['prev_tag_open']  = '<span id=page>';
        $config['prev_tag_open']  = '<span id=page>';
        $config['prev_tag_close']  = '</span>';
        $config['num_tag_open']  = '<span id=page>';
        $config['num_tag_close']  = '</span>';
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);
        define('PAGE_URL', $this->pagination->create_links());




        foreach ($data['item'] as $key => $row) {

            $mem = $this->m_member->get_id($row->member_id);
            $partner = $this->m_member->get_addr_mb($row->partner_address);

            $data['item'][$key]->name = $mem->name;
            $data['item'][$key]->member_id = $mem->member_id;
            $data['item'][$key]->partner_name = $partner->partner_company;
            $data['item'][$key]->partner_id = $partner->member_id;



        }


        layout('payment_day', $data, 'admin');
    }


    function payment_month()
    {
        $data = array();
        $data['title'] = "결제현황";
        $data['group'] = "코인관리";
        $cfg = get_cfg(); // 환경설정부분
        $data['cfg'] = $cfg; // 환경설정부분
        $data['level'] = $this->session->userdata('level');
        $data['from_date'] =$this->input->get_post('from_date');
        $data['to_date'] =$this->input->get_post('to_date');
        $data['st'] = $this->input->get_post("st");
        $data['sc'] = $this->input->get_post("sc");


        $data['search'] = $data['sc'];





        if(  $data['from_date']==""  ||  $data['to_date']=="" ){

            $data['from_date'] = date("Y-m");
            $data['to_date'] = date("Y-m");

        }


        $config['per_page'] = 10;  //���������� ������ �Խù�
        $config['num_links'] = 5;  // �ִ뺸���� ������ �ѹ�



        $page_num = $this->input->get("per_page");
        if ($page_num == 1 or $page_num == NULL ) {
            $page_num = 0;
        }
        else {
            $page_num = $page_num * $config['per_page'] - $config['per_page'];
        }

        $data['item'] =  $this->m_coin->search_coin_group($data['from_date'], $data['to_date'],$data['st'],$data['sc'],'month',  $config['per_page'],$page_num  );

        $data['total_rows'] =  $this->m_coin->search_coin_group_count($data['from_date'], $data['to_date'],$data['st'],$data['sc'],'month');




        $config['total_rows'] =   $data['total_rows'] ;
        $config['base_url'] = '/admin/new_coin/payment_month?from_date='.$data['from_date']."&to_date=".$data['to_date']."&st=".$data['st']."&sc=".$data['sc'];
        // ������
        $config['first_tag_open']  = '<span id=page>';
        $config['first_tag_close']  = '</span>';
        $config['last_tag_open']  = '<span id=page>';
        $config['last_tag_close']  = '</span>';
        $config['cur_tag_open']  = '<span id=page_con>';
        $config['cur_tag_close']  = '</span>';
        $config['next_tag_open']  = '<span id=page>';
        $config['next_tag_close']  = '</span>';
        $config['prev_tag_open']  = '<span id=page>';
        $config['prev_tag_open']  = '<span id=page>';
        $config['prev_tag_close']  = '</span>';
        $config['num_tag_open']  = '<span id=page>';
        $config['num_tag_close']  = '</span>';
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);
        define('PAGE_URL', $this->pagination->create_links());




        foreach ($data['item'] as $key => $row) {

            $mem = $this->m_member->get_id($row->member_id);
            $partner = $this->m_member->get_addr_mb($row->partner_address);

            $data['item'][$key]->name = $mem->name;
            $data['item'][$key]->member_id = $mem->member_id;
            $data['item'][$key]->partner_name = $partner->partner_company;
            $data['item'][$key]->partner_id = $partner->member_id;



        }


        layout('payment_month', $data, 'admin');
    }

    function payment_year()
    {
        $data = array();
        $data['title'] = "결제현황";
        $data['group'] = "코인관리";
        $cfg = get_cfg(); // 환경설정부분
        $data['cfg'] = $cfg; // 환경설정부분
        $data['level'] = $this->session->userdata('level');
        $data['from_date'] =$this->input->get_post('from_date');
        $data['to_date'] =$this->input->get_post('to_date');
        $data['st'] = $this->input->get_post("st");
        $data['sc'] = $this->input->get_post("sc");

        $data['search'] = $data['sc'];






        if(  $data['from_date']==""  ||  $data['to_date']=="" ){

            $data['from_date'] = date("Y");
            $data['to_date'] = date("Y");

        }


        $config['per_page'] = 10;  //���������� ������ �Խù�
        $config['num_links'] = 5;  // �ִ뺸���� ������ �ѹ�



        $page_num = $this->input->get("per_page");
        if ($page_num == 1 or $page_num == NULL ) {
            $page_num = 0;
        }
        else {
            $page_num = $page_num * $config['per_page'] - $config['per_page'];
        }

        $data['item'] =  $this->m_coin->search_coin_group($data['from_date'], $data['to_date'],$data['st'],$data['sc'],'year',  $config['per_page'],$page_num  );

        $data['total_rows'] =  $this->m_coin->search_coin_group_count($data['from_date'], $data['to_date'],$data['st'],$data['sc'],'year');




        $config['total_rows'] =   $data['total_rows'] ;
        $config['base_url'] = '/admin/new_coin/payment_year?from_date='.$data['from_date']."&to_date=".$data['to_date']."&st=".$data['st']."&sc=".$data['sc'];
        // ������
        $config['first_tag_open']  = '<span id=page>';
        $config['first_tag_close']  = '</span>';
        $config['last_tag_open']  = '<span id=page>';
        $config['last_tag_close']  = '</span>';
        $config['cur_tag_open']  = '<span id=page_con>';
        $config['cur_tag_close']  = '</span>';
        $config['next_tag_open']  = '<span id=page>';
        $config['next_tag_close']  = '</span>';
        $config['prev_tag_open']  = '<span id=page>';
        $config['prev_tag_open']  = '<span id=page>';
        $config['prev_tag_close']  = '</span>';
        $config['num_tag_open']  = '<span id=page>';
        $config['num_tag_close']  = '</span>';
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);
        define('PAGE_URL', $this->pagination->create_links());




        foreach ($data['item'] as $key => $row) {

            $mem = $this->m_member->get_id($row->member_id);
            $partner = $this->m_member->get_addr_mb($row->partner_address);

            $data['item'][$key]->name = $mem->name;
            $data['item'][$key]->member_id = $mem->member_id;
            $data['item'][$key]->partner_name = $partner->partner_company;
            $data['item'][$key]->partner_id = $partner->member_id;



        }


        layout('payment_year', $data, 'admin');
    }

}