<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Check extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        //모델 로드
        $this -> load -> model('m_member');


    }

    // 이메일검증 아이디체크 - 차후 아이디체크할 경우 이메일검증부분은 삭제요망
    function idcheck()
    {
        $member_id = $this->input->post('member_id');
        $cnt = strlen($member_id);

        $this->db->where('member_id', $member_id);
        $this->db->from('m_member');
        $cnt = $this->db->count_all_results();

        $check = filter_var($member_id, FILTER_VALIDATE_EMAIL);

        if($check != true){
            echo "120"; // 이메일검증 불가
        }
        //else if ($cnt < 6) {
        //	echo "000"; // 10보다 작은 회원아이디
        //}
        else {

            if ($cnt) {
                echo "130";
            }
            else {

                if($check == true){
                    echo "000";
                }
                else{
                    echo "130";
                }

            }

        }

    }


}
?>