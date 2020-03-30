<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Blocker\Bip39\Bip39;
use Blocker\Bip39\Util\Entropy;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Start extends CI_Controller {

	public function __construct () {
		parent::__construct();
		
	}






	public function index(){
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
		$data = array();
		
		$data['header'] = array('COIN','group'=>'landing-page');
		$data['conf'] = get_site();





        if($this->session->userdata('reset4')==""){

            $cookie = array(
                'name'   => 'lang',
                'value'  => "",
                'expire' => '86500',
                'domain' => '.liumwallet.com',
                'path'   => '/',
            );
            set_cookie($cookie);

            //세션 굽기



        }

		if (isset($_SERVER['REDIRECT_URL'])) {
		
			$segment = explode('/',$_SERVER['REDIRECT_URL']);
			$segment = array_filter($segment);
			ksort($segment);
			$segment = array_values($segment);
				
		}
		
		redirect('/conun');
	}



}