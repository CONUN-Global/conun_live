<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


/* =================================================================
* 관리자용 헬퍼
================================================================= */

function admin_chk()
{
    $CI =& get_instance();
    if ($CI->session->userdata('level') < 9) {
        alert("Not Admin", "/");
    }


    if ($CI->session->userdata('level') == 10) {

/*
        if ($CI->session->userdata('member_otp') == "0" || $CI->session->userdata('member_otp') == "") {
            alert("Otp 등록하여야 합니다.", "https://wallet.conun.io/app/login/otpReg");
        }


        if ($CI->session->userdata('member_otp') != "0" && $CI->session->userdata('member_otp') != "" && $CI->session->userdata('otp_login') != "true") {
            redirect("/app/login/otpLogin");
        }
*/
    }

}

function  partner_chk(){


    $CI =& get_instance();
    if ($CI->session->userdata('level') < 2) {
        alert("Not Admin", "/conun");
    }
}


?>
