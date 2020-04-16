<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dbs extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','admin','search','office'));	
		$this->load->library('form_validation');
		$this->load->library('session');

		define('SKIN_DIR', '/views/admin');
		$this->load->model('m_admin'); // 서치용 및 리스트용
		$this->load->model('m_point');
		$this->load->model('m_member');
		$this->load->model('m_office');
		$this->load->model('m_vlm');
		$this->load->model('m_coin');

	}
	
	// 코인테이블 아이디 조회
	function ck()
	{

		$list = $this->m_coin->get_coin_li();
		
		foreach ($list as $row) {
			$mb = $this->m_member->get_mb($row->member_id);
			if(!$mb){
				echo "$row->member_id <br>";
			}
		}
		
	}


}