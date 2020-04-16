<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aboutus extends CI_Controller {


	function __construct()
	{
		parent::__construct();

	}


	public function index()
	{
		$data = array();
		$data['header'] = array('title'=>'Aboutus','group'=>'signup-page');
		$data['conf'] = get_site(); 
		
		
		layout('aboutus',$data);
	}
	
	
}