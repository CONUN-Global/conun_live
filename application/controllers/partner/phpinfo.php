<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Phpinfo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	 

		
	}
	
	
	function index() {

		$this->lists();
	
	}

	function lists()
	{

        $extraParams= array("eee"=>"1111","dddd"=>"1111");


        $result= sendMessage("테스트 입니다. ", "테스트 로 잘가나 모르겟네 ", "zazz3@nate.com",  $extraParams);

        print_r($result);
	}
	

}
?>