<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {
	public function index(){


        $this->load->library('email');
        $config['protocol'] = "smtp";
        $config['mailtype'] = "html";

        /* Naver */
        $config['smtp_host'] = "smtp.naver.com";
        $config['smtp_user'] = "liumproject@naver.com";
        $config['smtp_pass'] = "@lium@1230";
        $config['smtp_port'] = "587";
        $config['smtp_crypto'] = "tls";
        $config['charset']  = 'utf-8';
        $config['newline']  = "\r\n";
        $this->email->initialize($config);

        $this->email->from('liumproject@naver.com', '이메일제목');

        $this->email->to('zazz3@nate.com');
       //$this->email->cc('참조 이메일');
       //$this->email->bcc('비밀참조 이메일');
        
       $this->email->subject('메일 제목');
       $this->email->message("TEST");
        
       if ( ! $this->email->send())
       {
               // Generate error
	           echo "ERROR";
       } else {
            	echo "Successfully";
       }        
       echo $this->email->print_debugger();

	}
}