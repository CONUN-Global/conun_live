<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

//require_once('/home/mircoinnet/www/application/libraries/ethereum.php');
use Blocker\Bip39\Bip39;
use Blocker\Bip39\Util\Entropy;

class Seed extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        define('SKIN_DIR', '/views/web/app');

        $this->load->library('form_validation');


        $this->load->model('m_member');


    }

    function index()
    {
        $this->lang->load('seed');
        $this->load->language('alert');
        $data['header'] = array('title' => SITE_NAME_EN, 'group' => 'signup-page');
        $data['conf'] = get_site();
        $mb = $this->m_member->get_member($this->session->userdata('member_id'));

        $entropy = new Entropy($mb->member_crypt);

        $bip39 = new Bip39('en');
        $key = (string)$bip39->setEntropy($entropy)->encode();

        $data['seed'] = $key;

        $mb = $this->m_member->get_member($this->session->userdata('member_id'));


        if ($key && $this->session->userdata('member_id') && $mb->member_memnic == "") {
            $sql = "update m_member set member_memnic='" . $key . "' where member_id='" . $this->session->userdata('member_id') . "'";
            $this->db->query($sql);
        }

        $lang = get_cookie('lang');

        $data[mb] = $mb;

        layout('/conun/seed_view.html', $data, 'conun_login');
    }

    function recovery()
    {
        $this->lang->load('recovery');
        $this->load->language('alert');
        $data['header'] = array('title' => SITE_NAME_EN, 'group' => 'signup-page');
        $data['conf'] = get_site();
        $lang = get_cookie('language');
        $this->form_validation->set_rules('seed', 'Seed', 'required');
        if ($this->form_validation->run() == FALSE) {
            layout('/conun/recovery.html', $data, 'conun_login');
        } else {
            $bip39 = new Bip39('en');
            $some128bitValueAlreadyEncoded = $this->input->post("seed");
            $member = $this->m_member->get_member_memonic($some128bitValueAlreadyEncoded);


            if ($member->member_id == "") {
                $code = "0002";
            } else {
                $code = "0000";


                if ($this->session->userdata('is_login') == FALSE) {
                    $pass1 = generateRandomString(8);
                    // $pass2=generateRandomString(8);

                    $pass2 = mt_rand(100000, 999999);

                    $this->m_member->member_up_recovery($member->member_id, $pass1, $pass2);
                } else {

                    $pass1 = generateRandomString(8);
                    // $pass2=generateRandomString(8);

                    $pass2 = mt_rand(100000, 999999);

                    $this->m_member->member_up_recovery3($member->member_id, $pass2);

                }


            }


            if ($this->session->userdata('is_login') == FALSE) {


                if ($code === "0001") {
                    $msg = "유효하지 않은 Seed 입니다";
                    alert($msg);
                } else if ($code === "0002") {
                    $msg = "존재하지 않는 지갑 입니다";
                    alert($msg);
                } else if ($code === "0000") {
                    $msg = "메일 임시 비밀번호 를 발송하였습니다.";

                    $title = "Conun 임시비밀번호";
                    $content = "Conun 임시비밀번호는 $pass1 입니다.<br>";
                    $content .= "Conun 임시전송비밀번호는 $pass2 입니다.<br>";
                    $content .= "로그인후 비밀번호 변경해주십시요.";


                    $this->m_member->mail($member->member_id, $title, $content);

                    alert($msg, "/");
                }


            } else {


                if ($code === "0001") {
                    $msg = "유효하지 않은 Seed 입니다";
                    alert($msg);
                } else if ($code === "0002") {
                    $msg = "존재하지 않는 지갑 입니다";
                    alert($msg);
                } else if ($code === "0000") {
                    $msg = "메일 임시 비밀번호 를 발송하였습니다.";

                    $title = "Conun 임시비밀번호";

                    $content = "Conun 임시전송비밀번호는 $pass2 입니다.<br>";
                    $content .= "로그인후 비밀번호 변경해주십시요.";


                    $this->m_member->mail($member->member_id, $title, $content);

                    alert($msg, "/");


                }


            }


        }


    }
}

?>
