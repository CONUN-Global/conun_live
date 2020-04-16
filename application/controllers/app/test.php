<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Blocker\Bip39\Bip39;
use Blocker\Bip39\Util\Entropy;
class Test extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();


	}
	
	function index()
	{


 

        $re= aes_decrypt('/9NHLdVAmRDRdXWRKyXBomXX6P63YCwR8/6LY4aYmTpjr2x4p9mF/woTpX2TBW+V2gytPp5jAvSwuRumP3BMCaoOuD5ac6d2xn16i5CGWhg=');

        echo $re;



	}
		
}