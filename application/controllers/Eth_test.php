<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eth_test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public  function test(){

        $this->load->model('Wallet_model');
        $this->load->model('Balance_model');
        $this->load->model('Rpc_model');
    }

}